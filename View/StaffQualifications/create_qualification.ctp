<div class="modal-dialog">
  <div class="modal-content">
  	<?php echo $this->Form->create('StaffQualification', array('type' => 'file', 'class' => 'bs-example form-horizontal')); ?>
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal">&times;</button>
      <h4 class="modal-title"><?php echo __('Add Staff Qualification'); ?></h4>
    </div>
    <div class="modal-body">
				<?php
		echo $this->Form->hidden('staff_id', array('class' => 'form-control', 'value' => $staff_id));
		echo $this->Form->input('certificate_name', array('class' => 'form-control', 'options' => $qualification));
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

