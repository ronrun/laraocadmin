<?php

namespace App\Models\Localisation;

use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
  protected $fillable = [
    'name', 'code', 'locale', 'image', 'sort_order', 'status',
  ];

  public $timestamps = false;
}
