@extends('admin._layouts.app')

@section('content')
  <div id="content">
    <div class="container-fluid">
      <br />
      <br />
      <div class="row">
        <div class="col-sm-offset-4 col-sm-4">
          <div class="panel panel-default">
            <div class="panel-heading">
              <h1 class="panel-title"><i class="fa fa-lock"></i>請輸入管理帳號及密碼。</h1>
            </div>
            <div class="panel-body">
              <form action="{{ route('lang.admin.login.post') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                  <label for="input-username">管理帳號：</label>
                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                    <input type="text" name="username" id="username" value="" placeholder="管理帳號：" id="input-username" class="form-control" />
                  </div>
                </div>
                <div class="form-group">
                  <label for="input-password">管理密碼：</label>
                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                    <input type="password" name="password" value="" placeholder="管理密碼：" id="input-password" class="form-control" />
                  </div>
                  <span class="help-block"><a href="{{ route('lang.admin.password.request') }}">忘記密碼</a></span>
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
@endsection