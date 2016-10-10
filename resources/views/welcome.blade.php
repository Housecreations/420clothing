@extends('admin.templates.principal')

@section('title', "420 Clothing") 


@section('content') 



<div class="carousel-index">
        <div class="slideshow index" 
            data-cycle-fx=carousel
            data-cycle-timeout=5000
            data-cycle-carousel-visible=1
           data-cycle-slides="> a"
            data-cycle-next="#next1"
            data-cycle-prev="#prev1"
            data-cycle-carousel-fluid=true
            >
            
            @foreach($carousel as $image)
            <a href="{{$image->url_to}}"><img alt="" src="/images/slider/{{$image->image_url}}" >
            </a>
           @endforeach
           
          
        </div>
        <a href="#" id="prev1">&lt;&lt; Prev </a>
        <a href="#" id="next1"> Next &gt;&gt; </a>
      </div>


<div class="container">
    <hr>
    <div class="col-md-6 col-sm-6 gentleman">
      <a href="/articulos/Caballeros">
       <img src="/images/front_images/{{$front_images->gentleman_image}}" alt="Imagen gentleman">
       
       <div class="box-overlay">
           <div class="box-description">
               <h1>Caballeros</h1>
           </div>
       </div>
        </a>
       
    </div>

        
           <div class="col-md-6 col-sm-6 ladies">
           <a href="/articulos/Damas">
            <img src="/images/front_images/{{$front_images->ladies_image}}" alt="Imagen ladies">
            
                <div class="box-overlay">
                   <div class="box-description">
                       <h1>Damas</h1>
                   </div>
               </div>
               </a>
            </div>
        
        <div class="col-md-6 col-sm-6 acc">
           <a href="/articulos/Accesorios">
            <img src="/images/front_images/{{$front_images->acc_image}}" alt="Imagen acc">
                <div class="box-overlay">
                   <div class="box-description">
                       <h1>Accesorios</h1>
                   </div>
               </div>
        </div>
    

    
    <div class="col-md-12 outlet">
        <a href="/descuentos">
        <img src="/images/front_images/{{$front_images->outlet_image}}" alt="Imagen outlet">
        <div class="box-overlay">
           <div class="box-description">
               <h1>Outlet</h1>
           </div>
       </div>
       </a> 
    </div>
    
</div>


@endsection

@section('js')
<script src="{{ asset('js/jquery.cycle2.min.js') }}"></script>
        <script src="{{ asset('js/jquery.cycle2.carousel.min.js') }}"></script>
     <script>$.fn.cycle.defaults.autoSelector = '.slideshow';</script>
     
     
<script src="js/jquery.nivo.slider.pack.js"></script>
 <script type="text/javascript">
    $(window).load(function() {
        $('#slider').nivoSlider({
            pauseTime: 6000,
          prevText: '',
          nextText: '',
          controlNav: false,
        });
    });
    </script>
@endsection

