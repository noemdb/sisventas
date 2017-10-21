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
// \Debugbar::disable();
// \Debugbar::enable();


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('admin/users/trash', ['as' =>  'users.trash', 'uses' => 'Admin\UserController@trash', 'middleware'=>['auth','IsAdmin']]);
Route::get('admin/profiles/trash', ['as' =>  'profiles.trash', 'uses' => 'Admin\ProfileController@trash', 'middleware'=>['auth','IsAdmin']]);

Route::get('admin/users/{id}/force_destroy', ['as' =>  'users.force_destroy', 'uses' => 'Admin\UserController@force_destroy', 'middleware'=>['auth','IsAdmin']]);
Route::get('admin/profiles/{id}/force_destroy', ['as' =>  'profiles.force_destroy', 'uses' => 'Admin\ProfileController@force_destroy', 'middleware'=>['auth','IsAdmin']]);

Route::group(['prefix'=>'admin','middleware'=>['auth','IsAdmin'],'namespace'=>'Admin'], function(){

	Route::resource('users','UserController');
	Route::resource('profiles','ProfileController');
	Route::resource('loggs','LoggsController');
    Route::resource('statususer','StatusUserController');
    Route::resource('activities','ActivityController');

	Route::get('users/{id}/restore', ['as' =>  'users.restore', 'uses' => 'UserController@restore']);
	Route::get('profiles/{id}/restore', ['as' =>  'profiles.restore', 'uses' => 'ProfileController@restore']);
});


