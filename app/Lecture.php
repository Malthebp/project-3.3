<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use App\User;
use App\SchoolClass;
use App\Reason;

class Lecture extends Model
{
    
    public function users()
    {
    	return $this->belongsToMany(User::class);
    }

    public function schoolclass()
    {
    	return $this->belongsTo(SchoolClass::class);
    }

    public function reasons()
    {
    	return $this->hasMany(Reason::class);
    }


}
