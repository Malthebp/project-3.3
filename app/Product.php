<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use App\User;

class Product extends Model
{
    public function users()
    {
    	return $this->belongsToMany(User::class)->withPivot('created_at');
    }
}
