<?php

$this->extend('/Common/admin_view');
$this->viewVars['title_for_layout'] = sprintf('%s: %s', __d('croogo', 'Staffs Trainings'), h($staffsTraining['StaffsTraining']['id']));

$this->Html
	->addCrumb('', '/admin', array('icon' => 'home'))
	->addCrumb(__d('croogo', 'Staffs Trainings'), array('action' => 'index'));

if (isset($staffsTraining['StaffsTraining']['id'])):
	$this->Html->addCrumb($staffsTraining['StaffsTraining']['id'], '/' . $this->request->url);
endif;

$this->set('title', __d('croogo', 'Staffs Training'));

$this->append('actions');
	echo $this->Croogo->adminAction(__d('croogo', 'Edit Staffs Training'), array(
		'action' => 'edit',
		$staffsTraining['StaffsTraining']['id'],
	), array(
		'button' => 'default',
	));
	echo $this->Croogo->adminAction(__d('croogo', 'Delete Staffs Training'), array(
		'action' => 'delete', $staffsTraining['StaffsTraining']['id'],
	), array(
		'method' => 'post',
		'button' => 'danger',
		'escapeTitle' => true,
		'escape' => false,
	),
	__d('croogo', 'Are you sure you want to delete # %s?', $staffsTraining['StaffsTraining']['id'])
	);
	echo $this->Croogo->adminAction(__d('croogo', 'List Staffs Trainings'), array('action' => 'index'));
	echo $this->Croogo->adminAction(__d('croogo', 'New Staffs Training'), array('action' => 'add'), array('button' => 'success'));
	echo $this->Croogo->adminAction(__d('croogo', 'List Staffs'), array('controller' => 'staffs', 'action' => 'index'));
	echo $this->Croogo->adminAction(__d('croogo', 'New Staff'), array('controller' => 'staffs', 'action' => 'add'));
	echo $this->Croogo->adminAction(__d('croogo', 'List Events'), array('controller' => 'events', 'action' => 'index'));
	echo $this->Croogo->adminAction(__d('croogo', 'New Event'), array('controller' => 'events', 'action' => 'add'));
	echo $this->Croogo->adminAction(__d('croogo', 'List Courses'), array('controller' => 'courses', 'action' => 'index'));
	echo $this->Croogo->adminAction(__d('croogo', 'New Course'), array('controller' => 'courses', 'action' => 'add'));
$this->end();

$this->append('main');
?>
<div class="staffsTrainings view">
	<dl class="inline">
		<dt><?php echo __d('croogo', 'Id'); ?></dt>
		<dd>
			<?php echo h($staffsTraining['StaffsTraining']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Staff'); ?></dt>
		<dd>
			<?php echo $this->Html->link($staffsTraining['Staff']['title'], array('controller' => 'staffs', 'action' => 'view', $staffsTraining['Staff']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Event'); ?></dt>
		<dd>
			<?php echo $this->Html->link($staffsTraining['Event']['title'], array('controller' => 'events', 'action' => 'view', $staffsTraining['Event']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Course'); ?></dt>
		<dd>
			<?php echo $this->Html->link($staffsTraining['Course']['name'], array('controller' => 'courses', 'action' => 'view', $staffsTraining['Course']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Created'); ?></dt>
		<dd>
			<?php echo $this->Time->format($staffsTraining['StaffsTraining']['created'], '%Y-%m-%d %H:%M:%S', __d('croogo', 'Invalid datetime')); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Updated'); ?></dt>
		<dd>
			<?php echo $this->Time->format($staffsTraining['StaffsTraining']['updated'], '%Y-%m-%d %H:%M:%S', __d('croogo', 'Invalid datetime')); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<?php $this->end(); ?>