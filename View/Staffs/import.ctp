
<div class="modal-dialog">
  <div class="modal-content">
  	<?php echo $this->Form->create('Staff', array('type' => 'file', 'class' => 'bs-example form-horizontal')); ?>
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal">&times;</button>
      <h4 class="modal-title"><?php echo __('Staff Batch Upload Data'); ?></h4>
    </div>
    <div class="modal-body">
      <p> Sample CSV file: <BR>
        staff_no., name, nric, position, parent_code, org_code<br/>
        10013930,ROSFIRDAUS BIN SHIDAN,920603-02-5875,Technician,KJL,WEES<br/>
10013932,MOHD ARFAIZI BIN DAUD @ AHMAD DAUD,841022-05-5579,Technician,KJL,WEES </p>
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
