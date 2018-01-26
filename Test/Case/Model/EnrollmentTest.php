<?php
App::uses('Enrollment', 'RailCompetency.Model');

/**
 * Enrollment Test Case
 *
 */
class EnrollmentTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'plugin.rail_competency.enrollment',
		'plugin.rail_competency.staff',
		'plugin.rail_competency.event'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Enrollment = ClassRegistry::init('RailCompetency.Enrollment');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Enrollment);

		parent::tearDown();
	}

}
