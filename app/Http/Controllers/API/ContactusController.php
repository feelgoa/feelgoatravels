<?php


namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; 
use Validator;
use DB;

class ContactusController extends Controller {

	public function savedetails() {
		if(isset($_POST['g-recaptcha-response'])){
			$captcha=$_POST['g-recaptcha-response'];
		  }
		  if(!$captcha){
			return response()->json(['isSuccess'=> false, 'message'=> RECAPTCH_REQUIRED,'data'=> '']);
		  }
		  /*$secretKey = RECAPCHA_SECRET_KEY;
		  $ip = $_SERVER['REMOTE_ADDR'];
		  // post request to server
		  $url = 'https://www.google.com/recaptcha/api/siteverify?secret=' . urlencode($secretKey) .  '&response=' . urlencode($captcha);
		  $response = file_get_contents($url);
		  $responseKeys = json_decode($response,true);*/
		  $responseKeys = validate_recapcha(urlencode($captcha));
		  // should return JSON with success as true
		  if($responseKeys["success"]) {
			  return response()->json(['isSuccess'=> true, 'message'=> 'Your Data has been submited successfully.','data'=> '']);
				  
		  } else {
			  return response()->json(['isSuccess'=> false, 'message'=> 'Suspecious User.','data'=> '']);
		  }
	}
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
            $responseKeys["success"]  = 1;
			if($responseKeys["success"] == 1) {
                $input = $request->all();
                $name_concat = $input['firstname'].' '.$input['lastname'];
                $mailsender = send_mail_custom($input['email'],$name_concat);
                if ($mailsender == 1) {
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
