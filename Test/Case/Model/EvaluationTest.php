<?php
App::uses('Evaluation', 'RailCompetency.Model');

/**
 * Evaluation Test Case
 *
 */
class EvaluationTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'plugin.rail_competency.evaluation',
		'plugin.rail_competency.evaluation_type',
		'plugin.rail_competency.staff',
		'plugin.rail_competency.course',
		'plugin.rail_competency.event',
		'plugin.rail_competency.grade'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Evaluation = ClassRegistry::init('RailCompetency.Evaluation');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Evaluation);

		parent::tearDown();
	}

}
