<?php
App::uses('Event', 'RailCompetency.Model');

/**
 * Event Test Case
 *
 */
class EventTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'plugin.rail_competency.event',
		'plugin.rail_competency.course',
		'plugin.rail_competency.event_type',
		'plugin.rail_competency.evaluation',
		'plugin.rail_competency.event_attendance',
		'plugin.rail_competency.event_memo',
		'plugin.rail_competency.event_trainer'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Event = ClassRegistry::init('RailCompetency.Event');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Event);

		parent::tearDown();
	}

}
