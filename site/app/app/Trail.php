<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Trail extends Model {

	protected $table = 'trail';

	protected $fillable = array('name', 'status');
	// public $name;
	// public $status;
}
