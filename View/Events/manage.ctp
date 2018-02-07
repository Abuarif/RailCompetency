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
<div class="m-b-md">
  <h3 class="m-b-none">Event Management</h3>
</div>

<?php 
  if (!empty($this->request->named))
    $myActive = $this->request->named['tab'];
  else
    $myActive='dashboard';
?>
<?php 
  // count empty variable; 1. $event['Venue']['id'], 2. EventAttendance, 3. EventMemo, 4. EventTrainer
$actionCount = 0;
(!empty($event['Venue']['id']) ?: $actionCount++);
(!empty($event_memos) && count($event_attendances) > 0 ?: $actionCount++);
(!empty($event_trainers) ?: $actionCount++);
($event['Event']['active'] == 1 ?: $actionCount++);

?>
<section class="panel panel-default">
  <header class="panel-heading text-right bg-light dker bg-gradient" style="height:auto">
    <ul class="nav nav-tabs pull-left">
      <li <?php echo ($myActive=='dashboard'?'class="active"':''); ?> ><a href="#dashboard" data-toggle="tab">Dashboard</a></li>
      <li <?php echo ($myActive=='Trainers'?'class="active"':''); ?> ><a href="#trainers" data-toggle="tab">Trainers</a></li>
      <li <?php echo ($myActive=='Participants'?'class="active"':''); ?> ><a href="#participants" data-toggle="tab">Participants</a></li>
      <li <?php echo ($myActive=='CourseMaterials'?'class="active"':''); ?> ><a href="#CourseMaterials" data-toggle="tab">Course Materials</a></li>
      <li <?php echo ($myActive=='EventAttachments'?'class="active"':''); ?> ><a href="#EventAttachments" data-toggle="tab">Event Attachments</a></li>
      <li <?php echo ($myActive=='PendingActions'?'class="active"':''); ?> >
        <a href="#pendingactions" data-toggle="tab">Pending Actions 
        <?php echo ($actionCount > 0?'<span class="badge bg-warning">'.$actionCount.'</span>':''); ?>
      <?php if ($event['Event']['active'] == 1) { ?>
            <span class="badge bg-success" id='success' data-toggle="tooltip" data-placement="top" title="" data-original-title="Published event" ><i class="fa fa-check"></i></span>
          <?php } else { ?>
            <span class="badge bg-danger" id='danger' data-toggle="tooltip" data-placement="top" title="" data-original-title="Unpublished event" ><blink><i class="fa fa-times"></i></blink></span> 
          <?php } ?>

          <?php if (!empty($event_trainers)) { ?>
            <?php if(count($event_trainers) > 0)  ?>        
              <span class="badge bg-success" id='success' data-toggle="tooltip" data-placement="top" title="" data-original-title="Assigned Trainers" ><i class="fa fa-user"> <?php echo count($event_trainers); ?></i></span> 
            <?php }else{ ?>  
              <span class="badge bg-danger" id='danger' data-toggle="tooltip" data-placement="top" title="" data-original-title="Trainers Required!" ><blink><i class="fa fa-user" > <?php echo count($event_trainers); ?></i></blink></span> 
          <?php } ?> 

          <?php if (!empty($event_attendances)) { ?>
            <?php if(count($event_attendances) > 0)  ?>        
              <span class="badge bg-success" id='success' data-toggle="tooltip" data-placement="top" title="" data-original-title="Enrolled Participants" ><i class="fa fa-users"> <?php echo count($event_attendances); ?></i></span> 
            <?php }else{ ?>  
              <span class="badge bg-danger" id='danger' data-toggle="tooltip" data-placement="top" title="" data-original-title="Participants Required!" ><blink><i class="fa fa-users"> <?php echo count($event_attendances); ?></i></blink></span> 
          <?php } ?> 

          <?php if (!empty($event_memos)) { ?>
            <?php if($event_memos[0]['EventMemo']['active'] == 1) { ?>        
              <span class="badge bg-success" id='success' data-toggle="tooltip" data-placement="top" title="" data-original-title="Approved">Memo</span> 
            <?php }else{ ?>  
              <span class="badge bg-warning" id='warning' data-toggle="tooltip" data-placement="top" title="" data-original-title="Pending Approval"><blink>Memo</blink></span> 
            <?php } ?> 
          <?php }else{ ?>  
              <span class="badge bg-danger" id='danger' data-toggle="tooltip" data-placement="top" title="" data-original-title="Pending Issuance"><blink>Memo</blink></span> 
          <?php } ?> 

          <?php if($event['Event']['is_tcn'] == 1) { ?>
              <span class="badge bg-success" id='success' data-toggle="tooltip" data-placement="top" title="" data-original-title="Approved">TCN</span> 
          <?php } else { ?>
              <span class="badge bg-danger" id='danger' data-toggle="tooltip" data-placement="top" title="" data-original-title="Pending Confirmation"><blink>TCN</blink></span> 
          <?php } ?>

        </a>
      </li>
    </ul>
    <span class="hidden-sm">
      <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-cog text-default"></i> Options <b class="caret"></b></a>
      <ul class="dropdown-menu pull-right">
        <li>
          <?php echo $this->Html->link('<i class="fa fa-calendar-o pull-left"></i>View Calendar', array('action' => 'calendar'), array('escape' => false)); ?>
        </li>
        <li>
          <?php echo $this->Html->link('<i class="fa fa-building-o pull-left"></i>View Room', array('action' => 'training_rooms'), array('escape' => false)); ?>
        </li>
        <li>
          <?php echo $this->Html->link('<i class="fa fa-files-o pull-left"></i>Copy Entry', array('action' => 'copy', $event['Event']['id']), array('data-toggle'=>'ajaxModal','escape' => false)); ?>
        </li>
        <li>
          <?php echo $this->Html->link('<i class="fa fa-trash-o pull-left"></i>Remove Entry', array('action' => 'delete', $event['Event']['id']), array('escape' => false, 'confirm' => 'Are you sure you wish to remove the event?')); ?>
        </li>
        <li>
          <?php echo $this->Html->link('<i class="fa fa-pencil pull-left"></i>Modify Details', array('action' => 'edit', $event['Event']['id']), array('data-toggle'=>'ajaxModal', 'escape' => false)); ?>
        </li>
        <li>
          <?php echo $this->Html->link('<i class="fa fa-book pull-left"></i>Manage Course', array('controller' => 'courses', 'action' => 'view', $event['Course']['id']), array('confirm' => 'Are you sure you wish to manage the course?','escape' => false)); ?>
        </li>
        <li>
          <?php echo $this->Html->link('<i class="fa fa-user pull-left"></i>Assign Trainers', array('controller' => 'event_trainers', 'action' => 'assign', $event['Event']['id'], $event['Course']['id']), array('data-toggle'=>'ajaxModal','escape' => false)); ?>
        </li>
        <li>
          <?php echo $this->Html->link('<i class="fa fa-users pull-left"></i>&nbsp;&nbsp;Nomination Form', array('controller' => 'event_attendances', 'action' => 'nominate', $event['Event']['id']), array('escape' => false)); ?>
        </li>
        <li>
          <?php echo $this->Html->link('<i class="fa fa-sign-in pull-left"></i>&nbsp;&nbsp;Attendance Sheet', array('action' => 'attendance', $event['Event']['id']), array('escape' => false)); ?>
        </li>
        
          <?php 
            //available only if memo is empty
            if ($event['Event']['active'] != 1) 
            { ?>
        <li>
        <?php
              echo $this->Html->link('<i class="fa fa-check-square-o pull-left"></i>Publish Event', array('controller' => 'events', 'action' => 'publish', $event['Event']['id']), array('data-toggle'=>'ajaxModal', 'escape' => false, 'confirm' => 'Are you sure you wish to publish the event?')); 
              // echo $this->Form->postLink('<i class="fa fa-check-square-o pull-left"></i>Publish Event 2', array('controller' => 'events', 'action' => 'confirmed_event', $event['Event']['id']), array('escape' => false, 'confirm' => 'Are you sure you wish to confirm the event?')); 
              ?>
        </li>   
        <?php  } else { ?>
        <li>
        <?php
              echo $this->Form->postLink('<i class="fa fa-times pull-left"></i>Unpublish Event', array('controller' => 'events', 'action' => 'revert_scheduled_event', $event['Event']['id']), array('escape' => false, 'confirm' => 'Are you sure you wish to unpublish the event?')); 
              ?>
        </li> 
        <li>
          <?php echo $this->Form->postLink('<i class="fa fa-dollar pull-left"></i> HRDF Claim', array('controller' => 'event_claims', 'action' => 'manage', $event['Event']['id']), array('escape' => false )); ?>
        </li> 
        <?php } ?>
        <?php if (empty($event_memos) && count($event_attendances) > 0) { ?>
        <li>
          <?php 
            $external = 0;
            if ($event['Course']['external']) {
              $external = 1;
            } 
          ?>
        <?php echo $this->Html->link('<i class="fa fa-edit pull-left"></i>Create Memo', array('controller' => 'event_memos', 'action' => 'add', $event['Course']['id'], $external, $event['Event']['id']), array('data-toggle'=>'ajaxModal', 'escape' => false)); ?>
        </li>
        <?php } ?>
        <?php 
          // The memo button is active only when event memo is available and participant > 0
          if ( !empty($event_memos) && count($event_attendances) > 0)
          { 
            if ($event_memos[0]['EventMemo']['active'] == 1) 
            {
        ?>
        <li>
          <?php echo $this->Form->postLink('<i class="fa fa-ban pull-left"></i>Cancel Memo', array('controller' => 'event_memos', 'action' => 'reverted_memo', $event_memos[0]['EventMemo']['id']), array('escape' => false, 'confirm' => 'Are you sure you wish to recall the memo?')); ?>
        </li>
        <li>
          <?php //echo $this->Html->link('<i class="fa fa-edit pull-left"></i>Edit Memo', array('controller' => 'event_memos', 'action' => 'edit', $event_memos[0]['id']), array('data-toggle'=>'ajaxModal', 'escape' => false)); ?>
          <?php echo $this->Html->link('<i class="fa fa-edit pull-left"></i>Edit Memo', array('controller' => 'event_memos', 'action' => 'modify', $event['Event']['id'], $event_memos[0]['EventMemo']['id']), array('data-toggle'=>'ajaxModal', 'escape' => false)); ?>
        </li>
        <?php   if ($event['Course']['external'] == 1) { ?>
        <li>
          <?php echo $this->Form->postLink('<i class="fa fa-eye pull-left"></i>Preview Memo', array('controller' => 'events', 'action' => 'external_memo', $event['Event']['id']), array('target' => '_blank', 'escape' => false, 'confirm' => 'Are you sure you wish to preview the memo?')); ?>
        </li>
        <li>
          <?php echo $this->Form->postLink('<i class="fa fa-cloud-download pull-left"></i>Download Memo', array('controller' => 'events', 'action' => 'external_memo', $event['Event']['id'].'.pdf'), array('target' => '_blank', 'escape' => false, 'confirm' => 'Are you sure you wish to download the memo?')); ?>
        </li>
        <?php   } else { ?>
        <li>
          <?php echo $this->Form->postLink('<i class="fa fa-eye pull-left"></i>Preview Memo', array('controller' => 'events', 'action' => 'memo', $event['Event']['id']), array('target' => '_blank', 'escape' => false, 'confirm' => 'Are you sure you wish to preview the memo?')); ?>
        </li>
        <li>
          <?php echo $this->Form->postLink('<i class="fa fa-cloud-download pull-left"></i>Download Memo', array('controller' => 'events', 'action' => 'memo', $event['Event']['id'].'.pdf'), array('target' => '_blank', 'escape' => false, 'confirm' => 'Are you sure you wish to download the memo?')); ?>
        </li>
        <?php   } ?>
        <li>
          <?php echo $this->Html->link('<i class="fa fa-envelope pull-left"></i>Email Memo', array('controller' => 'events', 'action' => 'email_memo', $event['Event']['id']), array('data-toggle'=>'ajaxModal', 'escape' => false, 'confirm' => 'Are you sure you wish to email this memo?')); ?>
        </li>
        <li>
          <?php echo $this->Html->link('<i class="fa fa-envelope pull-left"></i>Email Me', array('controller' => 'events', 'action' => 'email_my_memo', $event['Event']['id']), array('escape' => false, 'confirm' => 'Are you sure you wish to email this memo?')); ?>
        </li>
        <?php } else { ?>
        <li>
        <?php echo $this->Form->postLink('<i class="fa fa-file-text pull-left"></i>Approve Memo', array('controller' => 'event_memos', 'action' => 'confirmed_memo', $event_memos[0]['EventMemo']['id']), array('escape' => false, 'confirm' => 'Are you sure you wish to confirm the memo?')); ?>
        </li>
        <?php } ?>
        <?php } ?> 
        <?php if ($event['Event']['is_tcn'] == 1) { ?>
        <li>
        <?php //echo $this->Html->link('<i class="fa fa-tachometer pull-left"></i>Email TR', array('controller' => 'events', 'action' => 'training_result', $event['Event']['id']), array('escape' => false, 'confirm' => 'Are you sure you wish to email the training result?')); ?>
        </li>
        <li>
          <?php echo $this->Form->postLink('<i class="fa fa-cloud-download pull-left"></i>Download Result', array('controller' => 'events', 'action' => 'training_result', $event['Event']['id'].'.pdf'), array('target' => '_blank', 'escape' => false, 'confirm' => 'Are you sure you wish to download the training result?')); ?>
        </li>
        <li>
          <?php echo $this->Html->link('<i class="fa fa-tachometer pull-left"></i>Email Me TR', array('controller' => 'events', 'action' => 'email_my_training_result', $event['Event']['id']), array('escape' => false, 'confirm' => 'Are you sure you wish to email this training result?')); ?>
        </li>
        <?php } ?>
        <li>
          <?php echo $this->Html->link('<i class="fa fa-cloud-upload pull-left"></i>Upload Attachment', array('controller' => 'event_attachments', 'action' => 'upload', $event['Event']['id']), array('data-toggle'=>'ajaxModal', 'escape' => false)); ?>
        </li>
        <li>
          <?php echo $this->Html->link('<i class="fa fa-users pull-left"></i> PTE Checklist', array('controller' => 'event_attendances', 'action' => 'course_pte_update', $event['Event']['id']), array('data-toggle'=>'ajaxModal', 'escape' => false)); ?>
        </li>
        <li>
           <?php echo $this->Html->link('<i class="fa fa-edit pull-left"></i>Create PTE Memo', array('controller' => 'event_ptes', 'action' => 'add', $event['Course']['id'], $event['Event']['id']), array('data-toggle'=>'ajaxModal', 'escape' => false)); ?>
        </li>
        <li>
          <?php echo $this->Html->link('<i class="fa fa-cloud-download pull-left"></i> PTE Memo', array('controller' => 'events', 'action' => 'pte', $event['Event']['id'].'.pdf'), array('target'=>'_blank', 'escape' => false)); ?>
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
            <?php echo $this->Layout->sessionFlash(); ?>
            <header class="panel-heading">
              <ul class="nav nav-pills pull-right">
                <li>
                  <a href="#" class="panel-toggle text-muted active"><i class="fa fa-caret-down text-active"></i><i class="fa fa-caret-up text"></i></a>
                </li>
              </ul>
              <?php 
                $str = $event['Course']['name'];
                $cont =  strtolower($str); 
                echo ucwords($cont).' ('.$event['Course']['code'].') - '.$event['Event']['details'];
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
                    <?php echo h($event['Venue']['name']); ?> &nbsp; 
                    <?php echo $this->Html->link('Change Details', array('action' => 'edit', $event['Event']['id']), array('class' => 'btn bg-success', 'data-toggle'=>'ajaxModal', 'escape' => false)); ?>
                    
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
                <tr>
                  <td style="height:25px;">
                    Duration
                  </td>
                  <td style="height:25px;">
                    :
                  </td>
                  <td>
                    <?php echo $event['Course']['duration']; ?> day(s)
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
                  <h4><?php echo count($event_attendances).':'.$event['Course']['pax']; ?></h4>
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
                  <h4><?php echo count($event_trainers); ?></h4>
                  <span style="font-size:60px;"><i class="fa fa-user text-success"></i></span>
                </div>
              </section>
            </div>
          </div>
          
        </section>
      </div>

      <div class="tab-pane padder <?php echo ($myActive=='Trainers'?'active':''); ?>" id="trainers">
        <h3><?php echo __('Related Trainers'); ?></h3>
        <section class="panel panel-default">
          <div class="row wrapper">
            <div class="col-sm-5 m-b-xs">
              <div class="btn-group">
                <button type="button" data-toggle="tooltip" data-placement="top" title="" data-original-title="Refresh" class="btn btn-sm btn-default" title="Refresh" onclick ='location.reload();'><i class="fa fa-refresh"></i>&nbsp;&nbsp;Refresh</button>
              </div>
            </div>
          </div>
          <div class="table-responsive">
            <table class="table table-striped b-t b-light">
              <thead>
                <tr>
                  <th>Action</th>
                  <th><?php echo __('Department'); ?></th>
                  <th><?php echo __('Staff Number'); ?></th>
                  <th><?php echo __('Name'); ?></th>
                  <th><?php echo __('Assist'); ?></th>
                </tr>
              </thead>
              <tbody>
                <?php  if (!empty($event_trainers)) { ?>
                <?php foreach ($event_trainers as $eventTrainer): ?>
                  <tr>
                    <td class="actions">
                      <?php echo $this->Html->link('', array('controller' => 'event_trainers', 'action' => 'delete', $eventTrainer['EventTrainer']['id'], $event['Event']['id']), array('class'=>'btn btn-xs btn-danger fa fa-trash-o', 'style'=>'color:#000;width:25px; height:25px; padding-top:5px','data-toggle'=>'tooltip', 'data-placement'=>'right', 'title'=>'Remove this trainer', 'escape' => false, 'confirm' => 'Are you sure you wish to remove the trainer?')); ?>
                    </td>
                    <td>
                      <?php 
                      $trainers = $this->requestAction(
                        array('controller' => 'trainers', 
                          'action' => 'object', $eventTrainer['EventTrainer']['trainer_id']));
                      echo (!empty($trainers['Staff'])?$trainers['Staff']['org_code']:'');

                      ?>
                    </td>
                    <td> <?php
                      echo (!empty($trainers['Staff'])?$trainers['Staff']['staff_no']:'');
                      // echo $trainers['Staff']['staff_no']; 
                      ?>
                    </td>
                    <td><?php
                      echo (!empty($trainers['Staff'])?$trainers['Staff']['name']:'');
                      // echo $trainers['Staff']['name'];
                                  // echo $eventAttendance['staff_id']; 
                      ?>
                    </td>
                    <?php if ($eventTrainer['EventTrainer']['is_assist'] == 1) { ?>
                      <td><i class='fa fa-check bg-success btn btn-default' style='color:#fff; width:25px; height:25px;padding:5px'></i> &nbsp;</td>
                    <?php } else { ?>
                      <td><i class='fa fa-times bg-danger btn btn-default' style='color:#fff; width:25px; height:25px;padding:5px'></i> &nbsp;</td>
                    <?php } ?>
                  </tr>
                <?php endforeach; ?>
                <?php }else{ ?>
                <tr>
                  <td colspan="2" style="text-align:center;">No related trainers records found</td>
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

      <div class="tab-pane padder <?php echo ($myActive=='Participants'?'active':''); ?>" id="participants">
        <h3><?php echo __('Related Participants'); ?></h3>
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
            <?php //echo $this->Form->create('EventAttendance', array('action' => 'event_attendances/copy', 'class' => 'bs-example form-horizontal', 'inputDefaults' => array('label' => false, 'div' => false))); ?>
            <table class="table table-striped b-t b-light">
              <thead>
                <tr>
                  <th width="20"><input type="checkbox"></th>
                  <th><?php echo __('Department'); ?></th>
                  <th><?php echo __('Name'); ?></th>
                  <th><?php echo __('Staff Number'); ?></th>
                  <?php 
                      $max = $event['Course']['duration'];
                      if (count($event_attendances) > 0)
                      // if ($event_attendances[0]['is_enrolled'] && !$event_attendances[0]['is_completed']) {
                        for ($day = 1; $day <= $max; $day++) {
                          //echo 'my day '.$day;
                    ?>
                  <th><?php echo __('Day '. $day); ?></th>
                  <?php 
                  // } 
                    }
                    ?>
                  <th class="text-center sorting"><?php echo __('Participation'); ?></th>
                  <?php if ($event['Course']['hasPTE'] == 1) { ?>
                    <th><?php echo $this->Html->link(' PTE', array('controller' => 'event_attendances', 'action' => 'course_pte_update', $event['Event']['id']), array('escape' => false, 'class' => 'fa fa-users', 'style' => 'text-color:red;', 'data-toggle' => 'ajaxModal')); ?></th>
                  <?php } ?>
                </tr>
              </thead>
              <tbody>
                <?php if(!empty($event_attendances)) { ?>
                <?php $iterate = 0; ?>
                <?php foreach ($event_attendances as $eventAttendance): ?>
                <?php if (isset($eventAttendance['EventAttendance']['staff_id'])) { ?>
                 <?php 
                    $participant = $this->requestAction(
                      array('plugin' => 'rail_competency',  'controller' => 'staffs', 
                        'action' => 'object', $eventAttendance['EventAttendance']['staff_id']));
                    if (!empty($participant['Staff'])) {  
                ?>
                  <tr>
                    <td>
                      <?php echo $this->Form->checkbox('EventAttendance.'.$iterate.'.myOption', array('class' => 'input-sm form-control', 'label' => false,'data-toggle'=>'tooltip', 'data-placement'=>'right', 'title'=>'Choose this staff!')); ?>
                    </td>
                    <td>
                      <?php echo $participant['Staff']['parent_code'].' - '.$participant['Staff']['org_code']; ?>
                    </td>
                    <td>
                      <?php echo $participant['Staff']['name']; ?>
                    </td>
                    <td>
                      <?php echo $participant['Staff']['staff_no']; ?>
                    </td>
                  <?php 
                    $max = $event['Course']['duration'];
                    if (!empty($eventAttendance))
                    //if ($eventAttendance['is_enrolled'] && !$eventAttendance['is_completed']) {
                      for ($day = 1; $day <= $max; $day++) {
                        //echo 'my day '.$day;
                  ?>
                  <td>
                    <?php 
                    // Get Attendance details
                    $myAttendanceDetail = $this->requestAction('/rail_competency/event_attendance_details/detail/'.$event['Event']['id'].'/'.$participant['Staff']['id'].'/'. $day);
                    // echo '/rail_competency/event_attendance_details/detail/'.$event['Event']['id'].'/'.$eventAttendance['staff_id'].'/'. $day;
                    // print_r($myAttendanceDetail);
                    ?>
                    <?php 
                      if (!empty($myAttendanceDetail)) {
                        if($myAttendanceDetail['EventAttendanceDetail']['active'] && $myAttendanceDetail['EventAttendanceDetail']['day'] == $day) {
                    ?>
                      
                    <i class='fa fa-check-square-o btn bg-success' style='color:#fff; width:25px; height:25px;padding:5px'></i> 
                    <?php //echo 'current day '.$day;
                        //} else { ?>
                    <!-- <i class='fa fa-check-square-o btn btn-default' style='color:#fff; width:25px; height:25px;padding:5px'></i> -->
                        <?php
                          // echo $this->Form->postLink('', array('controller' => 'event_attendance_details', 'action' => 'daily', $event['Event']['id'], $eventAttendance['id'], $eventAttendance['staff_id'], $day), array('class'=>'btn btn-xs btn-default fa fa-check-square-o', 'style'=>'color:#000;width:25px; height:25px; padding-top:5px','data-toggle'=>'tooltip', 'data-placement'=>'left', 'title'=>'Confirmed Attendance: Day '.$day, 'escape' => false, 'confirm' => 'Are you sure you sure?'));
                        //}
                      } else { ?>
                    <i class='fa fa-check-square-o btn btn-default' style='color:#fff; width:25px; height:25px;padding:5px'></i>
                      <?php 
                      //echo $this->Form->postLink('', array('controller' => 'event_attendance_details', 'action' => 'daily', $event['Event']['id'], $eventAttendance['id'], $eventAttendance['staff_id'], $day), array('class'=>'btn btn-xs btn-default fa fa-check-square-o', 'style'=>'color:#000;width:25px; height:25px; padding-top:5px','data-toggle'=>'tooltip', 'data-placement'=>'left', 'title'=>'Confirmed Attendance: Day '.$day, 'escape' => false, 'confirm' => 'Are you sure you sure?')); ?>
                    <?php } //not empty myAttendanceDetail
                    $myAttendanceDetail = array(); ?>
                     <?php   } //end for ?>
                  &nbsp;
                  <?php } else { ?>
                    <i class='fa fa-check-square-o bg-success btn btn-default' style='color:#fff; width:25px; height:25px;padding:5px'></i>&nbsp;Completed
                  <?php } //end is_enrolled ?>
                </td>
                  <?php if ($eventAttendance['EventAttendance']['active'] == 1) { ?>
                    <td class="text-center sorting"><i class='fa fa-check bg-success btn btn-default' style='color:#fff; width:25px; height:25px;padding:5px'></i> &nbsp;</td>
                  <?php } else { ?>
                    <td class="text-center sorting"><i class='fa fa-times bg-danger btn btn-default' style='color:#fff; width:25px; height:25px;padding:5px'></i> &nbsp;</td>
                  <?php } ?>
                  <?php if ($eventAttendance['EventAttendance']['is_PTE'] == 1 && $event['Course']['hasPTE'] == 1) { ?>
                    <td class="text-center sorting"><i class='fa fa-check bg-success btn btn-default' style='color:#fff; width:25px; height:25px;padding:5px'></i> &nbsp;</td>
                  <?php } else { ?>
                    <td class="text-center sorting"><i class='fa fa-times bg-danger btn btn-default' style='color:#fff; width:25px; height:25px;padding:5px'></i> &nbsp;</td>
                  <?php } ?>
                </tr>
                <?php $iterate++; ?>
                <?php } ?>
              <?php } else { ?>
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
            
            <?php //echo $this->Form->end(); ?>
          </div>
        </section>
      </div>

      <div class="tab-pane padder <?php echo ($myActive=='EventAttachments'?'active':''); ?>" id="EventAttachments">
        <h3><?php echo __('Event Attachments'); ?></h3>
        <section class="panel panel-default">
        <div class="table-responsive">
          <table class="table table-striped m-b-none">
            <thead>
              <tr>
                <th> No</th>
                <th> Description</th>
                <th> Action</th>
              </tr>
            </thead>
            <tbody>
                <?php $count = 1; ?>
                <?php foreach ($event_attachments as $event_attachment): ?>
                <tr>
                  <td> <?php echo $count; ?>
                  <td>
                    <?php 
                      echo $event_attachment['EventAttachment']['description'];
                    ?>
                  </td>
                  <td>
                    <?php 
                      echo $this->Html->link('', '/attachments/'.$event_attachment['EventAttachment']['files'],  array('target' => '_blank', 'escape' => false, 'class' => 'btn btn-success fa fa-eye')); 
                    ?>
                    <?php echo $this->Form->postLink('', array('controller' => 'event_attachments', 'action' => 'delete', $event_attachment['EventAttachment']['id']), array('class' => 'btn btn-danger fa fa-trash-o', 'confirm'=>'Are you sure you want to delete this entry?', 'escape' => false)); ?>
                  </td>
                </tr>
                <?php $count ++ ;?>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
      </section>
      </div> 

      <div class="tab-pane padder <?php echo ($myActive=='PendingActions'?'active':''); ?>" id="pendingactions">
        <h3><?php echo __('Pending Actions'); ?></h3>
        <section class="panel panel-default">
          <div class="row wrapper">
            <div class="col-sm-5 m-b-xs">
              <div class="btn-group">
                <button type="button" data-toggle="tooltip" data-placement="top" title="" data-original-title="Refresh" class="btn btn-sm btn-default" title="Refresh" onclick ='location.reload();'><i class="fa fa-refresh"></i>&nbsp;&nbsp;Refresh</button>
              </div>
            </div>
            <div class="col-sm-4 m-b-xs"></div>
          </div>
          <div class="panel wrapper">
            <?php 
            if ($event['Event']['active'] == 0 ) { ?>
            <div class="alert alert-warning alert-block">
              <button type="button" class="close" data-dismiss="alert">&times;</button>
              <h4><i class="fa fa-bell-alt"></i>Warning!</h4>
              <i class="fa fa-ban-circle"></i><strong>Event scheduled has not been published yet! Click here <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-cog text-default"></i> Options <b class="caret"></b></a> >> <?php echo $this->Form->postLink('<i class="fa fa-times" style="padding-right:10px;"></i>Publish Event', array('controller' => 'events', 'action' => 'confirmed_event', $event['Event']['id']), array('escape' => false, 'confirm' => 'Are you sure you wish to confirm the event?')); ?></strong>
            </div>
            <?php } ?>

            <?php 
            if (empty($event['Venue']['id']) ) { ?>
            <div class="alert alert-warning alert-block">
              <button type="button" class="close" data-dismiss="alert">&times;</button>
              <h4><i class="fa fa-bell-alt"></i>Warning!</h4>
              <i class="fa fa-ban-circle"></i><strong>Event venue has not been assigned yet! Click here <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-cog text-default"></i> Options <b class="caret"></b></a> >> <?php echo $this->Html->link('<i class="fa fa-pencil" style="padding-right:10px;"></i>Modify Details', array('action' => 'edit', $event['Event']['id']), array('data-toggle'=>'ajaxModal', 'escape' => false)); ?> </strong>
            </div>
            <?php } ?>

            <?php 
            if (empty($event_trainers) ) { ?>
            <div class="alert alert-warning alert-block">
              <button type="button" class="close" data-dismiss="alert">&times;</button>
              <h4><i class="fa fa-bell-alt"></i>Warning!</h4>
              <i class="fa fa-ban-circle"></i><strong>Trainers has not been assigned yet! Click here <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-cog text-default"></i> Options <b class="caret"></b></a> >> <?php echo $this->Html->link('<i class="fa fa-user" style="padding-right:10px;"></i>Assign Trainers', array('controller' => 'event_trainers', 'action' => 'assign', $event['Event']['id'], $event['Course']['id']), array('data-toggle'=>'ajaxModal','escape' => false)); ?></strong>
            </div>
            <?php } ?>

            <?php if (empty($event_memos) && count($event_attendances) > 0) { ?>
            <div class="alert alert-warning alert-block">
              <button type="button" class="close" data-dismiss="alert">&times;</button>
              <h4><i class="fa fa-bell-alt"></i>Warning!</h4>
              <i class="fa fa-ban-circle"></i><strong>Event memo has not been created yet! Click here <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-cog text-default"></i> Options <b class="caret"></b></a> >> <?php echo $this->Html->link('<i class="fa fa-edit" style="padding-right:10px;"></i>Create Memo', array('controller' => 'event_memos', 'action' => 'add', $event['Course']['id'], $external, $event['Event']['id']), array('data-toggle'=>'ajaxModal', 'escape' => false)); ?> </strong>
            </div>
            <?php } ?>

            <?php 
              // The memo button is active only when event memo is available and participant > 0
              if ( !empty($event_memos) && count($event_attendances) > 0)
                { 
                  if ($event_memos[0]['EventMemo']['active'] == 1) 
                  {
            ?>
            <div class="alert alert-info alert-block">
              <button type="button" class="close" data-dismiss="alert">&times;</button>
              <h4><i class="fa fa-bell-alt"></i>Info!</h4>
              <i class="fa fa-ban-circle"></i>

              <strong>Click here <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-cog text-default"></i> Options <b class="caret"></b></a> >> <?php echo $this->Form->postLink('<i class="fa fa-ban" style="padding-right:10px;"></i>Cancel Memo', array('controller' => 'event_memos', 'action' => 'reverted_memo', $event_memos[0]['EventMemo']['id']), array('escape' => false, 'confirm' => 'Are you sure you wish to recall the memo?')); ?> </strong>
              <br/>
              <br/>
              <strong>Click here <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-cog text-default"></i> Options <b class="caret"></b></a> >> <?php echo $this->Form->postLink('<i class="fa fa-file" style="padding-right:10px;"></i>Generate Memo', array('controller' => 'events', 'action' => 'memo', $event['Event']['id'].'.pdf'), array('target' => '_blank', 'escape' => false, 'confirm' => 'Are you sure you wish to generate the memo?')); ?> </strong>

            </div>
            <?php   } else { ?>
            <div class="alert alert-info alert-block">
              <button type="button" class="close" data-dismiss="alert">&times;</button>
              <h4><i class="fa fa-bell-alt"></i>Info!</h4>
              <i class="fa fa-ban-circle"></i>

              <strong>Click here <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-cog text-default"></i> Options <b class="caret"></b></a> >> <?php echo $this->Form->postLink('<i class="fa fa-file-text pull-left"></i>Approve Memo', array('controller' => 'event_memos', 'action' => 'confirmed_memo', $event_memos[0]['EventMemo']['id']), array('escape' => false, 'confirm' => 'Are you sure you wish to confirm the memo?')); ?> </strong>
              <br/>
              <strong>Notes: <?php echo $event_memos[0]['EventMemo']['memo']; ?></strong>

            </div>
            <?php   } ?>
            <?php } ?>

            <?php 
            if (empty($event_attendances) ) { ?>
            <div class="alert alert-info alert-block">
              <button type="button" class="close" data-dismiss="alert">&times;</button>
              <h4><i class="fa fa-bell-alt"></i>Info!</h4>
              <i class="fa fa-ban-circle"></i><strong>There is no participant yet.</strong>
            </div>
            <?php } ?>
          </div>
        </section>
      </div>

      <div class="tab-pane padder <?php echo ($myActive=='CourseMaterials'?'active':''); ?>" id="CourseMaterials">
        <h3><?php echo __('Related Course Materials'); ?></h3>
        <section class="panel panel-default">
          <div class="row wrapper">
            <div class="col-sm-5 m-b-xs">
              <!-- <div class="btn-group">
                <button type="button" data-toggle="tooltip" data-placement="top" title="" data-original-title="Refresh" class="btn btn-sm btn-default" title="Refresh" onclick ='location.reload();'><i class="fa fa-refresh"></i>&nbsp;&nbsp;Refresh</button>
              </div> -->
              <?php //echo $this->Html->link('<i class="fa fa-book"></i>&nbsp;&nbsp;Manage Course', array('controller' => 'courses', 'action' => 'view', $event['Course']['id']), array('class' => 'btn btn-success btn-sm', 'style'=>'color:#000;', 'escape' => false)); ?>
            </div>
            <div class="col-sm-4 m-b-xs"></div>
          </div>

         <div class="table-responsive">
          <table class="table table-striped b-t b-light">
            <thead>
              <tr>
                <th class="text-center sorting" style="width:150px;"><?php echo __('Actions'); ?></th>
                <th>
                  <?php echo __('Material Name'); ?>
                </th>
                <th>
                  <?php echo __('Uploaded Files'); ?>
                </th>
                <th class="text-center sorting" style="width:100px;">
                  <?php echo __('Active'); ?>
                </th>
              </tr>
            </thead>
            <tbody>
            <?php 
            // Get course materials
            $myCourseMaterials = $this->requestAction('/rail_competency/course_materials/get_list/'.$event['Course']['id']);
            $this->log($myCourseMaterials);
            ?>
            <?php if (!empty($myCourseMaterials)) { ?>
             <?php foreach ($myCourseMaterials as $courseMaterial): ?>
               <tr>
                 <td class="text-center sorting">
                  <?php echo $this->Html->link('', array('controller' => 'course_materials', 'action' => 'sneak', $courseMaterial['CourseMaterial']['id']), array('class'=>'btn btn-xs btn-success fa fa-desktop', 'style'=>'color:#000;width:25px; height:25px; padding-top:5px','data-toggle'=>'tooltip', 'data-placement'=>'right', 'title'=>'View Details', 'data-toggle'=>'ajaxModal', 'escape' => false)); ?>
                </td>
                <td><?php echo $courseMaterial['CourseMaterial']['name']; ?></td>
                <td>
                  <?php 
                  echo $this->Html->link(__('Download'), "/attachments/".$courseMaterial['CourseMaterial']['files'], array('style' => 'color:green;', 'target' => '_blank', 'escape'=>false)); 
                  ?>
                </td>
                <td class="text-center sorting">
                  <?php
                  if ($courseMaterial['CourseMaterial']['active'] == 1)
                  {
                    echo '<div data-toggle="tooltip" data-placement="top" title="" data-original-title="Program Active"><i class="fa fa-check bg-success btn btn-xs" style="color:#fff; width:25px; height:25px;padding:5px"></i></div>';
                  }else{
                    echo '<div data-toggle="tooltip" data-placement="top" title="" data-original-title="Program Not Active"><i class="fa fa-times bg-danger btn btn-xs" style="color:#fff; width:25px; height:25px;padding:5px"></i></div>';
                  }
                  ?>
                </td>
              </tr>
            <?php endforeach; ?>
            <?php }else{ ?>
              <tr>
                <td colspan="4" style="text-align:center;">No related course materials records found</td>
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
    </div>
  </article>
</section>
