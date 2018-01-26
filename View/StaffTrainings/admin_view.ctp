<?php

$this->extend('/Common/admin_view');
$this->viewVars['title_for_layout'] = sprintf('%s: %s', __d('croogo', 'Staff Trainings'), h($staffTraining['StaffTraining']['id']));

$this->Html
	->addCrumb('', '/admin', array('icon' => 'home'))
	->addCrumb(__d('croogo', 'Staff Trainings'), array('action' => 'index'));

if (isset($staffTraining['StaffTraining']['id'])):
	$this->Html->addCrumb($staffTraining['StaffTraining']['id'], '/' . $this->request->url);
endif;

$this->set('title', __d('croogo', 'Staff Training'));

$this->append('actions');
	echo $this->Croogo->adminAction(__d('croogo', 'Edit Staff Training'), array(
		'action' => 'edit',
		$staffTraining['StaffTraining']['id'],
	), array(
		'button' => 'default',
	));
	echo $this->Croogo->adminAction(__d('croogo', 'Delete Staff Training'), array(
		'action' => 'delete', $staffTraining['StaffTraining']['id'],
	), array(
		'method' => 'post',
		'button' => 'danger',
		'escapeTitle' => true,
		'escape' => false,
	),
	__d('croogo', 'Are you sure you want to delete # %s?', $staffTraining['StaffTraining']['id'])
	);
	echo $this->Croogo->adminAction(__d('croogo', 'List Staff Trainings'), array('action' => 'index'));
	echo $this->Croogo->adminAction(__d('croogo', 'New Staff Training'), array('action' => 'add'), array('button' => 'success'));
	echo $this->Croogo->adminAction(__d('croogo', 'List Staffs'), array('controller' => 'staffs', 'action' => 'index'));
	echo $this->Croogo->adminAction(__d('croogo', 'New Staff'), array('controller' => 'staffs', 'action' => 'add'));
	echo $this->Croogo->adminAction(__d('croogo', 'List Events'), array('controller' => 'events', 'action' => 'index'));
	echo $this->Croogo->adminAction(__d('croogo', 'New Event'), array('controller' => 'events', 'action' => 'add'));
	echo $this->Croogo->adminAction(__d('croogo', 'List Courses'), array('controller' => 'courses', 'action' => 'index'));
	echo $this->Croogo->adminAction(__d('croogo', 'New Course'), array('controller' => 'courses', 'action' => 'add'));
$this->end();

$this->append('main');
?>
<div class="staffTrainings view">
	<dl class="inline">
		<dt><?php echo __d('croogo', 'Id'); ?></dt>
		<dd>
			<?php echo h($staffTraining['StaffTraining']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Staff'); ?></dt>
		<dd>
			<?php echo $this->Html->link($staffTraining['Staff']['name'], array('controller' => 'staffs', 'action' => 'view', $staffTraining['Staff']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Event'); ?></dt>
		<dd>
			<?php echo $this->Html->link($staffTraining['Event']['title'], array('controller' => 'events', 'action' => 'view', $staffTraining['Event']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Course'); ?></dt>
		<dd>
			<?php echo $this->Html->link($staffTraining['Course']['name'], array('controller' => 'courses', 'action' => 'view', $staffTraining['Course']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Created'); ?></dt>
		<dd>
			<?php echo $this->Time->format($staffTraining['StaffTraining']['created'], '%Y-%m-%d %H:%M:%S', __d('croogo', 'Invalid datetime')); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Updated'); ?></dt>
		<dd>
			<?php echo $this->Time->format($staffTraining['StaffTraining']['updated'], '%Y-%m-%d %H:%M:%S', __d('croogo', 'Invalid datetime')); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<?php $this->end(); ?>