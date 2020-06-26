<?php
namespace App\Libraries;

use App\Models\Setting;

class Config
{
    private $data = array();

    public function get($key)
    {
        return (isset($this->data[$key]) ? $this->data[$key] : null);
    }

    public function set($key, $value)
    {
        $this->data[$key] = $value;
    }

    public function has($key)
    {
        return isset($this->data[$key]);
    }

    public function isEmpty($key)
    {
        return empty($this->data[$key]);
    }
        
    public function all()
    {
        return $this->data;
    }
}
?>