

<div class="modal-dialog">
  <div class="modal-content">
  	<?php echo $this->Form->create('MailingList', array('type' => 'file', 'class' => 'bs-example form-horizontal')); ?>
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal">&times;</button>
      <h4 class="modal-title"><?php echo __('Add Mailing List'); ?></h4>
    </div>
    <div class="modal-body">
				<?php
    echo $this->Form->input('name', array('class' => 'form-control'));
		echo $this->Form->input('slug', array('class' => 'form-control'));
		echo $this->Form->input('active', array('class' => 'form-control'));
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


