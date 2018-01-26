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
  <li class="active"><?php echo __('Event'); ?> List Archieve</li>
</ul>
<div class="m-b-md">
  <h3 class="m-b-none"><?php echo __('Event'); ?> List Archieve</h3>
</div>

<section class="panel panel-default">
  <div class="row wrapper">
    <div class="col-lg-4 m-b-xs pull-left">
      <div class="btn-group">
        <?php echo $this->Html->link('<i class="fa fa-refresh"></i>&nbsp;&nbsp;Refresh', array('action' => 'archieve'), array('class' => 'btn btn-default btn-sm', 'escape' => false)); ?>
      </div>
        <?php echo $this->Html->link('<i class="fa fa-plus"></i>&nbsp;&nbsp;New Event', array('action' => 'register'), array('class' => 'btn btn-success btn-sm', 'data-toggle'=>'ajaxModal', 'escape' => false)); ?>
    </div>
    <div class="col-lg-4 m-b-xs text-right pull-right">
      <button type="button" class="btn btn-dark btn-sm" data-toggle="modal" data-target="#myModal">
        <i class="fa fa-search"></i>&nbsp;&nbsp;Advanced Search
      </button>
    </div>
    <!-- Modal -->
    <?php echo $this->Form->create('Event', array('class' => 'form-inline','inputDefaults' => array('label' => false, 'div' => false))); ?>
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header" style="text-align:center;">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Advanced Search</h4>
          </div>
          <div class="modal-body">
            <label>Start Date</label>
            <?php
            echo $this->Form->input('start_date', array('class' => 'datepicker-input form-control', 'data-date-format' => 'dd-mm-yyyy', 'type' => 'text', 'style' => 'width:100%;', 'label' => false, 'placeholder' => 'Start Date'));
            ?>

            <br><br>

            <label>End Date</label>
            <?php
            echo $this->Form->input('end_date', array('class' => 'datepicker-input form-control', 'data-date-format' => 'dd-mm-yyyy', 'type' => 'text', 'style' => 'width:100%;', 'label' => false, 'placeholder' => 'End Date'));
            ?>

            <br><br>

            <label>Course Code</label>
            <?php echo $this->Form->input('queryString', array('class' => 'form-control', 'style' => 'width:100%;', 'placeholder' => 'Course Code')); ?>

            <br><br>

            <?php echo $this->Form->checkbox('active', array('data-toggle'=>'tooltip', 'data-placement'=>'bottom', 'title'=>'Click here to view confirmed events.')); ?>&nbsp;Active Event

          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <?php echo $this->Form->button('Search', array('class' => 'btn btn-dark'));?>
          </div>
        </div>
      </div>
    </div>
    <?php echo $this->Form->end();?>
    <!-- End Modal -->
  </div>                 
    <!-- </div> -->
  <!-- </div> -->
  <div class="table-responsive">
    <table class="table table-striped b-t b-light">
      <thead>
        <tr>

          <!-- <th width="20"><input type="checkbox"></th> -->
          <th style="text-align:center;width:120px;">Actions</th>
          <th width="40%" > <?php echo $this->Paginator->sort('course_id'); ?>  </th>
          <th width="200" style="text-align:center;"> Status  </th>
          <th style="text-align:center;"> <?php echo $this->Paginator->sort('start_date'); ?>  </th>
          <th style="text-align:center;"> <?php echo $this->Paginator->sort('end_date'); ?>  </th>
          <th style="text-align:center;"> <?php echo $this->Paginator->sort('time'); ?>  </th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($events as $event): ?>
          <tr>
            <td class="actions" style="text-align:center;">
            <?php echo $this->Html->link($this->Form->button('<i class="fa fa-gears"></i>', array('class'=>'btn btn-xs btn-success', 'style'=>'color:#000; width:25px; height:25px;','data-toggle'=>'tooltip', 'data-placement'=>'right', 'title'=>'Manage Event - '.$event['Course']['code'])), array('action' => 'manage', $event['Event']['id']), array('escape' => false)); ?>
            <?php echo $this->Html->link($this->Form->button('<i class="fa fa-sign-in"></i>', array('class'=>'btn btn-xs btn-success', 'style'=>'color:#000; width:25px; height:25px;','data-toggle'=>'tooltip', 'data-placement'=>'right', 'title'=>'Attendance Sheet - '.$event['Course']['code'])), array('action' => 'attendance', $event['Event']['id']), array('escape' => false)); ?>
            <?php echo $this->Html->link($this->Form->button('<i class="fa fa-dollar"></i>', array('class'=>'btn btn-xs btn-success', 'style'=>'color:#000; width:25px; height:25px;','data-toggle'=>'tooltip', 'data-placement'=>'right', 'title'=>'HRDF Claim - '.$event['Course']['code'])), array('controller' => 'event_claims', 'action' => 'manage', $event['Event']['id']), array('escape' => false)); ?>
            <td>
              <?php echo $this->Html->link($event['Course']['code']. ' - '. $event['Course']['name']. ' '. $event['Event']['details'], array('controller' => 'courses', 'action' => 'view', $event['Course']['id'])); ?>
            </td>
            <td>
              <?php if ($event['Course']['external'] == 1) { ?>
                <i class="fa fa-star text-purple" data-toggle="tooltip" data-placement="top" title="" data-original-title="External Course"></i>
              <?php } ?>
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
                  <span class="badge bg-success" id='success' data-toggle="tooltip" data-placement="top" title="" data-original-title="Approved">Memo <?php echo ($event['EventMemo'][0]['external']==0?'ITM/':'ETM/').$event['EventMemo'][0]['ref_number']; ?></span> 
                <?php }else{ ?>  
                  <span class="badge bg-warning" id='warning' data-toggle="tooltip" data-placement="top" title="" data-original-title="Pending Approval"><blink>Memo</blink></span> 
                <?php } ?> 
              <?php }else{ ?>  
                  <span class="badge bg-danger" id='danger' data-toggle="tooltip" data-placement="top" title="" data-original-title="Pending Issuance"><blink>Memo</blink></span> 
              <?php } ?> 
                <?php if($event['Event']['is_tcn'] == 1) { ?>        
                  <span class="badge bg-success" id='success' data-toggle="tooltip" data-placement="top" title="" data-original-title="Training Completion Notice Ready.">TCN</span> 
                <?php }else{ ?>  
                  <span class="badge bg-danger" id='warning' data-toggle="tooltip" data-placement="top" title="" data-original-title="Pending Training Completion Notice!"><blink>TCN</blink></span> 
                <?php } ?> 
                <?php if($event['Event']['is_claimed'] == 1) { ?>        
                  <span class="badge bg-warning" id='warning' data-toggle="tooltip" data-placement="top" title="" data-original-title="HRDF Claim submitted.">HRDF</span> 
                <?php }else if($event['Event']['is_claimed'] == 2) { ?>  
                  <span class="badge bg-success" id='success' data-toggle="tooltip" data-placement="top" title="" data-original-title="HRDF Claim paid."><blink>HRDF</blink></span> 
                <?php }else { ?>  
                  <span class="badge bg-danger" id='danger' data-toggle="tooltip" data-placement="top" title="" data-original-title="Pending HRDF Claim!"><blink>HRDF</blink></span> 
                <?php } ?> 
            </td>
            <td style="text-align:center;"><?php echo $this->Time->format('d-m-Y', $event['Event']['start_date']); ?></td>
            <td style="text-align:center;"><?php echo $this->Time->format('d-m-Y', $event['Event']['end_date']); ?></td>
            <td style="text-align:center;">
              <?php echo $this->Time->format('h:i A', $event['Event']['start_date']).' - '.$this->Time->format('h:i A', $event['Event']['end_date']); ?>
            </td>
          </tr>
       <?php endforeach; ?>
     </tbody>
   </table>
  </div>
  <footer class="panel-footer">
      <div class="row">
        <div class="col-lg-6">
          <?php
            echo $this->Paginator->counter(array(
              'format' => __('Showing {:start} to {:end} of {:count} entries')
              ));
          ?>                   
        </div>
        <div class="col-lg-6" style="text-align:right;">                
          <ul class="pagination pagination-sm m-t-none m-b-none">
            <?php
            echo '<li>'.$this->Paginator->prev('Previous', array(), null, array('class' => 'prev disabled')).'</li>';
            echo '<li>'.$this->Paginator->numbers(array('separator' => '</li>
              <li>')).'</li>';
            echo '<li>'.$this->Paginator->next('Next', array(), null, array('class' => 'next disabled')).'</li>';
            ?>
          </ul>
        </div>
      </div>
  </footer>
</section>

