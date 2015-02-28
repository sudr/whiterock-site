@extends('layouts.main') @section('content')
<h3>Check Us Out</h3>
<div class="row">
	<div id="interactive-map-container" class="col-sm-10">
		<div id="trailToggles">
		<input type="checkbox" id="townLoop" onClick="toggleLayer(0);" checked>
		<label for="townLoop">Town Loop</label>
		<input type="checkbox" id="doubleTrack" onClick="toggleLayer(1);" checked>
		<label for="doubleTrack">Double Track</label>
		<input type="checkbox" id="horse" onClick="toggleLayer(2);" checked>
		<label for="horse">Equestrian</label>
		<input type="checkbox" id="mountainBike" onClick="toggleLayer(3);" checked>
		<label for="mountainBike">Mountain Bike</label>
		<input type="checkbox" id="riverside" onClick="toggleLayer(4);" checked>
		<label for="riverside">Riverside</label>
		</div>

		<div id="mapDiv"></div>


		<div id="legend" ></div>
	</div>

	<div class="col-sm-2">
		<div id="trail-conditions">
			<h4>Trail Status</h4>
			<table class="table table-bordered">
				<tbody>
				</tbody>
			</table>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-sm-12" style="margin-top: 30px">
		<a class="glyphicon glyphicon-download-alt" href="http://whiterockconservancy.org/documents/BackcountryTrailRouteMap2012.pdf" >Download Map</a>
	</div>
</div>
@stop

@section('scripts')
<script type="text/javascript">
	$("document").ready(function() {
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
<script src="/Scripts/interactive-map.js"></script>
@stop
