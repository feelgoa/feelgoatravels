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

Route::post('login', 'API\FgusersController@login');
Route::post('logout', 'API\FgusersController@logout');

Route::post('register', 'API\FgusersController@register');
Route::group(['middleware' => 'auth:api'], function(){
    Route::post('details', 'API\FgusersController@details');
});

Route::post(SAVE_CONTACT_US_FORM_API, 'API\ContactusController@save_contact_us_form');
Route::post(SAVE_BOOKING_FORM_API, 'API\FgusersController@addbookingdetails');
Route::post(REQUEST_BOOKING_DETAILS_API, 'API\FgusersController@get_booking_status_form');


Route::get('get-addr-location', 'API\FgusersController@get_addr_location_details');
Route::get(SENDMAIL,'API\MailController@send_mail');
Route::get('pay','API\PaymentsController@make_payments');
