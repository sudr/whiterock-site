<?php namespace App\Http\Controllers\Issue;

use App\Http\Controllers\Controller;
use App\Issue;
use Input;
use Request;

class ManageController extends Controller {

	public function getIndex() {
		$issue = Issue::query();

		// var_dump(Request::all());
		if(!Request::has('all')) {
    	$issue = $issue->whereNull('resolved');
		}
		if(Request::has('sort') && Request::has('order')) {
    	$issue = $issue->orderBy(Request::get('sort'), Request::get('order'));
		}
		return view('issue/manage', ['issues' => $issue->get()]);
	}

	public function getDetail($id) {
		return view('issue/detail', ['issue' => Issue::find($id)]);
	}
}
