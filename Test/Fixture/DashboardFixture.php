<?php
/**
 * DashboardFixture
 *
 */
class DashboardFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 20, 'unsigned' => false, 'key' => 'primary'),
		'alias' => array('type' => 'string', 'null' => false, 'length' => 50, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'user_id' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 20, 'unsigned' => false),
		'column' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 20, 'unsigned' => false),
		'weight' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 20, 'unsigned' => false),
		'collapsed' => array('type' => 'boolean', 'null' => false, 'default' => '0'),
		'status' => array('type' => 'boolean', 'null' => false, 'default' => '1'),
		'updated' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'created' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1)
		),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_unicode_ci', 'engine' => 'InnoDB')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'id' => 1,
			'alias' => 'Lorem ipsum dolor sit amet',
			'user_id' => 1,
			'column' => 1,
			'weight' => 1,
			'collapsed' => 1,
			'status' => 1,
			'updated' => '2015-09-29 10:58:21',
			'created' => '2015-09-29 10:58:21'
		),
		array(
			'id' => 2,
			'alias' => 'Lorem ipsum dolor sit amet',
			'user_id' => 2,
			'column' => 2,
			'weight' => 2,
			'collapsed' => 1,
			'status' => 1,
			'updated' => '2015-09-29 10:58:21',
			'created' => '2015-09-29 10:58:21'
		),
		array(
			'id' => 3,
			'alias' => 'Lorem ipsum dolor sit amet',
			'user_id' => 3,
			'column' => 3,
			'weight' => 3,
			'collapsed' => 1,
			'status' => 1,
			'updated' => '2015-09-29 10:58:21',
			'created' => '2015-09-29 10:58:21'
		),
		array(
			'id' => 4,
			'alias' => 'Lorem ipsum dolor sit amet',
			'user_id' => 4,
			'column' => 4,
			'weight' => 4,
			'collapsed' => 1,
			'status' => 1,
			'updated' => '2015-09-29 10:58:21',
			'created' => '2015-09-29 10:58:21'
		),
		array(
			'id' => 5,
			'alias' => 'Lorem ipsum dolor sit amet',
			'user_id' => 5,
			'column' => 5,
			'weight' => 5,
			'collapsed' => 1,
			'status' => 1,
			'updated' => '2015-09-29 10:58:21',
			'created' => '2015-09-29 10:58:21'
		),
		array(
			'id' => 6,
			'alias' => 'Lorem ipsum dolor sit amet',
			'user_id' => 6,
			'column' => 6,
			'weight' => 6,
			'collapsed' => 1,
			'status' => 1,
			'updated' => '2015-09-29 10:58:21',
			'created' => '2015-09-29 10:58:21'
		),
		array(
			'id' => 7,
			'alias' => 'Lorem ipsum dolor sit amet',
			'user_id' => 7,
			'column' => 7,
			'weight' => 7,
			'collapsed' => 1,
			'status' => 1,
			'updated' => '2015-09-29 10:58:21',
			'created' => '2015-09-29 10:58:21'
		),
		array(
			'id' => 8,
			'alias' => 'Lorem ipsum dolor sit amet',
			'user_id' => 8,
			'column' => 8,
			'weight' => 8,
			'collapsed' => 1,
			'status' => 1,
			'updated' => '2015-09-29 10:58:21',
			'created' => '2015-09-29 10:58:21'
		),
		array(
			'id' => 9,
			'alias' => 'Lorem ipsum dolor sit amet',
			'user_id' => 9,
			'column' => 9,
			'weight' => 9,
			'collapsed' => 1,
			'status' => 1,
			'updated' => '2015-09-29 10:58:21',
			'created' => '2015-09-29 10:58:21'
		),
		array(
			'id' => 10,
			'alias' => 'Lorem ipsum dolor sit amet',
			'user_id' => 10,
			'column' => 10,
			'weight' => 10,
			'collapsed' => 1,
			'status' => 1,
			'updated' => '2015-09-29 10:58:21',
			'created' => '2015-09-29 10:58:21'
		),
	);

}
