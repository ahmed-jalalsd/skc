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

            @if($events)
              @foreach ($events as $event)
                <div class="box">
                  <article class="media">
                    <div class="media-left">
                      <figure class="image is-128x128">
                          <img src="{!! '/images/events/'.$event->featured_image !!}" alt="">
                        <!-- <img src="https://bulma.io/images/placeholders/128x128.png" alt="Image"> -->
                      </figure>
                    </div>
                    <div class="media-content">
                      <div class="content">
                        <p>
                          <strong>Event: {{$event->title}}</strong>
                          <br>
                          Start Date: {{$event->start_date}}
                          <br>
                          End Date: {{$event->end_date}}
                        </p>
                      </div>
                    </div>
                  </article>
                </div>
              @endforeach
              {{$events->links()}}
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
