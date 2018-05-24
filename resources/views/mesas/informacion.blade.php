<?php 

$cantidad = 0

?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
		<meta name="viewport" content="width=device-width, initial-scale=1"/>
		<title>modulo mesero</title>
		
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
					<h1 class="header center white-text lighten-5">Información de la mesa</h1>
					<div class="row center">
						<h5 class="header center white-text col s12 lighten-5">Mira la lista de meseros e invitados de esta mesa.</h5>
					</div>
				</div>
			</div>
			<div class="parallax"><img src="{{ asset('/img/nuevas/background1.jpg') }}" alt="Unsplashed background img 1"></div>
		</div>

		<div class="container">
			<section class="wrapper style5">
				<div class="inner" align="center">
				
					@if($mesa->capacidad == 8)
									
					<img class="activator" src="{{ asset('/img/mesas/mesa1.png') }}" width="30%"  >
					
					@endif
					@if($mesa->capacidad == 12)
					
					<img class="activator" src="{{ asset('/img/mesas/mesa2.png') }}" width="30%"  >
					
					@endif
					@if($mesa->capacidad == 10)
					
					<img class="activator" src="{{ asset('/img/mesas/mesa5.png') }}" width="30%"  >
					
					@endif
					@if($mesa->capacidad == 15)
					
					<img class="activator" src="{{ asset('/img/mesas/mesa6.jpeg') }}" width="30%"  >
					
					@endif
					@if($mesa->capacidad == 13)
					
					<img class="activator" src="{{ asset('/img/mesas/mesa7.jpg') }}" width="30%"  >
					
					@endif
					
					<div align="center" id="meseroAsignado"><h4>Invitados</h4></div>
					
					<table>
						<thead>
							<tr>
								<th>Nombre(s)</th>
								<th>Apellido(s)</th>
								<th>Regalo</th>
								<th>Acción</th>
							</tr>
						</thead>
						<tbody>
							
							@foreach($invitados as $invitado)	
							{{ $cantidad++ }}
							<tr>
								<td>{{ $invitado->nombres }}</td>
								<td>{{ $invitado->apellidos }}</td>
								<td>{{ $invitado->tipo }}</td>
								<td></td>
							</tr>
							
							@endforeach	
							@if($cantidad < $mesa->capacidad)
							
							<tr>
								<td></td>
								<td></td>
								<td></td>
								<td><a class="small material-icons" href="{{ route('invitadosdisponibles', $mesa->id) }}"><i class="material-icons">add</i></a></td>
							</tr>
							
							@endif
							
						</tbody>
					</table>
					
					<div align="center" id="meseroAsignado"><h4>Meseros</h4></div>
					
					<table>
						<thead>
							<tr>
								<th>Nombre(s)</th>
								<th>Apellido(s)</th>
								<th>Acción</th>
							</tr>
						</thead>
						<tbody>
							
							@foreach($meseros as $mesero)	
							
							<tr>
								<td>{{ $mesero->nombres }}</td>
								<td>{{ $mesero->apellidos }}</td>
								<td></td>
							</tr>
							
							@endforeach	
							
							<tr>
								<td></td>
								<td></td>
								<td><a class="small material-icons" href="{{ route('meserosdisponibles', $mesa->id) }}"><i class="material-icons">add</i></a></td>
							</tr>
							
						</tbody>
					</table>
					
				</div>
			</section>
		</div>

	  <!--  Scripts-->
		<script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
		<script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
		<script src="{{ asset('/js/nuevas/materialize.js') }}"></script>
		<script src="{{ asset('/js/nuevas/init.js') }}"></script>
		<script src="{{ asset('/js/nuevas/dropdown.js') }}"></script>
		<script src="{{ asset('/js/nuevas/mesero.js') }}"></script>
		<!--<script src="{{ asset('/js/nuevas/mesas.js') }}"></script>-->
	</body>
</html>
