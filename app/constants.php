<?php

define('SITE_URL', 'http://test.feelgoatravels.com/');
define('ADMIN_URL','http://test.feelgoatravels.com/admin');
define('API_URL','http://test.feelgoatravels.com/api');
define('SITE_NAME','Feel Goa');
define('SITE_SHORT_DESC','Feel Goa - Tours and Travels');

/*Config*/
define('SMTP_HOST_VALUE','smtp.hostinger.in');
define('SMTP_PORT_VALUE','587');
define('EMAIL_USERNAME','team@feelgoatravels.com');
define('EMAIL_PASSWORD','F33lG0aTravel$');
define('EMAIL_SENDER','team@feelgoatravels.com');
define('FACEBOOK_LINK','https://www.facebook.com/');
define('FEELGOA_LINK','https://www.feelgoatravels.com/');
define('EMAIL_HEADER','<div style="border:1px solid grey;border-bottom:none;padding:12px;">');
define('EMAIL_FOOTER','</div><div style="border:1px solid rgb(206, 50, 50);padding:12px;background-color:rgb(206, 50, 50);color:white"><table<tr colspan="2"><td><b><span>Regards,</span></td></tr><tr colspan="2"><td><p>Team Feel Goa</p></b></td></tr></table><div>You can visit us at <a target="_blank" href="'.FEELGOA_LINK.'" style="color:white">feelgoatravels.com</a><br>Also check us out on our <a target="_blank" href="'.FACEBOOK_LINK.'" style="color:white">Facebook</a> page</div>');
define('FG_TEAM','Feel Goa');
define('CONTACT_US_CUSTOMER_SUBJECT','We got it !');
define('CONTACT_US_ADMIN_SUBJECT','Contact Us');
define('EMAIL_GMAIL_RECIEVER','feelgoatravelsofficial@gmail.com');
define('BOOKINGS_CUSTOMER_SUBJECT','Bookings Request');
define('BOOKINGS_ADMIN_SUBJECT','Bookings Enquiry');
define('EMAIL_MANAGER_URL','https://webmail1.hostinger.in/');
define('PAYU_MANAGER_URL','https://www.payu.in/');
define('REFERENCE_ID','ReferenceId');


define('PAYMENT_DETAILS_SUBJECT','Payments Details');
#define('PAYU_BASE_URL','https://secure.payu.in');
define('PAYU_BASE_URL','https://sandboxsecure.payu.in');

define('CONTACTUS_EMAIL_TEMPLATE', 1);
define('CONTACTUS_UPDATE_EMAIL_TEMPLATE_ADMIN', 2);
define('BOOKINGS_EMAIL_TEMPLATE', 3);
define('BOOKINGS_EMAIL_TEMPLATE_ADMIN', 4);
define('CONTACT_US_REPLY', 5);
define('BOOKING_PAYMENT_TEMPLATE', 6);
define('CONTACTUS_EMAIL_THREAD', 7);
define('BOOKING_VEHICLE', 8);
define('HOTEL_BOOKING', 9);
define('TOUR_BOOKING', 10);
/*********************************/

/* Page Titles*/

/*Frontend Titles*/
define('HOME_TITLE','Home');
define('PACKAGES_TITLE','Packages');
define('LOCATIONS_TITLE','Locations');
define('GALLERY_TITLE','Gallery');
define('CONTACTUS_TITLE','Contact-us');
define('BOOKING_STATUS_TITLE','Booking status');
define('BOOKING_TITLE_HOME','Bookings');
define('BOOKING_TITLE_TOUR','Tour Booking');
define('BOOKING_TITLE_HOTEL','Hotel Booking');
define('BOOKING_TITLE_RENTALS','Rental Booking');
define('BOOKING_TITLE_WEDDING','Wedding Car Booking');
define('PAYMENTS_TITLE','Payments');

/*Admin Titles*/
define('ADMIN_DASHBOARD_TITLE','Dashboard');
define('ADMIN_CONTENT_TITLE','Content');
define('ADMIN_ENQUIRY_TITLE','Enquiry');
define('ADMIN_LOGIN_TITLE','Login');
define('ADMIN_BOOKING_TITLE','Tour');
define('ADMIN_VEHICLE_RENTAL_TITLE','Vehicle Rental');
define('ADMIN_WEDDING_CAR_TITLE','Weeding Car');
define('ADMIN_PAYMENTS_TITLE','Payments');
/*********************************/
/* Routes */

/* Frontend Routes */
define('HOME_URL','/home');
define('LOCATION_URL','/locations');
define('PACKAGES_URL','/packages');
define('BOOKING_URL_HOME','/bookings');
define('BOOKING_URL_TOUR','/tour-booking');
define('BOOKING_URL_HOTEL','/hotel-booking');
define('BOOKING_URL_RENTALS','/rental-booking');
define('BOOKING_URL_RENTALS_BOOKING','/rental-booking/{vehicle}');
define('BOOKING_URL_WEDDING','/wedding-car-booking');


define('CONTACTUS_URL','/contact-us');
define('GALLERY_URL','/gallery');
define('BOOKING_STATUS_URL','/booking-status');
define('BOOKING_STATUS_DETAILS_URL','/booking-status-details');
define('BOOKING_PAYMENTS_URL','/payments-details');


