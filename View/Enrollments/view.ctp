<div class="enrollments view">
<h2><?php echo __('Enrollment'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($enrollment['Enrollment']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Staff'); ?></dt>
		<dd>
			<?php echo $this->Html->link($enrollment['Staff']['title'], array('controller' => 'staffs', 'action' => 'view', $enrollment['Staff']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Event'); ?></dt>
		<dd>
			<?php echo $this->Html->link($enrollment['Event']['title'], array('controller' => 'events', 'action' => 'view', $enrollment['Event']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Active'); ?></dt>
		<dd>
			<?php echo h($enrollment['Enrollment']['active']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($enrollment['Enrollment']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($enrollment['Enrollment']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Enrollment'), array('action' => 'edit', $enrollment['Enrollment']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Enrollment'), array('action' => 'delete', $enrollment['Enrollment']['id']), array(), __('Are you sure you want to delete # %s?', $enrollment['Enrollment']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Enrollments'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Enrollment'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Staffs'), array('controller' => 'staffs', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Staff'), array('controller' => 'staffs', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Events'), array('controller' => 'events', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Event'), array('controller' => 'events', 'action' => 'add')); ?> </li>
	</ul>
</div>
