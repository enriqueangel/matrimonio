<?php

use App\Producto;

$productos = Producto::join('categorias', 'productos.id_categoria', '=', 'categorias.id')
	->get();
	
// dd($productos);

?>

<!DOCTYPE HTML>
<html>
	<head>
		<title>Productos</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="{{ asset('styles/main.css') }}" />
	</head>
	<body>
		<!-- Page Wrapper -->
		<div id="page-wrapper">
			<header id="header">
				<h1><a href="{{ route('principal') }}">Productos</a></h1>
				<nav id="nav">
					<ul>
						<li class="special">
							<a href="#menu" class="menuToggle"><span>Menu</span></a>
							<div id="menu">
								<ul>
									
								@if(Session::get('tipo') == 1)
									
									<li><a href="{{ route('agregarmesero') }}">Nuevo Mesero</a></li>
									<li><a href="{{ route('agregarproducto') }}">Nuevo Producto</a></li>
									
								@endif
								@if(Session::get('tipo') == 2)
									
									<li><a href="{{ route('agregarinvitado') }}">Nuevo Invitado</a></li>
									<li><a href="{{ route('invitados') }}">Invitados</a></li>
									
								@endif
								
									<li><a href="{{ route('meseros') }}">Meseros</a></li>
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
					<p>Lista de productos</p>
				</header>
				<section class="wrapper style5">
					<div class="inner">
						<h4 style="text-align: center;">Datos Iniciales</h4>
						
						<div class="row">
	
						<!--<div class="table-wrapper">-->
							
							@foreach($productos as $producto)
								
							<div class="col-sm-4">
								<div class="card" style="width: 15rem;">
									<img class="card-img-top" src="{{ $producto->imagen }}" alt="Card image cap"
									style="width: auto; height: 170px;">
									<div class="card-body">
										<h5 class="card-title">{{ $producto->nombre }}</h5>
										<p class="card-text">{{ $producto->descripcion }}</p>
										<span>Precio<label>{{ $producto->precio }}</label></span>
									</div>
								</div>
							</div>
								
							@endforeach
							
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
	</body>
</html>