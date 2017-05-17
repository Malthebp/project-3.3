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
    public function notAttending(Request $request)
    {
    	$lectureId = $request->input('lectureId');
    	$comment = $request->input('reason');
    	$reason = Reason::create(['comment' => $comment]);
    	$reasonId = $reason->id;

    	$id = Auth::id();
    	$user = User::find($id)->lectures()->attach($lectureId, ['reason_id' => $reasonId]);
    	return back();

    }

    public function attending(Request $request)
    {
    	$lectureId = $request->input('lectureId');
    	$id = Auth::id();
    	$user = User::find($id)->lectures()->attach($lectureId, ['reason_id' => 0]);

    	return back();
    }

    public function get($date)
    {

        // $lecture = DB::table('lectures')->where('start', $date)->get();
        $id = Auth::id();
        $class = User::with('schoolclass')->find($id);
        $lectures = SchoolClass::with('lectures')->find($class->id);
        $lecture = Lecture::with('users')->where('start', 'LIKE', date('Y-m-d', strtotime($date)).'%')->get();

        return response()->json(['lecture' => $lecture]); 

    }
}
