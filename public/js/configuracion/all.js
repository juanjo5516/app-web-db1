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
		$('#categoria').val(data.categoria)
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