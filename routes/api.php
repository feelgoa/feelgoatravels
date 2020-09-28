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

Route::post('login', 'API\UsersController@login');
Route::post('logout', 'API\UsersController@logout');

Route::post('register', 'API\UsersController@register');
Route::group(['middleware' => 'auth:api'], function(){
    Route::post('details', 'API\UsersController@details');
});

Route::post(SAVE_CONTACT_US_FORM_API, 'API\ContactusController@save_contact_us_form');
Route::post(SAVE_BOOKING_FORM_API, 'API\UsersController@addbookingdetails');
Route::post(REQUEST_BOOKING_DETAILS_API, 'API\UsersController@get_booking_status_form');
Route::post(VERIFY_EXISTING_PNR_API, 'API\UsersController@verifypnr');
Route::post(REPLYCOMMENT, 'API\UsersController@replycomment');
Route::post(LOGINCHECK, 'API\UsersController@logiadmincheck');
Route::post(UPDATE_BOOKING_STATUS, 'API\UsersController@update_booking_status');
Route::post(FETCH_EMAIL_FOR_PAYMENT, 'API\UsersController@fetchemailcontent');
Route::post(SEND_EMAIL_FOR_PAYMENT, 'API\UsersController@sendpaymentemail');

Route::get('get-addr-location', 'API\UsersController@get_addr_location_details');
Route::get(SENDMAIL,'API\MailController@send_mail');
Route::get('pay','API\PaymentsController@make_payments');

