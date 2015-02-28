<?php namespace App\Http\Controllers;

use \App\Trail;

class TrailStatusAdminController extends Controller {

	public function getIndex() {
		// $trails = Trail::all();
		$trails = array();
		$trail = new Trail();
		$trail->id = 1;
		$trail->name = 'Green';
		$trail->status = 'Open';
		$trails[0] = $trail;
		$trail = new Trail();
		$trail->id = 2;
		$trail->name = 'Blue';
		$trail->status = 'Closed';
		$trails[1] = $trail;

		return view('trail-status-admin/list', ['trails' => $trails]);
	}

	public function getEdit($id) {
		// $trail = Trail::findOrFail($id);
		$trail = new Trail();
		$trail->id = $id;
		return view('trail-status-admin/edit', ['trail' => $trail]);
	}

	/**
	 * Store a new user.
	 *
	 * @param  Request  $request
	 * @param  int  $id
	 * @return Response
	 */
	public function postEdit(Request $request, $id) {
		$url = action('App\Http\Controllers\TrailStatusAdminController@getIndex');
	}

	public function getDelete($id) {
		return view('trail-status-admin/delete', ['trail' => Trail::findOrFail($id)]);
	}

	public function postDelete($id) {
		$url = action('App\Http\Controllers\TrailStatusAdminController@getIndex');
	}
}
