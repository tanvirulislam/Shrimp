<?php

use Illuminate\Support\Facades\Route;

Route::get('/clear', function() {
    \Illuminate\Support\Facades\Artisan::call('cache:clear');
    \Illuminate\Support\Facades\Artisan::call('config:clear');
    \Illuminate\Support\Facades\Artisan::call('config:cache');
    \Illuminate\Support\Facades\Artisan::call('view:clear');
    \Illuminate\Support\Facades\Artisan::call('route:clear');
    return 'Cleared!';
});

    // FrontEnd
    Route::get('/', 'Front\FrontController@index')->name('index');
    Route::get('/all-products', 'Front\FrontController@all_products')->name('all_products');
    Route::get('/products/{id}', 'Front\FrontController@cat_wise_all_products')->name('cat_wise_all_product');

    
    Route::get('/product_details/{id}', 'Front\FrontController@product_details')->name('product_details');
    Route::get('/products/{id}', 'Front\FrontController@cat_wise_all_products')->name('cat_wise_all_product');
    Route::get('search', 'Front\FrontController@search')->name('search');

    // Cart
    Route::get('/cart', 'Front\CartController@cart')->name('cart.index');
    Route::post('/cart/add', 'Front\CartController@add')->name('cart.store');
    Route::post('/cart/update', 'Front\CartController@update')->name('cart.update');
    Route::post('/cart/remove', 'Front\CartController@remove')->name('cart.remove');
    Route::post('/cart/clear', 'Front\CartController@clear')->name('cart.clear');

    // wishlist
    Route::get('wishlist/customer/login', 'Front\FrontController@wishlist_customer_login')->name('wishlist_customer_login');
    Route::get('/wishlist/{product_slug}', 'Front\FrontController@wishlist')->name('wishlist');
    Route::get('wishlist-detail', 'Front\FrontController@wishlist_detail')->name('wishlist_detail');
    Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout'); //customer logout

    Route::get('/customer/dashoard/login', 'Front\FrontController@customer_dashoard')->name('customer_dashoard.login');
    Route::get('/customer/dashoard', 'Front\FrontController@c_dashoard')->name('customer_dashoard');

    Route::post('/logout/submit', 'Admin\Auth\LoginController@logout')->name('admin.logout.submit');

    Route::get('/customer', 'Front\ShippingController@index')->name('loginPage');
    Route::post('/customer/login', 'Front\ShippingController@login')->name('customer.login');
    Route::post('/customer/register', 'Front\ShippingController@register')->name('customer.register');

    Route::get('/customer_dashoard_login', 'Front\ShippingController@customer_dashoard_login')->name('customer_dashoard_login');

    // Shipping
    Route::get('/shipping_info', 'Front\ShippingController@shipping')->name('shipping_info');
    Route::post('/shippinginfo_store', 'Front\ShippingController@shipping_store')->name('shippinginfo_store');



    // backend
    Auth::routes();

    Route::get('/home', 'HomeController@index')->name('home');

    Route::group(['prefix' => 'admin'], function () {

   //dasboard route
    Route::get('/', 'Admin\DashboardController@index')->name('admin.dashboard');
     //Route::resource('roles',RolesController::class);
  
	//roles create route

    Route::get('roles', 'Admin\RolesController@index')->name('admin.roles');
    Route::get('roles/create','Admin\RolesController@create')->name('admin.roles.create');
    Route::post('roles/store', 'Admin\RolesController@store')->name('admin.roles.store');
    Route::get('roles/edit/{id}','Admin\RolesController@edit')->name('admin.roles.edit');
    Route::post('roles/update/','Admin\RolesController@update')->name('admin.roles.update');
    Route::delete('roles/delete/{id}','Admin\RolesController@destroy')->name('admin.roles.delete');

    //users create route

    Route::get('users', 'Admin\UsersController@index')->name('admin.users');
    Route::get('users/create','Admin\UsersController@create')->name('admin.users.create');
    Route::post('users/store', 'Admin\UsersController@store')->name('admin.users.store');
    Route::get('users/edit/{id}','Admin\UsersController@edit')->name('admin.users.edit');
    Route::post('users/update/','Admin\UsersController@update')->name('admin.users.update');

    Route::delete('users/delete/{id}','Admin\UsersController@destroy')->name('admin.users.delete');

     //permission create route

  Route::get('permission', 'Admin\PermissionController@index')->name('admin.permission');
    Route::get('permission/create','Admin\PermissionController@create')->name('admin.permission.create');
    Route::post('permission/store', 'Admin\PermissionController@store')->name('admin.permission.store');
    Route::get('permission/edit/{id}','Admin\PermissionController@edit')->name('admin.permission.edit');
    Route::get('permission/view/{id}','Admin\PermissionController@view')->name('admin.permission.view');
    Route::post('permission/update/','Admin\PermissionController@update')->name('admin.permission.update');

    Route::delete('permission/delete/{id}','Admin\PermissionController@destroy')->name('admin.permission.delete');


    //profile route


    Route::get('profile', 'Admin\ProfileController@index')->name('admin.profile');
    Route::get('profile/edit/{id}', 'Admin\ProfileController@edit')->name('admin.profile.edit');
    Route::put('profile/update/{id}', 'Admin\ProfileController@update')->name('admin.profile.update');

    Route::post('password/update','Admin\ProfileController@updatePassword')->name('admin.password.update');



    // Login Routes
    Route::get('/login', 'Admin\Auth\LoginController@showLoginForm')->name('admin.login');
    Route::post('/login/submit', 'Admin\Auth\LoginController@login')->name('admin.login.submit');

    // Logout Routes
    Route::post('/logout/submit', 'Admin\Auth\LoginController@logout')->name('admin.logout.submit');

    // Forget Password Routes
    Route::get('/password/reset', 'Admin\Auth\ForgetPasswordController@showLinkRequestForm')->name('admin.password.request');
    Route::post('/password/reset/submit', 'Admin\Auth\ForgetPasswordController@reset')->name('admin.password.update12');

    // category

    Route::get('category', 'Admin\CategoryController@index')->name('admin.category');
    Route::get('category/create','Admin\CategoryController@create')->name('admin.category.create');
    Route::post('category/store', 'Admin\CategoryController@store')->name('admin.category.store');
    Route::get('category/edit/{id}','Admin\CategoryController@edit')->name('admin.category.edit');
    Route::post('category/update/','Admin\CategoryController@update')->name('admin.category.update');
    Route::delete('category/delete/{id}','Admin\CategoryController@destroy')->name('admin.category.delete');

    // subcategory
    Route::get('subcategory', 'Admin\SubcategoryController@index')->name('admin.subcategory');
    Route::get('subcategory/create','Admin\SubcategoryController@create')->name('admin.subcategory.create');
    Route::post('subcategory/store', 'Admin\SubcategoryController@store')->name('admin.subcategory.store');
    Route::get('subcategory/edit/{id}','Admin\SubcategoryController@edit')->name('admin.subcategory.edit');
    Route::post('subcategory/update/','Admin\SubcategoryController@update')->name('admin.subcategory.update');
    Route::delete('subcategory/delete/{id}','Admin\SubcategoryController@destroy')->name('admin.subcategory.delete');

    // product
    Route::get('product', 'Admin\ProductController@index')->name('admin.product');
    Route::get('product/create','Admin\ProductController@create')->name('admin.product.create');
    Route::post('product/store', 'Admin\ProductController@store')->name('admin.product.store');
    Route::post('product/edit','Admin\ProductController@edit')->name('admin.product.edit');
    Route::post('product/update/','Admin\ProductController@update')->name('admin.product.update');
    Route::delete('product/delete/{id}','Admin\ProductController@destroy')->name('admin.product.delete');

    Route::post('product-details','Admin\ProductController@product_details')->name('admin.product_details.view');

    // Ajax route
    Route::get('/findProductName', 'Admin\ProductController@findProductName');

    // Store
    Route::get('store', 'Admin\StoreController@index')->name('admin.store');
    Route::get('store/create','Admin\StoreController@create')->name('admin.store.create');
    Route::post('store/store', 'Admin\StoreController@store')->name('admin.store.store');
    Route::get('store/edit/{id}','Admin\StoreController@edit')->name('admin.store.edit');
    Route::post('store/update/','Admin\StoreController@update')->name('admin.store.update');
    Route::delete('store/delete/{id}','Admin\StoreController@destroy')->name('admin.store.delete');

    // Store
    Route::get('stock', 'Admin\StockController@index')->name('admin.stock');
    Route::get('stock/create','Admin\StockController@create')->name('admin.stock.create');
    Route::post('stock/store', 'Admin\StockController@store')->name('admin.stock.store');
    Route::get('stock/edit/{id}','Admin\StockController@edit')->name('admin.stock.edit');
    Route::post('stock/update/','Admin\StockController@update')->name('admin.stock.update');
    Route::delete('stock/delete/{id}','Admin\StockController@destroy')->name('admin.stock.delete');

    // logo
    Route::get('logo_offer', 'Admin\Logo_OfferController@index')->name('admin.logo_offer');
    Route::get('logo_offer/create','Admin\Logo_OfferController@create')->name('admin.logo_offer.create');
    Route::post('logo_offer/store', 'Admin\Logo_OfferController@store')->name('admin.logo_offer.store');
    Route::get('logo_offer/edit/{id}','Admin\Logo_OfferController@edit')->name('admin.logo_offer.edit');
    Route::post('logo_offer/update/','Admin\Logo_OfferController@update')->name('admin.logo_offer.update');
    Route::delete('logo_offer/delete/{id}','Admin\Logo_OfferController@destroy')->name('admin.logo_offer.delete');

    // banner
    Route::get('banner', 'Admin\BannerController@index')->name('admin.banner');
    Route::get('banner/create','Admin\BannerController@create')->name('admin.banner.create');
    Route::post('banner/store', 'Admin\BannerController@store')->name('admin.banner.store');
    Route::get('banner/edit/{id}','Admin\BannerController@edit')->name('admin.banner.edit');
    Route::post('banner/update/','Admin\BannerController@update')->name('admin.banner.update');
    Route::delete('banner/delete/{id}','Admin\BannerController@destroy')->name('admin.banner.delete');

    Route::get('order','Admin\OrderController@index')->name('admin.order');
    Route::get('/new/order','Admin\OrderController@neworder')->name('admin.new_order');
    Route::get('/order/detail/{id}','Admin\OrderController@detail')->name('admin.order.detail');
    Route::post('/order/store','Admin\OrderController@store')->name('admin.order.store');
    Route::post('/order/destroy/{id}','Admin\OrderController@destroy')->name('admin.order.destroy');
    Route::get('/order/print/{id}','Admin\OrderController@print')->name('admin.order.print');
    Route::post('/order/update/','Admin\OrderController@update')->name('admin.order.update');

   // currency
   Route::get('currency', 'Admin\CurrencyController@index')->name('admin.currency');
   Route::get('currency/create','Admin\CurrencyController@create')->name('admin.currency.create');
   Route::post('currency/store', 'Admin\CurrencyController@store')->name('admin.currency.store');
   Route::get('currency/edit/{id}','Admin\CurrencyController@edit')->name('admin.currency.edit');
   Route::post('currency/update/','Admin\CurrencyController@update')->name('admin.currency.update');
   Route::delete('currency/delete/{id}','Admin\CurrencyController@destroy')->name('admin.currency.delete');

});

Route::group(['prefix' => 'user'], function () {

    Route::get('user-order','Admin\OrderController@user_pending_order')->name('user_pending_order');
    Route::get('user-order-history','Admin\OrderController@order_history')->name('order_history');
    Route::get('/user-order-detail/{id}','Admin\OrderController@user_order_detail')->name('user_order_detail');
  
  
  });

  