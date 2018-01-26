<?php
App::uses('EventMemo', 'RailCompetency.Model');

/**
 * EventMemo Test Case
 *
 */
class EventMemoTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'plugin.rail_competency.event_memo',
		'plugin.rail_competency.event'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->EventMemo = ClassRegistry::init('RailCompetency.EventMemo');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->EventMemo);

		parent::tearDown();
	}

}
