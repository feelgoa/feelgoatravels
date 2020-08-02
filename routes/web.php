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
Route::get(BOOKING_URL_HOME, 'PagesController@bookings_cover');
Route::get(BOOKING_URL_TOUR, 'PagesController@tour_bookings');
Route::get(BOOKING_URL_HOTEL, 'PagesController@hotel_bookings');
Route::get(BOOKING_URL_RENTALS, 'PagesController@rental_bookings');
Route::get(BOOKING_URL_RENTALS_BOOKING,'PagesController@rental_booking_details')->name('rental_booking_details.show');;
Route::get(BOOKING_URL_WEDDING, 'PagesController@wedding_car_bookings');
Route::get(CONTACTUS_URL, 'PagesController@contactus');
Route::get(GALLERY_URL, 'PagesController@gallery');
Route::get(BOOKING_STATUS_URL, 'PagesController@bookingstatus');


//Route::any('recapcha-page', 'PagesController@recapchay');

/*Admin ROUTES */
/* 'middleware' => ['authenticate'] */

Route::get(ADMIN_BASE.ADMIN_LOGIN_URL, 'AdminController@login');
Route::group(['prefix'=>ADMIN_BASE,'middleware' => []], function(){
	Route::get(ADMIN_HOME_URL, 'AdminController@home');
	Route::get(ADMIN_LOGOUT_URL, 'AdminController@logout');
	Route::get(ADMIN_HOME_CONTENT_URL, 'AdminController@page_content');
	Route::get(ADMIN_ENQUIRYT_URL, 'AdminController@enquirydetails');
	Route::get(ADMIN_ENQUIRYT_URL.'/{slug}', 'AdminController@getindividual');
		
	Route::get('/', function () {	
		return abort(404);	
	});	
});

Route::post(BOOKING_URL_TOUR,'PagesController@tour_bookings_insert')->name('tour_bookings.insert');
Route::post(BOOKING_URL_HOTEL,'PagesController@hotel_bookings_insert')->name('hotel_bookings.insert');
Route::post(BOOKING_URL_RENTALS,'PagesController@rental_bookings_insert')->name('rental_bookings.insert');
Route::post(BOOKING_STATUS_URL,'API\UsersController@getbookingstatusdetails');

