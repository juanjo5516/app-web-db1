<!doctype html>
<html lang="en">
<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="{{ asset('Bootstrap4/css/bootstrap.min.css') }}">
	<!-- <link rel="stylesheet" href="{{ asset('font-awesome/css/font-awesome.min.css')}}"> -->
	<!-- Estilo personalizado -->
	<!-- <link rel="stylesheet" href="{{ asset('')}}"> -->
	<!-- Icono -->
	<link rel="icon" href="{{ asset('favicon.ico') }}">
	<title>Welcome</title>
</head>
<body>
	<nav class="navbar navbar-expand navbar-dark bg-dark static-top">
		<div class="container">
			<a class="navbar-brand mr-1" href="/home">{{config('app.name')}}</a>
			<button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#"><i class="fa fa-bars"></i></button>
			<ul class="navbar-nav ml-auto mr-md-0">
				@guest
				<li class="nav-item"><a href="/login" class="nav-link">Login</a></li>
				@else
				<li class="nav-item"><a href="/home" class="nav-link">Home</a></li>
				@endguest
				<li class="nav-item"><a href="/integrantes" class="nav-link">Integrantes</a></li>
			</ul>
		</div>
	</nav>
	<br>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="jumbotron" id="bienvenida">
					<h1 class="display-3">Bienvenido</h1>
					<p>Aplicación web realizada con el framework de desarrollo web "Laravel" versión 5.5.40 para la implementar proyecto de base de datos 1 del grupo # 1 de la Universidad Mariano Gálvez de Guatemala.</p>
					@guest
					<a href="/login" class="btn btn-primary btn-lg">Login</a>
					@else
					<a href="/home" class="btn btn-primary btn-lg">Ir a la aplicación</a>
					@endguest
				</div>
			</div>
		</div>
	</div>
	<!-- Optional JavaScript -->
	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<!-- <script src="{{ asset('js/jquery-3.3.1.min.js') }}"></script> -->
	<!-- <script src="{{ asset('js/popper.min.js') }}"></script> -->
	<!-- <script src="{{ asset('bootstrap4/js/bootstrap.min.js')}}"></script> -->
	<!-- Script personalizado -->
	<!-- <script src=""></script> -->
</body>
</html>