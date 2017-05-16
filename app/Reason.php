<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Reason extends Model
{
    public function user()
    {
    	return $this->hasMany(User::class);
    }
}
