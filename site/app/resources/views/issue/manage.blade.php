@extends('layouts.admin')

@section('content')
  <h3>list of issues</h3>
  <div>
  @if (strpos(basename($_SERVER['REQUEST_URI']), 'all=1') !== FALSE)
    <a href="{{ action('Issue\ManageController@getIndex') }}">Show Unresolved Issues</a>
  @else
    <a href="{{ action('Issue\ManageController@getIndex', ['all' => 1]) }}">Show All Issues</a>
  @endif
  </div>

  <table>
    <tr>
      <th>Status
        <a href="{{ action('Issue\ManageController@getIndex', ['sort' => 'status', 'order' => 'asc', 'all' => Request::input('all')]) }}">
            <i class="fa fa-chevron-up">asc</i>
        </a>
        <a href="{{ action('Issue\ManageController@getIndex', ['sort' => 'status', 'order' => 'desc', 'all' => Request::input('all')]) }}">
            <i class="fa fa-chevron-down">desc</i>
        </a>
      </th>
      <th>Assigned Date
        <a href="{{ action('Issue\ManageController@getIndex', ['sort' => 'assigned_to', 'order' => 'asc', 'all' => Request::input('all')]) }}">
            <i class="fa fa-chevron-up">asc</i>
        </a>
        <a href="{{ action('Issue\ManageController@getIndex', ['sort' => 'assigned_to', 'order' => 'desc', 'all' => Request::input('all')]) }}">
            <i class="fa fa-chevron-down">desc</i>
        </a>
      </th>
      <th>Comments
        <a href="{{ action('Issue\ManageController@getIndex', ['sort' => 'comment', 'order' => 'asc', 'all' => Request::input('all')]) }}">
            <i class="fa fa-chevron-up">asc</i>
        </a>
        <a href="{{ action('Issue\ManageController@getIndex', ['sort' => 'comment', 'order' => 'desc', 'all' => Request::input('all')]) }}">
            <i class="fa fa-chevron-down">desc</i>
        </a>
      </th>
      <th>Priority
        <a href="{{ action('Issue\ManageController@getIndex', ['sort' => 'priority', 'order' => 'asc', 'all' => Request::input('all')]) }}">
            <i class="fa fa-chevron-up">asc</i>
        </a>
        <a href="{{ action('Issue\ManageController@getIndex', ['sort' => 'priority', 'order' => 'desc', 'all' => Request::input('all')]) }}">
            <i class="fa fa-chevron-down">desc</i>
        </a>
      </th>
      <th>Closed Date
        <a href="{{ action('Issue\ManageController@getIndex', ['sort' => 'resolved', 'order' => 'asc', 'all' => Request::input('all')]) }}">
            <i class="fa fa-chevron-up">asc</i>
        </a>
        <a href="{{ action('Issue\ManageController@getIndex', ['sort' => 'resolved', 'order' => 'desc', 'all' => Request::input('all')]) }}">
            <i class="fa fa-chevron-down">desc</i>
        </a>
      </th>
      <th>Assigned To
        <a href="{{ action('Issue\ManageController@getIndex', ['sort' => 'assigned_to', 'order' => 'asc', 'all' => Request::input('all')]) }}">
            <i class="fa fa-chevron-up">asc</i>
        </a>
        <a href="{{ action('Issue\ManageController@getIndex', ['sort' => 'assigned_to', 'order' => 'desc', 'all' => Request::input('all')]) }}">
            <i class="fa fa-chevron-down">desc</i>
        </a>
      </th>
      <th></th>
  @foreach ($issues as $issue)
    <tr>
      <td>{{ $issue->status }}</td>
      <td>{{ $issue->assigned }}</td>
      <td>{{ $issue->comment }}</td>
      <td>{{ $issue->priority }}</td>
      <td>{{ $issue->resolved }}</td>
      <td>{{ $issue->assigned_to }}</td>
      <td><a href="{{ action('Issue\ManageController@getDetail', ['id' => $issue->id]) }}">Details</a>
    </tr>
  @endforeach
  </table>
@stop
