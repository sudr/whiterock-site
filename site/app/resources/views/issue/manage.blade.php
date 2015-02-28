@extends('layouts.admin')

@section('content')
  <h3>list of issues</h3>

  <table>
    <tr>
      <th>Status</th>
      <th>Assigned Date</th>
      <th>Comments</th>
      <th>Priority</th>
      <th>Closed Date</th>
      <th>Assignee</th>
      <th></th>
  @foreach ($issues as $issue)
    <tr>
      <td>{{ $issue->status }}</td>
      <td>{{ $issue->assignedDate }}</td>
      <td>{{ $issue->comments }}</td>
      <td>{{ $issue->priority }}</td>
      <td>{{ $issue->closedDate }}</td>
      <td>{{ $issue->assignee }}</td>
      <td><a href="issues/detail">Details</a>
    </tr>
  @endforeach
  </table>
@stop
