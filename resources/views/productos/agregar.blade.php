<?php

use App\Categoria;

$categorias = Categoria::All();

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
					<h1 class="header center white-text lighten-5">CREADOR DE PRODUCTOS</h1>
					<div class="row center">
						<h5 class="header center white-text col s12 lighten-5">Agrega productos con sus imagenes.</h5>
					</div>
					<br><br>
				</div>
			</div>
			<div class="parallax"><img src="{{ asset('/img/nuevas/background1.jpg') }}" alt="Unsplashed background img 1"></div>
		</div>

		<div class="container">
			<section>
				<h4 style="text-align: center;">Datos Iniciales</h4>
				
				{!! Form::open(['route' => 'agregarproducto', 'method' => 'POST', 'id' => 'crearForm', 'files'=>true,]) !!}
				
					<div class="row uniform">
						
						@include('flash::message')
						
						<div class="input-field"> 
							<input type="text" name="nombre" id="nombre" class="validate"/>
							<label class="active" for="nombre">Nombre Producto</label>
							<span class="helper-text" style="display: none; color: #f00" data-error="wrong" id="errorNombre">El nombre es obligatorio.</span>
						</div>
						
						<div class="input-field"> 
							<input type="text" name="descripcion" id="descripcion" class="validate"  />
							<label class="active" for="descripcion">Descripción Producto</label>
							<span class="helper-text" style="display: none; color: #f00" data-error="wrong" id="errorDescripcion">La descripción es obligatoria.</span>
						</div>
						
						<div class="input-field"> 
							<input type="number" min="1" step="any" name="precio" id="precio" class="validate"/>
							<label class="active" for="precio">Precio Producto</label>
							<span class="helper-text" style="display: none; color: #f00" data-error="wrong" id="errorPrecio">El precio es obligatorio.</span>
						</div>
						
						<div class="input-field">
							<span>Categoria:</span>
							<br><br>
							<div class="row uniform">
								
								@foreach($categorias as $categoria)
									
								<div class="col s3">
									<label>
										<input class="with-gap" name="categoria" type="radio" value="{{ $categoria->id }}" id="categoria"/>
										<span>{{ $categoria->categoria }}</span>
									</label>
								</div>
									
								@endforeach
								
							</div>
							<span class="helper-text" style="display: none; color: #f00" data-error="wrong" id="errorCategoria">La categoria es obligatoria.</span>
						</div>
						
						<div class="file-field input-field">
							<div class="btn">
								<span>File</span>
								<input type="file" accept="image/*"  name="file" id="examine_file">
							</div>
							<div class="file-path-wrapper">
								<input class="file-path validate" type="text">
							</div>
							<span class="helper-text" style="display: none; color: #f00" data-error="wrong" id="errorImagen">La imagen es obligatoria.</span>
						</div>
						
					</div>
					<div class="12u$">
						<ul class="actions" style="text-align: center">
							<li><input type="button" value="crear" class="waves-effect waves-light btn" id="crear"/></li>
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
			
			$('#crear').click(() => {
				if($('#examine_file').val() == ''){
					$('#errorImagen').css('display', 'block')
					$('#examine_file').focus()
				} else 
					$('#errorImagen').css('display', 'none')
			
				if($('input[name="categoria"]:radio').is(':checked'))
					$('#errorCategoria').css('display', 'none')
				else 
					$('#errorCategoria').css('display', 'block')
					
				if($('#precio').val() == ''){
					$('#errorPrecio').css('display', 'block')
					$('#precio').focus()
				} else 
					$('#errorPrecio').css('display', 'none')
					
				if($('#descripcion').val() == ''){
					$('#errorDescripcion').css('display', 'block')
					$('#descripcion').focus()
				} else 
					$('#errorDescripcion').css('display', 'none')
				
				if($('#nombre').val() == ''){
					$('#errorNombre').css('display', 'block')
					$('#nombre').focus()
				} else 
					$('#errorNombre').css('display', 'none')
					
				if($('#nombre').val() != '' && $('#descripcion').val() != '' && $('#precio').val() != '' && $('input[name="categoria"]:radio').is(':checked') && $('#examine_file').val() != '')
					$('#crearForm').submit()
			})
			
		</script>
		
	</body>
</html>
