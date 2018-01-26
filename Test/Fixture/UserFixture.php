<?php
/**
 * UserFixture
 *
 */
class UserFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 20, 'unsigned' => false, 'key' => 'primary'),
		'role_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'organization_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'username' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 60, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'password' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 100, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'name' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 50, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'email' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 100, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'website' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 100, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'activation_key' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 60, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'image' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'bio' => array('type' => 'text', 'null' => true, 'default' => null, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'status' => array('type' => 'boolean', 'null' => false, 'default' => '0'),
		'updated' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'updated_by' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 20, 'unsigned' => false),
		'created' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'timezone' => array('type' => 'string', 'null' => false, 'default' => '0', 'length' => 40, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'created_by' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 20, 'unsigned' => false),
		'twitter' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 94, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'facebook' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 94, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'google_plus' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 94, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'linkedin' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 94, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'skills' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 254, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'generally_about' => array('type' => 'text', 'null' => true, 'default' => null, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'my_favourite_tags' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 254, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'kms_writing' => array('type' => 'boolean', 'null' => false, 'default' => '0'),
		'kms_reading' => array('type' => 'boolean', 'null' => false, 'default' => '0'),
		'kms_editing' => array('type' => 'boolean', 'null' => false, 'default' => '0'),
		'kms_traveling' => array('type' => 'boolean', 'null' => false, 'default' => '0'),
		'kms_others' => array('type' => 'boolean', 'null' => false, 'default' => '0'),
		'allow_contact' => array('type' => 'boolean', 'null' => true, 'default' => '0'),
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
			'role_id' => 1,
			'organization_id' => 1,
			'username' => 'Lorem ipsum dolor sit amet',
			'password' => 'Lorem ipsum dolor sit amet',
			'name' => 'Lorem ipsum dolor sit amet',
			'email' => 'Lorem ipsum dolor sit amet',
			'website' => 'Lorem ipsum dolor sit amet',
			'activation_key' => 'Lorem ipsum dolor sit amet',
			'image' => 'Lorem ipsum dolor sit amet',
			'bio' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'status' => 1,
			'updated' => '2015-10-27 10:48:59',
			'updated_by' => 1,
			'created' => '2015-10-27 10:48:59',
			'timezone' => 'Lorem ipsum dolor sit amet',
			'created_by' => 1,
			'twitter' => 'Lorem ipsum dolor sit amet',
			'facebook' => 'Lorem ipsum dolor sit amet',
			'google_plus' => 'Lorem ipsum dolor sit amet',
			'linkedin' => 'Lorem ipsum dolor sit amet',
			'skills' => 'Lorem ipsum dolor sit amet',
			'generally_about' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'my_favourite_tags' => 'Lorem ipsum dolor sit amet',
			'kms_writing' => 1,
			'kms_reading' => 1,
			'kms_editing' => 1,
			'kms_traveling' => 1,
			'kms_others' => 1,
			'allow_contact' => 1
		),
	);

}
