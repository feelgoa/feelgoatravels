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
define('EMAIL_FOOTER','</br></br<b><span>Regards,</span><p>Team Feel Goa</p></b>');
define('FG_TEAM','Feel Goa');



define('EMAIL_TEMPLATE_NAMES',
	array(
			1 => 'contact_us_email_template'
		)
);

define('CONTACTUS_EMAIL_TEMPLATE', 1);



/*********************************/

/* Page Titles*/

/*Frontend Titles*/
define('HOME_TITLE','Home');
define('PACKAGES_TITLE','Packages');
define('LOCATIONS_TITLE','Locations');
define('BOOKINGS_TITLE','Bookings');
define('GALLERY_TITLE','Gallery');
define('CONTACTUS_TITLE','Contact-us');


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

define('ADMIN_PAGES_CONST',
	array(
		ADMIN_HOME_CONTENT_URL => 1
		)
);

/*Error Messages */

define('VALIDATION_FAILED','Validation Error (Data provided is invalid or incomplete)');
define('FORM_DATA_SUBIMITTED_CONTACT_US_FORM','Thank you for contacting us. We will get back to you soon.');
define('FORM_SUBMIT_FAILED','Something is went wrong. We could not save your data. Please try again.');
define('FORM_SUBMIT_WITHOUT_EMAIL_FAILED', 'You have successfully submited your form.');
define('EMAIL_SENDING_ERROR', 'There is some issue with sending email.');
define('RECAPTCH_REQUIRED','Recapcha is not clicked. Please check mark the box to continue');
/*Google reCapcha*/

define("RECAPCHA_SITE_KEY","6Le8fv4UAAAAADhwT9U00tMkk548oepW6gXdkxKr");
define("RECAPCHA_SECRET_KEY","6Le8fv4UAAAAAFRhTptH-7bKGT63oy7g7ZiYy2i9");
