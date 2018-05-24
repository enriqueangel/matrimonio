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
					
					@endif
					@if(Session::get('tipo') == 2)
					
					<li><a href="{{ route('agregarinvitado') }}">Nuevo Invitado</a></li>
					<li class="divider"></li>
					<li><a href="{{ route('invitados') }}">Invitados</a></li>
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
					<h1 class="header center white-text lighten-5">CARRITO DE COMPRA</h1>
					<div class="row center">
						<h5 class="header center white-text col s12 lighten-5">Mira lo que te interesa comprar.</h5>
					</div>
				</div>
			</div>
			<div class="parallax"><img src="{{ asset('/img/nuevas/background1.jpg') }}" alt="Unsplashed background img 1"></div>
		</div>

		<div class="container" >
			<input type="hidden" name="_token" value="{{ csrf_token() }}" id="token">
			<section>
			
				<div align="right">
					<br>
					<a class="waves-effect waves-light btn " id="clear-cart">Limpiar</a>
				</div>
					
				<div>							
					<br>
					<div>
						<div class="col 6" >Tu tienes <span id="count-cart">X</span> items en tu carrito.</div>
						<div alng="center" >Total: $<span id="total-cart"></span></div>
					</div>

					<ul id= "show-cart">
						<li></li>
					</ul>
				</div>
				
				@if(Auth::guest())
				
				<div>
					Debes iniciar sesión o registrarte antes de realizar una compra. <br><br>
					<a class="waves-effect waves-light btn " href="{{ route('login') }}" id="iniciar">Iniciar Sessión</a>
					<a class="waves-effect waves-light btn " id="registro" href="{{ route('registro') }}">Registrarse</a>
					<br><br>
				</div>
				
				@else
				
				<div id='contenidoCompra'>
					<a class="waves-effect waves-light btn " id="comprar">Comprar</a>
					<a class="waves-effect waves-light btn " id="prueba">Prueba</a>
					<br><br>
					
					
					
				</div>
				
				@endif
				
			</section>
		</div>

	  <!--  Scripts-->
		<script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
		<script src="{{ asset('/js/nuevas/materialize.js') }}"></script>
		<script src="{{ asset('/js/nuevas/init.js') }}"></script>
		<script src="{{ asset('/js/nuevas/dropdown.js') }}"></script>
		<!--<script src="{{ asset('/js/nuevas/producto.js') }}"></script>-->
		<!--<script src="{{ asset('/js/nuevas/cart.js') }}"></script>-->
		<script src="{{ asset('/js/nuevas/shoppingCart.js') }}"></script>
		<script src="{{ asset('/js/nuevas/editCart.js') }}"></script>
		
		<script type="text/javascript">
			
			$('#comprar').click(function(evt) {
			    evt.preventDefault()
			    var monto = $('#total-cart').text()
			    var url = "/pagos/obtenerinformacionpago/" + monto
				console.log(url)
			    $.ajax({
			        url: url,
			        dataType: "json",
			        type: "GET",
			        success: function(infopago){
			        	// console.log(result)
			            var html_button="<form id='pay_' method='post' action='https://sandbox.checkout.payulatam.com/ppp-web-gateway-payu/'>\
					        <input name='merchantId'    type='hidden'  value='"+infopago.merchantId+"'   >\
					        <input name='accountId'     type='hidden'  value='"+infopago.accountId+"'   >\
					        <input name='description'   type='hidden'  value='"+infopago.description+"'   >\
					        <input name='referenceCode' type='hidden'  value='"+infopago.referenceCode+"'   >\
					        <input name='amount'        type='hidden'  value='"+infopago.amount+"'   >\
					        <input name='tax'           type='hidden'  value='"+infopago.tax+"'   >\
					        <input name='taxReturnBase' type='hidden'  value='"+infopago.taxReturnBase+"'   >\
					        <input name='currency'      type='hidden'  value='"+infopago.currency+"'   >\
					        <input name='signature'     type='hidden'  value='"+infopago.signature+"'   >\
					        <input name='buyerEmail'    type='hidden'  value='"+infopago.buyerEmail+"'   >\
					        <input name='responseUrl'    type='hidden'  value='"+infopago.responseUrl+"'   >\
					        <input name='confirmationUrl'    type='hidden'  value='"+infopago.confirmationUrl+"'   >\
					        <input name='test' type='hidden' value='"+infopago.test+"'   >\
					        </form>";
					
					    $("#contenidoCompra").append(html_button);
					    $("#pay_").submit();
					    // CrearBotonPayu($("#comprar"), $("#contenidoCompra"))
			        },
			        error: function(error){
			            console.log(error)
			        }
			    })
			})
			
		</script>
	</body>
</html>
