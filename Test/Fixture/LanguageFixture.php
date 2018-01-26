<?php
/**
 * LanguageFixture
 *
 */
class LanguageFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
		'title' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'native' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'alias' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'status' => array('type' => 'boolean', 'null' => false, 'default' => '1'),
		'weight' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
		'updated' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'updated_by' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 20, 'unsigned' => false),
		'created' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'created_by' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 20, 'unsigned' => false),
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
			'title' => 'Lorem ipsum dolor sit amet',
			'native' => 'Lorem ipsum dolor sit amet',
			'alias' => 'Lorem ipsum dolor sit amet',
			'status' => 1,
			'weight' => 1,
			'updated' => '2015-09-29 10:58:25',
			'updated_by' => 1,
			'created' => '2015-09-29 10:58:25',
			'created_by' => 1
		),
		array(
			'id' => 2,
			'title' => 'Lorem ipsum dolor sit amet',
			'native' => 'Lorem ipsum dolor sit amet',
			'alias' => 'Lorem ipsum dolor sit amet',
			'status' => 1,
			'weight' => 2,
			'updated' => '2015-09-29 10:58:25',
			'updated_by' => 2,
			'created' => '2015-09-29 10:58:25',
			'created_by' => 2
		),
		array(
			'id' => 3,
			'title' => 'Lorem ipsum dolor sit amet',
			'native' => 'Lorem ipsum dolor sit amet',
			'alias' => 'Lorem ipsum dolor sit amet',
			'status' => 1,
			'weight' => 3,
			'updated' => '2015-09-29 10:58:25',
			'updated_by' => 3,
			'created' => '2015-09-29 10:58:25',
			'created_by' => 3
		),
		array(
			'id' => 4,
			'title' => 'Lorem ipsum dolor sit amet',
			'native' => 'Lorem ipsum dolor sit amet',
			'alias' => 'Lorem ipsum dolor sit amet',
			'status' => 1,
			'weight' => 4,
			'updated' => '2015-09-29 10:58:25',
			'updated_by' => 4,
			'created' => '2015-09-29 10:58:25',
			'created_by' => 4
		),
		array(
			'id' => 5,
			'title' => 'Lorem ipsum dolor sit amet',
			'native' => 'Lorem ipsum dolor sit amet',
			'alias' => 'Lorem ipsum dolor sit amet',
			'status' => 1,
			'weight' => 5,
			'updated' => '2015-09-29 10:58:25',
			'updated_by' => 5,
			'created' => '2015-09-29 10:58:25',
			'created_by' => 5
		),
		array(
			'id' => 6,
			'title' => 'Lorem ipsum dolor sit amet',
			'native' => 'Lorem ipsum dolor sit amet',
			'alias' => 'Lorem ipsum dolor sit amet',
			'status' => 1,
			'weight' => 6,
			'updated' => '2015-09-29 10:58:25',
			'updated_by' => 6,
			'created' => '2015-09-29 10:58:25',
			'created_by' => 6
		),
		array(
			'id' => 7,
			'title' => 'Lorem ipsum dolor sit amet',
			'native' => 'Lorem ipsum dolor sit amet',
			'alias' => 'Lorem ipsum dolor sit amet',
			'status' => 1,
			'weight' => 7,
			'updated' => '2015-09-29 10:58:25',
			'updated_by' => 7,
			'created' => '2015-09-29 10:58:25',
			'created_by' => 7
		),
		array(
			'id' => 8,
			'title' => 'Lorem ipsum dolor sit amet',
			'native' => 'Lorem ipsum dolor sit amet',
			'alias' => 'Lorem ipsum dolor sit amet',
			'status' => 1,
			'weight' => 8,
			'updated' => '2015-09-29 10:58:25',
			'updated_by' => 8,
			'created' => '2015-09-29 10:58:25',
			'created_by' => 8
		),
		array(
			'id' => 9,
			'title' => 'Lorem ipsum dolor sit amet',
			'native' => 'Lorem ipsum dolor sit amet',
			'alias' => 'Lorem ipsum dolor sit amet',
			'status' => 1,
			'weight' => 9,
			'updated' => '2015-09-29 10:58:25',
			'updated_by' => 9,
			'created' => '2015-09-29 10:58:25',
			'created_by' => 9
		),
		array(
			'id' => 10,
			'title' => 'Lorem ipsum dolor sit amet',
			'native' => 'Lorem ipsum dolor sit amet',
			'alias' => 'Lorem ipsum dolor sit amet',
			'status' => 1,
			'weight' => 10,
			'updated' => '2015-09-29 10:58:25',
			'updated_by' => 10,
			'created' => '2015-09-29 10:58:25',
			'created_by' => 10
		),
	);

}
