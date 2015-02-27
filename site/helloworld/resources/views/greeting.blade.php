@extends('layouts.master')

@section('sidebar')
    @parent

    <p>This is appended to the master sidebar.</p>
@stop

@section('content')
  <h1>Hello, <?php echo $name; ?></h1>
@stop
