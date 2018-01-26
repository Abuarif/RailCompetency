<?php
App::uses('ProgramCourse', 'RailCompetency.Model');

/**
 * ProgramCourse Test Case
 *
 */
class ProgramCourseTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'plugin.rail_competency.program_course',
		'plugin.rail_competency.program',
		'plugin.rail_competency.course'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->ProgramCourse = ClassRegistry::init('RailCompetency.ProgramCourse');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->ProgramCourse);

		parent::tearDown();
	}

}
