<?php

use App\Invitado;
use App\Usuario;

$invitados = Invitado::join('usuarios', 'invitados.id_usuario', '=', 'usuarios.id')
	->where('invitados.id_cliente', Session::get('id'))
	->get();
// dd($invitados);

?>

<!DOCTYPE HTML>
<html>
	<head>
		<title>Invitados</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="{{ asset('styles/main.css') }}" />
	</head>
	<body>
		<!-- Page Wrapper -->
		<div id="page-wrapper">
			<header id="header">
				<h1><a href="">Invitados</a></h1>
				<nav id="nav">
					<ul>
						<li class="special">
							<a href="#menu" class="menuToggle"><span>Menu</span></a>
							<div id="menu">
								<ul>
									<!--<li><a href="usuario.html">Nuevo Usuario</a></li>-->
									<li><a href="{{ route('agregarinvitado') }}">Nuevo Invitado</a></li>
									<li><a href="{{ route('meseros') }}">Meseros</a></li>
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
					<p>Lista de los invitados</p>
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
										<th>Mesa</th>
										<th>Accion</th>
									</tr>
								</thead>
								<tbody id="content_table">
									
								@foreach($invitados as $invitado)	
									
									<tr>
										<td>{{ $invitado->nombres }}</td>
										<td>{{ $invitado->apellidos }}</td>
										<td>{{ $invitado->direccion }}</td>
										<td>{{ $invitado->dni }}</td>
										
									@if(is_null($invitado->id_mesa))
										
										<td>---</td>
										
									@else
									
										<td>{{ $invitado->id_mesa }}</td>
										
									@endif
									
										<td><span class="icon fa-edit"></span><span class="icon fa-eraser"></span></td>
									
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
		<script src="{{ asset('js/invoice.js') }}"></script>

	</body>
</html>