@extends('layouts.inspinia')
@section('titulo','Home')
@section('content')
<div class="row wrapper border-bottom white-bg page-heading">
	<div class="col-lg-10">
		<h2>Bienvenido {{Auth::user()->name }}</h2>
		<h3>Rol: {{Auth::user()->rol()->first()->rol}}</h3>
		<ol class="breadcrumb">
			<li class="active">
				<a href="/home"><strong>/home</strong></a>
			</li>
		</ol>
	</div>
</div>
<div class="wrapper wrapper-content animated fadeInRight">
	<div class="row">
		<div class="col-md-4">
			<div class="widget style1 navy-bg">
				<div class="row">
					<div class="col-xs-4"><i class="fa fa-cart-arrow-down fa-5x"></i></div>
					<div class="col-xs-8 text-right">
						<span> Insumos</span>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-4">
			<div class="widget style1 lazur-bg">
				<div class="row">
					<div class="col-xs-4"><i class="fa fa-building-o fa-5x"></i></div>
					<div class="col-xs-8 text-right">
						<span> Laboratorios</span>
						
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-4">
			<div class="widget style1 yellow-bg">
				<div class="row">
					<div class="col-xs-4"><i class="fa fa-users fa-5x"></i></div>
					<div class="col-xs-8 text-right">
						<span> Usuarios</span>
						
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- <div class="ibox-content m-b-sm border-bottom">
		<div class="row">
			<div class="col-md-4">
				<div class="widget style1 navy-bg">
					<div class="row">
						<div class="col-xs-4">
							<i class="fa fa-cloud fa-5x"></i>
						</div>
						<div class="col-xs-8 text-right">
							<span> Total de empleados registrados</span>
							<h2>5</h2>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>-->
</div>
@endsection