<div class="modal-dialog">
  	<div class="modal-content">
        <div class="modal-header" style="text-align: center;">
	      <button type="button" class="close" data-dismiss="modal">&times;</button>
	      <h4 class="modal-title"><?php echo __('View Staff Training Profile'); ?></h4>
	    </div>
	    <div class="modal-body">
			<section class="panel panel-default">
	        <small class="text-uc text-xs text-muted"><?php echo __('Id'); ?></small>
			<p>
				<?php echo h($staffTrainingProfile['StaffTrainingProfile']['id']); ?>
				&nbsp;
			</p>
			<small class="text-uc text-xs text-muted"><?php echo __('Staff'); ?></small>
			<p>
				<?php echo $this->Html->link($staffTrainingProfile['Staff']['name'], array('controller' => 'staffs', 'action' => 'view', $staffTrainingProfile['Staff']['id'])); ?>
				&nbsp;
			</p>
			<small class="text-uc text-xs text-muted"><?php echo __('Staff No'); ?></small>
			<p>
				<?php echo h($staffTrainingProfile['StaffTrainingProfile']['staff_no']); ?>
				&nbsp;
			</p>
			<small class="text-uc text-xs text-muted"><?php echo __('Name'); ?></small>
			<p>
				<?php echo h($staffTrainingProfile['StaffTrainingProfile']['name']); ?>
				&nbsp;
			</p>
			<small class="text-uc text-xs text-muted"><?php echo __('Parent Code'); ?></small>
			<p>
				<?php echo h($staffTrainingProfile['StaffTrainingProfile']['parent_code']); ?>
				&nbsp;
			</p>
			<small class="text-uc text-xs text-muted"><?php echo __('Org Code'); ?></small>
			<p>
				<?php echo h($staffTrainingProfile['StaffTrainingProfile']['org_code']); ?>
				&nbsp;
			</p>
			<small class="text-uc text-xs text-muted"><?php echo __('Course'); ?></small>
			<p>
				<?php echo $this->Html->link($staffTrainingProfile['Course']['name'], array('controller' => 'courses', 'action' => 'view', $staffTrainingProfile['Course']['id'])); ?>
				&nbsp;
			</p>
			<small class="text-uc text-xs text-muted"><?php echo __('Code'); ?></small>
			<p>
				<?php echo h($staffTrainingProfile['StaffTrainingProfile']['code']); ?>
				&nbsp;
			</p>
			<small class="text-uc text-xs text-muted"><?php echo __('Course Name'); ?></small>
			<p>
				<?php echo h($staffTrainingProfile['StaffTrainingProfile']['course_name']); ?>
				&nbsp;
			</p>
			<small class="text-uc text-xs text-muted"><?php echo __('Start Date'); ?></small>
			<p>
				<?php echo h($staffTrainingProfile['StaffTrainingProfile']['start_date']); ?>
				&nbsp;
			</p>
			<small class="text-uc text-xs text-muted"><?php echo __('End Date'); ?></small>
			<p>
				<?php echo h($staffTrainingProfile['StaffTrainingProfile']['end_date']); ?>
				&nbsp;
			</p>
			<small class="text-uc text-xs text-muted"><?php echo __('Duration'); ?></small>
			<p>
				<?php echo h($staffTrainingProfile['StaffTrainingProfile']['duration']); ?>
				&nbsp;
			</p>
			<small class="text-uc text-xs text-muted"><?php echo __('Remarks'); ?></small>
			<p>
				<?php echo h($staffTrainingProfile['StaffTrainingProfile']['remarks']); ?>
				&nbsp;
			</p>
			<small class="text-uc text-xs text-muted"><?php echo __('Status'); ?></small>
			<p>
				<?php echo h($staffTrainingProfile['StaffTrainingProfile']['status']); ?>
				&nbsp;
			</p>
			<small class="text-uc text-xs text-muted"><?php echo __('Theory'); ?></small>
			<p>
				<?php echo h($staffTrainingProfile['StaffTrainingProfile']['theory']); ?>
				&nbsp;
			</p>
			<small class="text-uc text-xs text-muted"><?php echo __('Practical'); ?></small>
			<p>
				<?php echo h($staffTrainingProfile['StaffTrainingProfile']['practical']); ?>
				&nbsp;
			</p>
			<small class="text-uc text-xs text-muted"><?php echo __('Doc'); ?></small>
			<p>
				<?php echo h($staffTrainingProfile['StaffTrainingProfile']['doc']); ?>
				&nbsp;
			</p>
			<small class="text-uc text-xs text-muted"><?php echo __('Comment'); ?></small>
			<p>
				<?php echo h($staffTrainingProfile['StaffTrainingProfile']['comment']); ?>
				&nbsp;
			</p>
			<small class="text-uc text-xs text-muted"><?php echo __('Pte'); ?></small>
			<p>
				<?php echo h($staffTrainingProfile['StaffTrainingProfile']['pte']); ?>
				&nbsp;
			</p>
			<small class="text-uc text-xs text-muted"><?php echo __('Active'); ?></small>
			<p>
				<?php echo h($staffTrainingProfile['StaffTrainingProfile']['active']); ?>
				&nbsp;
			</p>
        </section>
    </div>
    <div class="modal-footer">
    	<?php echo $this->Layout->sessionFlash(); ?>
    	<a href="#" class="btn btn-default" data-dismiss="modal">Close</a>
    </div>
  </div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
