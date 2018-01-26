<div class="staffsTrainings view">
<h2><?php echo __('Staffs Training'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($staffsTraining['StaffsTraining']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Staff'); ?></dt>
		<dd>
			<?php echo $this->Html->link($staffsTraining['Staff']['title'], array('controller' => 'staffs', 'action' => 'view', $staffsTraining['Staff']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Event'); ?></dt>
		<dd>
			<?php echo $this->Html->link($staffsTraining['Event']['title'], array('controller' => 'events', 'action' => 'view', $staffsTraining['Event']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Course'); ?></dt>
		<dd>
			<?php echo $this->Html->link($staffsTraining['Course']['name'], array('controller' => 'courses', 'action' => 'view', $staffsTraining['Course']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($staffsTraining['StaffsTraining']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Updated'); ?></dt>
		<dd>
			<?php echo h($staffsTraining['StaffsTraining']['updated']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Staffs Training'), array('action' => 'edit', $staffsTraining['StaffsTraining']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Staffs Training'), array('action' => 'delete', $staffsTraining['StaffsTraining']['id']), array(), __('Are you sure you want to delete # %s?', $staffsTraining['StaffsTraining']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Staffs Trainings'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Staffs Training'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Staffs'), array('controller' => 'staffs', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Staff'), array('controller' => 'staffs', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Events'), array('controller' => 'events', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Event'), array('controller' => 'events', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Courses'), array('controller' => 'courses', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Course'), array('controller' => 'courses', 'action' => 'add')); ?> </li>
	</ul>
</div>
