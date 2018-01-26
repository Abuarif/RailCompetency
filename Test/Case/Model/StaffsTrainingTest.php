<?php
App::uses('StaffsTraining', 'RailCompetency.Model');

/**
 * StaffsTraining Test Case
 *
 */
class StaffsTrainingTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'plugin.rail_competency.staffs_training',
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
		$this->StaffsTraining = ClassRegistry::init('RailCompetency.StaffsTraining');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->StaffsTraining);

		parent::tearDown();
	}

}
