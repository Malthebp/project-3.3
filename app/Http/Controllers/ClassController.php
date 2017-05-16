<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\SchoolClass; 
use App\Lecture;

class ClassController extends Controller
{
    public function index()
    {
    	$id = Auth::id();
    	$class = User::with('schoolclass')->find($id);
    	$lectures = SchoolClass::with('lectures')->find($class->id);
    	$teacher = Lecture::with('users')->get();

    	return $teacher;
    }
}
