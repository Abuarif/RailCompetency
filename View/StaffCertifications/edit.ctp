<style type="text/css">
	.datepicker{z-index:9999 !important}";
</style>



<div class="modal-dialog">
  <div class="modal-content">
  	<?php echo $this->Form->create('StaffCertification', array('type' => 'file', 'class' => 'bs-example form-horizontal')); ?>
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal">&times;</button>
      <h4 class="modal-title"><?php echo __('Edit Staff Certification'); ?></h4>
    </div>
    <div class="modal-body">
				<?php
		echo $this->Form->input('id', array('class' => 'form-control'));
		echo $this->Form->input('staff_id', array('class' => 'form-control'));
		echo $this->Form->input('certificate_name', array('class' => 'form-control'));
		echo $this->Form->input('start_date', array('class' => 'datepicker-input form-control', 'value' => date("d-m-Y"), 'data-date-format' => 'dd-mm-yyyy', 'type' => 'text', 'style' => 'z-index: 100000!important;'));
		echo $this->Form->input('end_date', array('class' => 'datepicker-input form-control', 'value' => date("d-m-Y"), 'data-date-format' => 'dd-mm-yyyy', 'type' => 'text', 'style' => 'z-index: 100000!important;'));
		// echo $this->Form->input('status', array('class' => 'form-control'));
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


<script type="text/javascript">
				$('#StaffCertificationStartDate').datepicker({
				     dateFormat: 'dd-mm-yy',
				     minDate: '+5d',
				     changeMonth: true,
				     changeYear: true
				 });
				$('#StaffCertificationEndDate').datepicker({
				     dateFormat: 'dd-mm-yy',
				     minDate: '+5d',
				     changeMonth: true,
				     changeYear: true
				 });
</script>
