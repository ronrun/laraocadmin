<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

class Setting extends Model
{
    public $timestamps = false;
    public $data;

    public function __construct()
    {
        $settings = DB::table('settings')->where('code','config')->get();
        $this->data = new \stdClass();
        foreach ($settings as $setting){
            $key = $setting->key;
            $this->data->{$key} = $setting->value;
        }
    }

    /* check key exists */
    public function has(string $key)
    {
        if(isset($this->data) and isset($this->data->{$key}) and $this->data->{$key} !== null){
            return true;
        }
        return false;
    }
    
    public function get(string $key)
    {
        return $this->data->{$key};
    }
    
    public function set(string $key, $value)
    {
        $this->data[$key] = $value;
    }
}