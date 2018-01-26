<style type="text/css">
	.datepicker{z-index:9999 !important}";
</style>

<div class="modal-dialog">
  <div class="modal-content">
  	<?php echo $this->Form->create('Event', array('type' => 'file', 'class' => 'bs-example form-horizontal')); ?>
    <div class="modal-header" style="text-align:center;">
      <button type="button" class="close" data-dismiss="modal">&times;</button>
      <h4 class="modal-title"><?php echo __('Copy Event'); ?></h4>
  </div>
  <div class="modal-body">
    <?php
    echo $this->Form->input('course_id', array('class' => 'form-control', 'value' => $event['Event']['course_id']));
    echo '<br><br>';
    echo $this->Form->input('venue_id', array('class' => 'form-control', 'value' => $event['Event']['venue_id'], 'style' => 'width:560px;'));
    echo '<br><br>';
    echo $this->Form->input('pax', array('class' => 'form-control',  'value' => $event['Event']['pax'], 'style' => 'width:560px;', 'type' => 'text'));
    echo '<br>';
    echo $this->Form->input('details', array('class' => 'form-control', 'value' => $event['Event']['details'], 'style' => 'width:560px;resize:none;'));
    echo '<br>';
    echo $this->Form->input('start_date', array('class' => 'EventStartDate datepicker-input form-control', 'value' => $event['Event']['start_date'], 'data-date-format' => 'dd-mm-yyyy hh:ii', 'type' => 'text', 'style' => 'z-index: 100000!important;'));
    echo '<br>';
    echo $this->Form->input('end_date', array('class' => 'EventEndDate datepicker-input form-control', 'value' => $event['Event']['end_date'], 'data-date-format' => 'dd-mm-yyyy', 'type' => 'text', 'style' => 'z-index: 100000!important;'));
    echo '<br>';
    echo $this->Form->input('last_enrollment', array('class' => 'EventLastEnrollment datepicker-input form-control', 'value' => $event['Event']['last_enrollment'], 'data-date-format' => 'dd-mm-yyyy', 'type' => 'text', 'style' => 'z-index: 100000!important;'));
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