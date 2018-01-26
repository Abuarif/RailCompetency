<?php
App::uses('EventTrainer', 'RailCompetency.Model');

/**
 * EventTrainer Test Case
 *
 */
class EventTrainerTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'plugin.rail_competency.event_trainer',
		'plugin.rail_competency.event',
		'plugin.rail_competency.course',
		'plugin.rail_competency.staff'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->EventTrainer = ClassRegistry::init('RailCompetency.EventTrainer');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->EventTrainer);

		parent::tearDown();
	}

}
