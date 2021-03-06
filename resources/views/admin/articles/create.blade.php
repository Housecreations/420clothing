@extends('admin.templates.principal')


@section('title', 'Agregar articulo')


@section('content')
<div class="items-no-nav col-md-10 col-sm-10 col-xs-10 card">    

<div class="col-md-7 col-md-offset-3 col-sm-7 col-sm-offset-3 col-xs-10 col-xs-offset-1">

<a href="{{ route('admin.articles.index')}}" class="button button-sm">Atrás</a>
    <hr>

{!! Form::open(['route' => 'admin.articles.store', 'method' => 'POST', 'files' => true]) !!}
<div class="form-group">
{!! Form::label('name', 'Nombre artículo') !!}
{!! Form::text('name', null, ['class' => 'form-control', 'required', 'placeholder' => 'Nombre del artículo']) !!}
</div>

<div class="form-group">
{!! Form::label('description', 'Descripción') !!}
{!! Form::textarea('description', null, ['class' => 'form-control', 'size' => '20x5', 'required', 'placeholder' => 'Descripción del artículo']) !!}
</div>




<div class="form-group">
    
   {{-- {!! Form::label('category', 'Categoria') !!}
    {!! Form::select('category', $categories, null, ['class' => 'form-control', 'placeholder' => 'Seleccione una categoria']) !!}
    --}}
     <label for="category">Categoria</label>
    <select class="form-control" required="required" id="category_id" name="category_id"><option selected="selected" value="">Seleccione una categoria</option>
    <option value="">--Masculino--</option>
       @foreach($categories as $category)  
         @if($category->gender == 'Caballeros') 
             <option value="{{$category->id}}">{{$category->name}}</option> 
                @endif    
                @endforeach 
            <option value="">--Femenino--</option>     
    @foreach($categories as $category)
          @if($category->gender == 'Damas')
            <option value="{{$category->id}}">{{$category->name}}</option>
                @endif
                @endforeach 
                 <option value="">--Accesorios--</option>  
                @foreach($categories as $category)
          @if($category->gender == 'Accesorios')
            <option value="{{$category->id}}">{{$category->name}}</option>
                @endif
                @endforeach </select>
    
</div>


{{--<div class="form-group">
    
 
 <label for="category">Categoria</label>
    <select class="form-control select-category" required="required" id="category_id" name="category_id">
  
       @foreach($categories as $category)  
   
             <option value="{{$category->id}}">{{$category->name}}</option> 
                
                @endforeach 
           </select>
  
</div>--}}

<div class="form-group">
{!! Form::label('tags', 'Tags') !!}
{!! Form::select('tags[]', $tags, null, ['class' => 'form-control select-tags', 'multiple', 'required']) !!}
</div>

{{--<div class="form-group">
{!! Form::label('stock', 'Cantidad disponible') !!}
{!! Form::number('stock', null, ['class' => 'form-control', 'required']) !!}
</div>
--}}
<div class="form-group">
{!! Form::label('price', 'Precio') !!}
{!! Form::number('price', null, ['class' => 'form-control', 'required','step' => '0.01']) !!}
</div>

<div class="form-group">
{!! Form::label('discount', '% de descuento') !!}
{!! Form::number('discount', null, ['class' => 'form-control', 'required']) !!}
</div>

<div class="form-group">
    {!! Form::label('image', 'Imagen del artículo') !!}
    {!! Form::file('image') !!}
    
</div>


<div class="form-group text-center">
    
    {!! Form::submit('Registrar', ['class' => 'cart-button'])!!}
    
</div>

{!! Form::close() !!}

    </div>
</div>
@endsection
@section('js')
 <script src="{{ asset('plugins/chosen/chosen.jquery.js') }}"></script>
 <script>
$('.select-tags').chosen({
    placeholder_text_multiple: 'Seleccione un máximo de 5 tags',
    max_selected_options: 5
});
     $('.select-category').chosen({
         no_results_text: 'No se encontraron categorias'
     });
</script>
@endsection