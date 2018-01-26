<?php
$this->viewVars['title_for_layout'] = __d('rail_competency', 'Evaluations');
$this->extend('/Common/admin_index');

$this->Html
	->addCrumb('', '/admin', array('icon' => 'home'))
	->addCrumb(__d('rail_competency', 'Evaluations'), array('action' => 'index'));

$this->set('tableClass', 'table table-striped');

$this->append('table-heading');
	$tableHeaders = $this->Html->tableHeaders(array(
		$this->Paginator->sort('id'),
		$this->Paginator->sort('evaluation_type_id'),
		$this->Paginator->sort('staff_id'),
		$this->Paginator->sort('course_id'),
		$this->Paginator->sort('event_id'),
		$this->Paginator->sort('total_score'),
		$this->Paginator->sort('grade_id'),
		$this->Paginator->sort('notes'),
		$this->Paginator->sort('evaluated_by'),
		$this->Paginator->sort('created'),
		$this->Paginator->sort('updated'),
		array(__d('croogo', 'Actions') => array('class' => 'actions')),
	));
	echo $this->Html->tag('thead', $tableHeaders);
$this->end();

$this->append('table-body');
	$rows = array();
	foreach ($evaluations as $evaluation):
		$row = array();
		$row[] = h($evaluation['Evaluation']['id']);
		$row[] = $this->Html->link($evaluation['EvaluationType']['name'], array(
			'controller' => 'evaluation_types',
		'action' => 'view',
			$evaluation['EvaluationType']['id'],
	));
		$row[] = $this->Html->link($evaluation['Staff']['name'], array(
			'controller' => 'staffs',
		'action' => 'view',
			$evaluation['Staff']['id'],
	));
		$row[] = $this->Html->link($evaluation['Course']['name'], array(
			'controller' => 'courses',
		'action' => 'view',
			$evaluation['Course']['id'],
	));
		$row[] = $this->Html->link($evaluation['Event']['title'], array(
			'controller' => 'events',
		'action' => 'view',
			$evaluation['Event']['id'],
	));
		$row[] = h($evaluation['Evaluation']['total_score']);
		$row[] = $this->Html->link($evaluation['Grade']['name'], array(
			'controller' => 'grades',
		'action' => 'view',
			$evaluation['Grade']['id'],
	));
		$row[] = h($evaluation['Evaluation']['notes']);
		$row[] = h($evaluation['Evaluation']['evaluated_by']);
		$row[] = $this->Time->format($evaluation['Evaluation']['created'], '%Y-%m-%d %H:%M', __d('croogo', 'Invalid datetime'));
		$row[] = $this->Time->format($evaluation['Evaluation']['updated'], '%Y-%m-%d %H:%M', __d('croogo', 'Invalid datetime'));
		$actions = array($this->Croogo->adminRowActions($evaluation['Evaluation']['id']));
		$actions[] = $this->Croogo->adminRowAction('', array(
			'action' => 'view', $evaluation['Evaluation']['id']
	), array(
			'icon' => 'eye-open',
		));
		$actions[] = $this->Croogo->adminRowAction('', array(
			'action' => 'edit',
			$evaluation['Evaluation']['id'],
		), array(
			'icon' => 'pencil',
		));
		$actions[] = $this->Croogo->adminRowAction('', array(
			'action' => 'delete',
			$evaluation['Evaluation']['id'],
		), array(
			'icon' => 'trash',
			'escape' => true,
		),
		__d('croogo', 'Are you sure you want to delete # %s?', $evaluation['Evaluation']['id'])
		);
		$row[] = $this->Html->div('item-actions', implode(' ', $actions));
		$rows[] = $this->Html->tableCells($row);
	endforeach;
	echo $this->Html->tag('tbody', implode('', $rows));
$this->end();
