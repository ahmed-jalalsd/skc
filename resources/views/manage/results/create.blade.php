@extends('layouts.manage')

@section('content')
  <div class="flex-container">
    <div class="columns m-t-10 m-b-0">
      <div class="column">
        <h1 class="title is-admin is-4">{{$dogInfo->events->title}}</h1>
      </div>
    </div>

    <hr class="m-t-0">

    <table class="table is-bordered is-striped is-narrow is-hoverable is-fullwidth">
      <tr>
        <th>Breed</th>
        <td>{{$dogInfo->dogs->breeds->breed}}</td>
      </tr>
      <tr>
        <th>Date of birth</th>
        <td>{{$dogInfo->dogs->date_of_birth}}</td>
      </tr>
      <tr>
        <th>Sex</th>
        <td>{{$dogInfo->dogs->sex}}</td>
      </tr>
      <tr>
        <th>Class</th>
        <td>{{$dogInfo->dogs->age}}</td>
      </tr>
      <tr>
        <th>Owner</th>
        <td>{{$dogInfo->dogs->owner}}</td>
      </tr>
    </table>

    <hr style="background-color: #ccc; height: 1px" class="m-t-0">

		<form action="{{route('results.store')}}" method="POST">
			{{ csrf_field() }}

      <div class="columns">

				<div class="column">

        </div>

        <div class="column">
          <span>
            <label for="radio-one">I</label>
            <input type="radio" name="order" value="I" id="radio-one" class="form-radio">
          </span>


          <label for="radio-second">II</label>
          <input type="radio" name="order" value="II" id="radio-second" class="form-radio">

          <label for="radio-third">III</label>
          <input type="radio" name="order" value="III" id="radio-third" class="form-radio">

          <label for="radio-fourth">IV</label>
          <input type="radio" name="order" value="IV" id="radio-fourth" class="form-radio">
      	</div> {{-- end of column --}}

      </div>

    </form>
</div>
@endsection
