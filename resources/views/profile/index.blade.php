@extends('layouts.app')

@section('content')

	<div class="container" style="margin-top: 70px">
		@foreach($hasil as $row)
			<p>{{$row->name}}</p>
		@endforeach
	</div>
@endsection