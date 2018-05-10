@extends('layouts.master')

@section('content')
	<div class="container">
		
		<div class="box">
			<div class="box-header">
			  <h3 class="box-title">Konfirmasi</h3>
			</div>
			<div class="box-body table-responsive no-padding">
			  	<table class="table table-responsive">
				  	<thead>
					    <tr>
					      <th style="text-align: center">No. </th>
					      <th style="text-align: center">Nama User</th>
					      <th style="text-align: center">Waktu Transaksi</th>
					      <th style="text-align: center">Total Pembayaran</th>
					      <th style="text-align: center">Metode</th>
					      <th style="text-align: center">Detail</th>
					      <th style="text-align: center">Konfirmasi</th>
					    </tr>
				  	</thead>
				    <tbody>
				    	@foreach($konfirmasi as $id => $confirm)
						    <tr @if ($id === 0) class="active" @endif  style="text-align: center">
						    	<td>{{$id+1}}</td>
						    	 <td>{{$confirm->name}}</td>
							    <td>{{$confirm->waktu_transaksi}}</td>
							    <td>{{$confirm->total_pembayaran}}</td>
							    <td>{{$confirm->method}}</td>
							    <td style="text-align: center">
							    		@if(empty($confirm->nama_trf))
							      	<button class="btn btn-info" data-toggle="modal"
							      			data-id="{{$confirm->id_transaksi}}"
							      			data-nama="{{$confirm->nama_kredit}}"
							      			data-kredit="{{$confirm->no_kartu_kredit}}"
							      			data-target="#detailKredit">
							      		Cek
							      	</button>
							      	@else
							      	<button class="btn btn-info" data-toggle="modal"
							      			data-id="{{$confirm->id_transaksi}}"
							      			data-nama="{{$confirm->nama_trf}}"
							      			data-bank="{{$confirm->bank}}"
							      			data-rek="{{$confirm->nomor_rekening}}"
							      			data-bukti="{{$confirm->bukti_pembayaran}}"
							      			data-target="#detailTrf">
							      		Cek
							      	</button>
							      	@endif
							  	</td>
							  	<td>
							  		<button class="btn btn-primary">
							      		Konfirmasi
							      </button>
							  	</td>
						    </tr>
					    @endforeach
					</tbody>
				</table>
			</div>
		</div>
	</div>

<!-- Modal Kredit-->
	<div class="modal fade" id="detailTrf" tabindex="-1" role="dialog" aria-labelledby="filmModal">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title" id="filmModal">Detail Pembayaran</h4>
	      </div>
	      	<div class="modal-body">
		        	<div class="form-group">
						<label for="nama">Nama</label>
						<input type="text" class="form-control"  name="nama" id="nama" disabled>
					</div>
		        	<div class="form-group">
						<label for="bank">Bank</label>
						<input type="text" class="form-control"  name="bank" id="bank" disabled>
					</div>
		        	<div class="form-group">
						<label for="rek">Nomor Rekening</label>
						<input type="text" class="form-control"  name="rek" id="rek" disabled>
					</div>
		        	<div class="form-group">
						<label for="bukti">Bukti Pembayaran</label><br>
						<img class="mx-auto rounded-circle img-fluid img-thumbnail" src="{{asset('upload/profile/')}}" style="max-width: 250px; height: auto;" id="bukti" name="bukti">
					</div>
	      	</div>
	      	<div class="modal-footer">
		        	<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	      	</div>
	    </div>
	  </div>
	</div>

<!-- Modal Kredit-->
	<div class="modal fade" id="detailKredit" tabindex="-1" role="dialog" aria-labelledby="filmModal">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title" id="filmModal">Detail Pembayaran</h4>
	      </div>
	      	<div class="modal-body">
		        	<div class="form-group">
						<label for="nama">Nama</label>
						<input type="text" class="form-control"  name="nama" id="nama" disabled>
					</div>
		        	<div class="form-group">
						<label for="kredit">No Kartu Kredit</label>
						<input type="text" class="form-control"  name="kredit" id="kredit" disabled>
					</div>
	      	</div>
	      	<div class="modal-footer">
		        	<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	      	</div>
	    </div>
	  </div>
	</div>	
@endsection