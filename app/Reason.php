<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Reason extends Model
{
	protected $fillable = ['comment'];
    public function user()
    {
    	return $this->hasMany(User::class);
    }
}
