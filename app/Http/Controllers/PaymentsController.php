<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use JPBlancoDB\MercadoPago\MercadoPago;
use App\ShoppingCart;
use App\Order;
use App\Message;
use App\OrderDetails;
use App\InShoppingCart;
use Illuminate\Support\Facades\Auth;
use Laracasts\Flash\Flash;
use Mail;
use App\Mailer;
	
use Illuminate\Support\Collection as Collection;

class PaymentsController extends Controller
{   
    
    public function checkout(){
        
        return view('orders.checkout');
        
    }
    
    public function index(Request $request){
      
        
   /*$filters = array (
        "id" => null,
        "site_id" => null,
        "external_reference" => 4
    );*/
        /*$searchResult = MercadoPago::search_payment($filters);
        dd($searchResult);*/
        
       
/*$paymentInfo = MercadoPago::get_payment("2344613035");
 

       $a = MercadoPago::get_payment($paymentInfo['response']['collection']['id']);
        dd($a);
        */
        
        
        //obtener carrito
        $shoppingCart = Auth::user()->shoppingCart;
        //array con los items
        $items = [];
        
        foreach ($shoppingCart->articles as $articleDetail){
            
         
            $articlesCount = $shoppingCart->articles()->where("articleDetail_id", "=", $articleDetail->id)->groupBy("articleDetail_id")->count(); //saber cuantos items son sin repetirse
          
            if($articleDetail->stock >= $articlesCount){ //verificar que haya existencia
                
                $item = array_add([
                        "title" => $articleDetail->article->name,
                        "currency_id" => "VEF",
                        "category_id" => $articleDetail->article->category->name,
                        "quantity" => 1],
                    'unit_price', $articleDetail->article->price);

                array_push($items, $item);
            
            }else{
                
                
                Flash::success('No hay suficiente disponibilidad del artículo '. $articleDetail->article->name);
                return back();
                
            }
        }
   
        
        
        $baseURL = url('/');
        
        $order = Order::create([
           
            'shopping_cart_id' => $shoppingCart->id,
            'total' => $shoppingCart->total()
            
            
        ]);

       foreach ($shoppingCart->articles as $articleDetail{
        
       $orderDetails = OrderDetails::create([
           
            'order_id' => $order->id,
            'name' => $articleDetail->article->name,
            'price' => $articleDetail->article->price
            
        ]);
           }
        
       
        
        $order->approve();
        
        $external_reference = $order->customid;
        
        $preference_data = array(
        "items" => $items,
        "back_urls" => array (
           
                "success" => "$baseURL/payments/success",
		        "failure" => "$baseURL/payments/fail",
		        "pending" => "$baseURL/payments/pending"
	
        ),
             "notification_url" => "$baseURL/payments/notifications",
             "external_reference" => $external_reference,
             
            "payment_methods" => array (
            "excluded_payment_methods" => array (),
            "excluded_payment_types" => array (
                array ( "id" => "ticket" ),
                array ( "id" => "atm" ),
                array ( "id" => "debit_card" ),
                array ( "id" => "prepaid_card" ),
            ),
            "installments" => 12
        )


    );



    //orden
        
        /*$order = Auth::user()->shoppingCart->orders()->where('customid', '=', $request->orders)->first();*/
        $order->shipment_agency = $request->shipment_agency;
        $order->shipment_agency_id = $request->shipment_agency_id;
        $order->recipient_name = $request->recipient_name;
        $order->recipient_id = $request->recipient_id;
        $order->recipient_email = $request->recipient_email;
        $order->edited = 'yes';
        $order->save();
      
      
        try {
            $preference = MercadoPago::create_preference($preference_data);
            return redirect()->to($preference['response']['init_point']);
        } catch (Exception $e){
            dd($e->getMessage());
        }
        
        
    }
    
    public function fail(Request $request){
        
       
        Order::where('customid', $request->external_reference)->delete();
      
        
         Flash::success('No se pudo procesar el pago, por favor intente nuevamente');
        
        return redirect('/checkout');
        
        
        
    }
     public function success(Request $request){
        
        
        $paymentInfo = MercadoPago::get_payment($request->collection_id);
      

         //Si el order_id de la respuesta de MP es igual al de la url
        if($paymentInfo['response']['collection']['order_id'] == $request->external_reference){ 
         
         
         $order = Order::where('customid', $request->external_reference)->first();
       
         if($order){
             
                if($order->received == "no"){
                    
                    $order->status = 'Por procesar';
                    $order->received = "yes";
                    $order->payment_id = $request->collection_id;
                    $order->save();
                    
                    $shopping_cart = $order->shoppingCart;
                    
                   /* $shopping_cart = Auth::user()->shoppingCart;*/
                    
                    
                   //restar artículos vendidos
                    foreach($shopping_cart->articles as $articleDetail){
                        
                        $articleDetail->stock = $articleDetail->stock - 1;
                        $articleDetail->save();
                   
                        
                    }
                    //vaciar carrito
                    $shopping_cart->articles()->detach();
                    
                
                    
                     //Email al usuario
                    Mailer::sendMail("House Creations", "info@housecreations.com", "Orden en proceso de verificación", "Hemos recibido su pago #$order->payment_id. Su orden se encuentra en proceso de verificación", "emails.message", $order->shoppingCart->user->email, $order->shoppingCart->user->name);
        
                    $base_url = url("/");
                    //Email al administrador  
                    Mailer::sendMail("House Creations", "info@housecreations.com", "Compra realizada", "Se ha realizado una compra, puede revisar la orden en el siguiente link: $base_url/admin/orders", "emails.message", env("CONTACT_MAIL"), env("CONTACT_NAME"));
                    
                    
                    
                
                }
             Flash::success('El pago fue exitoso, su orden se encuentra en proceso de verificación');
                return redirect('/home');
                
         }else{
             
                Flash::success('Error, la orden no corresponde a ninguna registrada en nuestra base de datos');
                return redirect('/home');
         
         }
     }else{
            
            Flash::success('Error en la orden');
             return redirect('/home');
        
        }
        
    }
    
}