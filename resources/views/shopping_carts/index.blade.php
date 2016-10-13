@extends('admin.templates.principal')


@section('title', 'Carrito de compras')


@section('content')

<div class="col-md-10 col-sm-10 col-xs-10 items card">

<ol class="breadcrumb bc text-center">
  <li><a href="/">Inicio</a></li>

    
    
  
   
   
  
   
    <li class="active">Carrito de compras</li>
  <hr>
</ol>




<div class="">
    
   
    <table class="table table-condesed">
    
        <thead>
            <tr>
                <td class="cart-header to-dissapear">Producto</td>
                <td class="cart-header to-appear"></td>
                <td class="cart-header">Color</td>
                <td class="cart-header">Talla</td>
                <td class="cart-header">Precio</td>
                <td class="cart-header">Acciones</td>
            </tr>
        </thead>
        
        <tbody class="cart-tbody">
            
            @foreach($articlesDetails as $articleDetail)
            <tr class="text-center">
                <td class="cart-image to-dissapear"><img src="/images/articles/{{$articleDetail->article->images[0]->image_url}}" alt=""></td>
                <td class="cart-name"><a class="a-no-style" href="/articulos/{{$articleDetail->article->category->gender}}/{{$articleDetail->article->category->slug}}/{{$articleDetail->article->slug}}">{{$articleDetail->article->name}}</a></td>
                <td class="cart-name">{{$articleDetail->color}}</td>
                <td class="cart-name">{{$articleDetail->size}}</td>
                <td class="cart-price">{{$articleDetail->article->price_now}} Bs</td>
                <td> <a class="cart-button button-sm" href="{{ url('/in_shopping_carts/'.$articleDetail->pivot->id) }}"
                                        onclick="event.preventDefault();
                                                 document.getElementById('in_shopping_cart_form_{{$articleDetail->pivot->id}}').submit();">
                                        <i class="fa fa-remove"></i>
                                    </a>
                                   
                                   {!! Form::open(['url'=> '/in_shopping_carts/'.$articleDetail->pivot->id, 'method' => 'DELETE', 'style' => 'display:none;', 'id' => 'in_shopping_cart_form_'.$articleDetail->pivot->id]) !!}
                                       <input type="hidden" name="articleDetail_id" value="{{$articleDetail->id}}">
                                       <input type="submit">
      
                                    {!! Form::close() !!}</td>
                                    
            </tr>
            
            @endforeach
            <tr class="text-center">
                <td class="cart-total">Total</td>
                <td class="to-dissapear"></td>
                <td>
                    
                </td>
                <td></td>
                <td class="cart-price">{{$total}} Bs</td>
                <td class="cart-empty-cart"> <a href="{{ url('carrito/vaciar') }}" onclick="return confirm('Seguro que deseas vaciar el carrito?')" class='cart-button button-lg'>Vaciar carrito</a></td>
            </tr>
            
        </tbody>
        
    </table>
    
</div>

@if(Auth::user())
    
    @if(Auth::user()->type == 'member')
    @if($active->active == 'no')
    <h3 class="text-center">Lo sentimos, los pagos están desactivados</h3>
    @else
    <a href="{{url('/checkout')}}" class="cart-button">Ir al checkout</a>
    @endif
    @endif
    
@else


<a href="{{route('admin.auth.login')}}" class="cart-button">Inicia sesión para pagar</a>

@endif

</div>

@endsection