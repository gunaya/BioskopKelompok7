$.ajaxSetup({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
		}
	});

$('#kursi').on('click',function(e){
    e.preventDefault();
    console.log('aduh');
    var uid = $(this).data('id');

    	$('#list_kursi').empty();

    $.ajax({
        type:'GET',
        url:'/film/{film_id}/{id_tayang}',
        data:{ id:uid },
        dataType:'json'
    }).done(function(data){
        console.log(data);

    	$('#list_kursi').show();
        $.each(data, function(row){
        	$('#list_kursi').append("<button id='kursiL'>" + data[row].id_kursi + "</button>");
        });
    }).fail(function(){
    	$('#list_kursi').show();
        //$('.modal-body').html('<i class="glyphicon glyphicon-info-sign"></i> Something went wrong, Please try again...');
    });
});