<nav id="column-left">
  <div id="profile">
    <div>
      <h4>{{ $authUser->name }}</h4>
      <small>{{ $authUser->username }}</small></div>
  </div>

  <ul id="menu">
    <li>
      <a href="{{ route('lang.admin.dashboard') }}">
        <i class="fa fa-dashboard fw"></i>
        <span>Dashboard</span></a>
    </li>

    @can('admin_system')
    <li>
      <a class="parent">
        <i class="fa fa-cog fw"></i>
        <span>System</span></a>
      <ul>
        @can('admin_system_user')
        <li>
          <a class="parent">Users</a>
          <ul>
            @can('admin_system_user_permissions')
            <li><a href="{{ url($locale.'/admin/user/permission') }}">Permissions</a></li>
            @endcan
            @can('admin_system_user_roles')
            <li><a href="{{ url($locale.'/admin/user/role') }}">Roles</a></li>
            @endcan
            @can('admin_system_user_users')
            <li><a href="{{ url($locale.'/admin/user/user') }}">Users</a></li>
            @endcan
          </ul>
        </li>
        @endcan
      </ul>
    </li>
    @endcan
  </ul>
</nav>