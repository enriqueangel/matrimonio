<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
		<meta name="viewport" content="width=device-width, initial-scale=1"/>
		<title>Matrimonio</title>
		<!-- CSS  -->
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
		<link href="{{ asset('/styles/materialize.css') }}" type="text/css" rel="stylesheet" media="screen,projection"/>
		<link href="{{ asset('/styles/style.css') }}" type="text/css" rel="stylesheet" media="screen,projection"/>
	</head>
	
	<body>
		<nav class="white" role="navigation">
			<div class="nav-wrapper container">
				<a id="logo-container" href="{{ route('principal') }}" class="brand-logo ">Matrimonios</a>
				<ul class="right hide-on-med-and-down">
					<div id="menu">
						<ul>
							
							@if(Auth::guest())
							
							<li><a href="{{ route('registro') }}">Nuevo Usuario</a></li>
							
							@else
							
							<li><a class="dropdown-trigger" href="#!"  data-target="dropdown1">Organización<i class="material-icons right">arrow_drop_down</i></a></li>
								
							@endif
							
							<li><a href="{{ route('catalogo') }}">Nuestros productos</a></li>
							
							@if(!Auth::guest())
					
							<li><a href="{{ route('logout') }}">Cerrar Sesión</a></li>
							
							@endif
							
							<li><a href="{{ route('carrito') }}"><i class="material-icons" size="small">shopping_cart</i></a></li>
						</ul>
					</div>
				</ul>
				
				<ul id="nav-mobile" class="sidenav">
					
					@if(Auth::guest())
							
					<li><a href="{{ route('registro') }}">Nuevo Usuario</a></li>
					
					@else
					
					<li><a class="dropdown-trigger" href="#!"  data-target="dropdown2">Organización<i class="material-icons right">arrow_drop_down</i></a></li>
						
					@endif
					
					<li><a href="{{ route('catalogo') }}">Nuestros productos</a></li>
					
					@if(!Auth::guest())
					
					<li><a href="{{ route('logout') }}">Cerrar Sesión</a></li>
					
					@endif
					
					<li><a href="{{ route('carrito') }}"><i class="material-icons" size="small">shopping_cart</i></a></li>
					
				</ul>
				
				<a href="#" data-target="nav-mobile" class="sidenav-trigger"><i class="material-icons">menu</i></a>
				
				<ul id="dropdown1" class="dropdown-content">
					
					@if(Session::get('estado') == 'mesas')
					
					<li><a href="{{ route('listamesas') }}">Administrar Mesas</a></li>
					<li class="divider"></li>
					
					@endif
					@if(Session::get('tipo') == 1)
					
					<li><a href="{{ route('agregarmesero') }}">Nuevo Mesero</a></li>
					<li class="divider"></li>
					<li><a href="{{ route('agregarproducto') }}">Nuevo Producto</a></li>
					<li class="divider"></li>
					<li><a href="{{ route('productos') }}">Productos</a></li>
					<li class="divider"></li>
					
					@endif
					@if(Session::get('tipo') == 2)
					
					<li><a href="{{ route('agregarinvitado') }}">Nuevo Invitado</a></li>
					<li class="divider"></li>
					<li><a href="{{ route('invitados') }}">Invitados</a></li>
					<li class="divider"></li>
					
					@endif
					
					<li><a href="{{ route('meseros') }}">Meseros</a></li>
					
				</ul>
				
				<ul id="dropdown2" class="dropdown-content">
					
					@if(Session::get('estado') == 'mesas')
					
					<li><a href="{{ route('listamesas') }}">Administrar Mesas</a></li>
					<li class="divider"></li>
					
					@endif
					@if(Session::get('tipo') == 1)
					
					<li><a href="{{ route('agregarmesero') }}">Nuevo Mesero</a></li>
					<li class="divider"></li>
					<li><a href="{{ route('agregarproducto') }}">Nuevo Producto</a></li>
					<li class="divider"></li>
					<li><a href="{{ route('productos') }}">Productos</a></li>
					<li class="divider"></li>
					
					@endif
					@if(Session::get('tipo') == 2)
					
					<li><a href="{{ route('agregarinvitado') }}">Nuevo Invitado</a></li>
					<li class="divider"></li>
					<li><a href="{{ route('invitados') }}">Invitados</a></li>
					<li class="divider"></li>
					
					@endif
					
					<li><a href="{{ route('meseros') }}">Meseros</a></li>
					
				</ul>
			</div>
		</nav>

		<div id="index-banner" class="parallax-container">
			<div class="section no-pad-bot">
				<div class="container">
					<br><br>
					<h1 class="header center white-text lighten-5">MATRIMONIO</h1>
					<div class="row center">
						<h5 class="header center white-text col s12 lighten-5">Una forma facil y rapida de organizar tu evento mas importante.</h5>
					</div>
					
					@if(Auth::guest())
					
					<div class="row center">
						<a href="{{ route('login') }}" id="download-button" class="btn-large waves-effect waves-light teal lighten-1">Inicia YA</a>
					</div>
					
					@endif
					
				</div>
			</div>
			<div class="parallax"><img src="{{ asset('/img/nuevas/background1.jpg') }}" alt="Unsplashed background img 1"></div>
		</div>

		<div class="container">
			<div class="section">
	
		      <!--   Icon Section   -->
			<div class="row">
				
				@for($i =0; $i < 6; $i++)
					@if($productos[$i]->id_categoria != 7)
					
				<div class="col s12 m4">
					<div class="icon-block">
					<h2 class="center brown-text"><i class="material-icons">loyalty</i></h2>
						<div class="row">
							    
							<div class="card">
								<div class="card">
									<div class="card-image waves-effect waves-block waves-light">
										<img class="activator" src="{{ $productos[$i]->imagen }}" height= "300px"  >
									</div>
									<div class="card-content">
										<p>{{ ucwords($productos[$i]->nombre) }}</p>
										<p>{{ $productos[$i]->precio }} c/u</p>
										<!--<a class="btn-floating halfway-fab waves-effect waves-light red pulse"><i class="material-icons">shopping_cart</i></a>-->
									</div>
									<div class="card-reveal">
										<span class="card-title grey-text text-darken-4">{{ ucwords($productos[$i]->nombre) }}<i class="material-icons right">close</i></span>
										<p>{{ $productos[$i]->descripcion }}</p>
									</div>
								</div>
							</div>
			          </div>
							  
					</div>
		        </div>
		        
		        	@endif
		        @endfor
				
		      </div>
			</div>
		</div>
	
		<div class="parallax-container valign-wrapper">
			<div class="parallax"><img src="{{ asset('img/matrimonio.jpg') }}" alt="Unsplashed background img 2"></div>
		</div>
	
		<!--<div class="container">-->
		<!--	<div class="section">-->
		<!--		<div class="row">-->
		<!--			<div class="col s12 center">-->
		<!--				<h3><i class="mdi-content-send brown-text"></i></h3>-->
		<!--				<h4>CONTACTANOS</h4>-->
		<!--				<p class="left-align light">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam scelerisque id nunc nec volutpat. Etiam pellentesque tristique arcu, non consequat magna fermentum ac. Cras ut ultricies eros. Maecenas eros justo, ullamcorper a sapien id, viverra ultrices eros. Morbi sem neque, posuere et pretium eget, bibendum sollicitudin lacus. Aliquam eleifend sollicitudin diam, eu mattis nisl maximus sed. Nulla imperdiet semper molestie. Morbi massa odio, condimentum sed ipsum ac, gravida ultrices erat. Nullam eget dignissim mauris, non tristique erat. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae;</p>-->
		<!--			</div>-->
		<!--		</div>-->
		<!--	</div>-->
		<!--</div>-->
	
	
		<footer class="page-footer teal">
			<div class="container">
				<div class="row">
					<div class="col l6 s12">
						<h5 class="white-text">Nuesta compañia</h5>
						<p class="grey-text text-lighten-4">Somos un equipo de estudiantes universitarios que trabajan en este proyecto como si fuera nuestro trabajo a tiempo completo. Cualquier notica ayudaría a apoyar y continuar el desarrollo de este proyecto y es muy apreciado.</p>
					</div>
					<div class="col l3 s12">
						<h5 class="white-text" >Equipo de trabajo</h5>
						<ul>
							<li><img class="responsive-img" src="{{ asset('/img/nuevas/developer1.png') }}" height="50" width="50"></li>
							<li><img class="responsive-img" src="{{ asset('/img/nuevas/developer2.png') }}" height="50" width="50"></li>
							<li><img class="responsive-img" src="{{ asset('/img/nuevas/developer3.png') }}" height="50" width="50"></li>
							<li><img class="responsive-img" src="{{ asset('/img/nuevas/developer4.png') }}" height="50" width="50"></li>
							<li><img class="responsive-img" src="{{ asset('/img/nuevas/developer5.png') }}" height="50" width="50"></li>
						</ul>
					</div>
					<div class="col l3 s12">
						<h5 class="white-text" align="center">Contacto</h5>
						<ul>
							<li><a class="white-text" href="#!">Carlos Enrique Angel</a></li>
							<br>
							<li><a class="white-text" href="#!">Ronald Felipe Gonzalez</a></li>
							<br>
							<li><a class="white-text" href="#!">Lina Johana Taborda</a></li>
							<br>
							<li><a class="white-text" href="#!">Yesica Cifuentes</a></li>
							<br>
							<li><a class="white-text" href="#!">Sebastian Hoyos</a></li>
						</ul>
					</div>
				</div>
			</div>
			<div class="footer-copyright">
			
			</div>
		</footer>
	
		<!--  Scripts-->
		<script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
		<script src="{{ asset('/js/nuevas/materialize.js') }}"></script>
		<script src="{{ asset('/js/nuevas/init.js') }}"></script>
		<script src="{{ asset('/js/nuevas/dropdown.js') }}"></script>
	  
	</body>
</html>
