<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Trail extends Model {

	protected $table = 'trail';

	public $name;
	public $status;
}
