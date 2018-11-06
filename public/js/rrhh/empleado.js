/* -------------------------------------------------------------------
* | Empleado
*  -------------------------------------------------------------------
*/
$('#btn_actualizar_empleado').click(function(){
	editarSinModal("#form_actualizar_empleado", "PUT", `http://localhost/recursos-humanos/empleados/${idEmpleado}`, `Empleado ${idEmpleado} actualizado exitosamente`);
	window.location = '#page-top';
});