
<style>


@page {
    size: A4 portrait;  
    /*can use also 'landscape' 'portrait' for orientation */
    margin-top: 10.0mm;
    margin-right: 7.0mm;
    margin-left: 7.0mm;
    margin-bottom: 10.0mm;

  }



</style>


<script>
  // window.print(); 
  setTimeout(function () { window.print(); }, 500);
  window.onfocus = function () { setTimeout(function () { window.close(); }, 500); }
</script>

<!-- loop by date -->
<?php 
  // $max = $event['Course']['duration'];
  // echo 'duration: '.$max;
  // $max = abs(floor((strtotime($this->Time->format($event['Event']['start_date'], '%Y-%m-%d')) -  strtotime($this->Time->format($event['Event']['end_date'], '%Y-%m-%d')) )/(60*60*24))) + 1;

  // echo 'max: '.$max;
  $max = $this->requestAction('/rail_competency/events/getWorkingDays/'.$this->Time->format($event['Event']['start_date'], '%Y-%m-%d').'/'.$this->Time->format($event['Event']['end_date'], '%Y-%m-%d'));
  // echo 'max: '.$max;
  $count = 1;
  if (!empty($event['EventAttendance']))
    if ($event['EventAttendance'][0]['is_enrolled']) {
  // if ($event['EventAttendance'][0]['is_enrolled'] && !$event['EventAttendance'][0]['is_completed']) {
    for ($day = 1; $day <= $max; $day++) {
      //echo 'my day '.$day;
?>
<?php if ($day != 1) { ?>
 <!-- <div class="page-break"></div> -->
<?php } ?>


<table style="width:100%;" cellpadding="0" cellspacing="0">
  <tr style="text-align:center;">
  <tr>
    <td style="width: 50%;text-align: left;">
      <?php echo $this->Html->image('http://'.$_SERVER['SERVER_NAME'].Router::url('/')."theme/LamanPuteri/images/prasarana_ico.png", array('height'=> '24', 'width'=>'24')); ?>
      <?php echo $this->Html->image('http://'.$_SERVER['SERVER_NAME'].Router::url('/')."theme/LamanPuteri/images/prasarana_logo_icon.png", array('height'=> '24', 'width'=>'140')); ?>
    </td>
    <td style="width: 50%;text-align: right;">
      RR/RAD/FM-02 Rev:0
    </td>
  </tr>
</table>

<table style="width:100%;" cellpadding="0" cellspacing="0">
  <tr style="text-align:center;">
    <td style="font-family: Arial, 'Helvetica Neue', Helvetica, sans-serif;font-size:24px;width:50%;">
      RAIL ACADEMY
    </td>
  </tr>
  <tr style="text-align:center;">
    <td style="font-family: Arial, 'Helvetica Neue', Helvetica, sans-serif;font-size:23px;width:50%;">
      TRAINING ATTENDANCE
    </td>
  </tr>
</table>
<br>

<!-- <section class="panel panel-default"> -->
  <!-- <article class="scrollable">
    <div class="panel-body">
      <div class="tab-content"> -->
        
        <!-- <div class="tab-pane padder active" id="dashboard">
          <section class="scrollable wrapper"> -->
            <section class="panel panel-default pos-rlt clearfix">
              <header class="panel-heading">
                <?php 
                  $str = $event['Course']['name'];
                  $cont =  strtolower($str); 
                  echo 'Course Title:     '.$str.' ('.$event['Course']['code'].') - DAY '.$day.'/'.$max;
                  // echo 'Course Title:     '.ucwords($cont).' ('.$event['Course']['code'].')';
                ?> 
                <div class="pull-right">
                  <?php 
                    $start_date = $this->Time->format($event['Event']['start_date'], '%Y-%m-%d');
                    $myDate = $this->requestAction('rail_competency/events/print_date/'.$start_date.'/'.$day);
                    echo $myDate;
                  ?>
                </div>
              </header>
              <div class="panel-body clearfix">
                <table width="100%">
                  <tr>
                    <td style="height:25px;;font-weight:bold;">
                      Venue
                    </td>
                    <td style="height:25px;;font-weight:bold;">
                      Date
                    </td>
                    <td style="height:25px;;font-weight:bold;">
                      Time
                    </td>
                  </tr>
                  <tr>
                    <td style="height:25px;">
                      <?php echo $event['Venue']['name'].', '.$event['Venue']['location']; ?>
                    </td>
                    <td style="height:25px;">
                      <?php if ($event['Course']['duration'] == 1 ) { ?>
                        <?php echo $this->Time->format($event['Event']['start_date'], '%d %B %Y'); ?>
                      <?php } else { ?>
                        <?php echo $this->Time->format($event['Event']['start_date'], '%d').' - '.$this->Time->format($event['Event']['end_date'], '%d %B %Y'); ?>
                      <?php } ?>
                    </td>
                    <td style="height:25px;">
                      <?php echo $this->Time->format($event['Event']['start_date'], '%H:%M %p').' - '.$this->Time->format($event['Event']['end_date'], '%H:%M %p'); ?>
                    </td>
                  </tr>
                </table>
              </div>
            </section>

            <section class="panel panel-default pos-rlt clearfix">
              <header class="panel-heading">
                Trainers
              </header>
              <div class="panel-body clearfix">
                <table width="100%">
                  <tr>
                    
                  <?php  if (!empty($event['EventTrainer'])) { ?>
                    <?php foreach ($event['EventTrainer'] as $eventTrainer): ?>
                      <?php 
                          $trainers = $this->requestAction(
                            array('controller' => 'trainers', 
                              'action' => 'object', $eventTrainer['trainer_id']));

                          ?>
                      <tr>
                        
                        <td><?php
                          echo (!empty($trainers['Staff'])?$trainers['Staff']['name']:'');
                          ?>
                          <?php if ($eventTrainer['is_assist'] != 1) { ?>
                            <i class="fa fa-star text-danger"></i>
                           <?php } ?>
                      </tr>
                    <?php endforeach; ?>
                    <?php }else{ ?>
                    <tr>
                      <td colspan="3" style="text-align:center;">No related trainers records found</td>
                    </tr>
                    <?php } ?>
                </table>
              </div>
            </section>
            
            <section class="panel panel-default pos-rlt clearfix">
              <div class="table-responsive">

                <table class="table table-striped b-t b-light">
                  <thead>
                    <tr>
                      <th style="width:30px;"><?php echo '#'; ?></th>
                      <th style="width:80px;"><?php echo 'ID No.'; ?></th>
                      <th style="width:100px;"><?php echo 'Name'; ?></th>
                      <th style="width:100px;"><?php echo 'IC No.'; ?></th>
                      <th style="width:60px;"><?php echo 'Dept'; ?></th>
                      <th style="width:50px;"><?php echo 'Sign'; ?></th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php if(!empty($event['EventAttendance'])) { ?>
                    <?php foreach ($event['EventAttendance'] as $eventAttendance): ?>
                    <?php if (isset($eventAttendance['staff_id'])) { ?>
                      <tr>
                        <?php 
                          $participant = $this->requestAction(
                            array('plugin' => 'rail_competency',  'controller' => 'staffs', 
                              'action' => 'object', $eventAttendance['staff_id']));
                           
                        ?>
                        <td>
                          <?php
                            echo $count;
                          ?>
                        </td>
                        <td>
                          <?php
                            echo $participant['Staff']['staff_no'];
                          ?>
                        </td>
                        <td>
                          <?php
                            echo ucwords(strtolower($participant['Staff']['name']));
                          ?>
                        </td>
                        <td style="width:100px;">
                          <?php
                            echo $participant['Staff']['NRIC'];
                          ?>
                        </td>
                        <td>
                          <?php
                            echo $participant['Staff']['org_code'];
                          ?>
                        </td>
                        <td style="width:50px;">
                          &nbsp;
                        </td>
                    </tr>
                    
                  <?php }else{ ?>
                  <tr>
                    <td colspan="4" style="text-align:center;">No staff profile records found</td>
                  </tr>
                  <?php } 
                  $count++; 
                  ?>
                  <?php endforeach; $count =1;?>
                  <?php for ($iterate = 0; $iterate < 3; $iterate++) { ?>
                      <tr>
                        <td>
                        </td>
                        <td>
                        </td>
                        <td>
                        </td>
                        <td style="width:100px;">
                        </td>
                        <td>
                          &nbsp;
                        </td>
                        <td style="width:50px;">
                          &nbsp;
                        </td>
                    </tr>
                    <?php } // end for extra lines?> 
                  <?php }else{ ?>
                  <tr>
                    <td colspan="4" style="text-align:center;">No staff profile records found</td>
                  </tr>
                  <?php } ?>
                  </tbody>
                </table>
                </div>
            </section>

<!-- end loop by date -->
<?php if ($day != 1) { ?>
  </div>
  <!-- end of break -->
<?php } ?> 
<!-- end of loop -->
<?php } $count=1;?>
<?php } ?>
              