/* -------------------------------------------------------------------
* | Residencia
*  -------------------------------------------------------------------
*/

// Variables
var tbl_residencias = $('#tbl_residencias').DataTable({
	"ajax": `http://localhost/recursos-humanos/empleados/${idEmpleado}/residencias`,
	"columns": [
	{"data":"id", "name": "id"},
	{"data":"direccion", "name": "direccion"},
	{"data":"zona_id", "name": "zona_id"},
	{"data":"colonia", "name": "colonia"},
	{"data":"departamento", "name": "departamento"},
	{"data":"municipio", "name": "municipio"},
	{"defaultContent": `<button class="editar btn btn-primary btn-sm"><i class="fa fa-pencil-square-o"></i></button> <button class="eliminar btn btn-danger btn-sm"><i class="fa fa-trash-o"></i></button>`}
	],
	"language" : idioma_espanol
});

// Escuchador de eventos (editar y eliminar)
function eventoEditarResidencia() {
	$("#tbl_residencias tbody").on("click", "button.editar", function(){
		data = tbl_residencias.row($(this).parents("tr")).data();
		idRow = tbl_residencias.row($(this).parents("tr")).index();
		tituloModal("#title_modal_residencias", "Editar residencia");
		$("#boton_editar_residencia").css('display', 'block').siblings('#boton_guardar_residencia').css('display','none');
		visibilidadModal("#modal_residencias", "show");
		$("#direccion").val(data.direccion);
		$('#zona_id').val(data.zona_id);
		$("#colonia").val(data.colonia);
		$('#departamento_id').val($(`#departamento_id option:contains("${data.departamento}")`).val());
		setSelectModal("#departamento_id", "#municipio_id", "/recursos-humanos/getMunicipios");
	});
}

function eventoEliminarResidencia() {
	$("#tbl_residencias tbody").on("click", "button.eliminar", function(){
		data = tbl_residencias.row($(this).parents("tr")).data();
		idRow = tbl_residencias.row($(this).parents("tr")).index();
		$("#info-eliminar-residencia").html(data.direccion);
		visibilidadModal("#modal_residencias_eliminar", "show");
	});	
}

// Click en botones (crear, editar y eliminar)
function clickBotonNuevoResidencia() {
	$('button.nuevo').click(function(){
		tituloModal("#title_modal_residencias", "Crear residencia");
		limpiarFormulario("#form_residencias");
		$("#boton_guardar_residencia").css('display', 'block').siblings('#boton_editar_residencia').css('display','none');
	});
}

function clickBotonGuardarResidencia() {
	$("#boton_guardar_residencia").click(function(){
		crear(tbl_residencias, "#modal_residencias", "#form_residencias", "POST", `http://localhost/recursos-humanos/empleados/${idEmpleado}/residencias`, 'Residencia creada exitosamente');
	});
}

function clickBotonEditarResidencia() {
	$("#boton_editar_residencia").click(function(){
		editar(tbl_residencias, "#modal_residencias", "#form_residencias", "PUT", `http://localhost/recursos-humanos/empleados/${idEmpleado}/residencias/${data.id}`, `Residencia ${data.id} actualizada exitosamente`);
	});
}

function clickBotonEliminarResidencia() {
	$("#boton_eliminar_residencia").click(function(){
		visibilidadModal("#modal_residencias_eliminar","toggle");
		eliminar(tbl_residencias, "#form_residencias", "DELETE", `http://localhost/recursos-humanos/empleados/${idEmpleado}/residencias/${data.id}`, `Residencia ${data.id} eliminada exitosamente`);
	});	
}

// Muestra municipio al seleccionar un departamento
function setSelectResidencia(idSelectPadre, idSelectHijo, ruta) {
	$(idSelectPadre).change(event => {
		$.get(`${ruta}/${event.target.value}`, function (municipios) {
			cadena = "<option value=''></option>";
			municipios.forEach(municipio => {
				cadena += `<option value="${municipio.id}">${municipio.municipio}</option>`;
			});
			$(idSelectHijo).html(cadena);
		});
	});
}

function setSelectModal(idSelectPadre, idSelectHijo, ruta) {
	$.get(`${ruta}/${$(idSelectPadre).val()}`, function (municipios) {
		cadena = "<option value=''></option>";
		municipios.forEach(municipio => {
			cadena += `<option value="${municipio.id}">${municipio.municipio}</option>`;
		});
		$(idSelectHijo).html(cadena);
		$(idSelectHijo).val($(`${idSelectHijo} option:contains("${data.municipio}")`).val());
	});
}