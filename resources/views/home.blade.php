@extends('layouts.app')

@section('content')
    <section class="home">

        <div class="container">

          <div class="welcome__image"></div>

          <div class="welcome__text">
            <h2 class="title">Welcome</h2>
            <p class="subitle">
              Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do
              eiusmod tempor incididunt ut labore et dolore magna aliqua.
            </p>
            <!-- <a href="{{route('register')}}" class="button">Register</a> -->
            <registration-modal></registration-modal>

          </div>

        </div>

    </section>

    <section class="about">
      <div class="continer">
        <h1 class="title">about us</h1>
        <div class="about__box">
          <div class="about__text">
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
          <div class="about__image">
            
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
@endsection
