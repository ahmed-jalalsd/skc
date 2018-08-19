@extends('layouts.manage')

@section('content')

	<div class="flex-container">

		<div class="columns m-t-10">
			<div class="column">
				<h1 class="title">Manage Members</h1>
			</div>

			<div class="column">
				<a href="{{route('dogs.create')}}" class="button is-primary is-pulled-right">
					Add A Dog
				</a>
			</div>
		</div>

		<hr style="background-color: #ccc; height: 1px" class="m-t-0">

		<div class="card">
			<div class="card-content">
				<table class="table  is-striped is-narrow  is-fullwidth">
					<thead>
						<tr>
							<th>Id</th>
							<th>Breed</th>
							<th>Dog Name</th>
              <th>Age</th>
              <th>Date Of Birth</th>
							<th>Pedigree Number</th>
							<th>Microchip Number</th>
							<th>Tattoo</th>
							<th>Sex</th>
							<th>Color</th>
							<th>Hair Type</th>
							<th>Sir</th>
							<th>Sir Pedigree Number</th>
							<th>Dam</th>
							<th>Dam Pedigree Number</th>
							<th>Breeder</th>
							<th>Owner</th>
							<th>Owner Phone Number</th>
							<th>Owner Address</th>
							<th>Owner Email</th>
							<th>Date Created</th>
							<th>Actions</th>
						</tr>
					</thead>

					<tbody>
							<tr>
								<th>{{$dog->id}}</th>
								<td>{{$dog->breed}}</td>
								<td>{{$dog->dog_name}}</td>
								<td>{{$dog->age}}</td>
								<td>{{$dog->date_of_birth}}</td>
								<td>{{$dog->pedigree_no}}</td>
								<td>{{$dog->microchip_no}}</td>
								<td>{{$dog->tatto}}</td>
								<td>{{$dog->sex}}</td>
								<td>{{$dog->color}}</td>
								<td>{{$dog->hair_type}}</td>
								<td>{{$dog->sir}}</td>
								<td>{{$dog->sir_pedigree_no}}</td>
								<td>{{$dog->dam}}</td>
								<td>{{$dog->dam_pedigree_no}}</td>
								<td>{{$dog->breeder}}</td>
								<td>{{$dog->owner}}</td>
								<td>{{$dog->phone_number}}</td>
                <td>{{$dog->owner_address}}</td>
                <td>{{$dog->email}}</td>
								<td>{{$dog->created_at->toFormattedDateString()}}</td>
								<td class="has-text-right">
									<a href="{{route('dogs.edit', $dog->id)}}" class="button is-outlined">Edit</a>
								</td>
							</tr>
					</tbody>
				</table>
			</div>
		</div> {{-- end of card --}}

    <hr style="background-color: #ccc; height: 1px" class="m-t-0">

    <div class="column is-one-quarter-desktop is-half-tablet">
@foreach($images as $image)
      <div class="card">

          <div class="card-image">
              <figure class="image is-3by2">
                  <img src="{!! '/images/dogs/'.$image !!}" alt="">
              </figure>

          </div>
        </div>
@endforeach
    </div>


	</div> {{-- end of flex container --}}


@endsection
