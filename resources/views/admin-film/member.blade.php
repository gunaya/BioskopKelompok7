@extends('layouts.master')

@section('content')
	<div class="">
	  <div class="box">
			<div class="box-header">
			  <h3 class="box-title">List Member</h3>
				<div class="box-tools">
				</div>
			  	
			</div>
			<!-- /.box-header -->
			<div class="box-body table-responsive no-padding">
			  	<table class="table table-responsive">
				  	<thead>
					    <tr>
					      <th>ID</th>
					      <th>Nama</th>
					      <th>Alamat</th>
					      <th>Telepon</th>
					      <th>Email</th>
					    </tr>
				  	</thead>
				    <tbody>
				    	@foreach($hasil as $id => $list)
						    <tr @if ($id === 0) class="active" @endif>
						    	<td>{{$list->id}}</td>
							    <td>{{$list->name}}</td>
							    <td>{{$list->alamat}}</td>
							    <td>{{$list->telepon}}</td>
							    <td>{{$list->email}}</td>
						    </tr>
					    @endforeach
					</tbody>
				</table>

			</div>
		<!-- /.box-body -->
			<div class="box-footer clearfix">
				<!-- Tambah Film -->
				
	            <ul class="pagination pagination-sm no-margin pull-right">
	            	{{ $hasil->links() }}    
	            </ul>
	        </div>
		</div>
	</div>
@endsection