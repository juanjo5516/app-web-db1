/* -------------------------------------------------------------------
* | Capacitaciones
*  -------------------------------------------------------------------
*/

// Variables
var tbl_capacitaciones = $('#tbl_capacitaciones').DataTable({
	"ajax": `http://localhost/recursos-humanos/empleados/${idEmpleado}/capacitaciones`,
	"columns": [
	{"data":"id", "name": "id"},
	{"data":"curso", "name": "curso"},
	{"data":"lugar", "name": "lugar"},
	{"data":"finalizacion", "name": "finalizacion"},
	{"data":"institucion", "name": "institucion"},
	{"defaultContent": `<button class="editar btn btn-primary btn-sm"><i class="fa fa-pencil-square-o"></i></button> <button class="eliminar btn btn-danger btn-sm"><i class="fa fa-trash-o"></i></button>`}
	],
	"language" : idioma_espanol
});

// Escuchador de eventos (editar y eliminar)
function eventoEditarCapacitacion() {
	$("#tbl_capacitaciones tbody").on("click", "button.editar", function(){
		data = tbl_capacitaciones.row($(this).parents("tr")).data();
		idRow = tbl_capacitaciones.row($(this).parents("tr")).index();
		tituloModal("#title_modal_capacitaciones", "Editar capacitación");
		$("#boton_editar_capacitacion").css('display', 'block').siblings('#boton_guardar_capacitacion').css('display','none');
		visibilidadModal("#modal_capacitaciones", "show");
		$("#curso").val(data.curso);
		$('#institucion_id').val($(`#institucion_id option:contains("${data.institucion}")`).val());
		$("#lugar").val(data.lugar);
		$("#finalizacion").val(data.finalizacion);
	});
}

function eventoEliminarCapacitacion() {
	$("#tbl_capacitaciones tbody").on("click", "button.eliminar", function(){
		data = tbl_capacitaciones.row($(this).parents("tr")).data();
		idRow = tbl_capacitaciones.row($(this).parents("tr")).index();
		$("#info-eliminar-capacitacion").html(data.curso);
		visibilidadModal("#modal_capacitaciones_eliminar", "show");
	});	
}

// Click en botones (crear, editar y eliminar)
function clickBotonNuevoCapacitacion() {
	$('button.nuevo').click(function(){
		tituloModal("#title_modal_capacitaciones", "Crear capacitación");
		limpiarFormulario("#form_capacitaciones");
		$("#boton_guardar_capacitacion").css('display', 'block').siblings('#boton_editar_capacitacion').css('display','none');
	});
}

function clickBotonGuardarCapacitacion() {
	$("#boton_guardar_capacitacion").click(function(){
		crear(tbl_capacitaciones, "#modal_capacitaciones", "#form_capacitaciones", "POST", `http://localhost/recursos-humanos/empleados/${idEmpleado}/capacitaciones`, 'Capacitación creada exitosamente');
	});
}

function clickBotonEditarCapacitacion() {
	$("#boton_editar_capacitacion").click(function(){
		editar(tbl_capacitaciones, "#modal_capacitaciones", "#form_capacitaciones", "PUT", `http://localhost/recursos-humanos/empleados/${idEmpleado}/capacitaciones/${data.id}`, `Capacitación ${data.id} actualizada exitosamente`);
	});
}

function clickBotonEliminarCapacitacion() {
	$("#boton_eliminar_capacitacion").click(function(){
		visibilidadModal("#modal_capacitaciones_eliminar","toggle");
		eliminar(tbl_capacitaciones, "#form_capacitaciones", "DELETE", `http://localhost/recursos-humanos/empleados/${idEmpleado}/capacitaciones/${data.id}`, `Capacitación ${data.id} eliminada exitosamente`);
	});	
}