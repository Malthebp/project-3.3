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

    public function test()
    {
        return 'llooolz';
    }    



}
