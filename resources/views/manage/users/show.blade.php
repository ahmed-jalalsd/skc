@extends('layouts.manage')

@section('content')

	<div class="flex-container">

		<div class="columns m-t-10">

			<div class="column">
				<h1 class="title"> Member Details</h1>
			</div>

			<div class="column">
				<a href="{{route('users.edit', $user->id)}}" class="button is-primary is-pulled-right backend-btn">
					<span class="icon m-r-10">
						<img src="{{ asset('images/backend/edit.png') }}" alt="link to show">
					</span> Edit Member
				</a>
			</div>

		</div>


		<hr style="background-color: #ccc; height: 1px" class="m-t-0">

		<div class="columns">
			<div class="column">

				<div class="field">
					<label for="name" class="label">Name</label>
					<pre>{{$user->name}}</pre>
				</div>

				<div class="field">
					<label for="email" class="label">Email</label>
					<pre>{{$user->email}}</pre>
				</div>

				<div class="field">
					<label for="phone" class="label">Phone Number</label>
					<pre>{{$user->phone_number}}</pre>
				</div>

				<div class="field">
					<label for="address" class="label">Address</label>
					<pre>{{$user->address}}</pre>
				</div>

				<div class="field">
					<label for="roles" class="label">Roles</label>
					{{$user->roles->count() == 0 ? 'This user has not been assigned any roles yet' : ''}}
					<ul>
						@foreach($user->roles as $role)
							<li>{{$role->display_name}} ({{$role->description}})</li>
						@endforeach
					</ul>
				</div>


			</div> {{-- end of column --}}
		</div>

	</div> {{-- end of flex container --}}


@endsection
