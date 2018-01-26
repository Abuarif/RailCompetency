          <ul class="breadcrumb no-border no-radius b-b b-light pull-in">
            <li><a href="<?php echo $this->webroot; ?>"<i class="fa fa-home"></i> Home</a></li>
            <li class="active"><a href="#" onClick="location.reload();">Sneak Preview: <?php echo __('Event Attendance'); ?>'s Details </a></li>
          </ul>
          <div class="m-b-md">
            <h3 class="m-b-none">Sneak Preview: <?php echo __('Event Attendance'); ?>'s Details </h3>
          </div>
          <!-- start content view page -->
          <section class="vbox">
            <section class="scrollable">
              <section class="hbox stretch">
                <!-- start column 1 -->
                <aside class="aside-lg bg-light lter b-r">
                  <section class="vbox">
                    <section class="scrollable">
                      <div class="wrapper">
                        
                        <div class="portlet">
                          <section class="panel panel-info portlet-item">
                            <header class="panel-heading">
                            Information
                          </header>
                            		<small class="text-uc text-xs text-muted"><?php echo __('Id'); ?></small>
		<p>
			<?php echo h($eventAttendance['EventAttendance']['id']); ?>
			&nbsp;
		</p>
		<small class="text-uc text-xs text-muted"><?php echo __('Event'); ?></small>
		<p>
			<?php echo $this->Html->link($eventAttendance['Event']['id'], array('controller' => 'events', 'action' => 'view', $eventAttendance['Event']['id'])); ?>
			&nbsp;
		</p>
		<small class="text-uc text-xs text-muted"><?php echo __('Staff'); ?></small>
		<p>
			<?php echo $this->Html->link($eventAttendance['Staff']['name'], array('controller' => 'staffs', 'action' => 'view', $eventAttendance['Staff']['id'])); ?>
			&nbsp;
		</p>
		<small class="text-uc text-xs text-muted"><?php echo __('Signed By'); ?></small>
		<p>
			<?php echo h($eventAttendance['EventAttendance']['signed_by']); ?>
			&nbsp;
		</p>
		<small class="text-uc text-xs text-muted"><?php echo __('IsEnrolled'); ?></small>
		<p>
			<?php echo h($eventAttendance['EventAttendance']['isEnrolled']); ?>
			&nbsp;
		</p>
		<small class="text-uc text-xs text-muted"><?php echo __('IsCompleted'); ?></small>
		<p>
			<?php echo h($eventAttendance['EventAttendance']['isCompleted']); ?>
			&nbsp;
		</p>
		<small class="text-uc text-xs text-muted"><?php echo __('Notes'); ?></small>
		<p>
			<?php echo h($eventAttendance['EventAttendance']['notes']); ?>
			&nbsp;
		</p>
		<small class="text-uc text-xs text-muted"><?php echo __('Active'); ?></small>
		<p>
			<?php echo h($eventAttendance['EventAttendance']['active']); ?>
			&nbsp;
		</p>
		<small class="text-uc text-xs text-muted"><?php echo __('Created'); ?></small>
		<p>
			<?php echo h($eventAttendance['EventAttendance']['created']); ?>
			&nbsp;
		</p>
		<small class="text-uc text-xs text-muted"><?php echo __('Modified'); ?></small>
		<p>
			<?php echo h($eventAttendance['EventAttendance']['modified']); ?>
			&nbsp;
		</p>
                          <div class="line"></div>
                        </section>
                        <section class="panel panel-info portlet-item">
                          <header class="panel-heading">
                            <ul class="nav nav-pills pull-right">
                                      <li>
                                        <a href="#" class="panel-toggle text-muted"><i class="fa fa-caret-down text-active"></i><i class="fa fa-caret-up text"></i></a>
                                      </li>
                                    </ul>
                            Quick links
                          </header>
                          <div class="list-group bg-white">
                           <?php echo $this->Html->link(__('Edit Event Attendance'), array('action' => 'edit', $eventAttendance['EventAttendance']['id']), array('class'=>'list-group-item')); ?> <?php echo $this->Form->postLink(__('Delete Event Attendance'), array('action' => 'delete', $eventAttendance['EventAttendance']['id']), array('class'=>'list-group-item'), __('Are you sure you want to delete # %s?', $eventAttendance['EventAttendance']['id'])); ?>  <?php echo $this->Html->link(__('List Event Attendances'), array('action' => 'index'), array('class'=>'list-group-item')); ?> <?php echo $this->Html->link(__('New Event Attendance'), array('action' => 'add'), array('class'=>'list-group-item')); ?>                          </div>
                        </section>
                        <section class="panel panel-info portlet-item">
                          <header class="panel-heading">
                            <ul class="nav nav-pills pull-right">
                                      <li>
                                        <a href="#" class="panel-toggle text-muted"><i class="fa fa-caret-down text-active"></i><i class="fa fa-caret-up text"></i></a>
                                      </li>
                                    </ul>
                            Associated links
                          </header>
                          <div class="list-group bg-white">
                          <?php echo $this->Html->link(__('List Events'), array('controller' => 'events', 'action' => 'index'), array('class' => 'list-group-item')); ?> &nbsp;&nbsp; <?php echo $this->Html->link(__('New Event'), array('controller' => 'events', 'action' => 'add'), array('class' => 'list-group-item')); ?> &nbsp;&nbsp; <?php echo $this->Html->link(__('List Staffs'), array('controller' => 'staffs', 'action' => 'index'), array('class' => 'list-group-item')); ?> &nbsp;&nbsp; <?php echo $this->Html->link(__('New Staff'), array('controller' => 'staffs', 'action' => 'add'), array('class' => 'list-group-item')); ?> &nbsp;&nbsp;                           </div>
                        </section>
                        </div>
                      </div>
                    </section>
                  </section>
                </aside>
                <!-- end column 1 -->
                
              </section>
            </section>
          </section>
          <!-- end content view page -->