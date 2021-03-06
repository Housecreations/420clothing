@extends('admin.templates.principal')


@section('title', 'Órdenes del mes')


@section('content')

<div class="col-md-1 col-sm-1 col-xs-1"></div>
<div class="col-md-10  col-sm-10 col-xs-10 users">
   
    <div class="row">
       
        <div class="col-md-12  col-sm-12 col-xs-12 card">
          
        <a href="{{url('/admin')}}" class="button button-sm">Atrás</a>
        
         {!! Form::open(['route' => 'admin.orders.expired.delete', 'method' => 'POST', 'class' => 'navbar-form pull-right']) !!}
        
          <button type="submit" class="button">Eliminar órdenes vencidas: {{$totalExpired}}</button>
        
        {!! Form::close() !!}
        
        <hr>
  
         <div class="col-md-12">
           <div class="row">
            <h4>Órdenes del mes</h4>
            
            
           
            
            
            @foreach($orders as $order)
   <hr>
   <div class="row order-row">
    <div class="row">
    <div class="col-md-12">
     <div class="col-md-6">
       <h5>Estado: <a href="#" data-type='select' 
                                        data-pk='{{$order->id}}' 
                                        data-url="{{url('/admin/orders/'.$order->id)}}"
                                        data-title='Status'
                                        data-value="{{$order->status}}"
                                        class="select-status"
                                        data-name="status"></a></h5>
        <h5>Fecha: {{$order->created_at->format('d/m/Y')}}</h5>
       </div>
      <div class="col-md-6 text-right">
       <h5>Compra #{{$order->payment_id}}</h5>
       </div>
   </div>
      </div>
      
       <div class="col-md-6">
       <table class='table'>
           <thead>
        <th>Artículo</th>
        <th>Precio</th>
        
    </thead>
      <tbody>
         @foreach($order->orderDetails as $orderDetail)
          <tr>
              <td>{{$orderDetail->name}}</td>
              <td>{{$orderDetail->price}}</td>
          </tr>
        @endforeach
          <tr>
                <td>Total</td>
                <td>{{$order->total}}</td>
            </tr>
      </tbody>
       </table>
       </div>
       <div class="col-md-6">
           <h5 class="text-center">Información de envío</h5>
           
           <h5>Agencia de envío: {{$order->shipment_agency}}</h5>
           <h5>Identificador de agencia: {{$order->shipment_agency_id}}</h5>
           <h5>Número de guía: <a href="#" data-type='text' 
                                        data-pk='{{$order->id}}' 
                                        data-url="{{url('/admin/orders/'.$order->id)}}"
                                        data-title='Número de guía'
                                        data-value="{{$order->guide_number}}"
                                        class="set-guide-number"
                                        data-name="guide_number"></a></h5>
                                        <hr>
           <h5 class="text-center">Información del receptor</h5>
           <h5>Nombres: {{$order->recipient_name}}</h5>
           <h5>C.I:{{$order->recipient_id}}</h5>
           <h5>Correo Electrónico: {{$order->recipient_email}}</h5>
           <hr>
           <h5 class="text-center">Información del comprador</h5>
           <h5>Nombres: {{$order->shoppingCart->user->name}}</h5>
           <h5>Correo Electrónico: {{$order->shoppingCart->user->email}}</h5>
       </div>
       
   </div>
   
  @endforeach
           <div class="text-center">
    {!! $orders->render() !!}
</div>
         
            </div>
            </div>
        </div>
    </div>
    

</div>
@endsection