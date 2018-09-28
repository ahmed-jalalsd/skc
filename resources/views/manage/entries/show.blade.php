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

            @foreach ($applications as $application)
            <div class="field">
    					<label for="name" class="label">Dog name</label>
    					<pre>{{$application->dog_name}}</pre>
    				</div>

    				<div class="field">
    					<label for="event" class="label">Event Name</label>
    					<pre>{{$application->title}}</pre>
    				</div>
            @endforeach

          </div><!-- End of .column is-three-quarters-desktop -->

      </div><!-- End of .columns -->

  </div><!-- End of .flex-container -->
@endsection
