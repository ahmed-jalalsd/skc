@extends('layouts.app')

@section('content')

<section class="hero is-fullheight login bkg-pattern">
  <div class="hero-body">
    <div class="container has-text-centered">
      <div class="column is-6 login__center">
          <div class="box">
            <form class="login-form" method="POST" action="{{ route('login') }}">
                  {{ csrf_field() }}

                  <div class="field is-horizontal">
                      <div class="field-label">
                          <label class="label">E-Mail</label>
                      </div>

                      <div class="field-body">
                          <div class="field">
                              <p class="control has-icons-left has-icons-right">
                                  <input class="input {{ $errors->has('email') ? 'is-danger' : ''}}" id="email" type="email" name="email" value="{{ old('email') }}" required autofocus>
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
                              <p class="control has-icons-left has-icons-right">
                                  <input class="input {{ $errors->has('email') ? 'is-danger' : ''}}" id="password" type="password" name="password" required>
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
                      <div class="field-label"></div>

                      <div class="field-body">
                          <div class="field">
                              <p class="control">
                                  <!-- <b-checkbox name="remember" {{ old('remember') ? 'checked' : '' }} class="m-t-20">Remember Me</b-checkbox>  -->
                                  <label class="checkbox">
                                      <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                                  </label>
                              </p>
                          </div>
                          <div class="field is-grouped">
                              <div class="control">
                                  <a href="{{ route('password.request') }}" class="forget-password">
                                      Forgot Your Password?
                                  </a>
                              </div>
                          </div>
                      </div>

                  </div>

                  <div class="field is-horizontal">
                      <div class="field-label"></div>

                      <div class="field-body">
                          <div class="field is-grouped custom-align">
                              <div class="control">
                                  <button type="submit" class="button login-btn">Login</button>
                              </div>
                          </div>
                      </div>
                  </div>

                  <!-- <div class="field is-horizontal">
                      <div class="field-label"></div>

                      <div class="field-body">
                          <div class="field is-grouped">
                              <div class="control">
                                  <a href="{{ route('password.request') }}">
                                      Forgot Your Password?
                                  </a>
                              </div>
                          </div>
                      </div>
                  </div> -->

              </form>
          </div>
      </div>
    </div>
  </div>
</section>


@endsection
