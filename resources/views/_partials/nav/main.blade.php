<nav class="navbar has-shadow" >
  <div class="container">
    <div class="navbar-brand">

      <a class="navbar-item is-paddingless brand-item" href="{{route('home')}}">
        <img src="{{asset('images/skc-logo.jpeg')}}" alt="Skc logo">
      </a>

      @if(Request::segment(1) == "manage")
        <a class="navbar-item is-hidden-desktop" id="admin-slideout-button">
          <span class="icon">
            <i class="fa fa-arrow-circle-o-right"></i>
          </span>
        </a>
      @endif

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
        @else
          <div class="navbar-item has-dropdown is-hoverable">
            <a class="navbar-link">Hey {{Auth::user()->name}}</a>
            <div class="navbar-dropdown is-right" >
              <a href="#" class="navbar-item">
                <span class="icon">
                  <i class="fa fa-fw fa-user-circle-o m-r-5"></i>
                </span>Profile
              </a>

              <a href="#" class="navbar-item">
                <span class="icon">
                  <i class="fa fa-fw fa-bell m-r-5"></i>
                </span>Notifications
              </a>
              <a href="{{route('manage.dashboard')}}" class="navbar-item">
                <span class="icon">
                  <i class="fa fa-fw fa-cog m-r-5"></i>
                </span>Manage
              </a>
              <hr class="navbar-divider">
              <a href="{{route('logout')}}" class="navbar-item" onclick="event.preventDefault();
                         document.getElementById('logout-form').submit();">
                <span class="icon">
                  <i class="fa fa-fw fa-sign-out m-r-5"></i>
                </span>
                Logout
              </a>
               <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
              </form>
            </div>
          </div>
        @endguest
      </div>
    </div>

  </div>
</nav>
