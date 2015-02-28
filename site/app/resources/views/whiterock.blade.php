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
               <h3>Trail Conditions</h3>
               <hr />
               Trail 1 - Dry<br />
               Trail 2 - Wet<br />
               Trail 3 - Dry<br />
           </div>
       </div>
@stop
