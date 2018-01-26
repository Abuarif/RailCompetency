<?php
/**
 * ModelTaxonomyFixture
 *
 */
class ModelTaxonomyFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 20, 'unsigned' => false, 'key' => 'primary'),
		'model' => array('type' => 'string', 'null' => false, 'default' => 'Node', 'length' => 50, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'foreign_key' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 20, 'unsigned' => false),
		'taxonomy_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 20, 'unsigned' => false),
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
			'model' => 'Lorem ipsum dolor sit amet',
			'foreign_key' => 1,
			'taxonomy_id' => 1
		),
		array(
			'id' => 2,
			'model' => 'Lorem ipsum dolor sit amet',
			'foreign_key' => 2,
			'taxonomy_id' => 2
		),
		array(
			'id' => 3,
			'model' => 'Lorem ipsum dolor sit amet',
			'foreign_key' => 3,
			'taxonomy_id' => 3
		),
		array(
			'id' => 4,
			'model' => 'Lorem ipsum dolor sit amet',
			'foreign_key' => 4,
			'taxonomy_id' => 4
		),
		array(
			'id' => 5,
			'model' => 'Lorem ipsum dolor sit amet',
			'foreign_key' => 5,
			'taxonomy_id' => 5
		),
		array(
			'id' => 6,
			'model' => 'Lorem ipsum dolor sit amet',
			'foreign_key' => 6,
			'taxonomy_id' => 6
		),
		array(
			'id' => 7,
			'model' => 'Lorem ipsum dolor sit amet',
			'foreign_key' => 7,
			'taxonomy_id' => 7
		),
		array(
			'id' => 8,
			'model' => 'Lorem ipsum dolor sit amet',
			'foreign_key' => 8,
			'taxonomy_id' => 8
		),
		array(
			'id' => 9,
			'model' => 'Lorem ipsum dolor sit amet',
			'foreign_key' => 9,
			'taxonomy_id' => 9
		),
		array(
			'id' => 10,
			'model' => 'Lorem ipsum dolor sit amet',
			'foreign_key' => 10,
			'taxonomy_id' => 10
		),
	);

}
