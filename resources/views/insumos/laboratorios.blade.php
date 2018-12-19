@extends('layouts.sb-admin.app')
@section('titulo','Laboratorios')
@include('insumos.menus')
@section('content')
<div class="container shadow p-3 mb-5 bg-white rounded">
	<h2><i class="fa fa-building-o fa-lg"></i> Listado de laboratorios</h2>
	<br>
	<div class="table-responsive">
		<table id="tbl_laboratorios" class="table table-hover" style="width:100%">
			<thead>
				<tr>
					<th>Id</th>
					<th>Laboratorio</th>
				</tr>
			</thead>
		</table>
	</div>
</div>
@endsection
@section('scripts-personalizados')
<script src="{{ asset('js/funciones.js') }}"></script>
<script>
	var tbl_laboratorios = $('#tbl_laboratorios').DataTable({
		"ajax": `http://localhost:8000/getLaboratorios`,
		"columns": [
		{"data":"id_laboratorio", "name": "id_laboratorio"},
		{"data":"nombre", "name": "nombre"}
		],
		"language" : idioma_espanol
	});
</script>
@endsection
