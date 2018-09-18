@extends('layouts.app')

@section('content')
    <section class="hero is-fullheight register bkg-pattern">
        <div class="hero-body">

            <div class="container has-text-centered">

              <div class="columns is-centered">

                <div class="column is-5">

                  <div class="box">
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
                                    <p class="control has-icons-left has-icons-right">
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
                                        <input class="input" id="address" type="text"name="address">
                                         <span class="icon is-small is-left">
                                           <i class="fas fa-map-marker-alt"></i>
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
                                        <button type="submit" class="button register-btn">Register</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                  </div>

                </div>

              </div>

            </div>

        </div>
    </section>

    <!-- <div class="bkg-pattern">
      <div class="columns is-centered m-t-100 register">
        <div class="column is-5">

            <div class="card">

                <div class="card-content">
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
                                        <input class="input" id="address" type="text"name="address">
                                         <span class="icon is-small is-left">
                                           <i class="fas fa-map-marker-alt"></i>
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
                                        <button type="submit" class="button register-btn">Register</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div> -->
@endsection
