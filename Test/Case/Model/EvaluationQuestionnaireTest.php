<?php
App::uses('EvaluationQuestionnaire', 'RailCompetency.Model');

/**
 * EvaluationQuestionnaire Test Case
 *
 */
class EvaluationQuestionnaireTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'plugin.rail_competency.evaluation_questionnaire',
		'plugin.rail_competency.evaluation_detail'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->EvaluationQuestionnaire = ClassRegistry::init('RailCompetency.EvaluationQuestionnaire');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->EvaluationQuestionnaire);

		parent::tearDown();
	}

}
