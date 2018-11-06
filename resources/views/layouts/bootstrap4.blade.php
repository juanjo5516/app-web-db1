<!doctype html>
<html lang="es">
<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="csrf-token" content="{{ csrf_token() }}">

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="{{ asset('bootstrap4/css/bootstrap.min.css')}}">
	<link rel="stylesheet" href="{{ asset('font-awesome/css/font-awesome.min.css')}}">
	<link rel="stylesheet" href="{{ asset('dataTables/datatables.min.css') }}">
	<link rel="stylesheet" href="{{ asset('css/estilo_personalizado.css') }}">
	<link rel="icon" href="{{ asset('favicon.png') }}">
	@yield('css')

	<title>@yield('titulo')</title>
</head>
<body>
	<!-- Barra superior de navegacion -->
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
		<a class="navbar-brand" href="/home">MINECO</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarSupportedContent">
			<ul class="navbar-nav mr-auto">
				<li class="nav-item active">
					<a class="nav-link" href="/home">Home <span class="sr-only">(current)</span></a>
				</li>
			</ul>
		</div>
	</nav>

	<div class="container" id="container">
		@yield('content')
	</div>

	<!-- Optional JavaScript -->
	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script src="{{ asset('js/jquery-3.3.1.min.js') }}"></script>
	<script src="{{ asset('dataTables/datatables.min.js') }}"></script>
	<script src="{{ asset('js/popper.min.js') }}"></script>
	<script src="{{ asset('bootstrap4/js/bootstrap.min.js') }}"></script>
	<script src="{{ asset('js/funciones.js') }}"></script>
	@yield('script')
</body>
</html>
