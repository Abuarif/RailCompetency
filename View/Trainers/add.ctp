<div class="modal-dialog">
  <div class="modal-content">
  	<?php echo $this->Form->create('Trainer', array('type' => 'file', 'class' => 'bs-example form-horizontal')); ?>
    <div class="modal-header" style="text-align:center;">
      <button type="button" class="close" data-dismiss="modal">&times;</button>
      <h4 class="modal-title"><?php echo __('Add Trainer'); ?></h4>
    </div>
    <div class="modal-body">
				<?php
      		echo $this->Form->input('staff_id', array('class' => 'form-control', 'style' => 'width:560px;'));
          echo '<br><br>';
      		echo $this->Form->input('course_id', array('class' => 'form-control', 'style' => 'width:560px;'));
          echo '<br><br>';
      		echo $this->Form->input('active');
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


