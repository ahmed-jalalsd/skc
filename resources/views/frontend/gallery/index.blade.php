@extends('layouts.app')

@section('content')

<section class="section">
  <div class="container events">
    <h1 class="title">Gallery</h1>

    <div class="columns">

      <div class="wrapper column is-10">
        @foreach ($galleries as $date=>$postGalleries)
          <h3>{{$date}}</h3>
          <div class="masonry">
            @foreach ($postGalleries as $gallery)
              <figure class="masonry__brick">
                <img src="{{ '/images/gallery/'.$gallery->cover_image }}" class="masonry__img" alt="Skc logo">
                  <figcaption>
                    <h4>{{$gallery->title}}</h4>
                  </figcaption>
                  <a href="{{ route('gallery.show', $gallery->id) }}"></a>
              </figure>
              @endforeach
            </div>
        @endforeach
      </div>

      <div class="column is-2 side-bar">
        @include('_partials.nav.archive-side', ['url1' => 'gallery'])
      </div>

    </div>
  </div>
</section>

@endsection
