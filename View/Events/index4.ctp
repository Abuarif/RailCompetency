            <ul class="breadcrumb no-border no-radius b-b b-light pull-in">
              <li><a href="<?php echo $this->webroot; ?>"<i class="fa fa-home"></i> Home</a></li>
              <li class="active">Event List</li>
            </ul>
            <div class="m-b-md">
              <h3 class="m-b-none">Event List</h3>
            </div>
            <!-- Event list -->
            <!-- search course code and name with memo and active event -->
            <section class="panel panel-default">
              <div class="panel-body">
                <div class="col-sm-2 m-b-xs">
                  <div class="btn-group">
                    <?php 
                      echo $this->Html->link(' Refresh', array('controller' => 'events', 'action' => 'index'), array('class' => 'btn btn-sm btn-default fa fa-refresh', 'data-toggle' => 'tooltip', 'data-placement' => 'bottom', 'title' => 'Refresh page', 'escape' => false));
                    ?>
                  </div>
                </div>
                <!-- <div class="col-sm-4">
                  &nbsp;
                </div> -->
                <div class="col-sm-10 pull-in">
                  <?php echo $this->Form->create('Event', array('class' => 'form-inline','inputDefaults' => array('label' => false, 'div' => false))); ?>
                    <!-- <div class="checkbox"> -->
                    <div class="form-group">
                      <?php
                        $options = array('-99' => '&nbsp;View All&nbsp;', '-1' => '&nbsp;Last Month&nbsp;', '0' => '&nbsp;This Month&nbsp;', '1' => '&nbsp;Next Month&nbsp;');
                        $attributes = array('legend' => false, 'data-toggle'=>'tooltip', 'data-placement'=>'top', 'title'=>'Check to view the events', 'value' => -99);
                        echo $this->Form->radio('when', $options, $attributes);
                      ?>
                    <!-- </div>
                      <br/>
                    <div class="form-group"> 
                      <label>
                        <?php //echo $this->Form->checkbox('memo', array('data-toggle'=>'tooltip', 'data-placement'=>'bottom', 'title'=>'Click here to view events with memo')); ?>&nbsp;Event with Memo!
                      </label> -->
                      <label>
                        <?php echo $this->Form->checkbox('active', array('data-toggle'=>'tooltip', 'data-placement'=>'bottom', 'title'=>'Click here to view confirmed events.')); ?>&nbsp;Active Event Only!
                      </label>
                      <!-- <label>
                        <?php //echo $this->Form->checkbox('participant', array('data-toggle'=>'tooltip', 'data-placement'=>'bottom', 'title'=>'Click here to events with participants.')); ?>&nbsp;Participants > 0!
                      </label>
                      <label>
                        <?php //echo $this->Form->checkbox('trainer', array('data-toggle'=>'tooltip', 'data-placement'=>'bottom', 'title'=>'Click here to view events with trainers.')); ?>&nbsp;Trainers > 0!
                      </label> -->
                    </div>
                    <br/>
                    <div class="form-group">
                      <!-- <label class="sr-only" for="exampleInputPassword2">Password</label> -->
                    <?php echo $this->Form->input('queryString', array('class' => 'input-sm form-control', 'placeholder' => 'Search')); ?>
                      <!-- <input type="password" class="form-control" id="exampleInputPassword2" placeholder="Password"> -->
                    </div>
                    <span class='form-group-btn'>
                    <?php echo $this->Form->button('Go!', array('class' => 'btn btn-sm btn-default bg-success', 'style' => 'color:#fff!important'));?>
                  </span>
                  <?php echo $this->Form->end();?>
                </div>                 
              </div>
            </section>
            <section class="scrollable wrapper">
              <div class="row">
                    <div class="col-sm-6 portlet">
                      <!-- portlet item -->
                  <?php $iterate = 0; ?>
                  <?php foreach ($events as $event): ?>
                      <?php if ($iterate%2==false) : ?> 
                        <section class="panel panel-default portlet-item" style="background-color: #C0F7FE">
                          <!-- .accordion -->
                          <div class="panel-group m-b" id="accordion<?php echo $iterate;?>" style="background-color: #C0F7FE">
                            <div class="panel panel-default" >
                              <div class="panel-heading" style="background-color: #C0F7FE">
                                <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion<?php echo $iterate;?>" href="#collapse<?php echo $iterate;?>">
                                  <span data-toggle="tooltip" title="Click here to view more details..." data-placement = 'top'>
                                    <?php echo $event['Course']['name']; ?>
                                  </span>
                                  <br/>
                                  <span class="badge <?php echo (($event['Event']['active'] == 1) ? 'bg-success': 'bg-danger'); ?>"><?php echo $event['Course']['code']; ?></span>&nbsp; 
                                  <?php if (!empty($event['EventMemo'])) { ?>        
                                    <span class="badge <?php echo (($event['EventMemo'][0]['active'] == 1) ? 'bg-success': 'bg-danger'); ?>">Memo</span>   
                                  <?php } ?> 
                                </a>
                              </div>
                              <div id="collapse<?php echo $iterate;?>" class="panel-collapsed collapse">
                                <div class="panel-body text-sm">
                                  <!-- title -->
                                  <article class="media">
                                    <div class="media-body">
                                      <div class="inline">
                                        <div class="h4 m-t m-b-xs">
                                          <b><?php echo $event['Course']['code'].' - '.$event['Course']['name']; ?></b>&nbsp;
                                        </div>                      
                                      </div>
                                    </div>
                                  </article>
                                  <div class="line pull-in"></div>
                                  <!-- menu -->
                                  <article class="media">
                                    <div class="pull-left">
                                      <!-- <a href="#" class="h4">Actions&nbsp;</a> -->
                                      <?php echo $this->Html->link($this->Form->button('<i class="fa fa-desktop"></i>', array('class'=>'btn btn-xs btn-success', 'style'=>'color:#000; width:25px; height:25px;','data-toggle'=>'tooltip', 'data-placement'=>'right', 'title'=>'View Details')), array('action' => 'view', $event['Event']['id']), array('escape' => false)); ?>
                                      <?php echo $this->Html->link($this->Form->button('<i class="fa fa-files-o"></i>', array('class'=>'btn btn-xs btn-primary', 'style'=>'color:#000; width:25px; height:25px;','data-toggle'=>'tooltip', 'data-placement'=>'right', 'title'=>'Copy Entry')), array('action' => 'copy', $event['Event']['id']), array('data-toggle'=>'ajaxModal', 'escape' => false)); ?>
                                      <?php echo $this->Html->link($this->Form->button('<i class="fa fa-pencil"></i>', array('class'=>'btn btn-xs btn-warning', 'style'=>'color:#000; width:25px; height:25px;','data-toggle'=>'tooltip', 'data-placement'=>'right', 'title'=>'Modify Details')), array('action' => 'edit', $event['Event']['id']), array('data-toggle'=>'ajaxModal', 'escape' => false)); ?>

                                      <?php echo $this->Html->link($this->Form->button('<i class="fa  fa-user-md"></i>', array('class'=>'btn btn-xs btn-default', 'style'=>'color:#000; width:25px; height:25px;','data-toggle'=>'tooltip', 'data-placement'=>'right', 'title'=>'Assign Trainers')), array('controller' => 'event_trainers', 'action' => 'assign', $event['Event']['id'], $event['Course']['id']), array('data-toggle'=>'ajaxModal','escape' => false)); ?>

                                      <?php echo $this->Html->link($this->Form->button('<i class="fa fa-sign-in"></i>', array('class'=>'btn btn-xs btn-info', 'style'=>'color:#000; width:25px; height:25px;','data-toggle'=>'tooltip', 'data-placement'=>'right', 'title'=>'Participant Attendance')), array('action' => 'attendance', $event['Event']['id']), array('escape' => false)); ?>
                                      <?php if ($event['Event']['active'] == 1) { ?>
                                        <!-- <i class='fa fa-check bg-success' style='color:#fff; width:25px; height:25px;padding:5px'></i>  -->
                                        <?php echo $this->Form->postLink('', array('controller' => 'events', 'action' => 'revert_scheduled_event', $event['Event']['id']), array('class' =>'fa fa-check bg-success', 'style' =>'color:#fff; width:25px; height:24px;padding:5px', 'data-toggle'=>'tooltip', 'data-placement'=>'right', 'title'=>'Revert Scheduled Event', 'escape' => false, 'confirm' => 'Are you sure you wish to revert the scheduled event?')); ?>
                                      <?php } else { ?>
                                        <!-- <i class='fa fa-times bg-danger' style='color:#fff; width:25px; height:25px;padding:5px'></i>  -->
                                        <?php echo $this->Form->postLink('', array('controller' => 'events', 'action' => 'confirmed_event', $event['Event']['id']), array('class'=>'btn btn-danger fa fa-times', 'style' =>'color:#fff; width:25px; height:24px;padding:5px','data-toggle'=>'tooltip', 'data-placement'=>'right', 'title'=>'Confirmed Schedule', 'escape' => false, 'confirm' => 'Are you sure you wish to confirm the event?')); ?>
                                      <?php } ?>
                                      <!-- available only if memo is empty -->
                                      <?php if (empty($event['EventMemo']) && count($event['EventAttendance']) > 0) { ?>
                                        <?php echo $this->Html->link($this->Form->button('<i class="fa fa-edit"></i>', array('class'=>'btn btn-xs btn-success', 'style'=>'color:#000; width:25px; height:25px;','data-toggle'=>'tooltip', 'data-placement'=>'right', 'title'=>'Create Memo')), array('controller' => 'event_memos', 'action' => 'add', $event['Event']['id']), array('data-toggle'=>'ajaxModal', 'escape' => false)); ?>
                                      <?php } ?>
                                      <?php 
                                      // The memo button is active only when event memo is available and participant > 0
                                      if ( !empty($event['EventMemo']) && count($event['EventAttendance']) > 0) 
                                          if ($event['EventMemo'][0]['active'] == 1) { ?>
                                        <!-- <i class='fa fa-check bg-success' style='color:#fff; width:25px; height:25px;padding:5px'></i>  -->
                                        <?php echo $this->Form->postLink('Cancel Memo', array('controller' => 'event_memos', 'action' => 'reverted_memo', $event['EventMemo'][0]['id']), array('class' =>'bg-success', 'style' =>'color:#fff; width:25px; height:25px;padding:5px', 'data-toggle'=>'tooltip', 'data-placement'=>'right', 'title'=>'Cancelled event memo issuance.', 'escape' => false, 'confirm' => 'Are you sure you wish to recall the memo?')); ?>
                                        <?php echo $this->Form->postLink('Generate Memo', array('controller' => 'events', 'action' => 'memo', $event['Event']['id'].'.pdf'), array('target' => '_blank', 'class' =>'bg-success', 'style' =>'color:#fff; width:25px; height:25px;padding:5px', 'data-toggle'=>'ajaxModal', 'data-toggle'=>'tooltip', 'data-placement'=>'right', 'title'=>'Generate event memo for distribution.', 'escape' => false, 'confirm' => 'Are you sure you wish to generate the memo?')); ?>
                                      <?php } else { ?>
                                        <!-- <i class='fa fa-times bg-danger' style='color:#fff; width:25px; height:25px;padding:5px'></i>  -->
                                        <?php echo $this->Form->postLink('Approve Memo', array('controller' => 'event_memos', 'action' => 'confirmed_memo', $event['EventMemo'][0]['id']), array('class'=>'btn-danger', 'style' =>'color:#fff; width:25px; height:25px;padding:5px','data-toggle'=>'tooltip', 'data-placement'=>'right', 'title' =>$event['EventMemo'][0]['memo'], 'escape' => false, 'confirm' => 'Are you sure you wish to confirm the memo?')); ?>
                                      <?php } ?>
                                    </div>
                                  </article>
                                  <!-- venue -->
                                  <article class="media">
                                    <div class="media-body">
                                      <a href="#" class="h4">Venue</a>
                                      <?php if (!empty($event['Venue'])) { ?>
                                        <small class="block m-t-xs"><?php echo h($event['Venue']['name']); ?></small>
                                        <small class="block m-t-xs"><?php echo h($event['Venue']['location']); ?></small>
                                      <?php } else { ?>
                                        <small class="block m-t-xs">Venue is to be determined soon.</small>
                                      <?php } ?>
                                    </div>
                                  </article>
                                  <!-- event details -->
                                  <article class="media">
                                    <div class="media-body">
                                      <a href="#" class="h4">Event Details</a>
                                      <small class="block m-t-xs"><?php echo h($event['Event']['details']); ?></small>
                                    </div>
                                  </article>
                                  <article class="media">
                                    <div class="panel-group m-b" id="accordionSub<?php echo $iterate;?>">
                                      <!-- trainer list -->
                                      <div class="panel panel-default">
                                        <div class="panel-heading">
                                          <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordionSub<?php echo $iterate;?>" href="#collapseASub<?php echo $iterate;?>">
                                            <span data-toggle="tooltip" title="Click here to view more details..." data-placement = 'top'>Trainers</span>
                                          </a>
                                        </div>
                                        <div id="collapseASub<?php echo $iterate;?>" class="panel-collapsed collapse">
                                          <?php if (!empty($event['EventTrainer'])) { ?>
                                              <div class="table-responsive">
                                                <table class="table table-striped b-t b-light">
                                                  <thead>
                                                    <tr>
                                                      <th>Action</th>
                                                      <th><?php echo __('Department'); ?></th>
                                                      <th><?php echo __('Staff Number'); ?></th>
                                                      <th><?php echo __('Name'); ?></th>
                                                    </tr>
                                                  </thead>
                                                  <tbody>
                                                    <?php foreach ($event['EventTrainer'] as $eventTrainer): ?>
                                                    <?php if ($eventTrainer['trainer_id'] != 0) { ?>
                                                    <tr>
                                                      <td class="actions">
                                                        <?php echo $this->Html->link('', array('controller' => 'event_trainers', 'action' => 'edit', $eventTrainer['id']), array('class'=>'btn btn-xs btn-warning fa fa-pencil', 'style'=>'color:#000;width:25px; height:25px; padding-top:5px','data-toggle'=>'tooltip', 'data-placement'=>'right', 'title'=>'Modify Details', 'data-toggle'=>'ajaxModal', 'escape' => false)); ?>
                                                      </td>
                                                      <td>
                                                        <?php 
                                                          $trainers = $this->requestAction(
                                                            array('controller' => 'trainers', 
                                                              'action' => 'object', $eventTrainer['trainer_id']));
                                                          echo $trainers['Staff']['org_code'];

                                                           ?>
                                                        </td>
                                                        <td> <?php
                                                          echo $trainers['Staff']['staff_no']; ?>
                                                        </td>
                                                        <td><?php
                                                          echo $trainers['Staff']['name'];
                                                          // echo $eventAttendance['staff_id']; 
                                                        ?>
                                                      </td>
                                                    </tr>
                                                    <?php } else { ?>
                                                    <tr>
                                                      <td colspan="4">Trainer profile is not available yet...</td>
                                                    </tr>
                                                    <?php } ?>
                                                  <?php endforeach; ?>
                                                  </tbody>
                                                </table>
                                              </div>
                                            <!-- </article> -->
                                            <?php } else { ?>
                                              Please proceed to Trainer Nomination...
                                            <?php } ?>
                                        </div>
                                      </div>
                                      <!-- participant list -->
                                      <div class="panel panel-default">
                                        <div class="panel-heading">
                                          <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordionSub<?php echo $iterate;?>" href="#collapseBSub<?php echo $iterate;?>">
                                            <span data-toggle="tooltip" title="Click here to view more details..." data-placement = 'right'>Participants</span>
                                          </a>
                                        </div>
                                        <div id="collapseBSub<?php echo $iterate;?>" class="panel-collapsed collapse">
                                          <?php if (!empty($event['EventAttendance'])) { ?>
                                              <div class="table-responsive">
                                                <table class="table table-striped b-t b-light">
                                                  <thead>
                                                    <tr>
                                                      <th>Action</th>
                                                      <th><?php echo __('Department'); ?></th>
                                                      <th><?php echo __('Staff Number'); ?></th>
                                                      <th><?php echo __('Name'); ?></th>
                                                    </tr>
                                                  </thead>
                                                  <tbody>
                                                    <?php foreach ($event['EventAttendance'] as $eventAttendance): ?>
                                                    <?php if (isset($eventAttendance['staff_id'])) { ?>
                                                    <tr>
                                                      <td class="actions">
                                                        <?php echo $this->Html->link('', array('controller' => 'event_attendances', 'action' => 'edit', $eventAttendance['id']), array('class'=>'btn btn-xs btn-warning fa fa-pencil', 'style'=>'color:#000;width:25px; height:25px; padding-top:5px','data-toggle'=>'tooltip', 'data-placement'=>'right', 'title'=>'Modify Details', 'data-toggle'=>'ajaxModal', 'escape' => false)); ?>
                                                      </td>
                                                      <td>
                                                        <?php 
                                                          $participant = $this->requestAction(
                                                            array('plugin' => 'rail_competency',  'controller' => 'staffs', 
                                                              'action' => 'object', $eventAttendance['staff_id']));
                                                          echo $participant['Staff']['parent_code'].' - '.$participant['Staff']['org_code']; 

                                                          ?>
                                                        </td>
                                                        <td> <?php
                                                          echo $participant['Staff']['staff_no']; ?>
                                                        </td>
                                                        <td><?php
                                                          echo $participant['Staff']['name'];
                                                          // echo $eventAttendance['staff_id']; 
                                                        ?>
                                                      </td>
                                                    </tr>
                                                    <?php } else { ?>
                                                    <tr>
                                                      <td colspan="4">Staff profile is not available yet...</td>
                                                    </tr>
                                                    <?php } ?>
                                                  <?php endforeach; ?>
                                                  </tbody>
                                                </table>
                                              </div>
                                            <!-- </article> -->
                                            <?php } else { ?>
                                              Please proceed to Event Nomination...
                                            <?php } ?>
                                        </div>
                                      </div>
                                      <!-- attendant list -->
                                    </div>
                                  </article>
                                </div>
                              </div>
                              <footer class="panel-footer bg-info text-center">
                                <div class="row pull-out">
                                  <div class="col-xs-6">
                                    <div class="padder-v">
                                      <span class="m-b-xs h3 block text-white">
                                        <?php echo $this->Time->nice($event['Event']['start_date']); ?>
                                      </span>
                                      <small class="text-muted">Start Date</small>
                                    </div>
                                  </div>
                                  <div class="col-xs-6 dk">
                                    <div class="padder-v">
                                      <span class="m-b-xs h3 block text-white">
                                        <?php echo $this->Time->nice($event['Event']['end_date']); ?>
                                      </span>
                                      <small class="text-muted">End Date</small>
                                    </div>
                                  </div>
                                </div>
                                <div class="row pull-out">
                                  <div class="col-xs-6 dk">
                                    <div class="padder-v">
                                      <span class="m-b-xs h3 block text-white">
                                        <?php echo count($event['EventAttendance']).':'.$event['Event']['pax']; ?>
                                      </span>
                                      <small class="text-muted">Participants</small>
                                    </div>
                                  </div>
                                  <div class="col-xs-6">
                                    <div class="padder-v">
                                      <span class="m-b-xs h3 block text-white">
                                        <?php echo count($event['EventTrainer']); ?>
                                      </span>
                                      <small class="text-muted">Trainers</small>
                                    </div>
                                  </div>
                                </div>
                              </footer>
                            </div>
                          </div>
                          <!-- / .accordion -->
                        </section>
                      <?php endif; ?>
                    <?php $iterate++; ?>
                  <?php endforeach; ?>
                      <!-- portlet item -->
                    </div>
                    <div class="col-sm-6 portlet">
                      <!-- portlet item -->
                  <?php $iterate = 0; ?>
                  <?php foreach ($events as $event): ?>
                      <?php if ($iterate%2==true) : ?> 
                        <section class="panel panel-default portlet-item" style="background-color: #C0F7FE">
                          <!-- .accordion -->
                          <div class="panel-group m-b" id="accordionB<?php echo $iterate;?>">
                            <div class="panel panel-default">
                              <div class="panel-heading" style="background-color: #C0F7FE">
                                <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordionB<?php echo $iterate;?>" href="#collapseB<?php echo $iterate;?>">
                                  <span data-toggle="tooltip" title="Click here to view more details..." data-placement = 'top'>
                                    <?php echo $event['Course']['name']; ?>
                                  </span>
                                  <br/>
                                  <span class="badge <?php echo (($event['Event']['active'] == 1) ? 'bg-success': 'bg-danger'); ?>"><?php echo $event['Course']['code']; ?></span>&nbsp; 
                                  <?php if (!empty($event['EventMemo'])) { ?>        
                                    <span class="badge <?php echo (($event['EventMemo'][0]['active'] == 1) ? 'bg-success': 'bg-danger'); ?>">Memo</span>   
                                  <?php } ?> 
                                </a>
                              </div>
                              <div id="collapseB<?php echo $iterate;?>" class="panel-collapsed collapse">
                                <div class="panel-body text-sm">
                                  <!-- title -->
                                  <article class="media">
                                    <div class="media-body">
                                      <div class="inline">
                                        <div class="h4 m-t m-b-xs">
                                          <b><?php echo $event['Course']['code'].' - '.$event['Course']['name']; ?></b>&nbsp;
                                        </div>                      
                                      </div>
                                    </div>
                                  </article>
                                  <div class="line pull-in"></div>
                                  <!-- menu -->
                                  <article class="media">
                                    <div class="pull-left">
                                      <!-- <a href="#" class="h4">Actions&nbsp;</a> -->
                                      <?php echo $this->Html->link($this->Form->button('<i class="fa fa-desktop"></i>', array('class'=>'btn btn-xs btn-success', 'style'=>'color:#000; width:25px; height:25px;','data-toggle'=>'tooltip', 'data-placement'=>'right', 'title'=>'View Details')), array('action' => 'view', $event['Event']['id']), array('escape' => false)); ?>
                                      <?php echo $this->Html->link($this->Form->button('<i class="fa fa-files-o"></i>', array('class'=>'btn btn-xs btn-primary', 'style'=>'color:#000; width:25px; height:25px;','data-toggle'=>'tooltip', 'data-placement'=>'right', 'title'=>'Copy Entry')), array('action' => 'copy', $event['Event']['id']), array('data-toggle'=>'ajaxModal', 'escape' => false)); ?>
                                      <?php echo $this->Html->link($this->Form->button('<i class="fa fa-pencil"></i>', array('class'=>'btn btn-xs btn-warning', 'style'=>'color:#000; width:25px; height:25px;','data-toggle'=>'tooltip', 'data-placement'=>'right', 'title'=>'Modify Details')), array('action' => 'edit', $event['Event']['id']), array('data-toggle'=>'ajaxModal', 'escape' => false)); ?>
                                      <?php echo $this->Html->link($this->Form->button('<i class="fa  fa-user-md"></i>', array('class'=>'btn btn-xs btn-default', 'style'=>'color:#000; width:25px; height:25px;','data-toggle'=>'tooltip', 'data-placement'=>'right', 'title'=>'Assign Trainers')), array('controller' => 'event_trainers', 'action' => 'assign', $event['Event']['id'], $event['Course']['id']), array('data-toggle'=>'ajaxModal','escape' => false)); ?>
                                      
                                      <?php echo $this->Html->link($this->Form->button('<i class="fa fa-sign-in"></i>', array('class'=>'btn btn-xs btn-info', 'style'=>'color:#000; width:25px; height:25px;','data-toggle'=>'tooltip', 'data-placement'=>'right', 'title'=>'Participant Attendance')), array('action' => 'attendance', $event['Event']['id']), array('escape' => false)); ?>
                                      <?php if ($event['Event']['active'] == 1) { ?>
                                        <!-- <i class='fa fa-check bg-success' style='color:#fff; width:25px; height:25px;padding:5px'></i>  -->
                                        <?php echo $this->Form->postLink('', array('controller' => 'events', 'action' => 'revert_scheduled_event', $event['Event']['id']), array('class' =>'fa fa-check bg-success', 'style' =>'color:#fff; width:25px; height:24px;padding:5px', 'data-toggle'=>'tooltip', 'data-placement'=>'right', 'title'=>'Revert Scheduled Event', 'escape' => false, 'confirm' => 'Are you sure you wish to revert the scheduled event?')); ?>
                                      <?php } else { ?>
                                        <!-- <i class='fa fa-times bg-danger' style='color:#fff; width:25px; height:25px;padding:5px'></i>  -->
                                        <?php echo $this->Form->postLink('', array('controller' => 'events', 'action' => 'confirmed_event', $event['Event']['id']), array('class'=>'btn btn-danger fa fa-times', 'style' =>'color:#fff; width:25px; height:24px;padding:5px','data-toggle'=>'tooltip', 'data-placement'=>'right', 'title'=>'Confirmed Schedule', 'escape' => false, 'confirm' => 'Are you sure you wish to confirm the event?')); ?>
                                      <?php } ?>
                                      <!-- available only if memo is empty -->
                                      <?php if (empty($event['EventMemo']) && count($event['EventAttendance']) > 0) { ?>
                                        <?php echo $this->Html->link($this->Form->button('<i class="fa fa-edit"></i>', array('class'=>'btn btn-xs btn-success', 'style'=>'color:#000; width:25px; height:25px;','data-toggle'=>'tooltip', 'data-placement'=>'right', 'title'=>'Create Memo')), array('controller' => 'event_memos', 'action' => 'add', $event['Event']['id']), array('data-toggle'=>'ajaxModal', 'escape' => false)); ?>
                                      <?php } ?>
                                      <?php 
                                      // The memo button is active only when event memo is available and participant > 0
                                      if ( !empty($event['EventMemo']) && count($event['EventAttendance']) > 0) 
                                          if ($event['EventMemo'][0]['active'] == 1) { ?>
                                        <!-- <i class='fa fa-check bg-success' style='color:#fff; width:25px; height:25px;padding:5px'></i>  -->
                                        <?php echo $this->Form->postLink('Cancel Memo', array('controller' => 'event_memos', 'action' => 'reverted_memo', $event['EventMemo'][0]['id']), array('class' =>'bg-success', 'style' =>'color:#fff; width:25px; height:25px;padding:5px', 'data-toggle'=>'tooltip', 'data-placement'=>'right', 'title'=>'Cancelled event memo issuance.', 'escape' => false, 'confirm' => 'Are you sure you wish to recall the memo?')); ?>
                                        <?php echo $this->Form->postLink('Generate Memo', array('controller' => 'events', 'action' => 'memo', $event['Event']['id'].'.pdf'), array('target' => '_blank', 'class' =>'bg-success', 'style' =>'color:#fff; width:25px; height:25px;padding:5px', 'data-toggle'=>'ajaxModal', 'data-toggle'=>'tooltip', 'data-placement'=>'right', 'title'=>'Generate event memo for distribution.', 'escape' => false, 'confirm' => 'Are you sure you wish to generate the memo?')); ?>
                                      <?php } else { ?>
                                        <!-- <i class='fa fa-times bg-danger' style='color:#fff; width:25px; height:25px;padding:5px'></i>  -->
                                        <?php echo $this->Form->postLink('Approve Memo', array('controller' => 'event_memos', 'action' => 'confirmed_memo', $event['EventMemo'][0]['id']), array('class'=>'btn-danger', 'style' =>'color:#fff; width:25px; height:25px;padding:5px','data-toggle'=>'tooltip', 'data-placement'=>'right', 'title' =>$event['EventMemo'][0]['memo'], 'escape' => false, 'confirm' => 'Are you sure you wish to confirm the memo?')); ?>
                                      <?php } ?>
                                    </div>
                                  </article>
                                  <!-- venue -->
                                  <article class="media">
                                    <div class="media-body">
                                      <a href="#" class="h4">Venue</a>
                                      <?php if (!empty($event['Venue'])) { ?>
                                        <small class="block m-t-xs"><?php echo h($event['Venue']['name']); ?></small>
                                        <small class="block m-t-xs"><?php echo h($event['Venue']['location']); ?></small>
                                      <?php } else { ?>
                                        <small class="block m-t-xs">Venue is to be determined soon.</small>
                                      <?php } ?>
                                    </div>
                                  </article>
                                  <!-- detail -->
                                  <article class="media">
                                    <div class="media-body">
                                      <a href="#" class="h4">Event Details</a>
                                      <small class="block m-t-xs"><?php echo h($event['Event']['details']); ?></small>
                                    </div>
                                  </article>
                                  <!-- trainer & participant list -->
                                  <article class="media">
                                    <div class="panel-group m-b" id="accordionSub<?php echo $iterate;?>">
                                      <!-- trainer list -->
                                      <div class="panel panel-default">
                                        <div class="panel-heading">
                                          <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordionSub<?php echo $iterate;?>" href="#collapseASub<?php echo $iterate;?>">
                                            <span data-toggle="tooltip" title="Click here to view more details..." data-placement = 'top'>Trainers</span>
                                          </a>
                                        </div>
                                        <div id="collapseASub<?php echo $iterate;?>" class="panel-collapsed collapse">
                                          <?php if (!empty($event['EventTrainer'])) { ?>
                                              <div class="table-responsive">
                                                <table class="table table-striped b-t b-light">
                                                  <thead>
                                                    <tr>
                                                      <th>Action</th>
                                                      <th><?php echo __('Department'); ?></th>
                                                      <th><?php echo __('Staff Number'); ?></th>
                                                      <th><?php echo __('Name'); ?></th>
                                                    </tr>
                                                  </thead>
                                                  <tbody>
                                                    <?php foreach ($event['EventTrainer'] as $eventTrainer): ?>
                                                    <?php if (!empty($eventTrainer['trainer_id'])) { ?>
                                                    <tr>
                                                      <td class="actions">
                                                        <?php echo $this->Html->link('', array('controller' => 'event_trainers', 'action' => 'edit', $eventTrainer['id']), array('class'=>'btn btn-xs btn-warning fa fa-pencil', 'style'=>'color:#000;width:25px; height:25px; padding-top:5px','data-toggle'=>'tooltip', 'data-placement'=>'right', 'title'=>'Modify Details', 'data-toggle'=>'ajaxModal', 'escape' => false)); ?>
                                                      </td>
                                                      <td>
                                                        <?php 
                                                          $trainers = $this->requestAction(
                                                            array('controller' => 'trainers', 
                                                              'action' => 'object', $eventTrainer['trainer_id']));
                                                          echo $trainers['Staff']['org_code'];

                                                           ?>
                                                        </td>
                                                        <td> <?php
                                                          echo $trainers['Staff']['staff_no']; ?>
                                                        </td>
                                                        <td><?php
                                                          echo $trainers['Staff']['name'];
                                                          // echo $eventAttendance['staff_id']; 
                                                        ?>
                                                      </td>
                                                    </tr>
                                                    <?php } else { ?>
                                                    <tr>
                                                      <td colspan="4">Trainer profile is not available yet...</td>
                                                    </tr>
                                                    <?php } ?>
                                                  <?php endforeach; ?>
                                                  </tbody>
                                                </table>
                                              </div>
                                            <!-- </article> -->
                                            <?php } else { ?>
                                              Please proceed to Trainer Nomination...
                                            <?php } ?>
                                        </div>
                                      </div>
                                      <!-- participant list -->
                                      <div class="panel panel-default">
                                        <div class="panel-heading">
                                          <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordionSub<?php echo $iterate;?>" href="#collapseBSub<?php echo $iterate;?>">
                                            <span data-toggle="tooltip" title="Click here to view more details..." data-placement = 'top'>Participants</span>
                                          </a>
                                        </div>
                                        <div id="collapseBSub<?php echo $iterate;?>" class="panel-collapsed collapse">
                                          <?php if (!empty($event['EventAttendance'])) { ?>
                                              <div class="table-responsive">
                                                <table class="table table-striped b-t b-light">
                                                  <thead>
                                                    <tr>
                                                      <th>Action</th>
                                                      <th><?php echo __('Department'); ?></th>
                                                      <th><?php echo __('Staff Number'); ?></th>
                                                      <th><?php echo __('Name'); ?></th>
                                                    </tr>
                                                  </thead>
                                                  <tbody>
                                                    <?php foreach ($event['EventAttendance'] as $eventAttendance): ?>
                                                    <?php if (isset($eventAttendance['staff_id'])) { ?>
                                                    <tr>
                                                      <td class="actions">
                                                        <?php echo $this->Html->link('', array('controller' => 'event_attendances', 'action' => 'edit', $eventAttendance['id']), array('class'=>'btn btn-xs btn-warning fa fa-pencil', 'style'=>'color:#000;width:25px; height:25px; padding-top:5px','data-toggle'=>'tooltip', 'data-placement'=>'right', 'title'=>'Modify Details', 'data-toggle'=>'ajaxModal', 'escape' => false)); ?>
                                                      </td>
                                                      <td>
                                                        <?php 
                                                          $participant = $this->requestAction(
                                                            array('controller' => 'staffs', 
                                                              'action' => 'object', $eventAttendance['staff_id']));
                                                          echo $participant['Staff']['parent_code'].' - '.$participant['Staff']['org_code']; ?>
                                                        </td>
                                                        <td> <?php
                                                          echo $participant['Staff']['staff_no']; ?>
                                                        </td>
                                                        <td><?php
                                                          echo $participant['Staff']['name'];
                                                          // echo $eventAttendance['staff_id']; 
                                                        ?>
                                                      </td>
                                                    </tr>
                                                    <?php } else { ?>
                                                    <tr>
                                                      <td colspan="4">Staff profile is not available yet...</td>
                                                    </tr>
                                                    <?php } ?>
                                                  <?php endforeach; ?>
                                                  </tbody>
                                                </table>
                                              </div>
                                            <!-- </article> -->
                                            <?php } else { ?>
                                              Please proceed to Event Nomination...
                                            <?php } ?>
                                        </div>
                                      </div>
                                    </div>
                                  </article>
                                </div>
                              </div>
                              <footer class="panel-footer bg-info text-center">
                                <div class="row pull-out">
                                  <div class="col-xs-6">
                                    <div class="padder-v">
                                      <span class="m-b-xs h3 block text-white">
                                        <?php echo $this->Time->nice($event['Event']['start_date']); ?>
                                      </span>
                                      <small class="text-muted">Start Date</small>
                                    </div>
                                  </div>
                                  <div class="col-xs-6 dk">
                                    <div class="padder-v">
                                      <span class="m-b-xs h3 block text-white">
                                        <?php echo $this->Time->nice($event['Event']['end_date']); ?>
                                      </span>
                                      <small class="text-muted">End Date</small>
                                    </div>
                                  </div>
                                </div>
                                <div class="row pull-out">
                                  <div class="col-xs-6 dk">
                                    <div class="padder-v">
                                      <span class="m-b-xs h3 block text-white">
                                        <?php echo count($event['EventAttendance']).':'.$event['Event']['pax']; ?>
                                      </span>
                                      <small class="text-muted">Participants</small>
                                    </div>
                                  </div>
                                  <div class="col-xs-6">
                                    <div class="padder-v">
                                      <span class="m-b-xs h3 block text-white">
                                        <?php echo count($event['EventTrainer']); ?>
                                      </span>
                                      <small class="text-muted">Trainers</small>
                                    </div>
                                  </div>
                                </div>
                              </footer>
                            </div>
                          </div>
                          <!-- / .accordion -->
                        </section>
                      <?php endif; ?>
                    <?php $iterate++; ?>
                  <?php endforeach; ?>
                      <!-- portlet item -->
                    </div>
              </div>
            </section>
            <footer class="panel-footer">
              <div class="row">
                <div class="col-sm-4 text-left hidden-xs">
                  &nbsp; 

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
          </section>


<?php
  echo $this->Html->script(array(
      // '../theme/LamanPuteri/js/fullcalendar/event_enrollment.js',
  ));
?>
