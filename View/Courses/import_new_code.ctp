
<div class="modal-dialog">
  <div class="modal-content">
  	<?php echo $this->Form->create('Course', array('type' => 'file', 'class' => 'bs-example form-horizontal')); ?>
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal">&times;</button>
      <h4 class="modal-title"><?php echo __('Upload and Replace Course Code with New Data'); ?></h4>
    </div>
    <div class="modal-body">
      <p> Sample CSV file: <BR>
        1,S06-OV-01,SBK-IT-01,IT Overview<br/>
        2,SO5-AD-01-M01,SBK-WE-PS-01,Power Supervisory Control & Data Acquisition (PSCADA) Maintenance & Administration<br/>
				<?php
		echo $this->Form->input('files', array('type' => 'file', 'class' => 'form-control'));
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
