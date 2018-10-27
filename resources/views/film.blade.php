@php
  /**
   * @var \App\Film $film
   */
@endphp
@extends('layout')

@section('content')

  <nav class="breadcrumb">
    <a class="breadcrumb-item" href="{{ route('home') }}">Home</a>
    <a class="breadcrumb-item" href="{{ route('films') }}">Films</a>
    <span class="breadcrumb-item active">{{ $film->name }}</span>
  </nav>

  <div class="film-inner">
    <div class="card">
      <div class="card-body">

        <div class="row">

          <div class="col col-12 col-sm-auto mb-3 mb-sm-0">

            <a href="{{ URL::to('/') .$film->photo->path }}" class="img-zoom" data-fancybox data-caption="{{ $film->name }})">
              <img src="{{ URL::to('/') . $film->photo->path }}" alt="{{ $film->name }}" class="film-caver img-fluid">
            </a>

          </div>

          <div class="col">
            <h1 class="page-title">{{ $film->name }}</h1>

            @include('star-rating', ['rating' => $film->rating])

            <div class="object-props">
              <dl class="clearfix">
                <dt>Realease Date</dt>
                <dd>{{ $film->release_date }}</dd>

                <dt>Country</dt>
                <dd>{{ $film->country->title }}</dd>

                <dt>Genre</dt>
                <dd>{{ $film->genre->name }}</dd>

                <dt>Ticket Price</dt>
                <dd>${{ number_format($film->ticket_price, 2) }}</dd>

              </dl>
            </div>

            <div class="film-body">
              {{ $film->description }}
            </div>

          </div>

        </div>

      </div>
    </div>

    <div class="row justify-content-center">
      <div class="col col-md-8">
        <div class="mt-5">
          <a name="comments"></a>
          <h4 class="mb-3">Comments</h4>
          <div class="comments mb-4">
            @foreach($comments as $comment)
              <div class="comment card card-body mb-4">
                <header class="comment-header">
                  <div class="form-row align-items-center">
                    <div class="col col-auto">
                      <div class="user-name">{{ $comment->user->name }}</div>
                    </div>
                  </div>
                </header>
                <div class="comment-body">
                  <div class="comment-text mb-2">{{$comment->text }}</div>
                </div>
              </div>
            @endforeach
          </div>

          @if(Auth::check())
            @php
              $user = Auth::user();
            @endphp
            <form id="comment-form" class="comment-form" method="post" action="{{ route('comment') }}">

              {{ csrf_field() }}
              <input type="hidden" name="film_id" value="{{ $film->id }}">

              <div class="row">
                <div class="col">
                  <div class="username mb-2">{{ $user->name }}</div>
                  <textarea name="text" class="form-control autosize" rows="5" placeholder="{{ __("Your comment") }}..."></textarea>
                  <div class="mt-3">
                    <input type="submit" class="btn btn-primary" value="{{ __("Submit") }}">
                    <i class="fa fa-spin fa-refresh text-muted ml-3 loader invisible"></i>
                  </div>
                </div>
              </div>
            </form>
          @else
            <hr>
            <p class="small">
            <h6><a href="{{ URL::to('login') }}">Login</a> to be able to comment</h6>
            </p>
          @endif
        </div>
      </div>
    </div>
  </div>

  <br/>
@endsection