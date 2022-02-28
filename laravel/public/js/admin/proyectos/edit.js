$(function() {
	$('[data-categoria]').on('click', editCategoriaModal);
	$('[data-soporte]').on('click', editSoporteModal);


});
// $('.cerrarModal').on('click', function(){
//     $("#modalEditCategoria").modal('hide')


// });


function editCategoriaModal() {
	// id
	var categoria_id = $(this).data('categoria');
	$('#categoria_id').val(categoria_id);
	// name
	var categoria_name = $(this).parent().prev().text();

	$('#categoria_name').val(categoria_name);
	// show
	$('#modalEditCategoria').modal('show');
    // Close modal on button click


}

function editSoporteModal() {
	// id
	var soporte_id = $(this).data('soporte');
	$('#soporte_id').val(soporte_id);
	// name
	var soporte_name = $(this).parent().prev().text();
	$('#name').val(soporte_name);
	// show
	$('#modalEditSoporte').modal('show');
}
