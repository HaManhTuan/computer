<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
   protected $table    = 'products';
   public $timestamps  = true;
   public function category() {
    return $this->belongsTo('App\Model\Category', 'category_id', 'id');
  }
}
