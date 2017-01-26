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
// Authentication Routes...
$this->get('admin/login', 'Auth\LoginController@showLoginForm')->name('login');
$this->post('admin/login', 'Auth\LoginController@login');
$this->post('admin/logout', 'Auth\LoginController@logout')->name('logout');

// Password Reset Routes...
$this->get('admin/password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.reset');
$this->post('admin/password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
$this->get('admin/password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset.token');
$this->post('admin/password/reset', 'Auth\ResetPasswordController@reset');

Route::get('/home', 'HomeController@index');
