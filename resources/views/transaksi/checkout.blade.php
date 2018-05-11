@extends('layouts.app')

@section('content')
	<div class="container" style="margin-top: 70px">
		<div class="box">
			<div class="box-header">
				<h3>Hello World</h3>
			</div>
			<div class="box-body no-padding">
				<table class="table">
					<thead>
						<tr>
						    <th>ID</th>
						    <th>Judul Film</th>
						    <th>Harga</th>
						    <th style="text-align: center">Modify</th>
					    </tr>
					</thead>
					<tbody>
						@foreach($hasil as $id => $data)
							<tr @if ($id === 0) class="active" @endif>
								<td>{{$id+1}}</td>
								<td>{{$data->nama_film}}</td>
								<td>{{$data->harga}}</td>
							</tr>
						@endforeach
					</tbody>
				</table>
			</div>
			<div class="box-footer clearfix">
				<!-- Tambah Film -->
				<a class='btn btn-primary' href='/user_home/' role='button'>
					Back
				</a>
				<button type="button" class="btn btn-success" data-toggle="modal" data-target="#bayar">
						Bayar
				</button>
	        </div>
		</div>
	</div>	


	<!-- Modal -->
<!-- Modal -->
<div class="modal fade" id="bayar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  	<div class="modal-dialog" role="document">
    	<div class="modal-content">
      	<div class="modal-header">
        		<h5 class="modal-title" id="exampleModalLongTitle">Pembayaran</h5>
        		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
          			<span aria-hidden="true">&times;</span>
        		</button>
      	</div>
   			<form action="{{route('pembayaran')}}" method="post" enctype="multipart/form-data">
      		{{csrf_field()}}
      			<div class="modal-body">

      				@foreach($hasil as $data)
      				<input type="hidden" name="id_booking" id="id_booking" value="{{$data->id_booking}}">
      				@endforeach
      				<input type="hidden" name="id_user" id="id_user" value="{{Auth::user()->id}}">
	        			<div class="form-group">
							<label for="method">Metode Pembayaran</label>
							<select class="form-control"  name="method" id="method">
								<option value="kartu_kredit">Kartu Kredit</option>
								<option value="transfer">Transfer</option>
							</select>
						</div>
						<br>
						<br>
	      			<label>Bank yang Tersedia :</label>
	      			<div class="row form-group">
	      				<div class="col-xs-4 ml-auto mr-auto">
	      					<p>Bank BNI</p>
	      				</div>
	      				<div class="col-xs-4 ml-auto mr-auto">
	      					<p>Bank BRI</p>
	      				</div>
	      				<div class="col-xs-4 ml-auto mr-auto">
	      					<p>Bank BCA</p>
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
@endsection