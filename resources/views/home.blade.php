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


                  <a  class="button js-modal-trigger">Register</a>

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

        <div class="tile is-parent">
          <figure class="image tile is-child">
      			<img src="{{asset('images/pages/alone-animal-blurred-background-955463.jpg')}}" alt="Skc logo">
      			<figcaption>
      				<h3>National Show</h3>
      			</figcaption>
            <a href="http://dribbble.com/shots/1115632-Camera"></a>
      		</figure>
        </div>

        <div class="tile is-parent">
          <figure class="image tile is-child">
      			<img src="{{asset('images/pages/animal-collar-dog-8700.jpg')}}" alt="Skc logo">
      			<figcaption>
      				<h3>National Show</h3>
      			</figcaption>
            <a href="http://dribbble.com/shots/1115632-Camera"></a>
      		</figure>
        </div>

      </div>

      <div class="tile is-ancestor">

        <div class="tile is-parent">
          <figure class="image tile is-child">
      			<img src="{{asset('images/pages/hyunwon-jang-426093-unsplash.jpg')}}" alt="Skc logo">
      			<figcaption>
      				<h3>National Show</h3>
      			</figcaption>
            <a href="http://dribbble.com/shots/1115632-Camera"></a>
      		</figure>
        </div>

        <div class="tile  is-parent">
          <figure class="image tile is-child">
      			<img src="{{asset('images/pages/chris-benson-709433-unsplash.jpg')}}" alt="Skc logo">
      			<figcaption>
      				<h3>National Show</h3>
      			</figcaption>
            <a href="http://dribbble.com/shots/1115632-Camera"></a>
      		</figure>
        </div>

      </div>

      <div class="events__btn has-text-centered">
        <a href="" class="button is-meduim">More</a>
      </div>

    </section>

    <section class="news">

      <div class="column is-8 is-offset-2">

        <div class="card post">

          <div class="card-content">

            <div class="media">
                <div class="media-content has-text-centered">
                    <p class="title article-title">Introducing a new feature for paid subscribers</p>
                    <div class="tags has-addons level-item">
                        <span class="tag is-rounded is-info">@skeetskeet</span>
                        <span class="tag is-rounded">May 10, 2018</span>
                    </div>
                </div>
            </div>

            <div class="content article-body">
                <p>Non arcu risus quis varius quam quisque. Dictum varius duis at consectetur lorem. Posuere sollicitudin aliquam ultrices sagittis orci a scelerisque purus semper. </p>
                <p>Metus aliquam eleifend mi in nulla posuere sollicitudin aliquam ultrices. In hac habitasse platea dictumst vestibulum rhoncus est pellentesque elit. Accumsan lacus vel facilisis volutpat. Non sodales neque sodales ut etiam.
                    Est pellentesque elit ullamcorper dignissim cras tincidunt lobortis feugiat vivamus.</p>
            </div>
          </div>

        </div>

        <div class="card post">

          <div class="card-content">

            <div class="media">
                <div class="media-content has-text-centered">
                    <p class="title article-title">Introducing a new feature for paid subscribers</p>
                    <div class="tags has-addons level-item">
                        <span class="tag is-rounded is-info">@skeetskeet</span>
                        <span class="tag is-rounded">May 10, 2018</span>
                    </div>
                </div>
            </div>

            <div class="content article-body">
                <p>Non arcu risus quis varius quam quisque. Dictum varius duis at consectetur lorem. Posuere sollicitudin aliquam ultrices sagittis orci a scelerisque purus semper. </p>
                <p>Metus aliquam eleifend mi in nulla posuere sollicitudin aliquam ultrices. In hac habitasse platea dictumst vestibulum rhoncus est pellentesque elit. Accumsan lacus vel facilisis volutpat. Non sodales neque sodales ut etiam.
                    Est pellentesque elit ullamcorper dignissim cras tincidunt lobortis feugiat vivamus.</p>
            </div>
          </div>

        </div>

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
