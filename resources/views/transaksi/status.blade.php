@extends('layouts.app')

@section('content')
	<div class="container" style="margin-top: 70px">
		@if(empty($method))	
		<strong>Kamu belum melakukan verifikasi pembayaran</strong><br>
		<em>Silahkan isi data berikut</em><br><br>
			@if($trans->method == 'transfer')
	         <div class="box" style="margin-right: 100px">
	            <form action="{{route('success_transfer')}}" method="post" enctype="multipart/form-data">
	            {{csrf_field()}}
	               <input type="hidden" name="id_transaksi" id="id_transaksi" value="{{$trans->id_transaksi}}">
	               <input type="hidden" name="id_user" id="id_user" value="{{Auth::user()->id}}">
	               <div class="form-group">
	                  <label for="bank">Bank *</label>
	                  <select class="form-control"  name="bank" id="bank">
	                     <option value="bni">BNI</option>
	                     <option value="bri">BRI</option>
	                     <option value="bca">BCA</option>
	                  </select>
	               </div>
	               <div class="form-group">
	                  <label for="nomor_rekening">Nomor Rekening *</label>
	                  <input type="text" class="form-control"  name="nomor_rekening" id="nomor_rekening">
	               </div>
	               <div class="form-group">
	                  <label for="bukti_pembayaran">Bukti Pembayaran *</label>
	                  <input type="file" class="form-control"  name="bukti_pembayaran" id="bukti_pembayaran">
	               </div>
	               <div class="form-group">
	                  <label for="atas_nama">Atas Nama *</label>
	                  <input type="text" class="form-control"  name="atas_nama" id="atas_nama">
	               </div>
	            <button type="submit" class="btn btn-primary">Konfirmasi</button>
	            </form>
	         </div>
	      @else
	         <form action="{{route('success_kredit')}}" method="post" enctype="multipart/form-data">
	         {{csrf_field()}}
	            <input type="hidden" name="id_transaksi" id="id_transaksi" value="{{$trans->id_transaksi}}">
	            <input type="hidden" name="id_user" id="id_user" value="{{Auth::user()->id}}">
	            <div class="form-group">
	               <label for="no_kartu_kredit">Nomor Kartu Kredit *</label>
	               <input type="text" class="form-control"  name="no_kartu_kredit" id="no_kartu_kredit">
	            </div>
	            <div class="form-group">
	               <label for="atas_nama">Atas Nama *</label>
	               <input type="text" class="form-control"  name="atas_nama" id="atas_nama">
	            </div>
	            <button type="submit" class="btn btn-primary">Konfirmasi</button>
	         </form>
	      @endif
				
		@else
			<strong><h3><p class="text-center">Tiket yang belum diverifikasi</p></h3></strong><br>
			<div class="box-body no-padding">
				<table class="table">
					<thead>
						<tr style="text-align: center">
						    <th>ID</th>
						    <th>Judul Film</th>
						    <th>Kode Kursi</th>
						    <th>Waktu tayang</th>
						    <th>Status</th>
					    </tr>
					</thead>
					<tbody>
						@foreach($hasilBelum as $id => $data)
							<tr @if ($id === 0) class="active" @endif  style="text-align: center">
								<td>{{$id+1}}</td>
								<td>{{$data->nama_film}}</td>
								<td>{{$data->kode_kursi}}</td>
								<td>{{$data->waktu_tayang}}</td>
								<td><button type="button" class="btn btn-secondary" disabled>Belum Terverifikasi</button></td>
							</tr>
						@endforeach
					</tbody>
				</table>
			</div>
			<br>
			<br>
			<br>
			<strong><h3><p class="text-center">Tiket yang masih tersedia</p></h3></strong><br>
			<div class="box-body no-padding">
				<table class="table">
					<thead>
						<tr style="text-align: center" >
						    <th>ID</th>
						    <th>Judul Film</th>
						    <th>Kode Kursi</th>
						    <th>Waktu tayang</th>
						    <th>Kode Unik</th>
						    <th style="text-align: center">Status</th>
					    </tr>
					</thead>
					<tbody>
						@foreach($hasilLunas as $id => $data)
							<tr @if ($id === 0) class="active" @endif  style="text-align: center">
								<td>{{$id+1}}</td>
								<td>{{$data->nama_film}}</td>
								<td>{{$data->kode_kursi}}</td>
								<td>{{$data->waktu_tayang}}</td>
								<td>{{$data->unique_code}}</td>
								<td><button type="button" class="btn btn-primary" disabled>Terverifikasi</button></td>
							</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		@endif
	</div>	
@endsection