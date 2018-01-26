<?php
$this->viewVars['title_for_layout'] = __d('rail_competency', 'Staffs Trainings');
$this->extend('/Common/admin_index');

$this->Html
	->addCrumb('', '/admin', array('icon' => 'home'))
	->addCrumb(__d('rail_competency', 'Staffs Trainings'), array('action' => 'index'));

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
	foreach ($staffsTrainings as $staffsTraining):
		$row = array();
		$row[] = h($staffsTraining['StaffsTraining']['id']);
		$row[] = $this->Html->link($staffsTraining['Staff']['title'], array(
			'controller' => 'staffs',
		'action' => 'view',
			$staffsTraining['Staff']['id'],
	));
		$row[] = $this->Html->link($staffsTraining['Event']['title'], array(
			'controller' => 'events',
		'action' => 'view',
			$staffsTraining['Event']['id'],
	));
		$row[] = $this->Html->link($staffsTraining['Course']['name'], array(
			'controller' => 'courses',
		'action' => 'view',
			$staffsTraining['Course']['id'],
	));
		$row[] = $this->Time->format($staffsTraining['StaffsTraining']['created'], '%Y-%m-%d %H:%M', __d('croogo', 'Invalid datetime'));
		$row[] = $this->Time->format($staffsTraining['StaffsTraining']['updated'], '%Y-%m-%d %H:%M', __d('croogo', 'Invalid datetime'));
		$actions = array($this->Croogo->adminRowActions($staffsTraining['StaffsTraining']['id']));
		$actions[] = $this->Croogo->adminRowAction('', array(
			'action' => 'view', $staffsTraining['StaffsTraining']['id']
	), array(
			'icon' => 'eye-open',
		));
		$actions[] = $this->Croogo->adminRowAction('', array(
			'action' => 'edit',
			$staffsTraining['StaffsTraining']['id'],
		), array(
			'icon' => 'pencil',
		));
		$actions[] = $this->Croogo->adminRowAction('', array(
			'action' => 'delete',
			$staffsTraining['StaffsTraining']['id'],
		), array(
			'icon' => 'trash',
			'escape' => true,
		),
		__d('croogo', 'Are you sure you want to delete # %s?', $staffsTraining['StaffsTraining']['id'])
		);
		$row[] = $this->Html->div('item-actions', implode(' ', $actions));
		$rows[] = $this->Html->tableCells($row);
	endforeach;
	echo $this->Html->tag('tbody', implode('', $rows));
$this->end();
