@extends('layouts.manage')

@section('content')

	<div class="flex-container">

		<div class="columns m-t-10">
			<div class="column">
				<h1 class="title">Add Dog</h1>
			</div>
		</div>


		<hr style="background-color: #ccc; height: 1px" class="m-t-0">

		<form action="{{route('dogs.store')}}" method="POST" enctype="multipart/form-data">
			{{ csrf_field() }}

			<div class="columns">

				<div class="column">

          <div class="field is-horizontal">

            <div class="field-body">

              <div class="field">
                <label for="class_id" class="label">Class</label>
                  <div class="select is-fullwidth">
                    <select name="class_id">
                      <option>Select dropdown</option>
											@foreach ($classes as $class)
	                      <option value="{{$class->id}}">{{$class->class}}</option>
											@endforeach
                    </select>
                  </div>
              </div>

            </div>

          </div>

          <div class="field is-horizontal">
            <div class="field-body">

              <div class="field">
                <label for="breed" class="label">Breed</label>
                <p class="control is-expanded select is-fullwidth">
									<select name="breed">
										<option>Select dropdown</option>
										@foreach ($breeds as $breed)
										<option value="{{$breed->id}}">{{$breed->breed}}</option>
										@endforeach
									</select>
                </p>
              </div>

              <div class="field">
                <label for="color" class="label">Color</label>
                <p class="control is-expanded ">
                  <input class="input" type="text" placeholder="Color" name="color">
                </p>
              </div>
            </div>
          </div>

          <div class="field is-horizontal">
            <div class="field-body">
              <div class="field">
                <label for="dog_name" class="label">Dog Name</label>
                <p class="control is-expanded ">
                  <input class="input" type="text" placeholder="name" name="dog_name">
                </p>
              </div>

              <div class="field">
                <label for="pedigree_no" class="label">Pedigree NO.</label>
                <p class="control is-expanded ">
                  <input class="input" type="text" placeholder="P0676HJ" name="pedigree_no">
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
                      <option>Select dropdown</option>
                      <option value="long">Long</option>
                      <option value="short">Short</option>
                      <option value="silky">Silky</option>
                    </select>
                  </div>
              </div>

              <div class="field">
                <label for="date_of_birth" class="label">Birth Date</label>
                <p class="control is-expanded ">
                  <input id="datepickerDemo" class="input" type="date" name="date_of_birth">
                </p>
              </div>
            </div>

          </div>

          <div class="field is-horizontal">

            <div class="field-body">

              <div class="field">
                <label for="microchip_no" class="label">Microchip NO.</label>
                <p class="control is-expanded ">
                  <input class="input" type="text" placeholder="012548633" name="microchip_no">
                </p>
              </div>

              <div class="field">
                <label for="tattoo" class="label">Tattoo</label>
                <p class="control is-expanded ">
                  <input class="input" type="text" placeholder="66" name="tattoo">
                </p>
              </div>

              <div class="field">
                <label for="sex" class="label">Sex</label>
                  <div class="select  is-fullwidth control is-expanded">
                    <select name="sex">
                      <option>Select dropdown</option>
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
                  <input class="input" type="text" placeholder="name of Sir" name="sir">
                </p>
              </div>

              <div class="field">
                <label for="sir_pedigree_no" class="label">Sir Pedigree NO.</label>
                <p class="control is-expanded ">
                  <input class="input" type="text" placeholder="P0676HJ" name="sir_pedigree_no">
                </p>
              </div>
            </div>
          </div>

          <div class="field is-horizontal">
            <div class="field-body">
              <div class="field">
                <label for="dam" class="label">Dam</label>
                <p class="control is-expanded">
                  <input class="input" type="text" placeholder="Name Of Dam" name="dam">
                </p>
              </div>

              <div class="field">
                <label for="dam_pedigree_no" class="label">Dam Pedigree NO.</label>
                <p class="control is-expanded ">
                  <input class="input" type="text" placeholder="P0676HJ" name="dam_pedigree_no">
                </p>
              </div>
            </div>
          </div>

          <div class="field">
            <label for="breeder" class="label">Breeder</label>
            <p class="control">
              <input type="text" class="input" name="breeder" id="breeder" placeholder="name of the breeder">
            </p>
          </div>

          <div class="field">
            <label for="owner" class="label">Owner</label>
            <p class="control">
              <input type="text" class="input" name="owner" id="owner" placeholder="name of the owner">
            </p>
          </div>

          <div class="field">
            <label for="owner_address" class="label">Owner Address</label>
            <p class="control">
              <input type="text" class="input" name="owner_address" id="owner_address" placeholder="owner address">
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
                    <input class="input" type="tel" placeholder="Your phone number" name="phone_number">
                  </p>
                </div>
                <p class="help">Do not enter the first zero</p>
              </div>

              <div class="field">
  							<label for="email" class="label">Email</label>
  							<p class="control">
  								<input type="email" class="input" name="email" id="email">
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
          <button class="button is-primary is-pulled-right backend-btn" style="width: 250px;">Add a Dog</button>
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
