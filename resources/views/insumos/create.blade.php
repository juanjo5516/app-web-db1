@extends('layouts.bootstrap4')
@section('titulo','Agregar insumo')
@section('content')
{!! Form::open(['route' => ['insumo.store'], 'method' => 'POST']) !!}
<div class="form-group">
	<label for="ID_INSUMO">id insumo</label>
	<input type="number" class="form-control" id="ID_INSUMO" name="ID_INSUMO" required autofocus>
</div>
<div class="form-group">
	<label for="ID_LOTE">ID LOTE</label>
	<input type="number" class="form-control" id="ID_LOTE" name="ID_LOTE" required>
</div>
<div class="form-group">
	<label for="NOMBRE">NOMBRE INSUMO</label>
	<input type="text" class="form-control" id="NOMBRE" name="NOMBRE" required>
</div>
<div class="form-group">
	<label for="ID_LABORATORIO">ID LABORATORIO</label>
	<input type="number" class="form-control" id="ID_LABORATORIO" name="ID_LABORATORIO" required>
</div>
<div class="form-group">
	<label for="EXISTENCIA">EXISTENCIA</label>
	<input type="number" class="form-control" id="EXISTENCIA" name="EXISTENCIA" required>
</div>
<div class="form-group">
<input type="submit" class="btn btn-primary" value="Registar insumo">
</div>
{!! Form::close() !!}
@endsection