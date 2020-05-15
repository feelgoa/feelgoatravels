<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class PagesController extends Controller
{
	//
	function index() {
		return redirect(SITE_URL.HOME_URL);
	}

	function home() {
		$timeline = DB::select('select * from timeline where visiblity=1');
		return view('user.home',['title'=> HOME_TITLE,'timeline'=>$timeline]);
	}

	function packages() {
		return view('user.packages',['title'=> PACKAGES_TITLE]);
	}

	function locations() {
		return view('user.locations',['title'=> LOCATIONS_TITLE]);
	}

	function bookings() {
		return view('user.bookings',['title'=> BOOKINGS_TITLE]);
	}

	function contactus() {
		return view('user.contactus',['title'=> CONTACTUS_TITLE]);
	}

	function gallery() {
		return view('user.gallery',['title'=> GALLERY_TITLE]);
	}
}