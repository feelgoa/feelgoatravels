<?php
namespace App\Http\Controllers\API;
use Illuminate\Http\Request; 
use App\Http\Controllers\Controller; 
use App\User; 
use Illuminate\Support\Facades\Auth; 
use Validator;
use DB;
class UserController extends Controller 
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
		$booking_id = $get_booking_id ['booking'][0]['booking_id'];
		$booking_details['spots'] = DB::select('SELECT * FROM booking_spot where booking_id = "'.$booking_id.'"');
		return view('user.booking_status_view',['title'=> BOOKING_STATUS_TITLE,'pnrno'=>$get_booking_id ['booking'][0]['booking_pnr']]);

	}

}