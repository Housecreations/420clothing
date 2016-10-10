@extends('admin.templates.principal')


@section('title', 'Agregar detalle artículo')


@section('content')
<div class="items-no-nav col-md-10 col-sm-10 col-xs-10 card">    

<div class="col-md-7 col-md-offset-3 col-sm-7 col-sm-offset-3 col-xs-10 col-xs-offset-1">

<a href="{{ route('admin.articleDetails.index', $article_id)}}" class="button button-sm">Atrás</a>
    <hr>

{!! Form::open(['route' => ['admin.articleDetails.store', $article_id], 'method' => 'POST']) !!}
<div class="form-group">
{!! Form::label('color', 'Color') !!}
{!! Form::text('color', null, ['class' => 'form-control', 'required', 'placeholder' => 'Color del artículo']) !!}
</div>

<div class="form-group">
{!! Form::label('size', 'Talla') !!}
{!! Form::text('size', null, ['class' => 'form-control', 'required', 'placeholder' => 'Talla del artículo (S, M, L)']) !!}
</div>

<div class="form-group">
{!! Form::label('stock', 'Cantidad disponible') !!}
{!! Form::number('stock', null, ['class' => 'form-control', 'required']) !!}
</div>

<div class="form-group">

{!! Form::number('article_id', $article_id, ['class' => 'form-control', 'required', 'style' => 'display:none;']) !!}
</div>

<div class="form-group text-center">
    
    {!! Form::submit('Registrar', ['class' => 'cart-button'])!!}
    
</div>

{!! Form::close() !!}

    </div>
</div>
@endsection