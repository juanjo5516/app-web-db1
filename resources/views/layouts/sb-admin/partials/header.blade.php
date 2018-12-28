<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<meta name="description" content="">
	<meta name="author" content="edhernandez">
	<title>@yield('titulo')</title>
	<link rel="icon" href="{{ asset('favicon.png') }}">
	<link rel="stylesheet" href="{{ asset('bootstrap4/css/bootstrap.min.css')}}">
	<link rel="stylesheet" href="{{ asset('dataTables/datatables.min.css') }}">
	<link rel="stylesheet" href="{{ asset('sb-admin/css/sb-admin.css') }}">
	<link rel="stylesheet" href="{{ asset('font-awesome/css/font-awesome.min.css')}}">
	<style>
		.obligatorio{
			font: bold;
			color: red;
		}
	</style>
</head>