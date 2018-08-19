@extends('layouts.manage')

@section('content')

	<div class="flex-container">

		<div class="columns m-t-10">
			<div class="column">
				<h1 class="title">Add Dog</h1>
			</div>
		</div>


		<hr style="background-color: #ccc; height: 1px" class="m-t-0">

		<form action="{{route('dogs.update', $dog->id)}}" method="POST" enctype="multipart/form-data">
      {{method_field('PUT')}}
      {{csrf_field()}}

			<div class="columns">

				<div class="column">

          <div class="field is-horizontal">

            <div class="field-body">

              <div class="field">
                <label for="age" class="label">Age</label>
                  <div class="select is-fullwidth">
                    <select name="age">
                      <option value="{{$dog->age}}">{{$dog->age}}</option>
                      <option value="baby">Baby 3-6 months</option>
                      <option value="puppy">Puppy 6-9 months</option>
                      <option value="junior">Junior 9-18 months</option>
                      <option value="intermediate">Intermediate 15-24 months</option>
                      <option value="open">Open from 15 months</option>
                      <option value="champion">Champion</option>
                      <option value="working">Working</option>
                      <option value="veteran">Veteran from 8 years</option>
                    </select>
                  </div>
              </div>
            </div>

          </div>

          <div class="field is-horizontal">
            <div class="field-body">
              <div class="field">
                <label for="breed" class="label">Breed</label>
                <p class="control is-expanded ">
                  <input class="input" type="text" placeholder="German Shepherd" name="breed" value="{{$dog->breed}}">
                </p>
              </div>

              <div class="field">
                <label for="color" class="label">Color</label>
                <p class="control is-expanded ">
                  <input class="input" type="text" placeholder="Color" name="color" value="{{$dog->color}}">
                </p>
              </div>
            </div>
          </div>

          <div class="field is-horizontal">
            <div class="field-body">
              <div class="field">
                <label for="dog_name" class="label">Dog Name</label>
                <p class="control is-expanded ">
                  <input class="input" type="text" placeholder="name" name="dog_name" value="{{$dog->dog_name}}">
                </p>
              </div>

              <div class="field">
                <label for="pedigree_no" class="label">Pedigree NO.</label>
                <p class="control is-expanded ">
                  <input class="input" type="text" placeholder="P0676HJ" name="pedigree_no" value="{{$dog->pedigree_no}}">
                </p>
              </div>
            </div>
          </div>

          <div class="field is-horizontal">

            <div class="field-body">
              <div class="field">
                <label for="hair_type" class="label">Hair type</label>
                  <div class="select  is-fullwidth">
                    <select name="hair_type">
                      <option value="{{$dog->hair_type}}">{{$dog->hair_type}}</option>
                      <option value="long">Long</option>
                      <option value="short">Short</option>
                      <option value="silky">Silky</option>
                    </select>
                  </div>
              </div>

              <div class="field">
                <label for="date_of_birth" class="label">Birth Date</label>
                <p class="control is-expanded ">
                  <input id="datepickerDemo" class="input" type="date" name="date_of_birth" value="{{$dog->date_of_birth}}">
                </p>
              </div>
            </div>

          </div>

          <div class="field is-horizontal">

            <div class="field-body">

              <div class="field">
                <label for="microchip_no" class="label">Microchip NO.</label>
                <p class="control is-expanded ">
                  <input class="input" type="text" value="{{$dog->microchip_no}}" name="microchip_no">
                </p>
              </div>

              <div class="field">
                <label for="tattoo" class="label">Tattoo</label>
                <p class="control is-expanded ">
                  <input class="input" type="text" value="{{$dog->tatto}}" name="tattoo">
                </p>
              </div>

              <div class="field">
                <label for="sex" class="label">Sex</label>
                  <div class="select  is-fullwidth control is-expanded">
                    <select name="sex">
                      <option value="{{$dog->sex}}">{{$dog->sex}}</option>
                      <option value="male">Male</option>
                      <option value="female">Female</option>
                    </select>
                  </div>
              </div>

            </div>

          </div>

          <div class="field is-horizontal">
            <div class="field-body">
              <div class="field">
                <label for="sir" class="label">Sir</label>
                <p class="control is-expanded">
                  <input class="input" type="text" value="{{$dog->sir}}" name="sir">
                </p>
              </div>

              <div class="field">
                <label for="sir_pedigree_no" class="label">Sir Pedigree NO.</label>
                <p class="control is-expanded ">
                  <input class="input" type="text" value="{{$dog->sir_pedigree_no}}" name="sir_pedigree_no">
                </p>
              </div>
            </div>
          </div>

          <div class="field is-horizontal">
            <div class="field-body">
              <div class="field">
                <label for="dam" class="label">Dam</label>
                <p class="control is-expanded">
                  <input class="input" type="text" value="{{$dog->dam}}" name="dam">
                </p>
              </div>

              <div class="field">
                <label for="dam_pedigree_no" class="label">Dam Pedigree NO.</label>
                <p class="control is-expanded ">
                  <input class="input" type="text" value="{{$dog->dam_pedigree_no}}" name="dam_pedigree_no">
                </p>
              </div>
            </div>
          </div>

          <div class="field">
            <label for="breeder" class="label">Breeder</label>
            <p class="control">
              <input type="text" class="input" name="breeder" id="breeder" value="{{$dog->breeder}}">
            </p>
          </div>

          <div class="field">
            <label for="owner" class="label">Owner</label>
            <p class="control">
              <input type="text" class="input" name="owner" id="owner" value="{{$dog->owner}}">
            </p>
          </div>

          <div class="field">
            <label for="owner_address" class="label">Owner Address</label>
            <p class="control">
              <input type="text" class="input" name="owner_address" id="owner_address" value="{{$dog->owner_address}}">
            </p>
          </div>

          <div class="field is-horizontal">
            <div class="field-body">

              <div class="field is-expanded">
                <label for="phone_number" class="label">Phone NO.</label>
                <div class="field has-addons">
                  <p class="control">
                    <a class="button is-static">
                      +249
                    </a>
                  </p>
                  <p class="control is-expanded">
                    <input class="input" type="tel" value="{{$dog->phone_number}}" name="phone_number">
                  </p>
                </div>
                <p class="help">Do not enter the first zero</p>
              </div>

              <div class="field">
  							<label for="email" class="label">Email</label>
  							<p class="control">
  								<input type="email" class="input" name="email" id="email" value="{{$dog->email}}">
  							</p>
  						</div>

            </div>
          </div>

          <div class="block m-t-40">
            <p class="subtitle"> Add Dog's photos:</p>
            <multi-drag-drop></multi-drag-drop>
          </div>

				</div> {{-- end of column --}}


			</div> {{-- end of columns for forms --}}

			<div class="columns">
        <div class="column">
          <hr  class="m-t-0" style="background-color: #ccc; height: 1px; ">
          <button class="button is-primary is-pulled-right" style="width: 250px;">Update a Dog</button>
        </div>
  		</div>

		</form>

	</div> {{-- end of flex container --}}


@endsection

@section('scripts')
  <script>
    var app = new Vue({
      el: '#app',
      data: {}
    });
  </script>
@endsection
