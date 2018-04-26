<!doctype html>
<html>
	<head>
		<title>Carrito</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="{{ asset('styles/main.css') }}" />
		
	</head>
	<body>
		<div id="page-wrapped">
			<header id="header">
				<h1><a href="{{ route('principal') }}">Carrito de compras</a></h1>
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
										<li><a href="{{ route('principal') }}">Principal</a></li>
										<li><a href="{{ route('logout') }}">Cerrar Sesión</a></li>
									
								@endif
								
								</ul>
							</div>
						</li>
					</ul>
				</nav>
			</header>
		
			<article id="main">
				<header style="padding-top: 50px; padding-bottom: 50px;" >
					<h2>MATRIMONIOS</h2>
					<p>Tu carrito para llevar lo que nesesitas</p>
				</header>
				<section class="wrapper style5">
					<div class="inner">
						<button id="clear-cart">Limpiar</button>
						<div class="wrapper style5">
							<!--<div>-->
	   							<ul id="show-cart">
	    							<li>???????</li>
								</ul>
								<div>Tu tienes   <span id="count-cart">X</span>  items en tu carrito.</div>
								<div>Total: $<span id="total-cart"></span></div>
							<!--</div>-->
						</div>
						
						@if(!(Session::get('tipo') == 1 || Session::get('tipo') == 2))
						
							Debes uniciar sesión o registrarte antes de realizar una compra. <br><br>
							<button id="iniciar">Iniciar Sesión</button>
							<button id="registro">Registrarse</button>
						
						@else
						
							<button id="comprar">Comprar</button>
						
						@endif
						
					</div>
				</section>
			</article>
		</div>

		<script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
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