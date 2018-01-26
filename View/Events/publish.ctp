<style type="text/css">
	.datepicker{z-index:9999 !important}";
</style>

<div id="editEventModal" class="modal-dialog">
  <div class="modal-content">
  	<?php echo $this->Form->create('Event', array('class' => 'bs-example form-horizontal')); ?>
    <div class="modal-header" style="text-align:center;">
      <button type="button" class="close" data-dismiss="modal">&times;</button>
      <h4 class="modal-title"><?php echo __('Publish Event'); ?></h4>
  </div>
  <div class="modal-body">
    <?php
    echo $this->Form->input('id', array('class' => 'form-control', 'value' => $event_id));
    echo $this->Form->input('details', array('class' => 'form-control', 'placeholder' => 'Please add more detail here...', 'style' => 'resize:none;', 'label' => 'Additional Notes in event title segment'));
		echo $this->Form->hidden('active', array('class' => 'col-lg-2 control-label form-control', 'value' => 1));
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

