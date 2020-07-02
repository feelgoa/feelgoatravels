<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('login', 'API\FguserController@login');
Route::post('logout', 'API\FguserController@logout');

Route::post('register', 'API\FguserController@register');
Route::group(['middleware' => 'auth:api'], function(){
    Route::post('details', 'API\FguserController@details');
});

Route::post(SAVE_CONTACT_US_FORM_API, 'API\ContactusController@save_contact_us_form');
Route::post(SAVE_BOOKING_FORM_API, 'API\FguserController@addbookingdetails');
Route::post(REQUEST_BOOKING_DETAILS_API, 'API\FguserController@get_booking_status_form');


Route::get('get-addr-location', 'API\FguserController@get_addr_location_details');
Route::get(SENDMAIL,'API\MailController@send_mail');
Route::get('pay','API\PaymentsController@make_payments');
