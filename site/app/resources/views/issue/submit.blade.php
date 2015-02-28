@extends('layouts.main')

@section('content')
  <h3>Issue Submit</h3>
  @foreach ($errors->all() as $error)
  	<p>{{ $error }}</p>
  @endforeach
  <form method="POST" action="{{ action('Issue\PublicController@postSubmit') }}" novalidate>
  		<div class="form-group">
  			<label for="name">Name</label>
  			<input type="text" name="name" id="name" placeholder="Submitter Name" value="{{ $issue->name }}"/>
  		</div>
  		<div class="form-group">
  			<label for="phone">Phone</label>
  			<input type="text" name="phone" id="phone" placeholder="Submitter Phone" value="{{ $issue->phone }}"/>
  		</div>
  		<div class="form-group">
  			<label for="email">Email</label>
  			<input type="text" name="email" id="email" placeholder="Submitter Email" value="{{ $issue->email }}"/>
  		</div>
  		<div class="form-group">
  			<label for="location">Location</label>
  			<input type="text" name="location" id="location" placeholder="Issue Location" value="{{ $issue->location }}"/>
  		</div>
  		<div class="form-group">
  			<label for="comment">Comment</label>
  			<input type="text" name="comment" id="comment" placeholder="Issue Comment" value="{{ $issue->comment }}"/>
  		</div>
  		
  		<button type="submit" class="btn btn-success">Submit</button>
  		<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
  </form>
@stop