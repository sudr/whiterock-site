@extends('layouts.main')

@section('content')
  <h3>Trail Management</h3>
  <table>
  	<tr><th>Name</th><th>Status</th><th>Actions</th></tr>
  	@foreach ($trails as $trail)
  		<tr><td>{{ $trail->name }}</td><td>{{ $trail->status }}</td><td><a href="trails/edit/{{ $trail->id }}">Edit</a></td></tr>
  	@endforeach
  </table>
@stop
