/* -------------------------------------------------------------------
* | Insumos
*  -------------------------------------------------------------------
*/

// Variables
var tbl_insumos = $('#tbl_insumos').DataTable({
	"ajax": `http://localhost:8000/getInsumos`,
	"columns": [
	{"data":"id_insumo", "name": "id_insumo"},
	{"data":"id_lote", "name": "id_lote"},
	{"data":"nombre", "name": "nombre"},
	{"data":"laboratorio", "name": "laboratorio"},
	{"data":"existencia", "name": "existencia"},
	{"defaultContent": `<button class="editar btn btn-primary btn-sm"><i class="fa fa-pencil-square-o"></i></button> <button class="eliminar btn btn-danger btn-sm"><i class="fa fa-trash-o"></i></button>`}
	],
	"language" : idioma_espanol
});

// Escuchador de eventos (editar y eliminar)
function eventoEditarInsumo() {
	$("#tbl_insumos tbody").on("click", "button.editar", function(){
		data = tbl_insumos.row($(this).parents("tr")).data();
		idRow = tbl_insumos.row($(this).parents("tr")).index();
		tituloModal("#title_modal_insumos", "Editar insumo");
		$("#boton_editar_insumo").css('display', 'block').siblings('#boton_guardar_insumo').css('display','none');
		visibilidadModal("#modal_insumos", "show");
		$("#ID").val(data.id_insumo);
		$("#ID_LOTE").val(data.id_lote);
		$('#NOMBRE').val(data.nombre);
		$('#ID_LABORATORIO').val($(`#ID_LABORATORIO option:contains("${data.laboratorio}")`).val());
		$("#EXISTENCIA").val(data.existencia);
	});
}

function eventoEliminarInsumo() {
	$("#tbl_insumos tbody").on("click", "button.eliminar", function(){
		data = tbl_insumos.row($(this).parents("tr")).data();
		idRow = tbl_insumos.row($(this).parents("tr")).index();
		$("#info-eliminar-insumo").html(data.nombre);
		visibilidadModal("#modal_insumos_eliminar", "show");
	});	
}

// Click en botones (crear, editar y eliminar)
function clickBotonNuevoInsumo() {
	$('button.nuevo').click(function(){
		tituloModal("#title_modal_insumos", "Crear insumo");
		limpiarFormulario("#form_insumos");
		$("#boton_guardar_insumo").css('display', 'block').siblings('#boton_editar_insumo').css('display','none');
	});
}

function clickBotonGuardarInsumo() {
	$("#boton_guardar_insumo").click(function(){
		crear(tbl_insumos, "#modal_insumos", "#form_insumos", "POST", `http://localhost:8000/insumos`, 'Insumo creado exitosamente');
	});
}

function clickBotonEditarInsumo() {
	$("#boton_editar_insumo").click(function(){
		editar(tbl_insumos, "#modal_insumos", "#form_insumos", "PUT", `http://localhost:8000/insumos/${data.id_insumo}`, `Insumo ${data.id_insumo} actualizado exitosamente`);
	});
}

function clickBotonEliminarInsumo() {
	$("#boton_eliminar_insumo").click(function(){
		visibilidadModal("#modal_insumos_eliminar","toggle");
		eliminar(tbl_insumos, "#form_insumos", "DELETE", `http://localhost:8000/insumos/${data.id_insumo}`, `Insumo ${data.id_insumo} eliminado exitosamente`);
	});	
}