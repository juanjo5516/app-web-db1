<!DOCTYPE html>
<html lang="es">
@section('header')
@include('layouts.sb-admin.partials.header')
@show
<body id="page-top">
	@include('layouts.sb-admin.partials.nav')
	<div id="wrapper">
		@include('layouts.sb-admin.partials.sidebar')
		<div id="content-wrapper">
			<div class="container-fluid">
				@yield('content')
			</div>
			@include('layouts.sb-admin.partials.footer')
		</div>
	</div>
	<a class="scroll-to-top rounded" href="#page-top">
		<i class="fa fa-angle-up"></i>
	</a>
	@include('layouts.sb-admin.partials.logout')
	<script src="{{ asset('js/jquery-3.3.1.min.js') }}"></script>
	<script src="{{ asset('dataTables/datatables.min.js') }}"></script>
	<script src="{{ asset('js/popper.min.js') }}"></script>
	<script src="{{ asset('bootstrap4/js/bootstrap.min.js') }}"></script>
	<script src="{{ asset('sb-admin/vendor/jquery-easing/jquery.easing.min.js') }}"></script>
	<script src="{{ asset('sb-admin/js/sb-admin.js') }}"></script>
	@yield('scripts-personalizados')
</body>
</html>