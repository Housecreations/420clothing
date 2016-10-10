<!DOCTYPE html>
<html lang="es">
<head>
<title>@yield('title', 'Default')</title>




<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	
    <meta name="keywords" content="a2 softway, maquina fiscal">
	<meta name="description" content="Aquí encontrarás el mejor software administrativo y las mejores máquinas fiscales para tu empresa">
    <meta name="author" content="housecreations">
    <meta name="owner" content="D'sistemas y PC, C.A.">
    
    
	<!-- Google Fonts -->
	<link href="https://fonts.googleapis.com/css?family=Lato:300" rel="stylesheet" type="text/css">


    <link href="//cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet">

	<!-- Stylesheets -->
	<link rel="stylesheet" href="{{ asset('css/bootstrap.css')}}">
<link rel="stylesheet" href="{{ asset('css/flexslider.css')}}">
<link rel="stylesheet" href="{{ asset('css/blue-scheme.css')}}">
<link rel="stylesheet" href="{{ asset('css/animate.min.css')}}">
<link rel="stylesheet" href="{{ asset('css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{ asset('css/nivo-slider.css')}}">
    <link rel="stylesheet" href="{{ asset('plugins/chosen/chosen.css')}}">
	
	
	<!-- JavaScripts -->
	<script src="{{ asset('js/jquery-1.10.2.min.js') }}"></script>
		<script src="{{ asset('js/jquery-migrate-1.2.1.min.js') }}"></script> 
    <script src="{{ asset('js/bootstrap.js') }}"></script> 
   
	

</head>

<body style="">
<div id="preloader">
    <div id="loader"></div>
</div>
<!--==============================
              header
=================================-->


    @include('admin.templates.partials.nav') 
    
 
 
<!--=====================
          Content
======================-->
<section id="" class="">
  
    
     
        @include('flash::message')
        @include('admin.templates.partials.errors')
      
        
  
        @yield('content')
     
    
    
</section>

<!--==============================
              footer
=================================-->
<!-- Socialize -->
	<footer id="footer" class="relative">
  
    
      <div class="">
      
       <ul class="social-icon">
          <li><a href="http://www.facebook.com/420clothingmonagas" target="_blank" class="fa fa-facebook wow bounceIn" data-wow-delay="0.3s"></a></li>
          <li><a href="http://www.twitter.com/Clothing420" target="_blank" class="fa fa-twitter wow bounceIn" data-wow-delay="0.6s"></a></li>

          <li><a href="http://www.instagram.com/420_clothing" target="_blank" class="fa fa-instagram wow bounceIn" data-wow-delay="0.9s"></a></li>
        
         
        </ul>
      
      
       <div class="sub-copy">420Clothing &copy; 2016 | Desarrollado por <a href="http://www.housecreations.com.ve" rel="nofollow">House Creations</a></div>
      </div>
    
 

</footer>


    <script src="//cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/bootstrap3-editable/js/bootstrap-editable.min.js"></script>
<script src="{{ asset('js/min/plugins.min.js') }}"></script>
<script src="{{ asset('js/medigo-custom.js') }}"></script>
<script src="{{ asset('js/wow.min.js') }}"></script>
    
     
   
    
    @yield('js')
    
     
   
    <script>
$('div.alert').not('.alert-important').delay(3000).slideUp(350);
</script>
 
  

</body>
</html>