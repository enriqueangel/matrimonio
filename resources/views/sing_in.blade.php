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
							<li><a href="{{ route('registro') }}">Nuevo Usuario</a></li>
							<!--<li><a class="dropdown-trigger" href="#!"  data-target="dropdown1">Organización<i class="material-icons right">arrow_drop_down</i></a></li>-->
							<!--<li><a href="catalogo.html">Nuestros productos</a></li>-->
							<!--<li><a href="carrito.html"><i class="material-icons" size="small">shopping_cart</i></a></li>-->
						</ul>
					</div>
				</ul>
			
				<ul id="nav-mobile" class="sidenav">
					<li><a href="{{ route('registro') }}">Nuevo Usuario</a></li>
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
					<h1 class="header center white-text lighten-5">LOGEATE</h1>
					<div class="row center">
						<h5 class="header center white-text col s12 lighten-5">y empieza a organizar tus eventos.</h5>
					</div>
				</div>
			</div>
			<div class="parallax"><img src="{{ asset('/img/nuevas/background1.jpg') }}" alt="Unsplashed background img 1"></div>
		</div>

		<div class="container">
	 		<center>
	 			
	 			<br><br>
	
				<div class="container">
					<div class="z-depth-1 grey lighten-4 row" style="display: inline-block; padding: 32px 48px 0px 48px; border: 1px solid #EEE;">
					
						{!! Form::open(['route' => 'login', 'method' => 'POST', 'id' => 'signin', 'class' => 'panel']) !!}
						
							<div class='row uniform'>
								
								@include('flash::message')
								
								<div class="input-field col s12"> 
									<input type="email" name="correo" placeholder= "ejemplo@ejemplo.com" id="correo" class="validate" />
									<label class="active" for="correo">Correo electronico</label>
									<span class="helper-text" style="display: none; color: #f00" data-error="wrong" id="errorCorreo">El correo es obligatorio.</span>
								</div>
								
								<div class="input-field col s12"> 
									<input type="password" name="password" id="password" class="validate" />
									<label class="active" for="password">Password</label>
									<span class="helper-text" style="display: none; color: #f00" data-error="wrong" id="errorPassword">La contraseña es obligatoria.</span>
								</div>
								
							</div>
						
							<center>
								<div class='row'>
									<button type='button' name='btn_login' class='col s12 btn btn-large waves-effect' id='iniciar'>iniciar</button>
								</div>
							</center>
							
						{!! Form::close() !!}
						
					</div>
				</div>
    		</center>
    		<br>
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
		
			$('#iniciar').click(() => {
					
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
					
				if($('#correo').val() != '' && $('#password').val() != '')
					$('#signin').submit()
			})
		
		</script>
	</body>
</html>
