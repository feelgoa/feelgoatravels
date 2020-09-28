<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; 
use Validator;
use DB;
use Carbon\Carbon;

class UsersController extends Controller
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

		$booking_id = $get_booking_id ['booking'][0]['booking_id'];
		$booking_details['spots'] = DB::select('SELECT * FROM booking_spot where booking_id = "'.$booking_id.'"');
		$travel_details = DB::select('SELECT * FROM booking_traveldate where booking_id = "'.$booking_id.'" order by travel_date ASC');
		$link_value = encrypt_code($booking_id);

		$status_updates = DB::select('SELECT * FROM `statuschange` where reference_id = "'.$booking_id.'" ORDER BY `id` ASC');
		$curr_status = end($status_updates);
		return view('user.booking_status_view',['title'=> BOOKING_STATUS_TITLE,'pnrno'=>$get_booking_id ['booking'][0]['booking_pnr'],'details'=>$get_booking_id,'travel_details'=>$travel_details,'curr_status'=>$curr_status]);
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

	function verifypnr(Request $request) {
		$pnr = $request->input('ref_id');
		$details = DB::select('SELECT ud.name,ud.email,ud.contact FROM `booking_details`as bd left join `user_details` as ud on ud.user_id = bd.user_id WHERE bd.`booking_pnr` = "'.$pnr.'"');
		if(!empty($details)) {
			$new_details = json_decode(json_encode($details), true);
			$name_details = $new_details[0]['name'];
			$str_arr = explode (" ", $name_details,2);
			$new_details[0]['firstname'] = $str_arr[0];
			$new_details[0]['lastname'] = $str_arr[1];
			return response()->json(['isSuccess'=> true, 'message'=> PNR_SUCCESSFUL_VERIFICATION ,'user_details'=> $new_details]);
		} else {
			return response()->json(['isSuccess'=> false, 'message'=> PNR_FAILED_VERIFICATION]);
		}
		#$get_booking_id  = json_decode(json_encode($booking_details), true);
	}
	public function replycomment(Request $request) {
		               try {
		                       $timevalue = date("Y-m-d h:i:s");
		                       $user_data=array("firstname"=>FG_TEAM,"lastname"=>"X","email"=>EMAIL_GMAIL_RECIEVER,"message"=>$_POST['message'],"link"=>$_POST['link'],"created_time"=>$timevalue);
		                       $user_id=DB::table('contactus')->insertGetId($user_data);
							   $current_user = DB::select('SELECT firstname,lastname,email FROM `contactus` WHERE id ="'.$_POST['link'].'"');
		
		                       $new_details = json_decode(json_encode($current_user), true);
		                       $details['firstname'] = $new_details[0]['firstname'];
		                       $details['lastname'] = $new_details[0]['lastname'];
		                       $details['email'] = $new_details[0]['email'];
		                       $details['message'] = $_POST['message'];
		       
		                       $prev_message = DB::select('SELECT message FROM `contactus` WHERE link="'.$_POST['link'].'" and lastname != "X" order by ID DESC LIMIT 1');
								if ($prev_message) {
		                       		$prev_actual_message = json_decode(json_encode($prev_message), true);
							   		$details['prev_message'] = $prev_actual_message[0]['message'];
								} else {
									$prev_message = DB::select('SELECT message FROM `contactus` WHERE id="'.$_POST['link'].'"');
									$prev_actual_message = json_decode(json_encode($prev_message), true);
									$details['prev_message'] = $prev_actual_message[0]['message'];
								}
							   $details['link_value'] = $_POST['link'];

		
		                       $mailsender = send_mail_custom($details['email'],$details['firstname'],CONTACT_US_REPLY,$details);
		                       #$mailsender_admin = send_mail_custom(EMAIL_GMAIL_RECIEVER,FG_TEAM,BOOKINGS_EMAIL_TEMPLATE_ADMIN,$details);
		               } catch (Exception $e) {
		                       return response()->json(['isSuccess'=> false, 'message'=> COMMENT_ADD_FAILED]);
		               }
		               return response()->json(['isSuccess'=> true, 'message'=> COMMENT_ADD_SUCCESS_VERIFICATION]);
		       }
		
		       public function logiadminnuser() {
		               print_r("asd");
		               exit;
		       }
		
		       public function logiadmincheck(Request $request) {
		
		               #$credentials = request($request->input('email'), $request->input('pswd'));
		
		               /*if(!Auth::attempt($credentials)) {
		                       return response()->json([
		                               'message' => 'Unauthorized'
		                       ], 401); 
		               } else {
		                       return "has loged in";
		               }*/
		               if(Auth::attempt(['email' => request('email'), 'password' => request('pswd')])){ 
		                       $user = Auth::user(); 
		                       $success['token'] =  $user->createToken('MyApp')-> accessToken; 
		               $user = $request->user();
		        $tokenResult = $user->createToken('Personal Access Token');
		               $token = $tokenResult->token;
		
		               $token->save();
		
		               return response()->json([
		            'access_token' => $tokenResult->accessToken,
		            'token_type' => 'Bearer',
		            'expires_at' => Carbon::parse(
		                $tokenResult->token->expires_at
		            )->toDateTimeString()
	              ]);
	                       } else {
	                              return "no";
	                       }
	
		}

		public function update_booking_status(Request $request) {
			$user_data=array(
				'booking_type'=>$_POST['booking_type'],
				'reference_id'=>$_POST['booking_id'],
				"status"=>$_POST['status'],
				'desc'=>$_POST['desc'],
				'created_at'=>Carbon::now(),
			);
			$user_id = DB::table('statuschange')->insertGetId($user_data);
			if ($user_data) {
				return response()->json(['isSuccess'=> true, 'message'=> STATUS_UPDATE_SUCCESS]);
			} else {
				return response()->json(['isSuccess'=> false, 'message'=> STATUS_UPDATE_FAILED]);
			}
		}
	
	public function fetchemailcontent(Request $request) {
		$t_val = substr(hash('sha256', mt_rand() . microtime()), 0, 20);
		$transaction_reference = encrypt_code($t_val);
		$transaction_reference = str_replace("/","",$transaction_reference);

		$traveldetails = DB::select('SELECT * FROM `booking_traveldate` where booking_id = "'.$_POST['ref_id'].'" ORDER BY travel_date ASC');

		$resp = calculate_travel_details($traveldetails,$_POST['totalcount']);

		$user_data=array(
			'transaction_reference'=>$transaction_reference,
			'tnxid'=>$t_val,
			'booking_type'=>$_POST['booking_type'],
			'ref_id'=>$_POST['ref_id'],
			'amount'=>$resp['amount'],
			"status"=>PAYMENT_NOT_RECIEVED,
			'created_at'=>Carbon::now(),
		);
		$user_id = DB::table('payments')->insertGetId($user_data);

		

		$details['amount'] = $resp['amount'];
		$details['transaction_reference'] = $transaction_reference;
		$details['name'] = $_POST['name'];
		$details['count'] = $_POST['totalcount'];
		$details['pickuppoint'] = $_POST['pickuppoint'];
		$details['pnr'] = $_POST['pnr'];
		$details['travel_details'] = $traveldetails;
		$details['days'] = $resp['days'];
		$details['calculation'] = $resp['calc'];

		return response()->json(['isSuccess'=> false, 'message'=> '',  'data'=> payment_email_generator($details)]);
	}

	public function sendpaymentemail(Request $request) {
		$mailsender = send_mail_custom($_POST['email'],$_POST['name'],$_POST['template'],$_POST['content']);

		if ($mailsender == 1) {
			echo "success";
		} else {
			echo "failed";
		}
		exit;
	}
}
