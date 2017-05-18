<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


use App\User; 
use App\Reason;
use App\SchoolClass;
use App\Lecture;

class LectureController extends Controller
{


    public function get($date)
    {

        // $lecture = DB::table('lectures')->where('start', $date)->get();
        $id = Auth::id();
        $class = User::with('schoolclass')->find($id);
        $lectures = SchoolClass::with('lectures')->find($class->id);
        $lecture = Lecture::with('users')->where('start', 'LIKE', date('Y-m-d', strtotime($date)).'%')->get();

        return response()->json(['lecture' => $lecture]); 
    }


    public function getLectureView($id)
    {
    	$lecture = Lecture::with('schoolclass', 'users')->find($id);
        $class = SchoolClass::With('users')->find($lecture->schoolclass->id);
    	return view('schedule.lecture')->with('lecture', $lecture)->with('students', $class->users);
        // return $class;
    }
}
