<!DOCTYPE html>
<html dir="ltr" lang="zh-TW">
<head>
  <title>{{ $langs->site_name }}</title>
  <meta charset="UTF-8" />
  <base href="{{ $base }}" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
  <link type="text/css" rel="stylesheet" href="{{ asset('opencartassets/js/bootstrap/css/bootstrap.css') }}" />
  <link type="text/css" rel="stylesheet" href="{{ asset('opencartassets/js/font-awesome/css/font-awesome.min.css') }}" />
  <link type="text/css" rel="stylesheet" href="{{ asset('opencartassets/css/stylesheet.css') }}" media="screen" />
</head>

<body>
  
  <div id="container">
        
      <div id="content">
    <div class="container-fluid">
      <br />
      <br />
      <div class="row">
        <div class="col-sm-offset-4 col-sm-4">
          <div class="panel panel-default">
            <div class="panel-heading">
              <h1 class="panel-title"><i class="fa fa-lock"></i>请输入帐号密码</h1>
            </div>
            <div class="panel-body">

            @if (session('error_warning'))
            <div class="alert alert-danger"><i class="fa fa-exclamation-circle"></i> <?php echo $error_warning; ?>
              <button type="button" class="close" data-dismiss="alert">&times;</button>
            </div>
            @endif

              <form action="{{ route('lang.login') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                  <label for="username">帐号</label>
                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                    <input type="text" name="username" value="" placeholder="管理帳號：" class="form-control" />
                  </div>
                </div>

                <div class="form-group">
                  <label for="password">密码</label>
                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                    <input type="password" name="password" value="" placeholder="管理密碼：" class="form-control" />
                  </div>
                  <!--<span class="help-block"><a href="{{ route('lang.password.request') }}">忘记密码</a></span>-->
                </div>
                <div class="text-right">
                  <button type="submit" class="btn btn-primary"><i class="fa fa-key"></i>登入</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

    <footer id="footer"> <a href="{{ route('lang.welcome') }}">泉声内部网站</a> &copy; 资讯部.</footer>
  </div>

  <script type="text/javascript" src="{{ asset('opencartassets/js/jquery/jquery-2.1.1.min.js') }}"></script>
  <script type="text/javascript" src="{{ asset('opencartassets/js/bootstrap/js/bootstrap.min.js') }}"></script>
  <script type="text/javascript" src="{{ asset('opencartassets/js/common.js') }}"></script>
  
</body>

</html>