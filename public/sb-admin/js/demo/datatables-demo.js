// Call the dataTables jQuery plugin
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

$("#tbl_generos").DataTable({
	"ajax": "http://admin.dev.com.gt/recursos-humanos/getGeneros",
	"columns": [
	{"data": "id", "name": "id"},
	{"data": "genero", "name": "genero"},
	{"data": "created_at", "name": "created_at"},
	{"data": "updated_at", "name": "updated_at"},
	{"defaultContent": `
	<button class="editar btn btn-primary" data-toggle="modal" data-target="#modalEditar"><i class="fa fa-pencil-square-o"></i></button>
	<button class="eliminar btn btn-danger" data-toggle="modal" data-target="#modalEliminar"><i class="fa fa-trash-o"></i></button>
	`}
	],
	"language": idioma_espanol
});