/* -------------------------------------------------------------------
* | Modulo contactos
*  -------------------------------------------------------------------
*/

// Variables
var tbl_familiares = $('#tbl_familiares').DataTable({
    "ajax": `http://localhost/recursos-humanos/empleados/${idEmpleado}/familiares`,
    "columns": [
    {"data":"id", "name": "id"},
    {"data":"nombre", "name": "nombre"},
    {"data":"telefono", "name": "telefono"},
    {"data":"correo", "name": "correo"},
    {"data":"parentesco", "name": "parentesco"},
    {"defaultContent": `<button class="editar btn btn-primary btn-sm"><i class="fa fa-pencil-square-o"></i></button> <button class="eliminar btn btn-danger btn-sm"><i class="fa fa-trash-o"></i></button>`}
    ],
    "language" : idioma_espanol
});

// Escuchador de eventos (editar y eliminar)
function eventoEditarFamiliar() {
    $("#tbl_familiares tbody").on("click", "button.editar", function(){
        data = tbl_familiares.row($(this).parents("tr")).data();
        idRow = tbl_familiares.row($(this).parents("tr")).index();
        tituloModal("#title_modal_familiares", "Editar familiar");
        $("#boton_editar_familiar").css('display', 'block').siblings('#boton_guardar_familiar').css('display','none');
        visibilidadModal("#modal_familiares", "show");
        $('#nombre').val(data.nombre);
        $('#telefono').val(data.telefono);
        $('#correo').val(data.correo);
        $('#parentesco_id').val($(`#parentesco_id option:contains("${data.parentesco}")`).val());
    });
}

function eventoEliminarFamiliar() {
    $("#tbl_familiares tbody").on("click", "button.eliminar", function(){
        data = tbl_familiares.row($(this).parents("tr")).data();
        idRow = tbl_familiares.row($(this).parents("tr")).index();
        $("#info-eliminar-familiar").html(data.nombre);
        visibilidadModal("#modal_familiares_eliminar", "show");
    }); 
}

// Click en botones (crear, editar y eliminar)
function clickBotonNuevoFamiliar() {
    $('button.nuevo').click(function(){
        tituloModal("#title_modal_familiares", "Crear familiar");
        limpiarFormulario("#form_familiares");
        $("#boton_guardar_familiar").css('display', 'block').siblings('#boton_editar_familiar').css('display','none');
    });
}

function clickBotonGuardarFamiliar() {
    $("#boton_guardar_familiar").click(function(){
        crear(tbl_familiares, "#modal_familiares", "#form_familiares", "POST", `http://localhost/recursos-humanos/empleados/${idEmpleado}/familiares`, 'Familiar creado exitosamente');
    });
}

function clickBotonEditarFamiliar() {
    $("#boton_editar_familiar").click(function(){
        editar(tbl_familiares, "#modal_familiares", "#form_familiares", "PUT", `http://localhost/recursos-humanos/empleados/${idEmpleado}/familiares/${data.id}`, `Familiar ${data.id} actualizado exitosamente`);
    });
}

function clickBotonEliminarFamiliar() {
    $("#boton_eliminar_familiar").click(function(){
        visibilidadModal("#modal_familiares_eliminar","toggle");
        eliminar(tbl_familiares, "#form_familiares", "DELETE", `http://localhost/recursos-humanos/empleados/${idEmpleado}/familiares/${data.id}`, `Familiar ${data.id} eliminado exitosamente`);
    }); 
}