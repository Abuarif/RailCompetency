<div class="modal-dialog">
  <div class="modal-content">
  	<?php echo $this->Form->create('Course', array('type' => 'file', 'class' => 'bs-example form-horizontal')); ?>
    <div class="modal-header" style="text-align:center;">
      <button type="button" class="close" data-dismiss="modal">&times;</button>
      <h4 class="modal-title"><?php echo __('Upload Attachment'); ?></h4>
    </div>
    <div class="modal-body">
		<?php
			echo $this->Form->input('id', array('class' => 'form-control'));
			echo '<br>';
			echo $this->Form->input('files', array('type' => 'file', 'class' => 'form-control', 'label' => 'File'));
			echo '<br>';
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


