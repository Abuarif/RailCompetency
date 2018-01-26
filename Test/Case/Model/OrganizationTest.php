<?php
App::uses('Organization', 'RailCompetency.Model');

/**
 * Organization Test Case
 *
 */
class OrganizationTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'plugin.rail_competency.organization',
		'plugin.rail_competency.staff',
		'plugin.rail_competency.staffs-bak',
		'plugin.rail_competency.staffs-orig',
		'plugin.rail_competency.user'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Organization = ClassRegistry::init('RailCompetency.Organization');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Organization);

		parent::tearDown();
	}

}
