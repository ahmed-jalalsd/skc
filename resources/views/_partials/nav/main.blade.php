<div class="menu">


<nav class="navbar">

  <div class="container">

    <div class="navbar-brand">

      <a class="navbar-item is-paddingless brand-item logo" href="{{route('home')}}">
        <img src="{{asset('images/skc-logo.png')}}" alt="Skc logo">
        <span class="logo__text	is-uppercase"> Sudanese Kennel Club </span>
      </a>

      <div  v-on:click="open=!open, isActive=!isActive" v-bind:class="[isActive ? 'active' : '']" class="button_container is-hidden-desktop" id="toggle">
        <span class="top"></span>
        <span class="middle"></span>
        <span class="bottom"></span>
      </div>

    </div>

    <div class="navbar-menu">

      <div class="navbar-end nav-menu" style="overflow: visible">

        @guest
          <a href="{{route('login')}}" class="navbar-item is-tab">Login</a>
          <a href="{{route('register')}}" class="navbar-item is-tab">Register</a>
        @else
          <a href="{{route('logout')}}" class="is-hidden-mobile" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            Logout
          </a>
           <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                {{ csrf_field() }}
          </form>
        @endguest
      </div>

    </div>
  </div>
</nav>


  <div v-bind:class="compClass" class="nav-bottom overlay" id="overlay">
    <menu class="nav-bottom__menu" id="nav-bottom">
      <ul>
        <li>
          <a href="/" class="{{Nav::isRoute('home')}}">Home</a>
        </li>
        <span class="is-hidden-mobile">|</span>
        <li>
          <a href="{{ URL::route('gallery.index') }}" class="{{Nav::isResource('gallery')}}">Gallery</a>
        </li>
        <span class="is-hidden-mobile">|</span>
        <li>
          <a href="{{ URL::route('event.index') }}" class="{{Nav::isResource('event')}}">Events</a>
        </li>

        <span class="is-hidden-mobile">|</span>
        <li>
          <a href="{{ URL::route('blog.index') }}" class="{{Nav::isResource('blog')}}">Blog</a>
        </li>

        @guest
        <li class="is-hidden-desktop">
          <a href="{{route('login')}}" class="">Login</a>
        </li>
        <li class="is-hidden-desktop">
          <a href="{{route('register')}}" class="">Register</a>
        </li>
        @else
        <li class="is-hidden-desktop">
          <a href="{{route('logout')}}" class="" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            Logout
          </a>
           <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                {{ csrf_field() }}
          </form>
        </li>
      @endguest

      </ul>
    </menu>
  </div>

</div>
