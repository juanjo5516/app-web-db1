@extends('layouts.sb-admin.app')
@section('titulo','Insumos')
@include('insumos.menus')
@section('content')
<ol class="breadcrumb">
	<li class="breadcrumb-item">
		<a href="/home">home</a>
	</li>
	<li class="breadcrumb-item">
		<a href="/recursos-humanos/empleados">empleados</a>
	</li>
	<li class="breadcrumb-item active">show</li>
</ol>
<div class="alert alert-success" role="alert" id="mensaje" style="display: none;"></div>
<div class="container shadow p-3 mb-5 bg-white rounded">
	<div class="row">
		<div class="col-md-12">
			<button class="nuevo btn btn-primary float-right" data-toggle="modal" data-target="#modal_insumos"><i class="fa fa-plus"></i></button>
			<h2><i class="fa fa-book"></i> Insumos</h2>
			<br>
			<div class="table-responsive">
				<table class="table table-hover" id="tbl_insumos" style="width:100%">
					<thead>
						<tr>
							<th>Id</th>
							<th>Número de lote</th>
							<th>Nombre insumo</th>
							<th>Laboratorio</th>
							<th>Existencia</th>
							<th>Acción</th>
						</tr>
					</thead>
				</table>
			</div>
		</div>
	</div>

	<div class="modal fade" id="modal_insumos" tabindex="-1" role="dialog" aria-labelledby="label_modal_insumos" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="title_modal_insumos"></h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				</div>
				<form method="POST" id="form_insumos" onsubmit="event.preventDefault(); return false" autocomplete="off">
					<div class="modal-body">
						<div class="form-group">
							<label for="id_lote">Número de lote <strong class="text-danger">*</strong></label>
							<input type="number" class="form-control" id="id_lote" name="id_lote" required>
						</div>
						<div class="form-group">
							<label for="nombre">Insumo <strong class="text-danger">*</strong></label>
							<input type="text" class="form-control" id="nombre" name="nombre" required>
						</div>
						<div class="form-group">
							<label for="nombre">Laboratorio <strong class="text-danger">*</strong></label>
							{!! Form::select('id_laboratorio', App\Models\Laboratorio::pluck('nombre','id_laboratorio'), null, ['class' => 'form-control', 'placeholder' => '', 'required', 'id'=>'id_laboratorio', 'name'=>'id_laboratorio']) !!}
						</div>
						<div class="form-group">
							<label for="existencia">Existencia <strong class="text-danger">*</strong></label>
							<input type="number" class="form-control" id="existencia" name="existencia" required>
						</div>
					</div>
					<div class="modal-footer">
						<input type="submit" class="guardar-modal btn btn-primary" id="boton_guardar_insumo" value="Registrar">
						<input type="submit" class="editar-modal btn btn-primary" id="boton_editar_insumo" value="Editar">
						<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
					</div>
				</form>
			</div>
		</div>
	</div>

	<div class="modal fade" id="modal_insumos_eliminar" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog modal-sm" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Eliminar contacto</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				</div>
				<div class="modal-body">
					¿Está seguro de eliminar: <strong id="info-eliminar-insumo"></strong>?
				</div>
				<div class="modal-footer">
					<button class="btn btn-danger" id="boton_eliminar_insumo">Si, eliminar</button>
					<button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
@section('scripts-personalizados')
<script src="{{ asset('js/funciones.js') }}"></script>
<script src="{{ asset('js/insumos/insumos.js') }}"></script>
<script>
/* -------------------------------------------------------------------
* | Escuchador de eventos
*  -------------------------------------------------------------------
*/

$(document).ready(function(){
	eventoEditarInsumo();
	eventoEliminarInsumo();
	clickBotonNuevoInsumo();
	clickBotonEditarInsumo();
	clickBotonGuardarInsumo();
	clickBotonEliminarInsumo();

});

</script>
@endsection