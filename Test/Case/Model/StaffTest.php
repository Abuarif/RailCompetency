<?php
App::uses('Staff', 'RailCompetency.Model');

/**
 * Staff Test Case
 *
 */
class StaffTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'plugin.rail_competency.staff',
		'plugin.rail_competency.organization',
		'plugin.rail_competency.user',
		'plugin.rail_competency.position',
		'plugin.rail_competency.availability_form',
		'plugin.rail_competency.evaluation_detail',
		'plugin.rail_competency.evaluation',
		'plugin.rail_competency.event_attendance',
		'plugin.rail_competency.event_trainer',
		'plugin.rail_competency.staff_assignment',
		'plugin.rail_competency.staff_qualification',
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
		$this->Staff = ClassRegistry::init('RailCompetency.Staff');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Staff);

		parent::tearDown();
	}

}
