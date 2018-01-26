<?php
$this->viewVars['title_for_layout'] = __d('rail_competency', 'Course Requisites');
$this->extend('/Common/admin_edit');

$this->Html
	->addCrumb('', '/admin', array('icon' => 'home'))
	->addCrumb(__d('rail_competency', 'Course Requisites'), array('action' => 'index'));

if ($this->action == 'admin_edit') {
	$this->Html->addCrumb($this->request->data['CourseRequisite']['id'], '/' . $this->request->url);
	$this->viewVars['title_for_layout'] = __d('rail_competency', 'Course Requisites') . ': ' . $this->request->data['CourseRequisite']['id'];
} else {
	$this->Html->addCrumb(__d('croogo', 'Add'), '/' . $this->request->url);
}

$this->append('form-start', $this->Form->create('CourseRequisite'));

$this->append('tab-heading');
	echo $this->Croogo->adminTab(__d('rail_competency', 'Course Requisite'), '#course-requisite');
	echo $this->Croogo->adminTabs();
$this->end();

$this->append('tab-content');

	echo $this->Html->tabStart('course-requisite');

		echo $this->Form->input('id');

		echo $this->Form->input('course_id', array(
			'label' =>  __d('rail_competency', 'Course'),
		));
		echo $this->Form->input('parent_id', array(
			'options' => $parentCourseRequisites,
			'empty' => 'Select if applicable',
			'label' =>  __d('rail_competency', 'Prerequisite'),
		));
		echo $this->Form->input('active', array(
			'label' =>  __d('rail_competency', 'Active'),
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
