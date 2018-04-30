@extends('layouts.app')

@section('content')
	<div class="container" style="margin-top: 70px">
		<h3>Hello World</h3>
		@foreach($hasil as $data)
			<form role="form" action="{{route('booking')}}" method="post">
			{{csrf_field()}}
				<div class="form-group">
					<label for="nama_film">Nama Film</label>
					<input type="text" class="form-control"  name="nama_film" id="nama_film" value="{{$data->nama_film}}" readonly>
				</div>
				<div class="form-group">
					<label for="waktu_tayang">waktu_tayang</label>
					<input type="text" class="form-control"  name="waktu_tayang" id="waktu_tayang" value="{{$data->waktu_tayang}}" readonly>
				</div>
				<div class="form-group">
					<label for="harga_tiket">Harga Tiket</label>
					<input type="text" class="form-control"  name="harga_tiket" id="harga_tiket" value="{{$data->harga_tiket}}" readonly>
				</div>
				<div class="form-group">
					<label for="method">Metode Pembayaran</label>
					<select class="form-control"  name="method" id="method">
						<option value="transfer">Transfer</option>
						<option value="kartu_kredit">Kartu Kredit</option>
					</select>
				</div>
				<input type="hidden" name="id_user" id="id_user" value="{{Auth::user()->id}}">
				<input type="hidden" name="id_list_kursi" id="id_list_kursi" value="{{$data->id_list_kursi}}">
				<input type="hidden" name="status" id="status" value="belum_lunas">
				<button type="submit" class="btn btn-primary">Save</button>
			</form>
		@endforeach
	</div>	
@endsection