<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	return View::make('hello');
});

Route::get('login', function(){
	return View::make('user.login-page');
});
Route::post('user/auth','HomeController@loginUser');

Route::group(array('before' => 'userAuth'),function(){

	//users
	Route::get('dashboard','HomeController@getDashboard');
	Route::get('logout','HomeController@logout');

	//blogs
	Route::post('blog/add','BlogController@add');
	Route::post('blog/update/{id}','BlogController@update');	
	
	Route::get('blog/add-blog','BlogController@addBlog');
	Route::get('blog','BlogController@listing');
	Route::get('blog/view/{id}','BlogController@showblogs');
	Route::get('blog/delete/{id}','BlogController@delete');
	Route::get('blog/edit/{id}','BlogController@edit');	
});



Route::get('temp',function(){
	
});