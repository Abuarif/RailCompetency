<?php
/**
 * RolesUserFixture
 *
 */
class RolesUserFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
		'user_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'index'),
		'role_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'granted_by' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'created' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'updated' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'pk_role_users' => array('column' => array('user_id', 'role_id'), 'unique' => 1)
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
			'user_id' => 1,
			'role_id' => 1,
			'granted_by' => 1,
			'created' => '2015-09-29 10:58:28',
			'updated' => '2015-09-29 10:58:28'
		),
		array(
			'id' => 2,
			'user_id' => 2,
			'role_id' => 2,
			'granted_by' => 2,
			'created' => '2015-09-29 10:58:28',
			'updated' => '2015-09-29 10:58:28'
		),
		array(
			'id' => 3,
			'user_id' => 3,
			'role_id' => 3,
			'granted_by' => 3,
			'created' => '2015-09-29 10:58:28',
			'updated' => '2015-09-29 10:58:28'
		),
		array(
			'id' => 4,
			'user_id' => 4,
			'role_id' => 4,
			'granted_by' => 4,
			'created' => '2015-09-29 10:58:28',
			'updated' => '2015-09-29 10:58:28'
		),
		array(
			'id' => 5,
			'user_id' => 5,
			'role_id' => 5,
			'granted_by' => 5,
			'created' => '2015-09-29 10:58:28',
			'updated' => '2015-09-29 10:58:28'
		),
		array(
			'id' => 6,
			'user_id' => 6,
			'role_id' => 6,
			'granted_by' => 6,
			'created' => '2015-09-29 10:58:28',
			'updated' => '2015-09-29 10:58:28'
		),
		array(
			'id' => 7,
			'user_id' => 7,
			'role_id' => 7,
			'granted_by' => 7,
			'created' => '2015-09-29 10:58:28',
			'updated' => '2015-09-29 10:58:28'
		),
		array(
			'id' => 8,
			'user_id' => 8,
			'role_id' => 8,
			'granted_by' => 8,
			'created' => '2015-09-29 10:58:28',
			'updated' => '2015-09-29 10:58:28'
		),
		array(
			'id' => 9,
			'user_id' => 9,
			'role_id' => 9,
			'granted_by' => 9,
			'created' => '2015-09-29 10:58:28',
			'updated' => '2015-09-29 10:58:28'
		),
		array(
			'id' => 10,
			'user_id' => 10,
			'role_id' => 10,
			'granted_by' => 10,
			'created' => '2015-09-29 10:58:28',
			'updated' => '2015-09-29 10:58:28'
		),
	);

}
