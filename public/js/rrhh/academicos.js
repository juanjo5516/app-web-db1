/* -------------------------------------------------------------------
* | Estudios
*  -------------------------------------------------------------------
*/

// Variables
var tbl_estudios = $('#tbl_estudios').DataTable({
	"ajax": `http://localhost/recursos-humanos/empleados/${idEmpleado}/estudios`,
	"columns": [
	{"data":"id", "name": "id"},
	{"data":"grado", "name": "grado", "visible": false},
	{"data":"carrera", "name": "carrera", "visible": false},
	{"data":"titulo", "name": "titulo"},
	{"data":"centro", "name": "centro"},
	{"data":"colegio", "name": "colegio"},
	{"data":"numero_colegiado", "name": "numero_colegiado"},
	{"data":"fecha_egreso", "name": "fecha_egreso"},
	{"data":"estado_estudio", "name": "estado_estudio"},
	{"defaultContent": `<button class="editar btn btn-primary btn-sm"><i class="fa fa-pencil-square-o"></i></button> <button class="eliminar btn btn-danger btn-sm"><i class="fa fa-trash-o"></i></button>`}
	],
	"language" : idioma_espanol
});

// Escuchador de eventos (editar y eliminar)
function eventoEditarEstudio() {
	$("#tbl_estudios tbody").on("click", "button.editar", function(){
		data = tbl_estudios.row($(this).parents("tr")).data();
		idRow = tbl_estudios.row($(this).parents("tr")).index();
		tituloModal("#title_modal_estudios", "Editar estudio");
		$("#boton_editar_estudio").css('display', 'block').siblings('#boton_guardar_estudio').css('display','none');
		visibilidadModal("#modal_estudios", "show");
		$('#grado_id').val($(`#grado_id option:contains("${data.grado}")`).val());
		setSelectModalCarrera("#grado_id", "#carrera_id", '/recursos-humanos/getCarreras');
		$('#centro_id').val($(`#centro_id option:contains("${data.centro}")`).val());
		$('#estado_estudio_id').val($(`#estado_estudio_id option:contains("${data.estado_estudio}")`).val());
		$('#numero_colegiado').val(data.numero_colegiado);
		$('#colegio_id').val($(`#colegio_id option:contains("${data.colegio}")`).val());
		$('#fecha_egreso').val(data.fecha_egreso);
	});
}

function eventoEliminarEstudio() {
	$("#tbl_estudios tbody").on("click", "button.eliminar", function(){
		data = tbl_estudios.row($(this).parents("tr")).data();
		idRow = tbl_estudios.row($(this).parents("tr")).index();
		$("#info-eliminar-estudio").html(data.titulo);
		visibilidadModal("#modal_estudios_eliminar", "show");
	});	
}

// Click en botones (crear, editar y eliminar)
function clickBotonNuevoEstudio() {
	$('button.nuevo').click(function(){
		tituloModal("#title_modal_estudios", "Crear estudio");
		limpiarFormulario("#form_estudios");
		$("#boton_guardar_estudio").css('display', 'block').siblings('#boton_editar_estudio').css('display','none');
	});
}

function clickBotonGuardarEstudio() {
	$("#boton_guardar_estudio").click(function(){
		crear(tbl_estudios, "#modal_estudios", "#form_estudios", "POST", `http://localhost/recursos-humanos/empleados/${idEmpleado}/estudios`, 'Estudio creado exitosamente');
	});
}

function clickBotonEditarEstudio() {
	$("#boton_editar_estudio").click(function(){
		editar(tbl_estudios, "#modal_estudios", "#form_estudios", "PUT", `http://localhost/recursos-humanos/empleados/${idEmpleado}/estudios/${data.id}`, `Estudio ${data.id} actualizado exitosamente`);
	});
}

function clickBotonEliminarEstudio() {
	$("#boton_eliminar_estudio").click(function(){
		visibilidadModal("#modal_estudios_eliminar","toggle");
		eliminar(tbl_estudios, "#form_estudios", "DELETE", `http://localhost/recursos-humanos/empleados/${idEmpleado}/estudios/${data.id}`, `Estudio ${data.id} eliminado exitosamente`);
	});	
}
function setSelectCarrera(idSelectPadre, idSelectHijo, ruta) {
	$(idSelectPadre).change(event => {
		$(idSelectHijo).empty();
		$('#titulo_id').empty();
		$.get(`${ruta}/${event.target.value}`, function (carreras) {
			cadena = "<option value=''></option>";
			carreras.forEach(carrera => {
				cadena += `<option value="${carrera.id}">${carrera.carrera}</option>`;
			});
			$(idSelectHijo).html(cadena);
		});
	});
}

function setSelectTitulo(idSelectPadre, idSelectHijo, ruta) {
	$(idSelectPadre).change(event => {
		$.get(`${ruta}/${event.target.value}`, function (titulos) {
			cadena = "<option value=''></option>";
			titulos.forEach(titulo => {
				cadena += `<option value="${titulo.id}">${titulo.titulo}</option>`;
			});
			$(idSelectHijo).html(cadena);
		});
	});
}

function setSelectModalCarrera(idSelectPadre, idSelectHijo, ruta) {
	$.get(`${ruta}/${$(idSelectPadre).val()}`, function (carreras) {
		cadena = "<option value=''></option>";
		carreras.forEach(carrera => {
			cadena += `<option value="${carrera.id}">${carrera.carrera}</option>`;
		});
		$(idSelectHijo).html(cadena);
		$(idSelectHijo).val($(`${idSelectHijo} option:contains("${data.carrera}")`).val());
		setSelectModalTitulo("#carrera_id", "#titulo_id", '/recursos-humanos/getTitulos');
	});
}

function setSelectModalTitulo(idSelectPadre, idSelectHijo, ruta) {
	$.get(`${ruta}/${$(idSelectPadre).val()}`, function (titulos) {
		cadena = "<option value=''></option>";
		titulos.forEach(titulo => {
			cadena += `<option value="${titulo.id}">${titulo.titulo}</option>`;
		});
		$(idSelectHijo).html(cadena);
		$(idSelectHijo).val($(`${idSelectHijo} option:contains("${data.titulo}")`).val());
	});
}