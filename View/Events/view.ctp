          <ul class="breadcrumb no-border no-radius b-b b-light pull-in">
            <li><a href="<?php echo $this->webroot; ?>"<i class="fa fa-home"></i> Home</a></li>
            <li class="active"><a href="#" onClick="location.reload();"><?php echo __('Event'); ?>'s Details</a></li>
          </ul>
          <div class="m-b-md">
            <h3 class="m-b-none"><?php echo __('Event'); ?>'s Details</h3>
          </div>
          <!-- start content view page -->
          <section class="vbox">
            <section class="scrollable">
              <section class="hbox stretch">
                <!-- start column 1 -->
                <aside class="aside-lg bg-light lter b-r">
                  <section class="vbox">
                    <section class="scrollable wrapper">
                      <!-- portlet -->
                      <div class="portlet">
                        <section class="panel panel-info portlet-item">
                            <header class="panel-heading">
                            Information
                            </header>
                            		<small class="text-uc text-xs text-muted"><?php echo __('Id'); ?></small>
                            		<p>
                            			<?php echo h($event['Event']['id']); ?>
                            			&nbsp;
                            		</p>
                            		<small class="text-uc text-xs text-muted"><?php echo __('Course'); ?></small>
                            		<p>
                            			<?php echo $this->Html->link($event['Course']['name'], array('controller' => 'courses', 'action' => 'view', $event['Course']['id'])); ?>
                            			&nbsp;
                            		</p>
                            		<small class="text-uc text-xs text-muted"><?php echo __('Venue'); ?></small>
                            		<p>
                            			<?php echo $this->Html->link($event['Venue']['name'].', '.$event['Venue']['location'], array('controller' => 'venues', 'action' => 'view', $event['Venue']['id'])); ?>
                            			&nbsp;
                            		</p>
                            		<small class="text-uc text-xs text-muted"><?php echo __('Pax'); ?></small>
                                <p>
                                  <?php echo h($event['Course']['pax']); ?>
                                  &nbsp;
                                </p>
                                <small class="text-uc text-xs text-muted"><?php echo __('Nomination'); ?></small>
                                <p>
                                  <?php echo count($event['EventAttendance']); ?>
                                  &nbsp;
                                </p>
                                <small class="text-uc text-xs text-muted"><?php echo __('Details'); ?></small>
                            		<p>
                            			<?php echo h($event['Event']['details']); ?>
                            			&nbsp;
                            		</p>
                            		<small class="text-uc text-xs text-muted"><?php echo __('Start Date'); ?></small>
                            		<p>
                            			<?php echo $this->Time->nice($event['Event']['start_date']); ?>
                            			&nbsp;
                            		</p>
                            		<small class="text-uc text-xs text-muted"><?php echo __('End Date'); ?></small>
                            		<p>
                            			<?php echo $this->Time->nice($event['Event']['end_date']); ?>
                            			&nbsp;
                            		</p>
                            		<small class="text-uc text-xs text-muted"><?php echo __('Last Enrollment'); ?></small>
                            		<p>
                            			<?php echo $this->Time->nice($event['Event']['last_enrollment']); ?>
                            			&nbsp;
                            		</p>
		
                        </section>
                        <section class="panel panel-info portlet-item">
                          <header class="panel-heading">
                            Quick links
                          </header>
                          <div class="list-group bg-white">
                           <?php echo $this->Html->link(__('Edit Event'), array('action' => 'edit', $event['Event']['id']), array('class'=>'list-group-item', 'data-toggle'=>'ajaxModal')); ?> <?php echo $this->Form->postLink(__('Delete Event'), array('action' => 'delete', $event['Event']['id']), array('class'=>'list-group-item'), __('Are you sure you want to delete # %s?', $event['Event']['id'])); ?>  <?php echo $this->Html->link(__('List Events'), array('action' => 'index'), array('class'=>'list-group-item')); ?> <?php echo $this->Html->link(__('New Event'), array('action' => 'add'), array('class'=>'list-group-item', 'data-toggle'=>'ajaxModal', 'escape' => false)); ?> <?php echo $this->Html->link(__('Course Calendar'), array('action' => 'calendar',1), array('class'=>'list-group-item', 'escape' => false)); ?>                              </div>
                        </section>
                        <section class="panel panel-info portlet-item">
                          <header class="panel-heading">
                            Associated links
                          </header>
                          <div class="list-group bg-white">
                          <?php echo $this->Html->link(__('List Courses'), array('controller' => 'courses', 'action' => 'index'), array('class' => 'list-group-item')); ?> &nbsp;&nbsp; <?php echo $this->Html->link(__('New Course'), array('controller' => 'courses', 'action' => 'add'), array('class' => 'list-group-item')); ?> &nbsp;&nbsp; <?php echo $this->Html->link(__('List Event Types'), array('controller' => 'event_types', 'action' => 'index'), array('class' => 'list-group-item')); ?> &nbsp;&nbsp; <?php echo $this->Html->link(__('New Event Type'), array('controller' => 'event_types', 'action' => 'add'), array('class' => 'list-group-item')); ?> &nbsp;&nbsp; <?php echo $this->Html->link(__('List Evaluations'), array('controller' => 'evaluations', 'action' => 'index'), array('class' => 'list-group-item')); ?> &nbsp;&nbsp; <?php echo $this->Html->link(__('New Evaluation'), array('controller' => 'evaluations', 'action' => 'add'), array('class' => 'list-group-item')); ?> &nbsp;&nbsp; <?php echo $this->Html->link(__('List Event Attendances'), array('controller' => 'event_attendances', 'action' => 'index'), array('class' => 'list-group-item')); ?> &nbsp;&nbsp; <?php echo $this->Html->link(__('New Event Attendance'), array('controller' => 'event_attendances', 'action' => 'add'), array('class' => 'list-group-item')); ?> &nbsp;&nbsp; <?php echo $this->Html->link(__('List Event Memos'), array('controller' => 'event_memos', 'action' => 'index'), array('class' => 'list-group-item')); ?> &nbsp;&nbsp; <?php echo $this->Html->link(__('New Event Memo'), array('controller' => 'event_memos', 'action' => 'add'), array('class' => 'list-group-item')); ?> &nbsp;&nbsp; <?php echo $this->Html->link(__('List Event Trainers'), array('controller' => 'event_trainers', 'action' => 'index'), array('class' => 'list-group-item')); ?> &nbsp;&nbsp; <?php echo $this->Html->link(__('New Event Trainer'), array('controller' => 'event_trainers', 'action' => 'add'), array('class' => 'list-group-item')); ?> &nbsp;&nbsp;                           </div>
                        </section>
                      </div>
                      <!-- end portlet -->
                    </section>
                  </section>
                </aside>
                <!-- end column 1 -->
                <!-- start column 2 -->
                                <aside class="bg-white">
                  <section class="vbox">
                    <!-- tab content headers -->
                    <header class="header bg-light bg-gradient" style="height:auto">
                      <div>
                        <ul class="nav nav-tabs nav-white">
                        <!-- start tab link -->

                        <li class="active"><a href="#dashboard" data-toggle="tab">Dashboard</a></li>
                                                  <!-- end of hasOne -->
                          <!-- start hasMany -->
                          <li><a href="#Evaluations" data-toggle="tab">Evaluations</a></li>
                          <li><a href="#EventAttendances" data-toggle="tab">Event Attendances</a></li>
                          <li><a href="#EventMemos" data-toggle="tab">Event Memos</a></li>
                          <li><a href="#EventTrainers" data-toggle="tab">Event Trainers</a></li>

                          <!-- end hasMany -->
                        <!-- end tab link -->
                        </ul>
                      </div>
                    </header>
                    <!-- end tab content headers -->
                    <!-- tab content article-->
                    <article class="scrollable">
                      <!-- tab content div -->
                      <div class="tab-content">
                        <!-- start tab content -->
                        <div class="tab-pane padder active" id="dashboard">
                          <?php $iterate = $event['Event']['id']; ?>
                          <section class="scrollable wrapper">
                            <div class="col-sm-12 portlet">
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
                                        <article class="media">
                                          <div class="pull-left">
                                            <button type="button" class="btn btn-sm btn-default" data-toggle ='tooltip', data-placement ='bottom' title='Refresh' onclick ='location.reload();'><i class="fa fa-refresh"></i></button>
                                            <?php echo $this->Html->link($this->Form->button('<i class="fa fa-list"></i>', array('class'=>'btn btn-xs btn-success', 'style'=>'color:#000; width:25px; height:25px;','data-toggle'=>'tooltip', 'data-placement'=>'right', 'title'=>'View Upcoming Event List')), array('action' => 'index'), array('escape' => false)); ?>
                                            <?php echo $this->Html->link($this->Form->button('<i class="fa fa-files-o"></i>', array('class'=>'btn btn-xs btn-primary', 'style'=>'color:#000; width:25px; height:25px;','data-toggle'=>'tooltip', 'data-placement'=>'right', 'title'=>'Copy Entry')), array('action' => 'copy', $event['Event']['id']), array('data-toggle'=>'ajaxModal', 'escape' => false)); ?>
                                            <?php echo $this->Html->link($this->Form->button('<i class="fa fa-pencil"></i>', array('class'=>'btn btn-xs btn-warning', 'style'=>'color:#000; width:25px; height:25px;','data-toggle'=>'tooltip', 'data-placement'=>'right', 'title'=>'Modify Details')), array('action' => 'edit', $event['Event']['id']), array('data-toggle'=>'ajaxModal', 'escape' => false)); ?>
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
                                        <article class="media">
                                          <div class="media-body">
                                            <a href="#" class="h4">Venue</a>
                                            <small class="block m-t-xs"><?php echo h($event['Venue']['name']); ?></small>
                                            <small class="block m-t-xs"><?php echo h($event['Venue']['location']); ?></small>
                                          </div>
                                        </article>
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
                                                          <?php if (isset($eventTrainer['staff_id'])) { ?>
                                                          <tr>
                                                            <td class="actions">
                                                              <?php echo $this->Html->link('', array('controller' => 'event_trainers', 'action' => 'edit', $eventTrainer['id']), array('class'=>'btn btn-xs btn-warning fa fa-pencil', 'style'=>'color:#000;width:25px; height:25px; padding-top:5px','data-toggle'=>'tooltip', 'data-placement'=>'right', 'title'=>'Modify Details', 'data-toggle'=>'ajaxModal', 'escape' => false)); ?>
                                                            </td>
                                                            <td>
                                                              <?php 
                                                                $trainers = $this->requestAction(
                                                                  array('controller' => 'staffs', 
                                                                    'action' => 'object', $eventTrainer['staff_id']));
                                                                echo $trainers['Staff']['parent_code'].' - '.$participant['Staff']['org_code']; ?>
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
                                              <?php echo count($event['EventAttendance']).':'.$event['Course']['pax']; ?>
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
                            </div>
                          </section>
                        </div>
                        <!-- start hasOne -->
                                                  <!-- end hasOne -->
                          <!-- start hasMany -->
                                                  <div class="tab-pane padder" id="Evaluations">
                            <h3><?php echo __('Related Evaluations'); ?></h3>
                            

                            <?php if (!empty($event['Evaluation'])): ?>
                            <section class="panel panel-default padder">
                              <div class="row wrapper">
                                <div class="col-sm-5 m-b-xs">
                                    			<?php //echo $this->Html->link(' Create', array('controller' => 'evaluations', 'action' => 'add', $event['Event']['id']), array('class' => 'btn btn-default bg-success fa fa-plus', 'data-toggle'=>'ajaxModal', 'style'=>'color:#000;', 'escape' => false)); ?>
 
                                </div>
                              </div>
                              <div class="table-responsive">
                                <table class="table table-striped b-t b-light">
                                  <thead>
                                    <tr>
                                      <th class="actions"><?php echo __('Actions'); ?></th>
                                      <th><?php echo __('Evaluation Type Id'); ?>
                                      </th>
                                      <th><?php echo __('Course Id'); ?>
                                      </th>
                                      <th><?php echo __('Event Id'); ?>
                                      </th>
                                                                                                                                                      <th>
                                        		<th><?php echo __('Total Score'); ?>
                                      </th>
                                                                                                                                                      <th>
                                        		<th><?php echo __('Grade Id'); ?>
                                      </th>
                                                                                                                                                      <th>
                                        		<th><?php echo __('Notes'); ?>
                                      </th>
                                                                                                                                                      <th>
                                        		<th><?php echo __('Evaluated By'); ?>
                                      </th>
                                                                                                                                                                                                                                  <th>
                                        		<th><?php echo __('Updated'); ?>
                                      </th>
                                                                                                              </tr>
                                  </thead>
                                  <tfoot>
                                    <tr>
                                      <th class="actions"><?php echo __('Actions'); ?></th>
                                                                                                                                                                                              <th>
                                        		<th><?php echo __('Evaluation Type Id'); ?>
                                      </th>
                                                                                                                                                                                                                                  <th>
                                        		<th><?php echo __('Course Id'); ?>
                                      </th>
                                                                                                                                                      <th>
                                        		<th><?php echo __('Event Id'); ?>
                                      </th>
                                                                                                                                                      <th>
                                        		<th><?php echo __('Total Score'); ?>
                                      </th>
                                                                                                                                                      <th>
                                        		<th><?php echo __('Grade Id'); ?>
                                      </th>
                                                                                                                                                      <th>
                                        		<th><?php echo __('Notes'); ?>
                                      </th>
                                                                                                                                                      <th>
                                        		<th><?php echo __('Evaluated By'); ?>
                                      </th>
                                                                                                                                                                                                                                  <th>
                                        		<th><?php echo __('Updated'); ?>
                                      </th>
                                                                                                              </tr>
                                  </tfoot>
                                  
                                  <tbody>
                                  	<?php foreach ($event['Evaluation'] as $evaluation): ?>
                                		<tr>
                                			<td class="actions">
                                				<?php echo $this->Html->link('', array('controller' => 'evaluations', 'action' => 'sneak', $evaluation['id']), array('class'=>'btn btn-xs btn-success fa fa-desktop', 'style'=>'color:#000;width:25px; height:25px; padding-top:5px','data-toggle'=>'tooltip', 'data-placement'=>'right', 'title'=>'View Details', 'data-toggle'=>'ajaxModal', 'escape' => false)); ?>
                                				<?php echo $this->Html->link('', array('controller' => 'evaluations', 'action' => 'edit', $evaluation['id']), array('class'=>'btn btn-xs btn-warning fa fa-pencil', 'style'=>'color:#000;width:25px; height:25px; padding-top:5px','data-toggle'=>'tooltip', 'data-placement'=>'right', 'title'=>'Modify Details', 'data-toggle'=>'ajaxModal', 'escape' => false)); ?>
                                			</td>
                                			<td><?php echo $evaluation['evaluation_type_id']; ?></td>
                                			<td><?php echo $evaluation['staff_id']; ?></td>
                                			<td><?php echo $evaluation['course_id']; ?></td>
                                			<td><?php echo $evaluation['event_id']; ?></td>
                                			<td><?php echo $evaluation['total_score']; ?></td>
                                			<td><?php echo $evaluation['grade_id']; ?></td>
                                			<td><?php echo $evaluation['notes']; ?></td>
                                			<td><?php echo $evaluation['evaluated_by']; ?></td>
                                			<td><?php echo $evaluation['updated']; ?></td>
                                		</tr>
                                	<?php endforeach; ?>
                                    <tr>
                                    </tr>
                                  </tbody>
                                </table>
                              </div>
                            <?php endif; ?>

                            <br/>
                            <div class="actions">
                              <div class="col-sm-5 m-b-xs">
                                          <?php //echo $this->Html->link(' Create', array('controller' => 'evaluations', 'action' => 'add', $event['Event']['id']), array('class' => 'btn btn-default bg-success fa fa-plus', 'data-toggle'=>'ajaxModal', 'style'=>'color:#000;', 'escape' => false)); ?>
 
                              </div>
                            </div>
                          </div>
                                                    <div class="tab-pane padder" id="EventAttendances">
                            <h3><?php echo __('Related Event Attendances'); ?></h3>
                            

                            <?php if (!empty($event['EventAttendance'])): ?>
                            <section class="panel panel-default padder">
                              <div class="row wrapper">
                                <div class="col-sm-5 m-b-xs">
                                    			<?php //echo $this->Html->link(' Create', array('controller' => 'event_attendances', 'action' => 'add', $event['Event']['id']), array('class' => 'btn btn-default bg-success fa fa-plus', 'data-toggle'=>'ajaxModal', 'style'=>'color:#000;', 'escape' => false)); ?>
 
                                </div>
                              </div>
                              <div class="table-responsive">
                                <table class="table table-striped b-t b-light">
                                  <thead>
                                    <tr>
                                      <th class="actions"><?php echo __('Actions'); ?></th>
                                      <th><?php echo __('Participants'); ?>
                                      </th>
                                      
                                    </tr></thead>
                                  <tfoot>
                                    <tr>
                                      <th class="actions"><?php echo __('Actions'); ?></th>
                                      <th><?php echo __('Participants'); ?>
                                      </th>
                                    </tr>
                                  </tfoot>
                                  <tbody>
                                  	<?php foreach ($event['EventAttendance'] as $eventAttendance): ?>
                                		<tr>
                                			<td class="actions">
                                				<?php echo $this->Html->link('', array('controller' => 'event_attendances', 'action' => 'sneak', $eventAttendance['id']), array('class'=>'btn btn-xs btn-success fa fa-desktop', 'style'=>'color:#000;width:25px; height:25px; padding-top:5px','data-toggle'=>'tooltip', 'data-placement'=>'right', 'title'=>'View Details', 'data-toggle'=>'ajaxModal', 'escape' => false)); ?>
                                				<?php echo $this->Html->link('', array('controller' => 'event_attendances', 'action' => 'edit', $eventAttendance['id']), array('class'=>'btn btn-xs btn-warning fa fa-pencil', 'style'=>'color:#000;width:25px; height:25px; padding-top:5px','data-toggle'=>'tooltip', 'data-placement'=>'right', 'title'=>'Modify Details', 'data-toggle'=>'ajaxModal', 'escape' => false)); ?>
                                			</td>
                                			<td>
                                        <?php 
                                          $participant = $this->requestAction(
                                            array('controller' => 'staffs', 
                                              'action' => 'object', $eventAttendance['staff_id']));
                                          echo $participant['Staff']['staff_no'].' ('.$participant['Staff']['parent_code'].' - '.$participant['Staff']['org_code'].')'.' : '. $participant['Staff']['name'];
                                          // echo $eventAttendance['staff_id']; 
                                        ?>
                                      </td>
                                		</tr>
                                	<?php endforeach; ?>
                                    <tr>&nbsp;
                                    </tr>
                                  </tbody>
                                </table>
                              </div>
                            <?php endif; ?>

                            <br/>
                            <div class="actions">
                              <div class="col-sm-5 m-b-xs">
                                  			<?php //echo $this->Html->link(' Create', array('controller' => 'event_attendances', 'action' => 'add', $event['Event']['id']), array('class' => 'btn btn-default bg-success fa fa-plus', 'data-toggle'=>'ajaxModal', 'style'=>'color:#000;', 'escape' => false)); ?>
 
                              </div>
                            </div>
                          </div>
                                                    <div class="tab-pane padder" id="EventMemos">
                            <h3><?php echo __('Related Event Memos'); ?></h3>
                            

                            <?php if (!empty($event['EventMemo'])): ?>
                            <section class="panel panel-default padder">
                              <div class="row wrapper">
                                <div class="col-sm-5 m-b-xs">
                                    			<?php //echo $this->Html->link(' Create', array('controller' => 'event_memos', 'action' => 'add', $event['Event']['id']), array('class' => 'btn btn-default bg-success fa fa-plus', 'data-toggle'=>'ajaxModal', 'style'=>'color:#000;', 'escape' => false)); ?>
 
                                </div>
                              </div>
                              <div class="table-responsive">
                                <table class="table table-striped b-t b-light">
                                  <thead>
                                    <tr>
                                      <th class="actions"><?php echo __('Actions'); ?></th>
                                      <th><?php echo __('Memo'); ?></th>
                                      <th><?php echo __('Active'); ?></th>
                                    </tr>
                                  </thead>
                                  <tfoot>
                                    <tr>
                                      <th class="actions"><?php echo __('Actions'); ?></th>
                                      <th><?php echo __('Memo'); ?></th>
                                      <th><?php echo __('Active'); ?></th>
                                    </tr>
                                  </tfoot>
                                  
                                  <tbody>
                                  	<?php foreach ($event['EventMemo'] as $eventMemo): ?>
		<tr>
			<td class="actions">
				<?php echo $this->Html->link('', array('controller' => 'event_memos', 'action' => 'sneak', $eventMemo['id']), array('class'=>'btn btn-xs btn-success fa fa-desktop', 'style'=>'color:#000;width:25px; height:25px; padding-top:5px','data-toggle'=>'tooltip', 'data-placement'=>'right', 'title'=>'View Details', 'data-toggle'=>'ajaxModal', 'escape' => false)); ?>
				<?php echo $this->Html->link('', array('controller' => 'event_memos', 'action' => 'edit', $eventMemo['id']), array('class'=>'btn btn-xs btn-warning fa fa-pencil', 'style'=>'color:#000;width:25px; height:25px; padding-top:5px','data-toggle'=>'tooltip', 'data-placement'=>'right', 'title'=>'Modify Details', 'data-toggle'=>'ajaxModal', 'escape' => false)); ?>
			</td>
			<td><?php echo $eventMemo['memo']; ?></td>
			<td><?php echo $eventMemo['active']; ?></td>
		</tr>
	<?php endforeach; ?>
                                    <tr>
                                    </tr>
                                  </tbody>
                                </table>
                              </div>
                            <?php endif; ?>

                            <br/>
                            <div class="actions">
                              <div class="col-sm-5 m-b-xs">
                                          <?php //echo $this->Html->link(' Create', array('controller' => 'event_memos', 'action' => 'add', $event['Event']['id']), array('class' => 'btn btn-default bg-success fa fa-plus', 'data-toggle'=>'ajaxModal', 'style'=>'color:#000;', 'escape' => false)); ?>
 
                              </div>
                            </div>
                          </div>
                                                    <div class="tab-pane padder" id="EventTrainers">
                            <h3><?php echo __('Related Event Trainers'); ?></h3>
                            

                            <?php if (!empty($event['EventTrainer'])): ?>
                            <section class="panel panel-default padder">
                              <div class="row wrapper">
                                <div class="col-sm-5 m-b-xs">
                                    			<?php //echo $this->Html->link(' Create', array('controller' => 'event_trainers', 'action' => 'add', $event['Event']['id']), array('class' => 'btn btn-default bg-success fa fa-plus', 'data-toggle'=>'ajaxModal', 'style'=>'color:#000;', 'escape' => false)); ?>
 
                                </div>
                              </div>
                              <div class="table-responsive">
                                <table class="table table-striped b-t b-light">
                                  <thead>
                                    <tr>
                                      <th><?php echo __('Trainer'); ?> </th> 
                                    </tr>
                                  </thead>
                                  <tfoot>
                                    <tr>
                                      <th><?php echo __('Trainer'); ?> </th> 
                                    </tr>
                                  </tfoot>
                                  
                                  <tbody>
                                  	<?php foreach ($event['EventTrainer'] as $eventTrainer): ?>
		<tr>
			
			<td>
        <?php $myTrainer = $this->requestAction(
        array(
          'controller' => 'staffs',
          'action' => 'object', $eventTrainer['trainer_id']
        )); 

        ?>
        <?php echo $myTrainer['Staff']['name']; ?>
      </td>
		</tr>
	<?php endforeach; ?>
                                    <tr>
                                    </tr>
                                  </tbody>
                                </table>
                              </div>
                            <?php endif; ?>

                            <br/>
                            <div class="actions">
                              <div class="col-sm-5 m-b-xs">
                                  			<?php //echo $this->Html->link(' Create', array('controller' => 'event_trainers', 'action' => 'add', $event['Event']['id']), array('class' => 'btn btn-default bg-success fa fa-plus', 'data-toggle'=>'ajaxModal', 'style'=>'color:#000;', 'escape' => false)); ?>
 
                              </div>
                            </div>
                          </div>
                                                    <!-- end hasMany -->
                        <!-- end tab content -->
                      </div><!-- end tab content div -->
                    </article> <!-- end tab content article-->
                  </section>
                </aside>
                                <!-- end column 2 -->
              </section>
            </section>
          </section>
          <!-- end content view page -->
<input type='hidden' name='server' id='server' value='<?php echo $this->webroot; ?>'>
