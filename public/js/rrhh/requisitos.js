var tbl_requisitos = $('#tbl_requisitos').DataTable({
	"ajax": `http://localhost/recursos-humanos/empleados/${idEmpleado}/requisitos`,
	"columns": [
	{"data": "id", "name": "id"},
	{"data": "requisito", "name": "requisito"},
	{"data": "observacion", "name": "observacion"},
	{"data": "estado", "name": "estado"},
	{data: 'action', name: 'action'}
	],
	"language" : idioma_espanol
});