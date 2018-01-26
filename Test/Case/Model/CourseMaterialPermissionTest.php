<?php
App::uses('CourseMaterialPermission', 'RailCompetency.Model');

/**
 * CourseMaterialPermission Test Case
 *
 */
class CourseMaterialPermissionTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'plugin.rail_competency.course_material_permission',
		'plugin.rail_competency.course_material'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->CourseMaterialPermission = ClassRegistry::init('RailCompetency.CourseMaterialPermission');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->CourseMaterialPermission);

		parent::tearDown();
	}

}
