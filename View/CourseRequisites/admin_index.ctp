<?php
$this->viewVars['title_for_layout'] = __d('rail_competency', 'Course Requisites');
$this->extend('/Common/admin_index');

$this->Html
	->addCrumb('', '/admin', array('icon' => 'home'))
	->addCrumb(__d('rail_competency', 'Course Requisites'), array('action' => 'index'));

$this->set('tableClass', 'table table-striped');

$this->append('table-heading');
	$tableHeaders = $this->Html->tableHeaders(array(
		$this->Paginator->sort('id'),
		$this->Paginator->sort('course_id'),
		'Prerequisite',
		$this->Paginator->sort('active'),
		// $this->Paginator->sort('created'),
		// $this->Paginator->sort('modified'),
		array(__d('croogo', 'Actions') => array('class' => 'actions')),
	));
	echo $this->Html->tag('thead', $tableHeaders);
$this->end();

$this->append('table-body');
	$rows = array();
	foreach ($courseRequisites as $courseRequisite):
		$row = array();
		$row[] = h($courseRequisite['CourseRequisite']['id']);
		$row[] = $this->Html->link($courseRequisite['Course']['code'].': '.$courseRequisite['Course']['name'], array(
			'controller' => 'courses',
		'action' => 'view',
			$courseRequisite['Course']['id'],
	));
		$row[] = $this->Html->link($courseRequisite['ParentCourseRequisite']['code'].': '.$courseRequisite['ParentCourseRequisite']['name'], array(
			'controller' => 'course_requisites',
		'action' => 'view',
			$courseRequisite['ParentCourseRequisite']['id'],
	));
		$row[] = $this->Html->status($courseRequisite['CourseRequisite']['active']);
		// $row[] = h($courseRequisite['CourseRequisite']['created']);
		// $row[] = h($courseRequisite['CourseRequisite']['modified']);
		$actions = array($this->Croogo->adminRowActions($courseRequisite['CourseRequisite']['id']));
		$actions[] = $this->Croogo->adminRowAction('', array(
			'action' => 'view', $courseRequisite['CourseRequisite']['id']
	), array(
			'icon' => 'eye-open',
		));
		$actions[] = $this->Croogo->adminRowAction('', array(
			'action' => 'edit',
			$courseRequisite['CourseRequisite']['id'],
		), array(
			'icon' => 'pencil',
		));
		$actions[] = $this->Croogo->adminRowAction('', array(
			'action' => 'delete',
			$courseRequisite['CourseRequisite']['id'],
		), array(
			'icon' => 'trash',
			'escape' => true,
		),
		__d('croogo', 'Are you sure you want to delete # %s?', $courseRequisite['CourseRequisite']['id'])
		);
		$row[] = $this->Html->div('item-actions', implode(' ', $actions));
		$rows[] = $this->Html->tableCells($row);
	endforeach;
	echo $this->Html->tag('tbody', implode('', $rows));
$this->end();
