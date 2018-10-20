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

      <div class="column">
        <h3 class="title is-admin is-4">Classification</h3>
      </div>

      <div class="column">
        <div class="block">
            <b-radio v-model="radio"
                native-value="1">
                I
            </b-radio>
            <b-radio v-model="radio"
                native-value="2">
                II
            </b-radio>
            <b-radio v-model="radio"
                native-value="3">
                III
            </b-radio>
            <b-radio v-model="radio"
                native-value="4">
                IV
            </b-radio>
        </div> {{-- end of block --}}

        <hr style="background-color: #ccc; height: 1px" class="m-t-0">

        <div class="block">
           <div class="field">
               <b-radio v-model="radio"
                   native-value="excellent">
                   Excellent
               </b-radio>
           </div>
           <div class="field">
               <b-radio v-model="radio"
                   native-value="vgood">
                   Ver good
               </b-radio>
           </div>
           <div class="field">
               <b-radio v-model="radio"
                   native-value="good">
                   Good
               </b-radio>
           </div>
           <div class="field">
               <b-radio v-model="radio"
                   native-value="sufficient">
                   Sufficient
               </b-radio>
           </div>
           <div class="field">
               <b-radio v-model="radio"
                   native-value="insufficient">
                   Insufficient
               </b-radio>
           </div>
           <div class="field">
               <b-radio v-model="radio"
                   native-value="disqualified"
                   type="is-warning">
                   Disqualified
               </b-radio>
           </div>
           <div class="field">
               <b-radio v-model="radio"
                   native-value="failed"
                   type="is-danger">
                   Can't be judge
               </b-radio>
           </div>
         </div> {{-- end of block --}}

      </div>{{-- end of column --}}

      <div class="column">

      </div>

    </form>
</div>
@endsection

@section('scripts')
  <script>

  var app = new Vue({
    el: '#app',
    data: {
      radio: ''
    }
  });
  </script>
@endsection
