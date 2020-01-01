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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// follow System
Route::get('/follow/{id}', 'HomeController@follow');
Route::get('/unfollow/{id}', 'HomeController@unfollow');

// Like System
Route::get('/like/{id}', 'HomeController@like');
Route::get('/unlike/{id}', 'HomeController@unlike');

Route::get('/my/profile', 'MyController@profile');
Route::post('/my/profile_save', 'MyController@profile_save');

Route::get('/redirect', 'SocialAuthFacebookController@redirect');
Route::get('/callback', 'SocialAuthFacebookController@callback');

Route::get('admin_area', ['middleware' => 'admin', function () {
    //
}]);
