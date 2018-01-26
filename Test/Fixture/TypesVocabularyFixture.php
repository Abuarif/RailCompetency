<?php
/**
 * TypesVocabularyFixture
 *
 */
class TypesVocabularyFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'unsigned' => false, 'key' => 'primary'),
		'type_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'unsigned' => false),
		'vocabulary_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'unsigned' => false),
		'weight' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
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
			'type_id' => 1,
			'vocabulary_id' => 1,
			'weight' => 1
		),
		array(
			'id' => 2,
			'type_id' => 2,
			'vocabulary_id' => 2,
			'weight' => 2
		),
		array(
			'id' => 3,
			'type_id' => 3,
			'vocabulary_id' => 3,
			'weight' => 3
		),
		array(
			'id' => 4,
			'type_id' => 4,
			'vocabulary_id' => 4,
			'weight' => 4
		),
		array(
			'id' => 5,
			'type_id' => 5,
			'vocabulary_id' => 5,
			'weight' => 5
		),
		array(
			'id' => 6,
			'type_id' => 6,
			'vocabulary_id' => 6,
			'weight' => 6
		),
		array(
			'id' => 7,
			'type_id' => 7,
			'vocabulary_id' => 7,
			'weight' => 7
		),
		array(
			'id' => 8,
			'type_id' => 8,
			'vocabulary_id' => 8,
			'weight' => 8
		),
		array(
			'id' => 9,
			'type_id' => 9,
			'vocabulary_id' => 9,
			'weight' => 9
		),
		array(
			'id' => 10,
			'type_id' => 10,
			'vocabulary_id' => 10,
			'weight' => 10
		),
	);

}
