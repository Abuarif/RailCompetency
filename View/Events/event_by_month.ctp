<?php 

ini_set('memory_limit', '-1');

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
  <li><?php echo $this->Html->link('<i class="fa fa-book"></i> Event List', array('action' => 'index'), array('escape' => false)); ?></li>
  <li class="active">Event Management</li>
</ul>
<?php echo 'Month '.date('m'); ?>

<div class="m-b-md">
  <h3 class="m-b-none">Event Management</h3>
</div>

<?php 
    $myActive=date('m')-1;
?>

<section class="panel panel-default">
  <header class="panel-heading text-right bg-light dker bg-gradient" style="height:auto">
    <ul class="nav nav-tabs">
      <?php for ($iterate = 0; $iterate < 12; $iterate++ ) { ?>
        <li <?php echo ($myActive==$iterate?'class="active"':''); ?> ><a href="#<?php echo 'tab'.$iterate; ?>" data-toggle="tab">Month <?php echo $iterate + 1;?></a></li>
      <?php } ?>
    </ul>
  </header>
  <!-- <article class="scrollable"> -->
  <div class="panel-body">
    <div class="tab-content">
      <?php for ($iterate = 1; $iterate <= 12; $iterate++ ) { ?>
        <div class="tab-pane padder <?php echo ($myActive==$iterate?'class="active"':''); ?>" id="<?php echo 'tab'.$iterate; ?>">
          <section class="panel panel-default">
            <div class="table-responsive">
              <table class="table table-striped b-t b-light">
                <thead>
                  <tr>

                    <!-- <th width="20"><input type="checkbox"></th> -->
                    <th style="text-align:center;width:120px;">Actions</th>
                    <th> Course</th>
                    <th width="200" style="text-align:center;"> Status  </th>
                    <th style="text-align:center;"> Start Date</th>
                    <th style="text-align:center;"> End Date</th>
                    <th style="text-align:center;"> Time  </th>
                  </tr>
                </thead>
                <tbody>
                  <?php $calendar[$iterate] = $events; ?>
                    <?php if (!empty($events)) { ?>
                      <?php foreach ($events as $event): ?>
                        <tr>
                          <td class="actions" style="text-align:center;">
                          <?php echo $this->Html->link($this->Form->button('<i class="fa fa-gears"></i>', array('class'=>'btn btn-xs btn-success', 'style'=>'color:#000; width:25px; height:25px;','data-toggle'=>'tooltip', 'data-placement'=>'right', 'title'=>'Manage Event - '.$event['Course']['code'])), array('action' => 'manage', $event['Event']['id']), array('escape' => false)); ?>
                          <?php echo $this->Html->link($this->Form->button('<i class="fa fa-sign-in"></i>', array('class'=>'btn btn-xs btn-success', 'style'=>'color:#000; width:25px; height:25px;','data-toggle'=>'tooltip', 'data-placement'=>'right', 'title'=>'Attendance Sheet - '.$event['Course']['code'])), array('action' => 'attendance', $event['Event']['id']), array('escape' => false)); ?>
                          
                          <td>
                            <?php echo $this->Html->link($event['Course']['code']. ' - '. $event['Course']['name']. ' '. $event['Event']['details'], array('controller' => 'courses', 'action' => 'view', $event['Course']['id'])); ?>
                          </td>
                          <td>
                            <?php if ($event['Event']['active'] == 1) { ?>
                              <span class="badge bg-success" id='success' data-toggle="tooltip" data-placement="top" title="" data-original-title="Published event" ><i class="fa fa-check"></i></span>
                            <?php } else { ?>
                              <span class="badge bg-danger" id='danger' data-toggle="tooltip" data-placement="top" title="" data-original-title="Unpublished event" ><blink><i class="fa fa-times"></i></blink></span> 
                            <?php } ?>

                            <?php if (!empty($event['EventTrainer'])) { ?>
                              <?php if(count($event['EventTrainer']) > 0)  ?>        
                                <span class="badge bg-success" id='success' data-toggle="tooltip" data-placement="top" title="" data-original-title="Assigned Trainers" ><i class="fa fa-user"> <?php echo count($event['EventTrainer']); ?></i></span> 
                              <?php }else{ ?>  
                                <span class="badge bg-danger" id='danger' data-toggle="tooltip" data-placement="top" title="" data-original-title="Trainers Required!" ><blink><i class="fa fa-user" > <?php echo count($event['EventTrainer']); ?></i></blink></span> 
                            <?php } ?> 

                            <?php if (!empty($event['EventAttendance'])) { ?>
                              <?php if(count($event['EventAttendance']) > 0)  ?>        
                                <span class="badge bg-success" id='success' data-toggle="tooltip" data-placement="top" title="" data-original-title="Enrolled Participants" ><i class="fa fa-users"> <?php echo count($event['EventAttendance']); ?></i></span> 
                              <?php }else{ ?>  
                                <span class="badge bg-danger" id='danger' data-toggle="tooltip" data-placement="top" title="" data-original-title="Participants Required!" ><blink><i class="fa fa-users"> <?php echo count($event['EventAttendance']); ?></i></blink></span> 
                            <?php } ?> 

                            <?php if (!empty($event['EventMemo'])) { ?>
                              <?php if($event['EventMemo'][0]['active'] == 1) { ?>        
                                <span class="badge bg-success" id='success' data-toggle="tooltip" data-placement="top" title="" data-original-title="Approved">Memo</span> 
                              <?php }else{ ?>  
                                <span class="badge bg-warning" id='warning' data-toggle="tooltip" data-placement="top" title="" data-original-title="Pending Approval"><blink>Memo</blink></span> 
                              <?php } ?> 
                            <?php }else{ ?>  
                                <span class="badge bg-danger" id='danger' data-toggle="tooltip" data-placement="top" title="" data-original-title="Pending Issuance"><blink>Memo</blink></span> 
                            <?php } ?> 
                          </td>
                          <td style="text-align:center;"><?php echo $this->Time->format('d-m-Y', $event['Event']['start_date']); ?></td>
                          <td style="text-align:center;"><?php echo $this->Time->format('d-m-Y', $event['Event']['end_date']); ?></td>
                          <td style="text-align:center;">
                            <?php echo $this->Time->format('h:i A', $event['Event']['start_date']).' - '.$this->Time->format('h:i A', $event['Event']['end_date']); ?>
                          </td>
                        </tr>
                      <?php endforeach; ?>
                    <?php } else { ?>
                      <tr>
                        <td colspan="6" style="text-align:center;">No event found!</th>
                      </tr>
                    <?php } ?>
                 <?php //endforeach; ?>
               </tbody>
              </table>
            </div>
          </section>
        </div>
      <?php } ?>
    </div>
  </div>  
  <!-- </article> -->
</section>
