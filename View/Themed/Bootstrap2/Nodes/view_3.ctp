<!-- Change layout to app layout , on colum layout -->
<?php $this->layout = 'connect'; ?>

<!-- Add Css files -->
<?php echo $this->Html->css(array( 
	'http://cdn.leafletjs.com/leaflet-0.7.3/leaflet.css',
	'https://api.tiles.mapbox.com/mapbox.js/plugins/leaflet-markercluster/v0.4.0/MarkerCluster.css',
	'https://api.tiles.mapbox.com/mapbox.js/plugins/leaflet-markercluster/v0.4.0/MarkerCluster.Default.css',
	'connect.css'
)); ?>

<!-- Add js files requered for map -->
<?php $this->Html->script(array( 
		//Map js
		'http://cdn.leafletjs.com/leaflet-0.7.3/leaflet.js',
		'https://api.tiles.mapbox.com/mapbox.js/plugins/leaflet-markercluster/v0.4.0/leaflet.markercluster.js',
		
		//template javascript library		
		'handlebars-v1.3.0.js',
		
		//app js 
		'connect' 
), false) ?>

<!-- Map div -->
<div id='map_canvas'></div>