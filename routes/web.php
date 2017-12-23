<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Auth::routes();

Route::get( '/', 'PublicController@home' )->name( 'home' );

Route::get( 'dash', function () {
	$user = Auth::user();

	if ( $user && $user->is_admin ) {
		return response()->redirectToRoute( 'admin.dashboard' );
	}

	return response()->redirectToRoute( 'dashboard' );
} )->name( 'dash' );

Route::group( [ 'prefix' => 'user', 'middleware' => [ 'auth', 'activated', 'subscriber' ] ], function () {
	//Deactivated Controllers
	Route::get( 'activate', 'ActivateController@index' )->name( 'activate.index' );
	Route::get( 'activate/send', 'ActivateController@send' )->name( 'activate.send' );
	Route::get( 'activate/{token}', 'ActivateController@activation' )->name( 'activate.activation' );

	// Pusher
	Route::get( 'pusher/auth', 'PusherController@auth' )->name( 'pusher.auth' );

	// Settings
	Route::get( 'settings', 'SettingsController@index' )->name( 'settings.index' );
	Route::post( 'settings', 'SettingsController@index' );

	// Permission
	Route::get( 'denied', 'PermissionsController@denied' )->name( 'permission.denied' );

	// User Dashboard
	Route::get( 'dashboard', 'DashboardController@index' )->name( 'dashboard' );
} );

/*
 * Admin Routes
 */
Route::group( [ 'prefix' => 'admin', 'middleware' => [ 'auth', 'administrator' ] ], function () {
	Route::get( '/dashboard', 'AdminController@index' )->name( 'admin.dashboard' );

	Route::get( 'user/data', 'UserController@data' )->name( 'user.data' );
	Route::resource( 'user', 'UserController' );
} );

Route::group( [ 'prefix' => 'user', 'middleware' => [ 'auth', 'contributor' ] ], function () {

} );