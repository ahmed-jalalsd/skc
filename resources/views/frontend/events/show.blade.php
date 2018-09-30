@extends('layouts.app')

@section('content')

<section class="section single-event">

  <div class="container">
    <h1 class="title single-event__title">Events</h1>

    <div class="columns">

      <div class="single-event__content is-raised column is-8 is-offset-1">

        <article class="article">
          <header>
            <figure class="image">
              <img src="{{ '/images/events/'.$event->featured_image }}" alt="article featured image">
            </figure>
          </header>

          <span class="breedcrumbs">
            <h6>{{date('Y', strtotime($event->created_at))}} >> {{$event->title}} </h6>
          </span>

          <div class="article-body">
            <h2 class="title">{{$event->title}}</h2>
            <p>{{$event->content}}</p>
          </div>

          @isset($images)
            <div class="columns m-t-10 is-multiline is-centered">
              @foreach ($images as $image)
              <div class="column is-4-desktop is-half-tablet">
    						<div class="card">
                  	<div class="card-image">
                      <figure class="image is-3by2">
                          <img src="{!! '/images/events/'.$image !!}" alt="">
                      </figure>
                    </div>
                </div>
              </div>
              @endforeach
            </div>
          @endisset

          <!--  With Applcation Form -->
          @if($event->flag_application == 1 && Auth::user())
            <div class="application-form">
              <a href="#" class="button skc-btn">apply</a>
            </div>
          @elseif($event->flag_application == 1 && Auth::guest())
            <div class="application-form">
              <a class="button skc-btn js-modal-trigger">Register to apply</a>
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
                                  <p class="control has-icons-left has-icons-right">
                                      <input class="input" id="name" type="name" name="name" value="{{ old('name') }}"
                                             required autofocus>
                                             <span class="icon is-small is-left">
                                               <i class="fal fa-user-alt"></i>
                                            </span>
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
                              <div class="field is-grouped custom-align">
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
          @else
          <div class="application-form">
          </div>
          @endif
        </article>


      </div>

      <div class="column is-2 side-bar">
        @include('_partials.nav.archive-side', ['url1' => 'event'])
      </div>

    </div>
  </div>
</section>



@endsection

@section('scripts')

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
