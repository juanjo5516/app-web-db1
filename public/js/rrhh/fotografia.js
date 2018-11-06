/* -------------------------------------------------------------------
* | Fotografia
*  -------------------------------------------------------------------
*/

$('#foto_perfil').click(function(){
	$('#foto').click();
});

$('#btn_fotografia').click(function(){
	mostrarMensajeProcesando("#mensaje","Procesando...","info",'fa fa-refresh fa-pulse  fa-lg fa fa-fw float-right');
	if(validarFormulario('#form_fotografia')){
		$.ajax({
			headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
			type: 'POST',
			dataType: 'json',
			url: '/recursos-humano/supload',
			data: $('#form_actualizar_empleado').serialize(),
			success: function(response){
				mostrarMensaje('#mensaje','Fotografía actualizada correctamente','success',6000, 'fa fa-check fa-lg float-right');
			},
			error: function(response){

			}
		});
	}
});