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

        $id = Auth::id(); //Get loggedin user id.
        $class = User::with('schoolclass')->find($id); //Get the class which the user is related to. 
        $lecture = Lecture::with('users')->where('start', 'LIKE', date('Y-m-d', strtotime($date)).'%')->where('school_class_id', $class->id)->get(); //Get the lectures with the teacher and related to the users class. 

        return response()->json(['lecture' => $lecture]);  //Return the result in json. 
    }


    public function getLectureView($id)
    {
    	$lecture = Lecture::with('schoolclass', 'users')->find($id);
        $class = SchoolClass::With('users')->find($lecture->schoolclass->id);
    	return view('schedule.lecture')->with('lecture', $lecture)->with('students', $class->users);
        // return $class;
    }
}
