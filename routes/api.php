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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::group(['namespace' => 'Api'], function () {

    Route::group(['namespace' => 'Auth'], function () {
        Route::post('register', 'RegisterController');
        Route::post('login', 'LoginController')->name('login');
        Route::get('logout', 'LogoutController')->middleware('auth:api');
    });
    Route::get('user/get', 'ManageUserController@getUser')->middleware('auth:api');
    Route::get('user/get/all', 'ManageUserController@getUsers')->middleware('auth:api');
    Route::post('user/save/contacts', 'ManageUserController@saveUserContacts')->middleware('auth:api');
    Route::post('user/save/avatar', 'ManageUserController@saveUserAvatar')->middleware('auth:api');
    Route::post('user/password/change', 'ManageUserController@changeUserPassword')->middleware('auth:api');
    Route::get('user/checkout', 'ManageUserController@checkout')->middleware('auth:api');
    Route::delete('user/{id}', 'ManageUserController@deleteUser')->middleware('auth:api');

    Route::get('offers/get', 'ManageOffersController@getOffers')->middleware('auth:api');
    Route::get('offers/get/all', 'ManageOffersController@getAllOffers')->middleware('auth:api');
    Route::get('offers/get/{id}', 'ManageOffersController@getOffer')->middleware('auth:api');
    Route::post('offers/save', 'ManageOffersController@saveOffers')->middleware('auth:api');
    Route::delete('offers/media/{id}', 'ManageOffersController@deleteMedia')->middleware('auth:api');
    Route::delete('offers/{id}', 'ManageOffersController@deleteOffer')->middleware('auth:api');

    Route::get('category/get/{id}', 'ManageCategoriesController@getCategory')->middleware('auth:api');
    Route::post('category/save', 'ManageCategoriesController@saveCategory')->middleware('auth:api');

    Route::post('news/add/admin', 'ManageNewsController@addAdminNews')->middleware('auth:api');

    Route::get('prof_categories/get', 'ManageUserController@getProfCategories')->middleware('auth:api');
});

Route::resource('categories', 'CategoryController');
Route::resource('news', 'NewsController');
Route::resource('offers', 'OfferController');
Route::resource('users', 'UserController');
Route::resource('chunck', 'ChunckController');
