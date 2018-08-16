@extends('layouts.manage')

@section('content')

	<div class="flex-container">

		<div class="columns m-t-10">
			<div class="column">
				<h1 class="title">Manage Members</h1>
			</div>

			<div class="column">
				<a href="{{route('users.create')}}" class="button is-primary is-pulled-right">
					Create New User
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
							<th>Actions</th>
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
								<td class="has-text-right">
									<a href="{{route('users.show', $user->id)}}" class="button is-outlined m-r-5 ">View</a>
									<a href="{{route('users.edit', $user->id)}}" class="button is-outlined">Edit</a>
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
