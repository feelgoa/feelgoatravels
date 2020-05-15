<?php

define('SITE_URL', 'http://127.0.0.1');
define('ADMIN_URL','http://127.0.0.1/admin');
define('API_URL','http://127.0.0.1/api');
define('SITE_NAME','feel Goa');
define('SITE_SHORT_DESC','FeelGoa - Tours and Travels');
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

define('ADMIN_PAGES_CONST',
	array(
		ADMIN_HOME_CONTENT_URL => 1
		)
);
