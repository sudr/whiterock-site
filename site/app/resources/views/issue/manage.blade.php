@extends('layouts/main')

@section('content')
<style type="text/css">
  .inactive {color:#eeeeee;}
</style>

<div class="container-fluid">
	<div class="row">
		<div class="col-md-12">
  <h2>Issues</h2>
  <div>
  @if (strpos(basename($_SERVER['REQUEST_URI']), 'all=1') !== FALSE)
    <a href="{{ action('Issue\ManageController@getIndex', ['sort' => Request::input('sort'), 'order' => Request::input('order')]) }}">Show Unresolved Issues</a>
  @else
    <a href="{{ action('Issue\ManageController@getIndex', ['all' => 1, 'sort' => Request::input('sort'), 'order' => Request::input('order')]) }}">Show All Issues</a>
  @endif
  </div>

  <table class="table table-striped table-bordered">
    <tr>
      <th>
        @if (Request::input('sort') && Request::input('sort') == 'status')
        <a href="{{ action('Issue\ManageController@getIndex', ['sort' => 'status', 'order' => Request::input('order') === 'desc' ? 'asc': 'desc', 'all' => Request::input('all')]) }}">Status</a>
        @else
        <a href="{{ action('Issue\ManageController@getIndex', ['sort' => 'status', 'order' => 'asc', 'all' => Request::input('all')]) }}">Status</a>
        @endif
      </th>
      <th>
        @if (Request::input('sort') && Request::input('sort') == 'assigned')
        <a href="{{ action('Issue\ManageController@getIndex', ['sort' => 'assigned', 'order' => Request::input('order') === 'desc' ? 'asc': 'desc', 'all' => Request::input('all')]) }}">Assigned Date</a>
        @else
        <a href="{{ action('Issue\ManageController@getIndex', ['sort' => 'assigned', 'order' => 'asc', 'all' => Request::input('all')]) }}">Assigned Date</a>
        @endif
      </th>
      <th>
        @if (Request::input('sort') && Request::input('sort') == 'comment')
        <a href="{{ action('Issue\ManageController@getIndex', ['sort' => 'comment', 'order' => Request::input('order') === 'desc' ? 'asc': 'desc', 'all' => Request::input('all')]) }}">Comments</a>
        @else
        <a href="{{ action('Issue\ManageController@getIndex', ['sort' => 'comment', 'order' => 'asc', 'all' => Request::input('all')]) }}">Comments</a>
        @endif
      </th>
      <th>
        @if (Request::input('sort') && Request::input('sort') == 'priority')
        <a href="{{ action('Issue\ManageController@getIndex', ['sort' => 'priority', 'order' => Request::input('order') === 'desc' ? 'asc': 'desc', 'all' => Request::input('all')]) }}">Priority</a>
        @else
        <a href="{{ action('Issue\ManageController@getIndex', ['sort' => 'priority', 'order' => 'asc', 'all' => Request::input('all')]) }}">Priority</a>
        @endif
      </th>
      <th>
        @if (Request::input('sort') && Request::input('sort') == 'resolved')
        <a href="{{ action('Issue\ManageController@getIndex', ['sort' => 'resolved', 'order' => Request::input('order') === 'desc' ? 'asc': 'desc', 'all' => Request::input('all')]) }}">Closed Date</a>
        @else
        <a href="{{ action('Issue\ManageController@getIndex', ['sort' => 'resolved', 'order' => 'asc', 'all' => Request::input('all')]) }}">Closed Date</a>
        @endif
      </th>
      <th>
        @if (Request::input('sort') && Request::input('sort') == 'assigned_to')
        <a href="{{ action('Issue\ManageController@getIndex', ['sort' => 'assigned_to', 'order' => Request::input('order') === 'desc' ? 'asc': 'desc', 'all' => Request::input('all')]) }}">Assigned To</a>
        @else
        <a href="{{ action('Issue\ManageController@getIndex', ['sort' => 'assigned_to', 'order' => 'asc', 'all' => Request::input('all')]) }}">Assigned To</a>
        @endif
      </th>
      <th></th>
  @foreach ($issues as $issue)
    <tr>
      <td>{{ $issue->status }}</td>
      <td>{{ date("Y-m-d",strtotime($issue->assigned))}}</td>
      <td>{{ $issue->comment }}</td>
      <td>{{ $issue->priority }}</td>
      <td>{{ $issue->resolved ? date("Y-m-d",strtotime($issue->resolved)) : ''}}</td>
      <td>{{ $issue->assigned_to }}</td>
      <td><a href="{{ action('Issue\ManageController@getDetail', ['id' => $issue->id]) }}">Details</a>
    </tr>
  @endforeach
  </table>
</div>
</div>
</div>
@stop
