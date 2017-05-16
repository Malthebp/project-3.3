<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User; 
use App\Reason;

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
}
