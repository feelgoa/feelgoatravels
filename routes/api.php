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

Route::post('login', 'API\UserController@login');
Route::post('logout', 'API\UserController@logout');

Route::post('register', 'API\UserController@register');
Route::group(['middleware' => 'auth:api'], function(){
    Route::post('details', 'API\UserController@details');
});

Route::post(SAVE_CONTACT_US_FORM_API, 'API\ContactusController@save_contact_us_form');

Route::get('get-addr-location', 'API\UserController@get_addr_location_details');
Route::get(SENDMAIL,'API\MailController@send_mail');