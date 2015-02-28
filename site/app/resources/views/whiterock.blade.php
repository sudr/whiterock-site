@extends('layouts.main') @section('content')
<h3>This is Home!</h3>

<div class="container-fluid">
	<div class="row">
		<div class="col-md-10">
		</div>
		<div class="col-md-2">
			<div id="trail-conditions">
				<h4>Trail Status</h4>
				<table class="table table-bordered">
					<tbody>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>

<hr style="height: 2px; border: none; color: #333; background-color: #333;">

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