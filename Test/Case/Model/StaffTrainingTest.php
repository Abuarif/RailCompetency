<?php
App::uses('StaffTraining', 'RailCompetency.Model');

/**
 * StaffTraining Test Case
 *
 */
class StaffTrainingTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'plugin.rail_competency.staff_training',
		'plugin.rail_competency.staff',
		'plugin.rail_competency.event',
		'plugin.rail_competency.course'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->StaffTraining = ClassRegistry::init('RailCompetency.StaffTraining');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->StaffTraining);

		parent::tearDown();
	}

}
