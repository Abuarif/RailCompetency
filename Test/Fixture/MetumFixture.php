<?php
/**
 * MetumFixture
 *
 */
class MetumFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 20, 'unsigned' => false, 'key' => 'primary'),
		'model' => array('type' => 'string', 'null' => false, 'default' => 'Node', 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'foreign_key' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 20, 'unsigned' => false),
		'key' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'value' => array('type' => 'text', 'null' => true, 'default' => null, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'weight' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
		'created' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'created_by' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 20, 'unsigned' => false),
		'updated' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'updated_by' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 20, 'unsigned' => false),
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
			'key' => 'Lorem ipsum dolor sit amet',
			'value' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'weight' => 1,
			'created' => '2015-09-29 10:58:26',
			'created_by' => 1,
			'updated' => '2015-09-29 10:58:26',
			'updated_by' => 1
		),
		array(
			'id' => 2,
			'model' => 'Lorem ipsum dolor sit amet',
			'foreign_key' => 2,
			'key' => 'Lorem ipsum dolor sit amet',
			'value' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'weight' => 2,
			'created' => '2015-09-29 10:58:26',
			'created_by' => 2,
			'updated' => '2015-09-29 10:58:26',
			'updated_by' => 2
		),
		array(
			'id' => 3,
			'model' => 'Lorem ipsum dolor sit amet',
			'foreign_key' => 3,
			'key' => 'Lorem ipsum dolor sit amet',
			'value' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'weight' => 3,
			'created' => '2015-09-29 10:58:26',
			'created_by' => 3,
			'updated' => '2015-09-29 10:58:26',
			'updated_by' => 3
		),
		array(
			'id' => 4,
			'model' => 'Lorem ipsum dolor sit amet',
			'foreign_key' => 4,
			'key' => 'Lorem ipsum dolor sit amet',
			'value' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'weight' => 4,
			'created' => '2015-09-29 10:58:26',
			'created_by' => 4,
			'updated' => '2015-09-29 10:58:26',
			'updated_by' => 4
		),
		array(
			'id' => 5,
			'model' => 'Lorem ipsum dolor sit amet',
			'foreign_key' => 5,
			'key' => 'Lorem ipsum dolor sit amet',
			'value' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'weight' => 5,
			'created' => '2015-09-29 10:58:26',
			'created_by' => 5,
			'updated' => '2015-09-29 10:58:26',
			'updated_by' => 5
		),
		array(
			'id' => 6,
			'model' => 'Lorem ipsum dolor sit amet',
			'foreign_key' => 6,
			'key' => 'Lorem ipsum dolor sit amet',
			'value' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'weight' => 6,
			'created' => '2015-09-29 10:58:26',
			'created_by' => 6,
			'updated' => '2015-09-29 10:58:26',
			'updated_by' => 6
		),
		array(
			'id' => 7,
			'model' => 'Lorem ipsum dolor sit amet',
			'foreign_key' => 7,
			'key' => 'Lorem ipsum dolor sit amet',
			'value' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'weight' => 7,
			'created' => '2015-09-29 10:58:26',
			'created_by' => 7,
			'updated' => '2015-09-29 10:58:26',
			'updated_by' => 7
		),
		array(
			'id' => 8,
			'model' => 'Lorem ipsum dolor sit amet',
			'foreign_key' => 8,
			'key' => 'Lorem ipsum dolor sit amet',
			'value' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'weight' => 8,
			'created' => '2015-09-29 10:58:26',
			'created_by' => 8,
			'updated' => '2015-09-29 10:58:26',
			'updated_by' => 8
		),
		array(
			'id' => 9,
			'model' => 'Lorem ipsum dolor sit amet',
			'foreign_key' => 9,
			'key' => 'Lorem ipsum dolor sit amet',
			'value' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'weight' => 9,
			'created' => '2015-09-29 10:58:26',
			'created_by' => 9,
			'updated' => '2015-09-29 10:58:26',
			'updated_by' => 9
		),
		array(
			'id' => 10,
			'model' => 'Lorem ipsum dolor sit amet',
			'foreign_key' => 10,
			'key' => 'Lorem ipsum dolor sit amet',
			'value' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'weight' => 10,
			'created' => '2015-09-29 10:58:26',
			'created_by' => 10,
			'updated' => '2015-09-29 10:58:26',
			'updated_by' => 10
		),
	);

}
