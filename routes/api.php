<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
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
 
Route::post('/your_shipping/add', 'Api\ProductController@add2')->name('shipping1.store');





