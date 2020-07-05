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
              </div>
              <div class="col-sm-4">
                <div class="form-group">
                  <label class="control-label" for="input-description">{{ $langs->column_description }}</label>
                  <input type="text" name="filter_description" value="{{ $filter_description }}" placeholder="{{ $langs->column_description }}" id="input-description" class="form-control" />
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
                      @if($sort == 'name')
                      <a href="{{ $sort_name }}" class="{{ strtolower($order) }}">{{ $langs->column_name }}</a>
                      @else
                      <a href="{{ $sort_name }}">{{ $langs->column_name }}</a>
                      @endif
                      </td>
                    <td class="text-left">{{ $langs->column_description }}</td>
                  </tr>
                </thead>
                <tbody>
                  @foreach($permissions as $permission)
                  <tr>
                    <td class="text-center">
                      <input type="checkbox" name="selected[]" value="1" /></td>
                    <td class="text-right">
                      <a href="{{ $permission->url_edit }}" data-toggle="tooltip" class="btn btn-primary">
                        <i class="fa fa-pencil"></i>
                      </a>
                    </td>
                    <td class="text-left">{{ $permission->name }}</td>
                    <td class="text-left">{{ $permission->description }}</td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </form>
          <div class="row">
            <div class="col-sm-6 text-left">
              {{ $permissions->links() }}
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection

@section('customJs')
  <script type="text/javascript"><!--

    $('#button-filter').on('click', function() {
      var url = "{{ route('lang.admin.user.permission.index') }}?search=1";

      var filter_name = $('input[name=\'filter_name\']').val();

      if (filter_name) {
        url += '&filter_name=' + encodeURIComponent(filter_name);
      }

      var filter_description = $('input[name=\'filter_description\']').val();

      if (filter_description) {
        url += '&filter_description=' + encodeURIComponent(filter_description);
      }

      location = url;

    });

  //--></script>
@endsection