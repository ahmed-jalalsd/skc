@extends('layouts.manage')

@section('content')
  <div class="flex-container">
    <div class="columns m-t-10 m-b-0">
      <div class="column">
        <h1 class="title is-admin is-4">All Events</h1>
      </div>
    </div>

    <hr class="m-t-0">


      <div class="columns">

          <div class="column is-three-quarters-desktop is-three-quarters-tablet">

            @if($currentEvents)
              @foreach ($currentEvents as $currentEvent)
                <div class="box">
                  <article class="media">
                    <div class="media-left">
                      <figure class="image is-128x128">
                        @if($currentEvent->featured_image)
                          <img src="{!! '/images/events/'.$currentEvent->featured_image !!}" alt="">
                        @else
                          <img src="https://bulma.io/images/placeholders/128x128.png" alt="Image">
                        @endif
                      </figure>
                    </div>
                    <div class="media-content">
                      <div class="content">
                        <p>
                          <strong>Event: {{$currentEvent->title}}</strong>
                          <br>
                          Start Date: {{$currentEvent->start_date}}
                          <br>
                          End Date: {{$currentEvent->end_date}}
                        </p>
                      </div>
                    </div>

                    <nav class="level is-mobile">
                      <div class="level-left">
                        <a href="{{route('results.index', $currentEvent->id)}}" class="level-item" aria-label="reply">
                          <span class="icon is-medium">
                            <i class="fas fa-reply" aria-hidden="true"></i>
                          </span>
                          Judging area
                        </a>
                      </div>
                  </nav>

                  </article>
                </div>
              @endforeach
            @else
              <div class="box">
                <div class="media-content">
                  <div class="content">
                    <p>
                      <strong>You did not applied to any event yet</strong>
                    </p>
                  </div>
                </div>
              </div>
            @endif
          </div><!-- End of .column is-three-quarters-desktop -->

      </div><!-- End of .columns -->

  </div><!-- End of .flex-container -->
@endsection
