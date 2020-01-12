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

Route::get('get-ip-details', function () {
    $ip = '66.102.0.0';
    $data = \Location::get($ip);
    dd($data);
});

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::middleware(['auth'])->group(function () {

    Route::get('/home', 'HomeController@index')->name('home');

    // Chat Room
    Route::get('/chatroom/{id}', 'ChatController@chatroom');
    Route::get('/loadmsg', function () {
        return view('include.__msg-chatmsg-box');
    });

    // follow System
    Route::get('/follow/{id}', 'HomeController@follow');
    Route::get('/unfollow/{id}', 'HomeController@unfollow');

    // Like System
    Route::get('/like/{id}', 'HomeController@like');
    Route::get('/unlike/{id}', 'HomeController@unlike');

    Route::get('/my/profile', 'MyController@profile')->middleware('logs-out-banned-user');
    Route::post('/my/profile_save', 'MyController@profile_save');

    Route::get('/my/following', 'MyController@following');
    Route::get('/my/follower', 'MyController@follower');

});

Route::middleware(['auth', 'is_admin'])->group(function () {

    Route::get('/zadmin/user/ban/{id}', 'Admin\\UserController@ban');
    Route::get('/zadmin/user/unban/{id}', 'Admin\\UserController@unban');
    Route::resource('/zadmin/user', 'Admin\\UserController');
    Route::resource('/zadmin/banner', 'Admin\\BannerController');

    // ajax
    Route::any('ajaxSwitchStatus', 'AjaxController@ajaxSwitchStatus');

});

Route::get('/redirect', 'SocialAuthFacebookController@redirect');
Route::get('/callback', 'SocialAuthFacebookController@callback');

// Private Message
Route::group(['prefix' => 'messages'], function () {
    Route::get('/', ['as' => 'messages', 'uses' => 'MessagesController@index']);
    Route::get('create', ['as' => 'messages.create', 'uses' => 'MessagesController@create']);
    Route::post('/', ['as' => 'messages.store', 'uses' => 'MessagesController@store']);
    Route::get('{id}', ['as' => 'messages.show', 'uses' => 'MessagesController@show']);
    Route::put('{id}', ['as' => 'messages.update', 'uses' => 'MessagesController@update']);

    Route::get('to/{id}', 'MessagesController@to');
});
