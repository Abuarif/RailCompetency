<?php
App::uses('User', 'RailCompetency.Model');

/**
 * User Test Case
 *
 */
class UserTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'plugin.rail_competency.user',
		'plugin.rail_competency.role',
		'plugin.rail_competency.roles_user',
		'plugin.rail_competency.organization',
		'plugin.rail_competency.availability_report',
		'plugin.rail_competency.comment',
		'plugin.rail_competency.node',
		'plugin.rail_competency.meta',
		'plugin.rail_competency.taxonomy',
		'plugin.rail_competency.term',
		'plugin.rail_competency.vocabulary',
		'plugin.rail_competency.type',
		'plugin.rail_competency.types_vocabulary',
		'plugin.rail_competency.model_taxonomy',
		'plugin.rail_competency.course_material',
		'plugin.rail_competency.dashboard',
		'plugin.rail_competency.staff',
		'plugin.rail_competency.staffs-bak',
		'plugin.rail_competency.staffs-orig',
		'plugin.rail_competency.train_availability',
		'plugin.rail_competency.train_checklist_acknowledgement',
		'plugin.rail_competency.train_checklist_sap',
		'plugin.rail_competency.train_checklist_severity',
		'plugin.rail_competency.train_checklist',
		'plugin.rail_competency.train_stabling_dashboard',
		'plugin.rail_competency.train_stabling_exit_signal',
		'plugin.rail_competency.train_stabling_track',
		'plugin.rail_competency.train_stabling_vehicle'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->User = ClassRegistry::init('RailCompetency.User');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->User);

		parent::tearDown();
	}

}
