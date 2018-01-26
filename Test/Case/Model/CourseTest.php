<?php
App::uses('Course', 'RailCompetency.Model');

/**
 * Course Test Case
 *
 */
class CourseTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'plugin.rail_competency.course',
		'plugin.rail_competency.training_provider',
		'plugin.rail_competency.module',
		'plugin.rail_competency.service',
		'plugin.rail_competency.course_material',
		'plugin.rail_competency.course_requisite',
		'plugin.rail_competency.evaluation',
		'plugin.rail_competency.event_trainer',
		'plugin.rail_competency.event',
		'plugin.rail_competency.staff_training_profile',
		'plugin.rail_competency.trainer_migrate',
		'plugin.rail_competency.trainer'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Course = ClassRegistry::init('RailCompetency.Course');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Course);

		parent::tearDown();
	}

}
