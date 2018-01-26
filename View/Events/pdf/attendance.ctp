<?php

  // echo $this->Html->css(array(
  //     '../theme/LamanPuteri/css/bootstrap.css',
  //     '../theme/LamanPuteri/css/animate.css',
  //     '../theme/LamanPuteri/css/font-awesome.min.css',
  //     '../theme/LamanPuteri/css/font.css',
  //     '../js/fuelux/fuelux.css',
  //     '../theme/LamanPuteri/js/datepicker/datepicker.css',
  //     '../theme/LamanPuteri/css/datetimepicker/bootstrap-datetimepicker.css',
  //     '../theme/LamanPuteri/js/fullcalendar/fullcalendar.css',
  //     '../theme/LamanPuteri/js/fullcalendar/theme.css',
  //     '../theme/LamanPuteri/js/datatables/datatables.css',
  //     '../theme/LamanPuteri/css/app.css',

  // ));
  
?>

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
  <li><a href="<?php echo $this->webroot; ?>/rail_competency/events"><i class="fa fa-book"></i> Event List</a></li>
  <li class="active">Training Session Management</li>
</ul>
<div class="m-b-md">
  <h3 class="m-b-none">Training Session Management</h3>
</div>

<?php 
  if (!empty($this->request->named))
    $myActive = $this->request->named['tab'];
  else
    $myActive='dashboard';
?>
<?php 
  // count empty variable; 1. $event['Venue']['id'], 2. EventAttendance, 3. EventMemo, 4. EventTrainer
// $actionCount = 0;
// (!empty($event['Venue']['id']) ?: $actionCount++);
// (!empty($event['EventMemo']) && count($event['EventAttendance']) > 0 ?: $actionCount++);
// (!empty($event['EventTrainer']) ?: $actionCount++);
// ($event['Event']['active'] == 1 ?: $actionCount++);

