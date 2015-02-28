<?php namespace App\Http\Controllers\Issue;

use App\Http\Controllers\Controller;
use App\Issue;

class ManageController extends Controller {

	public function getIndex()
	{
		$issues = array(
			$this->createIssue('New', date("Y-m-d h:i:sa", strtotime("-3 Days")), 'comment 1', 'High', date("Y-m-d h:i:sa", strtotime("-3 Days")), 'jflogel'),
			$this->createIssue('In progress', date("Y-m-d h:i:sa", strtotime("-3 Days")), 'comment 2', 'Low', date("Y-m-d h:i:sa", strtotime("-3 Days")), 'jdoe')
		);
		return view('issue/manage', ['issues' => $issues]);
	}

	public function getDetail() {
		return view('issue/detail');
	}

	function createIssue($status, $assignedDate, $comments, $priority, $closedDate, $assignee) {
		$issue = new Issue();
		$issue->status = $status;
		$issue->assignedDate = $assignedDate;
		$issue->comments = $comments;
		$issue->priority = $priority;
		$issue->closedDate = $closedDate;
		$issue->assignee = $assignee;
		return $issue;
	}
}
