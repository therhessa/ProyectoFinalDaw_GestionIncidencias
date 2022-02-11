 $(function () {
 	$('#lista-proyectos').on('change', onNewProyectostSelected);
 });

 function onNewProyectostSelected() {
 	var proyecto_id = $(this).val();
 	location.href = '/seleccionar/proyecto/'+proyecto_id;
 }


