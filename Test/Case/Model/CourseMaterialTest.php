<?php
App::uses('CourseMaterial', 'RailCompetency.Model');

/**
 * CourseMaterial Test Case
 *
 */
class CourseMaterialTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'plugin.rail_competency.course_material',
		'plugin.rail_competency.user',
		'plugin.rail_competency.course',
		'plugin.rail_competency.course_material_type',
		'plugin.rail_competency.course_material_permission'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->CourseMaterial = ClassRegistry::init('RailCompetency.CourseMaterial');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->CourseMaterial);

		parent::tearDown();
	}

}
