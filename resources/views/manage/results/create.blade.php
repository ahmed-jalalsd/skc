@extends('layouts.manage')

@section('content')
  <div class="flex-container">
    <div class="columns m-t-10 m-b-0">
      <div class="column">
        <h1 class="title is-admin is-4">{{$dogInfo->events->title}}</h1>
      </div>
    </div>

    <hr class="m-t-0">

    <table class="table is-bordered is-striped is-narrow is-hoverable is-fullwidth">
      <tr>
        <th>Breed</th>
        <td>{{$dogInfo->dogs->breeds->breed}}</td>
      </tr>
      <tr>
        <th>Date of birth</th>
        <td>{{$dogInfo->dogs->date_of_birth}}</td>
      </tr>
      <tr>
        <th>Sex</th>
        <td>{{$dogInfo->dogs->sex}}</td>
      </tr>
      <tr>
        <th>Class</th>
        <td>{{$dogInfo->classes->class}}</td>
      </tr>
      <tr>
        <th>Owner</th>
        <td>{{$dogInfo->dogs->owner}}</td>
      </tr>
    </table>

    <hr style="background-color: #ccc; height: 1px" class="m-t-0">

		<form action="{{route('results.store')}}" method="POST">
			{{ csrf_field() }}

      <div class="columns">

        <div class="column is-half ">
            <div class="block">
              <h3 class="title is-admin is-4">Classification</h3>
            </div>
            <div class="block">
                <b-radio-group v-model="radio">
                  <b-radio  name="order"
                      native-value="1">
                      I
                  </b-radio>
                  <b-radio  name="order"
                      native-value="2">
                      II
                  </b-radio>
                  <b-radio  name="order"
                      native-value="3">
                      III
                  </b-radio>
                  <b-radio  name="order"
                      native-value="4">
                      IV
                  </b-radio>
               </b-radio-group>
            </div> {{-- end of block --}}

            <hr style="background-color: #ccc; height: 1px" class="m-t-0">

            <div class="block">
              <b-radio-group v-model="radio">
                 <div class="field">
                     <b-radio  name="classification"
                         native-value="excellent">
                         Excellent
                     </b-radio>
                 </div>
                 <div class="field">
                     <b-radio name="classification"
                         native-value="very good">
                         Ver good
                     </b-radio>
                 </div>
                 <div class="field">
                     <b-radio  name="classification"
                         native-value="good">
                         Good
                     </b-radio>
                 </div>
                 <div class="field">
                     <b-radio  name="classification"
                         native-value="sufficient">
                         Sufficient
                     </b-radio>
                 </div>
                 <div class="field">
                     <b-radio  name="classification"
                         native-value="insufficient">
                         Insufficient
                     </b-radio>
                 </div>
                 <div class="field">
                     <b-radio  name="classification"
                         native-value="disqualified"
                         type="is-warning">
                         Disqualified
                     </b-radio>
                 </div>
                  <div class="field">
                     <b-radio name="classification"
                         native-value="failed"
                         type="is-danger">
                         Can't be judge
                     </b-radio>
                 </div>
               </b-radio-group>
             </div> {{-- end of block --}}

        </div>{{-- end of column --}}

        <div class="column is-half">
          @if(($dogInfo->classes->class == "baby") || ($dogInfo->classes->class == "puppy"))
          <div class="block">
            <h3 class="title is-admin is-4">Baby/Puppy</h3>
          </div>
          <div class="block">
            <b-radio-group v-model="radio">
              <b-radio name="puppy_award"
                  native-value="very promising">
                  Very Promising
              </b-radio>
              <b-radio name="puppy_award"
                  native-value="promising">
                  Promising
              </b-radio>
              <b-radio name="puppy_award"
                  native-value="unpromising">
                  Unpromising
              </b-radio>
            </b-radio-group>
          </div> {{-- end of block --}}
          @elseif($dogInfo->classes->class == "junior")
          <div class="block">
            <h3 class="title is-admin is-4">Junior</h3>
          </div>
          <div class="block">
            <b-radio-group v-model="radio">
              <b-radio name="junior_award"
                  native-value="jcac">
                  J.CAC
              </b-radio>
              <b-radio name="junior_award"
                  native-value="rjcac">
                  RJ.CAC
              </b-radio>
            </b-radio-group>
          </div> {{-- end of block --}}

          @else
            <div class="block">
              <h3 class="title is-admin is-4">Adult</h3>
            </div>
            <div class="block">
              <b-radio-group v-model="radio">
                <div class="field">
                  <b-radio name="adult_award"
                      native-value="cac">
                      CAC
                  </b-radio>
                </div>
                <div class="field">
                  <b-radio name="adult_award"
                      native-value="rcac">
                      R.CAC
                  </b-radio>
                </div>
                <div class="field">
                  <b-radio name="adult_award"
                      native-value="cacib">
                      CACIB
                  </b-radio>
                  <b-radio name="adult_award"
                      native-value="rcacib">
                      R.CACIB
                  </b-radio>
                </div>
              </b-radio-group>
            </div> {{-- end of block --}}
          @endif
        </div>

    </div> {{-- end of columns --}}

    <div class="primary-action-button">
      <button class="button is-primary  backend-btn">Apply</button>
    </div>

    </form>
</div>
@endsection

@section('scripts')
  <script>

  var app = new Vue({
    el: '#app',
    data: {
      radio: '',
    }
  });
  </script>
@endsection
