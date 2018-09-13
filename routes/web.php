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

Route::get('/', function () {
    return view('login');
});
Route::get('dashboard', function () {
    return view('welcome');
});
Route::post('authenticate', 'LoginController@authenticateuser');

Route::group(['middleware' => 'check-userauth'], function () {


    Route::get('category', 'CategoryController@show');
    Route::get('category/all', 'CategoryController@allCategories');
    Route::post('category', 'CategoryController@create');
    Route::delete('category/{id}', 'CategoryController@delete');
    Route::put('category', 'CategoryController@update');
    Route::get('category/detail/{id}', 'CategoryController@getCategoryInfo');


    Route::get('images/upload', 'ImagesController@showImageUpload');
    Route::get('images/all', 'ImagesController@showImages');
    Route::get('images/banners', 'ImagesController@showBanners');
    Route::get('images/category/{id}', 'ImagesController@showCategoryImages');
    Route::get('images/{id}', 'ImagesController@getImageInfo');
    Route::post('images/upload', 'ImagesController@uploadImage');
    Route::post('images/banner/upload', 'ImagesController@uploadBanner');
    Route::get('images/getallbanners', 'ImagesController@getAllBanners');
    Route::delete('images/{publicid}', 'ImagesController@deleteImage');
    Route::post('images/update', 'ImagesController@updateImage');
    Route::get('images/banner/{bannerid}', 'ImagesController@getBannerDetail');
    Route::delete('images/banner/{publicid}', 'ImagesController@deleteBanner');


    Route::get('messages/reservations', 'MessagesController@showReservations');
    Route::get('messages/new', 'MessagesController@showNewMessages');
    Route::get('messages/all', 'MessagesController@showMessages');
    Route::get('messages/user/{userid}', 'MessagesController@showUserMessages');

    Route::post('messages/reply', 'MessagesController@replyMessage');


    Route::get('reservations/all', 'MessagesController@allReservations');


    Route::get('users', 'UsersController@show');
    Route::get('users/all', 'UsersController@allUsers');
    Route::post('user', 'UsersController@create');
    Route::put('user', 'UsersController@update');
    Route::get('user/{id}', 'UsersController@getUserInformation');

    Route::delete('user/{id}', 'UsersController@delete');
});


Route::get('/logout', function() {
    Session::flush();

    return redirect('/');
});
