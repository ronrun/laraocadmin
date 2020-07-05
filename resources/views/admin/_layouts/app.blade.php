<!DOCTYPE html>
<html dir="{{ $langs->dir }}" lang="{{ $locale }}">
<head>
  <title>{{ $langs->page_title }}</title>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
  <meta name="csrf-token" content="{{ csrf_token() }}">
  
  {{-- Global Packages --}}
  <link type="text/css" rel="stylesheet" href="{{ asset('opencartassets/js/bootstrap/css/bootstrap.css') }}" />
  <link type="text/css" rel="stylesheet" href="{{ asset('opencartassets/js/font-awesome/css/font-awesome.min.css') }}" />
  <link type="text/css" rel="stylesheet" href="{{ asset('opencartassets/js/jquery/datetimepicker/bootstrap-datetimepicker.min.css') }}" media="screen" />

  {{-- Page Packages --}}
  @yield('pageCss')

  {{-- Default Stylesheet --}}
  <link type="text/css" rel="stylesheet" href="{{ asset('opencartassets/css/stylesheet.css') }}" media="screen" />

  {{-- Custom Stylesheet --}}
  @yield('customCss')
</head>

<body>
  
  <div id="container">
    <header id="header" class="navbar navbar-static-top">
      <div class="navbar-header">
            <a type="button" id="button-menu" class="pull-left"><i class="fa fa-indent fa-lg"></i></a>
            <a href="{{ route('lang.admin.dashboard') }}" class="navbar-brand">OCAdmin</a></div>
        <ul class="nav pull-right">

        <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-home fa-lg"></i></a>
          <ul class="dropdown-menu dropdown-menu-right">
            <li class="dropdown-header">Website</li>
            <li><a href="{{ config('app.url') }}" target="_blank">Home</a></li>
          </ul>
        </li>
        <li><a href="{{ route('lang.admin.logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
              <span class="hidden-xs hidden-sm hidden-md">{{ $langs->text_logout }}</span> <i class="fa fa-sign-out fa-lg"></i></a>
              <form id="logout-form" action="{{ route('lang.admin.logout') }}" method="POST" style="display: none;">
                {{ csrf_field() }}
              </form>
        </li>
      </ul>
    </header>
    
    @yield('column_left')
    
    @yield('content')

    <footer id="footer"> <a href="http://www.laraocadmin.local">OCAdmin</a> &copy; 2020 All Rights Reserved.<br />版本 0.6</footer>
  </div>

  {{-- Global Packages --}}
  <script type="text/javascript" src="{{ asset('opencartassets/js/jquery/jquery-2.1.1.min.js') }}"></script>
  <script type="text/javascript" src="{{ asset('opencartassets/js/bootstrap/js/bootstrap.min.js') }}"></script>

  {{-- Page Packages --}}
  @yield('pageJs')

  {{-- Default Stylesheet --}}
  <script type="text/javascript" src="{{ asset('opencartassets/js/common.js') }}"></script>

  {{-- Custom Stylesheet --}}
  @yield('customJs')

</body>

</html>