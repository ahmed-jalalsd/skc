@extends('layouts.manage')

@section('content')

	<div class="flex-container">

		<div class="columns m-t-10">
			<div class="column">
				<h1 class="title">{{$dog->dog_name}}</h1>
			</div>

			<div class="column">
				<a href="{{route('dogs.edit', $dog->id)}}" class="button is-primary is-pulled-right">
					Edit {{$dog->dog_name}}
				</a>
			</div>
		</div>

		<hr style="background-color: #ccc; height: 1px" class="m-t-0">


		<div class="columns">

			<div class="column">

				<div class="field is-horizontal">

					<div class="field-body">

						<div class="field">
							<label class="label">Group</label>
							<pre>{{$dog->breeds->groups->group_name}}</pre>
						</div>

						<div class="field">
							<label class="label">Breed</label>
							<pre>{{$dog->breeds->breed}}</pre>
						</div>

						<div class="field">
							<label class="label">Dog Name</label>
							<pre>{{$dog->dog_name}}</pre>
						</div>

					</div>

				</div>

				<div class="field is-horizontal">
					<div class="field-body">

						<div class="field">
							<label class="label">Age</label>
							<pre>{{$dog->age}}</pre>
						</div>

						<div class="field">
							<label  class="label">Color</label>
							<pre>{{$dog->color}}</pre>
						</div>

						<div class="field">
							<label for="pedigree_no" class="label">Pedigree NO.</label>
							<pre>{{$dog->pedigree_no}}</pre>
						</div>

					</div>
				</div>


				<div class="field is-horizontal">

					<div class="field-body">
						<div class="field">
							<label for="hair_type" class="label">Hair type</label>
								<div class="">
									<pre>{{$dog->hair_type}}</pre>
								</div>
						</div>

						<div class="field">
							<label for="date_of_birth" class="label">Birth Date</label>
							<pre>{{$dog->date_of_birth}}</pre>
						</div>
					</div>

				</div>

				<div class="field is-horizontal">

					<div class="field-body">

						<div class="field">
							<label  class="label">Microchip NO.</label>
							<p class="custom-box">{{$dog->microchip_no}}</p>
						</div>

						<div class="field">
							<label class="label">Tattoo</label>
							<p class="custom-box">{{$dog->tatto}}</p>
						</div>

						<div class="field">
							<label class="label">Sex</label>
							<p class="custom-box">{{$dog->sex}}</p>
						</div>

					</div>

				</div>

				<div class="field is-horizontal">
					<div class="field-body">
						<div class="field">
							<label class="label">Sir</label>
							<p class="control is-expanded">
								{{$dog->sir}}
							</p>
						</div>

						<div class="field">
							<label class="label">Sir Pedigree NO.</label>
							<p class="control is-expanded ">
								{{$dog->sir_pedigree_no}}
							</p>
						</div>
					</div>
				</div>

				<div class="field is-horizontal">
					<div class="field-body">
						<div class="field">
							<label for="dam" class="label">Dam</label>
							<p class="control is-expanded">
								{{$dog->dam}}
							</p>
						</div>

						<div class="field">
							<label for="dam_pedigree_no" class="label">Dam Pedigree NO.</label>
							<p class="control is-expanded ">
								{{$dog->dam_pedigree_no}}
							</p>
						</div>
					</div>
				</div>

				<div class="field">
					<label for="breeder" class="label">Breeder</label>
					<p class="control">
						{{$dog->breeder}}
					</p>
				</div>

				<div class="field">
					<label for="owner" class="label">Owner</label>
					<p class="control">
						{{$dog->owner}}
					</p>
				</div>

				<div class="field">
					<label for="owner_address" class="label">Owner Address</label>
					<p class="control">
						{{$dog->owner_address}}
					</p>
				</div>

				<div class="field is-horizontal">
					<div class="field-body">

						<div class="field is-expanded">

							<label class="label">Phone NO.</label>
							<div class="field">
								<p class="control is-expanded">
									{{$dog->phone_number}}
								</p>
							</div>

						</div>

						<div class="field">
							<label class="label">Email</label>
							<p class="control">
								{{$dog->email}}
							</p>
						</div>

						<div class="field">
							<label class="label">The dog was added at</label>
							<p class="control">
								{{$dog->created_at->toFormattedDateString()}}
							</p>
						</div>

					</div>
				</div>


			</div> {{-- end of column --}}


		</div> {{-- end of columns for forms --}}


    <hr style="background-color: #ccc; height: 1px" class="m-t-0">

		<div class="columns is-multiline">

				@foreach($images as $image)
				<div class="column is-one-quarter-desktop is-half-tablet">
					<div class="card">
						<div class="card-image">
              <figure class="image is-3by2">
                  <img src="{!! '/images/dogs/'.$image !!}" alt="">
              </figure>
          	</div>
        	</div>
					</div>
				@endforeach

		</div>


	</div> {{-- end of flex container --}}


@endsection
