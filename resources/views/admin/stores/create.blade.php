@extends('admin.templates.principal')


@section('title', 'Agregar tienda')


@section('content')
<div class="items-no-nav col-md-10 col-sm-10 col-xs-10 card">    

<div class="col-md-7 col-md-offset-3 col-sm-7 col-sm-offset-3 col-xs-10 col-xs-offset-1">

<a href="{{ route('admin.stores.index')}}" class="button button-sm">Atrás</a>
    <hr>

{!! Form::open(['route' => 'admin.stores.store', 'method' => 'POST']) !!}
<div class="form-group">
{!! Form::label('name', 'Nombre') !!}
{!! Form::text('name', null, ['class' => 'form-control', 'required', 'placeholder' => 'Nombre de la tienda']) !!}
</div>

<div class="form-group">
{!! Form::label('phone', 'Teléfono') !!}
{!! Form::text('phone', null, ['class' => 'form-control', 'required', 'placeholder' => 'Teléfono']) !!}
</div>

<div class="form-group">
{!! Form::label('email', 'Correo') !!}
{!! Form::text('email', null, ['class' => 'form-control', 'required', 'placeholder' => 'Correo electrónico']) !!}
</div>

<div class="form-group">
{!! Form::label('address', 'Dirección') !!}
{!! Form::text('address', null, ['class' => 'form-control', 'required', 'placeholder' => 'Dirección']) !!}
</div>

<div class="form-group">
{!! Form::label('country', 'País') !!}
{!! Form::text('country', null, ['class' => 'form-control', 'required', 'placeholder' => 'País']) !!}
</div>

<div class="form-group">
{!! Form::label('state', 'Estado') !!}
{!! Form::text('state', null, ['class' => 'form-control', 'required', 'placeholder' => 'Estado']) !!}
</div>


<div class="form-group text-center">
    
    {!! Form::submit('Registrar', ['class' => 'cart-button'])!!}
    
</div>

{!! Form::close() !!}

    </div>
</div>
@endsection