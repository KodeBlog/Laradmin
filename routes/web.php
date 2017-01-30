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

Route::group(['prefix' => 'admin','middleware' => 'auth','namespace' => 'Admin'],function(){
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

//Auth::routes();
Route::group(['prefix' => 'admin','namespace' => 'Auth'],function(){
    // Authentication Routes...
    Route::get('login', 'LoginController@showLoginForm')->name('login');
    Route::post('login', 'LoginController@login');
    Route::post('logout', 'LoginController@logout')->name('logout');

    // Password Reset Routes...
    Route::get('password/reset', 'ForgotPasswordController@showLinkRequestForm')->name('password.reset');
    Route::post('password/email', 'ForgotPasswordController@sendResetLinkEmail')->name('password.email');
    Route::get('password/reset/{token}', 'ResetPasswordController@showResetForm')->name('password.reset.token');
    Route::post('password/reset', 'ResetPasswordController@reset');
});

Route::get('/home', 'HomeController@index');
