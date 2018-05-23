@extends('layouts.master')

@section('content')
	<div class="">
	  <div class="box">
			<div class="box-header">
			  <h3 class="box-title">List Kursi</h3>
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
					      <th>Nama Studio</th>
					    </tr>
				  	</thead>
				    <tbody>
				    	@foreach($hasil as $id => $list)
						    <tr @if ($id === 0) class="active" @endif>
						    	<td>{{$list->id_studio}}</td>
							    <td>{{$list->nama_studio}}</td>
						    </tr>
					    @endforeach
					</tbody>
				</table>

			</div>
		<!-- /.box-body -->
			<div class="box-footer clearfix">
				<!-- Tambah Film -->
				<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#jadwalModal">
				  Tambah Studio
				</button>
	            <ul class="pagination pagination-sm no-margin pull-right">
	            	{{ $hasil->links() }}    
	            </ul>
	        </div>
		</div>
	</div>

		<div class="modal fade" id="jadwalModal" tabindex="-1" role="dialog" aria-labelledby="filmModal">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title" id="filmModal">Studio Baru</h4>
	      </div>
	      <form role="form" action="{{route('simpan_studio')}}" method="post" enctype="multipart/form-data" >
	      	{{csrf_field()}}
	      	<div class="modal-body modal-jadwal">
				<div class="form-group">
					<label for="nama_studio">Nama Studio</label>
					<input type="text" class="form-control"  name="nama_studio" id="nama_studio">
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