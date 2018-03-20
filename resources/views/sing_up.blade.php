<!DOCTYPE html>
<html class="gt-ie8 gt-ie9 not-ie">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<title>Registro</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0">

	<link href="//fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,400,600,700,300&subset=latin" rel="stylesheet" type="text/css">

	<link href="{{ asset('styles/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
	<link href="{{ asset('styles/pixel-admin.min.css') }}" rel="stylesheet" type="text/css">
	<link href="{{ asset('styles/pages.min.css') }}" rel="stylesheet" type="text/css">
	<link href="{{ asset('styles/rtl.min.css') }}" rel="stylesheet" type="text/css">
	<link href="{{ asset('styles/themes.min.css') }}" rel="stylesheet" type="text/css">

</head>

<body class="theme-default page-signup-alt">
<!--<script src="assets/demo/demo.js"></script>-->

	<div class="signup-header">
		<a href="" class="logo">
			<div class="demo-logo bg-primary"><img src="{{ asset('img/logo-big.png') }}" alt="" style="margin-top: -4px;"></div>&nbsp;
			<!-- <strong>Pixel</strong>Admin -->
		</a> 
		<a href="{{ route('login') }}" class="btn btn-primary">Iniciar Sesión</a>
	</div>

	<h1 class="form-header">Crea tu cuenta</h1>


	<!-- Form -->
	{!! Form::open(['route' => 'registro', 'method' => 'POST', 'id' => 'signup-form_id', 'class' => 'panel']) !!}
	
		@include('flash::message')
	
		<div class="form-group">
			<input type="text" name="nombre" id="name_id" class="form-control input-lg" placeholder="Nombre(s)">
		</div>
		
		<div class="form-group">
			<input type="text" name="apellido" id="apellido" class="form-control input-lg" placeholder="Apellido(s)">
		</div>
		
		<div class="form-group">
			<input type="text" name="dni" id="dni" class="form-control input-lg" placeholder="DNI">
		</div>
		
		<div class="form-group">
			<input type="text" name="direccion" id="direccion" class="form-control input-lg" placeholder="Dirección">
		</div>

		<div class="form-group">
			<input type="text" name="correo" id="email_id" class="form-control input-lg" placeholder="Correo electronico">
		</div>

		<div class="form-group">
			<input type="password" name="password" id="password_id" class="form-control input-lg" placeholder="Password">
		</div>

		<!--<div class="form-group" style="margin-top: 20px;margin-bottom: 20px;">-->
		<!--	<label class="checkbox-inline">-->
		<!--		<input type="checkbox" name="signup_confirm" class="px" id="confirm_id">-->
		<!--		<span class="lbl">I agree with the <a href="#" target="_blank">Terms and Conditions</a></span>-->
		<!--	</label>-->
		<!--</div>-->

		<div class="form-actions">
			<input type="submit" value="Crear cuenta" class="btn btn-primary btn-lg btn-block">
		</div>
		
	{!! Form::close() !!}
	<!-- / Form -->

	<!--<div class="signup-with">-->
	<!--	<div class="header">or sign up with</div>-->
	<!--	<a href="index.html" class="btn btn-lg btn-facebook rounded"><i class="fa fa-facebook"></i></a>&nbsp;&nbsp;-->
	<!--	<a href="index.html" class="btn btn-lg btn-info rounded"><i class="fa fa-twitter"></i></a>&nbsp;&nbsp;-->
	<!--	<a href="index.html" class="btn btn-lg btn-danger rounded"><i class="fa fa-google-plus"></i></a>-->
	<!--</div>-->


<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"> </script>

<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/pixel-admin.min.js') }}"></script>

<script type="text/javascript">
	window.PixelAdmin.start([
		function () {
			$("#signup-form_id").validate({ focusInvalid: true, errorPlacement: function () {} });

			// Validate name
			$("#name_id").rules("add", {
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

			// Validate email
			$("#email_id").rules("add", {
				required: true,
				email: true
			});

			// Validate password
			$("#password_id").rules("add", {
				required: true,
				minlength: 6
			});

			// Validate confirm checkbox
			// $("#confirm_id").rules("add", {
			// 	required: true
			// });
		}
	]);
</script>

</body>
</html>
