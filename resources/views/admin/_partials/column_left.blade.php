<nav id="column-left">
  <div id="profile">
    <div>
      <h4>Ron Lee</h4>
      <small>Administrator</small></div>
  </div>

  <ul id="menu">
    <li id="menu-dashboard">
      <a href="{{ route('lang.admin.dashboard') }}">
        <i class="fa fa-dashboard fw"></i>
        <span>Dashboard</span></a>
    </li>

    <li id="menu-Setting">
      <a class="parent">
        <i class="fa fa-cog fw"></i>
        <span>Setting</span></a>
      <ul>
        <li>
          <a class="parent">Users</a>
          <ul>
            <li><a href="{{ url($locale.'/admin/user/permission') }}">Permissions</a></li>
            <li><a href="{{ url($locale.'/admin/user/role') }}">Roles</a></li>
            <li><a href="{{ url($locale.'/admin/user/user') }}">Administrators</a></li>
          </ul>
        </li>
      </ul>
    </li>
  </ul>
</nav>