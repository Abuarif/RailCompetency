<?php
App::uses('StaffTrainingProfile', 'RailCompetency.Model');

/**
 * StaffTrainingProfile Test Case
 *
 */
class StaffTrainingProfileTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'plugin.rail_competency.staff_training_profile',
		'plugin.rail_competency.staff',
		'plugin.rail_competency.course'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->StaffTrainingProfile = ClassRegistry::init('RailCompetency.StaffTrainingProfile');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->StaffTrainingProfile);

		parent::tearDown();
	}

}
