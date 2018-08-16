@extends('layouts.manage')

@section('content')

	<div class="flex-container">

		<div class="columns m-t-10">
			<div class="column">
				<h1 class="title">Create Members</h1>
			</div>
		</div>


		<hr style="background-color: #ccc; height: 1px" class="m-t-0">

		<form action="{{route('users.store')}}" method="POST">
			{{ csrf_field() }}

			<div class="columns">

				<div class="column">

						<div class="field">
							<label for="name" class="label">Name</label>
							<p class="control">
								<input type="text" class="input" name="name" id="name">
							</p>
						</div>

						<div class="field">
							<label for="email" class="label">Email</label>
							<p class="control">
								<input type="email" class="input" name="email" id="email">
							</p>
						</div>

						<div class="field">
				            <label for="password" class="label">Password</label>
				            <p class="control">
				              <input type="text" class="input" name="password" id="password" v-if="!auto_password" placeholder="Manually give a password to this user">

				              <b-checkbox name="auto_generate" class="m-t-15" v-model="auto_password" native-value="auto_generate" >Auto Generate Password</b-checkbox>

				            </p>
				        </div>

								<div class="field">
									<label for="phone_number" class="label">Phone number</label>
									<p class="control">
										<input type="tel" class="input" name="phone_number" id="phone_number">
									</p>
								</div>

								<div class="field">
									<label for="address" class="label">Address</label>
									<p class="control">
										<input type="text" class="input" name="address" id="address">
									</p>
								</div>

						{{-- <button class="button is-success">Create User</button> --}}


				</div> {{-- end of column --}}

				<div class="column">

			        <label for="roles" class="label">Roles:</label>
			        <input type="hidden" name="roles" :value="rolesSelected" />
		            @foreach ($roles as $role)
		              <div class="field">
		                <b-checkbox v-model="rolesSelected" :native-value="{{$role->id}}">{{$role->display_name}}</b-checkbox>
		              </div>
		            @endforeach

        		</div> {{-- end of column --}}


			</div> {{-- end of columns for forms --}}

			<div class="columns">
		        <div class="column">
		          <hr  class="m-t-0" style="background-color: #ccc; height: 1px; ">
		          <button class="button is-primary is-pulled-right" style="width: 250px;">Create New User</button>
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
