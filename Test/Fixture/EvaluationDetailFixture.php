<?php
/**
 * EvaluationDetailFixture
 *
 */
class EvaluationDetailFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
		'staff_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'unique'),
		'evaluation_questionnaire_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'score' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 5, 'unsigned' => false),
		'active' => array('type' => 'boolean', 'null' => false, 'default' => '1'),
		'created' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'updated' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'pk_role_users' => array('column' => 'staff_id', 'unique' => 1)
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
			'staff_id' => 1,
			'evaluation_questionnaire_id' => 1,
			'score' => 1,
			'active' => 1,
			'created' => '2015-10-27 10:49:37',
			'updated' => '2015-10-27 10:49:37'
		),
	);

}
