<?php
App::uses('EventAttendanceDetail', 'RailCompetency.Model');

/**
 * EventAttendanceDetail Test Case
 *
 */
class EventAttendanceDetailTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'plugin.rail_competency.event_attendance_detail',
		'plugin.rail_competency.event',
		'plugin.rail_competency.event_attendance',
		'plugin.rail_competency.staff'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->EventAttendanceDetail = ClassRegistry::init('RailCompetency.EventAttendanceDetail');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->EventAttendanceDetail);

		parent::tearDown();
	}

}
