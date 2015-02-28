<?php namespace App\Http\Controllers\Issue;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Issue;

class PublicController extends Controller {

	public function getSubmit() {
		$issue = new Issue();
		return view('issue/submit', ['issue' => $issue]);
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
				'phone' => 'required',
				'email' => 'required|email',
				'location' => 'required',
				'comment' => 'required'
		]);
		
		$errors = $validator->errors();

		foreach ($issue->fillable as $field) {
			$issue->$field = $data[$field];
		}
		
		if (!$validator->fails()) {
			$issue->save();
			return redirect(action('Issue\PublicController@getThanks'));
		}
		
		return view('issue/submit', ['issue' => $issue, 'errors' => $errors]);
	}
	
	public function getThanks() {
		return view('issue/thankyou');
	}
}
