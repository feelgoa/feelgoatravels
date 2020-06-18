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

/*
Email Routes
*/

#Route::get('/sendemail','MailController@basic_email');
/*User Route */

Route::get('/', 'PagesController@index');
Route::get(HOME_URL, 'PagesController@home');
Route::get(PACKAGES_URL, 'PagesController@packages');
Route::get(LOCATION_URL, 'PagesController@locations');
Route::get(BOOKING_URL, 'PagesController@bookings');
Route::get(CONTACTUS_URL, 'PagesController@contactus');
Route::get(GALLERY_URL, 'PagesController@gallery');

Route::any('recapcha-page', 'PagesController@recapchay');

/*Admin ROUTES */
/* 'middleware' => ['authenticate'] */
Route::get(ADMIN_BASE.ADMIN_LOGIN_URL, 'AdminController@login');
Route::group(['prefix'=>ADMIN_BASE,'middleware' => []], function(){
	Route::get(ADMIN_HOME_URL, 'AdminController@home');
	Route::get(ADMIN_LOGOUT_URL, 'AdminController@logout');
	Route::get(ADMIN_HOME_CONTENT_URL, 'AdminController@page_content');

	Route::get('/', function () {
		return abort(404);
	});
});
Route::post(BOOKING_URL,'PagesController@insert')->name('bookings.insert');
/*Route::get('/', function () {
	return view('landing');
});
*/


