<script type="text/javascript">

  setInterval(function() {
    this.state = this.state ? false : true;
    this.list = document.getElementsByTagName('blink')
    for (var i = this.list.length - 1; i >= 0; i --) {
        this.list[i].style.color = this.state ? 'transparent' : 'inherit';
    }
}, 1000);

</script>

<ul class="breadcrumb no-border no-radius b-b b-light pull-in">
  <li><a href="<?php echo $this->webroot; ?>"><i class="fa fa-home"></i> Home</a></li>
  <li><?php echo $this->Html->link('<i class="fa fa-book"></i> Event List', array('action' => 'index'), array('escape' => false)); ?></li>
  <li class="active">Event Claim Management</li>
</ul>
<div class="m-b-md">
  <h3 class="m-b-none">Event Claim Management</h3>
</div>

<?php 
if (!empty($this->request->named))
  $myActive = $this->request->named['tab'];
else
  $myActive = 'dashboard';
?>
<?php
if (!empty($event['Event'])) {
  if ($event['Event']['is_claimed'] == 0) {
    $status = 1;
    $color = 'red';
  } else if ($event['Event']['is_claimed'] == 1) {
    $status = 2;
    $color = 'orange';
  } else if ($event['Event']['is_claimed'] == 2) {
    $status = 2;
    $color = 'green';
  }
}
?>


