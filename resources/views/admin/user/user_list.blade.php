@extends('admin._layouts.app')

@section('pageCss')
@endsection

@section('column_left')
 @include('admin._partials.column_left')
@endsection

@section('content')
  <div id="content">
    <div class="page-header">
      <div class="container-fluid">
        <div class="pull-right">
          <a href="{{ $url_create }}" data-toggle="tooltip" title="{{ $langs->text_add }}" class="btn btn-primary">
            <i class="fa fa-plus"></i>
          </a>
        </div>
        <h1>{{ $heading_title }}</h1>
        <ul class="breadcrumb">
          @foreach($breadcumbs as $breadcumb)
            <li><a href="{{ $breadcumb['href'] }}">{{ $breadcumb['text'] }}</a></li>
          @endforeach
        </ul>
      </div>
    </div>
    <div class="container-fluid">
      @if (session('error_warning'))
      <div class="alert alert-danger"><i class="fa fa-exclamation-circle"></i> <?php echo $error_warning; ?>
        <button type="button" class="close" data-dismiss="alert">&times;</button>
      </div>
      @endif
      @if (session('success'))
      <div class="alert alert-success"><i class="fa fa-check-circle"></i> {{ session('success') }}
        <button type="button" class="close" data-dismiss="alert">&times;</button>
      </div>
      @endif
      <div class="panel panel-default">
        <div class="panel-heading">
          <h3 class="panel-title">
            <i class="fa fa-list"></i>{{ $langs->text_list}}</h3>
        </div>
        <div class="panel-body">
          <div class="well">
            <div class="row">
              <div class="col-sm-4">
                <div class="form-group">
                  <label class="control-label" for="input-name">{{ $langs->column_name }}</label>
                  <input type="text" name="filter_name" value="{{ $filter_name }}" placeholder="{{ $langs->column_name }}" id="input-name" class="form-control" />
                </div>
                <div class="form-group">
                  <label class="control-label" for="input-email">{{ $langs->column_email }}</label>
                  <input type="text" name="filter_email" value="{{ $filter_email }}" placeholder="{{ $langs->column_email }}" id="input-email" class="form-control" /></div>
              </div>
              <div class="col-sm-4">
                <div class="form-group">
                  <label class="control-label" for="input-rcode">{{ $langs->column_username }}</label>
                  <input type="text" name="filter_username" value="{{ $filter_username }}" placeholder="{{ $langs->column_username }}" id="input-rcode" class="form-control" />
                </div>
                <div class="form-group">
                  <label class="control-label" for="input-status">{{ $langs->column_active }}</label>
                  <select name="filter_active" id="input-status" class="form-control">
                    <option value="*"></option>
                    <?php if ($filter_active) { ?>
                    <option value="1" selected="selected">{{ $langs->text_active }}</option>
                    <?php } else { ?>
                    <option value="1">{{ $langs->text_active }}</option>
                    <?php } ?>
                    <?php if (!$filter_active && !is_null($filter_active)) { ?>
                    <option value="0" selected="selected">{{ $langs->text_inactive }}</option>
                    <?php } else { ?>
                    <option value="0">{{ $langs->text_inactive }}</option>
                    <?php } ?>
                  </select>
                </div>
              </div>
              <div class="col-sm-4">
                <button type="button" id="button-filter" class="btn btn-primary pull-right">
                  <i class="fa fa-filter"></i>{{ $langs->button_filter }}</button>
              </div>
            </div>
          </div>
          <form action="" method="post" enctype="multipart/form-data" id="form-customer">
            <div class="table-responsive">
              <table class="table table-bordered table-hover">
                <thead>
                  <tr>
                    <td style="width: 20px;" class="text-center">
                      <input type="checkbox" onclick="$('input[name*=\'selected\']').prop('checked', this.checked);" /></td>
                    <td style="width: 50px;" class="text-right">{{ $langs->column_action }}</td>
                    <td class="text-left">
                      @if($sort == 'username')
                      <a href="{{ $sort_username }}" class="{{ strtolower($order) }}">{{ $langs->column_username }}</a>
                      @else
                      <a href="{{ $sort_username }}">{{ $langs->column_username }}</a>
                      @endif
                      </td>
                    <td class="text-left">
                      @if($sort == 'name')
                      <a href="{{ $sort_name }}" class="{{ strtolower($order) }}">{{ $langs->column_name }}</a>
                      @else
                      <a href="{{ $sort_name }}">{{ $langs->column_name }}</a>
                      @endif
                      </td>
                    <td class="text-left">
                      {{ $langs->column_email }}
                    <td class="text-left">{{ $langs->column_active }}</td>
                  </tr>
                </thead>
                <tbody>
                  @foreach($users as $user)
                  <tr>
                    <td class="text-center">
                      <input type="checkbox" name="selected[]" value="1" /></td>
                    <td class="text-right">
                      <a href="{{ $user->url_edit }}" data-toggle="tooltip" title="編輯" class="btn btn-primary">
                        <i class="fa fa-pencil"></i>
                      </a>
                    </td>
                    <td class="text-left">{{ $user->username }}</td>
                    <td class="text-left">{{ $user->name }}</td>
                    <td class="text-left">{{ $user->email }}</td>
                    <td class="text-left">{{ $user->active_string }}</td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </form>
          <div class="row">
            <div class="col-sm-6 text-left">
              {{ $users->links() }}
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection

@section('pageJs')
  <script type="text/javascript" src="{{ asset('opencartassets/js/jquery/datetimepicker/moment.js') }}"></script>
  <script type="text/javascript" src="{{ asset('opencartassets/js/jquery/datetimepicker/bootstrap-datetimepicker.min.js') }}"></script>
@endsection

@section('customJs')
  <script type="text/javascript"><!--

    $('#button-filter').on('click', function() {
      var url = "{{ route('lang.admin.user.user.index') }}?search=1";

      var filter_username = $('input[name=\'filter_username\']').val();

      if (filter_username) {
        url += '&filter_username=' + encodeURIComponent(filter_username);
      }

      var filter_name = $('input[name=\'filter_name\']').val();

      if (filter_name) {
        url += '&filter_name=' + encodeURIComponent(filter_name);
      }

      var filter_email = $('input[name=\'filter_email\']').val();

      if (filter_email) {
        url += '&filter_email=' + encodeURIComponent(filter_email);
      }

      location = url;

    });

    $('.date').datetimepicker({
      pickTime: false
    });
  //--></script>
@endsection