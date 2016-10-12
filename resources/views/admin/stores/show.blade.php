@extends('admin.templates.principal')


@section('title', 'Tiendas')


@section('content')

<div class="items col-md-10 col-sm-10 col-xs-10 card">    
<div class="text-center contact">
<span class="title">Puedes encontrar nuestras prendas en las siguientes tiendas</span>
<hr>
</div>

    <div class="col-md-12">
        @foreach($stores as $store)
        <div class="col-md-4 stores">
            <h3 class="text-center">{{$store->name}}</h3>
            <ul>
                <li>Dirección: {{$store->address}}</li>
                <li>Teléfono: {{$store->phone}}</li>
                <li>Correo: {{$store->email}}</li>
                <li>Estado: {{$store->state}}</li>
                <li>País: {{$store->country}}</li>
            </ul>
            
        </div>
        @endforeach
    </div>

</div>

@endsection