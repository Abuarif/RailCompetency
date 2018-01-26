<?php
App::uses('MailingListDetail', 'RailCompetency.Model');

/**
 * MailingListDetail Test Case
 *
 */
class MailingListDetailTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'plugin.rail_competency.mailing_list_detail',
		'plugin.rail_competency.mailing_list',
		'plugin.rail_competency.staff'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->MailingListDetail = ClassRegistry::init('RailCompetency.MailingListDetail');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->MailingListDetail);

		parent::tearDown();
	}

}
