<style type="text/css">
	.datepicker{z-index:9999 !important}";
</style>



<div class="modal-dialog">
  <div class="modal-content">
  	<?php echo $this->Form->create('StaffProfileView', array('type' => 'file', 'class' => 'bs-example form-horizontal')); ?>
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal">&times;</button>
      <h4 class="modal-title"><?php echo __('Add Staff Profile View'); ?></h4>
    </div>
    <div class="modal-body">
				<?php
		echo $this->Form->input('event_id', array('class' => 'form-control'));
		echo $this->Form->input('staff_id', array('class' => 'form-control'));
		echo $this->Form->input('staff_no', array('class' => 'form-control'));
		echo $this->Form->input('name', array('class' => 'form-control'));
		echo $this->Form->input('parent_code', array('class' => 'form-control'));
		echo $this->Form->input('org_code', array('class' => 'form-control'));
		echo $this->Form->input('position', array('class' => 'form-control'));
		echo $this->Form->input('course_id', array('class' => 'form-control'));
		echo $this->Form->input('code', array('class' => 'form-control'));
		echo $this->Form->input('course_name', array('class' => 'form-control'));
		echo $this->Form->input('start_date', array('class' => 'datepicker-input control-label form-control', 'value' => date("d-m-Y"), 'data-date-format' => 'dd-mm-yyyy', 'type' => 'text', 'style' => 'z-index: 100000!important;'));
		echo $this->Form->input('end_date', array('class' => 'datepicker-input control-label form-control', 'value' => date("d-m-Y"), 'data-date-format' => 'dd-mm-yyyy', 'type' => 'text', 'style' => 'z-index: 100000!important;'));
		echo $this->Form->input('duration', array('class' => 'form-control'));
		echo $this->Form->input('readiness', array('class' => 'form-control'));
		echo $this->Form->input('interest', array('class' => 'form-control'));
		echo $this->Form->input('cooperation', array('class' => 'form-control'));
		echo $this->Form->input('participation', array('class' => 'form-control'));
		echo $this->Form->input('ability', array('class' => 'form-control'));
		echo $this->Form->input('attitude', array('class' => 'form-control'));
		echo $this->Form->input('remarks', array('class' => 'form-control'));
		echo $this->Form->input('status', array('class' => 'form-control'));
		echo $this->Form->input('theory', array('class' => 'form-control'));
		echo $this->Form->input('practical', array('class' => 'form-control'));
		echo $this->Form->input('doc', array('class' => 'form-control'));
		echo $this->Form->input('comment', array('class' => 'form-control'));
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
				$('#StaffProfileViewStartDate').datepicker({
				     dateFormat: 'dd-mm-yy',
				     minDate: '+5d',
				     changeMonth: true,
				     changeYear: true
				 });
				$('#StaffProfileViewEndDate').datepicker({
				     dateFormat: 'dd-mm-yy',
				     minDate: '+5d',
				     changeMonth: true,
				     changeYear: true
				 });
</script>
