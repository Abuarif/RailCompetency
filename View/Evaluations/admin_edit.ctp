<?php
$this->viewVars['title_for_layout'] = __d('rail_competency', 'Evaluations');
$this->extend('/Common/admin_edit');

$this->Html
	->addCrumb('', '/admin', array('icon' => 'home'))
	->addCrumb(__d('rail_competency', 'Evaluations'), array('action' => 'index'));

if ($this->action == 'admin_edit') {
	$this->Html->addCrumb($this->request->data['Evaluation']['id'], '/' . $this->request->url);
	$this->viewVars['title_for_layout'] = __d('rail_competency', 'Evaluations') . ': ' . $this->request->data['Evaluation']['id'];
} else {
	$this->Html->addCrumb(__d('croogo', 'Add'), '/' . $this->request->url);
}

$this->append('form-start', $this->Form->create('Evaluation'));

$this->append('tab-heading');
	echo $this->Croogo->adminTab(__d('rail_competency', 'Evaluation'), '#evaluation');
	echo $this->Croogo->adminTabs();
$this->end();

$this->append('tab-content');

	echo $this->Html->tabStart('evaluation');

		echo $this->Form->input('id');

		echo $this->Form->input('evaluation_type_id', array(
			'label' =>  __d('rail_competency', 'Evaluation Type'),
		));
		echo $this->Form->input('staff_id', array(
			'label' =>  __d('rail_competency', 'Staff'),
		));
		echo $this->Form->input('course_id', array(
			'label' =>  __d('rail_competency', 'Course'),
		));
		echo $this->Form->input('event_id', array(
			'label' =>  __d('rail_competency', 'Event'),
		));
		echo $this->Form->input('total_score', array(
			'label' =>  __d('rail_competency', 'Total Score'),
		));
		echo $this->Form->input('grade_id', array(
			'label' =>  __d('rail_competency', 'Grade'),
		));
		echo $this->Form->input('notes', array(
			'label' =>  __d('rail_competency', 'Notes'),
		));
		echo $this->Form->input('evaluated_by', array(
			'label' =>  __d('rail_competency', 'Evaluated By'),
		));

	echo $this->Html->tabEnd();

	echo $this->Croogo->adminTabs();

$this->end();

$this->append('panels');
	echo $this->Html->beginBox(__d('croogo', 'Publishing')) .
		$this->Form->button(__d('croogo', 'Apply'), array('name' => 'apply')) .
		$this->Form->button(__d('croogo', 'Save'), array('button' => 'primary')) .
		$this->Form->button(__d('croogo', 'Save & New'), array('button' => 'success', 'name' => 'save_and_new')) .
		$this->Html->link(__d('croogo', 'Cancel'), array('action' => 'index'), array('button' => 'danger'));
	echo $this->Html->endBox();

	echo $this->Croogo->adminBoxes();
$this->end();

$this->append('form-end', $this->Form->end());