/* Admin Routes */
define('ADMIN_BASE','/admin');
define('ADMIN_HOME_URL','/home');
define('ADMIN_LOGIN_URL','/login');
define('ADMIN_LOGOUT_URL','/logout');
define('ADMIN_HOME_CONTENT_URL','/home-page-content');
define('ADMIN_ENQUIRYT_URL','/enquiry-details');
define('ADMIN_LOGIN_PAGE_URL','/login-user');
define('ADMIN_BOOKINGS_URL','/booking-details');

/* API Routes*/

define('API_GET_ADDRLOCATION','/get-addr-location');
define('SENDMAIL','/send-mail');
define('SAVE_CONTACT_US_FORM_API','/save-contact-us');
define('SAVE_BOOKING_FORM_API','/save-booking-form');
define('MAKEPAYMENTS','/make-payments');
define('REQUEST_BOOKING_DETAILS_API','/get-booking-details');
define('VERIFY_EXISTING_PNR_API','/verify-existing-pnr');
define('REPLYCOMMENT','/reply-admin-comment');
define('LOGINADMIN','/admin-login-user');
define('LOGINCHECK','/login-check');  
define('UPDATE_BOOKING_STATUS','/update-booking-status');
define('FETCH_EMAIL_FOR_PAYMENT','/get-payment-email-content');
define('SEND_EMAIL_FOR_PAYMENT','/send-payment-email');


define('PAYMENT_SUCCESS_URL','/suc');
define('PAYMENT_FAILURE_URL','/fail');

define('ADMIN_PAGES_CONST',
	array(
		ADMIN_HOME_CONTENT_URL => 1
		)
);

define('DAY1_DAY2_CHARGE',250);
define('DAY3_DAY4_CHARGE',500);

define('BOOKING_TYPE_TOUR',1);
define('BOOKING_TYPE_HOTEL',2);
define('BOOKING_TYPE_VEHICLE',3);
define('BOOKING_TYPE_WEDDING',4);

define('RECIEVED_NOT_CONFIRMED',1);
define('RECIEVED_AND_PROCESSING',2);
define('REPLIEDTO_CUSTOMER',3);
define('REPLIEDTO_CUSTOMER_WAITING_PAYMENT',4);
define('PAYMENT_RECIEVED_CONFIRM',5);
define('PAYMENT_FAILED',6);
define('PAYMENT_NOT_RECIEVED',7);
define('TRAVEL_COMPLETED',8);
define('REFUND_INITIATED',9);
define('REFUND_COMPLETED',10);
define('CANCEL',11);

define('BOOKING_STATUS_VALUES',
	array (
		RECIEVED_NOT_CONFIRMED =>'Booking Received (Not confirmed)',
		RECIEVED_AND_PROCESSING => 'Booking Received - Checking availablity (Not confirmed)',
		REPLIEDTO_CUSTOMER =>'Replied to Customer - Awaiting reply (Not Confirmed)',
		REPLIEDTO_CUSTOMER_WAITING_PAYMENT =>'Sent payment link to Customer - Awaiting payment (Not Confirmed)',
		PAYMENT_RECIEVED_CONFIRM => 'Recieved Payment (Confirmed)',
		PAYMENT_FAILED => 'Payment Failed - (Not Confirmed)',
		PAYMENT_NOT_RECIEVED => 'Payment not recieved (Not Confirmed)',
		TRAVEL_COMPLETED => 'Done',
		REFUND_INITIATED => 'Refund has been initited',
		REFUND_COMPLETED => 'Refund completed',
		CANCEL => 'Canceled',
	)
);

/*Error Messages */

define('VALIDATION_FAILED','Validation Error (Data provided is invalid or incomplete)');
define('FORM_DATA_SUBIMITTED_CONTACT_US_FORM','Thank you for contacting us. We will get back to you soon.');
define('FORM_SUBMIT_FAILED','Something is went wrong. We could not save your data. Please try again.');
define('FORM_SUBMIT_WITHOUT_EMAIL_FAILED', 'You have successfully submited your form.');
define('EMAIL_SENDING_ERROR', 'There is some issue with sending email.');
define('RECAPTCH_REQUIRED','Recapcha is not clicked. Please check mark the box to continue');
define('BOOKING_STATUS_FETCH_FAILED','Sorry we could not fetch the details. Please make sure you have entered the correct details.');
define('PNR_SUCCESSFUL_VERIFICATION','PNR is successfully verified.');
define('PNR_FAILED_VERIFICATION','PNR is could not be verified.');
define('COMMENT_ADD_SUCCESS_VERIFICATION','Comment successfully added and an email was sent to the customer.');
define('COMMENT_ADD_FAILED','Something went wrong. Please try again in some time.');
define('STATUS_UPDATE_SUCCESS','Status updated successfully.');
define('STATUS_UPDATE_FAILED','Status updated failed.');
/*Google reCapcha*/

define("RECAPCHA_SITE_KEY","6Le8fv4UAAAAADhwT9U00tMkk548oepW6gXdkxKr");
define("RECAPCHA_SECRET_KEY","6Le8fv4UAAAAAFRhTptH-7bKGT63oy7g7ZiYy2i9");
define("IV_ENCRYPTION_VALUE","1234567891011121");
define("ENCRYPTION_KEY","FEE!G()TrAv#!$");

/*dev*/
define("PAYU_MERCHANT_KEY","nIRFHUsB");
define("PAYU_SALT_KEY","AcLhcxPoOT");

define("PAYMENT_SERVICE_PROVIDER",'payu_paisa');
