<?php

use Illuminate\Http\Request;

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

Route::group(['namespace' => 'Api'], function () {

    Route::group(['namespace' => 'Auth'], function () {
        //Route::post('register', 'RegisterController');
        Route::post('login', 'LoginController')->name('login');
        Route::post('logout', 'LogoutController')->middleware('auth:api');
    });
});

Route::resource('categories', 'CategoryController');
Route::resource('news', 'NewsController');
Route::resource('offers', 'OfferController');
Route::resource('users', 'UserController');
Route::resource('login', 'LoginUserController');
Route::resource('register', 'RegisterUserController');
Route::resource('chunck', 'ChunckController');
