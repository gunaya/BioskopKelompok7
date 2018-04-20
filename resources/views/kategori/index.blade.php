@extends('layouts.master')

@section('content')
	<div class="">
		<div class="box">
			<div class="box-header">
			  <h3 class="box-title">All Categories</h3>

			  <div class="box-tools">
			    <form action="{{ url('queryKat')}}" method="GET">
				    <div class="input-group input-group-sm" style="width: 150px;">
				      <input type="text" name="cari" id="cari" class="form-control pull-right" placeholder="Search">

				      <div class="input-group-btn">
				        <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
				      </div>
				    </div>

			  	  </form>
			  </div>
			</div>
			<!-- /.box-header -->
			<div class="box-body table-responsive no-padding">
			  	<table class="table table-responsive">
				  	<thead>
					    <tr>
					      <th>ID</th>
					      <th>Kategori</th>
					      <th>Umur Min</th>
					      <th>Umur Max</th>
					      <th> </th>
					    </tr>
				  	</thead>
				    <tbody>
				    	@foreach($kategori as $list)
						    <tr>
						    	<td>{{$list->id_kategori}}</td>
							    <td>{{$list->kategori}}</td>
							    <td>{{$list->min_umur}}</td>
							    <td>{{$list->max_umur}}</td>
							    <td style="text-align: right">
							      	<button class="btn btn-info" data-toggle="modal"
							      			data-fid="{{$list->id_kategori}}" 
							      			data-fkategori="{{$list->kategori}}"
							      			data-fmin="{{$list->min_umur}}"
							      			data-fmax="{{$list->max_umur}}"
							      			data-target="#editKategori">
							      		Edit
							      	</button>
							      			/ 
							      	<button class="btn btn-danger" data-fid="{{$list->id_kategori}}" data-toggle="modal" data-target="#deleteKategori">
							      		Delete
							      	</button> 
							  	</td>
						    </tr>
					    @endforeach
					</tbody>
				</table>
			</div>
		<!-- /.box-body -->
			<div class="box-footer clearfix">
				<!-- Tambah Film -->
				<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#filmKategori">
				  Add New Movie
				</button>
	            <ul class="pagination pagination-sm no-margin pull-right">
	                {{ $kategori->links() }}
	            </ul>
	        </div>
		</div>
	</div>

	<!-- Button trigger modal -->
	<!-- Modal -->
	<div class="modal fade" id="filmKategori" tabindex="-1" role="dialog" aria-labelledby="filmModal">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title" id="filmModal">New Category</h4>
	      </div>
	      <form role="form" action="{{route('kategori.store')}}" method="post" enctype="multipart/form-data" >
	      	{{csrf_field()}}
	      	<div class="modal-body">
	        	<div class="form-group">
					<label for="kategori">Kategori</label>
					<input type="text" class="form-control"  name="kategori" id="kategori">
				</div>
				<div class="form-group">
				    <label for="min_umur">Umur Minimal</label>
				    <input type="text" class="form-control"  name="min_umur" id="min_umur">
				</div>
				<div class="form-group">
					<label for="max_umur">Umur Maksimal</label>
					<input type="text" class="form-control"  name="max_umur" id="max_umur">
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
	<!-- Edit Film -->
	<div class="modal fade" id="editKategori" tabindex="-1" role="dialog" aria-labelledby="editModal">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title" id="filmModal">Edit Kategori</h4>
	      </div>
	      <form action="{{route('kategori.update','test')}}" method="post" enctype="multipart/form-data">
	      	{{method_field('patch')}}
	      	{{csrf_field()}}
	      	<div class="modal-body">
	      		<input type="hidden" name="id_kategori" id="id_kategori" value="">
	        	<div class="modal-body">
	        	<div class="form-group">
					<label for="kategori">Kategori</label>
					<input type="text" class="form-control"  name="kategori" id="kategori">
				</div>
				<div class="form-group">
				    <label for="min_umur">Umur Minimal</label>
				    <input type="text" class="form-control"  name="min_umur" id="min_umur">
				</div>
				<div class="form-group">
					<label for="max_umur">Umur Maksimal</label>
					<input type="text" class="form-control"  name="max_umur" id="max_umur">
				</div>
	      	</div>
	      	</div>
	      	<div class="modal-footer">
	        	<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	        	<button type="submit" class="btn btn-primary">Save Changes</button>
	      	</div>
	      </form>
	    </div>
	  </div>
	</div>

	<!-- Delete Film -->
	<div class="modal modal-danger fade" id="deleteKategori" tabindex="-1" role="dialog" aria-labelledby="deleteModal">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="text-center modal-title" id="deleteModal">Delete Confirmation</h4>
	      </div>
	      <form action="{{route('kategori.destroy','test')}}" method="post">
	      	{{method_field('delete')}}
	      	{{csrf_field()}}
	      	<div class="modal-body">
	      		<p class="text-center">Yakin Ingin Menghapus Kategori ?</p>
	      		<input type="hidden" name="id_kategori" id="id_kategori" value="">
	        	
	      	</div>
	      	<div class="modal-footer">
	        	<button type="button" class="btn btn-success" data-dismiss="modal">Cancel</button>
	        	<button type="submit" class="btn btn-warning">Yes</button>
	      	</div>
	      </form>
	    </div>
	  </div>
	</div>

@endsection