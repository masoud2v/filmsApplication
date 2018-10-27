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
        {{$film->name}}
      </div>
    @endforeach
  </div>
@endsection