@extends('layouts.manage')

@section('content')
  <div class="flex-container">
    <div class="columns m-t-10 m-b-0">
      <div class="column">
        <h1 class="title is-admin is-4">Choose</h1>
      </div>
    </div>

    <hr class="m-t-0">

    <form action="{{route('results.participate')}}" method="GET">
			{{ csrf_field() }}

			<div class="columns">

				<div class="column">
          <div class="field">
            <label for="sex" class="label">Sex</label>
            <p class="control is-expanded select">
              <select name="sex">
                <option>Select dropdown</option>
                <option value="male">Male</option>
                <option value="female">Female</option>
              </select>
              <input type="hidden" name="show_id" value="{{$showId}}">
              <input type="hidden" name="class_id" value="{{$classId}}">
            </p>
          </div>
          <div class="primary-action-button">
            <button class="button is-primary backend-btn">Apply</button>
          </div>
        </div>

      </div>
    </form>

  </div><!-- End of .flex-container -->
@endsection
