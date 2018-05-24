<?php

use App\Camarero;

$nombre = '';
$apellido = '';
$direccion = '';
$dni = '';

if($id != 0){
	$camarero = Camarero::join('usuarios', 'camareros.id_usuario', '=', 'usuarios.id')
		->where('camareros.id_usuario', $id)
		->get();
		
	$nombre = $camarero[0]->nombres;
	$apellido = $camarero[0]->apellidos;
	$direccion = $camarero[0]->direccion;
	$dni = $camarero[0]->dni;
}

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
					<h1 class="header center white-text lighten-5">AGREGA MESEROS</h1>
					<div class="row center">
						<h5 class="header center white-text col s12 lighten-5">Agrega los meseros que atenderan el evento.</h5>
					</div>
				</div>
			</div>
			<div class="parallax"><img src="{{ asset('/img/nuevas/background1.jpg') }}" alt="Unsplashed background img 1"></div>
		</div>
		
		<div class="container">
			<section class="wrapper style5">
				<div class="inner">
					<section>
						<h4 style="text-align: center;">Datos Iniciales</h4>
						
						{!! Form::open(['route' => 'agregarmesero', 'method' => 'POST', 'id' => 'crearForm', 'class' => 'panel']) !!}
						
							<div class="row uniform">
								
								@include('flash::message')
								
								<div class="input-field"> 
									<input type="text" name="nombre" id="nombre" class="validate" value="{{ $nombre }}" />
									<label class="active" for="nombre">Nombre(s) Mesero</label>
									<span class="helper-text" style="display: none; color: #f00" data-error="wrong" id="errorNombre">El nombre es obligatorio.</span>
								</div>
								
								<div class="input-field">
									<input type="text" name="apellido" id="apellido" class="validate" value="{{ $apellido }}" />
									<label class="active" for="apellido">Apellido(s) Mesero</label>
									<span class="helper-text" style="display: none; color: #f00" data-error="wrong" id="errorApellido">El apellido es obligatorio.</span>
								</div>
			
								<div class="input-field"> 
									<input type="text" name="dni" id="dni" class="validate" value="{{ $dni }}" />
									<label class="active" for="dni">DNI Mesero</label>
									<span class="helper-text" style="display: none; color: #f00" data-error="wrong" id="errorDni">El DNI es obligatorio.</span>
								</div>
								
								<div class="input-field"> 
									<input type="text" name="direccion" id="direccion" class="validate" value="{{ $direccion }}" />
									<label class="active" for="direccion">Dirección Mesero</label>
									<span class="helper-text" style="display: none; color: #f00" data-error="wrong" id="errorDireccion">La direccion es obligatoria.</span>
								</div>
								
								<input type="hidden" name="id" id="id" value="{{ $id }}" />
								
							</div>
							<div class="12u$">
								<ul class="actions" style="text-align: center">
									<li><input type="button" value="contratar" class="waves-effect waves-light btn" id="contratar"/></li>
								</ul>
							</div>
							
						{!! Form::close() !!}
						
					</section>
				</div>
			</section>
		</div>

	  <!--  Scripts-->
		<script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
		<script src="{{ asset('/js/nuevas/materialize.js') }}"></script>
		<script src="{{ asset('/js/nuevas/init.js') }}"></script>
		<script src="{{ asset('/js/nuevas/dropdown.js') }}"></script>
		<script src="{{ asset('/js/nuevas/mesero.js') }}"></script>
		
		<script type="text/javascript">
		
			$(document).ready(() => {
			    M.updateTextFields()
			})
		
			$('#contratar').click(() => {
					
				if($('#direccion').val() == ''){
					$('#errorDireccion').css('display', 'block')
					$('#direccion').focus()
				} else 
					$('#errorDireccion').css('display', 'none')
					
				if($('#dni').val() == ''){
					$('#errorDni').css('display', 'block')
					$('#dni').focus()
				} else 
					$('#errorDni').css('display', 'none')
					
				if($('#apellido').val() == ''){
					$('#errorApellido').css('display', 'block')
					$('#apellido').focus()
				} else 
					$('#errorApellido').css('display', 'none')
					
				if($('#nombre').val() == ''){
					$('#errorNombre').css('display', 'block')
					$('#nombre').focus()
				} else 
					$('#errorNombre').css('display', 'none')	
					
				if($('#nombre').val() != '' && $('#apellido').val() != '' && $('#dni').val() != '' && $('#direccion').val() != '')
					$('#crearForm').submit()
			})
		
		</script>

	</body>
</html>
