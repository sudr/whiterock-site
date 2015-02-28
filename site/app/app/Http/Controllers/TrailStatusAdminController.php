<?php namespace App\Http\Controllers;

use Illuminate\Validation\Validator;
use Illuminate\Http\Request;
use \App\Trail;

class TrailStatusAdminController extends Controller {

	public function getIndex() {
		$trails = Trail::all();

		return view('trail-status-admin/list', ['trails' => $trails]);
	}
	
	public function getCreate() {
		$trail = new Trail();	
		return view('trail-status-admin/edit', ['trail' => $trail]);
	}

	public function getEdit($id) {
		$trail = Trail::findOrNew($id);
		return view('trail-status-admin/edit', ['trail' => $trail]);
	}
	
	/**
	 * Edit a trail
	 *
	 * @param  Request  $request
	 * @param  int  $id
	 * @return Response
	 */
	public function postEdit(Request $request, $id = null) {
		$trail = Trail::findOrNew($id);
		$data = $request->all();
		$validator = app('Illuminate\Contracts\Validation\Factory')->make($data, [
				'name' => 'required',
				'type' => 'required',
				'condition' => 'required',
				'difficulty' => 'required',
				'length' => 'required'
		]);
		foreach ($trail->fillable as $field) {
			$trail->$field = $data[$field];
		}
		if (!$validator->fails()) {
			// Save to db and redirect
			$trail->save();
			return redirect(action('TrailStatusAdminController@getIndex'));
		}
		echo '<pre>';
		print_r($validator->errors());
		print_r($data);
		echo '</pre>';
		return view('trail-status-admin/edit', ['trail' => $trail, 'errors' => $validator->errors()]);
	}

	public function getDelete($id) {
		return view('trail-status-admin/delete', ['trail' => Trail::findOrFail($id)]);
	}

	/**
	 * Delete a trail
	 *
	 * @param  Request  $request
	 * @param  int  $id
	 * @return Response
	 */
	public function postDelete(Request $request, $id) {
		$trail = Trail::findOrFail($id);
		$data = $request->all();
		var_dump($data);
		if ($request->input('yes')) {
			$trail->delete();
		}

		return redirect(action('TrailStatusAdminController@getIndex'));
	}
}
