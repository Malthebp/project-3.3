<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use App\Lecture; 

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];



    public function lectures()
    {
        return $this->belongsToMany(Lecture::class, 'lecture_reason_user');
    }

    public function schoolClass()
    {
        return $this->belongsTo('App\SchoolClass');
    }

    public function isAttending($lectureId)
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
                    return true;
                } else {
                    return false;
                }
            }
        }
        return;
    }

    public function isAtSchool()
    {
        return false;
    }

}
