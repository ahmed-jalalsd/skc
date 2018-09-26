@extends('layouts.manage')

@section('content')

	<div class="flex-container">

		<div class="columns m-t-10">
			<div class="column">
				<h1 class="title">Manage Groups</h1>
			</div>

			<div class="column">
				<!-- <a href="{{route('groups.create')}}" class="button is-primary is-pulled-right backend-btn">
					<span class="icon m-r-10">
            <img src="{{ asset('images/backend/plus.svg') }}" alt="add a new post icon" style="filter: invert(1);">
          </span> New Group
				</a> -->
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
							<th>Group</th>
							<th>Number of breeds</th>
							<th style="text-align:center;">Actions</th>
						</tr>
					</thead>

					<tbody>
						@foreach ($groups as $group)
							<tr>
								<th>{{$group->id}}</th>
								<td>{{$group->group_name}}</td>
								<td>{{$group->group}}</td>
								<td>{{$group->breeds->count()}}</td>
								<td class="action-content">
									<a href="{{route('groups.show', $group->id)}}" class="m-r-5 ">
										<span class="icon m-r-10">
					            <img src="{{ asset('images/backend/details.png') }}" alt="link to show">
					          </span>
									</a>
									<!-- <a href="{{route('groups.edit', $group->id)}}" class="">
										<span class="icon m-r-10">
					            <img src="{{ asset('images/backend/edit.png') }}" alt="link to edit">
					          </span>
									</a> -->
								</td>
							</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div><!-- end of card -->

		{{ $groups->links() }}

	</div> <!-- end of flex container -->


@endsection
