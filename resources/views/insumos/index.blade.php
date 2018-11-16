@extends('layouts.bootstrap4')
@section('titulo','Agregar insumo')
@section('content')
<br>
<br>
<h2><i class="fa fa-cart-arrow-down fa-lg"></i> Listado de insumos</h2>
<br>
<div class="container shadow p-3 mb-5 bg-white rounded">
	<br>
	<div class="table-responsive">
		<table id="tbl_insumos" class="table table-hover" style="width:100%">
			<thead>
				<tr>
					<th>Id</th>
					<th>Lote</th>
					<th>Insumo</th>
					<th>Laboratorio</th>
					<th>Existencia</th>
					<th>Accion</th>
				</tr>
			</thead>
		</table>
	</div>
</div>
@endsection
@section('script')
<script src="{{ asset('js/funciones.js') }}"></script>
<script src="{{ asset('js/integrantes.js') }}"></script>
<script>
	var tbl_insumos = $('#tbl_insumos').DataTable({
		"ajax": `http://localhost:8000/getInsumos`,
		"columns": [
		{"data":"id_insumo", "name": "id_insumo"},
		{"data":"id_lote", "name": "id_lote"},
		{"data":"nombre", "name": "nombre"},
		{"data":"laboratorio", "name": "laboratorio"},
		{"data":"existencia", "name": "existencia"},
		{"defaultContent": `<button class="ver btn btn-primary btn-sm"><i class="fa fa-eye"></i></button>`}
		],
		"language" : idioma_espanol
	});

	$("#tbl_insumos tbody").on("click", "button.ver", function(){
		data = tbl_insumos.row($(this).parents("tr")).data();
		$(location).attr('href',`http://localhost:8000/insumos/${data.id_insumo}`);
	});
</script>
@endsection