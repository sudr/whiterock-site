<?php namespace App\Http\Controllers\Issue;

use App\Http\Controllers\Controller;
use App\Issue;
use Illuminate\Http\Request;

class ManageController extends Controller {

	public function getIndex(Request $request) {
		$issue = Issue::query();
		if(!$request->has('all')) {
    	$issue = $issue->whereNull('resolved');
		}
		if($request->has('sort') && $request->has('order')) {
    	$issue = $issue->orderBy($request->query('sort'), $request->query('order'));
		}
		return view('issue/manage', ['issues' => $issue->get()]);
	}

	public function getMarkCompleted($id) {
		$issue = Issue::find($id);
		$issue->resolved = date("Y-m-d H:i:s");
		$issue->save();
		return redirect('manage/issues');
	}

	public function getReopen($id) {
		$issue = Issue::find($id);
		$issue->resolved = null;
		$issue->save();
		return redirect('manage/issues');
	}

	public function postEdit(Request $request, $id) {
		$issue = Issue::find($id);
		$issue->status = $request->get('status');
		$issue->priority = $request->get('priority');
		$issue->assigned_to = $request->get('assigned_to');
		$issue->comment = $request->get('comment');
		$issue->assigned = $request->get('assigned');
		$issue->save();
		return redirect('manage/issues');
	}

	public function getDetail($id) {
		return view('issue/detail', ['issue' => Issue::find($id)]);
	}
}
