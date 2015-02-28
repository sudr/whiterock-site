@extends('layouts.admin')

@section('content')
  <h3>Trail Delete</h3>
  <p>Are you sure you want to delete the trail {{ $trail->name }}?</p>
  <form method="POST" action="{{ action('TrailStatusAdminController@postDelete', ['id' => $trail->id]) }}" novalidate>
		<button type="submit" class="btn btn-danger" value="yes" id="yes" name="yes">Yes</button>
		<button type="submit" class="btn btn-success" value="no" id="no" name="no">No</button>
  		<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
  </form>
@stop