<section class="panel panel-default">
  <header class="panel-heading text-right bg-light dker bg-gradient" style="height:auto">
    <ul class="nav nav-tabs pull-left">
      <li <?php echo ($myActive == 'dashboard' ? 'class="active"' : ''); ?> ><a href="#dashboard" data-toggle="tab">Dashboard</a></li>
      <li <?php echo ($myActive == 'Nomination' ? 'class="active"' : ''); ?> ><a href="#Nomination" data-toggle="tab">Nomination</a></li>
      <li <?php echo ($myActive == 'Attendance' ? 'class="active"' : ''); ?> ><a href="#Attendance" data-toggle="tab">Attendance</a></li>
      <li <?php echo ($myActive == 'HRDF' ? 'class="active"' : ''); ?> ><a href="#HRDF" data-toggle="tab">Documents</a></li>
      <?php //} ?>
      
    </ul>
    <span class="hidden-sm">
      <i class="fa fa-bell-o" style="color:<?php echo $color; ?>"></i>
      <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-cog text-default"></i> Options <b class="caret"></b></a>
      <ul class="dropdown-menu pull-right">
        <li>
          <?php echo $this->Html->link('<i class="fa fa-dollar pull-left"></i>Create Claim', array('action' => 'create', $event['Event']['id']), array('data-toggle' => 'ajaxModal', 'confirm' => 'Are you sure you want to create a claim?', 'escape' => false)); ?>
        </li>
        <?php if (!empty($claim)) { ?>
        <li>
          <?php echo $this->Html->link('<i class="fa fa-pencil pull-left"></i>Modify Details', array('action' => 'edit', $claim['EventClaim']['id']), array('data-toggle' => 'ajaxModal', 'escape' => false)); ?>
        </li>
        
        <?php 
      } ?> 
        <li>
          <?php echo $this->Html->link('<i class="fa fa-envelope pull-left"></i>Update Status', array('controller' => 'events', 'action' => 'update_claim', $event['Event']['id'], $status), array('escape' => false, 'confirm' => 'Are you sure you want to update the claim status?')); ?>
        </li>    
      </ul>
    </span>
  </header>
  <article class="scrollable">
  <div class="panel-body">
    <div class="tab-content">
      <div class="tab-pane padder <?php echo ($myActive == 'dashboard' ? 'active' : ''); ?>" id="dashboard">
        <section class="scrollable wrapper">
          <section class="panel panel-default pos-rlt clearfix">
            <?php echo $this->Layout->sessionFlash(); ?>
            <header class="panel-heading">
              <ul class="nav nav-pills pull-right">
                <li>
                  <a href="#" class="panel-toggle text-muted active"><i class="fa fa-caret-down text-active"></i><i class="fa fa-caret-up text"></i></a>
                </li>
              </ul>
              <?php 
              $str = $myCourse['Course']['name'];
              $cont = strtolower($str);
              echo ucwords($cont) . ' (' . $myCourse['Course']['code'] . ') - ' . $event['Event']['details'];
              ?>
            </header>
            <div class="panel-body clearfix collapse">
              <table width="100%">
                <tr>
                  <td style="width:200px;height:25px;">
                    Claimed Amount
                  </td>
                  <td style="width:2%;height:25px;">
                    :
                  </td>
                  <td>
                    <?php echo (!empty($claim['EventClaim']['amount']) ? $this->Number->currency($claim['EventClaim']['amount'], 'RM ') : '0.00'); ?>
                    
                  </td>
                </tr>
                <tr>
                  <td style="height:25px;">
                    Prepared By
                  </td>
                  <td style="height:25px;">
                    :
                  </td>
                  <td>
                    <?php echo (!empty($claim['EventClaim']['amount']) ? $claim['EventClaim']['claimed_by'] : 'Not Applicable'); ?>
                  </td>
                </tr>
                <tr>
                  <td style="height:25px;">
                    Last Modified
                  </td>
                  <td style="height:25px;">
                    :
                  </td>
                  <td>
                    <?php echo (!empty($claim['EventClaim']['amount']) ? $this->Time->nice($claim['EventClaim']['modified']) : 'Not Applicable'); ?>
                  </td>
                </tr>
              </table>
            </div>
          </section>

          <div class="row">
            <div class="col-sm-6 portlet">
              <section class="panel panel-default portlet-item">
                <header class="panel-heading">
                  Participants
                </header>
                <div class="panel-body text-center">
                  <h4><?php echo count($myAttendances) . ':' . $myCourse['Course']['pax']; ?></h4>
                  <span style="font-size:60px;"><i class="fa fa-users text-dark"></i></span>
                </div>
              </section>
            </div>
            <div class="col-sm-6 portlet">
              <section class="panel panel-default portlet-item">
                <header class="panel-heading">
                  Trainers
                </header>
                <div class="panel-body text-center">
                  <h4><?php echo count($myTrainers); ?></h4>
                  <span style="font-size:60px;"><i class="fa fa-user text-success"></i></span>
                </div>
              </section>
            </div>
          </div>

          <div class="row">
            <div class="col-sm-6 portlet">
              <section class="panel panel-default portlet-item">
                <header class="panel-heading">
                  Start Date
                </header>
                <div class="panel-body text-center">
                  <h4><?php echo $this->Time->format('d-m-Y', $event['Event']['start_date']); ?></h4>
                  <span style="font-size:60px;"><i class="fa fa-calendar text-warning"></i></span>
                </div>
              </section>
            </div>
            <div class="col-sm-6 portlet">
              <section class="panel panel-default portlet-item">
                <header class="panel-heading">
                  End Date
                </header>
                <div class="panel-body text-center">
                  <h4><?php echo $this->Time->format('d-m-Y', $event['Event']['end_date']); ?></h4>
                  <span style="font-size:60px;"><i class="fa fa-calendar-o text-info"></i></span>
                </div>
              </section>
            </div>
          </div>
        </section>
      </div>

      <div class="tab-pane padder <?php echo ($myActive == 'HRDF' ? 'active' : ''); ?>" id="HRDF">
        <h3><?php echo __('HRDF Documentation'); ?></h3>
        <section class="panel panel-default">
          <div class="table-responsive">
            <table class="table table-striped m-b-none">
              <thead>
                <tr>
                  <th> No</th>
                  <th> Item</th>
                  <th> Action</th>
                </tr>
              </thead>
              <tbody>
                <?php //foreach ($events as $event): ?>
                  <?php if (count($myAttendances) > 0) { ?>
                  <tr>
                    <td> 1 </td>
                    <td> HRDF Claim Cover Notes </td>
                    <td>
                      <?php echo $this->Html->link('<i class="btn btn-success fa fa-print pull-left"></i>', array('controller' => 'events', 'action' => 'hrdf_covernotes', $event['Event']['id']), array('target' => '_blank', 'escape' => false, 'title' => 'Cover Notes')); ?>
                    </td>
                  </tr>
                  <tr>
                    <td> 2 (A) </td>
                    <td> Nomination list </td>
                    <td>
                      <?php echo $this->Html->link('<i class="btn btn-success fa fa-print pull-left"></i>', array('controller' => 'events', 'action' => 'hrdf_print_nomination', $event['Event']['id']), array('target' => '_blank', 'escape' => false, 'title' => 'Nomination List')); ?>
                    </td>
                  </tr>
                  <tr>
                    <td> 2 (B) </td>
                    <td> Participant list </td>
                    <td>
                      <?php echo $this->Html->link('<i class="btn btn-success fa fa-print pull-left"></i>', array('controller' => 'events', 'action' => 'hrdf_printout', $event['Event']['id']), array('target' => '_blank', 'escape' => false, 'title' => 'Participant List')); ?>
                    </td>
                  </tr>
                  <tr>
                    <td> 3 </td>
                    <td> Course Outline</td>
                    <td>
                      <?php echo $this->Html->link('<i class="btn btn-warning fa fa-gears pull-left"></i>', array('controller' => 'courses', 'action' => 'attachment_mini', $event['Event']['id'], $event['Event']['course_id']), array('confirm' => 'Are you sure you wish to upload the course outline?', 'escape' => false, 'data-toggle' => 'ajaxModal', 'title' => 'Upload Course Outline')); ?>

                      <?php if (!empty($myCourse['Course']['files'])) { ?>
                        <?php echo $this->Html->link('<i class="btn btn-success fa fa-book pull-left"></i>', '/attachments/' . $myCourse['Course']['files'], array('confirm' => 'Are you sure you wish to print the course outline?', 'escape' => false, 'target' => '_blank', 'title' => 'Course Outline')); ?>
                      <?php 
                    } ?>
                    </td>
                  </tr>
                  <?php $trainerCount = 4; ?>
                  <?php foreach ($myTrainers as $trainer) : ?>
                  <tr>
                    <td> <?php echo $trainerCount; ?>
                    <td>
                      <?php 
                      $staff = $this->requestAction(
                        array(
                          'controller' => 'trainers',
                          'action' => 'object', $trainer['EventTrainer']['trainer_id']
                        )
                      );

                      ?>
                      <?php 
                      echo (!empty($staff['Staff']) ? $staff['Staff']['name'] : '');
                      ?>
                    </td>
                    <td>
                      <?php echo $this->Html->link('<i class="btn btn-warning fa fa-gears pull-left"></i>', array('controller' => 'staffs', 'action' => 'upload_profile_mini', $event['Event']['id'], $staff['Staff']['id']), array('confirm' => 'Are you sure you wish to upload the trainer profile?', 'escape' => false, 'data-toggle' => 'ajaxModal', 'title' => 'Upload Trainer Profile')); ?>
                      <?php if (!empty($staff['Staff']['files'])) { ?>
                      <?php echo $this->Html->link('<i class="btn btn-success fa fa-user pull-left"></i>', '/attachments/' . $staff['Staff']['files'], array('confirm' => 'Are you sure you wish to print the trainer profile?', 'escape' => false, 'target' => '_blank', 'title' => 'Trainer Profile')); ?>
                      <?php 
                    } ?>
                    </td>
                  </tr>
                  <?php $trainerCount++; ?>
                <?php endforeach; ?>
                  <?php 
                } ?>
                <?php //endforeach; ?>
              </tbody>
            </table>
          </div>
        </section>
      </div>

      <div class="tab-pane padder <?php echo ($myActive == 'Nomination' ? 'active' : ''); ?>" id="Nomination">
        <h3><?php echo __('Nominated Participants'); ?></h3>
        <section class="panel panel-default">
          <div class="row wrapper">
            <div class="col-sm-5 m-b-xs">
              <div class="btn-group">
                <button type="button" data-toggle="tooltip" data-placement="top" title="" data-original-title="Refresh" class="btn btn-sm btn-default" title="Refresh" onclick ='location.reload();'><i class="fa fa-refresh"></i>&nbsp;&nbsp;Refresh</button>
              </div>
              <?php echo $this->Html->link(' Trainee List (.csv)', array('action' => 'export', $event['Event']['id'], $myCourse['Course']['code']), array('class' => 'btn btn-success fa fa-download', 'escape' => false)); ?>
              <?php echo $this->Html->link(' Trainee List (.xlsx)', array('action' => 'export_xls', $event['Event']['id'], $myCourse['Course']['code']), array('class' => 'btn btn-success fa fa-download', 'escape' => false)); ?>
              <?php echo $this->Html->link(' Trainee List (.xls)', array('action' => 'export_xls_2', $event['Event']['id'], $myCourse['Course']['code']), array('class' => 'btn btn-success fa fa-download', 'escape' => false)); ?>
            </div>
          </div>
          <div class="table-responsive">
            <table class="table table-striped b-t b-light">
              <thead>
                <tr>
                  <th> No </th>
                  <th><?php echo __('Staff No'); ?></th>
                  <th><?php echo __('NRIC'); ?></th>
                  <th><?php echo __('Name'); ?></th>
                  <th><?php echo __('Academic Qualification'); ?></th>
                  <th><?php echo __('Gender'); ?></th>
                  <th><?php echo __('Race'); ?></th>
                  <th><?php echo __('Trainee Designation'); ?></th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php if (!empty($myNominations)) { ?>
                <?php $iterate = 1; ?>
                <?php foreach ($myNominations as $eventAttendance) : ?>
                <?php if (isset($eventAttendance['EventAttendance']['staff_id'])) { ?>
                  <tr>
                    <?php 
                    $participant = $this->requestAction(
                      array(
                        'plugin' => 'rail_competency', 'controller' => 'staffs',
                        'action' => 'object', $eventAttendance['EventAttendance']['staff_id']
                      )
                    );

                    ?>
                    <td><?php echo $iterate; ?> </td>
                    <td>
                      <?php echo $participant['Staff']['staff_no']; ?>
                    </td>
                    <td>
                      <?php echo str_replace('-', '', $participant['Staff']['NRIC']); ?>
                    </td>
                    <td>
                      <?php echo $participant['Staff']['name']; ?>
                    </td>
                    <td>
                      <?php $myQualification = $this->requestAction('/rail_competency/staff_qualifications/myself/' . $eventAttendance['EventAttendance']['staff_id']); ?>
                      <?php echo (!empty($myQualification) ? $myQualification['StaffQualification']['certificate_name'] : ''); ?>
                    </td>
                    <td>
                      <?php echo (str_replace('-', '', $participant['Staff']['NRIC']) % 2 == 0 ? 'Female' : 'Male'); ?>
                    </td>
                    <td>
                      <?php echo $participant['Staff']['race']; ?>
                    </td>
                    <td>
                    <?php $myposition = $this->requestAction('/rail_competency/positions/object/' . $participant['Staff']['position_id']); ?>
                      <?php echo (!empty($myposition) ? $myposition['Position']['name'] : ''); ?>
                    </td>
                    <td>
                      <?php echo $this->Html->link(' Add', array('controller' => 'staff_qualifications', 'action' => 'create_qualification', $eventAttendance['EventAttendance']['staff_id'], $eventAttendance['EventAttendance']['event_id'], 'Nomination'), array('class' => 'fa fa-gears btn btn-danger', 'escape' => false, 'data-toggle' => 'ajaxModal')); ?>
                      <?php echo $this->Html->link(' Edit Race', array('controller' => 'staffs', 'action' => 'edit_race', $eventAttendance['EventAttendance']['staff_id'], $eventAttendance['EventAttendance']['event_id'], 'Nomination'), array('class' => 'fa fa-gears btn btn-warning', 'escape' => false, 'data-toggle' => 'ajaxModal')); ?>
                    </td>
                  </tr>
                <?php $iterate++; ?>
              <?php 
            } else { ?>
              <tr>
                <td colspan="4" style="text-align:center;">No staff profile records found</td>
              </tr>
              <?php 
            } ?>
              <?php endforeach; ?>
              <?php 
            } else { ?>
              <tr>
                <td colspan="4" style="text-align:center;">No staff profile records found</td>
              </tr>
              <?php 
            } ?>
              </tbody>
            </table>
            
          </div>
        </section>
      </div>

      <div class="tab-pane padder <?php echo ($myActive == 'Attendance' ? 'active' : ''); ?>" id="Attendance">
        <h3><?php echo __('Attended Participants'); ?></h3>
        <section class="panel panel-default">
          <div class="row wrapper">
            <div class="col-sm-9 m-b-xs">
              <div class="btn-group">
                <button type="button" data-toggle="tooltip" data-placement="top" title="" data-original-title="Refresh" class="btn btn-sm btn-default" title="Refresh" onclick ='location.reload();'><i class="fa fa-refresh"></i>&nbsp;&nbsp;Refresh</button>
              </div>
              <?php echo $this->Html->link(' Trainee List (.csv)', array('action' => 'export', $event['Event']['id'], $myCourse['Course']['code']), array('class' => 'btn btn-success fa fa-download', 'escape' => false)); ?>
              <?php echo $this->Html->link(' Trainee List (.xlsx)', array('action' => 'export_xls', $event['Event']['id'], $myCourse['Course']['code']), array('class' => 'btn btn-success fa fa-download', 'escape' => false)); ?>
              <?php echo $this->Html->link(' Trainee List (.xls)', array('action' => 'export_xls_2', $event['Event']['id'], $myCourse['Course']['code']), array('class' => 'btn btn-success fa fa-download', 'escape' => false)); ?>
            </div>
          </div>
          <div class="table-responsive">
            <table class="table table-striped b-t b-light">
              <thead>
                <tr>
                  <th> No </th>
                  <th><?php echo __('Staff No'); ?></th>
                  <th><?php echo __('NRIC'); ?></th>
                  <th><?php echo __('Name'); ?></th>
                  <th><?php echo __('Academic Qualification'); ?></th>
                  <th><?php echo __('Gender'); ?></th>
                  <th><?php echo __('Race'); ?></th>
                  <th><?php echo __('Trainee Designation'); ?></th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php if (!empty($myAttendances)) { ?>
                <?php $iterate = 1; ?>
                <?php foreach ($myAttendances as $eventAttendance) : ?>
                <?php if (isset($eventAttendance['EventAttendance']['staff_id'])) { ?>
                  <tr>
                    <?php 
                    $participant = $this->requestAction(
                      array(
                        'plugin' => 'rail_competency', 'controller' => 'staffs',
                        'action' => 'object', $eventAttendance['EventAttendance']['staff_id']
                      )
                    );

                    ?>
                    <td><?php echo $iterate; ?> </td>
                    <td>
                      <?php echo $participant['Staff']['staff_no']; ?>
                    </td>
                    <td>
                      <?php echo str_replace('-', '', $participant['Staff']['NRIC']); ?>
                    </td>
                    <td>
                      <?php echo $participant['Staff']['name']; ?>
                    </td>
                    <td>
                      <?php $myQualification = $this->requestAction('/rail_competency/staff_qualifications/myself/' . $eventAttendance['EventAttendance']['staff_id']); ?>
                      <?php echo (!empty($myQualification) ? $myQualification['StaffQualification']['certificate_name'] : ''); ?>
                    </td>
                    <td>
                      <?php echo (str_replace('-', '', $participant['Staff']['NRIC']) % 2 == 0 ? 'Female' : 'Male'); ?>
                    </td>
                    <td>
                      <?php echo $participant['Staff']['race']; ?>
                    </td>
                    <td>
                    <?php $myposition = $this->requestAction('/rail_competency/positions/object/' . $participant['Staff']['position_id']); ?>
                      <?php echo (!empty($myposition) ? $myposition['Position']['name'] : ''); ?>
                    </td>
                    <td>
                      <?php echo $this->Html->link(' Add', array('controller' => 'staff_qualifications', 'action' => 'create_qualification', $eventAttendance['EventAttendance']['staff_id'], $eventAttendance['EventAttendance']['event_id'], 'Attendance'), array('class' => 'fa fa-gears btn btn-danger', 'escape' => false, 'data-toggle' => 'ajaxModal')); ?>
                      <?php echo $this->Html->link(' Edit Race', array('controller' => 'staffs', 'action' => 'edit_race', $eventAttendance['EventAttendance']['staff_id'], $eventAttendance['EventAttendance']['event_id'], 'Attendance'), array('class' => 'fa fa-gears btn btn-warning', 'escape' => false, 'data-toggle' => 'ajaxModal')); ?>
                    </td>
                  </tr>
                <?php $iterate++; ?>
              <?php 
            } else { ?>
              <tr>
                <td colspan="4" style="text-align:center;">No staff profile records found</td>
              </tr>
              <?php 
            } ?>
              <?php endforeach; ?>
              <?php 
            } else { ?>
              <tr>
                <td colspan="4" style="text-align:center;">No staff profile records found</td>
              </tr>
              <?php 
            } ?>
              </tbody>
            </table>
            
          </div>
        </section>
      </div>

    </div>
  </article>
</section>
