            <ul class="breadcrumb no-border no-radius b-b b-light pull-in">
              <li><a href="<?php echo $this->webroot; ?>"<i class="fa fa-home"></i> Home</a></li>
              <li class="active">Trainer Event Management</li>
            </ul>
            <div class="m-b-md">
              <h3 class="m-b-none">Trainer Event Management</h3>
            </div>
            <!-- Event list -->
            <!-- search course code and name with memo and active event -->
            <section class="panel panel-default">
              <div class="row wrapper">
                  <div class="col-sm-5 m-b-xs">
                    <?php echo $this->Html->link(' Event List', array('controller' => 'events', 'action' => 'trainer_event_list'), array('class' => 'btn btn-success fa fa-list', 'escape' => false)); ?>
                  </div>
                  <div class="col-sm-4 m-b-xs">
                    &nbsp;
                  </div>
                  <div class="col-sm-3">
                    &nbsp;
                  </div>
                </div>
            </section>
            <section class="scrollable wrapper">
              <div class="row">
                    <div class="col-sm-12 portlet">
                      <?php $iterate = 1; ?>
                      <!-- portlet item -->
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
                                      <?php //echo $this->Html->link($this->Form->button('<i class="fa fa-desktop"></i>', array('class'=>'btn btn-xs btn-success', 'style'=>'color:#000; width:25px; height:25px;','data-toggle'=>'tooltip', 'data-placement'=>'right', 'title'=>'View Details')), array('action' => 'view', $event['Event']['id']), array('escape' => false)); ?>
                                      <?php //echo $this->Html->link($this->Form->button('<i class="fa fa-files-o"></i>', array('class'=>'btn btn-xs btn-primary', 'style'=>'color:#000; width:25px; height:25px;','data-toggle'=>'tooltip', 'data-placement'=>'right', 'title'=>'Copy Entry')), array('action' => 'copy', $event['Event']['id']), array('data-toggle'=>'ajaxModal', 'escape' => false)); ?>
                                      <?php //echo $this->Html->link($this->Form->button('<i class="fa fa-pencil"></i>', array('class'=>'btn btn-xs btn-warning', 'style'=>'color:#000; width:25px; height:25px;','data-toggle'=>'tooltip', 'data-placement'=>'right', 'title'=>'Modify Details')), array('action' => 'edit', $event['Event']['id']), array('data-toggle'=>'ajaxModal', 'escape' => false)); ?>

                                      <?php //echo $this->Html->link($this->Form->button('<i class="fa  fa-user-md"></i>', array('class'=>'btn btn-xs btn-default', 'style'=>'color:#000; width:25px; height:25px;','data-toggle'=>'tooltip', 'data-placement'=>'right', 'title'=>'Assign Trainers')), array('controller' => 'event_trainers', 'action' => 'assign', $event['Event']['id'], $event['Course']['id']), array('data-toggle'=>'ajaxModal','escape' => false)); ?>

                                      <?php echo $this->Html->link($this->Form->button('<i class="fa fa-sign-in"></i>', array('class'=>'btn btn-xs btn-info', 'style'=>'color:#000; width:25px; height:25px;','data-toggle'=>'tooltip', 'data-placement'=>'right', 'title'=>'Participant Attendance')), array('action' => 'attendance', $event['Event']['id']), array('escape' => false)); ?>
                                      <?php if ($event['Event']['active'] == 1) { ?>
                                        <i class='fa fa-check bg-success' style='color:#fff; width:25px; height:25px;padding:5px'></i> 
                                        <?php //echo $this->Form->postLink('', array('controller' => 'events', 'action' => 'revert_scheduled_event', $event['Event']['id']), array('class' =>'fa fa-check bg-success', 'style' =>'color:#fff; width:25px; height:24px;padding:5px', 'data-toggle'=>'tooltip', 'data-placement'=>'right', 'title'=>'Revert Scheduled Event', 'escape' => false, 'confirm' => 'Are you sure you wish to revert the scheduled event?')); ?>
                                      <?php } else { ?>
                                        <i class='fa fa-times bg-danger' style='color:#fff; width:25px; height:25px;padding:5px'></i> 
                                        <?php //echo $this->Form->postLink('', array('controller' => 'events', 'action' => 'confirmed_event', $event['Event']['id']), array('class'=>'btn btn-danger fa fa-times', 'style' =>'color:#fff; width:25px; height:24px;padding:5px','data-toggle'=>'tooltip', 'data-placement'=>'right', 'title'=>'Confirmed Schedule', 'escape' => false, 'confirm' => 'Are you sure you wish to confirm the event?')); ?>
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
                      <!-- portlet item -->
                    </div>
              </div>
            </section>
          </section>


<?php
  echo $this->Html->script(array(
      // '../theme/LamanPuteri/js/fullcalendar/event_enrollment.js',
  ));
?>
