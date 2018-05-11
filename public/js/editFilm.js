$('#editModal').on('show.bs.modal', function (event) {
	console.log('Modal Opened');
	var button = $(event.relatedTarget) // Button that triggered the modal
	var id_film = button.data('fid')
	var nama_film = button.data('fnama')
	var tahun_produksi = button.data('ftahun')
	var direksi = button.data('fdireksi')
	var pemain = button.data('fpemain')
	var sinopsis = button.data('fsinopsis')
	var id_genre_film = button.data('fgenre')
	var id_kategori = button.data('fkategori')      


	var modal = $(this)
	modal.find('.modal-body #id_film').val(id_film)
	modal.find('.modal-body #nama_film').val(nama_film)
	modal.find('.modal-body #tahun_produksi').val(tahun_produksi)
	modal.find('.modal-body #direksi').val(direksi)
	modal.find('.modal-body #pemain').val(pemain)
	modal.find('.modal-body #sinopsis').val(sinopsis)
	modal.find('.modal-body #id_genre').val(id_genre_film)
	modal.find('.modal-body #id_kategori').val(id_kategori)
})

$('#deleteModal').on('show.bs.modal', function (event) {
	console.log('Modal Opened');
	var button = $(event.relatedTarget) // Button that triggered the modal
	var id_film = button.data('fid') 

	var modal = $(this)
	modal.find('.modal-body #id_film').val(id_film)
})

$(function () {
    $('.datetimepicker1').datetimepicker({
		viewMode: 'years',
		format: 'YYYY'
    })
})

$('#detailTrf').on('show.bs.modal', function (event){
	console.log('Modal Opened');

	var button = $(event.relatedTarget)
	var nama = button.data('nama')
	var bank = button.data('bank')
	var rek = button.data('rek')
	var bukti = button.data('bukti')
	var image = "http://localhost:8000/upload/bukti_trf/"+bukti

	var modal = $(this)
	modal.find('.modal-body #nama').val(nama)
	modal.find('.modal-body #bank').val(bank)
	modal.find('.modal-body #rek').val(rek)
	modal.find('.modal-body #bukti').attr('src', image);
})

$('#detailKredit').on('show.bs.modal', function (event){
	console.log('Modal Opened');

	var button = $(event.relatedTarget)
	var nama = button.data('nama')
	var kredit = button.data('kredit')

	var modal = $(this)
	modal.find('.modal-body #nama').val(nama)
	modal.find('.modal-body #kredit').val(kredit)
})

$('#confirm').on('show.bs.modal', function (event) {
	console.log('Modal Opened');
	var button = $(event.relatedTarget) // Button that triggered the modal
	var id_transaksi = button.data('fid') 

	var modal = $(this)
	modal.find('.modal-body #id_transaksi').val(id_transaksi)
})