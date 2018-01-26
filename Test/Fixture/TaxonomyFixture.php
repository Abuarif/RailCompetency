<?php
/**
 * TaxonomyFixture
 *
 */
class TaxonomyFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 20, 'unsigned' => false, 'key' => 'primary'),
		'parent_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 20, 'unsigned' => false),
		'term_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'unsigned' => false),
		'vocabulary_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'unsigned' => false),
		'lft' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
		'rght' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
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
			'term_id' => 1,
			'vocabulary_id' => 1,
			'lft' => 1,
			'rght' => 1
		),
		array(
			'id' => 2,
			'parent_id' => 2,
			'term_id' => 2,
			'vocabulary_id' => 2,
			'lft' => 2,
			'rght' => 2
		),
		array(
			'id' => 3,
			'parent_id' => 3,
			'term_id' => 3,
			'vocabulary_id' => 3,
			'lft' => 3,
			'rght' => 3
		),
		array(
			'id' => 4,
			'parent_id' => 4,
			'term_id' => 4,
			'vocabulary_id' => 4,
			'lft' => 4,
			'rght' => 4
		),
		array(
			'id' => 5,
			'parent_id' => 5,
			'term_id' => 5,
			'vocabulary_id' => 5,
			'lft' => 5,
			'rght' => 5
		),
		array(
			'id' => 6,
			'parent_id' => 6,
			'term_id' => 6,
			'vocabulary_id' => 6,
			'lft' => 6,
			'rght' => 6
		),
		array(
			'id' => 7,
			'parent_id' => 7,
			'term_id' => 7,
			'vocabulary_id' => 7,
			'lft' => 7,
			'rght' => 7
		),
		array(
			'id' => 8,
			'parent_id' => 8,
			'term_id' => 8,
			'vocabulary_id' => 8,
			'lft' => 8,
			'rght' => 8
		),
		array(
			'id' => 9,
			'parent_id' => 9,
			'term_id' => 9,
			'vocabulary_id' => 9,
			'lft' => 9,
			'rght' => 9
		),
		array(
			'id' => 10,
			'parent_id' => 10,
			'term_id' => 10,
			'vocabulary_id' => 10,
			'lft' => 10,
			'rght' => 10
		),
	);

}
