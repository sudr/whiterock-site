<?php namespace App\Http\Controllers;

use \App\Trail;

class JsonController extends Controller {

	public function getTrails() {
		$trails = Trail::all();
		return response()->json(array('trails' => $trails));
	}
	
	public function getTest() {
		return view('test-homepage');
	}
}
