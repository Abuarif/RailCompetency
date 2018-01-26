          <ul class="breadcrumb no-border no-radius b-b b-light pull-in">
            <li><a href="<?php echo $this->webroot; ?>"<i class="fa fa-home"></i> Home</a></li>
            <li class="active"><a href="#" onClick="location.reload();">Sneak Preview: <?php echo __('Staff Training Profile'); ?>'s Details </a></li>
          </ul>
          <div class="m-b-md">
            <h3 class="m-b-none">Sneak Preview: <?php echo __('Staff Training Profile'); ?>'s Details </h3>
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
			<?php echo h($staffTrainingProfile['StaffTrainingProfile']['id']); ?>
			&nbsp;
		</p>
		<small class="text-uc text-xs text-muted"><?php echo __('Staff'); ?></small>
		<p>
			<?php echo $this->Html->link($staffTrainingProfile['Staff']['name'], array('controller' => 'staffs', 'action' => 'view', $staffTrainingProfile['Staff']['id'])); ?>
			&nbsp;
		</p>
		<small class="text-uc text-xs text-muted"><?php echo __('Staff No'); ?></small>
		<p>
			<?php echo h($staffTrainingProfile['StaffTrainingProfile']['staff_no']); ?>
			&nbsp;
		</p>
		<small class="text-uc text-xs text-muted"><?php echo __('Name'); ?></small>
		<p>
			<?php echo h($staffTrainingProfile['StaffTrainingProfile']['name']); ?>
			&nbsp;
		</p>
		<small class="text-uc text-xs text-muted"><?php echo __('Parent Code'); ?></small>
		<p>
			<?php echo h($staffTrainingProfile['StaffTrainingProfile']['parent_code']); ?>
			&nbsp;
		</p>
		<small class="text-uc text-xs text-muted"><?php echo __('Org Code'); ?></small>
		<p>
			<?php echo h($staffTrainingProfile['StaffTrainingProfile']['org_code']); ?>
			&nbsp;
		</p>
		<small class="text-uc text-xs text-muted"><?php echo __('Course'); ?></small>
		<p>
			<?php echo $this->Html->link($staffTrainingProfile['Course']['name'], array('controller' => 'courses', 'action' => 'view', $staffTrainingProfile['Course']['id'])); ?>
			&nbsp;
		</p>
		<small class="text-uc text-xs text-muted"><?php echo __('Code'); ?></small>
		<p>
			<?php echo h($staffTrainingProfile['StaffTrainingProfile']['code']); ?>
			&nbsp;
		</p>
		<small class="text-uc text-xs text-muted"><?php echo __('Course Name'); ?></small>
		<p>
			<?php echo h($staffTrainingProfile['StaffTrainingProfile']['course_name']); ?>
			&nbsp;
		</p>
		<small class="text-uc text-xs text-muted"><?php echo __('Start Date'); ?></small>
		<p>
			<?php echo h($staffTrainingProfile['StaffTrainingProfile']['start_date']); ?>
			&nbsp;
		</p>
		<small class="text-uc text-xs text-muted"><?php echo __('End Date'); ?></small>
		<p>
			<?php echo h($staffTrainingProfile['StaffTrainingProfile']['end_date']); ?>
			&nbsp;
		</p>
		<small class="text-uc text-xs text-muted"><?php echo __('Duration'); ?></small>
		<p>
			<?php echo h($staffTrainingProfile['StaffTrainingProfile']['duration']); ?>
			&nbsp;
		</p>
		<small class="text-uc text-xs text-muted"><?php echo __('Remarks'); ?></small>
		<p>
			<?php echo h($staffTrainingProfile['StaffTrainingProfile']['remarks']); ?>
			&nbsp;
		</p>
		<small class="text-uc text-xs text-muted"><?php echo __('Status'); ?></small>
		<p>
			<?php echo h($staffTrainingProfile['StaffTrainingProfile']['status']); ?>
			&nbsp;
		</p>
		<small class="text-uc text-xs text-muted"><?php echo __('Theory'); ?></small>
		<p>
			<?php echo h($staffTrainingProfile['StaffTrainingProfile']['theory']); ?>
			&nbsp;
		</p>
		<small class="text-uc text-xs text-muted"><?php echo __('Practical'); ?></small>
		<p>
			<?php echo h($staffTrainingProfile['StaffTrainingProfile']['practical']); ?>
			&nbsp;
		</p>
		<small class="text-uc text-xs text-muted"><?php echo __('Doc'); ?></small>
		<p>
			<?php echo h($staffTrainingProfile['StaffTrainingProfile']['doc']); ?>
			&nbsp;
		</p>
		<small class="text-uc text-xs text-muted"><?php echo __('Comment'); ?></small>
		<p>
			<?php echo h($staffTrainingProfile['StaffTrainingProfile']['comment']); ?>
			&nbsp;
		</p>
		<small class="text-uc text-xs text-muted"><?php echo __('Pte'); ?></small>
		<p>
			<?php echo h($staffTrainingProfile['StaffTrainingProfile']['pte']); ?>
			&nbsp;
		</p>
		<small class="text-uc text-xs text-muted"><?php echo __('Active'); ?></small>
		<p>
			<?php echo h($staffTrainingProfile['StaffTrainingProfile']['active']); ?>
			&nbsp;
		</p>
		<small class="text-uc text-xs text-muted"><?php echo __('Created'); ?></small>
		<p>
			<?php echo h($staffTrainingProfile['StaffTrainingProfile']['created']); ?>
			&nbsp;
		</p>
		<small class="text-uc text-xs text-muted"><?php echo __('Modified'); ?></small>
		<p>
			<?php echo h($staffTrainingProfile['StaffTrainingProfile']['modified']); ?>
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
                           <?php echo $this->Html->link(__('Edit Staff Training Profile'), array('action' => 'edit', $staffTrainingProfile['StaffTrainingProfile']['id']), array('class'=>'list-group-item')); ?> <?php echo $this->Form->postLink(__('Delete Staff Training Profile'), array('action' => 'delete', $staffTrainingProfile['StaffTrainingProfile']['id']), array('class'=>'list-group-item'), __('Are you sure you want to delete # %s?', $staffTrainingProfile['StaffTrainingProfile']['id'])); ?>  <?php echo $this->Html->link(__('List Staff Training Profiles'), array('action' => 'index'), array('class'=>'list-group-item')); ?> <?php echo $this->Html->link(__('New Staff Training Profile'), array('action' => 'add'), array('class'=>'list-group-item')); ?>                          </div>
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
                          <?php echo $this->Html->link(__('List Staffs'), array('controller' => 'staffs', 'action' => 'index'), array('class' => 'list-group-item')); ?> &nbsp;&nbsp; <?php echo $this->Html->link(__('New Staff'), array('controller' => 'staffs', 'action' => 'add'), array('class' => 'list-group-item')); ?> &nbsp;&nbsp; <?php echo $this->Html->link(__('List Courses'), array('controller' => 'courses', 'action' => 'index'), array('class' => 'list-group-item')); ?> &nbsp;&nbsp; <?php echo $this->Html->link(__('New Course'), array('controller' => 'courses', 'action' => 'add'), array('class' => 'list-group-item')); ?> &nbsp;&nbsp;                           </div>
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