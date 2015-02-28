<?php namespace App\Http\Controllers;

class TrailStatusAdminController extends Controller {

	public function getIndex() {
		// $trails = \App\Trail::all();
		return view('trail-status-admin/list', [/*'trails' => $trails*/]);
	}

	public function getEdit($id) {
		return view('trail-status-admin/edit', ['trail' => \App\Trail::findOrFail($id)]);
	}

	public function postEdit($id) {
		$url = action('App\Http\Controllers\TrailStatusAdminController@getIndex');
	}

	public function getDelete($id) {
		return view('trail-status-admin/delete', ['trail' => \App\Trail::findOrFail($id)]);
	}

	public function postDelete($id) {
		$url = action('App\Http\Controllers\TrailStatusAdminController@getIndex');
	}
}
