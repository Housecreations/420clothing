@extends('admin.templates.principal')

@section('title', $article->name) 


@section('content') 
  
  
{{--{{$article->articlesDetails}}
   --}}
   <div class="items col-md-10 col-sm-10 col-xs-10 card">
    <ol class="breadcrumb bc text-center">
  <li><a href="/">Inicio</a></li>

    
    
  <li> <a href="/articulos/{{$article->category->gender}}"> {{$article->category->gender}}</a></li>
    <li> <a href="/articulos/{{$article->category->gender}}/{{$article->category->slug}}"> {{$article->category->name}}</a></li>
   
  
   
    <li class="active"> {{$article->name}}</li>
  <hr>
</ol>
   
  
   
   
     
   
   
  
  
  <div class="col-md-6 img-container col-sm-6 col-xs-12">
  
  
   <div id="slider" class="flexslider">
                             @if($article->discount > 0)
                    <div class="oferta-article">{{$article->price}} {{$currency}}</div>
                    @endif
                              <ul class="slides">
                                
    @foreach($article->images as $image)
                                 
                                 <li>
                                  <img src="/images/articles/{{$image->image_url}}" alt="Slide {{$image->id}}"/>
                                  
                              </li>
                              
                              @endforeach
                              
                          </ul>
                      </div>
                     
                <div id="carousel" class="flexslider">
                          <ul class="slides">
                         
                             
                 @foreach($article->images as $image)                 
                           <li>
                              <img src="/images/articles/{{$image->image_url}}" alt="Thumbnail {{$image->id}}"/>
                          </li>
                          
                          @endforeach
                         
                      </ul>
                  </div>       
                    
   </div>
  
  
  
   <div class="col-md-5 item-description col-sm-6 col-sm-offset-0 col-xs-10 col-xs-offset-1">
      
      <div class="row up">
      <span class="title">{{$article->name}}</span>
     </div>
      <div class="row up">
      <div class="price">{{$article->price_now}} {{$currency}}</div>
      
      
      
      
        @if(Auth::user())
          @if(Auth::user()->type == 'member')
           
                  <div class="agregar-carrito" style="display:none;">
                   
                  
                   
                            
                   @include('in_shopping_carts.form', ['article' => $article])
                   
                </div>
               
                @endif
                @else
                
                
        <div class="agregar-carrito" style="display:none;">
                   
                  
                   
                            
                   @include('in_shopping_carts.form', ['article' => $article])
                   
                </div>
               
              
                @endif
      
      
      
      
      
      </div>
      <div class="row up" id="Available">
       
      <span class="bold-span"> Disponibilidad: </span>
     
   
       </div>
      
     <div class="row">
       <div class="form-group">
    
     <select class="form-control" required="required" id="color_select" name="color_select"><option selected="selected" value="">Color</option>
   
       @foreach($colors as $color)  
     
             <option value="{{$color->id}}">{{$color->color}}</option> 
               
                @endforeach 
            </select>
    
    <input type="hidden" name="_token" value="{{csrf_token()}}" id="token">
    
    
</div>
      <div class="form-group">
    
    {!! Form::select('size', ['rojo' => ''], null, ['id'=>'size_select','class'=> 'form-control', 'placeholder' => 'Talla', 'required'] ) !!}
    
    {!! Form::number('article_id', $article->id, ['id'=>'article_id', 'class'=>'hidden']) !!}
    <input type="hidden" name="_token" value="{{csrf_token()}}" id="token1">
</div>
     
     
     
      </div>
      
          
          <div class="row">
          <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
  
   
   
   
  <div class="panel panel-default">
   
   <div class="panel-heading" role="tab" id="heading1">
      
        <a class="nohover" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse1" aria-expanded="true" aria-controls="collapse1">
         
        <h4 class="panel-title big">
        Descripción
        </h4>
       
        </a>
       </div>
    
    
     
     <div id="collapse1" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading1">
      <div class="panel-body">
        
        <p>{{$article->description}}</p>   
        
      </div>
    </div>
    
    
    
    
  </div>
  </div> <!-- row -->
   
  

  </div>    
        
        
           <div class="row">
           <div class="tags" style="display: block;">
            <h4>Productos relacionados</h4>
             
               
               
               
               <div id="slider-related" class="flexslider">
                              <ul class="slides">
                                
     @foreach($relatedArticles as $article_related)
                                 
                                 <li>
                                 <a href="{{url('/articulos/'.$article_related->category->gender.'/'.$article_related->category->slug.'/'.$article_related->slug)}}">
                                 
                                 <span class="text-center related-title">{{$article_related->name}}</span>
                                  <img src="/images/articles/{{$article_related->images[0]->image_url}}" alt="Slide {{$article_related->id}}"/>
                                 
                                  </a>
                                
                              </li>
                              
                              @endforeach
                              
                          </ul>
                      </div>
            
           
        </div>
            </div>
             
               
                
               
            <div class="row">    
        <div class="tags">
            <h4>Tags</h4>
            @foreach($article->tags as $tag)
            <a class="tag" href="{{url('/tags/'.$tag->slug)}}">{{$tag->name}}</a>
            @endforeach
        </div>
        
        </div>
                
      
      
      
     
   </div>
   
   </div>
   
   
   
   
   
   
   
@endsection