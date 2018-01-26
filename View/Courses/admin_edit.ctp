

<div class="modal-dialog">
  <div class="modal-content">
  	<?php echo $this->Form->create('Course', array('type' => 'file', 'class' => 'bs-example form-horizontal')); ?>
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal">&times;</button>
      <h4 class="modal-title"><?php echo __('Admin Edit Course'); ?></h4>
    </div>
    <div class="modal-body">
				<?php
		echo $this->Form->input('id', array('class' => 'col-lg-2 control-label form-control'));
		echo $this->Form->input('training_provider_id', array('class' => 'col-lg-2 control-label form-control'));
		echo $this->Form->input('module_id', array('class' => 'col-lg-2 control-label form-control'));
		echo $this->Form->input('service_id', array('class' => 'col-lg-2 control-label form-control'));
		echo $this->Form->input('code', array('class' => 'col-lg-2 control-label form-control'));
		echo $this->Form->input('name', array('class' => 'col-lg-2 control-label form-control'));
		echo $this->Form->input('files', array('type' => 'file', 'class' => 'col-lg-2 control-label form-control'));
		echo $this->Form->input('details', array('class' => 'col-lg-2 control-label form-control'));
		echo $this->Form->input('duration', array('class' => 'col-lg-2 control-label form-control'));
		echo $this->Form->input('isRefresher', array('class' => 'col-lg-2 control-label form-control'));
		echo $this->Form->input('cycleTime', array('class' => 'col-lg-2 control-label form-control'));
		echo $this->Form->input('active', array('class' => 'col-lg-2 control-label form-control'));
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


