<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Issue extends Model {
	
	protected $table = 'issue';
	/*
    public $status;
    public $assignedDate;
    public $priority;
    public $closedDate;
    public $assignee;
    */
    public $fillable = ['name', 'email', 'phone', 'location', 'comment'];
}
