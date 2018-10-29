@extends('layouts.manage')

@section('content')
  <div class="flex-container" id="result-app">
    <div class="columns m-t-10 m-b-0">
      <div class="column is-7">
        <h1 class="title is-admin is-4">All Groups in {{$event->title}} Show</h1>
      </div>
      <div class="column is-2">
        <a href="{{route('results.finalRound', [$event->id ])}}" class="level-item button is-primary backend-btn" aria-label="reply">
          Final Round
        </a>
        <a href="#"  class="level-item" @click="finalRoundResult = true">
          See results
        </a>
      </div>
    </div>

    <hr class="m-t-0">

    <div class="box">
      @if($groupsInShow)
        @foreach ($groupsInShow as $group)
          <article class="media">

            <div class="media-content">

              <div class="content">

                <p>
                  <strong>{{ucfirst($group->groups->group)}} | <small> {{ucfirst($group->groups->group_name)}}</small> </strong>
                </p>
                <nav class="level is-mobile">
                  <div class="level-left">
                    <div class="link-wrapper">
                      <a href="{{route('results.classes', [$group->event_id, $group->group_id ])}}" class="level-item button is-primary  backend-btn" >
                        Vote First Round
                      </a>

                      <a href="#"  class="level-item" @click="isCardModalActive = true">
                        See results
                      </a>

                    </div>

                    <div class="link-wrapper">
                      @if($countFirstRound > 0)
                        <a href="{{route('results.chooseSex', [$group->event_id, $group->group_id ])}}" class="level-item button is-primary  backend-btn" aria-label="reply">
                          Vote Second Round
                        </a>
                      @else
                        <span></span>
                      @endif

                      <a href="#" class="level-item" @click="secondRoundResult = true">
                        See results
                      </a>

                    </div>

                    <div class="link-wrapper">
                      @if($countSecondRound > 0)
                      <a href="{{route('results.thirdRound', [$group->event_id, $group->group_id ])}}" class="level-item button is-primary  backend-btn" aria-label="reply">
                        Vote Third Round
                      </a>
                      @else
                        <span></span>
                      @endif

                      <a href="javascript:void(0)" class="level-item" @click="thirdRoundResult = true">
                        See results
                      </a>

                    </div>

                  </div>

                </nav>

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

  <section class="first-round-result">

       <b-modal :active.sync="isCardModalActive" :width="640" scroll="keep">
           <div class="card">
             <!-- <p class="title is-3">Best Dogs Male and Femal in all the participated classes and groups</p> -->
             <div class="card-content">
               <p class="title is-4">Best Male Dog in each class in all of the groups</p>
             </div>

             @foreach ($firstRound as $firstRoundWinner)
                @if($firstRoundWinner->showsEntries->dogs->sex == 'male')
                 <div class="card-content">
                     <div class="media">
                         <div class="media-content">

                             <p class="title is-5"><b>Class:</b> {{ ucfirst($firstRoundWinner->showsEntries->dogs->classes->class) }} </p>
                             <p class="title is-5"><b>Group:</b> {{ ucfirst($firstRoundWinner->showsEntries->dogs->breeds->groups->group_name) }}</p>
                             <p class="subtitle is-5"><b>Dog Name:</b> {{ ucfirst($firstRoundWinner->showsEntries->dogs->dog_name) }}</p>
                             <p class="subtitle is-5"><b>Classification:</b> {{ ucfirst($firstRoundWinner->classification) }}</p>
                             <p class="subtitle is-5"><b>Award:</b> @if($firstRoundWinner->award)
                                {{ ucfirst($firstRoundWinner->award) }}
                             @else
                                None
                             @endif</p>
                             <p class="subtitle is-5"><b>Breed:</b> {{ ucfirst($firstRoundWinner->showsEntries->dogs->breeds->breed) }}</p>
                         </div>
                     </div>

                     <div class="content">

                     </div>
                 </div>
                 @endif
            @endforeach

            <div class="card-content">
              <p class="title is-4">Best Female Dog in each class in all of the groups</p>
            </div>

            @foreach ($firstRound as $firstRoundWinner)
               @if($firstRoundWinner->showsEntries->dogs->sex == 'female')
                <div class="card-content">
                    <div class="media">
                        <div class="media-content">

                            <p class="title is-5"><b>Class:</b> {{ ucfirst($firstRoundWinner->showsEntries->dogs->classes->class) }} </p>
                            <p class="title is-5"><b>Group:</b> {{ ucfirst($firstRoundWinner->showsEntries->dogs->breeds->groups->group_name) }}</p>
                            <p class="subtitle is-5"><b>Dog Name:</b> {{ ucfirst($firstRoundWinner->showsEntries->dogs->dog_name) }}</p>
                            <p class="subtitle is-5"><b>Classification:</b> {{ ucfirst($firstRoundWinner->classification) }}</p>
                            <p class="subtitle is-5"><b>Award:</b> @if($firstRoundWinner->award)
                               {{ ucfirst($firstRoundWinner->award) }}
                            @else
                               None
                            @endif</p>
                            <p class="subtitle is-5"><b>Breed:</b> {{ ucfirst($firstRoundWinner->showsEntries->dogs->breeds->breed) }}</p>
                        </div>
                    </div>

                    <div class="content">

                    </div>
                </div>
                @endif
           @endforeach

           </div>
       </b-modal>
   </section>

   <section class="second-round-result">

        <b-modal :active.sync="secondRoundResult" :width="640" scroll="keep">
            <div class="card">
              <div class="card-content">
                <p class="title is-2">Best Of Dog</p>
              </div>
              @foreach ($secondRound as $secondRoundWinner)
                  <div class="card-content">
                      <div class="media">
                          <div class="media-content">
                              <p class="title is-4"> <b>Dog Name:</b> {{ ucfirst($secondRoundWinner->showsEntries->dogs->dog_name) }}</p>
                              <p class="subtitle is-5"><b>Classification:</b> {{ ucfirst($secondRoundWinner->classification) }}</p>
                              <p class="subtitle is-5"><b>Award:</b> {{ ucfirst($secondRoundWinner->award) }}</p>
                          </div>
                      </div>

                      <div class="content">
                          <p class="subtitle is-6"><b>Group:</b> {{ ucfirst($secondRoundWinner->showsEntries->dogs->breeds->groups->group_name) }}</p>
                          <p class="subtitle is-6"><b>Breed:</b> {{ ucfirst($secondRoundWinner->showsEntries->dogs->breeds->breed) }}</p>
                          <p class="subtitle is-6"><b>Sex:</b> {{ ucfirst($secondRoundWinner->showsEntries->dogs->sex) }}</p>
                          <p class="subtitle is-6"><b>Class:</b> {{ ucfirst($secondRoundWinner->showsEntries->dogs->classes->class) }}</p>
                      </div>
                  </div>
                 @endforeach
            </div>
        </b-modal>
    </section>

    <section class="third-round-result">

         <b-modal :active.sync="thirdRoundResult" :width="640" scroll="keep">
             <div class="card">
               <div class="card-content">
                 <p class="title is-2">Best Of Breed</p>
               </div>
               @foreach ($thirdRound as $thirdRoundWinner)
                   <div class="card-content">
                       <div class="media">
                           <div class="media-content">
                               <p class="title is-4"> <b>Dog Name:</b> {{ ucfirst($thirdRoundWinner->showsEntries->dogs->dog_name) }}</p>
                               <p class="subtitle is-5"><b>Classification:</b> {{ ucfirst($thirdRoundWinner->classification) }}</p>
                               <p class="subtitle is-5"><b>Award:</b> {{ ucfirst($thirdRoundWinner->award) }}</p>
                           </div>
                       </div>

                       <div class="content">
                           <p class="subtitle is-5"><b>Group:</b> {{ ucfirst($thirdRoundWinner->showsEntries->dogs->breeds->groups->group_name) }}</p>
                           <p class="subtitle is-5"><b>Breed:</b> {{ ucfirst($thirdRoundWinner->showsEntries->dogs->breeds->breed) }}</p>
                           <p class="subtitle is-5"><b>Sex:</b> {{ ucfirst($thirdRoundWinner->showsEntries->dogs->sex) }}</p>
                           <p class="subtitle is-5"><b>Class:</b> {{ ucfirst($thirdRoundWinner->showsEntries->dogs->classes->class) }}</p>
                       </div>
                   </div>
                  @endforeach
             </div>
         </b-modal>
     </section>

     <section class="final-round-result">

          <b-modal :active.sync="finalRoundResult" :width="640" scroll="keep">
              <div class="card">
                <div class="card-content">
                  <p class="title is-2"> Best In Show</p>
                </div>
                @foreach ($finalRound as $finalRoundWinner)
                    <div class="card-content">
                        <div class="media">
                            <div class="media-content">
                                <p class="title is-4"> <b>Dog Name:</b> {{ ucfirst($finalRoundWinner->showsEntries->dogs->dog_name) }}</p>
                                <p class="subtitle is-4"><b>Classification:</b> {{ ucfirst($finalRoundWinner->classification) }}</p>
                                <p class="subtitle is-4"><b>Award:</b> @if($firstRoundWinner->award)
                                   {{ ucfirst($firstRoundWinner->award) }}
                                @else
                                   None
                                @endif</p>
                            </div>
                        </div>

                        <div class="content">
                            <p class="subtitle is-4"><b>Group:</b> {{ ucfirst($finalRoundWinner->showsEntries->dogs->breeds->groups->group_name) }}</p>
                            <p class="subtitle is-4"><b>Breed:</b> {{ ucfirst($finalRoundWinner->showsEntries->dogs->breeds->breed) }}</p>
                            <p class="subtitle is-4"><b>Sex:</b> {{ ucfirst($finalRoundWinner->showsEntries->dogs->sex) }}</p>
                            <p class="subtitle is-4"><b>Class:</b> {{ ucfirst($finalRoundWinner->showsEntries->dogs->classes->class) }}</p>
                        </div>
                    </div>
                   @endforeach
              </div>
          </b-modal>
      </section>
@endsection

@section('scripts')

  <script>
    var app = new Vue({
      el: '#app',
      data: {
        isCardModalActive: false,
        secondRoundResult: false,
        thirdRoundResult: false,
        finalRoundResult: false,
      },
    });
  </script>
@endsection
