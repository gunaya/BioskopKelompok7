@extends('layouts.app')

@section('content')

<!-- Movie Grid -->
<section class="bg-light" id="portfolio">
  <div class="container">
    <div class="row">
        @foreach($film as $listFilm) 
          <div class="col-md-4 col-sm-6 portfolio-item">
              <img class="img-fluid" src="{{asset('upload/images/'.$listFilm->image) }}" alt="" style="width: 100%; height: 200px;">
            <div class="portfolio-caption">
              <h4>{{($listFilm->nama_film)}}</h4>
              <br>
              <a type="submit" class="btn btn-outline-success btn-sm" href="/film/{{$listFilm->id_film}}">Buy Ticket</a>
            </div>
          </div>
        @endforeach
    </div>
  </div>
</section>
  <div class="container">
    <div class="row">
      <div class="col-md-4">
      </div>
      <div class="col-xs-4 ml-auto mr-auto">
        <ul class="pagination pagination-md">
            {{ $film->links() }}    
        </ul>
      </div>
      <div class="col-md-4">
      </div>
    </div>
  </div> 


@endsection