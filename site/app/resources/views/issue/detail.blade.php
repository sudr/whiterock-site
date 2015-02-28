@extends('app')

@section('content')

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

					<form class="form-horizontal" role="form" method="POST" action="{{ action('Issue\ManageController@postEdit', ['id' => $issue->id]) }}" novalidate>
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
						<div class="form-group">
							<label class="col-md-4 control-label">Description</label>
							<div class="col-md-6">{{ $issue->description}}</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Location</label>
							<div class="col-md-6">{{ $issue->location}}</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Trail</label>
							<div class="col-md-6">{{ $issue->trail_id}}</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Photo</label>
							<div class="col-md-6">{{ $issue->photo_id}}</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Name</label>
							<div class="col-md-6">{{ $issue->name }}</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">E-Mail Address</label>
							<div class="col-md-6">{{$issue->email}}</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Phone</label>
							<div class="col-md-6">{{ $issue->phone}}</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Type</label>
							<div class="col-md-6">{{ $issue->type}}</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Assigned Date</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="assigned" value="{{ $issue->assigned}}">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Status</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="status" value="{{ $issue->status}}">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Priority</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="priority" value="{{ $issue->priority}}">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Assigned To</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="assigned_to" value="{{ $issue->assigned_to}}">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Comment</label>
							<div class="col-md-6">
								<textarea class="form-control" rows="3" name="comment">{{ $issue->comment}}</textarea>
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Resolved On</label>
							<div class="col-md-6">{{ $issue->resolved ?: 'Not Resolved' }}</div>
						</div>

						<div class="form-group">
							<div class="col-md-6 col-md-offset-4">
								<button type="submit" class="btn btn-primary">Save</button>
								<a href="{{ action('Issue\ManageController@getIndex') }}">Cancel</a>
								<div class="pull-right">
								@if ($issue->resolved)
									<a href="{{ action('Issue\ManageController@getReopen', ['id' => $issue->id]) }}">Reopen</a>
								@endif
								@if (!$issue->resolved)
									<a href="{{ action('Issue\ManageController@getMarkCompleted', ['id' => $issue->id]) }}">Completed</a>
								@endif
								</div>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
