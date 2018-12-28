@extends('layouts.sb-admin.app')
@section('titulo','Configuración - productos')

@section('content')
<ol class="breadcrumb">
	<li class="breadcrumb-item">
		<a href="/configuracion">configuracion</a>
	</li>
	<li class="breadcrumb-item active">
		<a href="/home">productos</a>
	</li>
</ol>
<div class="container">
	<div class="alert alert-success" role="alert" id="mensaje" style="display: none;">
	</div>
	<div class="row">
		<div class="col-md-12">
			<button class="nuevo btn btn-primary float-right" data-toggle="modal" data-target="#modal_productos"><i class="fa fa-plus fa-lg"></i> Agregar producto</button>
			<h2><i class="fa fa-shopping-cart"></i> Listado de productos</h2>
			<br>
			<div class="table-responsive">
				<table class="table table-hover" id="tbl_productos" style="width:100%">
					<thead>
						<tr>
							<th>Id</th>
							<th>Categoria</th>
							<th>Producto</th>
							<th>Precio compra</th>
							<th>Precio venta</th>
							<th>Descripción</th>
							<th>Acción</th>
						</tr>
					</thead>
				</table>
			</div>
		</div>
	</div>

	<div class="modal fade" id="modal_productos" tabindex="-1" role="dialog" aria-labelledby="label_modal_productos" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="title_modal_productos"></h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				</div>
				<form method="PUT" id="form_productos" onsubmit="event.preventDefault(); return false" autocomplete="off">
					<div class="modal-body">
						<div class="form-group">
							{!! Form::label('categoria_id','Categoria') !!}&nbsp;<strong class="obligatorio">*</strong>
							{!! Form::select('categoria_id', \DB::table('categorias')->orderBy('categoria')->pluck('categoria','id'), null, ['class' => 'form-control', 'placeholder' => '', 'required']) !!}
						</div>
						<div class="form-group">
							<label for="producto">Producto <strong class="obligatorio">*</strong></label>
							<input type="text" class="form-control" id="producto" name="producto" required>
						</div>
						<div class="form-row">
							<div class="col-md-6 mb-3">
								<label for="precio_compra">Precio de compra <strong class="obligatorio">*</strong></label>
								<input type="text" class="form-control" id="precio_compra" name="precio_compra" required>
							</div>
							<div class="col-md-6 mb-3">
								<label for="precio_venta">Precio de venta <strong class="obligatorio">*</strong></label>
								<input type="text" class="form-control" id="precio_venta" name="precio_venta" required>
							</div>
						</div>
						<div class="form-group">
							<label for="existencia">Existencia <strong class="obligatorio">*</strong></label>
							<input type="number" class="form-control" id="existencia" name="existencia">
						</div>
						<div class="form-group">
							<label for="descripcion">Descripción <strong class="obligatorio">*</strong></label>
							<input type="text" class="form-control" id="descripcion" name="descripcion" required>
						</div>
					</div>
					<div class="modal-footer">
						<input type="submit" class="btn btn-primary" id="boton_guardar_producto" value="Guardar producto">
						<input type="submit" class="btn btn-primary" id="boton_editar_producto" value="Actualizar producto">
						<button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
					</div>
				</form>
			</div>
		</div>
	</div>

	<div class="modal fade" id="modal_productos_eliminar" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog modal-sm" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Eliminar producto</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				</div>
				<div class="modal-body">
					¿Está seguro de eliminar: <strong id="info-eliminar-producto"></strong>?
				</div>
				<div class="modal-footer">
					<button class="btn btn-danger" id="boton_eliminar_producto">Si, eliminar</button>
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
<script src="{{ asset('js/configuracion/all.js') }}"></script>
<script>
/* -------------------------------------------------------------------
* | Escuchador de eventos
*  -------------------------------------------------------------------
*/

$(document).ready(function(){
	eventoEditarProducto();
	eventoEliminarProducto();
	clickBotonNuevoProducto();
	clickBotonGuardarProducto();
	clickBotonEditarProducto();
	clickBotonEliminarProducto();
});

var tbl_productos = $('#tbl_productos').DataTable({
	"ajax": `${host}/configuracion/productos`,
	"columns": [
	{"data":"id", "name": "id"},
	{"data":"categoria", "name": "categoria"},
	{"data":"producto", "name": "producto"},
	{"data":"precio_compra", "name": "precio_compra"},
	{"data":"precio_venta", "name": "precio_venta"},
	{"data":"descripcion", "name": "descripcion"},
	{"defaultContent": `<button class="editar btn btn-primary btn-sm" title="Editar producto"><i class="fa fa-pencil-square-o fa-lg"></i></button> <button class="eliminar btn btn-danger btn-sm" title="Eliminar producto"><i class="fa fa-trash-o fa-lg"></i></button>`}
	],
	"language" : idioma_espanol
});

function eventoEditarProducto() {
	$("#tbl_productos tbody").on("click", "button.editar", function(){
		data = tbl_productos.row($(this).parents("tr")).data();
		idRow = tbl_productos.row($(this).parents("tr")).index();
		tituloModal("#title_modal_productos", "Editar producto");
		$("#boton_editar_producto").css('display', 'block').siblings('#boton_guardar_producto').css('display','none');
		visibilidadModal("#modal_productos", "show");
		$('#categoria_id').val($(`#categoria_id option:contains("${data.categoria}")`).val());
		$('#producto').val(data.producto);
		$('#precio_compra').val(data.precio_compra);
		$('#precio_venta').val(data.precio_venta);
		$('#descripcion').val(data.descripcion);
	});
}

function eventoEliminarProducto() {
	$("#tbl_productos tbody").on("click", "button.eliminar", function(){
		data = tbl_productos.row($(this).parents("tr")).data();
		idRow = tbl_productos.row($(this).parents("tr")).index();
		$("#info-eliminar-producto").html(data.producto);
		visibilidadModal("#modal_productos_eliminar", "show");
	});	
}

function clickBotonNuevoProducto() {
	$('button.nuevo').click(function(){
		tituloModal("#title_modal_productos", "Crear producto");
		limpiarFormulario("#form_productos");
		$("#boton_guardar_producto").css('display', 'block').siblings('#boton_editar_producto').css('display','none');
	});
}

function clickBotonGuardarProducto() {
	$("#boton_guardar_producto").click(function(){
		crear(tbl_productos, "#modal_productos", "#form_productos", "POST", `${host}/configuracion/productos`, 'Producto creado exitosamente');
	});
}

function clickBotonEditarProducto() {
	$("#boton_editar_producto").click(function(){
		editar(tbl_productos, "#modal_productos", "#form_productos", "PUT", `${host}/configuracion/productos/${data.id}`, `Producto ${data.id} actualizado exitosamente`);
	});
}

function clickBotonEliminarProducto() {
	$("#boton_eliminar_producto").click(function(){
		visibilidadModal("#modal_productos_eliminar","toggle");
		eliminar(tbl_productos, "#form_productos", "DELETE", `${host}/configuracion/productos/${data.id}`, `Producto ${data.id} eliminado exitosamente`);
	});	
}
</script>
@endsection