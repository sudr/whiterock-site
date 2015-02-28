<?php namespace App\Http\Controllers;

use \App\Trail;

class TrailStatusAdminController extends Controller {

	public function getTrails() {
		$trails = Trail::all();
		return response()->json($trails);
	}
}
