<?php
App::uses('LocationsComment', 'Model');

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
		'app.locations_comment',
		'app.facebook_location',
		'app.facebook_user'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->LocationsComment = ClassRegistry::init('LocationsComment');
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
