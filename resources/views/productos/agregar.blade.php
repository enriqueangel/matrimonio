<?php

use App\Categoria;

$categorias = Categoria::All();
// dd($categorias);

?>

<!DOCTYPE HTML>
<html>
	<head>Nuevo Producto</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="{{ asset('styles/main.css') }}" />
	</head>
	<body>
		<div id="page-wrapper">
			<header id="header">
				<h1><a href="index.html">Nuevo Producto</a></h1>
				<nav id="nav">
					<ul>
						<li class="special">
							<a href="#menu" class="menuToggle"><span>Menu</span></a>
							<div id="menu">
								<ul>
									<li><a href="{{ route('agregarmesero') }}">Nuevo Mesero</a></li>
									<li><a href="{{ route('meseros') }}">Meseros</a></li>
									<li><a href="{{ route('productos') }}">Productos</a></li>
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
					<p>Creacion de un nuevo producto</p>
				</header>
				<section class="wrapper style5">
					<div class="inner">
						<section>
							<h4 style="text-align: center;">Datos Iniciales</h4>

							{!! Form::open(['route' => 'agregarproducto', 'method' => 'POST', 'id' => 'agregar-form_id', 'class' => 'panel', 'files'=>true,]) !!}
							
								<div class="row uniform" style="text-align: center"> 
								    
								    <div class="12u 12u$(xsmall)">
										@include('flash::message')
									</div>

									<div class="12u 12u$(xsmall)">
										<input type="text" name="nombre" id="nombre" value="" placeholder="Nombre producto" />
									</div>

									<div class="12u$ 12u$(large)">
										<input type="text" name="descripcion"  id="descripcion" value="" placeholder="Descripción" />
									</div>

									<div class="12u$ 12u$(xsmall)">
										<input type="number" name="precio"  id="precio" value="" placeholder="Precio" />
									</div>
									
									<div class="12u$ 12u$(xsmall)">
										<h5 style="text-align: left">Categoria</h5>
										
									@foreach($categorias as $categoria)
										
										<div class="3u$">
										    <div class="radio" id="categoria">
										        <label><input type="radio" name="categoria" value="{{ $categoria->id }}" id="categoria"> {{ $categoria->categoria }}</label>
										    </div>
										</div>
										
									@endforeach
										
									</div>

									<div class="12u$ file_input" style="text-align: center">
								        <!--<label for="examine_file" id='label_examine' required><span class="glyphicon glyphicon-picture"></span><span style="color: #FFF">Buscar Imagen</span></label>-->
									    <input type="file" name="file" id="examine_file" accept="image/*" required/>
									    <img id="prevew_file" src="#" style="margin-top: 10px" hidden>
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
		<script src="{{ asset('js/file.js') }}"></script>
		
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
					
					$("#descripcion").rules("add", {
						required: true,
						minlength: 1
					});
					
					$("#precio").rules("add", {
						required: true,
						minlength: 1
					});
					
					$("#examine_file").rules("add", {
						required: true,
					});
					
					$("[name='categoria']").rules("add", {
						required: true,
					});
				}
			]);
		</script>
		
	</body>
</html>