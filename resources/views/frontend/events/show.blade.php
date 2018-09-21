@extends('layouts.app')

@section('content')

<section class="section single-event">

  <div class="container">
    <h1 class="title single-event__title">Events</h1>

    <div class="columns">

      <div class="single-event__raised column is-8 is-offset-1">

        <article class="article">
          <header>
            <figure class="image">
              <img src="{{ '/images/events/'.$event->featured_image }}" alt="article featured image">
            </figure>
          </header>

          <span class="breedcrumbs">
            <h6>{{date('Y', strtotime($event->created_at))}} >> {{$event->title}} </h6>
          </span>

          <div class="article-body">
            <h2 class="title">{{$event->title}}</h2>
            <p>{{$event->content}}</p>
          </div>

          @isset($images)
            <div class="columns m-t-10 is-multiline is-centered">
              @foreach ($images as $image)
              <div class="column is-4-desktop is-half-tablet">
    						<div class="card">
                  	<div class="card-image">
                      <figure class="image is-3by2">
                          <img src="{!! '/images/events/'.$image !!}" alt="">
                      </figure>
                    </div>
                </div>
              </div>
              @endforeach
            </div>
          @endisset

          <!--  With Applcation Form -->
          @if($event->flag_application == 1)
            <div class="application-form">
              <a href="#" class="button skc-btn">apply</a>
            </div>
          @endif
        </article>


      </div>

      <div class="column is-2 side-bar">
        @include('_partials.nav.archive-side')
      </div>

    </div>
  </div>
</section>

@endsection
