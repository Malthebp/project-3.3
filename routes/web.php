<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/welcome', function () {
    return view('welcome');
});

Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
Route::group(['middleware' => ['auth']], function () {
	//Schedule
	Route::get('/', 'ClassController@index'); //Get view for calendar
	Route::post('/lecture/notattending/{id}', 'UserController@notAttending'); //Used for AJAX requests
	Route::get('/user/isatschool/{id}', 'UserController@isAtSchool');//Used for AJAX requests
	Route::post('/lecture/attend/{id}', 'UserController@attending');//Used for AJAX requests
	Route::get('/lecture/attendance/{id}', 'UserController@checkAttendance');//Used for AJAX requests
	Route::get('/lecture/get/{date}', 'LectureController@get');//Used for AJAX requests
	Route::get('/lecture/{id}', 'LectureController@getLectureView'); //This acutally returns a view ;-) 

	//TESTER
	Route::get('/profile/user', function () {
		return view('profile.user');
	});

	Route::get('/profile/user', function () {
		return view('profile.user');
	});

	Route::get('/logout', function () {
		Auth::logout();
	});

});