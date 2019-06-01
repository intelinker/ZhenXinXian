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


Route::get('login', 'UserController@login')->name('login');
Route::post('signin', 'UserController@signin');
Route::get('logout', 'UserController@logout');
Route::get('inituser', 'UserController@initUser');

Route::group(['middleware'=>'auth', 'web'], function() {
    Route::get('/', 'ActivityController@index');
    Route::resource('activities', 'ActivityController');
    Route::resource('commodities', 'CommodityController');
    Route::resource('users', 'UserController');
    Route::resource('customers', 'CustomerController');
    Route::resource('orders', 'OrderController');
    Route::resource('distributors', 'DistributorController');
    Route::get('usersearch/{name}', 'UserController@search');
    Route::get('productsearch/{title}/{level1}/{level2}', 'CommodityController@search');
    Route::get('activitystatus/{activityid}/{status}', 'ActivityController@setStatus');
    Route::get('customersexport', 'CustomerController@customersExport')->name('customersexport');
    Route::get('channelcreate0', 'OrderController@channelCreate0');
    Route::get('channelcreate1/{channel1}', 'OrderController@channelCreate1');
    Route::get('channelcreate/{level}/{channel1}/{channel2}', 'OrderController@channelCreate');
    Route::post('customersearch', 'CustomerController@search');
    Route::get('distributorvisible/{distributorid}/{visible}', 'DistributorController@setVisible');

});
