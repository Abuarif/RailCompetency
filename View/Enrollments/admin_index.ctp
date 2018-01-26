<?php
$this->viewVars['title_for_layout'] = __d('rail_competency', 'Enrollments');
$this->extend('/Common/admin_index');

$this->Html
	->addCrumb('', '/admin', array('icon' => 'home'))
	->addCrumb(__d('rail_competency', 'Enrollments'), array('action' => 'index'));

$this->set('tableClass', 'table table-striped');

$this->append('table-heading');
	$tableHeaders = $this->Html->tableHeaders(array(
		$this->Paginator->sort('id'),
		$this->Paginator->sort('staff_id'),
		$this->Paginator->sort('event_id'),
		$this->Paginator->sort('active'),
		$this->Paginator->sort('created'),
		$this->Paginator->sort('modified'),
		array(__d('croogo', 'Actions') => array('class' => 'actions')),
	));
	echo $this->Html->tag('thead', $tableHeaders);
$this->end();

$this->append('table-body');
	$rows = array();
	foreach ($enrollments as $enrollment):
		$row = array();
		$row[] = h($enrollment['Enrollment']['id']);
		$row[] = $this->Html->link($enrollment['Staff']['title'], array(
			'controller' => 'staffs',
		'action' => 'view',
			$enrollment['Staff']['id'],
	));
		$row[] = $this->Html->link($enrollment['Event']['title'], array(
			'controller' => 'events',
		'action' => 'view',
			$enrollment['Event']['id'],
	));
		$row[] = $this->Html->status($enrollment['Enrollment']['active']);
		$row[] = h($enrollment['Enrollment']['created']);
		$row[] = h($enrollment['Enrollment']['modified']);
		$actions = array($this->Croogo->adminRowActions($enrollment['Enrollment']['id']));
		$actions[] = $this->Croogo->adminRowAction('', array(
			'action' => 'view', $enrollment['Enrollment']['id']
	), array(
			'icon' => 'eye-open',
		));
		$actions[] = $this->Croogo->adminRowAction('', array(
			'action' => 'edit',
			$enrollment['Enrollment']['id'],
		), array(
			'icon' => 'pencil',
		));
		$actions[] = $this->Croogo->adminRowAction('', array(
			'action' => 'delete',
			$enrollment['Enrollment']['id'],
		), array(
			'icon' => 'trash',
			'escape' => true,
		),
		__d('croogo', 'Are you sure you want to delete # %s?', $enrollment['Enrollment']['id'])
		);
		$row[] = $this->Html->div('item-actions', implode(' ', $actions));
		$rows[] = $this->Html->tableCells($row);
	endforeach;
	echo $this->Html->tag('tbody', implode('', $rows));
$this->end();
