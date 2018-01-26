<link rel="stylesheet" type="text/css" href="/lms/css/../theme/LamanPuteri/js/datatables/datatables.css">
  
<div class="modal-dialog">
  <div class="modal-content">
  	<?php echo $this->Form->create('Event', array('class' => 'form-horizontal')); ?>
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal">&times;</button>
      <h4 class="modal-title"><?php echo __('Copy Participants'); ?></h4>
    </div>
    <div class="modal-body">
			<section class="panel panel-default">
        <div class="table-responsive">
          <table id="datatable" class="table table-striped m-b-none">
            <thead>
              <tr>
                <th> Actions</th>
                <th> Event Name</th>
                <th> Start Date</th>
                <th> End Date</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($events as $event): ?>
              <?php $myAttendance = $this->requestAction('/rail_competency/event_attendances/get_attendances/'.$event['Event']['id']); ?>
                <?php if (count($myAttendance) > 0) { ?>
                <?php $myCourse = $this->requestAction('/rail_competency/courses/object/'.$event['Event']['course_id']); ?>
                <tr>
                  <td><?php echo $this->Form->postLink($this->Form->button('<i class="fa fa-files-o"></i>', array('class'=>'btn btn-xs btn-success', 'style'=>'color:#000; width:25px; height:25px;','data-toggle'=>'tooltip', 'data-placement'=>'right', 'title'=>'Copy Participants - '.$myCourse['Course']['code'])), array('controller' => 'events', 'action' => 'copy_participants', $event_id, $myCourse['Course']['service_id'], $event['Event']['id']), array('escape' => false, 'confirm' => 'Are your sure you want to copy the participants from this event?')); ?>
                  </td>
                  <td>
                    <?php //echo $myCourse['Course']['code']. ' - '. $myCourse['Course']['name'].' '.$event['Event']['description'].' Total Participant ('.count($myAttendance).')'; ?>
                    <?php echo $myCourse['Course']['code']. ' - '. $myCourse['Course']['name'].' Total Participant ('.count($myAttendance).')'; ?>
                  </td>
                  <td><?php echo $this->Time->nice($event['Event']['start_date']); ?>&nbsp;</td>
                  <td><?php echo $this->Time->nice($event['Event']['end_date']); ?>&nbsp;</td>
                </tr>
                <?php } ?>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
      </section>
    </div>
    <div class="modal-footer">
    	<?php echo $this->Layout->sessionFlash(); ?>
    	<a href="#" class="btn btn-default" data-dismiss="modal">Close</a>
    </div>
    	<?php echo $this->Form->end();?>
  </div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->

<script type="text/javascript" src="/lms/js/../theme/LamanPuteri/js/datatables/custom.js"></script>
<script type="text/javascript" src="/lms/js/../theme/LamanPuteri/js/datatables/dataTables.bootstrap.js"></script>
<script type="text/javascript" src="/lms/js/../theme/LamanPuteri/js/datatables/jquery.dataTables.min.js"></script>

