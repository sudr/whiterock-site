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

//Route::get('/', function() {
	//$tests = App\TestModel::all();
	// $tests = TestModel::all();
	//return 'hello world: <pre>' . print_r($tests, 1) . '</pre>';
//	return view('greeting', ['name' => 'James']);
//});

Route::get('/', 'GreetingController@greet');

Route::get('home', function() {
	return 'hello world home';
});

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
