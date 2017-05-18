<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;


class Product extends Model
{
    public function users()
    {
        $userID = Auth::id();
    	return $this->belongsToMany(User::class)->wherePivot('user_id', $userID)->withPivot('created_at');
    }
}
