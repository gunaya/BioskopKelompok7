@extends('layouts.app')

@section('content')

	<div class="container" style="margin-top: 70px">
		@foreach($hasil as $listFilm)
		<p>Hello World</p>
		<div class="col-md-4 col-sm-6 portfolio-item">
	          	<img class="img-fluid" src="{{asset('upload/images/'.$listFilm->image) }}" alt="" style="width: 100%; height: 200px;">
	        <div class="portfolio-caption">
	          	<h4>{{($listFilm->nama_film)}}</h4>
	          	<br>
	        </div>
	    </div>
	    @endforeach
	    <br>
	    <br>
	    <h3>Jadwal Tayang</h3>
	    <div>
	    	@foreach($tayang as $jadwal)
	    		<button type="submit" class="btn btn-primary" id="kursi" data-toggle="modal" data-target="#jadwal_tayang" data-id="{{$jadwal->id_tayang}}">{{$jadwal->waktu_tayang}}</button>
	    	@endforeach
	    </div>
	</div>



	<!-- Modal -->
	<div class="modal fade" id="jadwal_tayang" tabindex="-1" role="dialog" aria-labelledby="filmModal">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h4 class="modal-title" id="filmModal">List Kursi</h4>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	      </div>
	      <div class="modal-body" id="list_kursi">
	      		
	      </div>
	    </div>
	  </div>
	</div>
@endsection