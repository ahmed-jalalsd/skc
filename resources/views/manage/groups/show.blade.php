@extends('layouts.manage')

@section('content')

	<div class="flex-container">

		<div class="columns m-t-10">
			<div class="column">
				<h1 class="title">Manage Breeds & Groups</h1>
			</div>

			<div class="column">
				<a href="{{route('groups.create')}}" class="button is-primary is-pulled-right backend-btn">
					<span class="icon m-r-10">
            <img src="{{ asset('images/backend/plus.svg') }}" alt="add a new post icon" style="filter: invert(1);">
          </span> New Breed
				</a>
			</div>
		</div>

		<hr style="background-color: #ccc; height: 1px" class="m-t-0">

    <h1>{{$group->group}}: <strong>{{$group->group_name}}</strong></h1>

		<div class="card">
			<div class="card-content">
				<table class="table is-narrow is-fullwidth">
					<thead>
						<tr>
							<th>Id</th>
							<th>Breed</th>
							<th>Varieties</th>
							<th>Origin</th>
							<th style="text-align:center;">Actions</th>
						</tr>
					</thead>

					<tbody>
            @foreach ($group->breeds as $breed)
							<tr>

						     <td>{{$breed->id}}</td>
                 <td>{{$breed->breed}}</td>
	                 @if($breed->varieties)
	                   <?php $varieties= json_decode($breed->varieties);?>
	                   <td>
	                     @foreach($varieties as $variety)
	                       {{strtolower($variety)}}<strong>,</strong>
	                     @endforeach
	                   </td>
	                 @else
	                 <td>No Varieties</td>
	                 @endif
                 <td>{{$breed->origin}}</td>

								<td class="action-content">
									<!-- <a href="{{route('groups.show', $breed->id)}}" class="m-r-5 ">
										<span class="icon m-r-10">
					            <img src="{{ asset('images/backend/details.png') }}" alt="link to show">
					          </span>
									</a> -->
									<a href="{{route('groups.edit', $breed->id)}}" class="">
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


	</div> {{-- end of flex container --}}


@endsection
