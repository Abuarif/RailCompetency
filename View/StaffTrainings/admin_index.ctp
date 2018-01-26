<?php
$this->viewVars['title_for_layout'] = __d('rail_competency', 'Staff Trainings');
$this->extend('/Common/admin_index');

$this->Html
	->addCrumb('', '/admin', array('icon' => 'home'))
	->addCrumb(__d('rail_competency', 'Staff Trainings'), array('action' => 'index'));

$this->set('tableClass', 'table table-striped');

$this->append('table-heading');
	$tableHeaders = $this->Html->tableHeaders(array(
		$this->Paginator->sort('id'),
		$this->Paginator->sort('staff_id'),
		$this->Paginator->sort('event_id'),
		$this->Paginator->sort('course_id'),
		$this->Paginator->sort('created'),
		$this->Paginator->sort('updated'),
		array(__d('croogo', 'Actions') => array('class' => 'actions')),
	));
	echo $this->Html->tag('thead', $tableHeaders);
$this->end();

$this->append('table-body');
	$rows = array();
	foreach ($staffTrainings as $staffTraining):
		$row = array();
		$row[] = h($staffTraining['StaffTraining']['id']);
		$row[] = $this->Html->link($staffTraining['Staff']['name'], array(
			'controller' => 'staffs',
		'action' => 'view',
			$staffTraining['Staff']['id'],
	));
		$row[] = $this->Html->link($staffTraining['Event']['title'], array(
			'controller' => 'events',
		'action' => 'view',
			$staffTraining['Event']['id'],
	));
		$row[] = $this->Html->link($staffTraining['Course']['name'], array(
			'controller' => 'courses',
		'action' => 'view',
			$staffTraining['Course']['id'],
	));
		$row[] = $this->Time->format($staffTraining['StaffTraining']['created'], '%Y-%m-%d %H:%M', __d('croogo', 'Invalid datetime'));
		$row[] = $this->Time->format($staffTraining['StaffTraining']['updated'], '%Y-%m-%d %H:%M', __d('croogo', 'Invalid datetime'));
		$actions = array($this->Croogo->adminRowActions($staffTraining['StaffTraining']['id']));
		$actions[] = $this->Croogo->adminRowAction('', array(
			'action' => 'view', $staffTraining['StaffTraining']['id']
	), array(
			'icon' => 'eye-open',
		));
		$actions[] = $this->Croogo->adminRowAction('', array(
			'action' => 'edit',
			$staffTraining['StaffTraining']['id'],
		), array(
			'icon' => 'pencil',
		));
		$actions[] = $this->Croogo->adminRowAction('', array(
			'action' => 'delete',
			$staffTraining['StaffTraining']['id'],
		), array(
			'icon' => 'trash',
			'escape' => true,
		),
		__d('croogo', 'Are you sure you want to delete # %s?', $staffTraining['StaffTraining']['id'])
		);
		$row[] = $this->Html->div('item-actions', implode(' ', $actions));
		$rows[] = $this->Html->tableCells($row);
	endforeach;
	echo $this->Html->tag('tbody', implode('', $rows));
$this->end();
