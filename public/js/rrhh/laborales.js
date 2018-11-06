var tbl_salarios = $('#tbl_salarios').DataTable({
	"language" : idioma_espanol
});


$('#renglon_id').on('change',function(){
	if(($('#renglon_id').val() == '')){
		$('#seccion_planilla').css('display','none');
		$('#seccion_servicio').css('display','none');
	}else if ($('#renglon_id').val()> 2) {
		$('#seccion_planilla').css('display','none');
		$('#seccion_servicio').css('display','block');
	}else{
		$('#seccion_servicio').css('display','none');
		$('#seccion_planilla').css('display','block');
	}

});