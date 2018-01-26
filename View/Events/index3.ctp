          <ul class="breadcrumb no-border no-radius b-b b-light pull-in">
            <li><a href="<?php echo $this->webroot; ?>"<i class="fa fa-home"></i> Home</a></li>
            <li class="active">Event List</li>
          </ul>
          <div class="m-b-md">
            <h3 class="m-b-none">Event List</h3>
          </div>
          <!-- Event list -->
          <section class="panel panel-default">
            <!-- search course code and name with memo and active event -->
              <div class="panel-body">
                <div class="col-sm-2 m-b-xs">
                  <div class="btn-group">
                    <button type="button" class="btn btn-sm btn-default" data-toggle ='tooltip', data-placement ='bottom' title='Refresh' onclick ='location.reload();'><i class="fa fa-refresh"></i></button>
                  </div>
                </div>
                <div class="col-sm-4">
                  &nbsp;
                </div>
                <div class="col-sm-6">
                  <?php echo $this->Form->create('Event', array('class' => 'form-inline','inputDefaults' => array('label' => false, 'div' => false))); ?>
                    <!-- <div class="checkbox"> -->
                    <div class="form-group">
                      <label>
                        <?php echo $this->Form->checkbox('memo', array('data-toggle'=>'tooltip', 'data-placement'=>'bottom', 'title'=>'Click here to view events with memo')); ?>&nbsp;Event with Memo!
                      </label>
                      <label>
                        <?php echo $this->Form->checkbox('active', array('data-toggle'=>'tooltip', 'data-placement'=>'bottom', 'title'=>'Click here to view confirmed events.')); ?>&nbsp;Active Event Only!
                      </label>
                    </div>
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
            <section class="scrollable wrapper">
              <div class="row">
                    <div class="col-sm-6 portlet">
                      <!-- portlet item -->
                  <?php $iterate = 0; ?>
                  <?php foreach ($events as $event): ?>
                      <?php if ($iterate%2==false) : ?> 
                        <section class="panel panel-default portlet-item">
                          <!-- .accordion -->
                          <div class="panel-group m-b" id="accordion<?php echo $iterate;?>">
                            <div class="panel panel-default">
                              <div class="panel-heading">
                                <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion<?php echo $iterate;?>" href="#collapse<?php echo $iterate;?>">
                                  <?php echo $event['Course']['name']; ?>&nbsp;<br/>
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
                                      <!-- <a href="#" class="h4">Actions&nbsp;</a> -->
                                      <?php echo $this->Html->link($this->Form->button('<i class="fa fa-desktop"></i>', array('class'=>'btn btn-xs btn-success', 'style'=>'color:#000; width:25px; height:25px;','data-toggle'=>'tooltip', 'data-placement'=>'right', 'title'=>'View Details')), array('action' => 'view', $event['Event']['id']), array('escape' => false)); ?>
                                      <?php echo $this->Html->link($this->Form->button('<i class="fa fa-files-o"></i>', array('class'=>'btn btn-xs btn-primary', 'style'=>'color:#000; width:25px; height:25px;','data-toggle'=>'tooltip', 'data-placement'=>'right', 'title'=>'Copy Entry')), array('action' => 'copy', $event['Event']['id']), array('data-toggle'=>'ajaxModal', 'escape' => false)); ?>
                                      <?php echo $this->Html->link($this->Form->button('<i class="fa fa-pencil"></i>', array('class'=>'btn btn-xs btn-warning', 'style'=>'color:#000; width:25px; height:25px;','data-toggle'=>'tooltip', 'data-placement'=>'right', 'title'=>'Modify Details')), array('action' => 'edit', $event['Event']['id']), array('data-toggle'=>'ajaxModal', 'escape' => false)); ?>
                                      <?php if ($event['Event']['active'] == 1) { ?>
                                        <!-- <i class='fa fa-check bg-success' style='color:#fff; width:25px; height:25px;padding:5px'></i>  -->
                                        <?php echo $this->Form->postLink('', array('controller' => 'events', 'action' => 'revert_scheduled_event', $event['Event']['id']), array('class' =>'fa fa-check bg-success', 'style' =>'color:#fff; width:25px; height:25px;padding:5px', 'data-toggle'=>'tooltip', 'data-placement'=>'right', 'title'=>'Revert Scheduled Event', 'escape' => false, 'confirm' => 'Are you sure you wish to revert the scheduled event?')); ?>
                                      <?php } else { ?>
                                        <!-- <i class='fa fa-times bg-danger' style='color:#fff; width:25px; height:25px;padding:5px'></i>  -->
                                        <?php echo $this->Form->postLink('', array('controller' => 'events', 'action' => 'confirmed_event', $event['Event']['id']), array('class'=>'btn btn-danger fa fa-times', 'style' =>'color:#fff; width:25px; height:25px;padding:5px','data-toggle'=>'tooltip', 'data-placement'=>'right', 'title'=>'Confirmed Schedule', 'escape' => false, 'confirm' => 'Are you sure you wish to confirm the event?')); ?>
                                      <?php } ?>
                                      <?php if ( !empty($event['EventMemo']) ) if ($event['EventMemo'][0]['active'] == 1) { ?>
                                        <!-- <i class='fa fa-check bg-success' style='color:#fff; width:25px; height:25px;padding:5px'></i>  -->
                                        <?php echo $this->Form->postLink('Memo', array('controller' => 'event_memos', 'action' => 'reverted_memo', $event['EventMemo'][0]['id']), array('class' =>'bg-success', 'style' =>'color:#fff; width:25px; height:25px;padding:5px', 'data-toggle'=>'tooltip', 'data-placement'=>'right', 'title'=>'Cancelled event memo issuance.', 'escape' => false, 'confirm' => 'Are you sure you wish to recall the memo?')); ?>
                                      <?php } else { ?>
                                        <!-- <i class='fa fa-times bg-danger' style='color:#fff; width:25px; height:25px;padding:5px'></i>  -->
                                        <?php echo $this->Form->postLink('Memo', array('controller' => 'event_memos', 'action' => 'confirmed_memo', $event['EventMemo'][0]['id']), array('class'=>'btn-danger', 'style' =>'color:#fff; width:25px; height:25px;padding:5px','data-toggle'=>'tooltip', 'data-placement'=>'right', 'title'=>'Confirmed Event Memo Issuance.', 'escape' => false, 'confirm' => 'Are you sure you wish to confirm the memo?')); ?>
                                      <?php } ?>
                                    </div>
                                    <div class="media-body">
                                      <a href="#" class="h4">Event Details</a>
                                      <small class="block m-t-xs"><?php echo h($event['Event']['details']); ?></small>
                                    </div>
                                  </article>
                                  <article class="media">
                                    <div class="panel-group m-b" id="accordionSub<?php echo $iterate;?>">
                                      <div class="panel panel-default">
                                        <div class="panel-heading">
                                          <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordionSub<?php echo $iterate;?>" href="#collapseASub<?php echo $iterate;?>">
                                            Trainers
                                          </a>
                                        </div>
                                        <div id="collapseASub<?php echo $iterate;?>" class="panel-collapsed collapse">
                                          List of Trainers...
                                        </div>
                                      </div>
                                      <div class="panel panel-default">
                                        <div class="panel-heading">
                                          <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordionSub<?php echo $iterate;?>" href="#collapseBSub<?php echo $iterate;?>">
                                            Participants
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
                                        <?php echo count($event['EventAttendance']); ?>
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
                  <?php $iterate2 = 0; ?>
                  <?php foreach ($events as $event): ?>
                      <?php if ($iterate2%2==true) : ?> 
                        <section class="panel panel-default portlet-item">
                          <header class="panel-heading">
                            <ul class="nav nav-pills pull-right">
                              <li>
                                <a href="#" class="panel-toggle text-muted active"><i class="fa fa-caret-down text-active"></i><i class="fa fa-caret-up text"></i></a>
                              </li>
                            </ul>
                            <?php echo $event['Course']['name']; ?>&nbsp;<br/>
                            <span class="badge <?php echo (($event['Event']['active'] == 1) ? 'bg-success': 'bg-danger'); ?>"><?php echo $event['Course']['code']; ?></span>&nbsp; 
                            <?php if (!empty($event['EventMemo'])) { ?>        
                              <span class="badge <?php echo (($event['EventMemo'][0]['active'] == 1) ? 'bg-success': 'bg-danger'); ?>">Memo</span>   
                            <?php } ?>      
                          </header>
                          <section class="panel-body collapse">
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
                                <!-- <a href="#" class="h4">Actions&nbsp;</a> -->
                                <?php echo $this->Html->link($this->Form->button('<i class="fa fa-desktop"></i>', array('class'=>'btn btn-xs btn-success', 'style'=>'color:#000; width:25px; height:25px;','data-toggle'=>'tooltip', 'data-placement'=>'right', 'title'=>'View Details')), array('action' => 'view', $event['Event']['id']), array('escape' => false)); ?>
                                <?php echo $this->Html->link($this->Form->button('<i class="fa fa-files-o"></i>', array('class'=>'btn btn-xs btn-primary', 'style'=>'color:#000; width:25px; height:25px;','data-toggle'=>'tooltip', 'data-placement'=>'right', 'title'=>'Copy Entry')), array('action' => 'copy', $event['Event']['id']), array('data-toggle'=>'ajaxModal', 'escape' => false)); ?>
                                <?php echo $this->Html->link($this->Form->button('<i class="fa fa-pencil"></i>', array('class'=>'btn btn-xs btn-warning', 'style'=>'color:#000; width:25px; height:25px;','data-toggle'=>'tooltip', 'data-placement'=>'right', 'title'=>'Modify Details')), array('action' => 'edit', $event['Event']['id']), array('data-toggle'=>'ajaxModal', 'escape' => false)); ?>
                                <?php if ($event['Event']['active'] == 1) { ?>
                                  <!-- <i class='fa fa-check bg-success' style='color:#fff; width:25px; height:25px;padding:5px'></i>  -->
                                  <?php echo $this->Form->postLink('', array('controller' => 'events', 'action' => 'revert_scheduled_event', $event['Event']['id']), array('class' =>'fa fa-check bg-success', 'style' =>'color:#fff; width:25px; height:25px;padding:5px', 'data-toggle'=>'tooltip', 'data-placement'=>'right', 'title'=>'Revert Scheduled Event', 'escape' => false)); ?>
                                <?php } else { ?>
                                  <!-- <i class='fa fa-times bg-danger' style='color:#fff; width:25px; height:25px;padding:5px'></i>  -->
                                  <?php echo $this->Form->postLink('', array('controller' => 'events', 'action' => 'confirmed_event', $event['Event']['id']), array('class'=>'btn btn-danger fa fa-times', 'style' =>'color:#fff; width:25px; height:25px;padding:5px','data-toggle'=>'tooltip', 'data-placement'=>'right', 'title'=>'Confirmed Schedule', 'escape' => false)); ?>
                                <?php } ?>
                                <?php if ( !empty($event['EventMemo']) ) if ($event['EventMemo'][0]['active'] == 1) { ?>
                                  <!-- <i class='fa fa-check bg-success' style='color:#fff; width:25px; height:25px;padding:5px'></i>  -->
                                  <?php echo $this->Form->postLink('Memo', array('controller' => 'event_memos', 'action' => 'reverted_memo', $event['EventMemo'][0]['id']), array('class' =>'bg-success', 'style' =>'color:#fff; width:25px; height:25px;padding:5px', 'data-toggle'=>'tooltip', 'data-placement'=>'right', 'title'=>'Cancelled event memo issuance.', 'escape' => false)); ?>
                                <?php } else { ?>
                                  <!-- <i class='fa fa-times bg-danger' style='color:#fff; width:25px; height:25px;padding:5px'></i>  -->
                                  <?php echo $this->Form->postLink('Memo', array('controller' => 'event_memos', 'action' => 'confirmed_memo', $event['EventMemo'][0]['id']), array('class'=>'btn-danger', 'style' =>'color:#fff; width:25px; height:25px;padding:5px','data-toggle'=>'tooltip', 'data-placement'=>'right', 'title'=>'Confirmed Event Memo Issuance.', 'escape' => false)); ?>
                                <?php } ?>
                              </div>
                              <div class="media-body">
                                <a href="#" class="h4">Event Details</a>
                                <small class="block m-t-xs"><?php echo h($event['Event']['details']); ?></small>
                              </div>
                            </article>
                          </section>
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
                                    <?php echo count($event['EventAttendance']); ?>
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
                        </section>
                      <?php endif; ?>
                    <?php $iterate2++; ?>
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
