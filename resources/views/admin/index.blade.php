@extends('admin.templates.principal')

@section('title', 'Panel administracion') 


@section('content') 

<div class='admin-index'>
 @include('admin.templates.partials.adminnav')


<div class="col-md-2 col-xs-2"></div>
<div class="col-md-8 col-xs-12 card">
    
   

    
    <div class="admin-slider">
       
        <div class="row">
        <h4 class="text-center">Ventas</h4>
           <hr>
         <div class="col-md-12 col-sm-12">
          
           
           <div class="col-md-6 sale-data">
               <span>{{$totalMonth}} {{$currency}}</span>
               Ingresos del mes
           </div>
           <div class="col-md-6 sale-data">
               <span>{{$totalMonthCount}}</span>
               Cantidad de ventas
           </div>
           
           
           <div class="col-md-12 text-center">
           <hr>
           <a href="{{url('/admin/orders')}}"><h5>Órdenes del mes</h5> 
           
           @if($orderCount > 0)
            <span class="badge badge-color">{{$orderCount}}</span>
           @else
           <span class="badge">{{$orderCount}}</span>
           @endif
           
           </a>
           
            <a class='' href="{{url('/admin/orders/all')}}"><h5>Ver todas las órdenes</h5> 
            
            @if($orderCountAll > 0)
            <span class="badge badge-color">{{$orderCountAll}}</span>
            @else
            <span class="badge">{{$orderCountAll}}</span>
            @endif
            </a>
            
             <a href="{{url('/admin/payment')}}"><h5>Buscar un pago</h5> 
        
            </a>
           
           </div>
           
           </div>
         
       </div>
       
       <hr>
        <div class="row">
        <h4 class="text-center top-space">Slider</h4>
           <hr>
        <div class="templatemo-gallery-item collection col-md-12 front">
        <a href="{{ route('admin.front.edit')}}">
        @if(sizeof($carousel) > 0)
        <img src="images/slider/{{$carousel[0]->image_url}}" alt="">
        @else
        <img src="images/slider/" alt="">
        @endif
        <div class="templatemo-gallery-image-overlay"></div>
        
       
       </a> </div>
       </div>
       
       <div class="row top-space admin">
           
           <div class="col-md-6 gentleman">
              <a href="{{route('admin.edit.front.images', 'gentleman_image')}}">
              <img src="/images/front_images/{{$front_images->gentleman_image}}" alt="">
              </a> 
           </div>
           <div class="col-md-6 ladies">
              <a href="{{route('admin.edit.front.images', 'ladies_image')}}">
              <img src="/images/front_images/{{$front_images->ladies_image}}" alt="">
              </a> 
           </div>
           <div class="col-md-6 acc">
              <a href="{{route('admin.edit.front.images', 'acc_image')}}">
              <img src="/images/front_images/{{$front_images->acc_image}}" alt="">
              </a> 
           </div>
           <div class="col-md-12 outlet">
               <a href="{{route('admin.edit.front.images', 'outlet_image')}}">
              <img src="/images/front_images/{{$front_images->outlet_image}}" alt="">
              </a> 
           </div>
           
           
       </div>
       
       
        
        
    </div>
    
</div>
</div>

@endsection