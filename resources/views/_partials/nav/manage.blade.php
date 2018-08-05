<div class="side-menu" id="admin-side-menu">
  <aside class="menu m-t-30 m-l-10">
    <p class="menu-label">
      General
    </p>
    <ul class="menu-list">
      <li>
      	<a href="{{route('manage.dashboard')}}">Dashboard</a>
      </li>
    </ul>

    <p class="menu-label">
      Content
    </p>
    <ul class="menu-list">
      <li>
      	<a href="">My Dogs</a>
      </li>
    </ul>

    <p class="menu-label">
      Administration
    </p>
    <ul class="menu-list">
      <li>
      	<a href="{{route('users.index')}}">Manage Members</a></li>
      <li>
        <a href="{{route('permissions.index')}}" class="has-submenu">Roles &amp; Permissions</a>
        <ul class="submenu">
          {{-- <li><a href="{{route('roles.index')}}" class="{{Nav::isResource('roles')}}">Roles</a></li> --}}
          {{-- <li><a href="{{route('permissions.index')}}" class="{{Nav::isResource('permissions')}}">Permissions</a></li> --}}
        </ul>
      </li>
    </ul>
  </aside>
</div>
</div>