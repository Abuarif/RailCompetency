<style type="text/css">
    table { page-break-inside:auto; }
    tr    { page-break-inside:avoid; page-break-after:auto }
    td    { word-wrap:break-word;white-space: normal; }
    thead { display:table-header-group }
    tfoot { display:table-footer-group }
    .badge {
    display: inline-block;
    min-width: 10px;
    padding: 3px 7px;
    font-size: 12px;
    font-weight: bold;
    line-height: 1;
    color: #fff;
    text-align: center;
    white-space: nowrap;
    vertical-align: baseline;
    background-color: #999;
    border-radius: 10px;
  }
  .bg-danger {
    background-color:red;
  }

</style>

<?php 
  // $max = $event['Course']['duration'];
  // echo 'duration: '.$max;
  // $max = abs(floor((strtotime($this->Time->format($event['Event']['start_date'], '%Y-%m-%d')) -  strtotime($this->Time->format($event['Event']['end_date'], '%Y-%m-%d')) )/(60*60*24))) + 1;

  $weekend = 0;
  if ($event['Event']['is_weekend']) {
    $weekend = 1;
  } 
  echo 'is_weekend: '.$weekend;
  $max = $this->requestAction('/rail_competency/events/getWorkingDays/'.$this->Time->format($event['Event']['start_date'], '%Y-%m-%d').'/'.$this->Time->format($event['Event']['end_date'], '%Y-%m-%d').'/'.$weekend);
  echo 'max: '.$max;
  
  $count = 1;
  if (!empty($event['EventAttendance']))
    if ($event['EventAttendance'][0]['is_enrolled']) {
  // if ($event['EventAttendance'][0]['is_enrolled'] && !$event['EventAttendance'][0]['is_completed']) {
    for ($day = 1; $day <= $max; $day++) {
      //echo 'my day '.$day;
?>
<?php if ($day != 1) { ?>
 	<div style="page-break-before:always;">
<?php } ?>

<table>
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

<table style="padding-top: 30px;" cellpadding="0" cellspacing="0">
  <tr style="text-align:center;">
    <td style="font-family: Arial, 'Helvetica Neue', Helvetica, sans-serif;font-size:24px;width:50%;">
      RAIL ACADEMY
    </td>
  </tr>
  <tr style="text-align:center;">
    <td style="background-color:black; color:white;font-family: Arial, 'Helvetica Neue', Helvetica, sans-serif;font-size:23px;width:50%;">
      TRAINING ATTENDANCE
    </td>
  </tr>
</table>
<br>

<table cellpadding="0" cellspacing="0">
  <tr style="height: 25px;">
    <td style=" width: 200px;vertical-align: text-top;font-weight:bold;">
      Course
    </td>
    <td style="width: 50px;vertical-align: text-top;font-weight:bold;">
      :
    </td>
    <td style="width: 1000px;vertical-align: text-top;">
      <?php 
        echo $event['Course']['name'] .'('. $event['Course']['code'] .') - DAY '.$day.'/'.$max;
        
        // $trainers = $this->requestAction(
        //  array('controller' => 'trainers', 
        //    'action' => 'object', $event['EventTrainer'][0]['trainer_id'])
        // );
      ?>
    </td>
  </tr>
  <tr style="height: 25px;">
    <td style=" width: 200px;vertical-align: text-top;font-weight:bold;">
      Class Date
    </td>
    <td style="width: 50px;vertical-align: text-top;font-weight:bold;">
      :
    </td>
    <td style="width: 1000px;vertical-align: text-top;">
      <?php 
        $start_date = $this->Time->format($event['Event']['start_date'], '%Y-%m-%d');
        $myDate = $this->requestAction('rail_competency/events/print_date/'.$start_date.'/'.$day);
        echo $myDate;
      ?>
    </td>
  </tr>
  <tr style="height: 25px;">
    <td style=" width: 200px;vertical-align: text-top;font-weight:bold;">
      Venue
    </td>
    <td style="width: 50px;vertical-align: text-top;font-weight:bold;">
      :
    </td>
    <td style="width: 1000px;vertical-align: text-top;">
      <?php echo $event['Venue']['name'].', '.$event['Venue']['location']; ?>
    </td>
  </tr>
  <tr style="height: 25px;">
    <td style=" width: 200px;vertical-align: text-top;font-weight:bold;">
      Course Date
    </td>
    <td style="width: 50px;vertical-align: text-top;font-weight:bold;">
      :
    </td>
    <td style="width: 1000px;vertical-align: text-top;">
      <?php if ($event['Course']['duration'] == 1 ) { ?>
        <?php echo $this->Time->format($event['Event']['start_date'], '%d %B %Y'); ?>
      <?php } else { ?>
        <?php echo $this->Time->format($event['Event']['start_date'], '%d').' - '.$this->Time->format($event['Event']['end_date'], '%d %B %Y'); ?>
      <?php } ?>
    </td>
  </tr>
  <tr style="height: 25px;">
    <td style=" width: 200px;vertical-align: text-top;font-weight:bold;">
      Time
    </td>
    <td style="width: 50px;vertical-align: text-top;font-weight:bold;">
      :
    </td>
    <td style="width: 1000px;vertical-align: text-top;">
      <?php echo $this->Time->format($event['Event']['start_date'], '%H:%M %p').' - '.$this->Time->format($event['Event']['end_date'], '%H:%M %p'); ?>
    </td>
  </tr>
  <tr style="height: 25px;">
    <td style=" width: 200px;vertical-align: text-top;font-weight:bold;">
      Trainer(s)
    </td>
    <td style="width: 50px;vertical-align: text-top;font-weight:bold;">
      :
    </td>
    <td style="width: 1000px;vertical-align: text-top;">
      <?php  if (!empty($event['EventTrainer'])) { ?>
        <?php foreach ($event['EventTrainer'] as $eventTrainer): ?>
          <?php 
              $trainers = $this->requestAction(
                array('controller' => 'trainers', 
                  'action' => 'object', $eventTrainer['trainer_id']));
              echo (!empty($trainers['Staff'])?$trainers['Staff']['name']:'');
              if ($eventTrainer['is_assist'] == 1) { 
                echo ' <span class="badge bg-danger">assist</span>';
              } 
          ?>
          <br/>
        <?php endforeach; ?>
      <?php }else{ ?>
        No related trainers record found
      <?php } ?>
    </td>
  </tr>
</table>
<br/>
<table style="border:0px; border-style: solid; border-color: #989898;text-align:left;" cellpadding="0" cellspacing="0">
  <thead>
    <tr>
      <th style="background-color: #BDBDBD; height:25px;width:5%;border:1px; border-style: solid; border-color: #989898;text-align:center;"><?php echo '#'; ?></th>
      <th style="background-color: #BDBDBD; height:25px;width:15%;border:1px; border-style: solid; border-color: #989898;text-align:center;"><?php echo 'ID No.'; ?></th>
      <th style="background-color: #BDBDBD; height:25px;width:400;border:1px; border-style: solid; border-color: #989898;">&nbsp;<?php echo 'Name'; ?></th>
      <th style="background-color: #BDBDBD; height:25px;width:20%;border:1px; border-style: solid; border-color: #989898;text-align:center;"><?php echo 'IC No.'; ?></th>
      <th style="background-color: #BDBDBD; height:25px;width:10%;border:1px; border-style: solid; border-color: #989898;text-align:center;"><?php echo 'Dept'; ?></th>
      <th style="background-color: #BDBDBD; height:25px;width:500;border:1px; border-style: solid; border-color: #989898;text-align:center;" width="1500px"><?php echo 'Sign'; ?></th>
    </tr>
  </thead>
  <tbody>
    <?php if(!empty($event['EventAttendance'])) { ?>
    <?php foreach ($event['EventAttendance'] as $eventAttendance): ?>
    <?php if (isset($eventAttendance['staff_id'])) { ?>
      <tr style="height:25px;">
        <?php 
          $participant = $this->requestAction(
            array('plugin' => 'rail_competency',  'controller' => 'staffs', 
              'action' => 'object', $eventAttendance['staff_id']));
           
        ?>
        <td style="width:5px;border:1px; border-style: solid; border-color: #989898;text-align:center;">
          &nbsp;<?php
            echo $count;
          ?>
        </td>
        <td style="width:15%;border:1px; border-style: solid; border-color: #989898;text-align:center;">
          &nbsp;<?php
            echo $participant['Staff']['staff_no'];
          ?>
        </td>
        <td style="width:40%;border:1px; border-style: solid; border-color: #989898;word-wrap:break-word; ">
          <span style="padding-left:5px; word-wrap:break-word;">
            <?php
              echo ucwords(strtolower($participant['Staff']['name']));
            ?>
          </span>
        </td>
        <td style="width:25%; border:1px; border-style: solid; border-color: #989898;text-align:center;">
          &nbsp;<?php
            echo $participant['Staff']['NRIC'];
          ?>
        </td>
        <td style="width:10%;border:1px; border-style: solid; border-color: #989898;text-align:center;">
          &nbsp;<?php
            echo $participant['Staff']['org_code'];
          ?>
        </td>
        <td style="border:1px; border-style: solid; border-color: #989898;color:#ffffff;">
          asasdasda
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
        <td style="width:100px;">
        </td>
        <td style="width:100px;">
        </td>
        <td style="width:100px;">
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
            

<!-- end loop by date -->
<?php if ($day != 1) { ?>
  </div>
  <!-- end of break -->
<?php } ?> 
<!-- end of loop -->
<?php } $count=1;?>
<?php } ?>
              