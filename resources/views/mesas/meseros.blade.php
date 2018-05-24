<?php
// dd($meseros);

?>

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
					<li><a href="{{ route('productos') }}">Productos</a></li>
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
					<h1 class="header center white-text lighten-5">MESEROS</h1>
					<div class="row center">
						<h5 class="header center white-text col s12 lighten-5">Lista de meseros listos para trabajar.</h5>
					</div>
					<br><br>
				</div>
			</div>
			<div class="parallax"><img src="{{ asset('/img/nuevas/background1.jpg') }}" alt="Unsplashed background img 1"></div>
		</div>

		<div class="container">
			<section>
				<h4>Meseros</h4>
				
				{!! Form::open(['route' => 'asignarmeseros', 'method' => 'POST', 'id' => 'crearForm']) !!}
				
					<div class="row uniform">
						
						@include('flash::message')
						
						<div class="input-field">
							<!--<span>Meseros:</span>-->
							<br><br>
							<div class="row uniform">
								
								@foreach($meseros as $mesero)
									
								<div class="col s3">
									<label>
										<input class="filled-in" name="mesero[]" type="checkbox" value="{{ $mesero->id }}" id="mesero"/>
										<span>{{ $mesero->nombres }} {{ $mesero->apellidos }}</span>
									</label>
								</div>
									
								@endforeach
								
							</div>
							<span class="helper-text" style="display: none; color: #f00" data-error="wrong" id="errorMesero">Debe seleccionar algun mesero.</span>
						</div>
						
						<input type="hidden" name="mesa" id="mesa" value="{{ $mesa }}" />
						
					</div>
					<div class="12u$">
						<ul class="actions" style="text-align: center">
							<li><input type="button" value="asignar" class="waves-effect waves-light btn" id="asignar"/></li>
						</ul>
					</div>
					
				{!! Form::close() !!}
				
			</section>
		</div>

	  <!--  Scripts-->
		<script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
		<script src="{{ asset('/js/nuevas/materialize.js') }}"></script>
		<script src="{{ asset('/js/nuevas/init.js') }}"></script>
		<script src="{{ asset('/js/nuevas/dropdown.js') }}"></script>
		<script src="{{ asset('/js/nuevas/producto.js') }}"></script>
		
		<script type="text/javascript">
		
			$(document).ready(() => {
			    M.updateTextFields()
			})
			
			$('#asignar').click(() => {
				if($('input[name="mesero[]"]:checkbox').is(':checked'))
					$('#errorMesero').css('display', 'none')
				else 
					$('#errorMesero').css('display', 'block')
					
				if($('input[name="mesero[]"]:checkbox').is(':checked'))
					$('#crearForm').submit()
			})
			
		</script>
		
	</body>
</html>
