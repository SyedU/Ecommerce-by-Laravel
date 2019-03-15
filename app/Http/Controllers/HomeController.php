<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Banner;
use App\Coupon;
use Carbon\Carbon;
use Image;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('verified');
        $this->middleware('checkusertype');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function addbanner()
    {
        return view('banner/view');
    }


    public function insertbanner(Request $request)
    {
      if($request->hasFile('banner_image')){

        // laravel way
        // $new_file_location = $request->file('product_image')->store('product_image_folder');

        // intervention way ( by package)

            $banner_image = $request->file('banner_image');
            $filename = str_random(30) . '.' . $banner_image->getClientOriginalExtension();
            Image::make($banner_image)->resize(1920, 600)->save( base_path('public/banner_image_folder/' . $filename ),40 );



        Banner::insert([

        'heading' => $request->heading,
        'sub_heading' => $request->sub_heading,
        'details' => $request->details,

        'banner_image' =>'banner_image_folder/'.$filename,
        'created_at' => Carbon::now()

      ]);

      return back()->with('success','Banner Inserted Successfully !');

      }
      else
      {
        return back();
      }

    }


    function addcoupon()
    {

      $coupons = Coupon::where('status' ,1)->get();

      return view('coupon/view' , compact('coupons'));
    }



    function insertcoupon(Request $request)
    {
      if(Coupon::where('status', 1)->where('percentage', $request ->percentage)->exists()){

      echo "Alraedy there !";
      }
      else
      {
        $info = Coupon::create([

          'coupon' => "",
          'percentage' => $request ->percentage

        ]);
        $coupon = str_random(4).$info->id;
        $info->coupon = $coupon;
        $info->save();
        return back();
      }
    }


}
