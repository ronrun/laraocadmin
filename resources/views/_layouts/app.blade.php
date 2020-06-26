<!DOCTYPE html>
<html dir="ltr" lang="{{ $locale }}">
<head>
  <title>{{ $langs->site_name }}</title>
  <meta charset="UTF-8" />
  <base href="{{ $base }}" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
  <meta name="csrf-token" content="{{ csrf_token() }}">

  {{-- 全站通用套件 --}}
  <link type="text/css" rel="stylesheet" href="{{ asset('opencartassets/js/bootstrap/css/bootstrap.css') }}" />
  <link type="text/css" rel="stylesheet" href="{{ asset('opencartassets/js/font-awesome/css/font-awesome.min.css') }}" />
  <link type="text/css" rel="stylesheet" href="{{ asset('opencartassets/js/jquery/datetimepicker/bootstrap-datetimepicker.min.css') }}" media="screen" />

  {{-- 頁面套件 --}}
  @yield('pageCss')

  {{-- 全站預設 --}}
  <link type="text/css" rel="stylesheet" href="{{ asset('opencartassets/css/stylesheet.css') }}" media="screen" />

  {{-- 特定頁面 --}}
  @yield('customCss')
</head>

<body>
  
  <div id="container">
    <header id="header" class="navbar navbar-static-top">
      <div class="navbar-header">
            <a type="button" id="button-menu" class="pull-left"><i class="fa fa-indent fa-lg"></i></a>
            <a href="{{ route('lang.home') }}" class="navbar-brand">@lang('common/header.APP_NAME') </a></div>
        <ul class="nav pull-right">

        <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-home fa-lg"></i></a>
          <ul class="dropdown-menu dropdown-menu-right">
            <li class="dropdown-header">Website</li>
            <li><a href="{{ config('app.url') }}" target="_blank">Home</a></li>
          </ul>
        </li>

        <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-cog fw"></i></a>
          <ul class="dropdown-menu dropdown-menu-right">
            <li><a href="{{ route('lang.user.changePassword') }}" target="_blank">变更密码</a></li>
          </ul>
        </li>
        <li><a href="{{ route('lang.logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
              <span class="hidden-xs hidden-sm hidden-md">@lang('common/header.text_logout')</span> <i class="fa fa-sign-out fa-lg"></i></a>
              <form id="logout-form" action="{{ route('lang.logout') }}" method="POST" style="display: none;">
                {{ csrf_field() }}
              </form>
        </li>
      </ul>
    </header>
    
    @yield('sidebar')
    
    @yield('content')

    <footer id="footer"> <a href="{{ config('app.url') }}">@lang('common/header.APP_NAME')</a> &copy; Ron.</footer>
  </div>

  {{-- 全站通用套件 --}}
  <script type="text/javascript" src="{{ asset('opencartassets/js/jquery/jquery-2.1.1.min.js') }}"></script>
  <script type="text/javascript" src="{{ asset('opencartassets/js/bootstrap/js/bootstrap.min.js') }}"></script>

  {{-- 頁面套件 --}}
  @yield('pageJs')

  {{-- 全站預設 --}}
  <script type="text/javascript" src="{{ asset('opencartassets/js/common.js') }}"></script>

  {{-- 特定頁面 --}}
  @yield('customJs')

</body>

</html>