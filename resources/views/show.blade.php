@extends('admin.templates.principal')
 @if(sizeof($articles)==0)
 @section('title', 'No se encontraron articulos') 
 @else
@section('title', $articles[0]->category->name) 
@endif


@section('content') 
   
    <div class="items col-md-10 col-sm-10 col-xs-10 card"> 
   
      
    @if(sizeof($articles)==0)
    <ol class="breadcrumb bc text-center">
  <li><a href="/">Inicio</a></li>
<hr>
  
</ol>

<h4 class="text-center">Lo sentimos, no se encontraron artículos</h4>

</div>
     @else
       
      
       <ol class="breadcrumb bc text-center">
  <li><a href="/">Inicio</a></li>
  <li><a href="/articulos/{{$articles[0]->category->gender}}">{{$articles[0]->category->gender}}</a></li>
    
    <li class="active"> {{$articles[0]->category->name}}</li>
  <hr>
</ol>
       
     @foreach($articles as $article)
    
    <div class="portfolio-item col-sm-4 col-xs-6 bottom-space-md">
    
         
        
          <a href="{{  route('mostrar.articulo', [$article->category->gender,$article->category->slug, $article->slug])}}">
                          @if($article->discount > 0)
                    <div class="oferta">{{$article->discount}}% de descuento</div>
                    @endif
        
                            <figure class="animate fadeInLeft">
                                <div class="grid-image">
                                    <div class="featured-info">
                                        <div class="info-wrapper">{{$article->name}} <div class="price-wrapper">{{$article->price}} {{$currency}}</div></div>
                                       
                                        
                                        
                                    </div>
                                    <img alt="image1" src="/images/articles/{{$article->images[0]->image_url}}">
                                </div>
                            </figure>
                        </a>
                   
      
    
    </div>
     
    @endforeach
  
  @endif
  
   </div>
   
@endsection