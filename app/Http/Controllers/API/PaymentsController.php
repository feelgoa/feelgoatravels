<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PaymentsController extends Controller {

	public function make_payments(Request $request) {
        ini_set('display_errors', 1); 
        ini_set('display_startup_errors', 1); 
        error_reporting(E_ALL); 
        try {
        $method = $request->method();

        echo $method;
        } finally {
            echo "2";
        }
        exit;

        // if (! $request->isMethod('post')) {
        //     return ['user' => $user];
        // }
		// if ($request->method() == "GET") {
        //     echo $method;
        //     echo "here";
        //     exit;
		// 	$MERCHANT_KEY = "nIRFHUsB"; // add your id
		// 	$SALT = "AcLhcxPoOT"; // add your id

		// 	$PAYU_BASE_URL = "https://test.payu.in";
		// 	$PAYU_BASE_URL = "https://secure.payu.in";
        //     $action = '';
		// 	$txnid = substr(hash('sha256', mt_rand() . microtime()), 0, 20);
		// 	$posted = array();
		// 	$posted = array(
		// 		'key' => $MERCHANT_KEY,
		// 		'txnid' => $txnid,
		// 		'amount' => 1000,
		// 		'firstname' => 'Alisther',
		// 		'email' => 'feelgoatravels@gmail.com',
		// 		'productinfo' => 'PHP Project Subscribe',
		// 		'surl' => 'https://www.google.com',
		// 		'furl' => 'https://www.facebook.com',
		// 		'service_provider' => 'payu_paisa',
        //     );
		// 	if(empty($posted['txnid'])) {
		// 		$txnid = substr(hash('sha256', mt_rand() . microtime()), 0, 20);
		// 	} else {
		// 		$txnid = $posted['txnid'];
        //     }
		// 	$hash = '';
		// 	$hashSequence = "key|txnid|amount|productinfo|firstname|email|udf1|udf2|udf3|udf4|udf5|udf6|udf7|udf8|udf9|udf10";
		// 	if(empty($posted['hash']) && sizeof($posted) > 0) {
		// 		$hashVarsSeq = explode('|', $hashSequence);
		// 		$hash_string = '';  
		// 		foreach($hashVarsSeq as $hash_var) {
		// 			$hash_string .= isset($posted[$hash_var]) ? $posted[$hash_var] : '';
		// 			$hash_string .= '|';
		// 		}
		// 		$hash_string .= $SALT;
		// 		$hash = strtolower(hash('sha512', $hash_string));
		// 		$action = $PAYU_BASE_URL . '/_payment';
		// 	} elseif(!empty($posted['hash'])) {
		// 		$hash = $posted['hash'];
		// 		$action = $PAYU_BASE_URL . '/_payment';
        //     }
        //     print_r($hash);
        //     echo "#";
        //     print_r($action);
        //     echo "#";
        //     print_r($txnid);
        //     echo "#";
        //     print_r($posted);
            

        //     exit;
		// 	return response()->json(['isSuccess'=> true, 'message'=> 'Payment Successful.','data'=> '']);
		// } else {
		// 	return response()->json(['isSuccess'=> false, 'message'=> 'Invalid payment method','data'=> '']);
		// }
	}
}
