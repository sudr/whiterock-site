<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function() {
	$results = DB::select('select * from users where id = ?', [1]);
	return 'hello world';
});

Route::get('home', 'HomeController@index');

Route::controller('report-issue', 'ReportIssueController');

Route::controller('/manage/trails', 'TrailStatusAdminController');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
