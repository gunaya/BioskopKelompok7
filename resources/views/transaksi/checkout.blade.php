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
	        </div>
		</div>
	</div>	
@endsection