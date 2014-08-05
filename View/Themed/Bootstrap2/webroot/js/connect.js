var map = null;
var markers = null;

var lat = 31.900;
var lon = 35.200;
var distance  = 1000;

var appid = 1448359755430086;


$(document).ready(function() {
  
  $.ajaxSetup({ cache: true });

  //initalize map in ramallah center
  map = L.map('map_canvas').setView([31.900, 35.200], 13);
  
  //initalize empty map cluster
  markers = new L.MarkerClusterGroup();

  //add map box tiles ( layer ) to map
  L.tileLayer('http://{s}.tiles.mapbox.com/v3/progamer2014.j5bpo53l/{z}/{x}/{y}.png', {
  	attribution: 'Map data &copy; <a href="http://openstreetmap.org">OpenStreetMap</a> contributors, <a href="http://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="http://mapbox.com">Mapbox</a>',
  	maxZoom: 15
  }).addTo(map);


  //load facebook SDK
  $.getScript('//connect.facebook.net/en_UK/all/debug.js', function(){

  	FB.init({
  		appId   : appid, //facebook app id , 
  		xfbml   : true,
  		version : 'v2.0'
  	});     

  	
  	FB.getLoginStatus(function(response) {
	  
	  if (response.status === 'connected') {
	  	findPlaces( lat, lon, distance );
	  }
	  else {
	    FB.login(function(){
  			findPlaces( lat, lon, distance );
  		});
	  }
	});

  	
  	// map.on('click', function( event ){
  	// 	findPlaces( event.latlng.lat, event.latlng.lng, 50000 );
  	// });

  });
});

function findPlaces( lat, lon, distance ){


	var template = Handlebars.compile( $("#popup-template").html() );


	FB.api( "/search?q=*&type=place&center="+lat+","+lon+"&distance="+distance,function(resp){
		
		$.each(resp.data, function(index, place) {
			console.log( place );
			var marker = L.marker([ place.location.latitude , place.location.longitude]);
			marker.bindPopup( template( place )).openPopup();
			markers.addLayer(marker);
		});

		map.addLayer(markers);

	});

}
