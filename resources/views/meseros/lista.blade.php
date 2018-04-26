<?php

use App\Camarero;

$camareros = Camarero::join('usuarios', 'camareros.id_usuario', '=', 'usuarios.id')
	->get();

?>

<!DOCTYPE HTML>
<html>
	<head>
		<title>Meseros</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="{{ asset('styles/main.css') }}" />
	</head>
	<body>
		<!-- Page Wrapper -->
		<div id="page-wrapper">
			<header id="header">
				<h1><a href="{{ route('principal') }}">Meseros</a></h1>
				<nav id="nav">
					<ul>
						<li class="special">
							<a href="#menu" class="menuToggle"><span>Menu</span></a>
							<div id="menu">
								<ul>
									<!--<li><a href="usuario.html">Nuevo Usuario</a></li>-->
									
								@if(Session::get('tipo') == 1)
									
									<li><a href="{{ route('agregarmesero') }}">Nuevo Mesero</a></li>
									<li><a href="{{ route('agregarproducto') }}">Nuevo Producto</a></li>
									
								@endif
								@if(Session::get('tipo') == 2)
									
									<li><a href="{{ route('agregarinvitado') }}">Nuevo Invitado</a></li>
									<li><a href="{{ route('invitados') }}">Invitados</a></li>
									
								@endif
								
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
					<p>Lista de los meseros</p>
				</header>
				<section class="wrapper style5" style="padding: 2em;">
					<div class="inner">
						<h4 style="text-align: center;">Datos Iniciales</h4>
						<br>
						<div class="table-wrapper">
							<table id="tabla_factura">
								<thead>
									<tr>
										<th>Nombre(s)</th>
										<th>Apellido(s)</th>
										<th>Dirección</th>
										<th>DNI</th>
										<th>Mesa(s)</th>
										<!--<th>Accion</th>-->
									</tr>
								</thead>
								<tbody id="content_table">
									
								@foreach($camareros as $camarero)
									
									<tr>
										<td>{{ $camarero->nombres }}</td>
										<td>{{ $camarero->apellidos }}</td>
										<td>{{ $camarero->direccion }}</td>
										<td>{{ $camarero->dni }}</td>
										<td>---</td>
										<!--<td><a class="icon fa-edit" href="{{ route('agregarmesero').'/'.$camarero->id }}"></a> <!-- <a class="icon fa-eraser"></a></td>-->
									</tr>
									
								@endforeach
									
								</tbody>
								
							</table>
						</div>
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
		<script src="{{ asset('js/invoice2.js') }}"></script>
	</body>
</html>