<script id="location-view-template" type="text/x-handlebars-template">
	<div class='preview-wrapper'>

		<div class="scrollable-wrapper">

		<div class="scrollable" >

			<img src= "http://graph.facebook.com/{{id}}/picture?type=large" width="300" height="150" />
			<h4>Jasmin cafer</h4>
			<p>asdkajsd asdkasjd asdkjaskdj sakdja sdkj</p>
			<hr>
			<h5>Comments</h5>
			<div class="comments-list row" >
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
			</div>		
		</div>

		</div>

	<div>

	<?php echo $this->Form->create( 'LocationsComment', array( 'type' => 'post'  ,'id' => 'comment-box','url' => array( 'plugin' => 'Connect', 'controller' => 'LocationsComments', 'action' => 'save' ) ) ); ?>
	
	<?php echo $this->Form->hidden( 'facebook_location_id'); ?>
	<?php echo $this->Form->hidden( 'facebook_user_id'); ?>
	<?php echo $this->Form->hidden( 'name' ); ?>

	<?php echo $this->Form->unlockField('facebook_location_id'); ?>
	<?php echo $this->Form->unlockField('facebook_user_id'); ?>
	<?php echo $this->Form->unlockField('name'); ?>

	<?php echo $this->Form->input( 'body' , array( 'row' => 2,'type' => 'textarea' ,'label' => false, 'placehold' => 'Write' )); ?>	
	<?php echo $this->Form->button( '<i class="icon-save"></i>  Save' ,array( 'escape' => false, 'class' => 'btn btn-primary pull-right' )); ?>	
	<?php echo $this->Form->end(); ?>
</div>
</script>