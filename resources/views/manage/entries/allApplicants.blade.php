@extends('layouts.manage')

@section('content')
  <div class="flex-container">
    <div class="columns m-t-10 m-b-0">
      <div class="column">
        <h1 class="title is-admin is-4">Your Applcation</h1>
      </div>
    </div>

    <hr class="m-t-0">


      <div class="columns">

          <div class="column is-three-quarters-desktop is-three-quarters-tablet">

            @if($applications)
              @foreach ($applications as $application)
                <div class="box">
                  <article class="media">
                    <div class="media-left">
                      <figure class="image is-64x64">
                        <img src="https://bulma.io/images/placeholders/128x128.png" alt="Image">
                      </figure>
                    </div>
                    <div class="media-content">
                      <div class="content">
                        <p>
                          <strong>Event Name: {{$application->title}}</strong> <small>@Date</small> <small>31m</small>
                          <br>
                          <strong>Participated Dog: {{$application->dog_name}}</strong>
                        </p>
                      </div>
                      <footer>
                        <p>
                          Owner: {{$application->name}}
                          <br>
                          Owner's email: {{$application->email}}
                          <br>
                          Owner's Phone: {{$application->phone_number}}
                        </p>
                      </footer>
                    </div>
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
            {{$applications->links()}}
          </div><!-- End of .column is-three-quarters-desktop -->

      </div><!-- End of .columns -->

  </div><!-- End of .flex-container -->
@endsection
