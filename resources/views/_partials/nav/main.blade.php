            <nav class="nav navbar has-shadow ">
                <div class="container">
                    <div class="navbar-menu">
                        <div class="navbar-brand navbar-start">
                             <a href="{{route('home')}}" class="navbar-item">{{ config('app.name', 'Laravel') }}</a>

                             <div class="navbar-burger burger" data-target="navMenu">
                                <span></span>
                                <span></span>
                                <span></span>
                            </div>
                        </div>
                        <div class="navbar-end" style="overflow: visible;">
                            @if (Auth::guest())
                                <a class="navbar-item " href="{{ route('login') }}">Login</a>
                                <a class="navbar-item " href="{{ route('register') }}">Register</a>
                            @else

                                <button class="has-dropdown is-hoverable nav-item is-tab  is-aligned-right">
                                    <a class="navbar-link" href="#">{{-- {{ Auth::user()->name }} --}} Aj</a>

                                    <ul class="navbar-dropdown">
                                        <li>
                                            <a href="#">
                                                <span class="icon">
                                                    <i class="m-r-5 fas fa-user-alt"></i>
                                                </span>Profile
                                            </a>
                                        </li>


                                        <li>
                                            <a href="{{route('manage.dashboard')}}">
                                                <span class="icon">
                                                    <i class="m-r-5 fas fa-sign-out-alt"></i>
                                                </span>Manage
                                            </a>
                                        </li>

                                        <li>
                                            <a href="#">
                                                <span class="icon">
                                                    <i class="m-r-5 fas fa-sign-out-alt"></i>
                                                </span>Settings
                                            </a>
                                        </li>

                                        <li class="seperator"></li>
                                        <li>
                                            <a  href="{{ route('logout') }}"
                                            onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                            <span class="icon">
                                                <i class="m-r-5 fas fa-sign-out-alt"></i>
                                            </span>Logout
                                            
                                        </a>
                                         <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                              style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                        </li>
                                    </ul>
                                </button>
                            @endif
                        </div>
                    </div>
                    {{-- <div class="navbar-brand">
                        <a href="{{ url('/') }}" class="navbar-item">{{ config('app.name', 'Laravel') }}</a>

                        <div class="navbar-burger burger" data-target="navMenu">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                    </div> --}}

                    {{-- <div class="navbar-menu" id="navMenu">
                        <div class="navbar-start"></div>

                        <div class="navbar-end">
                            @if (Auth::guest())
                                <a class="navbar-item " href="{{ route('login') }}">Login</a>
                                <a class="navbar-item " href="{{ route('register') }}">Register</a>
                            @else
                                <div class="navbar-item has-dropdown is-hoverable">
                                    <a class="navbar-link" href="#">{{ Auth::user()->name }}</a>

                                    <div class="navbar-dropdown">
                                        <a class="navbar-item" href="{{ route('logout') }}"
                                           onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                              style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div> --}}
                </div>
            </nav>