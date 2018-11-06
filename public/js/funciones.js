/* -------------------------------------------------------------------
* | Variables globales
*  -------------------------------------------------------------------
*/

var cadena = "";
var data = "";
var idRow = "";
var idioma_espanol = {
    "sProcessing": "Procesando...",
    "sLengthMenu": "Mostrar _MENU_ registros",
    "sZeroRecords": "No se encontraron resultados",
    "sEmptyTable": "Ningún dato disponible en esta tabla",
    "sInfo": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
    "sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
    "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
    "sInfoPostFix": "",
    "sSearch": "Buscar:",
    "sUrl": "",
    "sInfoThousands": ",",
    "sLoadingRecords": "Cargando...",
    "oPaginate": {
        "sFirst": "Primero",
        "sLast": "Último",
        "sNext": "Siguiente",
        "sPrevious": "Anterior"
    }
};

/* -------------------------------------------------------------------
* | Funciones globales
*  -------------------------------------------------------------------
*/
function crear(dataTable, idModal, idFormulario, metodo, url, mensaje) {
    if ($(idFormulario)[0].checkValidity()) {
        visibilidadModal(idModal,"toggle");
        mostrarMensajeProcesando("#mensaje", "Procesando...", "info", 'fa fa-refresh fa-pulse  fa-lg fa fa-fw float-right');
        $.ajax({
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
            type: metodo,
            dataType: 'json',
            url: url,
            data: $(idFormulario).serialize()
        }).done(function(response){
            dataTable.row.add(response).draw(false);
            mostrarMensaje('#mensaje', mensaje, 'success', 3000, 'fa fa-check fa-lg float-right');
        }).fail(function(response){
            cadena = "Error<br>";
            $.each(response.responseJSON.errors, function (i, field) {
                cadena += "<li>" + field + "</li>";
            });
            mostrarMensaje('#mensaje', cadena, 'danger', 6000, 'fa fa-exclamation-circle fa-lg float-right');
        });
    }
}

function crearSinModal(idFormulario, metodo, url, mensaje) {
    if ($(idFormulario)[0].checkValidity()) {
        mostrarMensajeProcesando("#mensaje", "Procesando...", "info", 'fa fa-refresh fa-pulse  fa-lg fa fa-fw float-right');
        $.ajax({
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
            type: metodo,
            dataType: 'json',
            url: url,
            data: $(idFormulario).serialize()
        }).done(function(response){
            mostrarMensaje('#mensaje', mensaje, 'success', 3000, 'fa fa-check fa-lg float-right');
        }).fail(function(response){
            visibilidadModal(idModal,"toggle");
            cadena = "Error<br>";
            $.each(response.responseJSON.errors, function (i, field) {
                cadena += "<li>" + field + "</li>";
            });
            mostrarMensaje('#mensaje', cadena, 'danger', 6000, 'fa fa-exclamation-circle fa-lg float-right');
        });
    }
}

function editar(dataTable, idModal, idFormulario, metodo, url, mensaje) {
    if ($(idFormulario)[0].checkValidity()) {
        visibilidadModal(idModal,"toggle");
        mostrarMensajeProcesando("#mensaje", "Procesando...", "info", 'fa fa-refresh fa-pulse  fa-lg fa fa-fw float-right');
        $.ajax({
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
            type: metodo,
            dataType: 'json',
            url: url,
            data: $(idFormulario).serialize()
        }).done(function(response){
            dataTable.row(idRow).data(response);
            mostrarMensaje('#mensaje', mensaje, 'success', 3000, 'fa fa-check fa-lg float-right');
        }).fail(function(response){
            cadena = "Error<br>";
            $.each(response.responseJSON.errors, function (i, field) {
                cadena += "<li>" + field + "</li>";
            });
            mostrarMensaje('#mensaje', cadena, 'danger', 6000, 'fa fa-exclamation-circle fa-lg float-right');
        });
    }
}

function editarSinModal(idFormulario, metodo, url, mensaje) {
    if ($(idFormulario)[0].checkValidity()) {
        mostrarMensajeProcesando("#mensaje", "Procesando...", "info", 'fa fa-refresh fa-pulse  fa-lg fa fa-fw float-right');
        $.ajax({
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
            type: metodo,
            dataType: 'json',
            url: url,
            data: $(idFormulario).serialize()
        }).done(function(response){
            mostrarMensaje('#mensaje', mensaje, 'success', 3000, 'fa fa-check fa-lg float-right');
        }).fail(function(response){
            cadena = "Error<br>";
            $.each(response.responseJSON.errors, function (i, field) {
                cadena += "<li>" + field + "</li>";
            });
            mostrarMensaje('#mensaje', cadena, 'danger', 6000, 'fa fa-exclamation-circle fa-lg float-right');
        });
    }
}

function eliminar(dataTable, idFormulario, metodo, url, mensaje) {
    mostrarMensajeProcesando("#mensaje", "Procesando...", "info", 'fa fa-refresh fa-pulse  fa-lg fa fa-fw float-right');
    $.ajax({
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
        type: metodo,
        dataType: 'json',
        url: url,
        data: $(idFormulario).serialize()
    }).done(function(response){
        dataTable.row(idRow).remove().draw(false);
        mostrarMensaje('#mensaje', mensaje, 'success', 3000, 'fa fa-check fa-lg float-right');
    }).fail(function(response){
        cadena = "Error<br>";
        $.each(response.responseJSON.errors, function (i, field) {
            cadena += "<li>" + field + "</li>";
        });
        mostrarMensaje('#mensaje', cadena, 'danger', 6000, 'fa fa-exclamation-circle fa-lg float-right');
    });
}

function mostrarMensaje(nombreComponeneteAlerta, mensaje, color, tiempo, icon) {
    $(nombreComponeneteAlerta).html(`<i class="${icon}"></i></i><strong>${mensaje}</strong>`).removeClass().addClass('alert alert-' + color).slideDown(500).delay(tiempo).hide(600);
}

function mostrarMensajeProcesando(nombreComponente, mensaje, color, icon, ) {
    $(nombreComponente).html(`<i class="${icon}"></i></i><strong>${mensaje}</strong>`).removeClass().addClass('alert alert-' + color).show();
}

function limpiarFormulario(nombreFormulario) {
    $(nombreFormulario)[0].reset();
}

function tituloModal(idTituloModal, mensaje) {
    $(idTituloModal).html(mensaje);
}

function visibilidadModal(idModal, estadoModal) {
    $(idModal).modal(estadoModal);
}