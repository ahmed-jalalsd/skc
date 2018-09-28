@extends('layouts.manage')

@section('content')
  <div class="flex-container">
    <div class="columns m-t-10 m-b-0">
      <div class="column">
        <h1 class="title is-admin is-4">Applcation</h1>
      </div>
    </div>

    <hr class="m-t-0">

    <form action="{{route('entries.store')}}" method="POST" enctype="multipart/form-data">
      {{ csrf_field() }}

      <div class="columns">

          <div class="column is-three-quarters-desktop is-three-quarters-tablet">

            <b-field  type="is-primary" label="Event">
              <b-input type="text" name="event_name"  size="is-large" v-model="event_name" readonly style= "opacity: 0.5 !important;
              cursor: not-allowed;"></b-input>
            </b-field>

            <b-field label="Choose the dog" name="dog_id">
                <b-select placeholder="Select the Dog" name="dog_id" required >
                  @foreach ($dogs as $dog)
                    <option value="{{$dog->id}}">{{$dog->dog_name}} | {{$dog->breeds->breed}}</option>
                  @endforeach
                </b-select>
            </b-field>

            <input type="hidden" name="event_id" value="{{$event->id}}">

            <div class="primary-action-button">
              <button class="button is-primary  backend-btn">Apply</button>
            </div>

          </div><!-- End of .column is-three-quarters-desktop -->

      </div><!-- End of .columns -->

    </form>

  </div><!-- End of .flex-container -->
@endsection


@section('scripts')
  <script>
    var app = new Vue({
      el: '#app',
      data: {
        event_name: '{{$event->title}}',
        api_token: '{{Auth::user()->api_token}}',
      },
    });
  </script>

@endsection
