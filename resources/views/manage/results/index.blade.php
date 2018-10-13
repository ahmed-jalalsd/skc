@extends('layouts.manage')

@section('content')
  <div class="flex-container">
    <div class="columns m-t-10 m-b-0">
      <div class="column">
        <h1 class="title is-admin is-4">All Classes in {{$event->title}} Show</h1>
      </div>
    </div>

    <hr class="m-t-0">

    <div class="box">
      @foreach ($classes as $class)
      <article class="media">

        <div class="media-content">

          <div class="content">

            <p>
              <strong>{{ucfirst($class->class)}}</strong>
            </p>
            <nav class="level is-mobile">
              <div class="level-left">
                <a href="{{route('results.create', $dogInShow)}}" class="button is-primary is-pulled-right backend-btn">
                  See All dogs
                </a>
              </div>
            </nav>

          </div>

        </div>

      </article>
        @endforeach
    </div>

  </div><!-- End of .flex-container -->
@endsection
