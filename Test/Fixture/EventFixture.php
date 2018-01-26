<?php
/**
 * EventFixture
 *
 */
class EventFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
		'course_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'event_type_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'pax' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'details' => array('type' => 'text', 'null' => false, 'default' => null, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'start_date' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'end_date' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'last_enrollment' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'all_day' => array('type' => 'boolean', 'null' => false, 'default' => '1'),
		'status' => array('type' => 'string', 'null' => false, 'default' => 'Scheduled', 'length' => 20, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'active' => array('type' => 'boolean', 'null' => false, 'default' => '1'),
		'created' => array('type' => 'date', 'null' => true, 'default' => null),
		'modified' => array('type' => 'date', 'null' => true, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1)
		),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_unicode_ci', 'engine' => 'MyISAM')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'id' => 1,
			'course_id' => 1,
			'event_type_id' => 1,
			'pax' => 1,
			'details' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'start_date' => '2015-10-27 10:49:51',
			'end_date' => '2015-10-27 10:49:51',
			'last_enrollment' => '2015-10-27 10:49:51',
			'all_day' => 1,
			'status' => 'Lorem ipsum dolor ',
			'active' => 1,
			'created' => '2015-10-27',
			'modified' => '2015-10-27'
		),
	);

}
