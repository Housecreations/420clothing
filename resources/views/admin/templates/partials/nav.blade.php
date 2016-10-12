

       
       
       <div class="responsive_menu">
        <ul class="main_menu">
            <li><a href="/">Inicio</a></li>
          
           
                                    <li><a href="/articulos/Caballeros">Caballeros</a>
					            	<ul>
                                        @foreach($categories as $category)
                                        @if($category->gender == 'Caballeros')
					            		<li><a href="/articulos/{{$category->gender}}/{{$category->slug}}">{{$category->name}}</a></li>
					            		@endif
                                        @endforeach
                                      
					            	</ul>
					            </li>
					            
					            <li><a href="/articulos/Damas">Damas</a>
					            	<ul>
                                        @foreach($categories as $category)
					            		@if($category->gender == 'Damas')
					            		<li><a href="/articulos/{{$category->gender}}/{{$category->slug}}">{{$category->name}}</a></li>
					            		@endif
                                        @endforeach
                                      
					            	</ul>
					            </li>
					             <li><a href="/articulos/Accesorios">Accesorios</a>
					            	<ul>
                                        @foreach($categories as $category)
					            		@if($category->gender == 'Accesorios')
					            		<li><a href="/articulos/{{$category->gender}}/{{$category->slug}}">{{$category->name}}</a></li>
					            		@endif
					            		
                                        @endforeach
                                      
					            	</ul>
					            </li>
                              
                               
					            
					            <li><a href="{{ url('/tiendas')}}">Tiendas</a></li>
					            <li><a href="{{ route('contact')}}">Contacto</a></li>
					         
                                
                                
                                
                                
                                
                                 @if(Auth::user())
                    
                                 <li><a href="#">{{Auth::user()->name}}</a>
					            	<ul>
					            	@if(Auth::user()->type == 'admin')
					            		<li><a href="{{ route('admin.index')}}">Panel de control</a></li>
					            		<li><a href="{{ route('admin.password.edit')}}">Mi cuenta</a></li>
					            		@else
					            		<li><a href="{{ route('member.index')}}">Mi cuenta</a></li>
					            		@endif
					            		<li><a href="{{ route('admin.auth.logout')}}">Salir</a></li>
					            		
					            	</ul>
					            </li>
                                
                                @else
                                 <li><a href="{{route('admin.auth.login')}}">Iniciar sesión</a></li>
                                @endif
                                
        </ul> <!-- /.main_menu -->
    </div> <!-- /.responsive_menu -->

	<header class="site-header clearfix">
		<div class="">
       @if(Auth::user())
       
        @if(Auth::user()->type == 'member')
         <a href="{{url('/carrito')}}" class="carrito"> <span class="item-count">{{$productsCount}} </span><i class="fa fa-shopping-cart"></i></a>
        @endif
        @else
        <a href="{{url('/carrito')}}" class="carrito"><span class="item-count">{{$productsCount}} </span><i class="fa fa-shopping-cart"></i> </a>
        
        @endif
			<div class="row">

				<div class="col-md-12">

					<div class="logo">
						<a href="/">
							<img src="{{asset('images/logo.png')}}" alt="Medigo by templatemo">
						</a>
					</div>	<!-- /.logo -->

					<div class="main-navigation pull-right">

						<nav class="main-nav visible-md visible-lg">
							<ul class="sf-menu">
							
					          
                                 
                                    <li class="left-side"><a href="/articulos/Caballeros">Caballeros</a>
					            	<ul>
                                        @foreach($categories as $category)
                                        @if($category->gender == 'Caballeros')
					            		<li><a href="/articulos/{{$category->gender}}/{{$category->slug}}">{{$category->name}}</a></li>
					            		@endif
                                        @endforeach
                                      
					            	</ul>
					            </li>
					            <li class="left-side"><a href="/articulos/Damas">Damas</a>
					            	<ul>
                                        @foreach($categories as $category)
					            		@if($category->gender == 'Damas')
					            		<li><a href="/articulos/{{$category->gender}}/{{$category->slug}}">{{$category->name}}</a></li>
					            		@endif
                                        @endforeach
                                      
					            	</ul>
					            </li>
					             <li class="left-side"><a href="/articulos/Accesorios">Accesorios</a>
					            	<ul>
                                        @foreach($categories as $category)
					            		@if($category->gender == 'Accesorios')
					            		<li><a href="/articulos/{{$category->gender}}/{{$category->slug}}">{{$category->name}}</a></li>
					            		@endif
					            		
                                        @endforeach
                                      
					            	</ul>
					            </li>
                              
                               
					            
					            <li class="right-side"><a href="{{ url('/tiendas')}}">Tiendas</a></li>
					            <li class="right-side"><a href="{{ route('contact')}}">Contacto</a></li>
                               
                                
                                
                                
                                
                                 @if(Auth::user())
                                 <li class="right-side"><a href="#">{{Auth::user()->name}}</a>
					            	<ul class="admin-dropdown">
					            		@if(Auth::user()->type == 'admin')
					            		<li><a href="{{ route('admin.index')}}">Panel de control</a></li>
					                   <li><a href="{{ route('admin.password.edit')}}">Mi cuenta</a></li>
					            		@else
					            		<li><a href="{{ route('member.index')}}">Mi cuenta</a></li>
					            		@endif
					            		<li><a href="{{ route('admin.auth.logout')}}">Salir</a></li>
					            		
					            	</ul>
					            </li>
                                
                                @else
                                 <li class="right-side"><a href="{{route('admin.auth.login')}}">Iniciar sesión</a>
                                 </li>
                                 
                                @endif
                                
                                
                                
                                
							</ul> <!-- /.sf-menu -->
						</nav> <!-- /.main-nav -->

						<!-- This one in here is responsive menu for tablet and mobiles -->
					    <div class="responsive-navigation visible-sm visible-xs">
					        <a href="#nogo" class="menu-toggle-btn">
					            <i class="fa fa-bars"></i>
					        </a>
					    </div> <!-- /responsive_navigation -->

					</div> <!-- /.main-navigation -->

				</div> <!-- /.col-md-12 -->

			</div> <!-- /.row -->

		</div> <!-- /.container -->
	</header> <!-- /.site-header -->





            