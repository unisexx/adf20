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

// Route::get('/', [
//     'uses'       => 'UsersController@profile',
//     'middleware' => 'forbid-banned-user',
// ]);

Route::get('/my/profile', 'MyController@profile')->middleware('logs-out-banned-user');
Route::post('/my/profile_save', 'MyController@profile_save');

Route::get('/my/following', 'MyController@following');
Route::get('/my/follower', 'MyController@follower');

Route::get('/redirect', 'SocialAuthFacebookController@redirect');
Route::get('/callback', 'SocialAuthFacebookController@callback');

// Zadmin
Route::get('/zadmin/user/ban/{id}', 'Admin\\UserController@ban')->middleware('is_admin');
Route::get('/zadmin/user/unban/{id}', 'Admin\\UserController@unban')->middleware('is_admin');
Route::resource('/zadmin/user', 'Admin\\UserController')->middleware('is_admin');
Route::resource('/zadmin/banner', 'Admin\\BannerController')->middleware('is_admin');

// Route::namespace ('Admin')->prefix('zadmin')->middleware('is_admin')->group(function () {
//     // namespace ('Admin') = Controller ที่อยู่ใน Folder Admin
//     // prefix('zadmin') = url ที่เริ่มด้วย zadmin/...
//     Route::resource('user', 'UserController');
// });

// ajax
Route::any('ajaxSwitchStatus', 'AjaxController@ajaxSwitchStatus');
