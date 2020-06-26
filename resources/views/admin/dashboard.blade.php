@extends('admin._layouts.app')

@section('sidebar')
 @include('admin._partials.sidebar')
@endsection

@section('content')
      <div id="content">
        <div class="page-header">
          <div class="container-fluid">
            <h1>Dashboard</h1>
            <ul class="breadcrumb">
              <li>
                <a href="http://www.laravel.local/admin/index.php?route=common/dashboard&amp;token=S0FF6WLaVKGyDJUmAsXcQHKZOZBotxyZ">首頁</a></li>
              <li>
                <a href="http://www.laravel.local/admin/index.php?route=common/dashboard&amp;token=S0FF6WLaVKGyDJUmAsXcQHKZOZBotxyZ">Dashboard</a></li>
            </ul>
          </div>
        </div>
        <div class="container-fluid">
          <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-6">
              <div class="tile">
                <div class="tile-heading">總訂單數
                  <span class="pull-right">0%</span></div>
                <div class="tile-body">
                  <i class="fa fa-shopping-cart"></i>
                  <h2 class="pull-right">0</h2></div>
                <div class="tile-footer">
                  <a href="http://www.laravel.local/admin/index.php?route=sale/order&amp;token=S0FF6WLaVKGyDJUmAsXcQHKZOZBotxyZ">檢視明細...</a></div>
              </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6">
              <div class="tile">
                <div class="tile-heading">銷售總覽
                  <span class="pull-right">0%</span></div>
                <div class="tile-body">
                  <i class="fa fa-credit-card"></i>
                  <h2 class="pull-right">0</h2></div>
                <div class="tile-footer">
                  <a href="http://www.laravel.local/admin/index.php?route=sale/order&amp;token=S0FF6WLaVKGyDJUmAsXcQHKZOZBotxyZ">檢視明細...</a></div>
              </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6">
              <div class="tile">
                <div class="tile-heading">總客戶數
                  <span class="pull-right">0%</span></div>
                <div class="tile-body">
                  <i class="fa fa-user"></i>
                  <h2 class="pull-right">0</h2></div>
                <div class="tile-footer">
                  <a href="http://www.laravel.local/admin/index.php?route=customer/customer&amp;token=S0FF6WLaVKGyDJUmAsXcQHKZOZBotxyZ">檢視明細...</a></div>
              </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6">
              <div class="tile">
                <div class="tile-heading">線上訪客</div>
                <div class="tile-body">
                  <i class="fa fa-users"></i>
                  <h2 class="pull-right">0</h2></div>
                <div class="tile-footer">
                  <a href="http://www.laravel.local/admin/index.php?route=report/customer_online&amp;token=S0FF6WLaVKGyDJUmAsXcQHKZOZBotxyZ">檢視明細...</a></div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
              <div class="panel panel-default">
                <div class="panel-heading">
                  <h3 class="panel-title">
                    <i class="fa fa-shopping-cart"></i>最新訂單</h3>
                </div>
                <div class="table-responsive">
                  <table class="table">
                    <thead>
                      <tr>
                        <td class="text-right">訂單編號</td>
                        <td>客戶名稱</td>
                        <td>狀態</td>
                        <td>新增日期</td>
                        <td class="text-right">金額</td>
                        <td class="text-right">管理</td></tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td class="text-center" colspan="6">尚無資料！</td></tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
@endsection