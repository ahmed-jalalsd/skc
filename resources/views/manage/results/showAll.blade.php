@extends('layouts.manage')

@section('content')
  <div class="flex-container">
    <div class="columns m-t-10 m-b-0">
      <div class="column">
        <h1 class="title is-admin is-4">All Events</h1>
      </div>
    </div>

    <hr class="m-t-0">

    @if($oldEvents)
      <div class="columns is-multiline">
        @foreach ($oldEvents as $currentEvent)
          <div class="column  is-one-quarter is-three-quarters-tablet">
            <div class="card">

              <div class="card-image">
  							<figure class="image is-4by3">
                  @if($currentEvent->featured_image)
                    <img src="{!! '/images/events/'.$currentEvent->featured_image !!}" alt="">
                  @else
                    <img src="https://bulma.io/images/placeholders/128x128.png" alt="Image">
                  @endif
      					</figure>
  						</div>  <!-- End of .card-image -->

              <div class="card-content">
                <div class="media">
                  <div class="media-content">
                    <h4 class="title is-4">Event: {{$currentEvent->title}}</h4>
                    <h4 class="subtitle">Start Date: {{$currentEvent->start_date}}</h4>
      							<h4 class="subtitle">End Date: {{$currentEvent->end_date}}</h4>
                    <nav class="columns is-mobile">
                      <div class="column is-one-half">
            						 <a href="{{route('results.showBestAll', $currentEvent->id)}}" class="m-r-10 m-t-5">
                           see results
                         </a>
                       </div>
                     </nav>
                   </div>
                 </div>
              </div>  <!-- End of .card-content -->

            </div> <!-- End of .card -->
          </div><!-- End of .column is-three-quarters-desktop -->
        @endforeach
      </div><!-- End of .columns -->
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

  </div><!-- End of .flex-container -->
@endsection
