/* -------------------------------------------------------------------
* | Modulo contactos
*  -------------------------------------------------------------------
*/

// Variables
var tbl_contactos = $('#tbl_contactos').DataTable({
	"ajax": `http://localhost/recursos-humanos/empleados/${idEmpleado}/contactos`,
	"columns": [
	{"data":"id", "name": "id"},
	{"data":"contacto", "name": "contacto"},
	{"data":"medio_contacto", "name": "medio_contacto"},
	{"defaultContent": `<button class="editar btn btn-primary btn-sm"><i class="fa fa-pencil-square-o"></i></button> <button class="eliminar btn btn-danger btn-sm"><i class="fa fa-trash-o"></i></button>`}
	],
	"language" : idioma_espanol
});

// Escuchador de eventos (editar y eliminar)
function eventoEditarContacto() {
	$("#tbl_contactos tbody").on("click", "button.editar", function(){
		data = tbl_contactos.row($(this).parents("tr")).data();
		idRow = tbl_contactos.row($(this).parents("tr")).index();
		tituloModal("#title_modal_contactos", "Editar contacto");
		$("#boton_editar_contacto").css('display', 'block').siblings('#boton_guardar_contacto').css('display','none');
		visibilidadModal("#modal_contactos", "show");
		$('#medio_contacto_id').val($(`#medio_contacto_id option:contains("${data.medio_contacto}")`).val());
		$('#contacto').val(data.contacto);
	});
}

function eventoEliminarContacto() {
	$("#tbl_contactos tbody").on("click", "button.eliminar", function(){
		data = tbl_contactos.row($(this).parents("tr")).data();
		idRow = tbl_contactos.row($(this).parents("tr")).index();
		$("#info-eliminar-contacto").html(data.contacto);
		visibilidadModal("#modal_contactos_eliminar", "show");
	});	
}

// Click en botones (crear, editar y eliminar)
function clickBotonNuevoContacto() {
	$('button.nuevo').click(function(){
		tituloModal("#title_modal_contactos", "Crear contacto");
		limpiarFormulario("#form_contactos");
		$("#boton_guardar_contacto").css('display', 'block').siblings('#boton_editar_contacto').css('display','none');
	});
}

function clickBotonGuardarContacto() {
	$("#boton_guardar_contacto").click(function(){
		crear(tbl_contactos, "#modal_contactos", "#form_contactos", "POST", `http://localhost/recursos-humanos/empleados/${idEmpleado}/contactos`, 'Contacto creado exitosamente');
	});
}

function clickBotonEditarContacto() {
	$("#boton_editar_contacto").click(function(){
		editar(tbl_contactos, "#modal_contactos", "#form_contactos", "PUT", `http://localhost/recursos-humanos/empleados/${idEmpleado}/contactos/${data.id}`, `Contacto ${data.id} actualizado exitosamente`);
	});
}

function clickBotonEliminarContacto() {
	$("#boton_eliminar_contacto").click(function(){
		visibilidadModal("#modal_contactos_eliminar","toggle");
		eliminar(tbl_contactos, "#form_contactos", "DELETE", `http://localhost/recursos-humanos/empleados/${idEmpleado}/contactos/${data.id}`, `Contacto ${data.id} eliminado exitosamente`);
	});	
}