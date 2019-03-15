<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Product;
use App\Customer;
use App\Testimonial;
use App\Category;
use App\Cart as Syed;
use App\Coupon;
use App\City;
use App\Country;
use App\Banner;
use App\Sale;
use App\Order;
use Carbon\Carbon;
use App\Mail\OrderConfirm;
use Mail;


class FrontendController extends Controller
{
    function index()
    {

      $products = Product::all();
      $testimonials = Testimonial::all();
      $categories = Category::all();
      $banners = Banner::all();

    return view('index' , compact('products' ,'testimonials' ,'banners' ,'categories'));
    }

    function cart()
    {

      $ip_address = $_SERVER['REMOTE_ADDR'];
      $cart_products = Syed::where('ip_address', $ip_address)->get();
      return view('cart/view', compact('cart_products'));
    }


    function addcart($product_id)
    {

      if (Syed::where('product_id',$product_id)->where('ip_address',$_SERVER['REMOTE_ADDR'])->exists())
      {
        Syed::where('product_id',$product_id)->where('ip_address',$_SERVER['REMOTE_ADDR'])->increment('product_quantity');
      }

      else {

      Syed::insert(['product_id'=>$product_id,'ip_address'=>$_SERVER['REMOTE_ADDR'],'created_at'=>Carbon::now() ]);

      }
      return back();

    }



    function cartdelete($cart_id)
    {
      Syed::find($cart_id)->delete();
      return redirect('cart');
    }



    function updatecart(Request $request)
    {

      if (isset($request->proceed_btn))
      {
        $countries = Country::all();
        $cities = City::all();
        $cart_subtotal = $request->cart_subtotal;
        $shipping = $request->shipping;
        $discount = $request->discount;
        $grand_total = $request->grand_total;
        $coupon_amount = $request->coupon_amount;
        $after_coupon_discount = $request->after_coupon_discount;
        return view('checkout/view', compact('countries', 'cities', 'cart_subtotal', 'shipping', 'discount', 'grand_total', 'coupon_amount', 'after_coupon_discount'));
      }



      if (isset($request->update_cart))
      {
        foreach ($request->nir as $cart_id => $product_quantity) {
          Syed::find($cart_id)->update([
            'product_quantity' => $product_quantity
          ]);
        }

        $coupon_by_user = $request->coupon_by_user;

        if(Coupon::where('status', 1)->where('coupon', $coupon_by_user)->exists())
        {

          $coupon_amount = Coupon::where('coupon', $coupon_by_user)->first()->percentage;
        }
        $ip_address = $_SERVER['REMOTE_ADDR'];
        $cart_products = Syed::where('ip_address', $ip_address)->get();
        return view('cart/view', compact('cart_products', 'coupon_by_user', 'coupon_amount'));

      }

    }





    function finalcheckout(Request $request)
    {
      if (User::where('email', $request->customer_email)->exists())
      {

        $user_id = User::where('email', $request->customer_email)->first()->id;
      }
      else {
        $user_info = User::create([
          'name' => $request->customer_name,
          'email' => $request->customer_email,
          'password' => bcrypt($request->customer_password)
        ]);

        $user_id = $user_info->id;
        Customer::insert([

          'user_id' => $user_id,
          'customer_mobile' => $request->customer_mobile,
          'customer_country'  => $request->customer_country,
          'customer_city' => $request->customer_city,
          'customer_order_note' => $request->customer_order_note,
          'created_at' => Carbon::now()

        ]);
      }



    $sale_id = Sale::insertGetId([

        'user_id' => $user_id,
        'cart_subtotal' => $request->cart_subtotal,
        'shipping' => $request->shipping,
        'discount' => $request->discount,
        'grand_total' => $request->grand_total,
        'after_coupon_discount' => $request->after_coupon_discount,
        'payment_type' => $request->payment_type,
        'created_at' => Carbon::now()

      ]);

      $ip_address = $_SERVER['REMOTE_ADDR'];
      $cart_items = Syed::where('ip_address', $ip_address)->get();
      foreach ($cart_items as $cart_item) {
        Order::insert([

          'sale_id' => $sale_id,
          'product_id' => $cart_item->product_id,
          'product_quantity' => $cart_item->product_quantity,
          'ip_address' => $ip_address,
          'created_at' => Carbon::now()
        ]);
        Syed::find($cart_item->id)->delete();
        Product::find($cart_item->product_id)->decrement('product_quantity', $cart_item->product_quantity);
      }

      Mail::send(new OrderConfirm($sale_id));
      return redirect('cart')->with('status', 'Success!');

    }





    function getcitylist(Request $request)
    {
    $stringToSend = "<option value=''>Select One</option>";
    $cities = City::where('country_id', $request->country_id)->get();
    foreach ($cities as $city) {
      $stringToSend .= "<option value='$city->id'>$city->name</option>";
    }
    echo $stringToSend;
    }

    function test()
    {
      Mail::send(new OrderConfirm($sale_id));
    }

}
