{{ setlocale(LC_MONETARY, 'en_US') }}
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<title>Productos</title>
	
		<link href="{{ asset('styles/ventas.css') }}" rel="stylesheet" type="text/css">
		<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700" rel="stylesheet">
		<link rel="stylesheet" href="{{ asset('styles/main.css') }}" />
	</head>
	<body>
		<div id="page-wrapped">
			<header id="header">
				<h1><a href="{{ route('principal') }}">Nuestros Productos</a></h1>
					<nav id="nav">
						<ul>
							<li class="special">
								<a href="#menu" class="menuToggle"><span>Menu</span></a>
								<div id="menu">
									<ul>
										
									@if(!(Session::get('tipo') == 1 || Session::get('tipo') == 2))
									
										<li><a href="{{ route('login') }}">Iniciar sesión</a></li>
										<li><a href="{{ route('registro') }}">Registrarse</a></li>
										<li><a href="{{ route('carrito') }}">Carrito</a></li>
										
									@else
									
										@if(Session::get('tipo') == 1)
									
											<li><a href="{{ route('agregarmesero') }}">Nuevo Mesero</a></li>
											<li><a href="{{ route('agregarproducto') }}">Nuevo Producto</a></li>
											
										@endif
										@if(Session::get('tipo') == 2)
											
											<li><a href="{{ route('agregarinvitado') }}">Nuevo Invitado</a></li>
											<li><a href="{{ route('invitados') }}">Invitados</a></li>
											
										@endif
										
											<li><a href="{{ route('meseros') }}">Meseros</a></li>
											<li><a href="{{ route('carrito') }}">Carrito</a></li>
											<li><a href="{{ route('logout') }}">Cerrar Sesión</a></li>
										
									@endif

									</ul>
								</div>
							</li>
						</ul>
					</nav>
			</header>
		</div>
	
		<section class="wrapper style5" style="margin-top: 50px">	
			<article id="main">
				<div class="wrap">
					<h1>Nuestros Productos</h1>
					<div style="text-align:center" id='mensaje'></div><br>
					<div class="store-wrapper">
						<div class="category_list">
							<a class="category_item" category="all">Todo</a>
							
						@foreach($categorias as $categoria)
							
							<a class="category_item" category="{{ $categoria->id }}">{{ ucwords($categoria->categoria) }}</a>
							
						@endforeach
							
						</div>
						<section class="products-list">
							
						@foreach($productos as $producto)
							
							<div class="product-item" category="{{ $producto->id_categoria }}">
								<img src="{{ $producto->imagen }}" alt="" >
								<a class="add-to-cart" href="#" data-name="{{ ucwords($producto->nombre) }}" data-price="{{ $producto->precio }}">{{ ucwords($producto->nombre) }}
								<br><span style="text-align: right;">{{	 money_format('%.2n', $producto->precio) }}</span>
								</a>
							</div>
							
						@endforeach
							
						</section>
					</div>
				</div>
			</article>
		</section>
		
		<!--<script src="assets/js/jquery-3.2.1.js"></script>-->
		<script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
		<script src="{{ asset('/js/ventas.js') }}"></script>
		<script src="{{ asset('/js/jquery.min.js') }}"></script>
		<script src="{{ asset('/js/jquery.scrollex.min.js') }}"></script>
		<script src="{{ asset('/js/jquery.scrolly.min.js') }}"></script>
		<script src="{{ asset('/js/skel.min.js') }}"></script>
		<script src="{{ asset('/js/util.js') }}"></script>
		<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
		<script src="{{ asset('/js/main.js') }}"></script>
		<script src="{{ asset('/js/invoice.js') }}"></script>
		<script src="{{ asset('/js/cart.js') }}"></script>
		<script src="{{ asset('/js/shoppingCart.js') }}"></script>
    	<script src="{{ asset('/js/editCart.js') }}"></script>
	</body>
</html>