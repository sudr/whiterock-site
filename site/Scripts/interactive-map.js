/// <reference path="jquery-1.10.2.intellisense.js" />
var map;

/*
$("document").ready( function() {
        var legend = document.getElementById('legend');
        for (var key in icons) {
            var type = icons[key];
            var name = type.name;
            var icon = type.icon;
            var div = document.createElement('div');
            div.innerHTML = '<img src="' + icon + '"> ' + name;
            legend.appendChild(div);
        }
    });
    */

var map;

function initMap() {
//Enabling new cartography and themes
google.maps.visualRefresh = true;
//Setting starting options of map
var mapOptions = {center: new google.maps.LatLng(41.825,-94.64),
	zoom: 14
	};
//Getting map DOM element
var mapElement = document.getElementById('mapDiv');
//Creating a map with DOM element which is just
//obtained
map = new google.maps.Map(mapElement, mapOptions);

  var txt = '{"POI": [{"lat": "41.8597","long": "-94.6706","description": "The grandkids loved staying in the former chicken coop.  It was much bigger and MUCH nicer than theirs at home!","imageSrc": "http://www.whiterockconservancy.org/photos/1.JPG"},'
  +'{"lat": "41.8075","long": "-94.6408","description": "My favorite view of the stars is from my campsite with a great fire going.","imageSrc": "http://whiterockconservancy.org/photos/2.jpg"}'
  +',{'
+'        "lat": "41.8161",'
+'          "long": "-94.6656",'
+'            "description": "Nothing can beat the view over the prairie and farm fields for putting me in a good mood.",'
+'            "imageSrc": "http://whiterockconservancy.org/photos/3.JPG"'
+'        },'
+'            {'
+'            "lat": "41.8612",'
+'            "long": "-94.6712",'
+'            "description": "I remember fishing in this pond growing up.  The new upgrades and fesh stocking make it my favorite place to fish still.",'
+'            "imageSrc": "http://whiterockconservancy.org/photos/4.jpg"},'
+'            {'
+'            "lat": "41.8268",'
+'            "long": "-94.6528",'
+'            "description": "The 805 River Cabin is the perfect get away.",'
+'            "imageSrc": "http://whiterockconservancy.org/photos/6.jpg"}'
+'            ,{'
+'            "lat": "41.8171",'
+'            "long": "-94.6445",'
+'            "description": "The trails along the river are my favorite place to snowshoe.",'
+'            "imageSrc": "http://whiterockconservancy.org/photos/7.jpg"}'
+'            ,{'
+'            "lat": "41.8174",'
+'            "long": "-94.6457",'
+'            "description": "The main campground is my favorite place to stay because it is in the middle of everything.",'
+'            "imageSrc": "http://whiterockconservancy.org/photos/8.jpg"}'
+' ,{'
+'            "lat": "41.8582",'
+'            "long": "-94.6683",'
+'            "description": "I saw a new baby bison!",'
+'            "imageSrc": "http://whiterockconservancy.org/photos/9.jpg"}'
+' ,{'
+'            "lat": "41.8496",'
+'            "long": "-94.6614",'
+'            "description": "The Egret was beautiful as it was taking off from the pond.",'
+'            "imageSrc": "http://whiterockconservancy.org/photos/10.jpg"}'
+' ,{'
+'            "lat": "41.8139",'
+'            "long": "-94.6313",'
+'            "description": "Tonight\'s Dinner!",'
+'            "imageSrc": "http://whiterockconservancy.org/photos/11.jpg"}'
+' ,{'
+'            "lat": "41.8168",'
+'            "long": "-94.6406",'
+'            "description": "The King Fisher worked hard to kill the fish in his mouth by hitting it against the log.",'
+'            "imageSrc": "http://whiterockconservancy.org/photos/12.jpg"}'
+' ,{'
+'            "lat": "41.8543",'
+'            "long": "-94.6651",'
+'            "description": "The eagles are sitting on some eggs.",'
+'            "imageSrc": "http://whiterockconservancy.org/photos/13.jpg"}'
+']}';
  jQuery.get('http://codepen.io/AutoPilot/pen/WbyKWL.js', function(jsondata) {
   console.log(jsondata);   
    txt = jsondata;
  });
  
  //$.getJSON("http://codepen.io/AutoPilot/pen/WbyKWL.js", function( json ) {console.log( "JSON Data: " + json);txt = json; });
  
 //console.log(txt);
  //var jso = getJSON("static.json");
  var Obj = JSON.parse(txt);
//console.log(Obj)
  placeJSONMarkers(Obj);
    
  //MAKE KML LAYERS
layers = [];
layers[0] = new google.maps.KmlLayer({url: "http://www.whiterockconservancy.org/layers/TownLoopTrail.kmz"});
layers[1] = new google.maps.KmlLayer({url: "http://www.whiterockconservancy.org/layers/DoubleTrackTrail.kmz"});
layers[2] = new google.maps.KmlLayer({url: "http://www.whiterockconservancy.org/layers/EquestrianTrail.kmz"});
layers[3] = new google.maps.KmlLayer({url: "http://www.whiterockconservancy.org/layers/MountainBikeTrail.kmz"});
layers[4] = new google.maps.KmlLayer({url: "http://www.whiterockconservancy.org/layers/CarrollCountyRiversideTrail.kmz"});

  //SHOW KML LAYER
  for (i = 0; i < 4; i ++){
    layers[i].setMap(map);
  }
//console.log(layer);

google.maps.event.addListener(map,'dblclick',function(event){
  showLatLng(event.latLng);
});

map.controls[google.maps.ControlPosition.RIGHT_BOTTOM].push(legend);

$("#trailToggles").buttonset();   
}

