<?php
App::uses('CourseMaterialType', 'RailCompetency.Model');

/**
 * CourseMaterialType Test Case
 *
 */
class CourseMaterialTypeTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'plugin.rail_competency.course_material_type',
		'plugin.rail_competency.course_material'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->CourseMaterialType = ClassRegistry::init('RailCompetency.CourseMaterialType');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->CourseMaterialType);

		parent::tearDown();
	}

}
