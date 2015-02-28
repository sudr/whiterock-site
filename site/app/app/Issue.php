<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Issue extends Model {
    public $status;
    public $assignedDate;
    public $comments;
    public $priority;
    public $closedDate;
    public $assignee;
}
