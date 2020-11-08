<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;

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
	function bookings_cover(){
		return view('user.booking_cover_page',['title'=> BOOKING_TITLE_HOME]);
	}
	function tour_bookings() {
		$package_details =DB::select('SELECT * FROM `package_details`');
		$terms_conditions =DB::select('SELECT * FROM `content` WHERE `id`=4');
		return view('user.tour_booking',['title'=> BOOKING_TITLE_TOUR,'package_details'=>$package_details,'terms_conditions'=>$terms_conditions]);
	}
	
	function hotel_bookings() {
		return view('user.hotel_booking',['title'=> BOOKING_TITLE_TOUR]);
	}
	function rental_bookings() {
		$car_details =DB::select('SELECT * FROM `rental_vehicles` WHERE `type`="car"');
		$bike_details =DB::select('SELECT * FROM `rental_vehicles` WHERE `type`="bike"');
		return view('user.rental_booking',['title'=> BOOKING_TITLE_TOUR,'car_details'=>$car_details,'bike_details'=>$bike_details]);
	}
	function rental_booking_details($id) {
		$id1=decrypt_code($id);
		$vehicle_detail =DB::select("SELECT * FROM `rental_vehicles` WHERE `vehicle_id` = '$id1'");
		return view('user.rental_booking_details',['title'=> BOOKING_TITLE_TOUR,'vehicle_details'=>$vehicle_detail]);
	}
	function wedding_car_bookings() {
		$wedding_car_details =DB::select('SELECT * FROM `rental_vehicles` WHERE `type`="wedding_car"');
		return view('user.wedding_car_booking',['title'=> BOOKING_TITLE_TOUR, 'wedding_cars_details'=>$wedding_car_details]);
	}
	function contactus() {
		$details['firstname'] = '';
		$details['lastname'] = '';
		$details['email'] = '';
		$details['phone'] = '';
		$details['pid'] = '';
		return view('user.contactus',['title'=> CONTACTUS_TITLE,'details'=>$details]);
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
	function hotel_bookings_insert(Request $request){
		$name = $request->input('name1');
		$email = $request->input('email');
		$contact = $request->input('contact');
		$hotelbooking_checked=$request->input('hotelbooking');
		$check_in_date=$request->input('check_in');
		$check_out_date=$request->input('check_out');
		$room_type=$request->input('room_type');
		$room_count=$request->input('room_count');
		$member_count=$request->input('member_count1');
		$extra_requirements=$request->input('hotel_req');
		$hotelbooking=array("check_in_date"=>$check_in_date,"check_out_date"=>$check_out_date,"room_type"=>$room_type,"room_count"=>$room_count,"member_count"=>$member_count,"extra_requirements"=>$extra_requirements,"created_at"=>Carbon::now(),"updated_at"=>Carbon::now(),"name"=>$name,"email"=>$email,"contact"=>$contact);
		$hotel_id=DB::table('hotel_details')->insertGetId($hotelbooking);
		
		$details['name'] = $name;
		$details['email'] = $email;
		#$details['vehicle_details'] = ;
		#$details['message'] = $pickup_location;
		$details['pnr'] = '#######';
		$mailsender = send_mail_custom($email,$name,BOOKINGS_EMAIL_TEMPLATE,$details);
		$mailsender_admin = send_mail_custom(EMAIL_GMAIL_RECIEVER,FG_TEAM,HOTEL_BOOKING,$hotelbooking);

		return view('user.hotel_booking_success',['title'=> BOOKING_TITLE_HOTEL]);
	}
	function tour_bookings_insert(Request $request){
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
		$status=BOOKING_STATUS_VALUES[RECIEVED_NOT_CONFIRMED];
		$booking_pnr=generate_pnr();
		$bus_type=$request->input('bus_type');
		
		//Hotel Details
		$hotelbooking_checked=$request->input('hotelbooking');
		$check_in_date=$request->input('check_in');
		$check_out_date=$request->input('check_out');
		$room_type=$request->input('room_type');
		$room_count=$request->input('room_count');
		$member_count=$request->input('member_count');
		$extra_requirements=$request->input('hotel_req');

		//Personal Details Insertion
		$user_data=array("name"=>$name,"email"=>$email,"contact"=>$contact,"gender"=>$gender,"age"=>$age,"place"=>$place,"male_count"=>$male_count,"female_count"=>$female_count,"created_at"=>Carbon::now(),"updated_at"=>Carbon::now());
		$user_id=DB::table('user_details')->insertGetId($user_data);
		//Booking Details Insertion
		$booking_data=array("booking_pnr"=>$booking_pnr,"pickup_point"=>$pickup_point,"bus_type"=>$bus_type,"user_id"=>$user_id,"status"=>$status,"created_at"=>Carbon::now(),"updated_at"=>Carbon::now());
		$booking_id=DB::table('booking_details')->insertGetId($booking_data);

		$booking_status=array("booking_type"=>"1","reference_id"=>$booking_id,"status"=>"1","desc"=>"","created_at"=>Carbon::now());
		$booking_status_insert = DB::table('statuschange')->insertGetId($booking_status);

		//Booking_spots Insertion
		$count=count($spots);
		$items = array();
		for($i = 0; $i < $count; $i++){
			$item = array("booking_id" => $booking_id, 'spot_id' => $spots[$i],"created_at"=>Carbon::now(),"updated_at"=>Carbon::now());
			DB::table('booking_spot')->insert($item);
		}

		//Booking TravelDate Insertion
		$count1=2;
		$travel[0]=array("booking_id" => $booking_id,'travel_date'=>$travelling_date1,'day'=>"1","created_at"=>Carbon::now(),"updated_at"=>Carbon::now());
		$travel[1]=array("booking_id" => $booking_id,'travel_date'=>$travelling_date2,'day'=>"2","created_at"=>Carbon::now(),"updated_at"=>Carbon::now());
		if($travelling_date3!=NULL){
			$travel[2]=array("booking_id" => $booking_id,'travel_date'=>$travelling_date3,'day'=>"3","created_at"=>Carbon::now(),"updated_at"=>Carbon::now());
			$count1=$count1+1;
		}
		if($travelling_date4!=NULL){
			$travel[3]=array("booking_id" => $booking_id,'travel_date'=>$travelling_date4,'day'=>"4","created_at"=>Carbon::now(),"updated_at"=>Carbon::now());
			$count1=$count1+1;
		}
		for($i = 0; $i < $count1; $i++){
			DB::table('booking_traveldate')->insert($travel[$i]);
		}

		//Hotel details
		$hotelbooking=array("booking_id" => $booking_id,"check_in_date"=>$check_in_date,"check_out_date"=>$check_out_date,"room_type"=>$room_type,"room_count"=>$room_count,"member_count"=>$member_count,"extra_requirements"=>$extra_requirements,"created_at"=>Carbon::now(),"updated_at"=>Carbon::now(),"name"=>$name,"email"=>$email,"contact"=>$contact);
		if($hotelbooking_checked=="yes"){
			$hotel_id=DB::table('hotel_details')->insertGetId($hotelbooking);
		}
		//email sending
		$details['name'] = $name;
		$details['pnr'] = $booking_pnr;
		$details['email'] = $email;

		$mailsender = send_mail_custom($email,$name,BOOKINGS_EMAIL_TEMPLATE,$details);
		#$mailsender_admin = send_mail_custom(EMAIL_GMAIL_RECIEVER,FG_TEAM,BOOKINGS_EMAIL_TEMPLATE_ADMIN,$details);

		$details_collection['name'] = $name;
		$details_collection['email'] = $email;
		$details_collection['place'] = $place;
		$details_collection['contact'] = $contact;
		$details_collection['male'] = $male_count;
		$details_collection['female'] = $female_count;

		$details_collection['travel1'] = $travelling_date1;
		$details_collection['travel2'] = $travelling_date2;
		$details_collection['travel3'] = $travelling_date3;
		$details_collection['travel4'] = $travelling_date4;

		#$details_collection['type'] = $travel_type;
		$details_collection['pickup'] = $pickup_point;
		$details_collection['bustype'] = $bus_type;

		$mailsender_admin = send_mail_custom(EMAIL_GMAIL_RECIEVER,FG_TEAM,TOUR_BOOKING,$details_collection);
		return view('user.tour_booking_success',['title'=> BOOKING_TITLE_TOUR,'booking_pnr'=>$booking_pnr]);
	}
	function rental_bookings_insert(Request $request){
		//dd($request);
		$name = $request->input('name1');
		$email = $request->input('email');
		$contact = $request->input('contact');
		$vehicle_id = $request->input('vehicle_id');
		$no_of_days = 0;
		$pickup_date = date("Y-m-d");
		$pickup_time = '00:00am';
		$total_amount = '0';
		$pickup_location=$request->input('pickup_loc');
		$rental_details=array("vehicle_id"=>$vehicle_id,"no_of_days"=>$no_of_days,"total_amount"=>$total_amount,"pickup_date"=>$pickup_date,"pickup_location"=>$pickup_location,"pickup_time"=>$pickup_time,"created_at"=>Carbon::now(),"updated_at"=>Carbon::now(),"name"=>$name,"email"=>$email,"contact"=>$contact);
		$rental_id=DB::table('rental_booking')->insertGetId($rental_details);

		$vehicle_detail =DB::select("SELECT * FROM `rental_vehicles` WHERE `vehicle_id` = '$vehicle_id'");
		$details['name'] = $name;
		$details['email'] = $email;
		$details['vehicle_details'] = $vehicle_detail;
		$details['message'] = $pickup_location;
		$details['contact'] = $contact;
		$details['pnr'] = '#######';
		$mailsender = send_mail_custom($email,$name,BOOKINGS_EMAIL_TEMPLATE,$details);
		$mailsender_admin = send_mail_custom(EMAIL_GMAIL_RECIEVER,FG_TEAM,BOOKING_VEHICLE,$details);
		return view('user.rental_booking_success',['title'=> BOOKING_TITLE_TOUR,'vehicle_detail'=>$vehicle_detail]);
	}
	function bookingstatus() {
		return view('user.bookingstatus',['title'=> BOOKING_STATUS_TITLE]);
	}

	function contactus_reply() {
		$url_parts = explode("/", $_SERVER['REQUEST_URI']);
		$last_url_param = end($url_parts);
		$value = decrypt_code($last_url_param);
		$user = DB::select('SELECT * FROM `contactus` WHERE id="'.$value.'"');
		if ($user) {
			$user_details = json_decode(json_encode($user), true);
			$details['firstname'] = $user_details[0]['firstname'];
			$details['lastname'] = $user_details[0]['lastname'];
			$details['email'] = $user_details[0]['email'];
			$details['phone'] = $user_details[0]['phone'];
			$details['pid'] = $value;
		} else {
			$newuser = DB::select('SELECT * FROM `booking_details` left join user_details on user_details.user_id = booking_details.user_id where booking_details.booking_pnr ="'.$value.'"');
			if ($newuser) {
				$new_user_details = json_decode(json_encode($newuser), true);

				$splitvalue = explode(" ", $new_user_details[0]['name']);
				if (isset($splitvalue[0])) {
					$details['firstname'] = $splitvalue[0];
				}
				if (isset($splitvalue[1])) {
					$details['lastname'] = $splitvalue[1];
				} else {
					$details['lastname'] = "";
				}

				$details['email'] = $new_user_details[0]['email'];
				$details['phone'] = $new_user_details[0]['contact'];
				$details['pid'] = "";
				$details['ref_id'] = $value;
			} else {
				$details['firstname'] = '';
				$details['lastname'] = '';
				$details['email'] = '';
				$details['phone'] = '';
				$details['pid'] = '';
			}
		}

		return view('user.contactus',['title'=> CONTACTUS_TITLE,'details'=>$details]);
	}

	public function SubscribProcess() {
		return view('user.payment',['title'=> PAYMENTS_TITLE]);
	}

	
	public function SubscribeCancel()
{
     dd('Payment Cancel!');
}

public function Response(Request $request)
{
	if (isset($_POST)) {
		print_r($_POST);
	}

    dd('Payment Successfully done!');
}

public function paymentspage() {
	$url_parts = explode("/", $_SERVER['REQUEST_URI']);
	$last_url_param = end($url_parts);
	$value = decrypt_code($last_url_param);
	$payment = DB::select('SELECT * FROM `payments` where tnxid ="'.$value.'" and created_at >= curdate()');
	if ($payment) {
		$p_details = json_decode(json_encode($payment), true);
		if ($p_details[0]['booking_type'] == BOOKING_TYPE_TOUR) {
			$user_details = DB::select('SELECT * FROM `user_details` where user_id = '.$p_details[0]['ref_id']);
			if ($user_details) {
				$details['phone'] = $user_details[0]->contact;
				$details['firstname'] =  $user_details[0]->name;
				$details['email'] =  $user_details[0]->email;
				$details['productinfo'] = ADMIN_BOOKING_TITLE;
				$details['surl'] = SITE_URL.PAYMENT_SUCCESS_URL;
				$details['furl'] = SITE_URL.PAYMENT_FAILURE_URL;
				$details['service_provider'] = PAYMENT_SERVICE_PROVIDER;
				$details['amount'] = $p_details[0]['amount'];
				$details['txnid'] = $p_details[0]['tnxid'];
				return view('user.payment_view',['title'=> PAYMENTS_TITLE,'data'=>$details]);
			} else {
				echo "error, if still persists request for a new link";
			}
		} else {
			echo "other payment";
		}
		echo "match";
	} else {
		echo "no match, invallid url or the link is expired";
	}
	exit;
}

public function suc() {

	print_r($_POST);
	$status=$_POST["status"];
	$firstname=$_POST["firstname"];
	$amount=$_POST["amount"];
	$txnid=$_POST["txnid"];
	$posted_hash=$_POST["hash"];
	$key=$_POST["key"];
	$productinfo=$_POST["productinfo"];
	$email=$_POST["email"];
	$salt=PAYU_SALT_KEY;
	
	if (isset($_POST["additionalCharges"])) {
		   $additionalCharges=$_POST["additionalCharges"];
			$retHashSeq = $additionalCharges.'|'.$salt.'|'.$status.'|||||||||||'.$email.'|'.$firstname.'|'.$productinfo.'|'.$amount.'|'.$txnid.'|'.$key;
		} else {
			$retHashSeq = $salt.'|'.$status.'|||||||||||'.$email.'|'.$firstname.'|'.$productinfo.'|'.$amount.'|'.$txnid.'|'.$key;
		}
			$hash = hash("sha512", $retHashSeq);
			 
		if ($hash != $posted_hash) {
			echo "Invalid Transaction. Please try again";
		} else {
			echo "<h3>Your booking status is ". $status .".</h3>";
			echo "<h4>Your Transaction ID for this transaction is ".$txnid.".</h4>";
			echo "<h4>We have received a payment of Rs. " . $amount . ". Your order will soon be shipped.</h4>";
		}
}
public function suc1() {
	echo "here";
	exit;
}

}