@extends('layouts.manage')

@section('content')

	<div class="flex-container">

		<div class="columns m-t-10">
			<div class="column">
				<h1 class="title">Edit Breed</h1>
			</div>
		</div>


		<hr style="background-color: #ccc; height: 1px" class="m-t-0">

		<form action="{{route('groups.update', $breed->id)}}" method="POST">
      {{method_field('PUT')}}
      {{csrf_field()}}

			<div class="columns">

				<div class="column">

          <div class="field is-horizontal">
            <div class="field-body">
  						<div class="field">
  							<label for="breed_name" class="label">Breed Name</label>
  							<p class="control">
  								<input type="text" class="input" name="breed_name" id="name" value="{{$breed->breed}}">
  							</p>
  						</div>

  						<div class="field">
  							<label for="breed_origin" class="label">Breed Origin</label>
  							<p class="control">
  								<input type="text" class="input" name="breed_origin" id="origin" value="{{$breed->origin}}">
  							</p>
  						</div>
            </div>
          </div>

              <div class="field">
                <label for="group_id" class="label">Group</label>
                <p class="control is-expanded select is-fullwidth">
                  <select name="group_id">
                    <option value="{{$breed->group_id}}">{{$breed->groups->group}}: {{$breed->groups->group_name}} </option>
                    @foreach ($groups as $group)
                    <option value="{{$group->id}}">{{$group->group}}: {{$group->group_name}}</option>
                    @endforeach
                  </select>
                </p>
              </div>

              <div class="field">
                <label for="varieties" class="label">Varieties</label>
                <p class="control">
                  <input type="text" class="input" name="varieties" id="varieties"
                  value="<?php if (isset($varieties)) {
                    foreach ($varieties as $variety) {
                      echo $variety . ',';
                    }
                  } ;?>" placeholder="variatition1,varation2,varaition3">
                </p>
              </div>

				</div> {{-- end of column --}}


			</div> {{-- end of columns for forms --}}

			<div class="columns">
		        <div class="column">
		          <hr  class="m-t-0" style="background-color: #ccc; height: 1px; ">
		          <button class="button is-primary is-pulled-right backend-btn" style="width: 250px;">Update Breed</button>
		        </div>
      		</div>

		</form>

	</div> {{-- end of flex container --}}


@endsection

@section('scripts')
  <script>
    var app = new Vue({
      el: '#app',
      data: {
        auto_password: true,
        rolesSelected: [{!! old('roles') ? old('roles') : '' !!}]
      }
    });
  </script>
@endsection
