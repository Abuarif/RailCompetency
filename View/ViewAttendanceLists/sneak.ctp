          <ul class="breadcrumb no-border no-radius b-b b-light pull-in">
            <li><a href="<?php echo $this->webroot; ?>"<i class="fa fa-home"></i> Home</a></li>
            <li class="active"><a href="#" onClick="location.reload();">Sneak Preview: <?php echo __('View Attendance List'); ?>'s Details </a></li>
          </ul>
          <div class="m-b-md">
            <h3 class="m-b-none">Sneak Preview: <?php echo __('View Attendance List'); ?>'s Details </h3>
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
                            		<small class="text-uc text-xs text-muted"><?php echo __('Staff No'); ?></small>
		<p>
			<?php echo h($viewAttendanceList['ViewAttendanceList']['staff_no']); ?>
			&nbsp;
		</p>
		<small class="text-uc text-xs text-muted"><?php echo __('Staff Name'); ?></small>
		<p>
			<?php echo h($viewAttendanceList['ViewAttendanceList']['staff_name']); ?>
			&nbsp;
		</p>
		<small class="text-uc text-xs text-muted"><?php echo __('Parent Code'); ?></small>
		<p>
			<?php echo h($viewAttendanceList['ViewAttendanceList']['parent_code']); ?>
			&nbsp;
		</p>
		<small class="text-uc text-xs text-muted"><?php echo __('Org Code'); ?></small>
		<p>
			<?php echo h($viewAttendanceList['ViewAttendanceList']['org_code']); ?>
			&nbsp;
		</p>
		<small class="text-uc text-xs text-muted"><?php echo __('Code'); ?></small>
		<p>
			<?php echo h($viewAttendanceList['ViewAttendanceList']['code']); ?>
			&nbsp;
		</p>
		<small class="text-uc text-xs text-muted"><?php echo __('Course Name'); ?></small>
		<p>
			<?php echo h($viewAttendanceList['ViewAttendanceList']['course_name']); ?>
			&nbsp;
		</p>
		<small class="text-uc text-xs text-muted"><?php echo __('Start Date'); ?></small>
		<p>
			<?php echo h($viewAttendanceList['ViewAttendanceList']['start_date']); ?>
			&nbsp;
		</p>
		<small class="text-uc text-xs text-muted"><?php echo __('End Date'); ?></small>
		<p>
			<?php echo h($viewAttendanceList['ViewAttendanceList']['end_date']); ?>
			&nbsp;
		</p>
		<small class="text-uc text-xs text-muted"><?php echo __('Duration'); ?></small>
		<p>
			<?php echo h($viewAttendanceList['ViewAttendanceList']['duration']); ?>
			&nbsp;
		</p>
		<small class="text-uc text-xs text-muted"><?php echo __('Month'); ?></small>
		<p>
			<?php echo h($viewAttendanceList['ViewAttendanceList']['month']); ?>
			&nbsp;
		</p>
		<small class="text-uc text-xs text-muted"><?php echo __('Year'); ?></small>
		<p>
			<?php echo h($viewAttendanceList['ViewAttendanceList']['year']); ?>
			&nbsp;
		</p>
		<small class="text-uc text-xs text-muted"><?php echo __('Is Completed'); ?></small>
		<p>
			<?php echo h($viewAttendanceList['ViewAttendanceList']['is_completed']); ?>
			&nbsp;
		</p>
		<small class="text-uc text-xs text-muted"><?php echo __('Is Tcn'); ?></small>
		<p>
			<?php echo h($viewAttendanceList['ViewAttendanceList']['is_tcn']); ?>
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
                           <?php echo $this->Html->link(__('Edit View Attendance List'), array('action' => 'edit', $viewAttendanceList['ViewAttendanceList']['id']), array('class'=>'list-group-item')); ?> <?php echo $this->Form->postLink(__('Delete View Attendance List'), array('action' => 'delete', $viewAttendanceList['ViewAttendanceList']['id']), array('class'=>'list-group-item'), __('Are you sure you want to delete # %s?', $viewAttendanceList['ViewAttendanceList']['id'])); ?>  <?php echo $this->Html->link(__('List View Attendance Lists'), array('action' => 'index'), array('class'=>'list-group-item')); ?> <?php echo $this->Html->link(__('New View Attendance List'), array('action' => 'add'), array('class'=>'list-group-item')); ?>                          </div>
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
                                                    </div>
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