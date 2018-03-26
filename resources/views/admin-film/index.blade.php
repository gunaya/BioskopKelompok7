@extends('layouts.master')

@section('content')
	<div class="">
		<div class="box">
			<div class="box-header">
			  <h3 class="box-title">All Movies</h3>

			  <div class="box-tools">
			    <div class="input-group input-group-sm" style="width: 150px;">
			      <input type="text" name="table_search" class="form-control pull-right" placeholder="Search">

			      <div class="input-group-btn">
			        <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
			      </div>
			    </div>
			  </div>
			</div>
			<!-- /.box-header -->
			<div class="box-body table-responsive no-padding">
			  	<table class="table table-responsive">
				  	<thead>
					    <tr>
					      <th>ID</th>
					      <th>Judul</th>
					      <th>Tahun</th>
					      <th>Direksi</th>
					      <th>Pemain</th>
					      <th>Sinopsis</th>
					      <th>Modify</th>
					    </tr>
				  	</thead>
				    <tbody>
				    	@foreach($listFilm as $list)
						    <tr>
						    	<td>{{$list->id_film}}</td>
							    <td>{{$list->nama_film}}</td>
							    <td>{{$list->tahun_produksi}}</td>
							    <td>{{$list->direksi}}</td>
							    <td>{{$list->pemain}}</td>
							    <td>{{str_limit($list->sinopsis, 30)}}</td>
							    <td>
							      	<button class="btn btn-info" data-toggle="modal"
							      			data-fid="{{$list->id_film}}" 
							      			data-fnama="{{$list->nama_film}}"
							      			data-ftahun="{{$list->tahun_produksi}}"
							      			data-fdireksi="{{$list->direksi}}"
							      			data-fpemain="{{$list->pemain}}"
							      			data-fsinopsis="{{$list->sinopsis}}"
							      			data-fgenre="{{$list->id_genre_film}}"
							      			data-fkategori="{{$list->id_kategori}}"
							      			data-target="#editModal">
							      		Edit
							      	</button>
							      			/ 
							      	<button class="btn btn-danger" data-fid="{{$list->id_film}}" data-toggle="modal" data-target="#deleteModal">
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
				<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#filmModal">
				  Add New Movie
				</button>
	            <ul class="pagination pagination-sm no-margin pull-right">
	                <li><a href="#">«</a></li>
	                <li><a href="#">1</a></li>
	                <li><a href="#">2</a></li>
	                <li><a href="#">3</a></li>
	                <li><a href="#">»</a></li>
	            </ul>
	        </div>
		</div>
	</div>

	<!-- Button trigger modal -->
	<!-- Modal -->
	<div class="modal fade" id="filmModal" tabindex="-1" role="dialog" aria-labelledby="filmModal">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title" id="filmModal">New Movie</h4>
	      </div>
	      <form action="{{route('admin-film.store')}}" method="post">
	      	{{csrf_field()}}
	      	<div class="modal-body">
	        	@include('admin-film.form')
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
	<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModal">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title" id="filmModal">Edit Movie</h4>
	      </div>
	      <form action="{{route('admin-film.update','test')}}" method="post">
	      	{{method_field('patch')}}
	      	{{csrf_field()}}
	      	<div class="modal-body">
	      		<input type="hidden" name="id_film" id="id_film" value="">
	        	@include('admin-film.form')
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
	<div class="modal modal-danger fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModal">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="text-center modal-title" id="deleteModal">Delete Confirmation</h4>
	      </div>
	      <form action="{{route('admin-film.destroy','test')}}" method="post">
	      	{{method_field('delete')}}
	      	{{csrf_field()}}
	      	<div class="modal-body">
	      		<p class="text-center">Yakin Ingin Menghapus Film ?</p>
	      		<input type="hidden" name="id_film" id="id_film" value="">
	        	
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