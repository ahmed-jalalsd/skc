@extends('layouts.manage')

@section('content')
  <div class="flex-container">
    <div class="columns m-t-10 m-b-0">
      <div class="column">
        <h1 class="title is-admin is-4">{{$event->title}} Winners</h1>
      </div>
    </div>

    <hr class="m-t-0">


    <div class="box">
      <article class="media">

        <div class="media-content">

          <div class="content">
            <nav class="level is-mobile">
              <div class="level-left">

                <div class="link-wrapper">
                  <b-collapse :open="false">
                     <button class="level-item button is-primary  backend-btn" slot="trigger">Best Of Class</button>
                     <div class="notification">
                         <div class="content">
                           <nav class="level is-mobile">
                             <div class="link-wrapper">
                               <a href="#" class="level-item baby">puppy/baby</a>
                             </div>
                             <a href="#" class="level-item junior">junior</a>
                             <a href="#" class="level-item intermediate" >intermediate</a>
                             <a href="#" class="level-item open-class">open</a>
                             <a href="#" class="level-item champion">champion</a>
                             <a href="#" class="level-item working">working</a>
                             <a href="#" class="level-item veteran">veteran</a>
                           </nav>
                         </div>
                     </div>
                 </b-collapse>
                </div>

                <div class="link-wrapper">
                  <a href="#" class="level-item button is-primary  backend-btn best-dog">
                    Best Of Dogs
                  </a>
                </div>

                <div class="link-wrapper">
                  <a href="#" class="level-item button is-primary  backend-btn best-breed">
                    Best Of Breeds
                  </a>
                </div>

                <div class="link-wrapper">
                  <a href="javascript:void(0)" class="level-item button is-primary backend-btn best-in">
                    Best In Show
                  </a>
                </div>

              </div>

            </nav>

          </div>

        </div>

      </article>
    </div>

    <!-- Best In class  -->
    <div class="columns is-multiline">
      @foreach ($winners as $winner)
        @if($winner->showsEntries->dogs->sex == 'female' &&  $winner->showsEntries->dogs->classes->class == 'baby' or  $winner->showsEntries->dogs->classes->class == 'puppy')
          <div class="column is-two-fifths baby-show" style="display:none;">
            <div class="box">
              <article class="media">
                <div class="media-content">
                  <div class="content">
                    <h4 class="subtitle">The Best Female Puppy/Baby in <b> {{ ucfirst($winner->showsEntries->dogs->breeds->groups->group_name) }} </b> group </h4>
                    <h4 class="subtitle">Dog name: {{$winner->showsEntries->dogs->dog_name}}</h4>
                    <h4 class="subtitle"><b>Breed:</b> {{ ucfirst($winner->showsEntries->dogs->breeds->breed) }}</h4>
                    <h4 class="subtitle"><b>Owner:</b> {{ ucfirst($winner->showsEntries->dogs->users->name) }}</h4>
                    <p>
                      <b>Award:</b> @if($winner->award)
                       {{ ucfirst($winner->award) }}
                    @else
                       None
                    @endif
                  </p>

                  </div>
                </div>
              </article>
            </div>
          </div>
        @elseif($winner->showsEntries->dogs->sex == 'female' &&  $winner->showsEntries->dogs->classes->class == 'junior')
          <div class="column is-two-fifths junior-show" style="display:none;">
            <div class="box">
              <article class="media">
                <div class="media-content">
                  <div class="content">
                    <h4 class="subtitle">The Best Female Junior in <b> {{ ucfirst($winner->showsEntries->dogs->breeds->groups->group_name) }} </b> group </h4>
                    <h4 class="subtitle">Dog name: {{$winner->showsEntries->dogs->dog_name}}</h4>
                    <h4 class="subtitle"><b>Breed:</b> {{ ucfirst($winner->showsEntries->dogs->breeds->breed) }}</h4>
                    <h4 class="subtitle"><b>Owner:</b> {{ ucfirst($winner->showsEntries->dogs->users->name) }}</h4>
                    <p>
                      <b>Award:</b> @if($winner->award)
                       {{ ucfirst($winner->award) }}
                    @else
                       None
                    @endif
                  </p>

                  </div>
                </div>
              </article>
            </div>
          </div>
        @elseif($winner->showsEntries->dogs->sex == 'male' &&  $winner->showsEntries->dogs->classes->class == 'junior')
          <div class="column is-two-fifths junior-show" style="display:none;">
            <div class="box">
              <article class="media">
                <div class="media-content">
                  <div class="content">
                    <h4 class="subtitle">The Best Male Junior in <b> {{ ucfirst($winner->showsEntries->dogs->breeds->groups->group_name) }} </b> group </h4>
                    <h4 class="subtitle">Dog name: {{$winner->showsEntries->dogs->dog_name}}</h4>
                    <h4 class="subtitle"><b>Breed:</b> {{ ucfirst($winner->showsEntries->dogs->breeds->breed) }}</h4>
                    <h4 class="subtitle"><b>Owner:</b> {{ ucfirst($winner->showsEntries->dogs->users->name) }}</h4>
                    <p>
                      <b>Award:</b> @if($winner->award)
                       {{ ucfirst($winner->award) }}
                    @else
                       None
                    @endif
                  </p>

                  </div>
                </div>
              </article>
            </div>
          </div>

        @elseif($winner->showsEntries->dogs->sex == 'female' &&  $winner->showsEntries->dogs->classes->class == 'intermediate')
          <div class="column is-two-fifths intermediate-show" style="display:none;">
            <div class="box">
              <article class="media">
                <div class="media-content">
                  <div class="content">
                    <h4 class="subtitle">The Best Intermediate Female in <b> {{ ucfirst($winner->showsEntries->dogs->breeds->groups->group_name) }} </b> group </h4>
                    <h4 class="subtitle">Dog name: {{$winner->showsEntries->dogs->dog_name}}</h4>
                    <h4 class="subtitle"><b>Breed:</b> {{ ucfirst($winner->showsEntries->dogs->breeds->breed) }}</h4>
                    <h4 class="subtitle"><b>Owner:</b> {{ ucfirst($winner->showsEntries->dogs->users->name) }}</h4>
                    <p>
                      <b>Award:</b> @if($winner->award)
                       {{ ucfirst($winner->award) }}
                    @else
                       None
                    @endif
                  </p>

                  </div>
                </div>
              </article>
            </div>
          </div>
        @elseif($winner->showsEntries->dogs->sex == 'male' &&  $winner->showsEntries->dogs->classes->class == 'intermediate')
          <div class="column is-two-fifths intermediate-show" style="display:none;">
            <div class="box">
              <article class="media">
                <div class="media-content">
                  <div class="content">
                    <h4 class="subtitle">The Best Intermediate Male  in <b> {{ ucfirst($winner->showsEntries->dogs->breeds->groups->group_name) }} </b> group </h4>
                    <h4 class="subtitle">Dog name: {{$winner->showsEntries->dogs->dog_name}}</h4>
                    <h4 class="subtitle"><b>Breed:</b> {{ ucfirst($winner->showsEntries->dogs->breeds->breed) }}</h4>
                    <h4 class="subtitle"><b>Owner:</b> {{ ucfirst($winner->showsEntries->dogs->users->name) }}</h4>
                    <p>
                      <b>Award:</b> @if($winner->award)
                       {{ ucfirst($winner->award) }}
                    @else
                       None
                    @endif
                  </p>

                  </div>
                </div>
              </article>
            </div>
          </div>

        @elseif($winner->showsEntries->dogs->sex == 'female' &&  $winner->showsEntries->dogs->classes->class == 'open')
          <div class="column is-two-fifths open-class-show" style="display:none;">
            <div class="box">
              <article class="media">
                <div class="media-content">
                  <div class="content">
                    <h4 class="subtitle">The Best Female  in Open class in <b> {{ ucfirst($winner->showsEntries->dogs->breeds->groups->group_name) }} </b> group </h4>
                    <h4 class="subtitle">Dog name: {{$winner->showsEntries->dogs->dog_name}}</h4>
                    <h4 class="subtitle"><b>Breed:</b> {{ ucfirst($winner->showsEntries->dogs->breeds->breed) }}</h4>
                    <h4 class="subtitle"><b>Owner:</b> {{ ucfirst($winner->showsEntries->dogs->users->name) }}</h4>
                    <p>
                      <b>Award:</b> @if($winner->award)
                       {{ ucfirst($winner->award) }}
                    @else
                       None
                    @endif
                  </p>

                  </div>
                </div>
              </article>
            </div>
          </div>
        @elseif($winner->showsEntries->dogs->sex == 'male' &&  $winner->showsEntries->dogs->classes->class == 'open')
          <div class="column is-two-fifths open-class-show" style="display:none;">
            <div class="box">
              <article class="media">
                <div class="media-content">
                  <div class="content">
                    <h4 class="subtitle">The Best Male in Open class in <b> {{ ucfirst($winner->showsEntries->dogs->breeds->groups->group_name) }} </b> group </h4>
                    <h4 class="subtitle">Dog name: {{$winner->showsEntries->dogs->dog_name}}</h4>
                    <h4 class="subtitle"><b>Breed:</b> {{ ucfirst($winner->showsEntries->dogs->breeds->breed) }}</h4>
                    <h4 class="subtitle"><b>Owner:</b> {{ ucfirst($winner->showsEntries->dogs->users->name) }}</h4>
                    <p>
                      <b>Award:</b> @if($winner->award)
                       {{ ucfirst($winner->award) }}
                    @else
                       None
                    @endif
                  </p>

                  </div>
                </div>
              </article>
            </div>
          </div>

          @elseif($winner->showsEntries->dogs->sex == 'female' &&  $winner->showsEntries->dogs->classes->class == 'champion')
            <div class="column is-two-fifths champion-show" style="display:none;">
              <div class="box">
                <article class="media">
                  <div class="media-content">
                    <div class="content">
                      <h4 class="subtitle">The Best Female in champion class in <b> {{ ucfirst($winner->showsEntries->dogs->breeds->groups->group_name) }} </b> group </h4>
                      <h4 class="subtitle">Dog name: {{$winner->showsEntries->dogs->dog_name}}</h4>
                      <h4 class="subtitle"><b>Breed:</b> {{ ucfirst($winner->showsEntries->dogs->breeds->breed) }}</h4>
                      <h4 class="subtitle"><b>Owner:</b> {{ ucfirst($winner->showsEntries->dogs->users->name) }}</h4>
                      <p>
                        <b>Award:</b> @if($winner->award)
                         {{ ucfirst($winner->award) }}
                      @else
                         None
                      @endif
                    </p>

                    </div>
                  </div>
                </article>
              </div>
            </div>

          @elseif($winner->showsEntries->dogs->sex == 'male' &&  $winner->showsEntries->dogs->classes->class == 'champion')
            <div class="column is-two-fifths champion-show" style="display:none;">
              <div class="box">
                <article class="media">
                  <div class="media-content">
                    <div class="content">
                      <h4 class="subtitle">The Best Male in champion class in <b> {{ ucfirst($winner->showsEntries->dogs->breeds->groups->group_name) }} </b> group </h4>
                      <h4 class="subtitle">Dog name: {{$winner->showsEntries->dogs->dog_name}}</h4>
                      <h4 class="subtitle"><b>Breed:</b> {{ ucfirst($winner->showsEntries->dogs->breeds->breed) }}</h4>
                      <h4 class="subtitle"><b>Owner:</b> {{ ucfirst($winner->showsEntries->dogs->users->name) }}</h4>
                      <p>
                        <b>Award:</b> @if($winner->award)
                         {{ ucfirst($winner->award) }}
                      @else
                         None
                      @endif
                    </p>

                    </div>
                  </div>
                </article>
              </div>
            </div>

        @elseif($winner->showsEntries->dogs->sex == 'female' &&  $winner->showsEntries->dogs->classes->class == 'working')
          <div class="column is-two-fifths working-show" style="display:none;">
            <div class="box">
              <article class="media">
                <div class="media-content">
                  <div class="content">
                    <h4 class="subtitle">The Best Female in working class in <b> {{ ucfirst($winner->showsEntries->dogs->breeds->groups->group_name) }} </b> group </h4>
                    <h4 class="subtitle">Dog name: {{$winner->showsEntries->dogs->dog_name}}</h4>
                    <h4 class="subtitle"><b>Breed:</b> {{ ucfirst($winner->showsEntries->dogs->breeds->breed) }}</h4>
                    <h4 class="subtitle"><b>Owner:</b> {{ ucfirst($winner->showsEntries->dogs->users->name) }}</h4>
                    <p>
                      <b>Award:</b> @if($winner->award)
                       {{ ucfirst($winner->award) }}
                    @else
                       None
                    @endif
                  </p>

                  </div>
                </div>
              </article>
            </div>
          </div>

        @elseif($winner->showsEntries->dogs->sex == 'male' &&  $winner->showsEntries->dogs->classes->class == 'working')
          <div class="column is-two-fifths working-show" style="display:none;">
            <div class="box">
              <article class="media">
                <div class="media-content">
                  <div class="content">
                    <h4 class="subtitle">The Best Male in working class in <b> {{ ucfirst($winner->showsEntries->dogs->breeds->groups->group_name) }} </b> group </h4>
                    <h4 class="subtitle">Dog name: {{$winner->showsEntries->dogs->dog_name}}</h4>
                    <h4 class="subtitle"><b>Breed:</b> {{ ucfirst($winner->showsEntries->dogs->breeds->breed) }}</h4>
                    <h4 class="subtitle"><b>Owner:</b> {{ ucfirst($winner->showsEntries->dogs->users->name) }}</h4>
                    <p>
                      <b>Award:</b> @if($winner->award)
                       {{ ucfirst($winner->award) }}
                    @else
                       None
                    @endif
                  </p>

                  </div>
                </div>
              </article>
            </div>
          </div>

          @elseif($winner->showsEntries->dogs->sex == 'female' &&  $winner->showsEntries->dogs->classes->class == 'veteran')
            <div class="column is-two-fifths veteran-show" style="display:none;">
              <div class="box">
                <article class="media">
                  <div class="media-content">
                    <div class="content">
                      <h4 class="subtitle">The Best Female in veteran class in <b> {{ ucfirst($winner->showsEntries->dogs->breeds->groups->group_name) }} </b> group </h4>
                      <h4 class="subtitle">Dog name: {{$winner->showsEntries->dogs->dog_name}}</h4>
                      <h4 class="subtitle"><b>Breed:</b> {{ ucfirst($winner->showsEntries->dogs->breeds->breed) }}</h4>
                      <h4 class="subtitle"><b>Owner:</b> {{ ucfirst($winner->showsEntries->dogs->users->name) }}</h4>
                      <p>
                        <b>Award:</b> @if($winner->award)
                         {{ ucfirst($winner->award) }}
                      @else
                         None
                      @endif
                    </p>

                    </div>
                  </div>
                </article>
              </div>
            </div>

          @elseif($winner->showsEntries->dogs->sex == 'male' &&  $winner->showsEntries->dogs->classes->class == 'veteran')
            <div class="column is-two-fifths veteran-show" style="display:none;">
              <div class="box">
                <article class="media">
                  <div class="media-content">
                    <div class="content">
                      <h4 class="subtitle">The Best Male in veteran class in <b> {{ ucfirst($winner->showsEntries->dogs->breeds->groups->group_name) }} </b> group </h4>
                      <h4 class="subtitle">Dog name: {{$winner->showsEntries->dogs->dog_name}}</h4>
                      <h4 class="subtitle"><b>Breed:</b> {{ ucfirst($winner->showsEntries->dogs->breeds->breed) }}</h4>
                      <h4 class="subtitle"><b>Owner:</b> {{ ucfirst($winner->showsEntries->dogs->users->name) }}</h4>
                      <p>
                        <b>Award:</b> @if($winner->award)
                         {{ ucfirst($winner->award) }}
                      @else
                         None
                      @endif
                    </p>

                    </div>
                  </div>
                </article>
              </div>
            </div>
        @endif
      @endforeach
    </div>
    <!-- Best In Class  -->

    <!-- Best Dogs  -->
    <div class="columns is-multiline">
      @foreach ($bestOfDogs as $bestOfDog)
      <div class="column is-two-fifths best-dog-show" style="display:none;">
        <div class="box">
          <article class="media">
            <div class="media-content">
              <div class="content">
                <h4 class="subtitle">The Best Of Dogs
                <h4 class="subtitle"><b>Dog name:</b> {{ucfirst($bestOfDog->showsEntries->dogs->dog_name)}}</h4>
                <h4 class="subtitle"><b>Group:</b> {{ ucfirst($bestOfDog->showsEntries->dogs->breeds->groups->group_name) }}</h4>
                <h4 class="subtitle"><b>Breed:</b> {{ ucfirst($bestOfDog->showsEntries->dogs->breeds->breed) }}</h4>
                <h4 class="subtitle"><b>Sex:</b> {{ ucfirst($bestOfDog->showsEntries->dogs->sex) }}</h4>
                <h4 class="subtitle"><b>Class:</b> {{ ucfirst($bestOfDog->showsEntries->dogs->classes->class) }}</h4>
                <h4 class="subtitle"><b>Owner:</b> {{ ucfirst($bestOfDog->showsEntries->dogs->users->name) }}</h4>
                <p>
                  <b>Award:</b> @if($bestOfDog->award)
                   {{ ucfirst($bestOfDog->award) }}
                @else
                   None
                @endif
              </p>

              </div>
            </div>
          </article>
        </div>
      </div>
      @endforeach
    </div>
    <!-- Best Dogs  -->

    <!-- Best Breed  -->
    <div class="columns is-multiline">
      @foreach ($bestOfBreeds as $bestOfBreed)
      <div class="column is-two-fifths best-breed-show" style="display:none;">
        <div class="box">
          <article class="media">
            <div class="media-content">
              <div class="content">
                <h4 class="subtitle">The Best Of Breeds
                <h4 class="subtitle"><b>Dog name:</b> {{ucfirst($bestOfBreed->showsEntries->dogs->dog_name)}}</h4>
                <h4 class="subtitle"><b>Group:</b> {{ ucfirst($bestOfBreed->showsEntries->dogs->breeds->groups->group_name) }}</h4>
                <h4 class="subtitle"><b>Breed:</b> {{ ucfirst($bestOfBreed->showsEntries->dogs->breeds->breed) }}</h4>
                <h4 class="subtitle"><b>Sex:</b> {{ ucfirst($bestOfBreed->showsEntries->dogs->sex) }}</h4>
                <h4 class="subtitle"><b>Class:</b> {{ ucfirst($bestOfBreed->showsEntries->dogs->classes->class) }}</h4>
                <h4 class="subtitle"><b>Owner:</b> {{ ucfirst($bestOfBreed->showsEntries->dogs->users->name) }}</h4>
                <p>
                  <b>Award:</b> @if($bestOfBreed->award)
                   {{ ucfirst($bestOfBreed->award) }}
                @else
                   None
                @endif
              </p>

              </div>
            </div>
          </article>
        </div>
      </div>
      @endforeach
    </div>
    <!-- Best Breed  -->

    <!-- Best In Show  -->
    <div class="columns is-multiline">
      @foreach ($bestOfShow as $best)
      <div class="column is-two-fifths best-in-show" style="display:none;">
        <div class="box">
          <article class="media">
            <div class="media-content">
              <div class="content">
                <h4 class="subtitle">The Best Of Show
                <h4 class="subtitle"><b>Dog name:</b> {{ucfirst($best->showsEntries->dogs->dog_name)}}</h4>
                <h4 class="subtitle"><b>Group:</b> {{ ucfirst($best->showsEntries->dogs->breeds->groups->group_name) }}</h4>
                <h4 class="subtitle"><b>Breed:</b> {{ ucfirst($best->showsEntries->dogs->breeds->breed) }}</h4>
                <h4 class="subtitle"><b>Sex:</b> {{ ucfirst($best->showsEntries->dogs->sex) }}</h4>
                <h4 class="subtitle"><b>Class:</b> {{ ucfirst($best->showsEntries->dogs->classes->class) }}</h4>
                <h4 class="subtitle"><b>Owner:</b> {{ ucfirst($best->showsEntries->dogs->users->name) }}</h4>
                <p>
                  <b>Award:</b> @if($best->award)
                   {{ ucfirst($best->award) }}
                @else
                   None
                @endif
              </p>

              </div>
            </div>
          </article>
        </div>
      </div>
      @endforeach
    </div>
    <!-- Best In show  -->

  </div><!-- End of .flex-container -->
