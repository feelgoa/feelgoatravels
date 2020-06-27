<?php

define('SITE_URL', 'http://127.0.0.1');
define('ADMIN_URL','http://127.0.0.1/admin');
define('API_URL','http://127.0.0.1/api');
define('SITE_NAME','Feel Goa');
define('SITE_SHORT_DESC','Feel Goa - Tours and Travels');

/*Emails Config*/
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

define('CONTACTUS_EMAIL_TEMPLATE', 1);
define('CONTACTUS_UPDATE_EMAIL_TEMPLATE_ADMIN', 2);
define('BOOKINGS_EMAIL_TEMPLATE', 3);
define('BOOKINGS_EMAIL_TEMPLATE_ADMIN', 4);


/*********************************/

/* Page Titles*/

/*Frontend Titles*/
define('HOME_TITLE','Home');
define('PACKAGES_TITLE','Packages');
define('LOCATIONS_TITLE','Locations');
define('BOOKINGS_TITLE','Bookings');
define('GALLERY_TITLE','Gallery');
define('CONTACTUS_TITLE','Contact-us');
define('BOOKING_STATUS_TITLE','Booking status');

/*Admin Titles*/
define('ADMIN_DASHBOARD_TITLE','Dashboard');
define('ADMIN_CONTENT_TITLE','Content');
/*********************************/
/* Routes */

/* Frontend Routes */
define('HOME_URL','/home');
define('LOCATION_URL','/locations');
define('PACKAGES_URL','/packages');
define('BOOKING_URL','/bookings');
define('CONTACTUS_URL','/contact-us');
define('GALLERY_URL','/gallery');
define('BOOKING_STATUS_URL','/booking-status');
define('BOOKING_STATUS_DETAILS_URL','/booking-status-details');



/* Admin Routes */
define('ADMIN_BASE','/admin');
define('ADMIN_HOME_URL','/home');
define('ADMIN_LOGIN_URL','/login');
define('ADMIN_LOGOUT_URL','/logout');
define('ADMIN_HOME_CONTENT_URL','/home-page-content');

/* API Routes*/

define('API_GET_ADDRLOCATION','/get-addr-location');
define('SENDMAIL','/send-mail');
define('SAVE_CONTACT_US_FORM_API','/save-contact-us');
define('SAVE_BOOKING_FORM_API','/save-booking-form');
define('MAKEPAYMENTS','/make-payments');
define('REQUEST_BOOKING_DETAILS_API','/get-booking-details');


define('ADMIN_PAGES_CONST',
	array(
		ADMIN_HOME_CONTENT_URL => 1
		)
);

define('RECIEVED_NOT_CONFIRMED',1);
define('RECIEVED_AND_PROCESSING',2);
define('REPLIEDTO_CUSTOMER',3);
define('PAYMENT_RECIEVED_CONFIRM',4);
define('PAYMENT_NOT_RECIEVED',5);
define('TRAVEL_COMPLETED',6);

define('BOOKING_STATUS_VALUES',
	array (
		RECIEVED_NOT_CONFIRMED,'Booking Received (Not confirmed)',
		RECIEVED_AND_PROCESSING, 'Booking Received - Checking availablity (Not confirmed)',
		REPLIEDTO_CUSTOMER, 'Replied to Customer - Awaiting reply/payment (Not Confirmed)',
		PAYMENT_RECIEVED_CONFIRM, 'Recieved Payment (Confirmed)',
		PAYMENT_NOT_RECIEVED, 'Payment not recieved (Not Confirmed)',
		TRAVEL_COMPLETED, 'Done'
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
/*Google reCapcha*/

define("RECAPCHA_SITE_KEY","6Le8fv4UAAAAADhwT9U00tMkk548oepW6gXdkxKr");
define("RECAPCHA_SECRET_KEY","6Le8fv4UAAAAAFRhTptH-7bKGT63oy7g7ZiYy2i9");
