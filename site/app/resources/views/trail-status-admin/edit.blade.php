@extends('layouts.main')

@section('content')
  <h3>Trail Edit: {{ $trail->name }}</h3>
  <form method="POST" action="edit" novalidate>
  		<div class="form-group">
  			<label for="name">Name</label>
  			<input type="text" name="name" id="name" placeholder="Trail Name" value="{{ $trail->name }}"/>
  		</div>
  		<div class="form-group">
  			<label for="status">Status</label>
  			<input type="text" name="status" id="status" placeholder="Trail Status" value="{{ $trail->status }}"/>
  		</div>
  		
  		<button type="submit" class="btn btn-success">Submit</button>
  		<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
  </form>
@stop
