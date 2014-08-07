<?php
App::uses('LocationsComment', 'Connect.Model');

/**
 * LocationsComment Test Case
 *
 */
class LocationsCommentTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'plugin.connect.locations_comment',
		'plugin.connect.facebook_location',
		'plugin.connect.facebook_user'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->LocationsComment = ClassRegistry::init('Connect.LocationsComment');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->LocationsComment);

		parent::tearDown();
	}

}
