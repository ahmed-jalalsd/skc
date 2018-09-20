<div class="menu">


<nav class="navbar">

  <div class="container">

    <div class="navbar-brand">

      <a class="navbar-item is-paddingless brand-item logo" href="{{route('home')}}">
        <img src="{{asset('images/skc-logo.png')}}" alt="Skc logo">
        <span class="logo__text	is-uppercase"> Sudanese Kennel Club </span>
      </a>

        <a class="navbar-item is-hidden-desktop" id="admin-slideout-button">
          <span class="icon">
            <i class="far fa-arrow-alt-circle-right"></i>
          </span>
        </a>
        <button class="button navbar-burger burger">
         <span></span>
         <span></span>
         <span></span>
       </button>

    </div>

    <div class="navbar-menu">

      <div class="navbar-end nav-menu" style="overflow: visible">
        @if(Request::segment(1) == "manage")
          <div class="navbar-item has-dropdown is-hoverable">
            <a class="navbar-link">Hey {{Auth::user()->name}}</a>
            <div class="navbar-dropdown is-right" >
              <a href="#" class="navbar-item">
                <span class="icon">
                  <i class="far fa-user-circle m-r-5"></i>
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
                  <i class="fas fa-sign-out-alt m-r-5"></i>
                </span>
                Logout
              </a>
               <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
              </form>
            </div>
          </div>
          @endif
      </div>

    </div>
  </div>
</nav>
