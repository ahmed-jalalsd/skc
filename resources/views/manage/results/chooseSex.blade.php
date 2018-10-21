@extends('layouts.manage')

@section('content')
  <div class="flex-container">
    <div class="columns m-t-10 m-b-0">
      <div class="column">
        <h1 class="title is-admin is-4">Choose a Sex</h1>
      </div>
    </div>

    <hr class="m-t-0">

    <div class="box">

          <article class="media">

            <div class="media-content">

              <div class="content">

                <form action="{{route('results.secondRound')}}" method="GET">
            			{{ csrf_field() }}

                  <input type="hidden" name="event_id" value="{{$eventId}}">
                  <input type="hidden" name="group_id" value="{{$groupId}}">

                  <div class="block ">
                    <div class="block">
                      <h5 class="is-4">Choose Sex</h5>
                    </div>
                      <b-radio-group v-model="radio">
                        <b-radio  name="sex"
                            native-value="male">
                            Male
                        </b-radio>
                        <b-radio  name="sex"
                            native-value="female">
                            Female
                        </b-radio>
                     </b-radio-group>
                  </div> {{-- end of block --}}
                  <div class="primary-action-button">
                    <button class="button is-primary backend-btn">See the dogs</button>
                  </div>
                </form>

              </div>

            </div>

          </article>

    </div>

  </div><!-- End of .flex-container -->
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
