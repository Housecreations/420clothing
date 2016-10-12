@extends('admin.templates.principal')
 @if(sizeof($categoriesGender)==0)
 @section('title', 'No se encontraron categorías') 
 @else
@section('title', $gender) 
@endif


@section('content') 
   
    <div class="items col-md-10 col-sm-10 col-xs-10 card"> 
   
      
    @if(sizeof($categoriesGender)==0)
    <ol class="breadcrumb bc text-center">
  <li><a href="/">Inicio</a></li>
<hr>
  
</ol>

<h4 class="text-center">Lo sentimos, no se encontraron categorías</h4>

</div>
     @else
       
      
       <ol class="breadcrumb bc text-center">
  <li><a href="/">Inicio</a></li>

    
    <li class="active">{{$gender}}</li>
  <hr>
</ol>
       
     @foreach($categoriesGender as $category)
    @if($category->articles()->count() > 0)
    <div class="portfolio-item col-sm-4 col-xs-6 bottom-space-md">
    
        
        <!--portfolio-item col-sm-4 col-xs-6 margin-bottom-40-->
        
       
      
                        <a href="{{ url('/articulos/'.$category->gender.'/'.$category->slug)}}">
                            <figure class="animate fadeInLeft">
                                <div class="grid-image">
                                    <div class="featured-info">
                                        <div class="info-wrapper">{{$category->name}}</div>
                                    </div>
                                    <img alt="image1" src="/images/articles/{{$category->articles[0]->images[0]->image_url}}">
                                </div>
                            </figure>
                        </a>
                   
       
        
        
    
  
        
   {{--
			    	    
         <a href="{{ url('/articulos/'.$category->gender.'/'.$category->slug)}}" >
   <div class="grid mask">
                    
						<figure>
							<img class="img-responsive" src="/images/articles/{{$category->articles[0]->images[0]->image_url}}" alt="">
							<figcaption>
								<h5>{{$category->name}}</h5>
								
							</figcaption><!-- /figcaption -->
						</figure><!-- /figure -->
			    	</div><!-- /grid-mask -->
    
        </a>
        
       --}} 
        
   
    
        
        
        
        
        
    
    
    
 
   
    </div>
     @endif
    @endforeach
  
  @endif
  
   </div>
   
@endsection