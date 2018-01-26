<?php
App::uses('EvaluationDetail', 'RailCompetency.Model');

/**
 * EvaluationDetail Test Case
 *
 */
class EvaluationDetailTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'plugin.rail_competency.evaluation_detail',
		'plugin.rail_competency.staff',
		'plugin.rail_competency.evaluation_questionnaire'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->EvaluationDetail = ClassRegistry::init('RailCompetency.EvaluationDetail');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->EvaluationDetail);

		parent::tearDown();
	}

}
