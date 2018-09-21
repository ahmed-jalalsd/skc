@extends('layouts.app')

@section('content')

<section class="section">
  <div class="container events">
    <h1 class="title">Events</h1>

    <div class="columns">

      <div class="wrapper column is-10">
        @foreach ($events as $date=>$postEvents)
          <h3>{{$date}}</h3>
          <div class="masonry">
            @foreach ($postEvents as $postEvent)
              <figure class="masonry__brick">
                <img src="{{ '/images/events/'.$postEvent->featured_image }}" class="masonry__img" alt="Skc logo">
                  <figcaption>
                    <h4>{{$postEvent->title}}</h4>
                  </figcaption>
                  <a href=""></a>
              </figure>
              @endforeach
            </div>
        @endforeach
      </div>

      <div class="column is-2 side-bar">
        @include('_partials.nav.archive-side')
      </div>

    </div>
  </div>
</section>

@endsection
