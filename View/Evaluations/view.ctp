<div class="evaluations view">
<h2><?php echo __('Evaluation'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($evaluation['Evaluation']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Evaluation Type'); ?></dt>
		<dd>
			<?php echo $this->Html->link($evaluation['EvaluationType']['name'], array('controller' => 'evaluation_types', 'action' => 'view', $evaluation['EvaluationType']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Staff'); ?></dt>
		<dd>
			<?php echo $this->Html->link($evaluation['Staff']['name'], array('controller' => 'staffs', 'action' => 'view', $evaluation['Staff']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Course'); ?></dt>
		<dd>
			<?php echo $this->Html->link($evaluation['Course']['name'], array('controller' => 'courses', 'action' => 'view', $evaluation['Course']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Event'); ?></dt>
		<dd>
			<?php echo $this->Html->link($evaluation['Event']['title'], array('controller' => 'events', 'action' => 'view', $evaluation['Event']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Total Score'); ?></dt>
		<dd>
			<?php echo h($evaluation['Evaluation']['total_score']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Grade'); ?></dt>
		<dd>
			<?php echo $this->Html->link($evaluation['Grade']['name'], array('controller' => 'grades', 'action' => 'view', $evaluation['Grade']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Notes'); ?></dt>
		<dd>
			<?php echo h($evaluation['Evaluation']['notes']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Evaluated By'); ?></dt>
		<dd>
			<?php echo h($evaluation['Evaluation']['evaluated_by']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($evaluation['Evaluation']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Updated'); ?></dt>
		<dd>
			<?php echo h($evaluation['Evaluation']['updated']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Evaluation'), array('action' => 'edit', $evaluation['Evaluation']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Evaluation'), array('action' => 'delete', $evaluation['Evaluation']['id']), array(), __('Are you sure you want to delete # %s?', $evaluation['Evaluation']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Evaluations'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Evaluation'), array('action' => 'add')); ?> </li>
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
