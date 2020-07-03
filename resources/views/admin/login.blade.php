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
              <h1 class="panel-title"><i class="fa fa-lock"></i>{{ $langs->text_login }}</h1>
            </div>
            <div class="panel-body">
              <form action="{{ route('lang.admin.login.post') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                  <label for="input-username">{{ $langs->entry_username }}</label>
                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                    <input type="text" name="username" id="username" value="" placeholder="{{ $langs->entry_username }}" id="input-username" class="form-control" />
                  </div>
                </div>
                <div class="form-group">
                  <label for="input-password">{{ $langs->entry_password }}</label>
                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                    <input type="password" name="password" value="" placeholder="{{ $langs->entry_password }}" id="input-password" class="form-control" />
                  </div>
                  <span class="help-block"><a href="{{ route('lang.admin.password.request') }}">{{ $langs->text_forgotten }}</a></span>
                </div>
                <div class="text-right">
                  <button type="submit" class="btn btn-primary"><i class="fa fa-key"></i>{{ $langs->button_login }}</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection