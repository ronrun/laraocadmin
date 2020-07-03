@extends('admin._layouts.app')

@section('column_left')
 @include('admin._partials.column_left')
@endsection

@section('content')
      <div id="content">
        <div class="page-header">
          <div class="container-fluid">
            <h1>{{ $langs->heading_title }}</h1>
            <ul class="breadcrumb">
              @foreach($breadcumbs as $breadcumb)
                <li><a href="{{ $breadcumb['href'] }}">{{ $breadcumb['text'] }}</a></li>
              @endforeach
            </ul>
          </div>
        </div>
        <div class="container-fluid">
          <div class="row">

            <div class="col-lg-3 col-md-3 col-sm-6">
              <div class="tile">
                <div class="tile-heading">Total Orders
                  <span class="pull-right">0%</span></div>
                <div class="tile-body">
                  <i class="fa fa-shopping-cart"></i>
                  <h2 class="pull-right">0</h2></div>
                <div class="tile-footer">
                  <a href="">View more...</a></div>
              </div>
            </div>

            <div class="col-lg-3 col-md-3 col-sm-6">
              <div class="tile">
                <div class="tile-heading">Total Sales
                  <span class="pull-right">0%</span></div>
                <div class="tile-body">
                  <i class="fa fa-credit-card"></i>
                  <h2 class="pull-right">0</h2></div>
                <div class="tile-footer">
                  <a href="">View more...</a></div>
              </div>
            </div>

            <div class="col-lg-3 col-md-3 col-sm-6">
              <div class="tile">
                <div class="tile-heading">Total Customers
                  <span class="pull-right">0%</span></div>
                <div class="tile-body">
                  <i class="fa fa-user"></i>
                  <h2 class="pull-right">0</h2></div>
                <div class="tile-footer">
                  <a href="">View more...</a></div>
              </div>
            </div>

            <div class="col-lg-3 col-md-3 col-sm-6">
              <div class="tile">
                <div class="tile-heading">People Online</div>
                <div class="tile-body">
                  <i class="fa fa-users"></i>
                  <h2 class="pull-right">0</h2></div>
                <div class="tile-footer">
                  <a href="">View more...</a></div>
              </div>
            </div>

          </div>
          <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
              <div class="panel panel-default">
                <div class="panel-heading">
                  <h3 class="panel-title">
                    <i class="fa fa-shopping-cart"></i>Latest Orders</h3>
                </div>
                <div class="table-responsive">
                  <table class="table">
                    <thead>
                      <tr>
                        <td class="text-right">Order ID</td>
                        <td>Customer</td>
                        <td>Status</td>
                        <td>Date Added</td>
                        <td class="text-right">Total</td>
                        <td class="text-right">Action</td></tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td class="text-center" colspan="6">No results!</td></tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
@endsection