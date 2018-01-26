<?php
App::uses('TrainingProvider', 'RailCompetency.Model');

/**
 * TrainingProvider Test Case
 *
 */
class TrainingProviderTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'plugin.rail_competency.training_provider',
		'plugin.rail_competency.course'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->TrainingProvider = ClassRegistry::init('RailCompetency.TrainingProvider');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->TrainingProvider);

		parent::tearDown();
	}

}
