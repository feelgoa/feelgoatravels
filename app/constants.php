<?php

define('SITE_URL', 'http://127.0.0.1');
define('ADMIN_URL','http://127.0.0.1/admin');
define('API_URL','http://127.0.0.1/api');
define('SITE_NAME','feelGoa');
define('SITE_SHORT_DESC','FeelGoa - Tours and Travels');

/*Emails Config*/
define('SMTP_HOST_VALUE','smtp.hostinger.in');
define('SMTP_PORT_VALUE','587');
define('EMAIL_USERNAME','team@feelgoatravels.com');
define('EMAIL_PASSWORD','F33lG0aTravel$');
define('EMAIL_SENDER','team@feelgoatravels.com');
define('EMAIL_FOOTER','<span>Regards</span><p>Team feelGoa</p>');

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

define('ADMIN_PAGES_CONST',
	array(
		ADMIN_HOME_CONTENT_URL => 1
		)
);

/*Google reCapcha*/

define("RECAPCHA_SITE_KEY","6Le8fv4UAAAAADhwT9U00tMkk548oepW6gXdkxKr");
define("RECAPCHA_SECRET_KEY","6Le8fv4UAAAAAFRhTptH-7bKGT63oy7g7ZiYy2i9");

#define("RECAPCHA_SITE_KEY","6LcGnv4UAAAAACdY-NM7KCQxtMuRKZ44GDVUmFdr");

#define("RECAPCHA_SECRET_KEY","6LcGnv4UAAAAABXWcLfdN_UYXRAweB-7PnZIKDr");