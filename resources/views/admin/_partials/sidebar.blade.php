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
          <a class="parent">Auth</a>
          <ul>
            <li>
              <a href="">Administrators</a></li>
            <li>
              <a href="">Role</a></li>
          </ul>
        </li>
      </ul>
    </li>
    
    {{--
    <li id="menu-user">
      <a class="parent">
        <i class="fa fa-tags fw"></i>
        <span>會員管理</span></a>
      <ul>
        <li><a href="{{ route('lang.admin.user.index') }}">帳號</a></li>
      </ul>
    </li>
    --}}

  </ul>
</nav>