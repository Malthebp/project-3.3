<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use App\Reason;
use App\User;
use App\Lecture;

class UserController extends Controller
{

	private $teacherIp;
	private $studentIp;
	private $staticTime;
	private $currentTime;

	function __construct()
	{
		$this->studentIp = "195.254.169.71";
		$this->teacherIp = "195.254.169.71";
		$this->staticTime = mktime(8, 30, 00, 5, 18, 2017);
		$this->currentTime = date("d-m-Y H:i:s");
	}

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

    public function attending($lectureId)
    {
    	$id = Auth::id();
    	$user = User::find($id)->lectures()->attach($lectureId, ['reason_id' => 0]);

    	return response()->json([
    		'message' => 'You attends'
    		]);
    }

    public function checkAttendance($lectureId)
    {
        // Get the authenticated users id. Laravel provides this function. 
        $id = Auth::id();
        //Get the row in the lecture_reason_user exists.
        $exists = DB::table('lecture_reason_user')->where([
                ['lecture_id', '=', $lectureId],
                ['user_id', '=', $id],
            ])->get();

        //If nothing was found in the database
        if(!empty($exists))
        {
            //Foreach whatever was found in the database. 
            foreach ($exists as $x)
            {
                //Check if what was found in database has a reason_id that is 0 or not. If it is 0, the student attended, if it has another id, another row has been set in the reasons table, and the student has a reason for not being at class/did not attend class.
                if($x->reason_id == 0)
                {
                    return response()->json(['attending' => true]);
                } elseif ($x->reason_id == 1) {
                    return response()->json(['attending' => 'not attended']);
                } else {
                    return response()->json(['attending' => 'excused']);
                }
            }

        }
        return response()->json(['attending' => false]);
    }

    public function isAtSchool($lectureId)
    {
    	$time = $this->checkTime($lectureId);
    	$ip = $this->checkIp();
    	if($time)
    	{
    		if($ip)
    		{
    			return response()->json([
	        	'isAtSchool' => true
	        	]);
    		} else {
    			 return response()->json([
		        	'isAtSchool' => false
		        	]);
    		} 
    	} 
        return response()->json([
        	'timeChecked' => false
        	]);
    }

    private function checkIp()
	{
		if ($this->teacherIp ===  $this->studentIp)
		{
			return true;
		}
		return false;
	}

	private function checkTime($lectureId)
	{
		$lecture = Lecture::findOrFail($lectureId);
		$classStart = date("d-m-Y H:i:s", strtotime($lecture->start));
		$time = strtotime($classStart);
		$time = $time - (15 * 60);
		$classStart = date("d-m-Y H:i:s", $time);

		$classEnd = date("d-m-Y H:i:s", strtotime($lecture->end));

		$currentTimeFake = date("d-m-Y H:i:s", $this->staticTime);
		$time = strtotime($currentTimeFake);
		$time = $time - (15 * 60);
		$currentTimeFake = date("d-m-Y H:i:s", $time);

		if($classStart <= $currentTimeFake)
		{
			return true;
		}
		return false;
	}
}
