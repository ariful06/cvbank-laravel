<?php

// use PHPMailer;
use App\Fact;
use App\User;
// USE DB;
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

use Illuminate\Support\Facades\Auth;



Route::get('/', function () {
    return view('welcome');
});

Route::get('/settings/view', 'SettingsController@index');


Route::get('/user', function ()
{
	return view('profile');
});











/*================================
Experience
================================*/

Route::get('/dashboard/experience/deleted', 'ExperienceController@indexDelete');
Route::get('/dashboard/experience/{id}/restore/', 'ExperienceController@restore');
Route::get('/dashboard/experience/{id}/pdelete/', 'ExperienceController@PermanentDelete');


Route::resource('/dashboard/experience', 'ExperienceController');



/*================================
Posts
================================*/

Route::get('/dashboard/post/deleted', 'PostController@indexDelete');
Route::get('/dashboard/post/{id}/restore/', 'PostController@restore');
Route::get('/dashboard/post/{id}/pdelete/', 'PostController@PermanentDelete');

Route::resource('/dashboard/post', 'PostController');


/*=====================================
Education
=====================================*/

Route::get('/dashboard/education/deleted', 'EducationController@indexDelete');
Route::get('/dashboard/education/{id}/restore/', 'EducationController@restore');
Route::get('/dashboard/education/{id}/pdelete/', 'EducationController@PermanentDelete');

Route::resource('/dashboard/education', 'EducationController' );










/*
==============================================
For authentication purpose + Registration
==============================================
*/

Route::get('/logout', 'dashboardController@logout');
Route::get('/dashboard', 'dashboardController@showDashboard');
Route::get('/registration', 'dashboardController@newUserRegistration' );

/*====================================
Verification Purposes
====================================*/
Route::get('verify', 'VerificationController@index'); 
Route::post('/verifyuser', 'VerificationController@UserVerification');
Route::get ('/verifyuser', 'VerificationController@UserVerification');
Route::post('/newverification', 'VerificationController@NewVerificationCode');

/*====================================
For Facts
====================================*/
Route::get('/dashboard/fact', 'FactController@index');
Route::get('/dashboard/fact/deleted', 'FactController@indexDelete');

Route::get('/dashboard/fact/create', 'FactController@create');
Route::post('/dashboard/fact/store', 'FactController@store');

Route::get('/dashboard/fact/edit/{id}', 'FactController@edit');
Route::post('/dashboard/fact/{id}/update/', 'FactController@update');

Route::get('/dashboard/fact/delete/{id}/', 'FactController@SoftDelete');
Route::get('/dashboard/fact/pdelete/{id}/', 'FactController@PermanentDelete');
Route::get('/dashboard/fact/restore/{id}', 'FactController@restore');

/*======================================
Hobbies
======================================*/
Route::get('/dashboard/hobbies/create', 'HobbiesController@create');
Route::get('/dashboard/hobbies/', 'HobbiesController@index');
Route::post('/dashboard/hobbies/store', 'HobbiesController@store');

Route::get('/dashboard/hobbies/edit/{id}', 'HobbiesController@edit');
Route::post('/dashboard/hobbies/{id}/update/', 'HobbiesController@update');
Route::get('/dashboard/hobbies/deleted', 'HobbiesController@indexDelete');

Route::get('/dashboard/hobbies/delete/{id}/', 'HobbiesController@SoftDelete');
Route::get('/dashboard/Hobbie/pdelete/{id}/', 'HobbiesController@PermanentDelete');

Route::get('/dashboard/Hobbie/restore/{id}', 'HobbiesController@restore');


/*================================
Award
================================*/

Route::get('/dashboard/award/{id}/restore/', 'AwardController@restore');
Route::get('/dashboard/award/deleted', 'AwardController@indexDelete');
Route::get('/dashboard/award/{id}/pdelete/', 'AwardController@PermanentDelete');

Route::resource('/dashboard/award', 'AwardController');



/*======================================
About
======================================*/
Route::get('/dashboard/about', 'AboutController@index');
Route::get('/dashboard/about/edit', 'AboutController@edit');
Route::post('/dashboard/about/update', 'AboutController@update');


/*Ajax upload*/
Route::get('/ajaxform', function()
{
	return view( 'ajax' );
});
Route::get('/ajaxupload', 'AjaxHandeller@test');
Route::post('/ajaxupload', 'AjaxHandeller@test');












Auth::routes();
Route::get('/home', 'HomeController@index');




Route::get('/404', function (){
	return view('404');
});

