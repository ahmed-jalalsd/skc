@extends('layouts.manage')

@section('content')

	<div class="flex-container">

		<div class="columns m-t-10">
			<div class="column">
				<h1 class="title">Manage Members</h1>
			</div>

			<div class="column">
				<a href="{{route('users.create')}}" class="button is-primary is-pulled-right backend-btn">
					<span class="icon m-r-10">
            <img src="{{ asset('images/backend/plus.svg') }}" alt="add a new post icon" style="filter: invert(1);">
          </span> New User
				</a>
			</div>
		</div>

		<hr style="background-color: #ccc; height: 1px" class="m-t-0">

		<div class="card">
			<div class="card-content">
				<table class="table is-narrow is-fullwidth">
					<thead>
						<tr>
							<th>Id</th>
							<th>Name</th>
							<th>Email</th>
							<th>Role</th>
							<th>Date Created</th>
							<th style="text-align:center;">Actions</th>
						</tr>
					</thead>

					<tbody>
						@foreach ($users as $user)
							<tr>
								<th>{{$user->id}}</th>
								<td>{{$user->name}}</td>
								<td>{{$user->email}}</td>
								@foreach ($user->roles as $role)
								<td>{{$role->display_name}}</td>
								@endforeach
								<td>{{$user->created_at->toFormattedDateString()}}</td>
								<td class="action-content">
									<a href="{{route('users.show', $user->id)}}" class="m-r-5 ">
										<span class="icon m-r-10">
					            <img src="{{ asset('images/backend/details.png') }}" alt="link to show">
					          </span>
									</a>
									<a href="{{route('users.edit', $user->id)}}" class="">
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
		</div> {{-- end of card --}}

		{{$users->links()}}

	</div> {{-- end of flex container --}}


@endsection
