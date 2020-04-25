<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class PagesController extends Controller
{
    //
    function home()
    {
        $timeline = DB::select('select * from timeline where visiblity=1');
        return view('user.home',compact('timeline'));
    }
}
