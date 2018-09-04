<nav class="navbar has-shadow menu">

  <div class="container">

    <div class="navbar-brand">

      <a class="navbar-item is-paddingless brand-item logo" href="{{route('home')}}">
        <img src="{{asset('images/skc-logo.jpeg')}}" alt="Skc logo" class="logo__image">
        <span class="logo__text	is-uppercase"> Sudanese Kennel Club </span>
      </a>

      <button class="button navbar-burger">
       <span></span>
       <span></span>
       <span></span>
     </button>

    </div>

    <div class="navbar-menu">

      <div class="navbar-end nav-menu" style="overflow: visible">
        @guest
          <a href="{{route('login')}}" class="navbar-item is-tab">Login</a>
          <a href="{{route('register')}}" class="navbar-item is-tab">Join the Community</a>
        @endguest
      </div>

    </div>

  </div>

</nav>
