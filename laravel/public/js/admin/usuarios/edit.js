$(function() {
	
	$('#select-proyecto').on('change', onSelectCambiarProyecto);

});

function onSelectCambiarProyecto() {
	var proyecto_id = $(this).val();

	if (! proyecto_id) {
		$('#select-soporte').html('<option value="">Seleccione soporte</option>');
		return;
	}

	// AJAX
	$.get('/api/proyecto/'+proyecto_id+'/soportes', function (data) {
		var html_select = '<option value="">Seleccione soporte</option>';
		for (var i=0; i<data.length; ++i)
			html_select += '<option value="'+data[i].id+'">'+data[i].name+'</option>';
		$('#select-soporte').html(html_select);
	});
}