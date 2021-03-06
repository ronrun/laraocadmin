<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Libraries\Config;
use Lang;

class DashboardController extends Controller
{

    /**
      * Show the application dashboard.
      *
      * @return \Illuminate\Http\Response
      */
    public function index()
    {
        //Language
        $langs = new \stdClass();
        
        foreach (Lang::get('admin/common/common') as $key => $value) {
            $langs->{$key} = $value;
        }
        
        foreach (Lang::get('admin/common/column_left') as $key => $value) {
            $langs->{$key} = $value;
        }
        
        foreach (Lang::get('admin/common/dashboard') as $key => $value) {
            $langs->{$key} = $value;
        }

        $data['langs'] = $langs;

        //Breadcomb
        $data['breadcumbs'][] = array(
            'text' => $langs->text_home,
            'href' => route('lang.admin.dashboard'),
        );
        
        $data['breadcumbs'][] = array(
            'text' => $langs->heading_title,
            'href' => null,
        );

        return view('admin.dashboard', $data);
    }
}
