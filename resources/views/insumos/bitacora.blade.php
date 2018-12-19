@extends('layouts.sb-admin.app')
@section('titulo','Agregar insumo')
@include('insumos.menus')
@section('content')
<br>
<div class="container shadow p-3 mb-5 bg-white rounded">
	<h2><i class="fa fa-history fa-lg"></i> Bitacora de insumos</h2>
	<br>
	<div class="table-responsive">
		<table id="tbl_bitacora" class="table table-hover" style="width:100%">
			<thead>
				<tr>
					<th>Tabla</th>
					<th>Id fila</th>
					<th>Operacion / Campo</th>
					<th>Valor anterior</th>
					<th>Valor nuevo</th>
					<th>Usuario</th>
					<th>Fecha</th>
					<th>ip</th>
				</tr>
			</thead>
			<tbody>
				@foreach($bitacoras as $bitacora)
				<tr>
					<td>{{ $bitacora->nombre_tabla }}</td>
					<td>{{ $bitacora->numrowid }}</td>
					<td>{{ $bitacora->campo }}</td>
					<td>{{ $bitacora->valoranterior }}</td>
					<td>{{ $bitacora->valornuevo }}</td>
					<td>{{ $bitacora->usuario }}</td>
					<td>{{ $bitacora->fecha }}</td>
					<td>{{ $bitacora->ip }}</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
</div>
@endsection
@section('scripts-personalizados')
<script src="{{ asset('js/funciones.js') }}"></script>
<script src="{{ asset('js/integrantes.js') }}"></script>
<script>
	var tbl_insumos = $('#tbl_bitacora').DataTable({
		"order" : [[6,"DESC"]],
		"language" : idioma_espanol
	});

</script>
@endsection