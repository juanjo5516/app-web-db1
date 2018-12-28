@extends('layouts.sb-admin.app')
@section('titulo','Configuración - categoria')

@section('content')
<ol class="breadcrumb">
	<li class="breadcrumb-item">
		<a href="/configuracion">configuracion</a>
	</li>
	<li class="breadcrumb-item">
		<a href="/home">categorias</a>
	</li>
</ol>
<div class="container">
	<div class="alert alert-success" role="alert" id="mensaje" style="display: none;">
	</div>
	<div class="row">
		<div class="col-md-12">
			<button class="nuevo btn btn-primary float-right" data-toggle="modal" data-target="#modal_categorias"><i class="fa fa-plus fa-lg"></i> Agregar categoria</button>
			<h2><i class="fa fa-book"></i> Categorias de productos</h2>
			<br>
			<div class="table-responsive">
				<table class="table table-hover" id="tbl_categorias" style="width:100%">
					<thead>
						<tr>
							<th>Id</th>
							<th>Categoria</th>
							<th>Acción</th>
						</tr>
					</thead>
				</table>
			</div>
		</div>
	</div>

	<div class="modal fade" id="modal_categorias" tabindex="-1" role="dialog" aria-labelledby="label_modal_categorias" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="title_modal_categorias"></h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				</div>
				<form method="PUT" id="form_categorias" onsubmit="event.preventDefault(); return false" autocomplete="off">
					<div class="modal-body">
						<div class="form-group">
							<label for="categoria">Categoria <strong class="obligatorio">*</strong></label>
							<input type="text" class="form-control" id="categoria" name="categoria" required>
						</div>
					</div>
					<div class="modal-footer">
						<input type="submit" class="btn btn-primary" id="boton_guardar_categoria" value="Guardar categoria">
						<input type="submit" class="btn btn-primary" id="boton_editar_categoria" value="Actualizar categoria">
						<button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
					</div>
				</form>
			</div>
		</div>
	</div>

	<div class="modal fade" id="modal_categorias_eliminar" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog modal-sm" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Eliminar categoria</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				</div>
				<div class="modal-body">
					¿Está seguro de eliminar: <strong id="info-eliminar-categoria"></strong>?
				</div>
				<div class="modal-footer">
					<button class="btn btn-danger" id="boton_eliminar_categoria">Si, eliminar</button>
					<button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
@section('scripts-personalizados')
<script>
	var host = "{{config('app.url')}}";
</script>
<script src="{{ asset('js/funciones.js') }}"></script>
<script>
/* -------------------------------------------------------------------
* | Escuchador de eventos
*  -------------------------------------------------------------------
*/

$(document).ready(function(){
	eventoEditarCategoria();
	eventoEliminarCategoria();
	clickBotonNuevoCategoria();
	clickBotonGuardarCategoria();
	clickBotonEditarCategoria();
	clickBotonEliminarCategoria();
});


var tbl_categorias = $('#tbl_categorias').DataTable({
	"ajax": `${host}/configuracion/categorias`,
	"columns": [
	{"data":"id", "name": "id"},
	{"data":"categoria", "name": "categoria"},
	{"defaultContent": `<button class="editar btn btn-primary btn-sm" title="Editar categoria"><i class="fa fa-pencil-square-o fa-lg"></i></button> <button class="eliminar btn btn-danger btn-sm" title="Eliminar categoria"><i class="fa fa-trash-o fa-lg"></i></button>`}
	],
	"language" : idioma_espanol
});

function eventoEditarCategoria() {
	$("#tbl_categorias tbody").on("click", "button.editar", function(){
		data = tbl_categorias.row($(this).parents("tr")).data();
		idRow = tbl_categorias.row($(this).parents("tr")).index();
		tituloModal("#title_modal_categorias", "Editar categoria");
		$("#boton_editar_categoria").css('display', 'block').siblings('#boton_guardar_categoria').css('display','none');
		visibilidadModal("#modal_categorias", "show");
		$('#categoria').val(data.categoria);
	});
}

function eventoEliminarCategoria() {
	$("#tbl_categorias tbody").on("click", "button.eliminar", function(){
		data = tbl_categorias.row($(this).parents("tr")).data();
		idRow = tbl_categorias.row($(this).parents("tr")).index();
		$("#info-eliminar-categoria").html(data.categoria);
		visibilidadModal("#modal_categorias_eliminar", "show");
	});	
}

function clickBotonNuevoCategoria() {
	$('button.nuevo').click(function(){
		tituloModal("#title_modal_categorias", "Crear categoria");
		limpiarFormulario("#form_categorias");
		$("#boton_guardar_categoria").css('display', 'block').siblings('#boton_editar_categoria').css('display','none');
	});
}

function clickBotonGuardarCategoria() {
	$("#boton_guardar_categoria").click(function(){
		crear(tbl_categorias, "#modal_categorias", "#form_categorias", "POST", `${host}/configuracion/categorias`, 'Categoria creada exitosamente');
	});
}

function clickBotonEditarCategoria() {
	$("#boton_editar_categoria").click(function(){
		editar(tbl_categorias, "#modal_categorias", "#form_categorias", "PUT", `${host}/configuracion/categorias/${data.id}`, `Categoria ${data.id} actualizada exitosamente`);
	});
}

function clickBotonEliminarCategoria() {
	$("#boton_eliminar_categoria").click(function(){
		visibilidadModal("#modal_categorias_eliminar","toggle");
		eliminar(tbl_categorias, "#form_categorias", "DELETE", `${host}/configuracion/categorias/${data.id}`, `Categoria ${data.id} eliminada exitosamente`);
	});	
}
</script>
@endsection