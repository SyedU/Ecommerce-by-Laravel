<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
   use SoftDeletes;
   protected $dates = ['deleted_at'];
   protected $fillable = ['product_name','product_details','product_price'];

function get_category_name()

{
  return $this->hasOne('App\Category', 'id' , 'category_id');
}



}
