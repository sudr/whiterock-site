<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Trail extends Model {

	protected $table = 'trail';

	public $fillable = array('name', 'type', 'condition', 'difficulty', 'length');
}
