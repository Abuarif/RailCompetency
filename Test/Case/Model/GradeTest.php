<?php
App::uses('Grade', 'RailCompetency.Model');

/**
 * Grade Test Case
 *
 */
class GradeTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'plugin.rail_competency.grade',
		'plugin.rail_competency.evaluation'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Grade = ClassRegistry::init('RailCompetency.Grade');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Grade);

		parent::tearDown();
	}

}
