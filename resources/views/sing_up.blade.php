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
							<li><a href="{{ route('login') }}">Ingresar</a></li>
							<!--<li><a class="dropdown-trigger" href="#!"  data-target="dropdown1">Organización<i class="material-icons right">arrow_drop_down</i></a></li>-->
							<!--<li><a href="catalogo.html">Nuestros productos</a></li>-->
							<!--<li><a href="carrito.html"><i class="material-icons" size="small">shopping_cart</i></a></li>-->
						</ul>
					</div>
				</ul>
			
				<ul id="nav-mobile" class="sidenav">
					<li><a href="{{ route('login') }}">Ingresar</a></li>
					<!--<li><a class="dropdown-trigger" href="#!"  data-target="dropdown2">Organización<i class="material-icons right">arrow_drop_down</i></a></li>-->
					<!--<li><a href="mesero.html">Meseros</a></li>-->
					<!--<li><a href="catalogo.html">Nuestros productos</a></li>-->
					<!--<li><a href="carrito.html"><i class="material-icons" size="small">shopping_cart</i></a></li>-->
				</ul>
				
				<a href="#" data-target="nav-mobile" class="sidenav-trigger"><i class="material-icons">menu</i></a>
			
				<ul id="dropdown1" class="dropdown-content">
					<li><a href="invitado.html">Invitados</a></li>
					<li class="divider"></li>
					<li><a href="mesero.html">Meseros</a></li>
					<li class="divider"></li>
					<li><a href="mesas.html">Mesas</a></li>
				</ul>
				
				<ul id="dropdown2" class="dropdown-content">
					<li><a href="invitado.html">Invitados</a></li>
					<li class="divider"></li>
					<li><a href="mesero.html">Meseros</a></li>
					<li class="divider"></li>
					<li><a href="mesas.html">Mesas</a></li>
				</ul>
			
			</div>
		</nav>

		<div id="index-banner" class="parallax-container">
			<div class="section no-pad-bot">
				<div class="container">
					<br><br>
					<h1 class="header center white-text lighten-5">CREACION DE USUARIO</h1>
					<div class="row center">
						<h5 class="header center white-text col s12 lighten-5">Crea tu usuario nuevo para empezar a planear tu boda</h5>
					</div>
					<br><br>
				</div>
			</div>
			<div class="parallax"><img src="{{ asset('/img/nuevas/background1.jpg') }}" alt="Unsplashed background img 1"></div>
		</div>

	  	<div class="container">
			<section class="wrapper style5">
				<div class="inner">
					<section>
					<h4 style="text-align: center;">Datos Iniciales</h4>
					
						{!! Form::open(['route' => 'registro', 'method' => 'POST', 'id' => 'signup']) !!}
						
							<div class="row uniform">
								
								@include('flash::message')
							
								<div class="input-field"> 
									<input type="text" name="nombre" id="nombre" class="validate" />
									<label class="active" for="nombre">Nombre(s) Cliente</label>
									<span class="helper-text" style="display: none; color: #f00" data-error="wrong" id="errorNombre">El nombre es obligatorio.</span>
								</div>
								
								<div class="input-field">
									<input type="text" name="apellido" id="apellido" class="validate" />
									<label class="active" for="apellido">Apellido(s) Cliente</label>
									<span class="helper-text" style="display: none; color: #f00" data-error="wrong" id="errorApellido">El apellido es obligatorio.</span>
								</div>
								
								<div class="input-field"> 
									<input type="text" name="dni" id="dni" class="validate" />
									<label class="active" for="dni">DNI Cliente</label>
									<span class="helper-text" style="display: none; color: #f00" data-error="wrong" id="errorDni">El DNI es obligatorio.</span>
								</div>
								
								<div class="input-field"> 
									<input type="text" name="direccion" id="direccion" class="validate" />
									<label class="active" for="direccion">Dirección Cliente</label>
									<span class="helper-text" style="display: none; color: #f00" data-error="wrong" id="errorDireccion">La direccion es obligatoria.</span>
								</div>
							
								<div class="input-field"> 
									<input type="email" name="correo" placeholder= "ejemplo@ejemplo.com" id="correo" class="validate" />
									<label class="active" for="correo">Correo electronico</label>
									<span class="helper-text" style="display: none; color: #f00" data-error="wrong" id="errorCorreo">El correo es obligatorio.</span>
								</div>
							
								<div class="input-field"> 
									<input type="password" name="password" id="password" class="validate" />
									<label class="active" for="password">Password</label>
									<span class="helper-text" style="display: none; color: #f00" data-error="wrong" id="errorPassword">La contraseña es obligatoria.</span>
								</div>
							
							</div>
							<br>
							<div class="12u$">
								<ul class="actions" style="text-align: center">
									<li><input type="button" value="inscribirse" class="btn-large waves-effect waves-light teal lighten-1" style="color: #000" id="registar"/></li>
								</ul>
							</div>
							<br>
							<br>
							
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
		
		<script type="text/javascript">
		
			$(document).ready(() => {
			    M.updateTextFields()
			})
		
			$('#registar').click(() => {
					
				if($('#password').val() == ''){
					$('#errorPassword').css('display', 'block')
					$('#password').focus()
				} else 
					$('#errorPassword').css('display', 'none')
					
				if($('#correo').val() == ''){
					$('#errorCorreo').css('display', 'block')
					$('#correo').focus()
				} else 
					$('#errorCorreo').css('display', 'none')
					
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
					
				if($('#nombre').val() != '' && $('#apellido').val() != '' && $('#dni').val() != '' && $('#direccion').val() != '' && $('#correo').val() != '' && $('#password').val() != '')
					$('#signup').submit()
			})
		
		</script>

	</body>
</html>