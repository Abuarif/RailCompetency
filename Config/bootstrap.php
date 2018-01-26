<?php 

/**
 * Admin menu (navigation)
 */
CroogoNav::add('sidebar', 'rcms', array(
	'icon' => array('columns', 'large'),
	'title' => __d('croogo', 'Rail Competency'),
	'url' => '<?php echo $this->webroot."admin/rail_competency/dashboards"; ?>',
	'weight' => 1,
	'children' => array(
		'rcms1' => array(
			'title' => 'Catalogs',
			'url' => '#',
			'weight' => 1,
				'children' => array(
				'rcms1a' => array(
					'title' => 'Course Outlines',
					'weight' => 1,
					'url' => array(
						'admin' => true,
						'plugin' => 'rail_competency',
						'controller' => 'courses',
						'action' => 'index',
					),
				),
				'rcms1b' => array(
					'title' => 'Course Calendar',
					'weight' => 2,
					'url' => array(
						'admin' => true,
						'plugin' => 'rail_competency',
						'controller' => 'calendars',
						'action' => 'index',
					),
				),
			),
		),
		'rcms2' => array(
			'title' => 'Menu 2',
			'url' => '#',
			'weight' => 1,
				'children' => array(
				'rcms2a' => array(
					'title' => 'Prerequisites',
					'weight' => 1,
					'url' => array(
						'admin' => true,
						'plugin' => 'rail_competency',
						'controller' => 'course_requisites',
						'action' => 'index',
					),
				),
				'rcms2b' => array(
					'title' => 'Menu 2b',
					'weight' => 2,
					'url' => array(
						'admin' => true,
						'plugin' => 'rail_competency',
						'controller' => 'calendar',
						'action' => 'index',
					),
				),
			),
		),		
	),
));
