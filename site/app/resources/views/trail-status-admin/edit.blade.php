@extends('layouts.main')

@section('content')
  <h3>Trail Edit: {{ $trail->name }}</h3>
  <form method="POST" action="{{ action('TrailStatusAdminController@postEdit', ['id' => $trail->id]) }}" novalidate>
  		<div class="form-group">
  			<label for="name">Name</label>
  			<input class="form-control" type="text" name="name" id="name" placeholder="Trail Name" value="{{ $trail->name }}"/>
  		</div>
  		<div class="form-group">
  			<label for="type">Type</label>
  			<input class="form-control" type="text" name="type" id="type" placeholder="Trail Type" value="{{ $trail->type }}"/>
  		</div>
  		<div class="form-group">
  			<label for="condition">Condition</label>
  			<input class="form-control" type="text" name="condition" id="condition" placeholder="Trail Condition" value="{{ $trail->condition }}"/>
  		</div>
  		<div class="form-group">
  			<label for="difficulty">Difficulty</label>
  			<input class="form-control" type="text" name="difficulty" id="difficulty" placeholder="Trail Difficulty" value="{{ $trail->difficulty }}"/>
  		</div>
  		<div class="form-group">
  			<label for="length">Length</label>
  			<input class="form-control" type="text" name="length" id="length" placeholder="Trail Length" value="{{ $trail->length }}"/>
  		</div>
  		
  		<button type="submit" id="submit" name="submit" value="submit" class="btn btn-default">Submit</button>
  		<button type="submit" id="cancel" name="cancel" value="cancel" class="btn btn-warning">Cancel</button>
  		<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
  </form>
@stop
