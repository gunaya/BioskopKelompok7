@extends('layouts.app')

@section('content')

<div class="container" style="margin-top: 70px">
	<div class="box" style="margin-left: 100px; margin-right:100px;">
		<div class="box-body">
		@foreach($hasil as $data)
			<table class="table borderless">
				<tbody>
					<tr>
						<th scope="row" rowspan="6"><img class="img-fluid img-thumbnail rounded float-left" src="{{asset('upload/images/'.$data->image) }}" alt="" style="width: 300px; height: 300px;"></th>
					</tr>
					<tr>
						<td style="">Nama</td>
						<td>:</td>
						<td>{{$data->nama_film}}</td>
					</tr>
					<tr>
						<td>Tahun Rilis</td>
						<td>:</td>
						<td>{{$data->tahun_produksi}}</td>
					</tr>
					<tr>
						<td>Direksi</td>
						<td>:</td>
						<td>{{$data->direksi}}</td>
					</tr>
					<tr>
						<td>Pemain</td>
						<td>:</td>
						<td>{{$data->pemain}}</td>
					</tr>
					<tr>
						<td>Bahasa</td>
						<td>:</td>
						<td>{{$data->bahasa}}</td>
					</tr>
				</tbody>
			</table>
		@endforeach
		</div>
	    <div class="container">
	    	<div class="row">
	    		<div class="col-6">
	    			<h3 class="text-center"><em>Jadwal Tayang</em></h3>
	    			<div class="row">
	    			@foreach($tayang as $jadwal)
	    				@if($jadwal->waktu_tayang < $date_now)

	    				@else
				    		<div class="col-sm-4 ml-auto mr-auto">
					    		<button type="submit" class="btn btn-primary kursi" data-toggle="modal" data-target="#jadwal_tayang" data-id="{{$jadwal->id_tayang}}" style="margin-bottom: 20px">{{$jadwal->waktu_tayang}}</button>
				    		</div>
				    		&emsp;
						@endif
	    			@endforeach
	    			</div>

	    		</div>
	    		<div class="col-6">
	    		@foreach($hasil as $data)
	    			<table class="table borderless" style="margin-left: 35px">
	    				<tbody>
		    				<tr>
		    					<td width="160px">Sinopsis</td>
		    					<td width="50px">:</td>
		    					<td>{{$data->sinopsis}}</td>
		    				</tr>
	    				</tbody>
	    			</table>
	    		@endforeach
	    		</div>
	    	</div>
	    	
	    </div>
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

<style type="text/css">
.borderless td, .borderless th {
    border: none;
}
</style>
@endsection