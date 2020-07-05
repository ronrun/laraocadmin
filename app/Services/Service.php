<?php

namespace App\Services;

use App\Libraries\Setting;
use DB;

class Service
{
    public function __construct()
    {
        $this->language_id = DB::table('languages')->where('code',app()->getLocale())->first()->id;
        $this->setting = app(\App\Models\Setting::class);
        $this->config = $this->setting->data;
    }
    
    public function getTableColumnsByModel($fullModelName) 
    {
        $model = new $fullModelName;
        $table = $model->getTable();
        $columns = $model->getConnection()->getSchemaBuilder()->getColumnListing($table);
        return $columns;
    }

}
?>