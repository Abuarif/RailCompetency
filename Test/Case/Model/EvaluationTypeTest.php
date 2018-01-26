<?php
App::uses('EvaluationType', 'RailCompetency.Model');

/**
 * EvaluationType Test Case
 *
 */
class EvaluationTypeTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'plugin.rail_competency.evaluation_type',
		'plugin.rail_competency.evaluation'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->EvaluationType = ClassRegistry::init('RailCompetency.EvaluationType');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->EvaluationType);

		parent::tearDown();
	}

}
