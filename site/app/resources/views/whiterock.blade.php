@extends('layouts.main') @section('content')
<h3>Check Us Out</h3>
<div class="row">
           <div id="interactive-map-container" class="col-sm-10">
               <div id="controls" class="interactive-map-controls">
                   <button type="button" onclick="toggleTown(0);">Town Loop</button><button type="button" onclick="toggleTown(1);">Double Track</button><button type="button" onclick="toggleTown(2);">Equestrian</button><button type="button" onclick="toggleTown(3);">Mountain Bike</button><button type="button" onclick="toggleTown(4);">Riverside</button>
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
       
       <a class="glyphicon glyphicon-download-alt" href="http://whiterockconservancy.org/documents/BackcountryTrailRouteMap2012.pdf" >Download Map</a>
      
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
