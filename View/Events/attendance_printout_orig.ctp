
<style>

/* style sheet for "A4" printing */
 @media print and (width: 21cm) and (height: 29.7cm) {
    @page .print-landscape-a4 {
       margin: 3cm;
       size: A4 landscape;
    }
 }
 
</style>
<script>
  window.print(); 

</script>
<!-- <link rel="stylesheet" type="text/css" href="bootstrap.min.css"> -->
<?php
  // echo $this->Html->css(array(
  //     '../theme/LamanPuteri/css/bootstrap.min.css',
  // ));
    
?>
<section class="panel panel-default">
  <article class="scrollable">
    <div class="panel-body">
      <div class="tab-content">
        
        <div class="tab-pane padder active" id="dashboard">
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
                      <?php echo $this->Time->format($event['Event']['start_date'], '%d').' - '.$this->Time->format($event['Event']['end_date'], '%d %B %Y'); ?>
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
                <ul class="nav nav-pills pull-right">
                  <li>
                    <a href="#" class="panel-toggle text-muted active"><i class="fa fa-caret-down text-active"></i><i class="fa fa-caret-up text"></i></a>
                  </li>
                </ul>
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
                      <th><?php echo __('#'); ?></th>
                      <th><?php echo __('ID No.'); ?></th>
                      <th><?php echo __('Name'); ?></th>
                      <th><?php echo __('Dept'); ?></th>
                      <?php 
                          $max = $event['Course']['duration'];
                          $count = 1;
                          if (!empty($event['EventAttendance']))
                            if ($event['EventAttendance'][0]['is_enrolled']) {
                          // if ($event['EventAttendance'][0]['is_enrolled'] && !$event['EventAttendance'][0]['is_completed']) {
                            for ($day = 1; $day <= $max; $day++) {
                              //echo 'my day '.$day;
                        ?>
                      <th class="text-center sorting"><?php echo 'Day '. $day; ?></th>
                      <?php } }?>
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
                            echo $participant['Staff']['name'];
                          ?>
                        </td>
                        <td>
                          <?php
                            echo $participant['Staff']['org_code'];
                          ?>
                        </td>

                        <?php 
                          $max = $event['Course']['duration'];
                          if ($eventAttendance['is_enrolled']) {
                          // if ($eventAttendance['is_enrolled'] && !$eventAttendance['is_completed']) {
                            for ($day = 1; $day <= $max; $day++) {
                              //echo 'my day '.$day;
                        ?>
                        <td class="text-center sorting">
                          <i class='btn btn-default' style='color:#fff; width:25px; height:25px;padding:5px'></i>   
                        </td>
                        <?php } }  ?>
                    </tr>
                  <?php }else{ ?>
                  <tr>
                    <td colspan="4" style="text-align:center;">No staff profile records found</td>
                  </tr>
                  <?php } 
                  $count++; 
                  ?>
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

          </section>
        </div>
    </div>
  </article>
</section>
