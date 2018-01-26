<div class="courseRequisites view">
<h2><?php echo __('Course Requisite'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($courseRequisite['CourseRequisite']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Course'); ?></dt>
		<dd>
			<?php echo $this->Html->link($courseRequisite['Course']['name'], array('controller' => 'courses', 'action' => 'view', $courseRequisite['Course']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Parent Course Requisite'); ?></dt>
		<dd>
			<?php echo $this->Html->link($courseRequisite['ParentCourseRequisite']['id'], array('controller' => 'course_requisites', 'action' => 'view', $courseRequisite['ParentCourseRequisite']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Active'); ?></dt>
		<dd>
			<?php echo h($courseRequisite['CourseRequisite']['active']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($courseRequisite['CourseRequisite']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($courseRequisite['CourseRequisite']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Course Requisite'), array('action' => 'edit', $courseRequisite['CourseRequisite']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Course Requisite'), array('action' => 'delete', $courseRequisite['CourseRequisite']['id']), array(), __('Are you sure you want to delete # %s?', $courseRequisite['CourseRequisite']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Course Requisites'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Course Requisite'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Courses'), array('controller' => 'courses', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Course'), array('controller' => 'courses', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Course Requisites'), array('controller' => 'course_requisites', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Parent Course Requisite'), array('controller' => 'course_requisites', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Course Requisites'); ?></h3>
	<?php if (!empty($courseRequisite['ChildCourseRequisite'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Course Id'); ?></th>
		<th><?php echo __('Parent Id'); ?></th>
		<th><?php echo __('Active'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($courseRequisite['ChildCourseRequisite'] as $childCourseRequisite): ?>
		<tr>
			<td><?php echo $childCourseRequisite['id']; ?></td>
			<td><?php echo $childCourseRequisite['course_id']; ?></td>
			<td><?php echo $childCourseRequisite['parent_id']; ?></td>
			<td><?php echo $childCourseRequisite['active']; ?></td>
			<td><?php echo $childCourseRequisite['created']; ?></td>
			<td><?php echo $childCourseRequisite['modified']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'course_requisites', 'action' => 'view', $childCourseRequisite['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'course_requisites', 'action' => 'edit', $childCourseRequisite['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'course_requisites', 'action' => 'delete', $childCourseRequisite['id']), array(), __('Are you sure you want to delete # %s?', $childCourseRequisite['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Child Course Requisite'), array('controller' => 'course_requisites', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
