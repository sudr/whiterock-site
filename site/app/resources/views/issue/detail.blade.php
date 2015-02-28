@extends('app')

@section('content')

<p>
	{{$issue->resolved}}
	<a href="{{ action('Issue\ManageController@getIndex') }}">List</a>
@if ($issue->resolved)
	<a href="{{ action('Issue\ManageController@getReopen', ['id' => $issue->id]) }}">Reopen</a>
@endif
@if (!$issue->resolved)
	<a href="{{ action('Issue\ManageController@getMarkCompleted', ['id' => $issue->id]) }}">Completed</a>
@endif

<div>Name: {{ $issue->name}}</div>
<div>Email: {{ $issue->email}}</div>
<div>Phone: {{ $issue->phone}}</div>
updatable!!!<div>Assigned On: {{ $issue->assigned}}</div>
<div>Location: {{ $issue->location}}</div>
<div>Type: {{ $issue->type}}</div>
updatable!!!<div>Status: {{ $issue->status}}</div>
updatable!!!<div>Priority: {{ $issue->priority}}</div>
updatable!!!<div>Assigned To: {{ $issue->assigned_to}}</div>
updatable!!!<div>Comments: {{ $issue->comment}}</div>
<div>Resolved On: {{ $issue->resolved}}</div>
<div>Trail: {{ $issue->trail_id}}</div>
<div>Photo: {{ $issue->photo_id}}</div>
<div>Description: {{ $issue->description}}</div>
</p>
<div class="container-fluid">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">Manage</div>
				<div class="panel-body">
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

					<form class="form-horizontal" role="form" method="POST" action="{{ url('/auth/register') }}">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">

						<div class="form-group">
							<label class="col-md-4 control-label">Name</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="name" value="{{ old('name') }}">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">E-Mail Address</label>
							<div class="col-md-6">
								<input type="email" class="form-control" name="email" value="{{ old('email') }}">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Password</label>
							<div class="col-md-6">
								<input type="password" class="form-control" name="password">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Confirm Password</label>
							<div class="col-md-6">
								<input type="password" class="form-control" name="password_confirmation">
							</div>
						</div>

						<div class="form-group">
							<div class="col-md-6 col-md-offset-4">
								<button type="submit" class="btn btn-primary">
									Register
								</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
