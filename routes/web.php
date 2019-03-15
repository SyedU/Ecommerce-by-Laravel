<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'FrontendController@index');
Route::get('/cart', 'FrontendController@cart');
Route::get('/add/cart/{product_id}', 'FrontendController@addcart');
Route::get('/cart/delete/{cart_id}', 'FrontendController@cartdelete');
Route::post('/update/cart', 'FrontendController@updatecart');
Route::post('/final/checkout', 'FrontendController@finalcheckout');

// ajax response

Route::post('/getcitylist', 'FrontendController@getcitylist');



// add category link

Route::get('/add/category', 'Productcontroller@addcategory');
Route::post('/category/insert', 'Productcontroller@categoryinsert');
Route::get('/change/status/category/{category_id}', 'Productcontroller@changestatuscategory');

// html insert
Route::get('/add/product', 'Productcontroller@addproduct');
// database insert
Route::post('/product/insert', 'Productcontroller@productinsert');
// database delete
Route::get('/delete/product/{product_id}', 'Productcontroller@productdelete');
// database edit
Route::get('/edit/product/{product_id}', 'Productcontroller@productedit');

Route::post('/update/product', 'Productcontroller@productupdate');
// Restore data
Route::get('/restore/product/{product_id}', 'Productcontroller@productrestore');

// Testimonial

// html insert
Route::get('/add/testimonial', 'Productcontroller@addtestimonial');
// database insert
Route::post('/testimonial/insert', 'Productcontroller@testimonialinsert');




Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/add/banner', 'HomeController@addbanner');
Route::post('/banner/insert', 'HomeController@insertbanner');
Route::get('/add/coupon', 'HomeController@addcoupon');
Route::post('/coupon/insert', 'HomeController@insertcoupon');


// customer area

Route::get('/customer/area', 'CustomerController@customerarea');
Route::get('/purchase/order', 'CustomerController@purchaseorder');
Route::get('/purchase/order/{sale_id}', 'CustomerController@purchaseorderindividual');

// login with github

Route::get('login/github', 'GithubController@redirectToProvider');
Route::get('login/github/callback', 'GithubController@handleProviderCallback');

 // mail test
Route::get('/test', function(){
  return new App\Mail\OrderConfirm(9);
});
