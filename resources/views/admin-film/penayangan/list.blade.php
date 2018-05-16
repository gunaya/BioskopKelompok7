@extends('layouts.master')

@section('content')
	<div class="">
	  <div class="box">
			<div class="box-header">
			  <h3 class="box-title">List Kursi</h3>
				<div class="box-tools">

			  	  {{-- <form action="{{ url('query')}}" method="GET">
				    <div class="input-group input-group-sm" style="width: 150px;">
				      <input type="text" name="cari" id="cari" class="form-control pull-right" placeholder="Search">

				      <div class="input-group-btn">
				        <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
				      </div>
				    </div>

			  	  </form> --}}
				</div>
			  	
			</div>
			<!-- /.box-header -->
			<div class="box-body table-responsive no-padding">
			  	<table class="table table-responsive">
				  	<thead>
					    <tr>
					      <th>ID</th>
					      <th>Kode Kursi</th>
					      <th>Jadwal Tayang</th>
					      <th>Status</th>
					    </tr>
				  	</thead>
				    <tbody>
				    	@foreach($hasil as $id => $list)
						    <tr @if ($id === 0) class="active" @endif>
						    	<td>{{$list->id_list_kursi}}</td>
							    <td>{{$list->kode_kursi}}</td>
							    <td>{{$list->waktu_tayang}}</td>
							    <td>{{$list->status}}</td>
						    </tr>
					    @endforeach
					</tbody>
				</table>

			</div>
		<!-- /.box-body -->
			<div class="box-footer clearfix">
				<!-- Tambah Film -->
				<a role="button" class="btn btn-primary" href="{{url('admin-film/penayangan/jadwal')}}">
				  Back
				</a>
	            <ul class="pagination pagination-sm no-margin pull-right">
	            	{{ $hasil->links() }}    
	            </ul>
	        </div>
		</div>
	</div>

		

@endsection