<script id="comments-list-template" type="text/x-handlebars-template">
	  {{#each comments}}
	  
	  <div class="media span3">
			<a class="pull-left" href="#">
				<img class="media-object" src="http://graph.facebook.com/{{this.LocationsComment.facebook_user_id}}/picture?type=small">
			</a>
			<div class="media-body">
				<h4 class="media-heading">{{this.LocationsComment.name}}</h4>
				<p>{{this.LocationsComment.body}}</p>
			</div>
		</div>

	  {{/each}}
</script>