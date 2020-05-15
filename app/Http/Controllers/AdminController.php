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

	public function login(){
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
			return response()->json(['status' => 'LOGGING']); 
		}
	}

	public function page_content() {
		error_reporting(E_ALL & ~E_NOTICE);
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
		#echo "value : ".$value;
		#print_r($value);
		#exit;
		#$content_response = DB::select('select * from content where id='.ADMIN_PAGES_CONST[$last_url_param]);
		#$array = json_decode(json_encode($content_home), true);
		#$value = htmlentities($array[0]['content']);
		#exit;
		return view('admin.admin_content',['title'=> ADMIN_DASHBOARD_TITLE,'timeline'=> $content_home,'data'=> $value]);
	}
}
