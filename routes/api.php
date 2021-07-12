<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});



Route::post('login', 'Api\AuthController@login')->name('login');
Route::post('signup', 'Api\AuthController@signup');

Route::group(['middleware' => 'auth:api'], function () {

    Route::post('logout', 'Api\AuthController@logout');
    
});


Route::apiResource('/category','Api\CategoryController');
Route::apiResource('/subcategory','Api\SubCategoryController');
Route::apiResource('/product','Api\ProductController');

Route::get('/banner', 'Api\ProductController@banner')->name('banner');

Route::get('/category/product/{slug}', 'Api\ProductController@pmenunew')->name('catpro');
Route::get('/sub_category/product/{slug}', 'Api\ProductController@pmenusub')->name('catprosub');
Route::get('/feature_product', 'Api\ProductController@feature_product')->name('feature_product');
Route::get('/product-detail/{id}', 'Api\ProductController@product_detail')->name('product_detail');

Route::get('/search', 'Api\ProductController@searchMember');

Route::get('/my_item/cart', 'Api\ProductController@cart')->name('cart1.index');
Route::post('/my_item/cart/add', 'Api\ProductController@add')->name('cart1.store');
Route::post('/your_cart/update', 'Api\ProductController@update1')->name('cart1.update');
Route::post('/your_cart/remove', 'Api\ProductController@remove1')->name('cart1.remove');
Route::post('/your_cart/clear', 'Api\ProductController@clear1')->name('cart1.clear');
 
Route::get('/shipping/{id}', 'Api\ProductController@shipping_show')->name('shipping1.show');
Route::post('/your_shipping/add/{id}', 'Api\ProductController@shipping_store')->name('shipping1.store');

Route::get('/wishlist/{id}','Api\ProductController@wishlist_detail');
Route::post('/wishlist_store/{id}','Api\ProductController@wishlist_store');
Route::post('/wishlist-delete/{id}','Api\ProductController@wishlist_delete');

Route::get('/user/{id}','Api\ProductController@user_detail');

Route::get('/pending-order/{id}','Api\ProductController@user_pending_order');
Route::get('/order-history/{id}','Api\ProductController@order_history');
<<<<<<< HEAD
Route::get('/order-detail/{id}','Api\ProductController@order_detail');
=======

>>>>>>> 3e9c31b0b0dd839ccf98b63a8e5d1275ea7d9d06

// custome cart-------------
Route::get('/cart/{id}', 'Api\ProductController@custom_cart_view');
Route::post('/cart/add/{id}', 'Api\ProductController@custome_cart_add');
Route::post('cart/update/{id}', 'Api\ProductController@custome_cart_update');
Route::post('/cart/remove/{id}', 'Api\ProductController@custome_cart_remove');
Route::post('/cart/clear', 'Api\ProductController@custome_cart_clear');
 
<<<<<<< HEAD

=======
>>>>>>> 3e9c31b0b0dd839ccf98b63a8e5d1275ea7d9d06