?>
<section class="panel panel-default">
  <header class="panel-heading text-right bg-light dker bg-gradient" style="height:auto">
    <ul class="nav nav-tabs pull-left">
      <li <?php echo ($myActive=='dashboard'?'class="active"':''); ?> ><a href="#dashboard" data-toggle="tab">Dashboard</a></li>
      <li <?php echo ($myActive=='Participants'?'class="active"':''); ?> ><a href="#participants" data-toggle="tab">Attendance Sheet</a></li>
      <!-- <li <?php echo ($myActive=='Participants2'?'class="active"':''); ?> ><a href="#participants2" data-toggle="tab">Attendance Sheet (daily modal)</a></li> -->
      <!-- <li <?php echo ($myActive=='Results'?'class="active"':''); ?> ><a href="#results" data-toggle="tab">Attendance Sheet</a></li> -->
    </ul>
    <span class="hidden-sm">
      <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-cog text-default"></i> Options <b class="caret"></b></a>
      <ul class="dropdown-menu pull-right">
               
        <li>
          <?php echo $this->Html->link('<i class="fa fa-users pull-left"></i>&nbsp;&nbsp;Nomination Form', array('controller' => 'event_attendances', 'action' => 'nominate', $event['Event']['id']), array('escape' => false)); ?>
        </li>
        <li>
          <?php echo $this->Html->link('<i class="fa fa-print pull-left"></i>Print Sheet', array('controller' => 'events', 'action' => 'attendance_2', $event['Event']['id'].'.pdf'), array('confirm' => 'Are you sure you wish to print the attendance sheet?', 'escape' => false, 'target' => '_blank')); ?>
        </li>
        <li>
          <?php echo $this->Form->postLink('<i class="fa fa-cloud-download pull-left"></i>Download TCN', array('controller' => 'events', 'action' => 'tcn', $event['Event']['id'].'.pdf'), array('target' => '_blank', 'escape' => false, 'confirm' => 'Are you sure you wish to download the TCN?')); ?>
        </li>       
        <li>
          <?php echo $this->Html->link('<i class="fa fa-envelope pull-left"></i>Email TCN', array('controller' => 'events', 'action' => 'email_tcn', $event['Event']['id']), array('data-toggle'=>'ajaxModal', 'confirm' => 'Are you sure you wish to email the training completion notes?', 'escape' => false)); ?>
        </li>       
        <li>
          <?php echo $this->Html->link('<i class="fa fa-envelope pull-left"></i>Email me', array('controller' => 'events', 'action' => 'email_my_tcn', $event['Event']['id']), array('confirm' => 'Are you sure you wish to email the training completion notes?', 'escape' => false)); ?>
        </li> 
        <li>
          <?php echo $this->Form->postLink('<i class="fa fa-cloud-download pull-left"></i>Download Result', array('controller' => 'events', 'action' => 'training_result', $event['Event']['id'].'.pdf'), array('target' => '_blank', 'escape' => false, 'confirm' => 'Are you sure you wish to download the training result?')); ?>
        </li>
        <li>
          <?php echo $this->Html->link('<i class="fa fa-tachometer pull-left"></i>Email Me TR', array('controller' => 'events', 'action' => 'email_my_training_result', $event['Event']['id']), array('escape' => false, 'confirm' => 'Are you sure you wish to email this training result?')); ?>
        </li>       
              
      </ul>
    </span>
  </header>
  <article class="scrollable">
    <div class="panel-body">
      <div class="tab-content">

        <div class="tab-pane padder <?php echo ($myActive=='dashboard'?'active':''); ?>" id="dashboard">
          <section class="scrollable wrapper">
            <section class="panel panel-default pos-rlt clearfix">
              <header class="panel-heading">
                <ul class="nav nav-pills pull-right">
                  <li>
                    <a href="#" class="panel-toggle text-muted active"><i class="fa fa-caret-down text-active"></i><i class="fa fa-caret-up text"></i></a>
                  </li>
                </ul>
                <?php 
                  $str = $event['Course']['name'];
                  $cont =  strtolower($str); 
                  echo ucwords($cont).' ('.$event['Course']['code'].')';
                ?> 
              </header>
              <div class="panel-body clearfix collapse">
                <table width="100%">
                  <tr>
                    <td style="width:7%;height:25px;">
                      Venue
                    </td>
                    <td style="width:2%;height:25px;">
                      :
                    </td>
                    <td>
                      <?php echo h($event['Venue']['name']); ?>
                    </td>
                  </tr>
                  <tr>
                    <td style="height:25px;">
                      Location
                    </td>
                    <td style="height:25px;">
                      :
                    </td>
                    <td>
                      <?php echo h($event['Venue']['location']); ?>
                    </td>
                  </tr>
                  <tr>
                    <td style="height:25px;">
                      Details
                    </td>
                    <td style="height:25px;">
                      :
                    </td>
                    <td>
                      <?php echo $event['Course']['details']; ?>
                    </td>
                  </tr>
                </table>
              </div>
            </section>

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

            <div class="row">
              <div class="col-sm-6 portlet">
                <section class="panel panel-default portlet-item">
                  <header class="panel-heading">
                    Participants
                  </header>
                  <div class="panel-body text-center">
                    <h4><?php echo count($event['EventAttendance']).':'.$event['Course']['pax']; ?></h4>
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
                    <h4><?php echo count($event['EventTrainer']); ?></h4>
                    <span style="font-size:60px;"><i class="fa fa-user text-success"></i></span>
                  </div>
                </section>
              </div>
            </div>
            
          </section>
        </div>

        <div class="tab-pane padder <?php echo ($myActive=='Participants'?'active':''); ?>" id="participants">
          <h3><?php echo __('Attendance Sheet'); ?></h3>
          <section class="panel panel-default">
            <div class="row wrapper">
              <div class="col-sm-5 m-b-xs">
                <div class="btn-group">
                  <button type="button" data-toggle="tooltip" data-placement="top" title="" data-original-title="Refresh" class="btn btn-sm btn-default" title="Refresh" onclick ='location.reload();'><i class="fa fa-refresh"></i>&nbsp;&nbsp;Refresh</button>
                </div>
              </div>
              <div class="col-sm-4 m-b-xs"></div>
            </div>
            <div class="table-responsive">
              <table class="table table-striped b-t b-light">
                <thead>
                  <tr>
                    <th> # </th>
                    <th><?php echo __('Name'); ?></th>
                    <?php 
                        if (!empty($event['EventAttendance']))
                          if ($event['EventAttendance'][0]['is_enrolled']) {
                          for ($day = 1; $day <= $max; $day++) {
                      ?>
                    <th class="text-center sorting"> 
                      <?php echo $this->Html->link(' Day '. $day, array('controller' => 'event_attendance_details', 'action' => 'daily_update', $event['Event']['id'], $day), array('data-toggle' => 'ajaxModal', 'escape' => true, 'class' => 'btn-xs fa fa-users', 'style' => 'color:orange')); ?>
                    </th>
                    <?php } }?>
                    <th class="text-center sorting">
                      <?php echo $this->Html->link(' Completed', array('controller' => 'event_attendances', 'action' => 'course_update', $event['Event']['id']), array('data-toggle' => 'ajaxModal', 'escape' => true, 'class' => 'btn-xs fa fa-folder-open-o', 'style' => 'color:red'));
                      ?>
                    </th>
                    <?php if ($event['Course']['external'] == 0) { ?>
                      <th class="text-center sorting"><?php echo __('Student Evaluation'); ?></th>
                    <?php } ?>
                  </tr>
                </thead>
                <tbody>
                  <?php if(!empty($event['EventAttendance'])) { ?>
                  <?php $count = 1; ?>
                  <?php foreach ($event['EventAttendance'] as $eventAttendance): ?>
                  <?php if (isset($eventAttendance['staff_id'])) { ?>
                    <tr>
                    <td> <?php echo $count; $count++; ?> </td>
                      <?php 
                        $participant = $this->requestAction(
                          array('plugin' => 'rail_competency',  'controller' => 'staffs', 
                            'action' => 'object', $eventAttendance['staff_id']));
                         
                      ?>
                      <td>
                      <?php
                        echo $participant['Staff']['name'].'('. $participant['Staff']['staff_no'].')';
                      ?>
                    </td>
                    <?php if ($eventAttendance['is_enrolled'] == 1) { ?>
                      <!-- <td class="text-center sorting"><button class="btn btn-xs btn-success" style="width: 25px; height: 25px;"><i class='fa fa-check'></i></button></td> -->
                    <?php } else { ?>
                      <!-- <td class="text-center sorting"><button class="btn btn-xs btn-danger" style="width: 25px; height: 25px;"><i class='fa fa-times'></i></button></td> -->
                    <?php } ?>

                    <?php if ($eventAttendance['active'] == 1) { ?>
                      <!-- <td class="text-center sorting"><button class="btn btn-xs btn-success" style="width: 25px; height: 25px;"><i class='fa fa-check'></i></button></td> -->
                    <?php } else { ?>
                      <!-- <td class="text-center sorting"><button class="btn btn-xs btn-danger" style="width: 25px; height: 25px;"><i class='fa fa-times'></i></button></td> -->
                    <?php } ?>

                    <?php 
                      // $max = $event['Course']['duration'];
                      if ($eventAttendance['is_enrolled']) {
                      // if ($eventAttendance['is_enrolled'] && !$eventAttendance['is_completed']) {
                        for ($day = 1; $day <= $max; $day++) {
                          //echo 'my day '.$day;
                    ?>
                    <td class="text-center sorting">
                      <?php 
                      // Get Attendance details
                      $myAttendanceDetail = $this->requestAction('/rail_competency/event_attendance_details/detail/'.$event['Event']['id'].'/'.$participant['Staff']['id'].'/'. $day);
                      // echo '/rail_competency/event_attendance_details/detail/'.$event['Event']['id'].'/'.$eventAttendance['staff_id'].'/'. $day;
                      // print_r($myAttendanceDetail);
                      ?>
                      <?php 
                        if (!empty($myAttendanceDetail)) {
                          if($myAttendanceDetail['EventAttendanceDetail']['active'] == 1 && $myAttendanceDetail['EventAttendanceDetail']['day'] == $day) {
                      ?>
                        
                      <!-- <i class='fa fa-check-square-o bg-success btn btn-default' style='color:#fff; width:25px; height:25px;padding:5px'></i>    -->
                      <?php 
                            echo $this->Form->postLink('', array('controller' => 'event_attendance_details', 'action' => 'daily', $event['Event']['id'], $eventAttendance['id'], $eventAttendance['staff_id'], $day, 0, $myAttendanceDetail['EventAttendanceDetail']['id']), array('class'=>'btn btn-xs btn-default fa fa-check-square-o bg-success', 'style'=>'color:#000;width:25px; height:25px; padding-top:5px','data-toggle'=>'tooltip', 'data-placement'=>'left', 'title'=>'Cancel Attendance: Day '.$day, 'escape' => false, 'confirm' => 'Are you sure you sure?')); ?>
                      <?php //echo 'current day '.$day;
                          } else {
                            echo $this->Form->postLink('', array('controller' => 'event_attendance_details', 'action' => 'daily', $event['Event']['id'], $eventAttendance['id'], $eventAttendance['staff_id'], $day, 1,  $myAttendanceDetail['EventAttendanceDetail']['id']), array('class'=>'btn btn-xs btn-default fa fa-check-square-o', 'style'=>'color:#000;width:25px; height:25px; padding-top:5px','data-toggle'=>'tooltip', 'data-placement'=>'left', 'title'=>'Confirmed Attendance: Day '.$day, 'escape' => false, 'confirm' => 'Are you sure you sure?'));
                          }
                        } else { ?>
                        <?php 
                            echo $this->Form->postLink('', array('controller' => 'event_attendance_details', 'action' => 'daily', $event['Event']['id'], $eventAttendance['id'], $eventAttendance['staff_id'], $day, 2), array('class'=>'btn btn-xs btn-default fa fa-check-square-o', 'style'=>'color:#000;width:25px; height:25px; padding-top:5px','data-toggle'=>'tooltip', 'data-placement'=>'left', 'title'=>'Confirmed Attendance: Day '.$day, 'escape' => false, 'confirm' => 'Are you sure you sure?')); ?>
                      <?php } //not empty myAttendanceDetail
                      $myAttendanceDetail = array();
                          } //end for ?>
                    &nbsp;
                    <?php } else { ?>
                      <i class='fa fa-check-square-o bg-success btn btn-default' style='color:#fff; width:25px; height:25px;padding:5px'></i>&nbsp;Completed
                    <?php } //end is_enrolled ?>
                    </td>
                
                    <?php if ($eventAttendance['is_completed'] == 1) { ?>
                      <td class="text-center sorting">
                        <?php if ($event['Course']['external'] == 1) { ?>
                          <?php echo $this->Html->link('', array('controller' => 'staff_training_profiles', 'action' => 'delete_record_external', $eventAttendance['staff_id'], $event['Course']['id'], $event['Event']['id'], $eventAttendance['id']), array('class'=>'btn btn-xs btn-success fa fa-check', 'style'=>'color:#000;width:25px; height:25px; padding-top:5px','data-toggle'=>'tooltip', 'data-placement'=>'right', 'escape' => false)); ?>
                        <?php } else { ?>
                          <?php echo $this->Html->link('', array('controller' => 'event_attendances', 'action' => 'incomplete_course', $eventAttendance['id'], $event['Event']['id']), array('class'=>'btn btn-xs btn-success fa fa-check', 'style'=>'color:#000;width:25px; height:25px; padding-top:5px', 'escape' => false)); ?>
                        <?php } ?>
                      </td>
                    <?php } else { ?>
                      <td class="text-center sorting">
                        <?php if ($event['Course']['external'] == 1) { ?>
                          <?php echo $this->Html->link('', array('controller' => 'staff_training_profiles', 'action' => 'add_record_external', $eventAttendance['staff_id'], $event['Course']['id'], $event['Event']['id'], $eventAttendance['id']), array('class'=>'btn btn-xs btn-danger fa fa-times', 'style'=>'color:#000;width:25px; height:25px; padding-top:5px', 'data-toggle'=>'ajaxModal', 'escape' => false)); ?>
                        <?php } else { ?>
                          <?php echo $this->Html->link('', array('controller' => 'event_attendances', 'action' => 'complete_course', $eventAttendance['id'], $event['Event']['id']), array('class'=>'btn btn-xs btn-danger fa fa-times', 'style'=>'color:#000;width:25px; height:25px; padding-top:5px', 'escape' => false)); ?>
                        <?php } ?>
                      </td>
                    <?php } ?>
                    <?php if ($event['Course']['external'] == 0) { ?>
                      <td class="text-center sorting">
                        <?php if ($eventAttendance['has_submitted'] == 0) { ?>
                        <?php echo $this->Html->link('', array('controller' => 'staff_training_profiles', 'action' => 'add_record', $eventAttendance['staff_id'], $event['Course']['id'], $event['Event']['id'], $eventAttendance['id']), array('class'=>'btn btn-xs btn-info fa fa-plus', 'style'=>'color:#000;width:25px; height:25px; padding-top:5px','data-toggle'=>'tooltip', 'data-placement'=>'right', 'title'=>'Add student evaluation', 'data-toggle'=>'ajaxModal', 'escape' => false)); ?>
                        <?php } else { ?>
                        <?php $myProfile = $this->requestAction('/rail_competency/staff_training_profiles/get_result/'.$eventAttendance['staff_id'].'/'.$event['Event']['id']);?>
                          <?php if (!empty($myProfile)) { ?>
                            <?php echo $this->Html->link('', array('controller' => 'staff_training_profiles', 'action' => 'edit_record', $eventAttendance['staff_id'], $event['Course']['id'], $event['Event']['id'], $eventAttendance['id']), array('class'=>'btn btn-xs btn-warning fa fa-pencil', 'style'=>'color:#000;width:25px; height:25px; padding-top:5px','data-toggle'=>'tooltip', 'data-placement'=>'right', 'title'=>'Edit student evaluation', 'data-toggle'=>'ajaxModal', 'escape' => false)); ?>
                            <?php echo $this->Html->link('', array('controller' => 'staff_training_profiles', 'action' => 'print_record', $myProfile['StaffTrainingProfile']['id']), array('class'=>'btn btn-xs btn-success fa fa-print', 'style'=>'color:#000;width:25px; height:25px; padding-top:5px','data-toggle'=>'tooltip', 'data-placement'=>'right', 'title'=>'Print student evaluation', 'target'=>'_blank', 'escape' => false)); ?>
                          <?php } ?>
                        <?php } ?>  
                      </td>
                    <?php } ?>
                  </tr>
                <?php }else{ ?>
                <tr>
                  <td colspan="4" style="text-align:center;">No staff profile records found</td>
                </tr>
                <?php } ?>
                <?php endforeach; ?>
                <?php }else{ ?>
                <tr>
                  <td colspan="4" style="text-align:center;">No staff profile records found</td>
                </tr>
                <?php } ?>
                </tbody>
              </table>
              <footer class="panel-footer">
                <div class="row">
                  <div class="col-lg-6" style="text-align:right;">                
                    &nbsp;
                  </div>
                </div>
              </footer>
            </div>
          </section>
        </div>

    </div>
  </article>
</section>

<script type="text/javascript">
    $(document).ready(function () {
        $('#saveForm').submit(function(){
            var formData = $(this).serialize();
            var formUrl = $(this).attr('action');
            $.ajax({
                type: 'POST',
                url: formUrl,
                data: formData,
                success: function(data,textStatus,xhr){
                        alert(data);
                },
                error: function(xhr,textStatus,error){
                        alert(textStatus);
                }
            }); 
            return false;
        });
    });
</script>
