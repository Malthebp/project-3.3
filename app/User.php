<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use App\Lecture; 
use App\Product;

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
    
    public function products() 
    {
        return $this->belongsToMany(Product::class)->withPivot('created_at');
    }

    public function lectures()
    {
        return $this->belongsToMany(Lecture::class, 'lecture_reason_user');
    }

    public function schoolClass()
    {
        return $this->belongsTo('App\SchoolClass');
    }

    public function balance(){
        $bal = DB::table('users')->where('id', Auth::id())->value('balance');
        return $bal;
    }

}
