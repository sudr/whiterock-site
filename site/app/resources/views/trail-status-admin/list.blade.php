@extends('layouts.admin')

@section('content')
  <h3>Trail Management</h3>
  <a href="{{ action('TrailStatusAdminController@getCreate') }}">Create a new Trail</a>
  <table class="table">
	<thead>
		  <tr><th>Name</th><th>Type</th><th>Condition</th><th>Difficulty</th><th>Length</th><th>Actions</th></tr>
  	</thead>
  	<tbody class="table-striped">
  	@foreach ($trails as $trail)
  		<tr>
  			<td>{{ $trail->name }}</td>
  			<td>{{ $trail->type }}</td>
  			<td>{{ $trail->condition }}</td>
  			<td>{{ $trail->difficulty }}</td>
  			<td>{{ $trail->length }}</td>
  			<td>
  				<a href="{{ action('TrailStatusAdminController@getEdit', ['id' => $trail->id]) }}">Edit</a>
  				<a href="{{ action('TrailStatusAdminController@getDelete', ['id' => $trail->id]) }}">Delete</a>
  			</td>
  		</tr>
  	@endforeach
	</tbody>
  </table>
@stop
