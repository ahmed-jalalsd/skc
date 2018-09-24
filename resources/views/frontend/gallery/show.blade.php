@extends('layouts.app')

@section('content')

<section class="section single-gallery">
  <div class="container events">
    <h1 class="title">Gallery</h1>

    <div class="columns">

      <div class="wrapper column is-10">
        <div class="breedcrumbs">
          <h6>{{date('Y', strtotime($gallery->created_at))}} >> {{date('F', strtotime($gallery->created_at))}} >> {{$gallery->title}}</h6>
        </div>

        <div class="masonry">
          @foreach ($gallery->photos as $images)
            <figure class="masonry__brick">
              <img src="{{ '/images/gallery/photos/'.$images->images }}" class="masonry__img" alt="Skc logo">
            </figure>
            @endforeach
        </div>
      </div>

      <div class="column is-2 side-bar">
        <!-- @include('_partials.nav.archive-side', ['url1' => 'gallery']) -->
      </div>

    </div>
  </div>
</section>

@endsection