function placeJSONMarkers(jObj){
  for (var i = 0;i<jObj.POI.length;i++)
    {
      placeMarker(jObj.POI[i]);
    }
}

function placeMarker(jsonObj){

  //pulls out just the filename to add the the icon path for image thumbnails
  var path = jsonObj.imageSrc;
  var parts = path.split('/');
  var filename = parts[parts.length - 1]; 
  
  var marker = new google.maps.Marker({
    position: new google.maps.LatLng(jsonObj.lat,jsonObj.long),
    map: map,
    icon: "http://whiterockconservancy.org/icons/portrait.png" 
  });
  
  var contentString = "<div style=\"max-width:250px; word-wrap:break-word;\" id=\"mapImgCaption\">"+jsonObj.description+"</div><img width=250px src=\""+jsonObj.imageSrc+"\">";
  
  var infowindow = new google.maps.InfoWindow({
      content: contentString
  });  
   google.maps.event.addListener(marker, 'click', function() {
    infowindow.open(map,marker);
  });
  google.maps.event.addListener(marker, 'mouseover', function(){
    infowindow.open(map,marker)
  });
  google.maps.event.addListener(marker, 'mouseout', function(){
    infowindow.close(map,marker)
  });
}
function toggleLayer(i){
if(layers[i].getMap()==null) {
     layers[i].setMap(map);
  }
  else {
     layers[i].setMap(null);
  }
}
function showLatLng(location){
  window.alert(location);
}

google.maps.event.addDomListener(window, 'load',initMap);
var iconBase = 'http://www.whiterockconservancy.org/icons/';
var trails = {
  					trail_mtb: {
            name: 'Mountain Bike Trail<br>16 miles',
            icon: iconBase + 'color_bar_mtb.png',
    				color: "#db4436"
          },
    				trail_horse: {
            name: 'Equestrian Trail<br>6 miles',
            icon: iconBase + 'color_bar_horse.png',
            color: "#e69800"
          },
    				trail_doubletrack: {
            name: 'Double track Multi-use Trail<br>12 miles',
            icon: iconBase + 'color_bar_doubletrack.png',
            color: "#007800"
          },
    				trail_town: {
            name: 'Town Loop Trail<br>9.77 miles',
            icon: iconBase + 'color_bar_town.png',
            color: "#7c3592"
          },
    				trail_riverside: {
            name: 'Carrol County Riverside Trail<br>2.7 Miles',
            icon: iconBase + 'color_bar_riverside.png',
            color: "#f4eb37"
          }
};

var icons = {
          info: {
            name: 'Trail Head',
            icon: iconBase + 'question.png'
          },
  				portrait: {
  					name: 'Images',
  					icon: iconBase + 'portrait.png'
					},
          boat: {
            name: 'Boat',
            icon: iconBase + 'boat.png'
          },
          swim: {
            name: 'Swimming',
            icon: iconBase + 'swim.png'
          },
          fish: {
            name: 'Fishing',
            icon: iconBase + 'fish.png'
          },
          house: {
            name : 'Lodging',
            icon: iconBase + 'house.png'
          },
          tent: {
            name: 'Camping',
            icon: iconBase + 'tent.png'
          },
          toilet: {
            name: 'Bathrooms',
            icon: iconBase + 'toilet.png'
          }
        };

 var legend = document.getElementById('legend');

for (var key in trails){
  var type = trails[key];
  var name = type.name;
  var icon = type.icon;
  var c = type.color;
  console.log(type);
  var div = document.createElement('div');
  div.style.backgroundColor = c;  
  div.style.textAlign = "center";
  div.style.padding = "3px";
  div.innerHTML = name;
	legend.appendChild(div);
}
//legend.appendChile(document.createElement('hr'));
        for (var key in icons) {
          var type = icons[key];
          var name = type.name;
          var icon = type.icon;
          var div = document.createElement('div');
          div.innerHTML = '<img src="' + icon + '"> ' + name;
          legend.appendChild(div);
        }




