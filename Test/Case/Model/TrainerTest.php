<?php
App::uses('Trainer', 'RailCompetency.Model');

/**
 * Trainer Test Case
 *
 */
class TrainerTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'plugin.rail_competency.trainer',
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
		$this->Trainer = ClassRegistry::init('RailCompetency.Trainer');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Trainer);

		parent::tearDown();
	}

}
