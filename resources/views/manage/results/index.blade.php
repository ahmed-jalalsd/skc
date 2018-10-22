@extends('layouts.manage')

@section('content')
  <div class="flex-container">
    <div class="columns m-t-10 m-b-0">
      <div class="column">
        <h1 class="title is-admin is-4">All Groups in {{$event->title}} Show</h1>
        <a href="{{route('results.finalRound', [$event->id ])}}" class="level-item" aria-label="reply">
          <span class="icon is-medium">
            <i class="fas fa-reply" aria-hidden="true"></i>
          </span>
          Final Round
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
                    <a href="{{route('results.classes', [$group->event_id, $group->group_id ])}}" class="level-item" aria-label="reply">
                      <span class="icon is-medium">
                        <i class="fas fa-reply" aria-hidden="true"></i>
                      </span>
                      First Round
                    </a>

                    <a href="{{route('results.chooseSex', [$group->event_id, $group->group_id ])}}" class="level-item" aria-label="reply">
                      <span class="icon is-medium">
                        <i class="fas fa-reply" aria-hidden="true"></i>
                      </span>
                      Second Round
                    </a>

                    <a href="{{route('results.thirdRound', [$group->event_id, $group->group_id ])}}" class="level-item" aria-label="reply">
                      <span class="icon is-medium">
                        <i class="fas fa-reply" aria-hidden="true"></i>
                      </span>
                      Third Round
                    </a>

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
@endsection
