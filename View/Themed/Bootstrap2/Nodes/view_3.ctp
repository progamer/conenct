<!-- Change layout to app layout , on colum layout -->
<?php $this->layout = 'connect'; ?>

<?php echo $this->element('templates/popup-template') ?>	
<?php echo $this->element('templates/location-view') ?>	
<?php echo $this->element('templates/comments-list') ?>	



<!-- Add Css files -->
<?php echo $this->Html->css(array( 
	'http://cdn.leafletjs.com/leaflet-0.7.3/leaflet.css',
	'https://api.tiles.mapbox.com/mapbox.js/plugins/leaflet-markercluster/v0.4.0/MarkerCluster.css',
	'https://api.tiles.mapbox.com/mapbox.js/plugins/leaflet-markercluster/v0.4.0/MarkerCluster.Default.css',
	'connect.css'
)); ?>



<div class="map-wrapper">
	<!-- Map div -->
	<div id='map_canvas' ></div>
	<div id="overlay" class="">
	</div>
</div>

<?php $this->append('scriptBottom'); ?>
<script type="text/javascript">
	var comments_url = "<?php echo Router::url(array( 'plugin' => 'Connect', 'controller' => 'LocationsComments', 'action' => 'index' )); ?>";
</script>
<?php $this->end(); ?>

<!-- Add js files requered for map -->
<?php 
	echo $this->Html->script(array( 
		//Map js
		'http://cdn.leafletjs.com/leaflet-0.7.3/leaflet.js',
		'https://api.tiles.mapbox.com/mapbox.js/plugins/leaflet-markercluster/v0.4.0/leaflet.markercluster.js',
		
		//template javascript library		
		'handlebars-v1.3.0.js',
		
		//app js 
		'connect' 
), array( 'block' => 'scriptBottom' )) ?>