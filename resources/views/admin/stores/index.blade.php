@extends('admin.templates.principal')


@section('title', 'Tiendas')


@section('content')


 <div class="">    

<div class="items-no-nav col-md-10 col-sm-10 col-xs-10 card">
   
        <a href="{{ route('admin.index')}}" class="button button-sm">Atrás</a>
       
      <a href="{{ route('admin.stores.create')}}" class='button button-md'>Nueva tienda</a>
    <hr>
    
    

    <table class="table table-hover">
        <thead>
        <tr>
            <th>Tienda</th>
            <th>Teléfono</th>
            <th>Correo</th>
            <th>Dirección</th>
            <th>País</th>
            <th>Estado</th>
            <th>Acciones</th>
        </tr>    
        </thead>
        <tbody>
            
           @foreach($stores as $store)
           
           <tr>
               <td>{{$store->name}}</td>
               <td>{{$store->phone}}</td>
               <td>{{$store->email}}</td>
               <td>{{$store->address}}</td>
               <td>{{$store->country}}</td>
               <td>{{$store->state}}</td>
               <td>
                
                 <a href="{{ route('admin.stores.edit', $store->id)}}" title="Editar artículo" class=''><span class='fa-stack fa-lg ' aria-hidden='true'>
                     <i class="fa fa-square fa-stack-2x"></i>
  <i class="fa fa-wrench fa-stack-1x fa-inverse"></i>
                    </span></a>
               <a href="{{ route('admin.stores.destroy', $store->id) }}" title="Eliminar artículo" onclick="return confirm('Seguro que deseas eliminarlo?')" class=''><span class='fa-stack fa-lg ' aria-hidden='true'>
                     <i class="fa fa-square fa-stack-2x"></i>
  <i class="fa fa-times fa-stack-1x fa-inverse"></i>
                    </span></a>
              
                   
               </td>
           </tr>
           
           @endforeach 
            
        </tbody>
    </table>
    

<div class="text-center">
  {!! $stores->render() !!} 
</div>

     </div>
</div>
@endsection