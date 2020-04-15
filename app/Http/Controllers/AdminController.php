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
    public function home() 
    { 
        $user = Auth::user(); 
        #return response()->json(['success' => $user], $this-> successStatus); 
        return response()->json(['success' => 'SUCCESS']); 
    }
}
