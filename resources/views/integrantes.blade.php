@extends('layouts.sb-admin.app')
@section('titulo','Integrantes')
@include('insumos.menus')
@section('content')
<div class="container shadow p-3 mb-5 bg-white rounded">
	<br>
<h2><i class="fa fa-users"></i> Integrantes grupo número 1</h2>
	<br>
	<div class="table-responsive">
		<table class="table table-hover" id="tbl_integrantes" style="width:100%">
			<thead>
				<tr>
					<th>#</th>
					<th>Carne</th>
					<th>Nombres completo</th>
					<th>Sección</th>
					<th>Grupo</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>1</td>
					<td>3190-13-19145</td>
					<td>Elmer Danilo Hernandez</td>
					<td>A</td>
					<td>1</td>
				</tr>
				<tr>
					<td>2</td>
					<td>3190-16-13214</td>
					<td>Elvin Emmanuel Delgado Gómez</td>
					<td>A</td>
					<td>1</td>
				</tr>
				<tr>
					<td>3</td>
					<td>3190-16-3648</td>
					<td>Juan José Del Aguila López</td>
					<td>A</td>
					<td>1</td>
				</tr>
				<tr>
					<td>4</td>
					<td>3190-16-1677</td>
					<td>Mario José Matías Tomás</td>
					<td>A</td>
					<td>1</td>
				</tr>
			</tbody>
		</table>
	</div>
</div>
@endsection
@section('scripts-personalizados')
<script src="{{ asset('js/funciones.js') }}"></script>
<script src="{{ asset('js/integrantes.js') }}"></script>
@endsection