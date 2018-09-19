@extends('layouts.manage')

@section('content')
  <div class="flex-container">
    <div class="columns m-t-10">
      <div class="column">
        <h1 class="title">Manage Permissions</h1>
      </div>
      <div class="column">
        <a href="{{route('permissions.create')}}" class="button is-primary is-pulled-right backend-btn">
          <span class="icon m-r-10">
            <img src="{{ asset('images/backend/plus.svg') }}" alt="add a new post icon" style="filter: invert(1);">
          </span>New Permission</a>
      </div>
    </div>
    <hr class="m-t-0">

    <div class="card">
      <div class="card-content">
        <table class="table is-narrow">
          <thead>
            <tr>
              <th>Name</th>
              <th>Slug</th>
              <th>Description</th>
              <th style="text-align:center;">Actions</th>
            </tr>
          </thead>

          <tbody>
            @foreach ($permissions as $permission)
              <tr>
                <th>{{$permission->display_name}}</th>
                <td>{{$permission->name}}</td>
                <td>{{$permission->description}}</td>
                <td class="action-content">
                  <a class="is-small m-r-5" href="{{route('permissions.show', $permission->id)}}">
                    <span class="icon m-r-10">
					            <img src="{{ asset('images/backend/details.png') }}" alt="link to show">
					          </span>
                  </a>
                  <a class="is-small" href="{{route('permissions.edit', $permission->id)}}">
                    <span class="icon m-r-10">
					            <img src="{{ asset('images/backend/edit.png') }}" alt="link to edit">
					          </span>
                  </a>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div> <!-- end of .card -->
  </div>
@endsection
