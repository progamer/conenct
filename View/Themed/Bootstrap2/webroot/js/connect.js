var map = null;
var markers = null;

var lat = 31.900;
var lon = 35.200;
var distance  = 1000;

var appid = 1448359755430086;
var user = null;


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

    //based on login sataus , we call findPlaces function or we authnticate him then call findPlaces	
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
  });
});

 //compile handlbars template
var location_view_template= null;
var comments_template = null;
var template = null;

$(function(){
      location_view_template = Handlebars.compile( $("#location-view-template").html() );
      comments_template = Handlebars.compile( $("#comments-list-template").html() );
      template = Handlebars.compile( $("#popup-template").html() );
});
 

function findPlaces( lat, lon, distance ){

  if( user == null ){
      //read user data from fb
      FB.api( "/me",function(resp){
        user = resp;
      });
  }

  //find places 

	FB.api( "/search?q=*&type=place&center="+lat+","+lon+"&distance="+distance,function(resp){
		

    //build markers , add markers to cluter, then add cluster layer to map
		$.each(resp.data, function(index, place) {
			var marker = L.marker([ place.location.latitude , place.location.longitude]);
			marker.bindPopup( template( place )).openPopup();
			markers.addLayer(marker);
		});

		map.addLayer(markers);

	});
}

//handle comment form submition
$(document).on("submit","#comment-box",function( event ){

  event.preventDefault();
  
  $form = $(this);
  if( $form.hasClass('disabled') ){
    return false;
  }

  $form.addClass('disabled'); 
  $data = $form.serializeArray();
  $("button i", $form).attr('class', 'icon-spinner icon-spin');
  $( "input, select, button, textareas", $form ).attr('disabled', 'disabled');
  $( ".help-block" , $form ).text('').removeClass('error').removeClass('error-text');

  $.post( $form.attr('action'), $data, function( resp ){
    if( resp.success ){

      $.get( comments_url +"/" + $( "#LocationsCommentFacebookLocationId" ,$form ).val() , function( resp ){
          var html = comments_template( { 'comments' : resp } );
          $(".comments-list").html( html );  
           var elem = $(".scrollable-wrapper").get(0);
       elem.scrollTop = elem.scrollHeight;

      },'json');

      $form.get(0).reset();
    }
    else{
    }
    $form.removeClass('disabled');
    $( "input, select, button,textarea", $form ).attr('disabled', false);
    $("button i", $form).attr('class', 'icon-save');

  },'json');
});



//hanle view location proccess
$(document).on("click",".view-location-button",function( event ){
    event.preventDefault();
    $btn = $(this);
    $.get( $btn.attr('url'), function( resp ){
      var html = location_view_template( { 'comments' : resp, 'id' : $btn.attr('location-id') } );
      $("#overlay").html( html );  
      $("#LocationsCommentFacebookLocationId").val( $btn.attr('location-id') );
      $("#LocationsCommentFacebookUserId").val( user.id );
      $("#LocationsCommentName").val( user.name );

      var elem = $(".scrollable-wrapper").get(0);
      elem.scrollTop = elem.scrollHeight;

    },'json');
});

