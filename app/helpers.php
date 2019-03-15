<?php

function Total_Cart_Item()
{

  $ip_address = $_SERVER['REMOTE_ADDR'];
  return App\Cart::where('ip_address', $ip_address)->count();
}
