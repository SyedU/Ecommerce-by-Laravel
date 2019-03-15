<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{

  protected $fillable = ['product_quantity'];
  function get_product_info()

  {
    return $this->hasOne('App\Product', 'id' , 'product_id');
  }

}
