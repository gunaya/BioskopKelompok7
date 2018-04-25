@extends('layouts.app')

@section('content')

	<div class="container" style="margin-top: 70px">
		@foreach($hasil as $listFilm)
		<p>Hello World</p>
		<div class="col-md-4 col-sm-6 portfolio-item">
	          	<img class="img-fluid" src="{{asset('upload/images/'.$listFilm->image) }}" alt="" style="width: 100%; height: 200px;">
	        <div class="portfolio-caption">
	          	<h4>{{($listFilm->nama_film)}}</h4>
	          	<br>
	        </div>
	    </div>
	    @endforeach
	</div>

@endsection