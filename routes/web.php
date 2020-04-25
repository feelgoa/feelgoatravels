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

/*User Route */

Route::get('/', 'PagesController@home');

Route::get('/landing', function () {
	return view('landing');
});


/*Admin ROUTES */
/* 'middleware' => ['authenticate'] */
Route::get(ADMIN_BASE.ADMIN_LOGIN_URL, 'AdminController@login');
Route::group(['prefix'=>ADMIN_BASE,'middleware' => []], function(){
	Route::get(ADMIN_HOME_URL, 'AdminController@home');
	Route::get(ADMIN_LOGOUT_URL, 'AdminController@logout');

	Route::get('/', function () {
		return abort(404);
	});
});


/*Route::get('/', function () {
	return view('landing');
});
*/


