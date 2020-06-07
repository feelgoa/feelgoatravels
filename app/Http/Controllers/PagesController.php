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

	function recapchay() {
		if ($_SERVER['REQUEST_METHOD'] == "GET") {
			return view('user.contact');
		} elseif ($_SERVER['REQUEST_METHOD'] == "POST") {
			if(isset($_POST['g-recaptcha-response'])){
			  $captcha=$_POST['g-recaptcha-response'];
			}
			if(!$captcha){
			  return response()->json(['isSuccess'=> false, 'message'=> 'Please check the the captcha form.','data'=> '']);
			}
			$secretKey = RECAPCHA_SECRET_KEY;
			$ip = $_SERVER['REMOTE_ADDR'];
			// post request to server
			$url = 'https://www.google.com/recaptcha/api/siteverify?secret=' . urlencode($secretKey) .  '&response=' . urlencode($captcha);
			$response = file_get_contents($url);
			$responseKeys = json_decode($response,true);
			// should return JSON with success as true
			if($responseKeys["success"]) {
				return response()->json(['isSuccess'=> true, 'message'=> 'Your Data has been submited successfully.','data'=> '']);
					
			} else {
				return response()->json(['isSuccess'=> false, 'message'=> 'Suspecious User.','data'=> '']);
			}
		}
	}
}