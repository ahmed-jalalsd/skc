@extends('layouts.app')

@section('content')

<section class="section">
  <div class="container events">
    <h1 class="title">Events</h1>

    <div class="wrapper">
      <div class="masonry">
          @foreach ($events as $event)
            <figure class="masonry__brick">
              <img src="{{ 'images/events/'.$event->featured_image }}" class="masonry__img" alt="Skc logo">
                <figcaption>
                  <h4>{{$event->title}}</h4>
                </figcaption>
                <a href=""></a>
            </figure>
        @endforeach
      </div>
    </div>

  </div>
</section>

@endsection
