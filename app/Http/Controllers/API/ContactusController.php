<?php


namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; 
use Validator;
use DB;

class ContactusController extends Controller {

	public function save_contact_us_form(Request $request) {
		$validator = Validator::make($request->all(), [ 
			'firstname' => 'required', 
			'lastname' => 'required', 
			'email' => 'required|email', 
			'message' => 'required',
		]);
		if ($validator->fails()) { 
			return response()->json(['isSuccess'=> false, 'message'=> VALIDATION_FAILED, 'error'=> $validator->errors(), 'data'=> '']);
		}
		try {
			$captcha = "";
			if(isset($_POST['g-recaptcha-response'])){
				$captcha=$_POST['g-recaptcha-response'];
			}

			if(!$captcha){
				return response()->json(['isSuccess'=> false, 'message'=> RECAPTCH_REQUIRED,'data'=> '']);
			}
			$responseKeys = validate_recapcha(urlencode($captcha));
			#$responseKeys["success"]  = 1;
			if($responseKeys["success"] == 1) {
				$input = $request->all();
				$name_concat = $input['firstname'].' '.$input['lastname'];
				$details['message'] = $input['message'];
				$details['phone'] = $input['phone'];
				$details['name'] = $name_concat;
				$details['email'] = $input['email'];
				
				if ($input['ref_id'] == "") {
					$input['ref_id'] =  0;
				}

				if ($input['link'] == "") {
					$input['link'] =  0;
				}
				$input['created_time'] = $timevalue = date("Y-m-d h:i:s");
				$details['contactusid'] = strtotime($input['created_time']);
				$mailsender = send_mail_custom($input['email'],$name_concat,CONTACTUS_EMAIL_TEMPLATE,$details);
				$mailsender_admin = send_mail_custom(EMAIL_GMAIL_RECIEVER,FG_TEAM,CONTACTUS_UPDATE_EMAIL_TEMPLATE_ADMIN,$details);
				$mailsender_thread = send_mail_custom($input['email'],$name_concat,CONTACTUS_EMAIL_THREAD,$details);
				if (($mailsender == 1) and ($mailsender_admin == 1) and ($mailsender_thread == 1)) {
					unset($input["_token"]);
					unset($input["g-recaptcha-response"]);
					DB::table('contactus')->insert($input);
					return response()->json(['isSuccess'=> true, 'message'=> FORM_DATA_SUBIMITTED_CONTACT_US_FORM,'data'=> '']);
				} else {
					return response()->json(['isSuccess'=> false, 'message'=> FORM_SUBMIT_FAILED, 'error'=> EMAIL_SENDING_ERROR, 'data'=> '']);
				}
			} else {
				return response()->json(['isSuccess'=> false, 'message'=> FORM_SUBMIT_FAILED,'data'=> '']);
			}
		} catch (Exception $e) {
			return response()->json(['isSuccess'=> false, 'message'=> FORM_SUBMIT_FAILED, 'error'=> $e, 'data'=> '']);
		}
	}
}
