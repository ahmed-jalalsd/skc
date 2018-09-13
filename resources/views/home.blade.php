@extends('layouts.app')

@section('content')
    <section class="home">

        <div class="container">

          <div class="welcome"> <!-- Start of welcome div -->

              <!-- <div class="welcome__text">
                <h2 class="title">Welcome</h2>
                <p class="subitle">
                  Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do
                  eiusmod tempor incididunt ut labore et dolore magna aliqua.
                </p>
                <a href="{{route('register')}}" class="button">Register</a>
                <registration-modal></registration-modal>
              </div> -->

              <div class="welcome__image ">

                <div class="try-text">
                  <h2 class="title">Welcome</h2>
                  <p class="subitle">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do
                    eiusmod tempor incididunt ut labore et dolore magna aliqua.
                  </p>


                  <a  class="button js-modal-trigger skc-btn">Register</a>

                  <div class="modal">

                    <div class="modal-background"></div>

                    <div class="modal-content">

                      <form class="register-form" method="POST" action="{{ route('register') }}">

                          {{ csrf_field() }}

                          <div class="field is-horizontal">

                              <div class="field-label">
                                  <label class="label">Name</label>
                              </div>

                              <div class="field-body">
                                  <div class="field">
                                      <p class="control">
                                          <input class="input" id="name" type="name" name="name" value="{{ old('name') }}"
                                                 required autofocus>
                                      </p>

                                      @if ($errors->has('name'))
                                          <p class="help is-danger">
                                              {{ $errors->first('name') }}
                                          </p>
                                      @endif
                                  </div>
                              </div>
                          </div>

                          <div class="field is-horizontal">
                              <div class="field-label">
                                  <label class="label">E-mail </label>
                              </div>

                              <div class="field-body">
                                  <div class="field">
                                      <p class="control  has-icons-left has-icons-right">
                                          <input class="input" id="email" type="email" name="email"
                                                 value="{{ old('email') }}" required autofocus>

                                          <span class="icon is-small is-left">
                                            <i class="fas fa-envelope"></i>
                                         </span>

                                      </p>

                                      @if ($errors->has('email'))
                                          <p class="help is-danger">
                                              {{ $errors->first('email') }}
                                          </p>
                                      @endif
                                  </div>
                              </div>
                          </div>

                          <div class="field is-horizontal">
                              <div class="field-label">
                                  <label class="label">Password</label>
                              </div>

                              <div class="field-body">
                                  <div class="field">
                                      <p class="control  has-icons-left has-icons-right">
                                          <input class="input" id="password" type="password" name="password" required>
                                          <span class="icon is-small is-left">
                                            <i class="fas fa-lock"></i>
                                         </span>
                                      </p>

                                      @if ($errors->has('password'))
                                          <p class="help is-danger">
                                              {{ $errors->first('password') }}
                                          </p>
                                      @endif
                                  </div>
                              </div>
                          </div>

                          <div class="field is-horizontal">
                              <div class="field-label">
                                  <label class="label">Confirm Password</label>
                              </div>

                              <div class="field-body">
                                  <div class="field">
                                      <p class="control has-icons-left has-icons-right">
                                          <input class="input" id="password-confirm" type="password"
                                                 name="password_confirmation" required>

                                                 <span class="icon is-small is-left">
                                                   <i class="fas fa-lock"></i>
                                                </span>
                                      </p>
                                  </div>
                              </div>
                          </div>

                          <div class="field is-horizontal">
                            <div class="field-label">
                              <label class="label">Phone Number</label>
                            </div>
                            <div class="field-body">
                              <div class="field is-expanded">
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
                            </div>
                          </div>

                          <div class="field is-horizontal">
                              <div class="field-label">
                                  <label class="label">Address</label>
                              </div>

                              <div class="field-body">
                                  <div class="field">
                                      <p class="control has-icons-left has-icons-right">
                                          <input class="input" id="address" type="text"
                                          name="address">
                                                 <span class="icon is-small is-left">
                                                   <i class="fas fa-lock"></i>
                                                </span>
                                      </p>
                                  </div>
                              </div>
                          </div>

                          <div class="field is-horizontal">
                              <div class="field-label"></div>

                              <div class="field-body">
                                  <div class="field is-grouped">
                                      <div class="control">
                                          <button type="submit" class="button is-primary">Register</button>
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </form>

                    </div>
                    <button class="modal-close is-large" aria-label="close"></button>
                  </div>
                </div>

              </div>

              <div class="welcome__bkg">
                <div class="about">
                    <h1 class="title">about us</h1>

                    <div class=" columns about__box">
                      <div class=" about__text column">
                        <p>
                          Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do
                          eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut
                          enim ad minim veniam, quis nostrud exercitation ullamco laboris
                          nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in
                          reprehenderit in voluptate velit esse cillum dolore eu fugiat
                          nulla pariatur. Excepteur sint occaecat cupidatat non proident,
                          sunt in culpa qui officia deserunt mollit anim id est laborum.
                        </p>
                      </div>
                      <div class="about__image columns"></div>
                    </div>

                    <div class="columns about__bottom-box">
                      <div class="column bk-image"></div>
                      <div class="column">
                        <div class="text">
                          <p>
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do
                            eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut
                            enim ad minim veniam, quis nostrud exercitation ullamco laboris
                            nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in
                            reprehenderit in voluptate velit esse cillum dolore eu fugiat
                            nulla pariatur. Excepteur sint occaecat cupidatat non proident,
                            sunt in culpa qui officia deserunt mollit anim id est laborum.
                          </p>
                        </div>
                      </div>
                    </div>

                </div>
              </div>

              <div class="welcome__bkg-bottom"></div>

            </div> <!-- </div>  End of welcome div  -->

          </div> <!-- End of container div -->

    </section>

    <section class="events">
      <h1 class="title">Events</h1>



      <div class="tile is-ancestor">
          @foreach ($events as $event)
        <div class="tile is-parent">
          <figure class="image tile is-child">
      			<img src="{{ 'images/events/'.$event->featured_image }}" alt="Skc logo">
      			<figcaption>
      				<h3>{{$event->title}}</h3>
      			</figcaption>
            <a href="http://dribbble.com/shots/1115632-Camera"></a>
      		</figure>
        </div>
        @endforeach
      </div>


      <div class="events__btn has-text-centered">
        <a href="" class="button is-meduim skc-btn">More</a>
      </div>

    </section>

    <section class="news">

      <div class="column is-8 is-offset-2">

        @foreach ($fbPosts as $fbPost)
        <a href="{{ $fbPost['permalink_url']}}" target="_blank">
          <div class="card post">

            <div class="card-content">

              <div class="media">
                <div class="media-left">
                  <figure class="image is-48x48">
                    <img src="{{asset('images/skc-logo.png')}}" alt="Skc logo">
                  </figure>
                </div>
                <div class="media-content">
                  <p class="title article-title">{{ $fbPost['name']}}</p>
                  <div class="tags has-addons">
                      <!-- <span class="tag is-rounded is-info">@skeetskeet</span> -->
                      <span class="tag is-rounded">{{date('d-m-Y', strtotime($fbPost['created_time']))}}</span>
                  </div>
                </div>
              </div>

              <div class="card-image">
                <figure class="image is-4by3">
                  <img src="{{ $fbPost['full_picture']}}" alt="Placeholder image">
                </figure>
              </div>

            <div class="content article-body">
                <p>
                  {{ isset($fbPost['description']) ? str_limit($fbPost['description'], 240) : 'Default' }}
                </p>
            </div>
          </div>

          <!-- <footer class="card-footer">

            <div class="tags has-addons">
                <span class="tag"><i class="fas fa-share"></i></span>
                <span class="tag">
                  @isset($fbPost['shares'])
                    @foreach ($fbPost['shares'] as $share)
                      {{ $share }}
                    @endforeach
                  @endisset
                </span>
            </div>
          </footer> -->

        </div>
        </a>
        @endforeach

      </div>
    </section>

@endsection

@section('scripts')

  <script>
  const app = new Vue({
    el: '#app',
    });
  </script>

  <script>
  const menu = new Vue({
    el: '.menu',
    data:{
      isActive: false,
      open: false,
      current: false
    },
    computed:{
      compClass: function () {
        return {
          open: this.open,
          isActive: this.isActive
        }
      }
    }
  });
  </script>

  <script type="text/javascript">
  $(".js-modal-trigger").click(function() {
var targetModal = $(this).next('div');
$(targetModal).addClass("is-active");
});
$(".modal-background").click(function() {
$(".modal").removeClass("is-active");
});
$(".modal-close").click(function() {
$(".modal").removeClass("is-active");
});
  </script>
@endsection
