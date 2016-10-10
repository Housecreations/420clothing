@extends('admin.templates.principal')

@section('title', 'Imagenes inicio') 


@section('content') 






<div class="items-no-nav col-md-10 col-sm-10 col-xs-10 card">



   
   
    <a href="{{ route('admin.index')}}" class="button button-sm three">Atrás</a>
        
<hr>
   




<div class="row">
    
    
    


<div class="col-md-6 col-md-offset-3 col-sm-offset-3 col-sm-6 col-xs-12">
<div class="image">
    <img src="/images/front_images/{{$front->$image}}" alt="">
</div>
<div class="col-md-11">
{!! Form::open(['route' => ['admin.update.front.images', $image], 'method' => 'PUT', 'files' => true]) !!}



<div class="form-group">
    {!! Form::label('image', 'Cargar imagen') !!}
    {!! Form::file('image') !!}
    
</div>
</div>
<div class="col-md-12">
<div class="form-group">
    
    {!! Form::submit('Editar', ['class' => 'button'])!!}
    
</div>

</div>

{!! Form::close() !!}

</div>
 
    
    
    
    
    
    
    
  


@endsection