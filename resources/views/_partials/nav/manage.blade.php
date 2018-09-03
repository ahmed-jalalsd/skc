<div class="side-menu" id="admin-side-menu">
  <aside class="menu m-t-30 m-l-10">
    <p class="menu-label">
      General
    </p>
    <ul class="menu-list">
      <li>
      	<a href="{{route('manage.dashboard')}}"  class="{{Nav::isRoute('manage.dashboard')}}">Dashboard</a>
      </li>
    </ul>

    @role('superadministrator|administrator')
    <p class="menu-label">
      Content
    </p>

      <ul class="menu-list">

        <li>
          <a href="{{route('posts.index')}}" class="{{Nav::isResource('posts', 2)}}">Manage Blog</a>
        </li>
        <li>
          <a href="{{route('events.index')}}" class="{{Nav::isResource('events', 2)}}">Manage Events</a>
        </li>
        <li>
          <a href="{{route('galleries.index')}}" class="{{Nav::isResource('galleries', 2)}}">Manage Galleries</a>
        </li>

      </ul>


      <p class="menu-label">
        Personal Area
      </p>
      <ul class="menu-list">
        <li>
          <a href="{{route('dogs.index')}}" class="{{Nav::isResource('dogs', 2)}}">Manage All Dogs</a>
        </li>
      </ul>

      @endrole

      @role('member')
      <p class="menu-label">
        Personal Area
      </p>
      <ul class="menu-list">
        <li>
          <a href="{{route('dogs.index')}}" class="{{Nav::isResource('dogs', 2)}}">Manage My Dogs</a>
        </li>
      </ul>
      @endrole

    @role('superadministrator|administrator')
      <p class="menu-label">
        Administration
      </p>

      <ul class="menu-list">

        <li>
        	<a href="{{route('users.index')}}" class="{{Nav::isResource('users')}}">Manage Members</a>
        </li>

        <li>
          <a class="has-submenu {{Nav::hasSegment(['roles', 'permissions'], 2)}}" >Roles &amp; Permissions</a>

          <ul class="submenu">

            <li>
              <a href="{{route('roles.index')}}" class="{{Nav::isResource('roles')}}">Roles</a>
            </li>

            <li>
              <a href="{{route('permissions.index')}}" class="{{Nav::isResource('permissions')}}">Permissions</a>
            </li>

          </ul>

        </li>

      </ul>
    @endrole
  </aside>
</div>
</div>
