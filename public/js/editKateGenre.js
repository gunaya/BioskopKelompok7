$('#editKategori').on('show.bs.modal', function (event) {
	console.log('Modal Opened');
	var button = $(event.relatedTarget) // Button that triggered the modal
	var id_kategori = button.data('fid')
	var kategori = button.data('fkategori')
	var min = button.data('fmin')
	var max = button.data('fmax')    


	var modal = $(this)
	modal.find('.modal-body #id_kategori').val(id_kategori)
	modal.find('.modal-body #kategori').val(kategori)
	modal.find('.modal-body #min_umur').val(min)
	modal.find('.modal-body #max_umur').val(max)
})

$('#deleteKategori').on('show.bs.modal', function (event) {
	console.log('Modal Opened');
	var button = $(event.relatedTarget) // Button that triggered the modal
	var id_kategori = button.data('fid') 

	var modal = $(this)
	modal.find('.modal-body #id_kategori').val(id_kategori)
})

$('#editgenre').on('show.bs.modal', function (event) {
	console.log('Modal Opened');
	var button = $(event.relatedTarget) // Button that triggered the modal
	var id_genre_film = button.data('fid')
	var genre_film = button.data('fgenre')


	var modal = $(this)
	modal.find('.modal-body #id_genre').val(id_genre_film)
	modal.find('.modal-body #genre').val(genre_film)
})

$('#deletegenre').on('show.bs.modal', function (event) {
	console.log('Modal Opened');
	var button = $(event.relatedTarget) // Button that triggered the modal
	var id_genre_film = button.data('fid') 

	var modal = $(this)
	modal.find('.modal-body #id_genre').val(id_genre_films)
})