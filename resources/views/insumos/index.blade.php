@extends('layouts.bootstrap4')
@section('titulo','Agregar insumo')
@section('content')

<table>
	<thead>
		<tr>
			<th>Id</th>
			<th>Insumo</th>
			<th>Existencia</th>
		</tr>
	</thead>
	<tbody>
		@foreach($insumos as $insumo)
		<tr>
			<td>{{$insumo->id_insumo}}</td>
			<td>{{$insumo->nombre}}</td>
			<td>{{$insumo->existencia}}</td>
		</tr>
		@endforeach
	</tbody>
</table>
@endsection