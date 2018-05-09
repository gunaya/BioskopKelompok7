@extends('layouts.app')

@section('content')
	<div class="container" style="margin-top: 70px">
		@foreach($hasil as $id => $data)
			@if($data->waktu_tayang < date("Y-m-d"))
				<p class="text-center">Kamu tidak memiliki tiket !</p>
				<p class="text-center">Silahkan beli segera di <a href="/user_home">link berikut</a></p>
			@else
				@if($data->status == 'belum_lunas')
					<p class="text-center">Hai, kamu memiliki tiket yang belum diverifikasi</p>
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
									<tr @if ($id === 0) class="active" @endif  style="text-align: center">
										<td>{{$id+1}}</td>
										<td>{{$data->nama_film}}</td>
										<td>{{$data->kode_kursi}}</td>
										<td>{{$data->waktu_tayang}}</td>
										<td><button type="button" class="btn btn-secondary" disabled>Belum Terverifikasi</button></td>
									</tr>
							</tbody>
						</table>
					</div>
				@elseif($data->status == 'lunas')
					<p class="text-center">Hai, kamu memiliki tiket yang masih tersedia</p>
					<div class="box-body no-padding">
						<table class="table">
							<thead>
								<tr style="text-align: center" >
								    <th>ID</th>
								    <th>Judul Film</th>
								    <th>Kode Kursi</th>
								    <th>Waktu tayang</th>
								    <th style="text-align: center">Status</th>
							    </tr>
							</thead>
							<tbody>
									<tr @if ($id === 0) class="active" @endif  style="text-align: center">
										<td>{{$id+1}}</td>
										<td>{{$data->nama_film}}</td>
										<td>{{$data->kode_kursi}}</td>
										<td>{{$data->waktu_tayang}}</td>
										<td><button type="button" class="btn btn-primary" disabled>Terverifikasi</button></td>
									</tr>
							</tbody>
						</table>
					</div>
				@else
					<p class="text-center">Kamu tidak memiliki tiket !</p>
					<p class="text-center">Silahkan beli segera di <a href="/user_home">link berikut</a></p>
				@endif
			@endif
		@endforeach
	</div>	
@endsection