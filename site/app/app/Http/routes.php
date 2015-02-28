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
	return view('/whiterock');
});

Route::get('home', 'HomeController@index');

Route::controller('manage/interests', 'Interest\ManageController');

Route::controller('manage/issues', 'Issue\ManageController');

Route::controller('/manage/trails', 'TrailStatusAdminController');

Route::controller('/json', 'JsonController');

Route::controller('/report-issue', 'Issue\PublicController');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
