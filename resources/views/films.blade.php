@php
  /**
   * @var bool $isLocal - display additional controls for development
   * @var \Illuminate\Support\Collection|\App\Film[] $films
   */
@endphp

@extends('layout')

@section('content')

  <div class="films row">
    @foreach($films as $film)
      <div class="filmcard col col-12 col-sm-6 col-lg-4 mb-4">
        <article class="card film-card">
          <a class="card-img-top" href="{{'films/' .  $film->slug }}">
            @if($film->photo)
              <img class="img-fluid" src="{{ URL::to('/'). $film->photo->path }}" alt="{{ $film->name }}" >
            @endif
          </a>
          <div class="card-body">
            <h5 class="card-title mb-2">
              <a href="{{ 'films/' . $film->slug }}">
                <span class="film-name">{{ $film->name }}</span>
              </a>
            </h5>
            <div class="form-row mb-2 align-items-center">
              <div class="col col-auto h-100">
                @include('star-rating', ['rating' => $film->rating])
              </div>
            </div>
            <p class="card-text film-short">{{ $film->description }}</p>
            <a href=" {{'films/' . $film->slug }}" class="btn btn-primary">Read More</a>
          </div>
        </article>
      </div>
    @endforeach
  </div>

  {!! $films->links() !!}
@endsection