<?php

$this->extend('/Common/admin_view');
$this->viewVars['title_for_layout'] = sprintf('%s: %s', __d('croogo', 'Enrollments'), h($enrollment['Enrollment']['id']));

$this->Html
	->addCrumb('', '/admin', array('icon' => 'home'))
	->addCrumb(__d('croogo', 'Enrollments'), array('action' => 'index'));

if (isset($enrollment['Enrollment']['id'])):
	$this->Html->addCrumb($enrollment['Enrollment']['id'], '/' . $this->request->url);
endif;

$this->set('title', __d('croogo', 'Enrollment'));

$this->append('actions');
	echo $this->Croogo->adminAction(__d('croogo', 'Edit Enrollment'), array(
		'action' => 'edit',
		$enrollment['Enrollment']['id'],
	), array(
		'button' => 'default',
	));
	echo $this->Croogo->adminAction(__d('croogo', 'Delete Enrollment'), array(
		'action' => 'delete', $enrollment['Enrollment']['id'],
	), array(
		'method' => 'post',
		'button' => 'danger',
		'escapeTitle' => true,
		'escape' => false,
	),
	__d('croogo', 'Are you sure you want to delete # %s?', $enrollment['Enrollment']['id'])
	);
	echo $this->Croogo->adminAction(__d('croogo', 'List Enrollments'), array('action' => 'index'));
	echo $this->Croogo->adminAction(__d('croogo', 'New Enrollment'), array('action' => 'add'), array('button' => 'success'));
	echo $this->Croogo->adminAction(__d('croogo', 'List Staffs'), array('controller' => 'staffs', 'action' => 'index'));
	echo $this->Croogo->adminAction(__d('croogo', 'New Staff'), array('controller' => 'staffs', 'action' => 'add'));
	echo $this->Croogo->adminAction(__d('croogo', 'List Events'), array('controller' => 'events', 'action' => 'index'));
	echo $this->Croogo->adminAction(__d('croogo', 'New Event'), array('controller' => 'events', 'action' => 'add'));
$this->end();

$this->append('main');
?>
<div class="enrollments view">
	<dl class="inline">
		<dt><?php echo __d('croogo', 'Id'); ?></dt>
		<dd>
			<?php echo h($enrollment['Enrollment']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Staff'); ?></dt>
		<dd>
			<?php echo $this->Html->link($enrollment['Staff']['title'], array('controller' => 'staffs', 'action' => 'view', $enrollment['Staff']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Event'); ?></dt>
		<dd>
			<?php echo $this->Html->link($enrollment['Event']['title'], array('controller' => 'events', 'action' => 'view', $enrollment['Event']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Active'); ?></dt>
		<dd>
			<?php echo $this->Html->status($enrollment['Enrollment']['active']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Created'); ?></dt>
		<dd>
			<?php echo h($enrollment['Enrollment']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Modified'); ?></dt>
		<dd>
			<?php echo h($enrollment['Enrollment']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<?php $this->end(); ?>