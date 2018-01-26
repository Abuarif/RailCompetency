<?php
App::uses('CourseRequisite', 'RailCompetency.Model');

/**
 * CourseRequisite Test Case
 *
 */
class CourseRequisiteTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'plugin.rail_competency.course_requisite',
		'plugin.rail_competency.course',
		'plugin.rail_competency.prerequisite'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->CourseRequisite = ClassRegistry::init('RailCompetency.CourseRequisite');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->CourseRequisite);

		parent::tearDown();
	}

}
