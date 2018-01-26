<?php
App::uses('Module', 'RailCompetency.Model');

/**
 * Module Test Case
 *
 */
class ModuleTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'plugin.rail_competency.module',
		'plugin.rail_competency.course'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Module = ClassRegistry::init('RailCompetency.Module');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Module);

		parent::tearDown();
	}

}
