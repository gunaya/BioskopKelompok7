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
					      <th>Kode Kursi</th>
					    </tr>
				  	</thead>
				    <tbody>
				    	@foreach($hasil as $id => $list)
						    <tr @if ($id === 0) class="active" @endif>
						    	<td>{{$list->id_kursi}}</td>
							    <td>{{$list->kode_kursi}}</td>
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

	{{-- Modal Tambah --}}
	<div class="modal fade" id="jadwalModal" tabindex="-1" role="dialog" aria-labelledby="filmModal">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title" id="filmModal">New Movie</h4>
	      </div>
	      <form role="form" action="{{route('simpan_kursi')}}" method="post" enctype="multipart/form-data" >
	      	{{csrf_field()}}
	      	<div class="modal-body">
				<div class="form-group">
					<label for="kode_kursi">Kode Kursi</label>
					<input type="text" class="form-control"  name="kode_kursi" id="kode_kursi">
				</div>
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