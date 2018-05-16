@extends('layouts.master')

@section('content')
	<div class="">
	  <div class="box">
			<div class="box-header">
			  <h3 class="box-title">Jadwal Tayang Film</h3>
				<div class="box-tools">

			  	  {{-- <form action="{{ url('query')}}" method="GET">
				    <div class="input-group input-group-sm" style="width: 150px;">
				      <input type="text" name="cari" id="cari" class="form-control pull-right" placeholder="Search">

				      <div class="input-group-btn">
				        <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
				      </div>
				    </div>

			  	  </form> --}}
				</div>
			  	
			</div>
			<!-- /.box-header -->
			<div class="box-body table-responsive no-padding">
			  	<table class="table table-responsive">
				  	<thead>
					    <tr>
					      <th>ID</th>
					      <th>Waktu Tayang</th>
					      <th>Nama Film</th>
					      <th>Harga Tiket</th>
					      <th>Studio</th>
					      <th>Tambah Kursi</th>
					      <th>Cek List</th>
					    </tr>
				  	</thead>
				    <tbody>
				    	@foreach($hasil as $id => $list)
						    <tr @if ($id === 0) class="active" @endif>
						    	<td>{{$list->id_tayang}}</td>
							    <td>{{$list->waktu_tayang}}</td>
							    <td>{{$list->nama_film}}</td>
							    <td>{{$list->harga_tiket}}</td>
							    <td>{{$list->nama_studio}}</td>
							    <td>
							    	<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambahList" data-id="{{$list->id_tayang}}">Tambah
									</button>
							    </td>
							    <td>
							    	<a class="btn btn-primary" href="/admin-film/penayangan/jadwal/{{$list->id_tayang}}" role="button">Cek List</a>
							    </td>
						    </tr>
					    @endforeach
					</tbody>
				</table>

			</div>
		<!-- /.box-body -->
			<div class="box-footer clearfix">
				<!-- Tambah Film -->
				<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#jadwalModal">
				  Tambah Jadwal
				</button>
	            <ul class="pagination pagination-sm no-margin pull-right">
	            	{{ $hasil->links() }}    
	            </ul>
	        </div>
		</div>
	</div>

	{{-- Modal List Kursi --}}
	{{--  --}}


	{{-- Modal Tambah Jadwal --}}
	<div class="modal fade" id="jadwalModal" tabindex="-1" role="dialog" aria-labelledby="filmModal">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title" id="filmModal">Jadwal Baru</h4>
	      </div>
	      <form role="form" action="{{route('simpan_jadwal')}}" method="post" enctype="multipart/form-data" >
	      	{{csrf_field()}}
	      	<div class="modal-body modal-jadwal">
	      		<div class="form-group">
				    <label for="waktu_tayang">Waktu Tayang</label>
				    <div class='input-group date datetimepicker2' id='datetimepicker2'>
				        <input type='text' class="form-control" id='waktu_tayang' name="waktu_tayang" />
				        <span class="input-group-addon">
				            <span class="glyphicon glyphicon-calendar"></span>
				        </span>
				    </div>
				</div>
				<div class="form-group">
					<label for="harga_tiket">Harga Tiket</label>
					<input type="text" class="form-control"  name="harga_tiket" id="harga_tiket">
				</div>
				<div class="form-group">
					<label for="id_film">Film</label>
					<select class="form-control"  name="id_film" id="id_film">
						@foreach($film as $item)
							<option value="{{$item->id_film}}">{{$item->nama_film}}</option>
						@endforeach
					</select> 
				</div>
				<div class="form-group">
					<label for="id_studio">Studio</label>
					<select class="form-control"  name="id_studio" id="id_studio">
						@foreach($studio as $item)
							<option value="{{$item->id_studio}}">{{$item->nama_studio}}</option>
						@endforeach
					</select> 
				</div>
				<input type="hidden" name="id_user" id="id_user" value="{{Auth::user()->id}}">
	      	</div>
	      	<div class="modal-footer">
	        	<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	        	<button type="submit" class="btn btn-primary">Save</button>
	      	</div>
	      </form>
	    </div>
	  </div>
	</div>

	{{-- Modal Tambah list Kursi --}}
	<div class="modal fade" id="tambahList" tabindex="-1" role="dialog" aria-labelledby="filmModal">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title" id="filmModal">Tambah Kursi ke Jadwal</h4>
	      </div>
	      <form role="form" action="{{route('simpan_list')}}" method="post" enctype="multipart/form-data" >
	      	{{csrf_field()}}
	      	<div class="modal-body">
				<div class="form-group">
					<label for="id_kursi">Kode Kursi</label>
					<select class="form-control"  name="id_kursi" id="id_kursi">
						@foreach($kursi as $item)
							<option value="{{$item->id_kursi}}">{{$item->kode_kursi}}</option>
						@endforeach
					</select> 
				</div>
					<input type="hidden" name="id_tayang" id="id_tayang">
				<input type="hidden" name="status" id="status" value="tersedia">
	      	</div>
	      	<div class="modal-footer">
	        	<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	        	<button type="submit" class="btn btn-primary">Save</button>
	      	</div>
	      </form>
	    </div>
	  </div>
	</div>

@endsection