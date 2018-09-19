@extends('layouts.manage')

@section('content')
  <div class="flex-container">
    <div class="columns m-t-10">
      <div class="column">
        <h1 class="title">View Permission Details</h1>
      </div> <!-- end of column -->

      <div class="column">
        <a href="{{route('permissions.edit', $permission->id)}}" class="button is-primary is-pulled-right backend-btn">
          <span class="icon m-r-10">
						<img src="{{ asset('images/backend/edit.png') }}" alt="link to show">
					</span> Edit Permission
        </a>
      </div>
    </div>
    <hr class="m-t-0">

    <div class="columns">
      <div class="column">
        <div class="box">
          <article class="media">
            <div class="media-content">
              <div class="content">
                <p>
                  <strong>{{$permission->display_name}}</strong> <small>{{$permission->name}}</small>
                  <br>
                  {{$permission->description}}
                </p>
              </div>
            </div>
          </article>
        </div>
      </div>
    </div>
  </div>
@endsection
