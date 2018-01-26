
<div class="modal-dialog">
  <div class="modal-content">
  	<?php echo $this->Form->create('Event', array('type' => 'file', 'class' => 'bs-example form-horizontal')); ?>
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal">&times;</button>
      <h4 class="modal-title">Daily Attendance Checklist (Day <?php echo $day?>)</h4>
    </div>
    <div class="modal-body">
	    <section class="panel panel-default ">
              
            <!-- The staff list is visible when $staffs is not empty -->
            <?php if(!empty($myAttendances)) { ?>
            <?php // if (!empty($staffs)) { ?>
            <!-- search data -->
            <?php echo $this->Form->create('EventAttendanceDetail', array('class' => 'bs-example form-horizontal', 'inputDefaults' => array('label' => false, 'div' => false))); ?>
            <header class="panel-footer">
              <div class="row">
                <div class="col-sm-4 text-left">
                  &nbsp;&nbsp;&nbsp;&nbsp;<?php echo $this->Form->button('Update', array('class' => 'btn btn-default', 'style'=>'color:#fff;','data-toggle'=>'tooltip', 'data-placement'=>'top', 'title'=>'Click here to submit the name.'));?>
                </div>
                <div class="col-sm-4 text-center">
                  &nbsp;
                </div>
                <div class="col-sm-4 text-right text-center-xs">                
                  &nbsp;
                </div>
              </div>
            </header>
            <div class="table-responsive">
              <table class="table table-striped b-t b-light" style="overflow-x:auto;overflow-y: hidden">
                <thead>
                  <tr>
                    <th width="20"><input type="checkbox"></th>
                    <th class="th-sortable" data-toggle="class">Department</th>
                    <th class="th-sortable" data-toggle="class">Staff Number</th>
                    <th class="th-sortable" data-toggle="class">Staff Name</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
                    $iterate = 0;
                    foreach ($myAttendances as $eventAttendance) {
                      $staff = $this->requestAction('/rail_competency/staffs/object/'.$eventAttendance['EventAttendance']['staff_id']);
                  ?>
                  <tr>
                    <td>
                      <?php echo $this->Form->checkbox('EventAttendanceDetail.'.$iterate.'.active', array('class' => 'input-sm form-control', 'label' => false,'data-toggle'=>'tooltip', 'data-placement'=>'right', 'title'=>'Choose this staff!')); ?>
                      <?php echo $this->Form->hidden('EventAttendanceDetail.'.$iterate.'.staff_id', array('class' => 'col-lg-2 control-label form-control', 'value' => $staff['Staff']['id'], 'label' => false)); ?>
                      <?php echo $this->Form->hidden('EventAttendanceDetail.'.$iterate.'.event_id', array('class' => 'col-lg-2 control-label form-control', 'value' => $eventAttendance['EventAttendance']['event_id'], 'label' => false)); ?>
                      <?php echo $this->Form->hidden('EventAttendanceDetail.'.$iterate.'.event_attendance_id', array('class' => 'col-lg-2 control-label form-control', 'value' => $eventAttendance['EventAttendance']['id'], 'label' => false)); ?>
                      <?php echo $this->Form->hidden('EventAttendanceDetail.'.$iterate.'.day', array('class' => 'col-lg-2 control-label form-control', 'value' => $day, 'label' => false)); ?>
                    </td>
                    <td>
                      <?php echo $staff['Staff']['parent_code'].' - '.$staff['Staff']['org_code']; ?>
                    </td>
                    <td>
                      <?php echo $staff['Staff']['staff_no']; ?> 
                    </td>
                    <td>
                      <?php echo $staff['Staff']['name']; ?>
                    </td>
                  </tr>
                  <?php $iterate++; } ?>
                </tbody>
              </table>
            </div>
            <footer class="panel-footer">
              <div class="row">
                <div class="col-sm-4 text-left">
                  &nbsp;&nbsp;&nbsp;&nbsp;<?php echo $this->Form->button('Update', array('class' => 'btn btn-default', 'style'=>'color:#fff;','data-toggle'=>'tooltip', 'data-placement'=>'top', 'title'=>'Click here to submit the name.'));?>
                </div>
                <div class="col-sm-4 text-center">
                  &nbsp;
                </div>
                <div class="col-sm-4 text-right text-center-xs">                
                  &nbsp;
                </div>
              </div>
            </footer>
            <?php } else {?>
            <header class="panel-footer">
              <div class="row">
                <div class="col-sm-12 text-left hidden-xs">
                </div>
                
              </div>
            </header>
            <?php } ?>
          <!-- search data -->
            <?php echo $this->Form->end(); ?>
        </section>
    </div>
    <div class="modal-footer">
    	<?php echo $this->Layout->sessionFlash(); ?>
    	<a href="#" class="btn btn-default" data-dismiss="modal">Close</a>
    	<?php //echo $this->Form->button('Submit', array('class' => 'btn btn-primary'));?>
    </div>
    	<?php echo $this->Form->end();?>
  </div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->