<?php
App::uses('StaffAssignment', 'RailCompetency.Model');

/**
 * StaffAssignment Test Case
 *
 */
class StaffAssignmentTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'plugin.rail_competency.staff_assignment',
		'plugin.rail_competency.staff',
		'plugin.rail_competency.service'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->StaffAssignment = ClassRegistry::init('RailCompetency.StaffAssignment');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->StaffAssignment);

		parent::tearDown();
	}

}
