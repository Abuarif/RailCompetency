

<div class="modal-dialog">
  <div class="modal-content">
  	<?php echo $this->Form->create('EventTrainer', array('class' => 'form-horizontal')); ?>
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal">&times;</button>
      <h4 class="modal-title"><?php echo __('Assign Trainer'); ?></h4>
    </div>
    <div class="modal-body">
				<?php
        if (!empty($trainers)) {
          echo $this->Form->hidden('event_id', array('class' => 'col-lg-2 control-label form-control', 'value' => $event_id));
          echo $this->Form->input('course_id', array('class' => 'col-lg-2 control-label form-control'));
          echo $this->Form->input('trainer_id', array('class' => 'col-lg-2 control-label form-control'));
          echo $this->Form->input('is_assist');
          echo $this->Form->hidden('active', array('class' => 'col-lg-2 control-label form-control', 'value' => 1));
        } else {
          echo 'No available trainer for this course. Please click on the following button to create your trainer from the staff list.<br/><br/>';
          echo $this->Html->link('Create Trainer', array('controller' => 'staffs', 'action' => 'index'), array('class' => 'btn btn-primary'));
        }
		
	?>
	</div>
    <div class="modal-footer">
    	<?php echo $this->Layout->sessionFlash(); ?>
    	<a href="#" class="btn btn-default" data-dismiss="modal">Close</a>
    	<?php echo $this->Form->button('Submit', array('class' => 'btn btn-primary'));?>
    </div>
    	<?php echo $this->Form->end();?>
  </div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->


