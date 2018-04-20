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
              <button type="submit" class="btn btn-outline-success btn-sm" data-toggle="modal" data-target="#tayangModal">Buy Ticket</button>
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


<!-- Modal Tayang -->
<div class="modal fade" id="tayangModal" tabindex="-1" role="dialog" aria-labelledby="tayangModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="tayangModalLabel">Jadwal Tayang</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>


@endsection