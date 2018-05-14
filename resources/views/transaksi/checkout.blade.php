@extends('layouts.app')

@section('content')
	<div class="container" style="margin-top: 70px">
		<div class="box">
			<div class="box-header" style="margin-bottom: 20px;">
				<h4><em>Ayo, segera selesaikan transaksimu !</em></h4>
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
								<td style="text-align: center">
									<button class="btn btn-danger" data-fid="{{$data->id_det_booking}}" data-toggle="modal" data-target="#cancelOrder">
							      		Cancel Order
							      	</button> 
								</td>
							</tr>
						@endforeach
					</tbody>
				</table>
			</div>
			<div class="box-footer clearfix row">
				@if(empty($data))
					<p class="ml-auto mr-auto" style="margin-bottom: 330px"><em>Kamu tidak memiliki transaksi apapun</em></p>
				@else

				<a class='btn btn-primary' href='/user_home/' role='button'>
					Back
				</a>
				<button type="button" class="btn btn-success ml-auto" data-toggle="modal" data-target="#bayar">
						Bayar
				</button>
				@endif
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

<!-- Cancel Order -->
	<div class="modal fade" id="cancelOrder" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="text-center modal-title" id="deleteModal">Delete Confirmation</h4>
	      </div>
	      <form action="{{route('cancel')}}" method="post">
	      	{{csrf_field()}}
	      	<div class="modal-body">
	      		<p class="text-center">Yakin Ingin Membatalkan Order ?</p>
	      		<input type="hidden" name="id_det_booking" id="id_det_booking" value="">	        	
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