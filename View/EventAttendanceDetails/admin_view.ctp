          <ul class="breadcrumb no-border no-radius b-b b-light pull-in">
            <li><a href="<?php echo $this->webroot; ?>"<i class="fa fa-home"></i> Home</a></li>
            <li class="active"><a href="#" onClick="location.reload();"><?php echo __('Event Attendance Detail'); ?>'s Details</a></li>
          </ul>
          <div class="m-b-md">
            <h3 class="m-b-none"><?php echo __('Event Attendance Detail'); ?>'s Details</h3>
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
			<?php echo h($eventAttendanceDetail['EventAttendanceDetail']['id']); ?>
			&nbsp;
		</p>
		<small class="text-uc text-xs text-muted"><?php echo __('Event'); ?></small>
		<p>
			<?php echo $this->Html->link($eventAttendanceDetail['Event']['id'], array('controller' => 'events', 'action' => 'view', $eventAttendanceDetail['Event']['id'])); ?>
			&nbsp;
		</p>
		<small class="text-uc text-xs text-muted"><?php echo __('Event Attendance'); ?></small>
		<p>
			<?php echo $this->Html->link($eventAttendanceDetail['EventAttendance']['id'], array('controller' => 'event_attendances', 'action' => 'view', $eventAttendanceDetail['EventAttendance']['id'])); ?>
			&nbsp;
		</p>
		<small class="text-uc text-xs text-muted"><?php echo __('Staff'); ?></small>
		<p>
			<?php echo $this->Html->link($eventAttendanceDetail['Staff']['name'], array('controller' => 'staffs', 'action' => 'view', $eventAttendanceDetail['Staff']['id'])); ?>
			&nbsp;
		</p>
		<small class="text-uc text-xs text-muted"><?php echo __('Active'); ?></small>
		<p>
			<?php echo h($eventAttendanceDetail['EventAttendanceDetail']['active']); ?>
			&nbsp;
		</p>
                        </section>
                        <section class="panel panel-info portlet-item">
                          <header class="panel-heading">
                            Quick links
                          </header>
                          <div class="list-group bg-white">
                           <?php echo $this->Html->link(__('Edit Event Attendance Detail'), array('action' => 'edit', $eventAttendanceDetail['EventAttendanceDetail']['id']), array('class'=>'list-group-item', 'data-toggle'=>'ajaxModal')); ?> <?php echo $this->Form->postLink(__('Delete Event Attendance Detail'), array('action' => 'delete', $eventAttendanceDetail['EventAttendanceDetail']['id']), array('class'=>'list-group-item'), __('Are you sure you want to delete # %s?', $eventAttendanceDetail['EventAttendanceDetail']['id'])); ?>  <?php echo $this->Html->link(__('List Event Attendance Details'), array('action' => 'index'), array('class'=>'list-group-item')); ?> <?php echo $this->Html->link(__('New Event Attendance Detail'), array('action' => 'add'), array('class'=>'list-group-item', 'data-toggle'=>'ajaxModal', 'escape' => false)); ?>                              </div>
                        </section>
                        <section class="panel panel-info portlet-item">
                          <header class="panel-heading">
                            Associated links
                          </header>
                          <div class="list-group bg-white">
                          <?php echo $this->Html->link(__('List Events'), array('controller' => 'events', 'action' => 'index'), array('class' => 'list-group-item')); ?> &nbsp;&nbsp; <?php echo $this->Html->link(__('New Event'), array('controller' => 'events', 'action' => 'add'), array('class' => 'list-group-item')); ?> &nbsp;&nbsp; <?php echo $this->Html->link(__('List Event Attendances'), array('controller' => 'event_attendances', 'action' => 'index'), array('class' => 'list-group-item')); ?> &nbsp;&nbsp; <?php echo $this->Html->link(__('New Event Attendance'), array('controller' => 'event_attendances', 'action' => 'add'), array('class' => 'list-group-item')); ?> &nbsp;&nbsp; <?php echo $this->Html->link(__('List Staffs'), array('controller' => 'staffs', 'action' => 'index'), array('class' => 'list-group-item')); ?> &nbsp;&nbsp; <?php echo $this->Html->link(__('New Staff'), array('controller' => 'staffs', 'action' => 'add'), array('class' => 'list-group-item')); ?> &nbsp;&nbsp;                           </div>
                        </section>
                      </div>
                      <!-- end portlet -->
                    </section>
                  </section>
                </aside>
                <!-- end column 1 -->
                <!-- start column 2 -->
                                <!-- end column 2 -->
              </section>
            </section>
          </section>
          <!-- end content view page -->

