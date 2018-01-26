<?php
/**
 * AroFixture
 *
 */
class AroFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'unsigned' => false, 'key' => 'primary'),
		'parent_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 10, 'unsigned' => false),
		'model' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'foreign_key' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 10, 'unsigned' => false),
		'alias' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'lft' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 10, 'unsigned' => false),
		'rght' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 10, 'unsigned' => false),
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
			'parent_id' => 1,
			'model' => 'Lorem ipsum dolor sit amet',
			'foreign_key' => 1,
			'alias' => 'Lorem ipsum dolor sit amet',
			'lft' => 1,
			'rght' => 1
		),
		array(
			'id' => 2,
			'parent_id' => 2,
			'model' => 'Lorem ipsum dolor sit amet',
			'foreign_key' => 2,
			'alias' => 'Lorem ipsum dolor sit amet',
			'lft' => 2,
			'rght' => 2
		),
		array(
			'id' => 3,
			'parent_id' => 3,
			'model' => 'Lorem ipsum dolor sit amet',
			'foreign_key' => 3,
			'alias' => 'Lorem ipsum dolor sit amet',
			'lft' => 3,
			'rght' => 3
		),
		array(
			'id' => 4,
			'parent_id' => 4,
			'model' => 'Lorem ipsum dolor sit amet',
			'foreign_key' => 4,
			'alias' => 'Lorem ipsum dolor sit amet',
			'lft' => 4,
			'rght' => 4
		),
		array(
			'id' => 5,
			'parent_id' => 5,
			'model' => 'Lorem ipsum dolor sit amet',
			'foreign_key' => 5,
			'alias' => 'Lorem ipsum dolor sit amet',
			'lft' => 5,
			'rght' => 5
		),
		array(
			'id' => 6,
			'parent_id' => 6,
			'model' => 'Lorem ipsum dolor sit amet',
			'foreign_key' => 6,
			'alias' => 'Lorem ipsum dolor sit amet',
			'lft' => 6,
			'rght' => 6
		),
		array(
			'id' => 7,
			'parent_id' => 7,
			'model' => 'Lorem ipsum dolor sit amet',
			'foreign_key' => 7,
			'alias' => 'Lorem ipsum dolor sit amet',
			'lft' => 7,
			'rght' => 7
		),
		array(
			'id' => 8,
			'parent_id' => 8,
			'model' => 'Lorem ipsum dolor sit amet',
			'foreign_key' => 8,
			'alias' => 'Lorem ipsum dolor sit amet',
			'lft' => 8,
			'rght' => 8
		),
		array(
			'id' => 9,
			'parent_id' => 9,
			'model' => 'Lorem ipsum dolor sit amet',
			'foreign_key' => 9,
			'alias' => 'Lorem ipsum dolor sit amet',
			'lft' => 9,
			'rght' => 9
		),
		array(
			'id' => 10,
			'parent_id' => 10,
			'model' => 'Lorem ipsum dolor sit amet',
			'foreign_key' => 10,
			'alias' => 'Lorem ipsum dolor sit amet',
			'lft' => 10,
			'rght' => 10
		),
	);

}
