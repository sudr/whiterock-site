<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Issue extends Model {

    protected $table = 'issue';

    protected $fillable = ['name', 'email', 'phone', 'assigned',
      'location', 'type', 'status', 'priority', 'assigned_to',
      'comment', 'description', 'resolved', 'trailId', 'photoId'];
}
