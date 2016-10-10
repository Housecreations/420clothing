@extends('admin.templates.principal')


@section('title', 'Lista de detalles artículo')


@section('content')


 <div class="">    

<div class="items-no-nav col-md-10 col-sm-10 col-xs-10 card">
   
        <a href="{{ route('admin.articles.index')}}" class="button button-sm">Atrás</a>
       
      <a href="{{ route('admin.articleDetails.create', $article_id) }}" class='button button-md'>Nuevo detalle artículo</a>
    <hr>
    
    

    <table class="table table-hover">
        <thead>
        <tr>
            <th>Id</th>
            <th>Stock</th>
            <th>Color</th>
            <th>Talla</th>
            <th>Acciones</th>
        </tr>    
        </thead>
        <tbody>
            
           @foreach($articleDetails as $articleDetail)
           
           <tr>
               <td>{{$articleDetail->id}}</td>
               <td>{{$articleDetail->stock}}</td>
               <td>{{$articleDetail->color}}</td>
               <td>{{$articleDetail->size}}</td>
               <td>
                
                 <a href="{{ route('admin.articleDetails.edit', [$article_id, $articleDetail->id])}}" title="Editar artículo" class=''><span class='fa-stack fa-lg ' aria-hidden='true'>
                     <i class="fa fa-square fa-stack-2x"></i>
  <i class="fa fa-wrench fa-stack-1x fa-inverse"></i>
                    </span></a>
               <a href="{{ route('admin.articleDetails.destroy', $articleDetail->id) }}" title="Eliminar artículo" onclick="return confirm('Seguro que deseas eliminarlo?')" class=''><span class='fa-stack fa-lg ' aria-hidden='true'>
                     <i class="fa fa-square fa-stack-2x"></i>
  <i class="fa fa-times fa-stack-1x fa-inverse"></i>
                    </span></a>
              
                   
               </td>
           </tr>
           
           @endforeach 
            
        </tbody>
    </table>
    

<div class="text-center">
  {!! $articleDetails->render() !!} 
</div>

     </div>
</div>
@endsection