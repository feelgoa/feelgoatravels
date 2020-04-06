<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;

$timeline_data = DB::table('Timeline')->get();
$t1 = DB::select('select * from timeline');

class TimelineController extends Controller
{
    public function get_list() {
        $user = DB::select('select * from timeline');
        $data = array(
            'title'=>'My App',
            'Description'=>'This is New Application',
            'author'=>'foo'
            );
        //return view('landing', compact(['user' =>$t1]));
        return view('landing', compact('user'));
        //return view('landing')->with($data);
    }
}
