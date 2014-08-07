<?php 

	CroogoRouter::connect('/comments/new', array(
		'plugin' => 'Connect', 'controller' => 'LocationsComments', 'action' => 'save',
		));

	CroogoRouter::connect('/comments/*', array(
		'plugin' => 'Connect', 'controller' => 'LocationsComments', 'action' => 'index',
		));
