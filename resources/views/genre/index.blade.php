@extends('layouts.master')

@section('content')
	<div class="">
		<div class="box">
			<div class="box-header">
			  <h3 class="box-title">All Genres</h3>

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
					      <th>Genre</th>
					      <th> </th>
					    </tr>
				  	</thead>
				    <tbody>
				    	@foreach($genre as $list)
						    <tr>
						    	<td>{{$list->id_genre_film}}</td>
							    <td>{{$list->genre_film}}</td>
							    <td>
							      	<button class="btn btn-info" data-toggle="modal"
							      			data-fid="{{$list->id_genre_film}}" 
							      			data-fgenre="{{$list->genre_film}}"
							      			data-target="#editgenre">
							      		Edit
							      	</button>
							      			/ 
							      	<button class="btn btn-danger" data-fid="{{$list->id_genre_film}}" data-toggle="modal" data-target="#deletegenre">
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
				<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#filmgenre">
				  Add New Genre
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
	<div class="modal fade" id="filmgenre" tabindex="-1" role="dialog" aria-labelledby="filmModal">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title" id="filmModal">New Category</h4>
	      </div>
	      <form role="form" action="{{route('genre.store')}}" method="post" enctype="multipart/form-data" >
	      	{{csrf_field()}}
	      	<div class="modal-body">
	        	<div class="form-group">
					<label for="genre">Genre</label>
					<input type="text" class="form-control"  name="genre_film" id="genre_film">
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
	<div class="modal fade" id="editgenre" tabindex="-1" role="dialog" aria-labelledby="editModal">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title" id="filmModal">Edit genre</h4>
	      </div>
	      <form action="{{route('genre.update','test')}}" method="post" enctype="multipart/form-data">
	      	{{method_field('patch')}}
	      	{{csrf_field()}}
	      	<div class="modal-body">
	      		<input type="hidden" name="id_genre" id="id_genre" value="">
	        	<div class="modal-body">
	        	<div class="form-group">
					<label for="genre">Genre</label>
					<input type="text" class="form-control"  name="genre_film" id="genre_film">
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
	<div class="modal modal-danger fade" id="deletegenre" tabindex="-1" role="dialog" aria-labelledby="deleteModal">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="text-center modal-title" id="deleteModal">Delete Confirmation</h4>
	      </div>
	      <form action="{{route('genre.destroy','test')}}" method="post">
	      	{{method_field('delete')}}
	      	{{csrf_field()}}
	      	<div class="modal-body">
	      		<p class="text-center">Yakin Ingin Menghapus genre ?</p>
	      		<input type="hidden" name="id_genre" id="id_genre" value="">
	        	
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