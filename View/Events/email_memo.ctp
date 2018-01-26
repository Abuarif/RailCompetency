<div class="modal-dialog">
  <div class="modal-content">
  	<?php echo $this->Form->create('Event', array('class' => 'bs-example form-horizontal')); ?>
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal">&times;</button>
      <h4 class="modal-title"><?php echo __('Training Memo Broadcast'); ?></h4>
    </div>
    <div class="modal-body">
				<?php
		echo $this->Form->input('mailinglist_id', array('class' => 'form-control', 'options' => $mailingLists, 'label' => 'Mailing List Available'));
      echo '<br><br>';
    echo $this->Form->input('notes', array('class' => 'form-control', 'label' => 'Special Notes', 'placeholder' => 'Add special notes if applicable.'));
		echo $this->Form->hidden('event_id', array('value' => $event_id));
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


