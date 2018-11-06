<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<title>@yield('titulo')</title>
	<link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
	<link href="{{ asset('font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
	<link href="{{ asset('css/animate.css') }}" rel="stylesheet">
	<link href="{{ asset('css/style.css') }}" rel="stylesheet">
	<link rel="icon" href="{{ asset('favicon.png') }}">
	@yield('css')
</head>
<body>
	<div id="wrapper">
		@guest
		@include('layouts.guesttopnavbar')
		@else
		@include('layouts.navigation')
		<div id="page-wrapper" class="gray-bg dashbard-1">
			@include('layouts.topnavbar')
			@yield('content')
		</div>
		<!-- @yield('layouts.chat') -->
		@include('layouts.rightsidebar')
		@endguest
	</div>

	<!-- Mainly scripts -->
	<script src="{{ asset('js/jquery-3.1.1.min.js') }}"></script>
	<script src="{{ asset('js/bootstrap.min.js') }}"></script>
	<script src="{{ asset('js/plugins/metisMenu/jquery.metisMenu.js') }}"></script>
	<script src="{{ asset('js/plugins/slimscroll/jquery.slimscroll.min.js') }}"></script>

	<!-- Custom and plugin javascript -->
	<script src="{{ asset('js/plugins/pace/pace.min.js') }}"></script>
	<script src="{{ asset('js/inspinia.js') }}"></script>

	<!-- GITTER -->
	<script src="{{ asset('js/plugins/gritter/jquery.gritter.min.js') }}"></script>

	@yield('script')
	<script src="{{ asset('js/skinconfigurado.js') }}"></script>	
</body>
</html>