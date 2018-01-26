<style type="text/css">
	.datepicker{z-index:9999 !important}";
</style>



<div id="editEventModal" class="modal-dialog">
  <div class="modal-content">
  	<?php echo $this->Form->create('Event', array('type' => 'file', 'class' => 'bs-example form-horizontal')); ?>
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal">&times;</button>
      <h4 class="modal-title"><?php echo __('Edit Event'); ?></h4>
    </div>
    <div class="modal-body" style="direction:ltr;">
				<?php
		echo $this->Form->input('id', array('class' => 'col-lg-2 control-label form-control'));
		echo $this->Form->input('course_id', array('class' => 'col-lg-2 control-label form-control'));
		echo $this->Form->input('venue_id', array('class' => 'col-lg-2 control-label form-control'));
		echo $this->Form->input('pax', array('class' => 'col-lg-2 control-label form-control'));
		echo $this->Form->input('details', array('class' => 'col-lg-2 control-label form-control', 'placeholder' => 'Please add more detail here...', 'style' => 'direction:ltr;'));
		echo $this->Form->input('start_date', array('class' => 'EventStartDate col-lg-2 datepicker-input control-label form-control', 'data-date-format' => 'dd-mm-yyyy hh:ii', 'value' => $start, 'type' => 'text', 'style' => 'z-index: 100000!important;'));
		echo $this->Form->input('end_date', array('class' => 'EventEndDate col-lg-2 datepicker-input control-label form-control', 'data-date-format' => 'dd-mm-yyyy', 'value' => $end, 'type' => 'text', 'style' => 'z-index: 100000!important;'));
		echo $this->Form->input('last_enrollment', array('class' => 'EventLastEnrollment col-lg-2 datepicker-input control-label form-control', 'data-date-format' => 'dd-mm-yyyy', 'type' => 'text', 'style' => 'z-index: 100000!important;'));
		// echo $this->Form->input('all_day', array('class' => 'col-lg-2 control-label form-control'));
		// echo $this->Form->input('status', array('class' => 'col-lg-2 control-label form-control'));
		// echo $this->Form->hidden('active', array('class' => 'col-lg-2 control-label form-control', 'value' => 1));
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
    $(".EventStartDate").datetimepicker({
        format: "dd-mm-yyyy hh:ii",
        autoclose: true,
        todayBtn: true,
        pickerPosition: "top-left"
    });

    $(".EventEndDate").datetimepicker({
        format: "dd-mm-yyyy hh:ii",
        autoclose: true,
        todayBtn: true,
        pickerPosition: "top-left"
    });

    $(".EventLastEnrollment").datetimepicker({
        format: "dd-mm-yyyy",
        autoclose: true,
        todayBtn: true,
        pickerPosition: "top-left"
    });
</script> 
