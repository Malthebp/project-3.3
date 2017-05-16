<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Lecture;

class SchoolClass extends Model
{
    

    public function users()
    {
    	return $this->hasMany(User::class);
    }

    public function lectures()
    {
    	return $this->hasMany(Lecture::class);
    }
}
