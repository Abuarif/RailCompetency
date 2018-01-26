<?php
App::uses('Venue', 'RailCompetency.Model');

/**
 * Venue Test Case
 *
 */
class VenueTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'plugin.rail_competency.venue',
		'plugin.rail_competency.event'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Venue = ClassRegistry::init('RailCompetency.Venue');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Venue);

		parent::tearDown();
	}

}
