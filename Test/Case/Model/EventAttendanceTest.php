<?php
App::uses('EventAttendance', 'RailCompetency.Model');

/**
 * EventAttendance Test Case
 *
 */
class EventAttendanceTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'plugin.rail_competency.event_attendance',
		'plugin.rail_competency.event',
		'plugin.rail_competency.staff'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->EventAttendance = ClassRegistry::init('RailCompetency.EventAttendance');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->EventAttendance);

		parent::tearDown();
	}

}
