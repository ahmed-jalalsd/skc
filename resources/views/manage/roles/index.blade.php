@extends('layouts.manage')

@section('content')
  <div class="flex-container">

    <div class="columns m-t-10">
      <div class="column">
        <h1 class="title">Manage Roles</h1>
      </div>
      <div class="column">
        <a href="{{route('roles.create')}}" class="button is-primary is-pulled-right backend-btn">
          <span class="icon m-r-10">
            <img src="{{ asset('images/backend/plus.svg') }}" alt="add a new post icon" style="filter: invert(1);">
          </span> New Role
        </a>
      </div>
    </div>

    <hr class="m-t-0">

    <div class="columns is-multiline">
      @foreach ($roles as $role)
        <div class="column is-two-fifths role-box">
          <div class="box">
            <article class="media">
              <div class="media-content">
                <div class="content">
                  <h4 class="subtitle">Dispaly name: {{$role->display_name}}</h4>
                  <h4 class="subtitle"><em>name: {{ $role->name }}</em></h4>
                  <p>description : {{ $role->description}}</p>
                </div>

                <nav class="columns is-mobile ">

                  <div class="column is-2">
                    <a href="{{ route('roles.show', $role->id) }}" class="">
                      <span class="icon m-r-10">
  					            <img src="{{ asset('images/backend/details.png') }}" alt="link to show">
  					          </span>
                    </a>
                  </div>

                  <div class="column is-2">
                    <a href="{{ route('roles.edit', $role->id) }}" class="">
                      <span class="icon m-r-10">
  					            <img src="{{ asset('images/backend/edit.png') }}" alt="link to show">
  					          </span>
                    </a>
                  </div>

                </nav>

              </div>
            </article>
          </div>
        </div>
      @endforeach
      </div>
  </div>
@endsection
