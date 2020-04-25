<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller; 
use App\User; 
use Illuminate\Support\Facades\Auth; 
use Validator;
class AdminController extends Controller {
	/** 
	 * details api 
	 * 
	 * @return \Illuminate\Http\Response 
	 */ 
	public function home() {
		return view('admin.admin_home',['title'=> ADMIN_HOME]);
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
}
