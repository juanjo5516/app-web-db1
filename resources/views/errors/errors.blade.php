@if(count($errors))
<div class="alert alert-danger alert-dismissible" role="alert">
	<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	<h5 class="alert-heading">Error al registrar.</h5>
	<h4>Causa</h4>
	<ul>
		@foreach($errors->all() as $error)
		<li>{{ $error }}</li>
		@endforeach
	</ul>
</div>
<script type="text/javascript">
	window.setTimeout(function() {
		$(".alert-danger").fadeTo(500,500).slideUp(500, function(){
			$(this).remove(); 
		});
	}, 7000);	
</script>
@endif