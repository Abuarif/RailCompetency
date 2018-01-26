<?php

$this->extend('/Common/admin_view');
$this->viewVars['title_for_layout'] = sprintf('%s: %s', __d('croogo', 'Course Requisites'), h($courseRequisite['CourseRequisite']['id']));

$this->Html
	->addCrumb('', '/admin', array('icon' => 'home'))
	->addCrumb(__d('croogo', 'Course Requisites'), array('action' => 'index'));

if (isset($courseRequisite['CourseRequisite']['id'])):
	$this->Html->addCrumb($courseRequisite['CourseRequisite']['id'], '/' . $this->request->url);
endif;

$this->set('title', __d('croogo', 'Course Requisite'));

$this->append('actions');
	echo $this->Croogo->adminAction(__d('croogo', 'Edit Course Requisite'), array(
		'action' => 'edit',
		$courseRequisite['CourseRequisite']['id'],
	), array(
		'button' => 'default',
	));
	echo $this->Croogo->adminAction(__d('croogo', 'Delete Course Requisite'), array(
		'action' => 'delete', $courseRequisite['CourseRequisite']['id'],
	), array(
		'method' => 'post',
		'button' => 'danger',
		'escapeTitle' => true,
		'escape' => false,
	),
	__d('croogo', 'Are you sure you want to delete # %s?', $courseRequisite['CourseRequisite']['id'])
	);
	echo $this->Croogo->adminAction(__d('croogo', 'List Course Requisites'), array('action' => 'index'));
	echo $this->Croogo->adminAction(__d('croogo', 'New Course Requisite'), array('action' => 'add'), array('button' => 'success'));
	echo $this->Croogo->adminAction(__d('croogo', 'List Courses'), array('controller' => 'courses', 'action' => 'index'));
	echo $this->Croogo->adminAction(__d('croogo', 'New Course'), array('controller' => 'courses', 'action' => 'add'));
	echo $this->Croogo->adminAction(__d('croogo', 'List Course Requisites'), array('controller' => 'course_requisites', 'action' => 'index'));
	echo $this->Croogo->adminAction(__d('croogo', 'New Parent Course Requisite'), array('controller' => 'course_requisites', 'action' => 'add'));
$this->end();

$this->append('main');
?>
<div class="courseRequisites view">
	<dl class="inline">
		<dt><?php echo __d('croogo', 'Id'); ?></dt>
		<dd>
			<?php echo h($courseRequisite['CourseRequisite']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Course'); ?></dt>
		<dd>
			<?php echo $this->Html->link($courseRequisite['Course']['name'], array('controller' => 'courses', 'action' => 'view', $courseRequisite['Course']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Parent Course Requisite'); ?></dt>
		<dd>
			<?php echo $this->Html->link($courseRequisite['ParentCourseRequisite']['id'], array('controller' => 'course_requisites', 'action' => 'view', $courseRequisite['ParentCourseRequisite']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Active'); ?></dt>
		<dd>
			<?php echo $this->Html->status($courseRequisite['CourseRequisite']['active']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Created'); ?></dt>
		<dd>
			<?php echo h($courseRequisite['CourseRequisite']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Modified'); ?></dt>
		<dd>
			<?php echo h($courseRequisite['CourseRequisite']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<?php $this->end(); ?>