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

/*
 * Routes for: Authentication
 */
Auth::routes();

/*
 * Routes for: Public
 */
Route::get( '/', 'PublicController@home' )->name( 'home' );
Route::get( 'dashboard', 'PublicController@dashboard' )->name( 'dash' );
Route::get( 'page/{page}', 'PublicController@page' )->name( 'public.page' );

Route::post( 'subscribe', 'SubscriptionController@subscribe' )->name( 'public.subscribe' );
Route::post( 'page/{page}', 'PublicController@page' )->name( 'public.page' );

/*
 * Routes for:
 * Is Authenticated
 */
Route::group( [ 'prefix' => 'user', 'middleware' => [ 'auth' ] ], function () {
	//Deactivated Controllers
	Route::get( 'activate', 'ActivateController@index' )->name( 'activate.index' );
	Route::get( 'activate/send', 'ActivateController@send' )->name( 'activate.send' );
	Route::get( 'activate/{token}', 'ActivateController@activation' )->name( 'activate.activation' );
} );

/*
 * Routes for:
 * Is Authenticated
 * Is Subscriber
 * Is Activated
 */
Route::group( [ 'prefix' => 'user', 'middleware' => [ 'auth', 'activated', 'subscriber' ] ], function () {

	// Pusher
	Route::get( 'pusher/auth', 'PusherController@auth' )->name( 'pusher.auth' );

	// Permission
	Route::get( 'denied', 'PermissionsController@denied' )->name( 'permission.denied' );

	// User Dashboard
	Route::get( 'dashboard', 'DashboardController@index' )->name( 'dashboard.user' );
} );

/*
 * Routes for:
 * Is Authenticated
 * Is Administrator
 */
Route::group( [ 'prefix' => 'admin', 'middleware' => [ 'auth', 'administrator' ] ], function () {
	Route::get( '/dashboard', 'AdminController@index' )->name( 'dashboard.admin' );

	// Users
	Route::get( 'user/data', 'UserController@data' )->name( 'user.data' );
	Route::resource( 'user', 'UserController' );

	// Settings
	Route::get( 'settings', 'SettingsController@index' )->name( 'settings.index' );
	Route::post( 'settings', 'SettingsController@index' );

	// Subscribers
	Route::get( 'subscriber', 'SubscriptionController@index' )->name( 'subscriber.index' );
	Route::get( 'subscriber/data', 'SubscriptionController@data' )->name( 'subscriber.data' );
	Route::post( 'subscriber/spread', 'SubscriptionController@spread' )->name( 'subscriber.spread' );
} );

/*
 * Routes for:
 * Is Authenticated
 * Is Contributor
 */
Route::group( [ 'prefix' => 'user', 'middleware' => [ 'auth', 'contributor' ] ], function () {

} );