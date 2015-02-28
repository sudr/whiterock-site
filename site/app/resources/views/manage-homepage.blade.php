@extends('layouts/admin')

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-md-12">
			<div>
				<a href="{{ url('/manage/trails') }}">Manage Trail Conditions</a>
			</div>
			<div>
				<a href="{{ url('/manage/issues') }}">Review Issues</a>
			</div>
		</div>
	</div>
</div>
@stop
