@extends('layouts.manage')

@section('content')
  <div class="flex-container">
    <div class="columns m-t-10 m-b-0">
      <div class="column">
        <h1 class="title is-admin is-4">All Groups in {{$event->title}} Show</h1>
      </div>
    </div>

    <hr class="m-t-0">

    <div class="box">
      @if($classesInShow)
        @foreach ($classesInShow as $class)
          <article class="media">

            <div class="media-content">

              <div class="content">

                <p>
                  <strong>{{ucfirst($class->classes->class)}} </strong>
                </p>
                <form action="{{route('results.participate')}}" method="GET">
            			{{ csrf_field() }}

                  <input type="hidden" name="show_id" value="{{$class->event_id}}">
                  <input type="hidden" name="group_id" value="{{$class->group_id}}">
                  <input type="hidden" name="class_id" value="{{$class->class_id}}">

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
                    <button class="button is-primary backend-btn">Judging area</button>
                  </div>
                </form>

              </div>

            </div>

          </article>
       @endforeach

       @else

         <article class="media">

           <div class="media-content">

             <div class="content">

               <p>
                 <strong>Nothing to see</strong>
               </p>

             </div>

           </div>

         </article>

       @endif

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
