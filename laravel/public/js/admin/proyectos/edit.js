$(function() {
	$('[data-category]').on('click', editCategoryModal);
	$('[data-level]').on('click', editLevelModal);
});

function editCategoryModal() {
	// id
	var categoria_id = $(this).data('category');
	$('#categoria_id').val(categoria_id);
	// name
	var categoria_name = $(this).parent().prev().text();
	$('#categoria_name').val(categoria_name);
	// show
	$('#modalEditCategory').modal('show');
}

function editLevelModal() {
	// id
	var soporte_id = $(this).data('soporte');
	$('#soporte_id').val(soporte_id);
	// name
	var soporte_name = $(this).parent().prev().text();
	$('#soporte_name').val(soporte_name);
	// show
	$('#modalEditLevel').modal('show');
}
