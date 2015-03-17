<?php
if(!function_exists('is_banned_keywords')) require('functions.php');

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
$permalinks = Config::get('videoengine.permalinks');

Route::get('/', array('as' => 'home', 'uses' => 'HomeController@showWelcome'));

Route::get('/info/{dojokey}', array('as' => 'info', 'uses' => 'HomeController@info'));

Route::get('/upgrade', array('as' => 'upgrade', 'uses' => 'HomeController@upgrade'));
Route::get('download/{id}/{slug}.{format}', array('as' => 'download', 'uses' => 'HomeController@download'));

Route::get($permalinks['video'], array('as' => 'video', 'uses' => 'VideosController@show'));
Route::get($permalinks['search'], array('as' => 'term', 'uses' => 'TermsController@show'));
Route::get($permalinks['page'], 'HomeController@page');
Route::get('popular', 'HomeController@popular');
Route::get('newest', 'HomeController@newest');
Route::get('random', 'HomeController@random');
Route::get($permalinks['category'], array('as' => 'category', 'uses' => 'HomeController@category'));
Route::get($permalinks['sitemap'], 'HomeController@sitemap');
Route::post('/', 'HomeController@search');


Route::get( 'user/signup',                 'UserController@create');
Route::post('user',                        'UserController@store');
Route::get( 'user/login',                  'UserController@login');
Route::post('user/login',                  'UserController@do_login');
Route::get( 'user/confirm/{code}',         'UserController@confirm');
Route::get( 'user/forgot_password',        'UserController@forgot_password');
Route::post('user/forgot_password',        'UserController@do_forgot_password');
Route::get( 'user/reset_password/{token}', 'UserController@reset_password');
Route::post('user/reset_password',         'UserController@do_reset_password');
Route::get( 'user/logout',                 'UserController@logout');

// about page (app/views/about.blade.php)
Route::get('about', 'HomeController@about');
Route::get('privacy', 'HomeController@privacy');
Route::get('terms', 'HomeController@terms');
Route::get('copyright', 'HomeController@copyright');

App::missing(function($exception)
	{
		// shows an error page (app/views/error.blade.php)
		// returns a page not found error
		return Response::view('error', array(), 404);
	});