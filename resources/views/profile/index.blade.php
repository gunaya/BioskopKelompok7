@extends('layouts.app')

@section('content')
<div class="container" style="margin-top: 70px">
	<div class="box" style="margin-left: 200px; margin-right:200px;">

		<div class="box-body no-padding">
		@foreach($hasil as $data)
			<div class="row">
				<div class="col-xs-4 ml-auto mr-auto">
					<img class="mx-auto rounded-circle img-fluid img-thumbnail" src="{{asset('upload/profile/'.$data->image) }}" style="max-width: 250px; height: auto;">
				</div>
			</div>
			<br>
			<table class="table">
				<tbody>
					<tr>
						<td><label for="name">Nama</label></td>
						<td><input type="text" class="form-control" name="name" id="name" readonly value="{{$data->name}}"></td>
					</tr>
					<tr>
						<td><label for="email">Email</label></td>
						<td><input type="text" class="form-control" name="email" id="email" readonly value="{{$data->email}}"></td>
					</tr>
					<tr>
						<td><label for="alamat">Alamat</label></td>
						<td><input type="text" class="form-control" name="alamat" id="alamat" readonly value="{{$data->alamat}}"></td>
					</tr>
					<tr>
						<td><label for="telepon">Telepon</label></td>
						<td><input type="text" class="form-control" name="telepon" id="telepon" readonly value="{{$data->telepon}}"></td>
					</tr>
				</tbody>
			</table>
		
		</div>
		<br>
		<div class="box-footer">
			<div class="row">
				<div class="col-xs-6 ml-auto mr-auto">
					<button class="btn btn-info" data-toggle="modal"
							      			data-fid="{{$data->id}}" 
							      			data-fname="{{$data->name}}"
							      			data-femail="{{$data->email}}"
							      			data-falamat="{{$data->alamat}}"
							      			data-ftelepon="{{$data->telepon}}"
							      			data-fimage="{{$data->image}}"
							      			data-target="#editModal">
						Edit
					</button>
				</div>
				<div class="col-xs-6 ml-auto mr-auto">
					<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal">
						Delete
					</button>
				</div>
			</div>
		</div>

	</div>
</div>

<!-- Modal -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  	<div class="modal-dialog" role="document">
    	<div class="modal-content">
      		<div class="modal-header">
        		<h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
        		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
          			<span aria-hidden="true">&times;</span>
        		</button>
      		</div>
   			<form action="{{url('profile',$data->id)}}" method="post" enctype="multipart/form-data">
      		{{csrf_field()}}
      			<div class="modal-body">
      				<input type="hidden" name="id" id="id" value="">
        			<div class="form-group">
        				<label for="name">Nama</label>
						<input type="text" class="form-control" name="name" id="name">
        			</div>
        			<div class="form-group">
        				<label for="email">Email</label>
						<input type="text" class="form-control" name="email" id="email">
        			</div>
        			<div class="form-group">
        				<label for="alamat">Alamat</label>
						<input type="text" class="form-control" name="alamat" id="alamat">
        			</div>
        			<div class="form-group">
        				<label for="telepon">Telepon</label>
						<input type="text" class="form-control" name="telepon" id="telepon">
        			</div>
        			<div class="form-group">
        				<label for="image">Image</label>
						<input type="file" class="form-control" name="image" id="image">
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
@endforeach
@endsection