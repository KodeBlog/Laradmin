<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', [
   'uses' => 'HomeController@index',
   'as' => 'home',
   ]);

Route::group(['prefix' => 'admin','namespace' => 'Admin'],function(){
    Route::resource('customers', 'CustomersController');
    Route::resource('brands', 'BrandsController');
    Route::resource('product-categories', 'ProductCategoriesController');
    Route::resource('products', 'ProductsController');
    Route::resource('users', 'UsersController');

    Route::get('orders',[
        'uses' => 'OrdersController@index',
        'as' => 'orders.index',
        ]);
});
