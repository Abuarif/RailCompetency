<?php
App::uses('EventClaim', 'RailCompetency.Model');

/**
 * EventClaim Test Case
 *
 */
class EventClaimTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'plugin.rail_competency.event_claim',
		'plugin.rail_competency.event'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->EventClaim = ClassRegistry::init('RailCompetency.EventClaim');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->EventClaim);

		parent::tearDown();
	}

}
