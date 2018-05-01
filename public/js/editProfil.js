$('#editModal').on('show.bs.modal', function (event) {
	console.log('Modal Opened');
	var button = $(event.relatedTarget) // Button that triggered the modal
	var id = button.data('fid')
	var name = button.data('fname')
	var email = button.data('femail')
	var alamat = button.data('falamat')
	var telepon = button.data('ftelepon')   


	var modal = $(this)
	modal.find('.modal-body #id').val(id)
	modal.find('.modal-body #name').val(name)
	modal.find('.modal-body #email').val(email)
	modal.find('.modal-body #alamat').val(alamat)
	modal.find('.modal-body #telepon').val(telepon)
})

$('#deleteModal').on('show.bs.modal', function (event) {
	console.log('Modal Opened');
	var button = $(event.relatedTarget) // Button that triggered the modal
	var id_film = button.data('fid') 

	var modal = $(this)
	modal.find('.modal-body #id_film').val(id_film)
})