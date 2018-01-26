

<div class="modal-dialog">
  <div class="modal-content">
  	<?php echo $this->Form->create('EvaluationDetail', array('type' => 'file', 'class' => 'bs-example form-horizontal')); ?>
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal">&times;</button>
      <h4 class="modal-title"><?php echo __('Add Evaluation Detail'); ?></h4>
    </div>
    <div class="modal-body">
				<?php
		echo $this->Form->input('staff_id', array('class' => 'col-lg-2 control-label form-control'));
		echo $this->Form->input('evaluation_questionnaire_id', array('class' => 'col-lg-2 control-label form-control'));
		echo $this->Form->input('score', array('class' => 'col-lg-2 control-label form-control'));
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


