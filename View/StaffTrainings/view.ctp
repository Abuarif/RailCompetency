<div class="staffTrainings view">
<h2><?php echo __('Staff Training'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($staffTraining['StaffTraining']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Staff'); ?></dt>
		<dd>
			<?php echo $this->Html->link($staffTraining['Staff']['name'], array('controller' => 'staffs', 'action' => 'view', $staffTraining['Staff']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Event'); ?></dt>
		<dd>
			<?php echo $this->Html->link($staffTraining['Event']['title'], array('controller' => 'events', 'action' => 'view', $staffTraining['Event']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Course'); ?></dt>
		<dd>
			<?php echo $this->Html->link($staffTraining['Course']['name'], array('controller' => 'courses', 'action' => 'view', $staffTraining['Course']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($staffTraining['StaffTraining']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Updated'); ?></dt>
		<dd>
			<?php echo h($staffTraining['StaffTraining']['updated']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Staff Training'), array('action' => 'edit', $staffTraining['StaffTraining']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Staff Training'), array('action' => 'delete', $staffTraining['StaffTraining']['id']), array(), __('Are you sure you want to delete # %s?', $staffTraining['StaffTraining']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Staff Trainings'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Staff Training'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Staffs'), array('controller' => 'staffs', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Staff'), array('controller' => 'staffs', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Events'), array('controller' => 'events', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Event'), array('controller' => 'events', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Courses'), array('controller' => 'courses', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Course'), array('controller' => 'courses', 'action' => 'add')); ?> </li>
	</ul>
</div>
