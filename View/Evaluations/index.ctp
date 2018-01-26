<div class="evaluations index">
	<h2><?php echo __('Evaluations'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('evaluation_type_id'); ?></th>
			<th><?php echo $this->Paginator->sort('staff_id'); ?></th>
			<th><?php echo $this->Paginator->sort('course_id'); ?></th>
			<th><?php echo $this->Paginator->sort('event_id'); ?></th>
			<th><?php echo $this->Paginator->sort('total_score'); ?></th>
			<th><?php echo $this->Paginator->sort('grade_id'); ?></th>
			<th><?php echo $this->Paginator->sort('notes'); ?></th>
			<th><?php echo $this->Paginator->sort('evaluated_by'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('updated'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($evaluations as $evaluation): ?>
	<tr>
		<td><?php echo h($evaluation['Evaluation']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($evaluation['EvaluationType']['name'], array('controller' => 'evaluation_types', 'action' => 'view', $evaluation['EvaluationType']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($evaluation['Staff']['name'], array('controller' => 'staffs', 'action' => 'view', $evaluation['Staff']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($evaluation['Course']['name'], array('controller' => 'courses', 'action' => 'view', $evaluation['Course']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($evaluation['Event']['title'], array('controller' => 'events', 'action' => 'view', $evaluation['Event']['id'])); ?>
		</td>
		<td><?php echo h($evaluation['Evaluation']['total_score']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($evaluation['Grade']['name'], array('controller' => 'grades', 'action' => 'view', $evaluation['Grade']['id'])); ?>
		</td>
		<td><?php echo h($evaluation['Evaluation']['notes']); ?>&nbsp;</td>
		<td><?php echo h($evaluation['Evaluation']['evaluated_by']); ?>&nbsp;</td>
		<td><?php echo h($evaluation['Evaluation']['created']); ?>&nbsp;</td>
		<td><?php echo h($evaluation['Evaluation']['updated']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $evaluation['Evaluation']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $evaluation['Evaluation']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $evaluation['Evaluation']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $evaluation['Evaluation']['id']))); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</tbody>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
		'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Evaluation'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Evaluation Types'), array('controller' => 'evaluation_types', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Evaluation Type'), array('controller' => 'evaluation_types', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Staffs'), array('controller' => 'staffs', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Staff'), array('controller' => 'staffs', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Courses'), array('controller' => 'courses', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Course'), array('controller' => 'courses', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Events'), array('controller' => 'events', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Event'), array('controller' => 'events', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Grades'), array('controller' => 'grades', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Grade'), array('controller' => 'grades', 'action' => 'add')); ?> </li>
	</ul>
</div>
