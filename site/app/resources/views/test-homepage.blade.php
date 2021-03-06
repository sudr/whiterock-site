@extends('layouts.main')

@section('content')
<div id="trail-conditions">
	<table class="table table-bordered">
		<thead>
			<tr><th>Trail</th><th>Condition</th></tr>
		</thead>
		<tbody>
		</tbody>
	</table>
</div>
@stop

@section('scripts')
<script type="text/javascript">
	$(document).ready(function() {
		$.getJSON("/app/public/json/trails", function( data ) {
		// $.getJSON("/Content/json/trails.json", function( data ) {
			var items = [];
			var conditionsElement = $("#trail-conditions table tbody");
			$.each(data['trails'], function(index, val) {
				var status = "warning";
				if (/^closed/i.test(val.condition)) {
					status = 'danger';
				} else if (/^open/i.test(val.condition)) {
					status = 'success';
				}
				conditionsElement.append("<tr class=\"" + status + "\"><td>" + val.name + "</td><td>" + val.condition + "</td></tr>");
			});
		});
	});
</script>
@stop