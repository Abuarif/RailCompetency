<?php
App::uses('MailingList', 'RailCompetency.Model');

/**
 * MailingList Test Case
 *
 */
class MailingListTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'plugin.rail_competency.mailing_list',
		'plugin.rail_competency.mailing_list_detail'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->MailingList = ClassRegistry::init('RailCompetency.MailingList');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->MailingList);

		parent::tearDown();
	}

}