@endsection

@section('scripts')

  <script>
    var app = new Vue({
      el: '#app',
      data: {
        isSelected: false,
      },
    });
  </script>

  <script type="text/javascript">
    $(document).ready(function() {
        $('.baby').click(function() {
                $('.baby-show').slideToggle("fast");
        });
    });
    $(document).ready(function() {
        $('.junior').click(function() {
                $('.junior-show').slideToggle("fast");
        });
    });
    $(document).ready(function() {
        $('.intermediate').click(function() {
                $('.intermediate-show').slideToggle("fast");
        });
    });
    $(document).ready(function() {
        $('.open-class').click(function() {
                $('.open-class-show').slideToggle("fast");
        });
    });
    $(document).ready(function() {
        $('.champion').click(function() {
                $('.champion-show').slideToggle("fast");
        });
    });

    $(document).ready(function() {
        $('.working').click(function() {
                $('.working-show').slideToggle("fast");
        });
    });
    $(document).ready(function() {
        $('.veteran').click(function() {
                $('.veteran-show').slideToggle("fast");
        });
    });

    $(document).ready(function() {
        $('.best-dog').click(function() {
                $('.best-dog-show').slideToggle("fast");
        });
    });

    $(document).ready(function() {
        $('.best-breed').click(function() {
                $('.best-breed-show').slideToggle("fast");
        });
    });

    $(document).ready(function() {
        $('.best-in').click(function() {
                $('.best-in-show').slideToggle("fast");
        });
    });
  </script>
@endsection
