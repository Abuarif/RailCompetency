          <ul class="breadcrumb no-border no-radius b-b b-light pull-in">
            <li><a href="<?php echo $this->webroot; ?>"<i class="fa fa-home"></i> Home</a></li>
            <li class="active"><a href="#" onClick="location.reload();"><?php echo __('Staff Profile View'); ?>'s Details</a></li>
          </ul>
          <div class="m-b-md">
            <h3 class="m-b-none"><?php echo __('Staff Profile View'); ?>'s Details</h3>
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
			<?php echo h($staffProfileView['StaffProfileView']['id']); ?>
			&nbsp;
		</p>
		<small class="text-uc text-xs text-muted"><?php echo __('Event'); ?></small>
		<p>
			<?php echo $this->Html->link($staffProfileView['Event']['id'], array('controller' => 'events', 'action' => 'view', $staffProfileView['Event']['id'])); ?>
			&nbsp;
		</p>
		<small class="text-uc text-xs text-muted"><?php echo __('Staff'); ?></small>
		<p>
			<?php echo $this->Html->link($staffProfileView['Staff']['name'], array('controller' => 'staffs', 'action' => 'view', $staffProfileView['Staff']['id'])); ?>
			&nbsp;
		</p>
		<small class="text-uc text-xs text-muted"><?php echo __('Staff No'); ?></small>
		<p>
			<?php echo h($staffProfileView['StaffProfileView']['staff_no']); ?>
			&nbsp;
		</p>
		<small class="text-uc text-xs text-muted"><?php echo __('Name'); ?></small>
		<p>
			<?php echo h($staffProfileView['StaffProfileView']['name']); ?>
			&nbsp;
		</p>
		<small class="text-uc text-xs text-muted"><?php echo __('Parent Code'); ?></small>
		<p>
			<?php echo h($staffProfileView['StaffProfileView']['parent_code']); ?>
			&nbsp;
		</p>
		<small class="text-uc text-xs text-muted"><?php echo __('Org Code'); ?></small>
		<p>
			<?php echo h($staffProfileView['StaffProfileView']['org_code']); ?>
			&nbsp;
		</p>
		<small class="text-uc text-xs text-muted"><?php echo __('Position'); ?></small>
		<p>
			<?php echo h($staffProfileView['StaffProfileView']['position']); ?>
			&nbsp;
		</p>
		<small class="text-uc text-xs text-muted"><?php echo __('Course'); ?></small>
		<p>
			<?php echo $this->Html->link($staffProfileView['Course']['name'], array('controller' => 'courses', 'action' => 'view', $staffProfileView['Course']['id'])); ?>
			&nbsp;
		</p>
		<small class="text-uc text-xs text-muted"><?php echo __('Code'); ?></small>
		<p>
			<?php echo h($staffProfileView['StaffProfileView']['code']); ?>
			&nbsp;
		</p>
		<small class="text-uc text-xs text-muted"><?php echo __('Course Name'); ?></small>
		<p>
			<?php echo h($staffProfileView['StaffProfileView']['course_name']); ?>
			&nbsp;
		</p>
		<small class="text-uc text-xs text-muted"><?php echo __('Start Date'); ?></small>
		<p>
			<?php echo h($staffProfileView['StaffProfileView']['start_date']); ?>
			&nbsp;
		</p>
		<small class="text-uc text-xs text-muted"><?php echo __('End Date'); ?></small>
		<p>
			<?php echo h($staffProfileView['StaffProfileView']['end_date']); ?>
			&nbsp;
		</p>
		<small class="text-uc text-xs text-muted"><?php echo __('Duration'); ?></small>
		<p>
			<?php echo h($staffProfileView['StaffProfileView']['duration']); ?>
			&nbsp;
		</p>
		<small class="text-uc text-xs text-muted"><?php echo __('Readiness'); ?></small>
		<p>
			<?php echo h($staffProfileView['StaffProfileView']['readiness']); ?>
			&nbsp;
		</p>
		<small class="text-uc text-xs text-muted"><?php echo __('Interest'); ?></small>
		<p>
			<?php echo h($staffProfileView['StaffProfileView']['interest']); ?>
			&nbsp;
		</p>
		<small class="text-uc text-xs text-muted"><?php echo __('Cooperation'); ?></small>
		<p>
			<?php echo h($staffProfileView['StaffProfileView']['cooperation']); ?>
			&nbsp;
		</p>
		<small class="text-uc text-xs text-muted"><?php echo __('Participation'); ?></small>
		<p>
			<?php echo h($staffProfileView['StaffProfileView']['participation']); ?>
			&nbsp;
		</p>
		<small class="text-uc text-xs text-muted"><?php echo __('Ability'); ?></small>
		<p>
			<?php echo h($staffProfileView['StaffProfileView']['ability']); ?>
			&nbsp;
		</p>
		<small class="text-uc text-xs text-muted"><?php echo __('Attitude'); ?></small>
		<p>
			<?php echo h($staffProfileView['StaffProfileView']['attitude']); ?>
			&nbsp;
		</p>
		<small class="text-uc text-xs text-muted"><?php echo __('Remarks'); ?></small>
		<p>
			<?php echo h($staffProfileView['StaffProfileView']['remarks']); ?>
			&nbsp;
		</p>
		<small class="text-uc text-xs text-muted"><?php echo __('Status'); ?></small>
		<p>
			<?php echo h($staffProfileView['StaffProfileView']['status']); ?>
			&nbsp;
		</p>
		<small class="text-uc text-xs text-muted"><?php echo __('Theory'); ?></small>
		<p>
			<?php echo h($staffProfileView['StaffProfileView']['theory']); ?>
			&nbsp;
		</p>
		<small class="text-uc text-xs text-muted"><?php echo __('Practical'); ?></small>
		<p>
			<?php echo h($staffProfileView['StaffProfileView']['practical']); ?>
			&nbsp;
		</p>
		<small class="text-uc text-xs text-muted"><?php echo __('Doc'); ?></small>
		<p>
			<?php echo h($staffProfileView['StaffProfileView']['doc']); ?>
			&nbsp;
		</p>
		<small class="text-uc text-xs text-muted"><?php echo __('Comment'); ?></small>
		<p>
			<?php echo h($staffProfileView['StaffProfileView']['comment']); ?>
			&nbsp;
		</p>
                        </section>
                        <section class="panel panel-info portlet-item">
                          <header class="panel-heading">
                            Quick links
                          </header>
                          <div class="list-group bg-white">
                           <?php echo $this->Html->link(__('Edit Staff Profile View'), array('action' => 'edit', $staffProfileView['StaffProfileView']['id']), array('class'=>'list-group-item', 'data-toggle'=>'ajaxModal')); ?> <?php echo $this->Form->postLink(__('Delete Staff Profile View'), array('action' => 'delete', $staffProfileView['StaffProfileView']['id']), array('class'=>'list-group-item'), __('Are you sure you want to delete # %s?', $staffProfileView['StaffProfileView']['id'])); ?>  <?php echo $this->Html->link(__('List Staff Profile Views'), array('action' => 'index'), array('class'=>'list-group-item')); ?> <?php echo $this->Html->link(__('New Staff Profile View'), array('action' => 'add'), array('class'=>'list-group-item', 'data-toggle'=>'ajaxModal', 'escape' => false)); ?>                              </div>
                        </section>
                        <section class="panel panel-info portlet-item">
                          <header class="panel-heading">
                            Associated links
                          </header>
                          <div class="list-group bg-white">
                          <?php echo $this->Html->link(__('List Events'), array('controller' => 'events', 'action' => 'index'), array('class' => 'list-group-item')); ?> &nbsp;&nbsp; <?php echo $this->Html->link(__('New Event'), array('controller' => 'events', 'action' => 'add'), array('class' => 'list-group-item')); ?> &nbsp;&nbsp; <?php echo $this->Html->link(__('List Staffs'), array('controller' => 'staffs', 'action' => 'index'), array('class' => 'list-group-item')); ?> &nbsp;&nbsp; <?php echo $this->Html->link(__('New Staff'), array('controller' => 'staffs', 'action' => 'add'), array('class' => 'list-group-item')); ?> &nbsp;&nbsp; <?php echo $this->Html->link(__('List Courses'), array('controller' => 'courses', 'action' => 'index'), array('class' => 'list-group-item')); ?> &nbsp;&nbsp; <?php echo $this->Html->link(__('New Course'), array('controller' => 'courses', 'action' => 'add'), array('class' => 'list-group-item')); ?> &nbsp;&nbsp;                           </div>
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

