<?php
use Illuminate\Database\Eloquent\ModelNotFoundException;

/*
|--------------------------------------------------------------------------
| Application & Route Filters
|--------------------------------------------------------------------------
|
| Below you will find the "before" and "after" events for the application
| which may be used to do any work before or after a request into your
| application. Here you may also register your custom route filters.
|
*/

App::before(function($request)
{
	if(!Schema::hasTable('migrations')){
		Artisan::call('migrate:install');
		Artisan::call('migrate');
        Artisan::call('db:seed');
	}
	
	if(is_banned_keywords(Request::url())){
		App::abort(404, 'Page not found');
	}

	spp_setinfo();
});


App::after(function($request, $response)
{
	//
});

App::missing(function()
{
    return Redirect::route('home')->with('message', "The requested url doesn't exist!");
});

App::error(function(ModelNotFoundException $e)
{
    return Redirect::route('home')->with('message', "The requested url doesn't exist!");
});
/*
|--------------------------------------------------------------------------
| Authentication Filters
|--------------------------------------------------------------------------
|
| The following filters are used to verify that the user of the current
| session is logged into this application. The "basic" filter easily
| integrates HTTP Basic authentication for quick, simple checking.
|
*/

Route::filter('auth', function()
{
	$osFamily = BrowserDetect::osFamily(); 
	if($osFamily == 'AndroidOS' && Config::get('videoengine.ve_android.disable_signup_on_download') && Config::get('videoengine.ve_android.redirect_download_to_apk')){
		return Redirect::to(Config::get('videoengine.ve_android.apk_url'));
	}

	if ( Auth::guest() ) // If the user is not logged in
    {
        // Set the loginRedirect session variable
        Session::put( 'loginRedirect', Request::url() );

        // Redirect back to user login
        return Redirect::to( 'user/login' );
    }
});


$need_login = Config::get('videoengine.need_login');
$register_on = Config::get('videoengine.register_on');

if ($need_login && $register_on) {
    Route::when('download*', 'auth'); 
}

Route::filter('auth.basic', function()
{
	return Auth::basic();
});

/*
|--------------------------------------------------------------------------
| Guest Filter
|--------------------------------------------------------------------------
|
| The "guest" filter is the counterpart of the authentication filters as
| it simply checks that the current user is not logged in. A redirect
| response will be issued if they are, which you may freely change.
|
*/

Route::filter('guest', function()
{
	if (Auth::check()) return Redirect::to('/');
});

/*
|--------------------------------------------------------------------------
| CSRF Protection Filter
|--------------------------------------------------------------------------
|
| The CSRF filter is responsible for protecting your application against
| cross-site request forgery attacks. If this special token in a user
| session does not match the one given in this request, we'll bail.
|
*/

Route::filter('csrf', function()
{
	if (Session::token() != Input::get('_token'))
	{
		throw new Illuminate\Session\TokenMismatchException;
	}
});