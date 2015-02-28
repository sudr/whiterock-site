@extends('layouts.admin')

@section('content')
  <h3>manage interests</h3>
  @if (count($errors) > 0)
	<div class="alert alert-danger">
		<strong>Whoops!</strong> There were some problems with your input.<br><br>
		<ul>
		@foreach ($errors->all() as $error)
			<li>{{ $error }}</li>
		@endforeach
		</ul>
	</div>
  @endif
  
  <table>
    <tr>
      <th>Id</th>
      <th>Name</th>
      <th>Email</th>
      <th>Phone</th>
      <th>Date</th>
      <th>Location</th>
      <th>Removed</th>
      <th>Trail</th>
      <th>Photo</th>
    </tr>
	@foreach ($interests->all() as $interest)
    <tr>
      <td>{{ $interest->id }}</td>
      <td>{{ $interest->name }}</td>
      <td>{{ $interest->email }}</td>
      <td>{{ $interest->phone }}</td>
      <td>{{ $interest->date }}</td>
      <td>{{ $interest->location }}</td>
      <td>{{ $interest->removed }}</td>
      <td>{{ $interest->trailId }}</td>
      <td>{{ $issue->photoId }}</td>
      <td><a href="interests/{{ $interest->id }}">Details</a>
    </tr>
  @endforeach
  </table>
@stop
@endsection