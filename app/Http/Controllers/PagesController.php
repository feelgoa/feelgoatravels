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
		$slides =DB::select('SELECT * FROM `sliders` WHERE (`from`IS NULL OR `from` <= CURRENT_DATE ) AND (`to` IS NULL OR `to` >= CURRENT_DATE ) AND visibility=true ORDER BY `ordering` ASC');
		$terms = DB::select('SELECT `title`,`content` FROM content WHERE id=4');
		return view('user.home',['title'=> HOME_TITLE,'timeline'=>$timeline,'slides'=>$slides,'terms'=>$terms]);
	}

	function packages() {
		return view('user.packages',['title'=> PACKAGES_TITLE]);
	}

	function locations() {
		$package_details =DB::select('SELECT * FROM `package_details`');
		return view('user.locations',['title'=> LOCATIONS_TITLE,'package_details'=>$package_details]);
	}

	function bookings() {
		$package_details =DB::select('SELECT * FROM `package_details`');
		$terms_conditions =DB::select('SELECT * FROM `content` WHERE `id`=4');
		return view('user.bookings',['title'=> BOOKINGS_TITLE,'package_details'=>$package_details,'terms_conditions'=>$terms_conditions]);
	}

	function contactus() {
		return view('user.contactus',['title'=> CONTACTUS_TITLE]);
	}

	function gallery() {
		$images =DB::select('SELECT * FROM `gallery` WHERE (`from`IS NULL OR `from` <= CURRENT_DATE ) AND (`to` IS NULL OR `to` >= CURRENT_DATE ) AND visibility=true ORDER BY `ordering` ASC');
		return view('user.gallery',['title'=> GALLERY_TITLE,'images'=>$images]);
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
	
	function insert(Request $request){
		//dd($request);
		//Personal Details
		$name = $request->input('name1');
		$email = $request->input('email');
		$contact = $request->input('contact');
		$gender = $request->input('gender');
		$age = $request->input('age');
		$place=$request->input('place');
		$male_count=$request->input('male_count');
		$female_count=$request->input('female_count');
		//package_details
		$travelling_date1=$request->input('travel_date1');
		$travelling_date2=$request->input('travel_date2');
		$spots=$request->input('spots');
		$travel_type=$request->input('travel_type');

		//Extra Package Group
		$travelling_date3=$request->input('travel_date3');
		$travelling_date4=$request->input('travel_date4');

		//Pickup Details
		$pickup_point=$request->input('pickup_point');
		$hotelbooking=$request->input('hotelbooking');
		$status="Booking Received (Not confirmed)";
		$booking_pnr=generate_pnr();
		$bus_type=$request->input('bus_type');

		//Personal Details Insertion
		$user_data=array('name'=>$name,"email"=>$email,"contact"=>$contact,"gender"=>$gender,"age"=>$age,"place"=>$place,"male_count"=>$male_count,"female_count"=>$female_count);
		$user_id=DB::table('user_details')->insertGetId($user_data);
		
		//Booking Details Insertion
		$booking_data=array("booking_pnr"=>$booking_pnr,"pickup_point"=>$pickup_point,"bus_type"=>$bus_type,"user_id"=>$user_id,"status"=>$status);
		$booking_id=DB::table('booking_details')->insertGetId($booking_data);
		
		//Booking_spots Insertion
		$count=count($spots);
		$items = array();
		for($i = 0; $i < $count; $i++){
			$item = array("booking_id" => $booking_id, 'spot_id' => $spots[$i]);
			DB::table('booking_spot')->insert($item);
		}

		//Booking TravelDate Insertion
		$count1=2;
		$travel[0]=array("booking_id" => $booking_id,'travel_date'=>$travelling_date1,'day'=>"1");
		$travel[1]=array("booking_id" => $booking_id,'travel_date'=>$travelling_date2,'day'=>"2");
		if($travelling_date3!=NULL){
			$travel[2]=array("booking_id" => $booking_id,'travel_date'=>$travelling_date3,'day'=>"3");
			$count1=$count1+1;
		}
		if($travelling_date4!=NULL){
			$travel[3]=array("booking_id" => $booking_id,'travel_date'=>$travelling_date4,'day'=>"4");
			$count1=$count1+1;
		}
		for($i = 0; $i < $count1; $i++){
			DB::table('booking_traveldate')->insert($travel[$i]);
		}
		//email sending
		$details['name'] = $name;
		$details['pnr'] = $booking_pnr;
		$details['email'] = $email;
		$details['traveling_date'] = $travelling_date;
		$details['malecount'] = $male_count;
		$details['femalecount'] = $female_count;
		$details['pickup_loc']  = $pickup_point;

		$mailsender = send_mail_custom($email,$name,BOOKINGS_EMAIL_TEMPLATE,$details);
		$mailsender_admin = send_mail_custom(EMAIL_GMAIL_RECIEVER,FG_TEAM,BOOKINGS_EMAIL_TEMPLATE_ADMIN,$details);
		return view('user.bookings_success',['title'=> BOOKINGS_TITLE,'booking_pnr'=>$booking_pnr]);
	}

	function bookingstatus() {
		return view('user.bookingstatus',['title'=> BOOKING_STATUS_TITLE]);
	}

	
}