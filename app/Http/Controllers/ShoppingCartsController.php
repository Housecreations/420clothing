<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\ShoppingCart;
use Illuminate\Support\Facades\Auth;
use App\Article;
use App\Config;

class ShoppingCartsController extends Controller
{   
    
   public function eliminarcarritos(Request $request){
      if($request->ajax()){
        $shoppingCarts = ShoppingCart::all();
        foreach($shoppingCarts as $shoppingCart){
            
            if(!$shoppingCart->user)
                $shoppingCart->delete();
            
        
        }
       return response()->json(['texto' => 'Carritos eliminados']);
          }
      return back();
        
    }
    
    public function vaciar(){
        if(Auth::user()){
            $shopping_cart = Auth::user()->shoppingCart;
            $shopping_cart->articles()->detach();
        
      
    }else{
             $shopping_cart_id = \Session::get('shopping_cart_id');
            $shopping_cart = ShoppingCart::findOrCreateBySessionID($shopping_cart_id);
             $shopping_cart->articles()->detach();
        }
    
        return back();
    }
    
    public function index(){
        
        if(Auth::user()){
           
 
            $shopping_cart = Auth::user()->shoppingCart;
            $articlesDetails = $shopping_cart->articles()->get();
                     
            $total = $shopping_cart->total();
            return view('shopping_carts.index', ['articlesDetails' => $articlesDetails, 'total' => $total, 'active' => Config::all()->first()]);
            
           
       }else{
         $shopping_cart_id = \Session::get('shopping_cart_id');
        
        $shopping_cart = ShoppingCart::findOrCreateBySessionID($shopping_cart_id);
            
            $articlesDetails = $shopping_cart->articles()->get();
            $total = $shopping_cart->total();
            

             return view('shopping_carts.index', ['articlesDetails' => $articlesDetails, 'total' => $total]);
        
        }
        
       /*   $shopping_cart_id = \Session::get('shopping_cart_id');
        
        $shopping_cart = ShoppingCart::findOrCreateBySessionID($shopping_cart_id);
        
        $paypal = new PayPal($shopping_cart);
        
        
        $payment = $paypal->generate();
        
        return redirect($payment->getApprovalLink());*/
        
        
        
        /*
        
        $products = $shopping_cart->products()->get();
        
        $total = $shopping_cart->total();
        
        return view('shopping_carts.index', ['products' => $products, 'total' => $total]);
        */
    }
}
