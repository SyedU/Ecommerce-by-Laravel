<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;
use App\Testimonial;
use Carbon\Carbon;
use Image;

class Productcontroller extends Controller
{

function __construct(){

  $this->middleware('auth');
  $this->middleware('verified');
  $this->middleware('checkusertype');
}

// add category function

function addcategory(){

  $categories = Category::all();

  return view('category/view',compact('categories'));

}

function categoryinsert(Request $request)
{
  Category::insert([

    'category_name' => $request->category_name,

    'created_at' => Carbon::now()

  ]);

  return back()->with('success','Category Inserted Successfully !');
}



function changestatuscategory($category_id)
{
  $category_info = Category::find($category_id);

if($category_info->status == 1)
{
  $category_info->status = 2;
}

else{

$category_info->status = 1;

}

$category_info->save();

return back();

}






// html function
    function addproduct(){

      $products = Product::orderby('id','desc')->paginate(5);
      $deleted_products = Product::onlyTrashed()->get();
      $categories = Category::where('status', 1)->get();
      return view('product/view',compact('products','deleted_products','categories'));

    }

// table insert function

    function productinsert(Request $request){

// validation rules

      $request ->validate([

        'product_name'=> 'required',
        'product_details'=> 'required',
        'product_price'=> 'required|integer'
      ],

      [
      'product_name.required'=> "Product name nai !",
      'product_price.required'=>"Product Price nai !",
      'product_price.integer'=>"Integer Noy !"

      ]

    );

// after validation


      if($request->hasFile('product_image')){

        // laravel way
        // $new_file_location = $request->file('product_image')->store('product_image_folder');

        // intervention way ( by package)

            $product_image = $request->file('product_image');
            $filename = str_random(30) . '.' . $product_image->getClientOriginalExtension();
            Image::make($product_image)->resize(270, 350)->save( base_path('public/product_image_folder/' . $filename ),40 );



        Product::insert([

        'category_id' => $request->category_id,
        'product_name' => $request->product_name,
        'product_details' => $request->product_details,
        'product_price' => $request->product_price,
        'product_quantity' => $request->product_quantity,
        'alert_quantity' => $request->alert_quantity,
        // 'product_image' =>$new_file_location,
        'product_image' =>'product_image_folder/'.$filename,
        'created_at' => Carbon::now()

      ]);



      return back()->with('success','Products Inserted Successfully !');

      }
      else
      {
        return back();
      }

      }

    function productdelete($product_id){

      Product::find($product_id)->delete();
      return back();
    }

    function productedit($product_id){

      $product = Product::findorfail($product_id);
      return view('product/edit', compact('product'));
    }


    function productupdate(Request $request){

      Product::findorfail($request->product_id)->update([

        'product_name' => $request->product_name,
        'product_details' => $request->product_details,
        'product_price' => $request->product_price

      ]);
      return back();
    }


    function productrestore($product_id){

      Product::onlyTrashed()->findorfail($product_id)->restore();
      return back();
    }


// Testimonuial

    function addtestimonial(){

      $testimonials = Testimonial::all();

      return view('testimonial/view',compact('testimonials'));

    }

    function testimonialinsert(Request $request)
    {

      if($request->hasFile('testimonial_image')){

        // laravel way
        // $new_file_location = $request->file('product_image')->store('product_image_folder');

        // intervention way ( by package)

            $testimonial_image = $request->file('testimonial_image');
            $filename = str_random(30) . '.' . $testimonial_image->getClientOriginalExtension();
            Image::make($testimonial_image)->resize(150, 150)->save( base_path('public/testimonial_image_folder/' . $filename ),40 );




      Testimonial::insert([

        'testimonial_name' => $request->testimonial_name,
        'testimonial_designation' => $request->testimonial_designation,
        'testimonial_description' => $request->testimonial_description,
        'testimonial_signature' => $request->testimonial_signature,
        'testimonial_image' =>'testimonial_image_folder/'.$filename,
        'created_at' => Carbon::now()

      ]);

      return back()->with('success','Testimonial Inserted Successfully !');
    }
    else
    {
      return back();
    }

}
}
