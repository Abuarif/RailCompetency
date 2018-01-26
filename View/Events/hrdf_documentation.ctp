<link rel="stylesheet" type="text/css" href="/lms/css/../theme/LamanPuteri/js/datatables/datatables.css">
  
<div class="modal-dialog">
  <div class="modal-content">
  	<?php echo $this->Form->create('Event', array('class' => 'form-horizontal')); ?>
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal">&times;</button>
      <h4 class="modal-title"><?php echo __('HRDF Documentation'); ?></h4>
    </div>
    <div class="modal-body">
			<section class="panel panel-default">
        <div class="table-responsive">
          <table class="table table-striped m-b-none">
            <thead>
              <tr>
                <th> Actions</th>
                <th> Event Name</th>
                <th> Start Date</th>
                <th> End Date</th>
              </tr>
            </thead>
            <tbody>
              <?php //foreach ($events as $event): ?>
                <?php if (count($event['EventAttendance']) > 0) { ?>
                <tr>
                  <td>
                    <?php echo $this->Html->link('<i class="btn btn-success fa fa-print pull-left"></i>', array('controller' => 'events', 'action' => 'hrdf_printout', $event_id), array('target' => '_blank', 'escape' => false, 'title' => 'Participant List')); ?>
                  </td>
                  <td>
                    <?php echo $event['Course']['code']. ' - '. $event['Course']['name']; ?>
                  </td>
                  <td><?php echo $this->Time->nice($event['Event']['start_date']); ?>&nbsp;</td>
                  <td><?php echo $this->Time->nice($event['Event']['end_date']); ?>&nbsp;</td>
                </tr>
                <?php } ?>
              <?php //endforeach; ?>
            </tbody>
          </table>
        </div>
      </section>
      <section class="panel panel-default">
        <div class="table-responsive">
          <table class="table table-striped m-b-none">
            <thead>
              <tr>
                <th> Actions</th>
                <th> Course Name</th>
              </tr>
            </thead>
            <tbody>
              <?php //foreach ($events as $event): ?>
                <?php if (count($event['EventAttendance']) > 0) { ?>
                <tr>
                  <td>
                    <?php echo $this->Html->link('<i class="btn btn-warning fa fa-gears pull-left"></i>', array('controller' => 'courses', 'action' => 'attachment_mini', $event['Event']['id'], $event['Course']['id']), array('confirm' => 'Are you sure you wish to upload the course outline?', 'escape' => false, 'data-toggle' => 'ajaxModal', 'title' => 'Upload Course Outline')); ?>

                    <?php if (!empty($event['Course']['files'])) { ?>
                      <?php echo $this->Html->link('<i class="btn btn-success fa fa-book pull-left"></i>', '/attachments/'.$event['Course']['files'], array('confirm' => 'Are you sure you wish to print the course outline?', 'escape' => false, 'target' => '_blank', 'title' => 'Course Outline')); ?>
                    <?php } ?>
                  </td>
                  <td>
                    <?php echo $event['Course']['code']. ' - '. $event['Course']['name']; ?>
                  </td>
                </tr>
                <?php } ?>
              <?php //endforeach; ?>
            </tbody>
          </table>
        </div>
      </section>
      <section class="panel panel-default">
        <div class="table-responsive">
          <table class="table table-striped m-b-none">
            <thead>
              <tr>
                <th> Actions</th>
                <th> Trainer Name</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($event['EventTrainer'] as $trainer): ?>
                <?php if (count($event['EventAttendance']) > 0) { ?>
                <tr>
                  <td>
                    <?php 
                      $staff = $this->requestAction(
                        array('controller' => 'trainers', 
                          'action' => 'object', $trainer['trainer_id']));

                    ?>
                    <?php echo $this->Html->link('<i class="btn btn-warning fa fa-gears pull-left"></i>', array('controller' => 'staffs', 'action' => 'upload_profile_mini', $event['Event']['id'] ,$staff['Staff']['id']), array('confirm' => 'Are you sure you wish to upload the trainer profile?', 'escape' => false, 'data-toggle' => 'ajaxModal', 'title' => 'Upload Trainer Profile')); ?>
                    <?php if ( $staff['Staff']['files'] != "''") { ?>
                    <?php echo $this->Html->link('<i class="btn btn-success fa fa-user pull-left"></i>', '/attachments/'.$staff['Staff']['files'], array('confirm' => 'Are you sure you wish to print the trainer profile?', 'escape' => false, 'target' => '_blank', 'title' => 'Trainer Profile')); ?>
                    <?php } ?>
                  </td>
                  <td>
                    <?php 
                      echo (!empty($staff['Staff'])?$staff['Staff']['name']:'');
                    ?>
                  </td>
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
