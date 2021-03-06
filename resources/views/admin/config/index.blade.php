@extends('admin.templates.principal')

@section('title', 'Configuración') 


@section('content') 
  
  
<div class="items-no-nav col-md-10 col-sm-10 col-xs-10 card">    

<div class="col-md-7 col-md-offset-2 col-sm-7 col-sm-offset-2 col-xs-10 col-xs-offset-1">


<div class="button-container">
<a href="{{ route('admin.index')}}" class="button button-sm">Atrás</a>
  
 <a href="{{ route('admin.shipment.create')}}" class="button button-lg">Nueva empresa de envío</a>  
    
{!! Form::open(['route' => 'admin.config.status', 'method' => 'POST', 'id' => 'store-status-form']) !!}

<div class="form-group">
   
   
   @if($config->active == 'yes')
<button type="submit" class="button-on ">
Tienda activa
</button>
@else
<button type="submit" class="button-on button-off">
Tienda Inactiva
</button>
@endif
    
   
    
</div>

{!! Form::close() !!}
</div>
<hr>
  
  <table class="table table-hover">
      
      <thead>
          <tr>
              <th>Nombre empresa envíos</th>
              <th>Acciones</th>
          </tr>
      </thead>
      <tbody>
         @foreach($shipments as $shipment)
          <tr>
              <td>{{$shipment->name}}</td>
              <td><a href="{{ route('admin.shipment.edit', $shipment->id)}}" title="Editar" class=''><span class='fa-stack fa-lg ' aria-hidden='true'>
                     <i class="fa fa-square fa-stack-2x"></i>
  <i class="fa fa-wrench fa-stack-1x fa-inverse"></i>
                    </span></a>
               <a href="{{ route('admin.shipment.destroy', $shipment->id) }}" title="Eliminar" onclick="return confirm('Seguro que deseas eliminarlo?')" class=''><span class='fa-stack fa-lg ' aria-hidden='true'>
                     <i class="fa fa-square fa-stack-2x"></i>
  <i class="fa fa-times fa-stack-1x fa-inverse"></i>
                    </span></a></td>
          </tr>
          @endforeach
      </tbody>
      
  </table>
   
   
   
   
   
   
   
   <hr>
   
   
   
    <div class="button-container">
 <a href="{{ route('admin.payments_accounts.create')}}" class="button button-lg">Nueva cuenta bancaria</a>  
    

</div>
<hr>
  
  <table class="table table-hover">
      
      <thead>
          <tr>
              <th>Banco</th>
              <th>Tipo de cuenta</th>
              <th>Estado</th>
              <th>Acciones</th>
          </tr>
      </thead>
      <tbody>
         @foreach($payments_accounts as $payments_account)
          <tr>
              <td>{{$payments_account->bank_name}}</td>
              <td>{{$payments_account->bank_account_type}}</td>
              @if($payments_account->active == 'yes')
              <td>Activada</td>
              @else
              <td>Desactivada</td>
              @endif
              <td><a href="{{ route('admin.payments_accounts.edit', $payments_account->id)}}" title="Editar" class=''><span class='fa-stack fa-lg ' aria-hidden='true'>
                     <i class="fa fa-square fa-stack-2x"></i>
  <i class="fa fa-wrench fa-stack-1x fa-inverse"></i>
                    </span></a>
               <a href="{{ route('admin.payments_accounts.active', $payments_account->id) }}" title="Cambiar estado" onclick="return confirm('Seguro que deseas cambiar el estado de la cuenta?')" class=''><span class='fa-stack fa-lg ' aria-hidden='true'>
                     <i class="fa fa-square fa-stack-2x"></i>
  <i class="fa fa-toggle-on fa-stack-1x fa-inverse"></i>
                    </span></a></td>
          </tr>
          @endforeach
      </tbody>
      
  </table>
   
   
   
   <hr>
   
   
   
   
   
   <div>
    <h4 class="text-center">Correos de la aplicación</h4>
       <hr>
      {!! Form::open(['route' => 'admin.config.emails', 'method' => 'POST', 'id' => 'update-emails-form']) !!}



<div class="form-group">
{!! Form::label('sender_email', 'Cuenta para envío de correos de la aplicación') !!}
{!! Form::text('sender_email', $config->sender_email, ['class' => 'form-control', 'required', 'placeholder' => 'Desde aquí se enviarán los correos de tu aplicación']) !!}
</div>
<div class="form-group">
{!! Form::label('sender_name', 'Nombre en correos enviados') !!}
{!! Form::text('sender_name', $config->sender_name, ['class' => 'form-control', 'required', 'placeholder' => 'Nombre que aparecerá en los correos enviados']) !!}
</div>
<div class="form-group">
{!! Form::label('receiver_email', 'Cuenta para recepción de correos') !!}
{!! Form::text('receiver_email', $config->receiver_email, ['class' => 'form-control', 'required', 'placeholder' => 'Aquí se recibirán los correos de las ventas y los mensajes enviados']) !!}
</div>

<div class="form-group">
   
<button type="submit" class="button">
Actualizar correos
</button>

    
</div> 
      {!! Form::close() !!}
       
   </div>
   <hr>
   <div>
    <h4 class="text-center">Carritos de compra</h4>
       <hr>
      {!! Form::open(['url' => '/deleteNoUserCarts', 'method' => 'POST', 'id' => 'delete-carts-form']) !!}


<p>Carritos obsoletos: <span id='noUserCartsCount'>{{$noUserCartsCount}}</span></p>


<div class="form-group">
   
<button type="submit" class="button">
Eliminar carritos obsoletos
</button>

    
</div> 
      {!! Form::close() !!}
       
   </div>
   
   <hr>
   
   
   
   
   
   
    </div>
</div>
  
   
   
@endsection