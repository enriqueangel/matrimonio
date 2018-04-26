<!DOCTYPE html>
<html class="gt-ie8 gt-ie9 not-ie">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<title>Iniciar Sesion</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0">

	<link href="//fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,400,600,700,300&subset=latin" rel="stylesheet" type="text/css">

	<link href="{{ asset('styles/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
	<link href="{{ asset('styles/pixel-admin.min.css') }}" rel="stylesheet" type="text/css">
	<link href="{{ asset('styles/pages.min.css') }}" rel="stylesheet" type="text/css">
	<link href="{{ asset('styles/rtl.min.css') }}" rel="stylesheet" type="text/css">
	<link href="{{ asset('styles/themes.min.css') }}" rel="stylesheet" type="text/css">

</head>

<body class="theme-default page-signin-alt">
	<!-- <script src="assets/demo/demo.js"></script> -->

	<div class="signin-header">
		<a href="{{ route('principal') }}" class="logo">
			<div class="demo-logo bg-primary"><img src="{{ asset('img/logo-big.png') }}" alt="" style="margin-top: -4px;"></div>&nbsp;
			<!-- <strong>Pixel</strong>Admin -->
		</a> 
		<a href="{{ route('registro') }}" class="btn btn-primary">Registrarse</a>
		<!--<a href="{" style="align: left;" class="btn btn-primary">Principal</a>-->
	</div> 

	<h1 class="form-header">Ingresa a tu cuenta</h1>

	<!-- Form -->
	{!! Form::open(['route' => 'login', 'method' => 'POST', 'id' => 'signin-form_id', 'class' => 'panel']) !!}
	
		@include('flash::message')
	
		<div class="form-group">
			<input type="email" name="correo" id="username_id" class="form-control input-lg" placeholder="Correo electronico">
		</div> <!-- / Username -->

		<div class="form-group signin-password">
			<input type="password" name="password" id="password_id" class="form-control input-lg" placeholder="Contraseña">
			<a href="#" class="forgot">Olvidó?</a>
		</div> <!-- / Password -->

		<div class="form-actions">
			<input type="submit" value="Iniciar Sesión" class="btn btn-primary btn-block btn-lg">
		</div> <!-- / .form-actions -->
		
	{!! Form::close() !!}
	<!-- / Form -->

	<!-- <div class="signin-with">
		<div class="header">or sign in with</div>
		<a href="index.html" class="btn btn-lg btn-facebook rounded"><i class="fa fa-facebook"></i></a>&nbsp;&nbsp;
		<a href="index.html" class="btn btn-lg btn-info rounded"><i class="fa fa-twitter"></i></a>&nbsp;&nbsp;
		<a href="index.html" class="btn btn-lg btn-danger rounded"><i class="fa fa-google-plus"></i></a>
	</div> -->


<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"> </script>

<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/pixel-admin.min.js') }}"></script>

<script type="text/javascript">
	$('div.alert').not('.alert-important').delay(3000).fadeOut(350);

	window.PixelAdmin.start([
		function () {
			$("#signin-form_id").validate({ focusInvalid: true, errorPlacement: function () {} });
			
			// Validate username
			$("#username_id").rules("add", {
				required: true,
				minlength: 3
			});

			// Validate password
			$("#password_id").rules("add", {
				required: true,
				minlength: 6
			});
		}
	]);
</script>

</body>
</html>
