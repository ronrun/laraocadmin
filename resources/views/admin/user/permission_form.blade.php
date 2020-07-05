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
          <button type="submit" form="mainform" data-toggle="tooltip" title="儲存" class="btn btn-primary">
            <i class="fa fa-save"></i>
          </button>
          <a href="{{ $previous_url }}" data-toggle="tooltip" title="取消" class="btn btn-default">
            <i class="fa fa-reply"></i>
          </a>
        </div>
        <h1>{{ $langs->heading_title }}</h1>
        <ul class="breadcrumb">
          @foreach($breadcumbs as $breadcumb)
            <li><a href="{{ $breadcumb['href'] }}">{{ $breadcumb['text'] }}</a></li>
          @endforeach
        </ul>
      </div>
    </div>
    <div class="container-fluid">
      @if (count($errors) > 0)
      <div class="alert alert-danger"><i class="fa fa-exclamation-circle"></i> {{ $errors->all()[0] }}
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
            <i class="fa fa-pencil"></i>{{ $langs->text_form}}</h3>
        </div>
        <div class="panel-body">
          <form id="mainform" action="{{ $form_action }}" method="post" enctype="multipart/form-data" class="form-horizontal">
            {{ csrf_field() }}
            {{ method_field($form_method) }}
            <ul class="nav nav-tabs">
              <li class="active"><a href="#tab-data" data-toggle="tab">{{ $langs->tab_basic_data }}</a></li>
            </ul>
            <div class="tab-content">
              <div class="tab-pane active" id="tab-data">
                <div class="form-group required">
                  <label class="col-sm-2 control-label" for="input-name">{{ $langs->column_name }}</label>
                  <div class="col-sm-10">
                    <input type="text" name="name" id="input-name" value="{{ old('name', $permission->name) }}" placeholder="{{ $langs->column_name }}" class="form-control" /></div>
                </div>
                <div class="form-group required">
                  <label class="col-sm-2 control-label" for="input-description">{{ $langs->column_description }}</label>
                  <div class="col-sm-10">
                    <input type="text" name="description" id="input-description" value="{{ old('description', $permission->description) }}" placeholder="{{ $langs->column_description }}" class="form-control" /></div>
                </div>

              </div>
            </div>
          </form>
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
    $('.date').datetimepicker({
      pickTime: false
    });
  //--></script>
@endsection