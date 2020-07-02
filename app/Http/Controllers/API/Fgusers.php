<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Fgusers extends Controller
{
    public $successStatus = 200;
	/** 
	 * login api 
	 * 
	 * @return \Illuminate\Http\Response 
	 */ 
	public function login(){ 
		if(Auth::attempt(['email' => request('email'), 'password' => request('password')])){ 
			$user = Auth::user(); 
			$success['token'] =  $user->createToken('MyApp')-> accessToken; 
			return response()->json(['success' => $success], $this-> successStatus); 
		} 
		else{ 
			return response()->json(['error'=>'Unauthorised'], 401); 
		} 
	}
	/** 
	 * Register api 
	 * 
	 * @return \Illuminate\Http\Response 
	 */ 
	public function register(Request $request) 
	{ 
		$validator = Validator::make($request->all(), [ 
			'name' => 'required', 
			'email' => 'required|email', 
			'password' => 'required', 
			'c_password' => 'required|same:password', 
		]);
		if ($validator->fails()) { 
			return response()->json(['error'=>$validator->errors()], 401);			
		}
		$input = $request->all(); 
		$input['password'] = bcrypt($input['password']); 
		$user = User::create($input); 
		$success['token'] =  $user->createToken('MyApp')-> accessToken; 
		$success['name'] =  $user->name;
		return response()->json(['success'=>$success], $this-> successStatus); 
	}

	public function logout() { 
		if (Auth::check()) {
			Auth::user()->AauthAcessToken()->delete();
		}
	}

	/** 
	 * details api 
	 * 
	 * @return \Illuminate\Http\Response 
	 */ 
	public function details() {
		$user = Auth::user();
		return response()->json(['success' => $user], $this-> successStatus); 
	}

	public function get_addr_location_details() {
		$add_details = DB::select('select title,content from content where id=2');
		return response()->json($add_details);
	}

	public function send_mail() {
        echo "SUCCESS";
	}
	
	public function get_booking_status_form(Request $request) {
		$validator = Validator::make($request->all(), [ 
			'email' => 'required', 
			'pnr' => 'required', 
		]);
		if ($validator->fails()) { 
			return response()->json(['isSuccess'=> false, 'message'=> VALIDATION_FAILED, 'error'=> $validator->errors(), 'data'=> '']);
		} else {
			$input = $request->all(); 
			$details['email'] = $input['email'];
			$details['pnr'] = $input['pnr'];
			$booking_details['booking'] = DB::select('SELECT * FROM booking_details as bd left join user_details as ud on bd.user_id = ud.user_id WHERE bd.booking_pnr = "'.$details['pnr'].'" and ud.email = "'.$details['email'].'"');
			if($booking_details['booking']) {
				return response()->json(['isSuccess'=> true, 'message'=> '','data'=> $details['pnr']]);
			} else {
				return response()->json(['isSuccess'=> false, 'message'=> BOOKING_STATUS_FETCH_FAILED, 'data'=> '']);
			}

			//response()->json(['isSuccess'=> true, 'message'=> '', 'data'=> $booking_details]);
		}
	}

	function getbookingstatusdetails(Request $request) {
		$input = $request->all(); 
		$booking_details['booking'] = DB::select('SELECT * FROM booking_details as bd left join user_details as ud on bd.user_id = ud.user_id WHERE bd.booking_pnr = "'.$input['pnrvalueget'].'"');
		$get_booking_id  = json_decode(json_encode($booking_details), true);
		$get_booking_id['booking'][0]['totalcount'] = $get_booking_id['booking'][0]['male_count'] + $get_booking_id['booking'][0]['female_count'];
		/*$get_booking_id['booking'][0]['locations'] = array(
			array('name'=>'North Goa','date'=>'27-06-2020'),
			array('name'=>'South Goa','date'=>'28-06-2020'),
			array('name'=>'Palolem and Agonda','date'=>'29-06-2020'),
			array('name'=>'Dudhsagar','date'=>'30-06-2020')
			);*/
		$booking_id = $get_booking_id ['booking'][0]['booking_id'];
		$booking_details['spots'] = DB::select('SELECT * FROM booking_spot where booking_id = "'.$booking_id.'"');
		return view('user.booking_status_view',['title'=> BOOKING_STATUS_TITLE,'pnrno'=>$get_booking_id ['booking'][0]['booking_pnr'],'details'=>$get_booking_id]);
	}
	function addbookingdetails(Request $request) {
		$name = $request->input('name1');
		$email = $request->input('email');
		$contact = $request->input('contact');
		$gender = $request->input('gender');
		$age = $request->input('age');
		$place=$request->input('place');
		$male_count=$request->input('male_count');
		$female_count=$request->input('female_count');
		$travelling_date=$request->input('travel_date');
		$pickup_point=$request->input('pickup_point');
		$hotelbooking=$request->input('hotelbooking');
		$spots=$request->input('spots');
		$status=BOOKING_STATUS_VALUES[RECIEVED_NOT_CONFIRMED];

		$user_data=array('name'=>$name,"email"=>$email,"contact"=>$contact,"gender"=>$gender,"age"=>$age,"place"=>$place,"male_count"=>$male_count,"female_count"=>$female_count);
		try {
			$user_id=DB::table('user_details')->insertGetId($user_data);
			$booking_pnr=generate_pnr();
			$booking_data=array("booking_pnr"=>$booking_pnr,"travelling_date"=>$travelling_date,"pickup_point"=>$pickup_point,"user_id"=>$user_id,"status"=>$status);
			$booking_id=DB::table('booking_details')->insertGetId($booking_data);
			$count=count($spots);
			$items = array();
			for($i = 0; $i < $count; $i++){
				$item = array("booking_id" => $booking_id, 'spot_id' => $spots[$i]);
				DB::table('booking_spot')->insert($item);
			}
		} catch (Exception $e) {
			return response()->json(['isSuccess'=> false, 'message'=> FORM_SUBMIT_FAILED, 'error'=> $e, 'data'=> '']);
		}
		//email sending
		$details['name'] = $name;
		$details['pnr'] = $booking_pnr;
		$details['email'] = $email;
		$details['traveling_date'] = $travelling_date;
		$details['malecount'] = $male_count;
		$details['femalecount'] = $female_count;
		$details['pickup_loc']  = $pickup_point;

		try {
			$mailsender = send_mail_custom($email,$name,BOOKINGS_EMAIL_TEMPLATE,$details);
			$mailsender_admin = send_mail_custom(EMAIL_GMAIL_RECIEVER,FG_TEAM,BOOKINGS_EMAIL_TEMPLATE_ADMIN,$details);
		} catch (Exception $e) {
			return response()->json(['isSuccess'=> false, 'message'=> FORM_SUBMIT_FAILED, 'error'=> EMAIL_SENDING_ERROR, 'data'=> '']);
		}
		return response()->json(['isSuccess'=> true, 'message'=> '','booking_pnr'=> $booking_pnr]);
	}

}
