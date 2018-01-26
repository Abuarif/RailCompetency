<?php
App::uses('TrainerMigrate', 'RailCompetency.Model');

/**
 * TrainerMigrate Test Case
 *
 */
class TrainerMigrateTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'plugin.rail_competency.trainer_migrate',
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
		$this->TrainerMigrate = ClassRegistry::init('RailCompetency.TrainerMigrate');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->TrainerMigrate);

		parent::tearDown();
	}

}
