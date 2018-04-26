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

<!DOCTYPE HTML>
<html>
	<head>
		<title>Nuevo Mesero</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="{{ asset('styles/main.css') }}" />
		<link href="{{ asset('styles/pixel-admin.min.css') }}" rel="stylesheet" type="text/css">
	</head>
	<body>
		<!-- Page Wrapper -->
		<div id="page-wrapper">
			<header id="header">
				<h1><a href="{{ route('principal') }}">Nuevo Mesero</a></h1>
				<nav id="nav">
					<ul>
						<li class="special">
							<a href="#menu" class="menuToggle"><span>Menu</span></a>
							<div id="menu">
								<ul>
									<!--<li><a href="usuario.html">Nuevo Usuario</a></li>-->
									<li><a href="{{ route('agregarproducto') }}">Nuevo Producto</a></li>
									<li><a href="{{ route('meseros') }}">Meseros</a></li>
									<li><a href="{{ route('productos') }}">Productos</a></li>
									<li><a href="{{ route('principal') }}">Principal</a></li>
									<li><a href="{{ route('logout') }}">Cerrar Sesión</a></li>
								</ul>
							</div>
						</li>
					</ul>
				</nav>
			</header>
		<!-- Main -->
			<article id="main">
				<header style="padding-top: 50px; padding-bottom: 50px;" >
					<h2>MATRIMONIOS</h2>
					<p>Creacion de un nuevo mesero</p>
				</header>
				<section class="wrapper style5" style="padding: 2em;">
					<div class="inner">
						<section>
							<h4 style="text-align: center;">Datos Iniciales</h4>
							
							{!! Form::open(['route' => 'agregarmesero', 'method' => 'POST', 'id' => 'agregar-form_id', 'class' => 'panel']) !!}
							
								<div class="row uniform">
								    
								    <div class="12u 12u$(xsmall)">
    									@include('flash::message')
    								</div>

									<div class="12u 12u$(xsmall)">
										<input type="text" name="nombre" id="nombre" value="{{ $nombre }}" placeholder="Nombre(s) mesero" />
									</div>

									<div class="12u$ 12u$(xsmall)">
										<input type="text" name="apellido"  id="apellido" value="{{ $apellido }}" placeholder="Apellido(s) mesero" />
									</div>

									<div class="12u$ 12u$(xsmall)">
										<input type="text"   name="direccion" id="direccion" value="{{ $direccion }}" placeholder="Dirección" />
									</div>
									
									<div class="12u$ 12u$(xsmall)">
										<input type="text"   name="dni" id="dni" value="{{ $dni }}" placeholder="DNI" />
										<input type="hidden" name="id" id="id" value="{{ $id }}" />
									</div>
								</div>
								<br>
								<div class="12u$">
									<ul class="actions" style="text-align: center">
										<li><input type="submit" value="Agregar" class="principal btn-block btn-lg" id="add_row"/></li>
									</ul>
								</div>
								
							{!! Form::close() !!}
							
						</section>
					</div>
				</section>
			</article>
		</div>
				

		<!-- Scripts -->
		<script src="{{ asset('js/jquery.min.js') }}"></script>
		<script src="{{ asset('js/jquery.scrollex.min.js') }}"></script>
		<script src="{{ asset('js/jquery.scrolly.min.js') }}"></script>
		<script src="{{ asset('js/skel.min.js') }}"></script>
		<script src="{{ asset('js/util.js') }}"></script>
		<script src="{{ asset('js/main.js') }}"></script>
		<!--<script src="{{ asset('js/invoice2.js') }}"></script>-->
		<script src="{{ asset('js/bootstrap.min.js') }}"></script>
		<script src="{{ asset('js/pixel-admin.min.js') }}"></script>
		
		<script type="text/javascript">
			$('div.alert').not('.alert-important').delay(3000).fadeOut(350);
		
			window.PixelAdmin.start([
				function () {
					$("#agregar-form_id").validate({ focusInvalid: true, errorPlacement: function () {} });
					
					$("#nombre").rules("add", {
						required: true,
						minlength: 1
					});
					
					$("#apellido").rules("add", {
						required: true,
						minlength: 1
					});
					
					$("#dni").rules("add", {
						required: true,
						minlength: 1
					});
					
					$("#direccion").rules("add", {
						required: true,
						minlength: 1
					});
				}
			]);
		</script>
		
	</body>
</html>