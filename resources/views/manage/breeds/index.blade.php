@extends('layouts.manage')

@section('content')

	<div class="flex-container">

		<div class="columns m-t-10">
			<div class="column">
				<h1 class="title">Manage Breeds</h1>
			</div>

			<div class="column">
				<a href="{{route('users.create')}}" class="button is-primary is-pulled-right backend-btn">
					<span class="icon m-r-10">
            <img src="{{ asset('images/backend/plus.svg') }}" alt="add a new post icon" style="filter: invert(1);">
          </span> New Breed
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
							<th>Breed</th>
							<th>Group</th>
							<th>Group Id</th>
							<th>Varieties</th>
							<th>Origin</th>
							<th style="text-align:center;">Actions</th>
						</tr>
					</thead>

					<tbody>
						@foreach ($breeds as $breed)
							<tr>
								<th>{{$breed->id}}</th>
								<td>{{$breed->breed}}</td>
								<td>{{$breed->groups->group_name}}</td>
								<td>{{$breed->groups->group}}</td>

                @if($breed->varieties)
                  <?php $varieties= json_decode($breed->varieties);?>
                  <td>
                    @foreach($varieties as $variety)
                      <p>{{$variety}}<strong>,</strong> </p>
                    @endforeach
                  </td>
                @else
                <td>No Varieties</td>
                @endif

								<td class="action-content">
									<a href="{{route('breeds.show', $breed->id)}}" class="m-r-5 ">
										<span class="icon m-r-10">
					            <img src="{{ asset('images/backend/details.png') }}" alt="link to show">
					          </span>
									</a>
									<a href="{{route('breeds.edit', $breed->id)}}" class="">
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

		{{$breeds->links()}}

	</div> {{-- end of flex container --}}


@endsection
