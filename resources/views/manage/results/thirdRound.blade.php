@extends('layouts.manage')

@section('content')
  <div class="flex-container">
    <div class="columns m-t-10 m-b-0">
      <div class="column">
        <h1 class="title is-admin is-4">All winners from the first round in <b> {{$event->title}} </b> Show</h1>
        <h3 class=" is-admin is-4"><em>{{$group->group}}: </em> <small>{{$group->group_name}}</small> </h3>
      </div>
    </div>

    <hr class="m-t-0">

    <table class="table">
      <thead>
        <tr>
          <th>Breed</th>
          <th>Class</th>
          <th>Dog name</th>
          <th>Sex</th>
          <th>Owner</th>
          <th style="text-align:center;">Actions</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($firstDogs as $firstDog)
          <tr>
            <td>{{$firstDog->showsEntries->dogs->breeds->breed}}</td>
            <td>{{$firstDog->showsEntries->dogs->classes->class}}</td>
            <td>{{$firstDog->showsEntries->dogs->dog_name}}</td>
            <td>{{$firstDog->showsEntries->dogs->sex}}</td>
            <td>{{$firstDog->showsEntries->dogs->owner}}</td>
            <td>
              @if ($firstDog->status_second_round)
                <a href="{{route('results.createSecond', [$firstDog->show_entries_id, $firstDog->id])}}" class="button is-primary is-pulled-right backend-btn" disabled>
                  Judge
                </a>
              @else
                <!--  send show_entries table id and result table id to the createSecond form method-->
                <a href="{{route('results.createSecond', [$firstDog->show_entries_id, $firstDog->id])}}" class="button is-primary is-pulled-right backend-btn">
                  Judge
                </a>
              @endif
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>

  </div><!-- End of .flex-container -->
@endsection
