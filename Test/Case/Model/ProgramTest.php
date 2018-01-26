<?php
App::uses('Program', 'RailCompetency.Model');

/**
 * Program Test Case
 *
 */
class ProgramTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'plugin.rail_competency.program',
		'plugin.rail_competency.program_course'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Program = ClassRegistry::init('RailCompetency.Program');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Program);

		parent::tearDown();
	}

}
