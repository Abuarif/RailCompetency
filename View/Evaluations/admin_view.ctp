<?php

$this->extend('/Common/admin_view');
$this->viewVars['title_for_layout'] = sprintf('%s: %s', __d('croogo', 'Evaluations'), h($evaluation['Evaluation']['id']));

$this->Html
	->addCrumb('', '/admin', array('icon' => 'home'))
	->addCrumb(__d('croogo', 'Evaluations'), array('action' => 'index'));

if (isset($evaluation['Evaluation']['id'])):
	$this->Html->addCrumb($evaluation['Evaluation']['id'], '/' . $this->request->url);
endif;

$this->set('title', __d('croogo', 'Evaluation'));

$this->append('actions');
	echo $this->Croogo->adminAction(__d('croogo', 'Edit Evaluation'), array(
		'action' => 'edit',
		$evaluation['Evaluation']['id'],
	), array(
		'button' => 'default',
	));
	echo $this->Croogo->adminAction(__d('croogo', 'Delete Evaluation'), array(
		'action' => 'delete', $evaluation['Evaluation']['id'],
	), array(
		'method' => 'post',
		'button' => 'danger',
		'escapeTitle' => true,
		'escape' => false,
	),
	__d('croogo', 'Are you sure you want to delete # %s?', $evaluation['Evaluation']['id'])
	);
	echo $this->Croogo->adminAction(__d('croogo', 'List Evaluations'), array('action' => 'index'));
	echo $this->Croogo->adminAction(__d('croogo', 'New Evaluation'), array('action' => 'add'), array('button' => 'success'));
	echo $this->Croogo->adminAction(__d('croogo', 'List Evaluation Types'), array('controller' => 'evaluation_types', 'action' => 'index'));
	echo $this->Croogo->adminAction(__d('croogo', 'New Evaluation Type'), array('controller' => 'evaluation_types', 'action' => 'add'));
	echo $this->Croogo->adminAction(__d('croogo', 'List Staffs'), array('controller' => 'staffs', 'action' => 'index'));
	echo $this->Croogo->adminAction(__d('croogo', 'New Staff'), array('controller' => 'staffs', 'action' => 'add'));
	echo $this->Croogo->adminAction(__d('croogo', 'List Courses'), array('controller' => 'courses', 'action' => 'index'));
	echo $this->Croogo->adminAction(__d('croogo', 'New Course'), array('controller' => 'courses', 'action' => 'add'));
	echo $this->Croogo->adminAction(__d('croogo', 'List Events'), array('controller' => 'events', 'action' => 'index'));
	echo $this->Croogo->adminAction(__d('croogo', 'New Event'), array('controller' => 'events', 'action' => 'add'));
	echo $this->Croogo->adminAction(__d('croogo', 'List Grades'), array('controller' => 'grades', 'action' => 'index'));
	echo $this->Croogo->adminAction(__d('croogo', 'New Grade'), array('controller' => 'grades', 'action' => 'add'));
$this->end();

$this->append('main');
?>
<div class="evaluations view">
	<dl class="inline">
		<dt><?php echo __d('croogo', 'Id'); ?></dt>
		<dd>
			<?php echo h($evaluation['Evaluation']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Evaluation Type'); ?></dt>
		<dd>
			<?php echo $this->Html->link($evaluation['EvaluationType']['name'], array('controller' => 'evaluation_types', 'action' => 'view', $evaluation['EvaluationType']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Staff'); ?></dt>
		<dd>
			<?php echo $this->Html->link($evaluation['Staff']['name'], array('controller' => 'staffs', 'action' => 'view', $evaluation['Staff']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Course'); ?></dt>
		<dd>
			<?php echo $this->Html->link($evaluation['Course']['name'], array('controller' => 'courses', 'action' => 'view', $evaluation['Course']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Event'); ?></dt>
		<dd>
			<?php echo $this->Html->link($evaluation['Event']['title'], array('controller' => 'events', 'action' => 'view', $evaluation['Event']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Total Score'); ?></dt>
		<dd>
			<?php echo h($evaluation['Evaluation']['total_score']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Grade'); ?></dt>
		<dd>
			<?php echo $this->Html->link($evaluation['Grade']['name'], array('controller' => 'grades', 'action' => 'view', $evaluation['Grade']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Notes'); ?></dt>
		<dd>
			<?php echo h($evaluation['Evaluation']['notes']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Evaluated By'); ?></dt>
		<dd>
			<?php echo h($evaluation['Evaluation']['evaluated_by']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Created'); ?></dt>
		<dd>
			<?php echo $this->Time->format($evaluation['Evaluation']['created'], '%Y-%m-%d %H:%M:%S', __d('croogo', 'Invalid datetime')); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Updated'); ?></dt>
		<dd>
			<?php echo $this->Time->format($evaluation['Evaluation']['updated'], '%Y-%m-%d %H:%M:%S', __d('croogo', 'Invalid datetime')); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<?php $this->end(); ?>