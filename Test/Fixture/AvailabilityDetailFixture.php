<?php
/**
 * AvailabilityDetailFixture
 *
 */
class AvailabilityDetailFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
		'availability_report_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'name' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'order' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
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
			'availability_report_id' => 1,
			'name' => 'Lorem ipsum dolor sit amet',
			'order' => 1,
			'active' => 1,
			'created' => '2015-09-29',
			'modified' => '2015-09-29'
		),
		array(
			'id' => 2,
			'availability_report_id' => 2,
			'name' => 'Lorem ipsum dolor sit amet',
			'order' => 2,
			'active' => 1,
			'created' => '2015-09-29',
			'modified' => '2015-09-29'
		),
		array(
			'id' => 3,
			'availability_report_id' => 3,
			'name' => 'Lorem ipsum dolor sit amet',
			'order' => 3,
			'active' => 1,
			'created' => '2015-09-29',
			'modified' => '2015-09-29'
		),
		array(
			'id' => 4,
			'availability_report_id' => 4,
			'name' => 'Lorem ipsum dolor sit amet',
			'order' => 4,
			'active' => 1,
			'created' => '2015-09-29',
			'modified' => '2015-09-29'
		),
		array(
			'id' => 5,
			'availability_report_id' => 5,
			'name' => 'Lorem ipsum dolor sit amet',
			'order' => 5,
			'active' => 1,
			'created' => '2015-09-29',
			'modified' => '2015-09-29'
		),
		array(
			'id' => 6,
			'availability_report_id' => 6,
			'name' => 'Lorem ipsum dolor sit amet',
			'order' => 6,
			'active' => 1,
			'created' => '2015-09-29',
			'modified' => '2015-09-29'
		),
		array(
			'id' => 7,
			'availability_report_id' => 7,
			'name' => 'Lorem ipsum dolor sit amet',
			'order' => 7,
			'active' => 1,
			'created' => '2015-09-29',
			'modified' => '2015-09-29'
		),
		array(
			'id' => 8,
			'availability_report_id' => 8,
			'name' => 'Lorem ipsum dolor sit amet',
			'order' => 8,
			'active' => 1,
			'created' => '2015-09-29',
			'modified' => '2015-09-29'
		),
		array(
			'id' => 9,
			'availability_report_id' => 9,
			'name' => 'Lorem ipsum dolor sit amet',
			'order' => 9,
			'active' => 1,
			'created' => '2015-09-29',
			'modified' => '2015-09-29'
		),
		array(
			'id' => 10,
			'availability_report_id' => 10,
			'name' => 'Lorem ipsum dolor sit amet',
			'order' => 10,
			'active' => 1,
			'created' => '2015-09-29',
			'modified' => '2015-09-29'
		),
	);

}
