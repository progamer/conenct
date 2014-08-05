<script id="popup-template" type="text/x-handlebars-template">
	<div class="" >
		<div class="thumbnail place-thumb">
			
			<img src="http://graph.facebook.com/{{id}}/picture?type=large" alt="{{name}}">
			
			<h5>{{name}}</h5>
			
			<span class="label label-info">{{category}}</span>	
			
			{{#if location.street}}
				<p>{{location.street}}</p>
			{{/if}}
		</div>
	</div>
</script>