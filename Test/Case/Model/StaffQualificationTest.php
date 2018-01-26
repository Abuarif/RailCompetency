<?php
App::uses('StaffQualification', 'RailCompetency.Model');

/**
 * StaffQualification Test Case
 *
 */
class StaffQualificationTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'plugin.rail_competency.staff_qualification',
		'plugin.rail_competency.staff'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->StaffQualification = ClassRegistry::init('RailCompetency.StaffQualification');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->StaffQualification);

		parent::tearDown();
	}

}
