<nav id="column-left">

  <ul id="menu">
    <li id="menu-setting">
      <a class="parent"><i class="fa fa-cog fw"></i> <span>設定</span></a>
      <ul>
        <li><a href="{{ url($locale.'/setting/category') }}">分類</a></li>
        <li id="menu-auth">
          <a class="parent">用戶權限</a>
          <ul>
            <li><a href="{{ route('lang.setting.auth.permission.index') }}">權限</a></li>
            <li><a href="{{ route('lang.setting.auth.role.index') }}">角色</a></li>
            <li><a href="{{ route('lang.setting.auth.user.index') }}">用戶</a></li>
          </ul>
        </li>
      </ul>
    </li>

    @can('menu-setting')
    <li id="menu-setting">
      <a class="parent"><i class="fa fa-cog fw"></i> <span>設定</span></a>
      <ul>
        <li><a href="{{ url($locale.'/setting/category') }}">分類</a></li>
        @can('menu-auth')
        <li id="menu-auth">
          <a class="parent">用戶權限</a>
          <ul>
            <li><a href="{{ route('lang.setting.auth.permission.index') }}">權限</a></li>
            <li><a href="{{ route('lang.setting.auth.role.index') }}">角色</a></li>
            <li><a href="{{ route('lang.setting.auth.user.index') }}">用戶</a></li>
          </ul>
        </li>
        @endcan
      </ul>
    </li>
    @endcan
    
  </ul>
</nav>