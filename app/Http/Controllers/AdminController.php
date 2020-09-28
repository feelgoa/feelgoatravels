<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller; 
use App\User; 
use Illuminate\Support\Facades\Auth; 
use Validator;
use DB;
class AdminController extends Controller {
	/** 
	 * details api 
	 * 
	 * @return \Illuminate\Http\Response 
	 */ 
	public function home() {
		return view('admin.admin_home',['title'=> ADMIN_DASHBOARD_TITLE]);
	}

	public function logout() {
		if (Auth::user()) {
			Auth::logout();
			return response()->json(['status' => 'LOGOUT SUCCESS']);
		} else {
			return response()->json(['status' => 'CANNOT LOGOUT SUCCESS']);
		}
	}

	public function login(Request $request){
		$method = $request->method();
		if ($request->isMethod('post')) {
			if(Auth::attempt(['email' => 'alisther@gmail.com', 'password' => '123456'])){ 
				$user = Auth::user(); 
				$success['token'] =  $user->createToken('MyApp')-> accessToken; 
				#return response()->json(['success' => $success], $this-> successStatus);
				return response()->json(['success' => $success]); 
			} 
			else{ 
				return response()->json(['status' => 'CANNOT LOGIN']); 
			}
		} else {
			return response()->json(['status' => 'Login page']); 
		}
	}

	public function page_content() {
		$url_parts = explode("/", $_SERVER['REQUEST_URI']);
		$last_url_param = "/".preg_replace('/[^A-Za-z0-9-\/]/', "", end($url_parts));
		$value['content'] = "";
		$value['name'] = "";
		$value['title'] = "";
		$value['visiblity'] = "";
		if (ADMIN_PAGES_CONST[$last_url_param]) {
			$content_response = DB::select('select * from content where id='.ADMIN_PAGES_CONST[$last_url_param]);
			$array = json_decode(json_encode($content_response), true);
			$value['content'] = htmlentities($array[0]['content']);
			$value['name'] = $array[0]['name'];
			$value['title'] = $array[0]['title'];
			$value['visiblity'] = $array[0]['visiblity'];
		}
		return view('admin.admin_content',['title'=> ADMIN_DASHBOARD_TITLE,'timeline'=> $content_home,'data'=> $value]);
	}

	public function enquirydetails() {
		$contact_us_response = DB::select('select * from contactus where lastname != "X" ORDER BY `created_time` DESC');
		return view('admin.admin_enquiry',['title'=>ADMIN_ENQUIRY_TITLE,'data'=>$contact_us_response]);	
	}	
	public function getindividual(string $slug) {
		$slugvalue = decrypt_code($slug);
		$contact_us_response = DB::select('select * from contactus where id="'.$slugvalue.'" or link="'.$slugvalue.'" order by created_time ASC');
		return view('admin.admin_enquiry_details',['title'=>ADMIN_ENQUIRY_TITLE,'data'=>$contact_us_response,'current_id'=>$slugvalue]);	
	}

	public function loginpage() {
		return view('layouts.login',['title'=>ADMIN_LOGIN_TITLE]);	
	}

	public function getbookingdetails() {
		#$tour_details = DB::select('SELECT * FROM `booking_details` left join `user_details` on `user_details`.`user_id` = `booking_details`.`user_id`');
		$tour_details = DB::select('SELECT * FROM `booking_details` left join `user_details` on `user_details`.`user_id` = `booking_details`.`user_id` left join (SELECT  statuschange.status as latest_status,statuschange.reference_id FROM statuschange WHERE id in (SELECT MAX(id) from statuschange GROUP BY reference_id)) as my_tab on my_tab.reference_id = booking_details.booking_id');
		return view('admin.admin_bookings',['title'=>ADMIN_BOOKING_TITLE,'data'=>$tour_details]);	
	}
	
	public function getbookingindividual(string $slug) {
		$slugvalue = decrypt_code($slug);
		$tour_details_response = DB::select('SELECT booking_details.*,user_details.name,user_details.email,user_details.user_id,user_details.contact,user_details.contact,user_details.gender,user_details.age,user_details.place,user_details.male_count,user_details.female_count FROM `booking_details` left join `user_details` on `user_details`.`user_id` = `booking_details`.`user_id` where booking_details.booking_id = "'.$slugvalue.'"');
		$traveling_dates = DB::select('SELECT * FROM `booking_traveldate` where booking_id = "'.$slugvalue.'" ORDER BY travel_date ASC');
		$hotel_stay = DB::select('SELECT * FROM `hotel_details` where booking_id = "'.$slugvalue.'"');
		$conversation_details = DB::select('SELECT * FROM `contactus` where ref_id = "43875127" ORDER BY `id` ASC');

		#tour details
		$array = json_decode(json_encode($tour_details_response), true);

		$contact_id = DB::select('SELECT id FROM `contactus` where ref_id = "'.$array[0]['booking_pnr'].'" ORDER BY `id` ASC');
		$contact_id_value = 0;
		$contact = json_decode(json_encode($contact_id), true);
		if (sizeof($contact) > 0) {
			$contact_us_response = DB::select('select * from contactus where id="'.$contact[0]['id'].'" or link="'.$contact[0]['id'].'" order by created_time ASC');
			$contact_id_value = $contact[0]['id'];
		} else {
			$contact_us_response = array();
		}
		$status_updates = DB::select('SELECT * FROM `statuschange` where reference_id = "'.$slugvalue.'" ORDER BY `id` ASC');
		$curr_status = end($status_updates);
		return view('admin.admin_booking_details',['title'=>ADMIN_BOOKING_TITLE,'traveling_dates'=>$traveling_dates,'hotel_stay'=>$hotel_stay,'data'=>$tour_details_response,'contact_us_response'=>$contact_us_response,'current_contact_us_id'=>$contact_id_value,'status_list'=>$status_updates,'booking_id'=>$slugvalue,'cur_status'=>$curr_status]);	

	}

}
