
<style>

/* style sheet for "A4" printing */
 /*@media print and (width: 21cm) and (height: 29.7cm) {
    @page .print-landscape-a4 {
       margin: 3cm;
       size: A4 landscape;
    }
 }*/
@page {
    size: A4 landscape; /* can use also 'landscape' 'portrait' for orientation */
    margin-top: 10.0mm;
    margin-right: 20.0mm;
    margin-left: 20.0mm;
    margin-bottom: 10.0mm;

   /* @bottom-center {
            content: element(footer);
    }

    @top-center {
            content: element(header);
    }*/
  }

#parent{
    height: 100%;
    width: 100%;
    overflow: hidden;
    position: relative;
}

#child{
    position: absolute;
    top: 0;
    bottom: 0;
    left: 0;
    right: -17px; /* Increase/Decrease this value for cross-browser compatibility */
    overflow-y: scroll;
}

</style>

<style type="text/css">
   table { page-break-inside:auto }
   tr    { page-break-inside:avoid; page-break-after:auto }

</style>

<script>
  // window.print(); 
  setTimeout(function () { window.print(); }, 500);
  window.onfocus = function () { setTimeout(function () { window.close(); }, 500); }
</script>


<!-- loop by date -->

<table style="width:100%;" cellpadding="0" cellspacing="0">
  <tr style="text-align:center;">
  <tr>
    <td style="width: 50%;text-align: left;">
      <?php echo $this->Html->image('http://'.$_SERVER['SERVER_NAME'].Router::url('/')."theme/LamanPuteri/images/prasarana_ico.png", array('height'=> '24', 'width'=>'24')); ?>
      <?php echo $this->Html->image('http://'.$_SERVER['SERVER_NAME'].Router::url('/')."theme/LamanPuteri/images/prasarana_logo_icon.png", array('height'=> '24', 'width'=>'140')); ?>
    </td>
    <td style="width: 50%;text-align: right;">
      APPENDIX 1
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
      NOMINATION LIST
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
                  echo 'Course Title:     '.$str.' ('.$event['Course']['code'].')';
                  // echo 'Course Title:     '.ucwords($cont).' ('.$event['Course']['code'].')';
                ?> 
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
                      <?php 
                        $datediff = floor((strtotime($this->Time->format($event['Event']['start_date'], '%Y-%m-%d')) -  strtotime($this->Time->format($event['Event']['end_date'], '%Y-%m-%d')) )/(60*60*24));
                      ?>
                      <?php if ($datediff == 0 ) { ?>
                        <?php echo $this->Time->format($event['Event']['start_date'], '%d %B %Y'); ?>
                      <?php } else { ?>
                        <?php 
                          if ( $this->Time->format($event['Event']['start_date'], '%Y') == $this->Time->format($event['Event']['end_date'], '%Y')
                            ) {
                            if ( $this->Time->format($event['Event']['start_date'], '%B') == $this->Time->format($event['Event']['end_date'], '%B')
                              ) {
                              echo $this->Time->format($event['Event']['start_date'], '%d').' - '.$this->Time->format($event['Event']['end_date'], '%d %B %Y');
                            } else {
                              echo $this->Time->format($event['Event']['start_date'], '%d %B').' - '.$this->Time->format($event['Event']['end_date'], '%d %B %Y');
                            }
                          } else {
                            echo $this->Time->format($event['Event']['start_date'], '%d %B %Y').' - '.$this->Time->format($event['Event']['end_date'], '%d %B %Y');
                          } 
                        ?>
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
                         </td>
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
                      <th style="width:60px;"><?php echo 'Position'; ?></th>
                      <th style="width:50px;"><?php echo 'Qualification'; ?></th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php if(!empty($attendees)) { ?>
                    <?php $count = 1; ?>
                    <?php foreach ($attendees as $eventAttendance): ?>
                    <?php if (isset($eventAttendance['EventAttendance']['staff_id'])) { ?>
                      <tr>
                        <?php 
                          $participant = $this->requestAction(
                            array('plugin' => 'rail_competency',  'controller' => 'staffs', 
                              'action' => 'object', $eventAttendance['EventAttendance']['staff_id']));
                           
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
                            $position = $this->requestAction('/rail_competency/positions/object/'.$participant['Staff']['position_id']);
                            echo $position['Position']['name'];
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


