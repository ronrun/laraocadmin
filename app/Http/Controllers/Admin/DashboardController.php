<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Libraries\Config;

class DashboardController extends Controller
{

  /**
   * Show the application dashboard.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $data['title'] = 'Admin';

    return view('admin.dashboard', $data);
  }
}
