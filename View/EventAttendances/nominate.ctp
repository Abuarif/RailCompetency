          
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
  <!-- <li><a href="<?php echo $this->webroot; ?>/rail_competency/events/upcoming/1"><i class="fa fa-book"></i> Event Calendar</a></li> -->
  <li><?php echo $this->Html->link('<i class="fa fa-book"></i> Event Calendar', array('controller' => 'events', 'action' => 'upcoming', 1), array('escape' => false)); ?></li>
  <li class="active">Participant Nomination</li>
</ul>
<div class="m-b-md">
  <h3 class="m-b-none">Participant Nomination</h3>
</div>

<?php 
  if (count($staffs) > 0)
    $myActive='Nominations';
  else if (!empty($this->request->named))
    $myActive = $this->request->named['tab'];
  else
    $myActive='dashboard';

?>

<section class="panel panel-default">
  <header class="panel-heading text-right bg-light dker bg-gradient" style="height:auto">
    <ul class="nav nav-tabs pull-left">
      <li <?php echo ($myActive=='dashboard'?'class="active"':''); ?> ><a href="#dashboard" data-toggle="tab">Dashboard</a></li>
      <li <?php echo ($myActive=='Nominations'?'class="active"':''); ?> ><a href="#nominations" data-toggle="tab">Find Participant</a></li>
      <li <?php echo ($myActive=='Participants'?'class="active"':''); ?> ><a href="#participants" data-toggle="tab">Participant List</a></li>
    </ul>
    <?php if ($eventInfo[0]['Event']['is_nominated']) {
      $color = 'bg-success';
    } else {
      $color = 'bg-warning';
    } ?>
    <?php echo $this->Html->link('<i class="fa fa-envelope"></i>&nbsp;&nbsp;Email Nomination Notice', array('controller' => 'event_attendances', 'action' => 'email_training_notice', $eventInfo[0]['Event']['id']), array('class' => 'btn '.$color.' btn-xs', 'data-toggle'=>'ajaxModal', 'escape' => false, 'confirm' => 'Are you sure you wish to email this notice to the respective SMs?')); ?>
    <span class="hidden-sm">
      <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-cog text-default"></i> Options <b class="caret"></b></a>
      <ul class="dropdown-menu pull-right">
        <li>
          <?php echo $this->Html->link('<i class="fa fa-gears pull-left"></i>Manage Event', array('controller' => 'events', 'action' => 'manage', $eventInfo[0]['Event']['id']), array('escape' => false)); ?>
        </li>   
        <!-- <li>
          <?php echo $this->Html->link('<i class="fa fa-users pull-left"></i>Copy Participants', array('controller' => 'events', 'action' => 'copy_participants', $event_id, $eventInfo[0]['Course']['service_id']), array('data-toggle'=>'ajaxModal', 'escape' => false)); ?>  
        </li> -->
        <li>
          <?php echo $this->Html->link('<i class="fa fa-users pull-left"></i>Get Participants', array('controller' => 'events', 'action' => 'get_participants', $event_id, $eventInfo[0]['Course']['service_id']), array('data-toggle'=>'ajaxModal', 'escape' => false)); ?>  
        </li>
        <li>
          <?php echo $this->Html->link('<i class="fa fa-envelope pull-left"></i>Email Notice', array('controller' => 'event_attendances', 'action' => 'email_training_notice', $eventInfo[0]['Event']['id']), array('data-toggle'=>'ajaxModal', 'escape' => false, 'confirm' => 'Are you sure you wish to email this notice to the respective SMs?')); ?>
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
                $str = $eventInfo[0]['Course']['name'];
                $cont =  strtolower($str); 
                echo ucwords($cont).' ('.$eventInfo[0]['Course']['code'].')';

                //$myAttendance = $this->requestAction('/rail_competency/event_attendances/object/'.$eventInfo[0]['Event']['id']);
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
                    <?php echo h($eventInfo[0]['Venue']['name']); ?>
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
                    <?php echo h($eventInfo[0]['Venue']['location']); ?>
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
                    <?php echo $eventInfo[0]['Course']['details']; ?>
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
                  <h4><?php echo $this->Time->format('d-m-Y', $eventInfo[0]['Event']['start_date']); ?></h4>
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
                  <h4><?php echo $this->Time->format('d-m-Y', $eventInfo[0]['Event']['end_date']); ?></h4>
                  <span style="font-size:60px;"><i class="fa fa-calendar-o text-info"></i></span>
                </div>
              </section>
            </div>
          </div>

          <div class="row">
            <div class="col-sm-12 portlet">
              <section class="panel panel-default portlet-item">
                <header class="panel-heading">
                  Participants
                </header>
                <div class="panel-body text-center">
                  <h4><?php echo $this->requestAction('/rail_competency/event_attendances/count_attendance/'.$event_id).':'.$eventInfo[0]['Course']['pax']; ?></h4>
                  <span style="font-size:60px;"><i class="fa fa-users text-dark"></i></span>
                </div>
              </section>
            </div>
          </div>
        </section>
      </div>

      <div class="tab-pane padder <?php echo ($myActive=='Nominations'?'active':''); ?>" id="nominations">
        <h3><?php echo __('Find Participant'); ?></h3>
        <section class="panel panel-default ">
          <?php echo $this->Form->create('Staff', array('class' => 'bs-example form-horizontal', 'inputDefaults' => array('label' => false, 'div' => false))); ?>
          <header class="panel-footer">
            <div class="row">
              <div class="col-sm-12 text-right text-center-xs">        
                <div class="input-group">
                    <?php 
                      echo $this->Form->input('queryString', array('class' => 'input-sm form-control', 'placeholder' => 'E.g: 10010060 or Ahmad','data-toggle'=>'tooltip', 'data-placement'=>'bottom', 'title'=>'Type in staff number or name...')); 
                    ?>
                  <span class='input-group-btn'>
                    <?php echo $this->Form->button('Search!', array('class' => 'btn btn-sm bg-success', 'style'=>'color:#fff;','data-toggle'=>'tooltip', 'data-placement'=>'left', 'title'=>'Click here to search the participant.'));?>
                  </span>
                </div>
              </div>
            </div>
          </header>
          <?php echo $this->Form->end();?>
        <!-- The staff list is visible when $staffs is not empty -->
          <?php if (!empty($staffs)) { ?>
        <!-- search data -->
          <?php echo $this->Form->create('EventAttendance', array('type' => 'file', 'class' => 'bs-example form-horizontal', 'inputDefaults' => array('label' => false, 'div' => false))); ?>
          <header class="panel-footer">
            <div class="row">
              <div class="col-sm-12 text-left">
                <?php echo $this->Form->button('Enroll Now', array('class' => 'btn btn-default', 'style'=>'color:#fff;','data-toggle'=>'tooltip', 'data-placement'=>'top', 'title'=>'Click here to submit the name.'));?>
              </div>
            </div>
          </header>
          <div class="table-responsive">
            <table class="table table-striped b-t b-light" style="overflow-x:auto;overflow-y: hidden">
              <thead>
                <tr>
                  <th width="20"><input type="checkbox"></th>
                  <th class="th-sortable" data-toggle="class">Department</th>
                  <th class="th-sortable" data-toggle="class">Staff Number</th>
                  <th class="th-sortable" data-toggle="class">Staff Name</th>
                  <th> Action </th>
                </tr>
              </thead>
              <tbody>
                <?php 
                  $iterate = 0;
                  foreach ($staffs as $staff) {
                ?>
                <tr>
                  <td>
                    <?php echo $this->Form->checkbox('EventAttendance.'.$iterate.'.is_enrolled', array('class' => 'input-sm form-control', 'label' => false,'data-toggle'=>'tooltip', 'data-placement'=>'right', 'title'=>'Choose this staff!')); ?>
                    <?php echo $this->Form->hidden('EventAttendance.'.$iterate.'.staff_id', array('class' => 'col-lg-2 control-label form-control', 'value' => $staff['Staff']['id'], 'label' => false)); ?>
                    <?php echo $this->Form->hidden('EventAttendance.'.$iterate.'.event_id', array('class' => 'col-lg-2 control-label form-control', 'value' => $event_id, 'label' => false)); ?>
                    <?php echo $this->Form->hidden('EventAttendance.'.$iterate.'.signed_by', array('class' => 'col-lg-2 control-label form-control', 'value' => $this->Session->read('Auth.User.id'), 'label' => false)); ?>
                    <?php echo $this->Form->hidden('EventAttendance.'.$iterate.'.active', array('class' => 'col-lg-2 control-label form-control', 'value' => true, 'label' => false)); ?>
                  </td>
                  <td>
                    <?php echo $staff['Staff']['parent_code'].' - '.$staff['Staff']['org_code']; ?>
                  </td>
                  <td>
                    <?php echo $staff['Staff']['staff_no']; ?>
                  </td>
                  <td>
                    <?php echo $staff['Staff']['name']; ?>
                  </td>
                  <td>
                    <?php 
                      $myRecord = $this->requestAction('/rail_competency/staff_training_profiles/check_record/'.$staff['Staff']['id']);
                      if ($myRecord) {
                    ?>
                      <?php 
                        echo $this->Html->link($this->Form->button('<i class="fa fa-trash-o"></i>', array('class'=>'btn btn-xs btn-danger', 'style'=>'color:#000; width:25px; height:25px;','data-toggle'=>'tooltip', 'data-placement'=>'right', 'title'=>'Remove')), array('controller' => 'staffs', 'action' => 'remove_staff', $event_id, $staff['Staff']['id']), array('escape' => false, 'confirm' => __('Are you sure you want to delete it?'))); 
                      ?>
                    <?php } ?>

                  </td>
                </tr>
                <?php $iterate++; } ?>
              </tbody>
            </table>
          </div>
          <footer class="panel-footer">
            <div class="row">
              <div class="col-sm-12 text-left">
                <?php echo $this->Form->button('Enroll Now', array('class' => 'btn btn-default', 'style'=>'color:#fff;','data-toggle'=>'tooltip', 'data-placement'=>'top', 'title'=>'Click here to submit the name.'));?>
              </div>
            </div>
          </footer>
          <?php } else {?>
          <header class="panel-footer">
            <div class="row">
              <div class="col-sm-12 text-left hidden-xs">
              </div>
              
            </div>
          </header>
          <?php } ?>
        <!-- search data -->
          <?php echo $this->Form->end(); ?>
        </section>
      </div>

      <div class="tab-pane padder <?php echo ($myActive=='Participants'?'active':''); ?>" id="participants">
        <h3><?php echo __('Participant List'); ?></h3>
        <section class="panel panel-default ">
          <?php echo $this->Form->create('EventAttendance', array('action' => 'doAction', 'class' => 'bs-example form-horizontal', 'inputDefaults' => array('label' => false, 'div' => false))); ?>
          <header class="panel-header">
            &nbsp;
          </header>
          <div class="table-responsive">
            <table class="table table-striped b-t b-light">
              <thead>
                <tr>
                  <th width="20"><input type="checkbox"></th>
                  <th> Department</th>  
                  <th> Staff Number</th>  
                  <th> Staff Name</th>  
                  <th> Confirmed?</th>
                </tr>
              </thead>
              <tbody>
                  <?php 
                    $participant = 0;
                    if (!empty($attendees)) 
                      foreach ($attendees as $eventAttendance): 
                  ?>
                  <tr>
                    <td class="actions">
                      <?php 
                      //echo $this->Form->postLink($this->Form->button('<i class="fa fa-trash-o"></i>', array('class'=>'btn btn-xs btn-danger', 'style'=>'color:#000; width:25px; height:25px;','data-toggle'=>'tooltip', 'data-placement'=>'right', 'title'=>'Remove')), array('controller' => 'event_attendances', 'action' => 'delete', $eventAttendance['EventAttendance']['id']), array('escape' => false, 'confirm' => __('Are you sure you want to delete # %s?', $eventAttendance['EventAttendance']['id']))); ?>
                    
                      <?php echo $this->Form->checkbox('EventAttendance.'.$participant.'.myOption', array('class' => 'input-sm form-control', 'label' => false,'data-toggle'=>'tooltip', 'data-placement'=>'right', 'title'=>'Choose this staff!')); ?>
                      <?php echo $this->Form->hidden('EventAttendance.'.$participant.'.id', array('value' => $eventAttendance['EventAttendance']['id'])); ?>
                    <td>
                      <?php echo $eventAttendance['Staff']['parent_code'] .'-'. $eventAttendance['Staff']['org_code']; ?>
                    </td>
                    <td>
                      <?php echo $eventAttendance['Staff']['staff_no']; ?>
                    </td>
                    <td>
                      <?php echo $this->Html->link($eventAttendance['Staff']['name'], array('controller' => 'staffs', 'action' => 'view', $eventAttendance['Staff']['id'])); ?>
                    </td>
                          <?php if ($eventAttendance['EventAttendance']['active'] == 1) { ?>
                            <td><i class='fa fa-check bg-success btn btn-default' style='color:#fff; width:25px; height:25px;padding:5px'></i> &nbsp;</td>
                          <?php } else { ?>
                            <td><i class='fa fa-times bg-danger btn btn-default' style='color:#fff; width:25px; height:25px;padding:5px'></i> &nbsp;</td>
                          <?php } ?>
                  </tr>
                  <?php 
                    $participant++;
                    endforeach; 
                  ?>
              </tbody>
            </table>
          </div>
          <footer class="panel-footer">
            <div class="row">
              <div class="col-sm-4 text-left hidden-xs">
                <?php $doAction = array(
                  '0' => 'Bulk Action', 
                  '1' => 'Delete selected', 
                  // '2' => 'Confirm Participation', 
                  // '3' => 'Cancel Participation'
                  ); ?>
                  <?php echo $this->Form->input('EventAttendance.bulk', array('options' => $doAction, 'class' => 'input-sm form-control input-s-sm inline v-middle')); ?>
                  <?php echo $this->Form->hidden('Event.id', array('value' => $event_id)); ?>
                  <?php echo $this->Form->button('Apply', array('class' => 'btn btn-sm btn-default'));?>
              </div>
              <div class="col-sm-4 text-center">
                <small class="text-muted inline m-t-sm m-b-sm">
                  <?php
                    echo $this->Paginator->counter(array(
                      'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
                    ));
                  ?>                      
                </small>
              </div>
              <div class="col-sm-4 text-right text-center-xs">                
                <ul class="pagination pagination-sm m-t-none m-b-none">
                  
                  <?php
                    echo '<li>'.$this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled')).'</li>';
                    echo '<li>'.$this->Paginator->numbers(array('separator' => '</li>
                                        <li>')).'</li>';
                    echo '<li>'.$this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled')).'</li>';
                  ?>
                </ul>
              </div>
            </div>
          </footer>
          <?php echo $this->Form->end(); ?>
        </section>
      </div>

    </div>
  </article>
</section>


  