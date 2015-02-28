<?php namespace App\Http\Controllers\Issue;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Issue;

class PublicController extends Controller {

	public function getIndex() {
		$issue = new Issue();
		return view('report-issue', ['issue' => $issue]);
	}

	/**
	 * Submit an issue
	 *
	 * @param  Request  $request
	 * @return Response
	 */
	public function postSubmit(Request $request) {
		$issue = new Issue();

		$data = $request->all();

		$validator = app('Illuminate\Contracts\Validation\Factory')->make($data, [
				'name' => 'required',
				'email' => 'required|email',
				'date' => 'required',
				'type' => 'required'
		]);

		$errors = $validator->errors();

		foreach (array("name","phone","email","date","location","type","description") as $field) {
			$issue->$field = $data[$field];
		}
		if (!$validator->fails()) {
			$issue->status = 'New';
			$issue->save();
			return redirect(action('Issue\PublicController@getThanks'));
		}

		return view('report-issue', ['issue' => $issue, 'errors' => $errors]);
	}

	public function getThanks() {
		return view('issue/thankyou');
	}
}
