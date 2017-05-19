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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/shop', 'UserController@shop');
Route::post('/shop', 'ProductController@shopBuy');

//Schedule test
Route::get('/schedule', 'ClassController@index');
Route::post('/schedule/notattending', 'UserController@notAttending');
Route::get('/user/isatschool/{id}', 'UserController@isAtSchool');
Route::post('/lecture/attend/{id}', 'UserController@attending');
Route::get('/lecture/attendance/{id}', 'UserController@checkAttendance');
Route::get('/lecture/get/{date}', 'LectureController@get');


//TESTER
Route::get('/profile/user', function () {
	return view('profile.user');
});
/*
Route::get('/profile/user', function () {
	return view('profile.user');
});
*/
Route::get('/profile/user', 'UserController@userData');