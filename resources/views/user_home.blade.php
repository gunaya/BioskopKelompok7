@extends('layouts.app')

@section('content')

<!-- Bootstrap core CSS -->
<link href="{{asset('agency/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">

  <!-- Movie Grid -->
  <section class="bg-light" id="portfolio">
      <div class="container">
      <div class="row">
          <div class="col-lg-12 text-center">
            <h2 class="section-heading text-uppercase">Movie List</h2>
            <h3 class="section-subheading text-muted">Now Playing</h3>
          </div>
        </div>
        <div class="row">
        @foreach($film as $listFilm) 
          <div class="col-md-4 col-sm-6 portfolio-item">
            <a class="portfolio-link" data-toggle="modal" href="#portfolioModal1">
              <div class="portfolio-hover">
                <div class="portfolio-hover-content">
                
                </div>
              </div>
              <img class="img-fluid" src="{{asset('upload/images/'.$listFilm->image) }}" alt="">
            </a>
            <div class="portfolio-caption">
            <span>{{$listFilm->nama_film}}</span> 
              <div class="panel-thumbnails center-block">                                                
                                                    <div class="btn-group-sm">                                                
                                                        <a class="btn btn-success" href="buytiket.html"> BUY TICKET</a>
                                                    </div>    
            </div>
          </div>
          @endforeach
    </section>


@endsection