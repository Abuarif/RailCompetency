          <ul class="breadcrumb no-border no-radius b-b b-light pull-in">
            <li><a href="<?php echo $this->webroot; ?>"<i class="fa fa-home"></i> Home</a></li>
            <li class="active"><a href="#" onClick="location.reload();"><?php echo __('Staff'); ?>'s Details</a></li>
          </ul>
          <div class="m-b-md">
            <h3 class="m-b-none"><?php echo __('Staff'); ?>'s Details</h3>
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
			<?php echo h($staff['Staff']['id']); ?>
			&nbsp;
		</p>
		<small class="text-uc text-xs text-muted"><?php echo __('Organization'); ?></small>
		<p>
			<?php echo $this->Html->link($staff['Organization']['name'], array('controller' => 'organizations', 'action' => 'view', $staff['Organization']['id'])); ?>
			&nbsp;
		</p>
		<small class="text-uc text-xs text-muted"><?php echo __('Parent Staff'); ?></small>
		<p>
			<?php echo $this->Html->link($staff['ParentStaff']['name'], array('controller' => 'staffs', 'action' => 'view', $staff['ParentStaff']['id'])); ?>
			&nbsp;
		</p>
		<small class="text-uc text-xs text-muted"><?php echo __('User'); ?></small>
		<p>
			<?php echo $this->Html->link($staff['User']['name'], array('controller' => 'users', 'action' => 'view', $staff['User']['id'])); ?>
			&nbsp;
		</p>
		<small class="text-uc text-xs text-muted"><?php echo __('Staff No'); ?></small>
		<p>
			<?php echo h($staff['Staff']['staff_no']); ?>
			&nbsp;
		</p>
		<small class="text-uc text-xs text-muted"><?php echo __('Position'); ?></small>
		<p>
			<?php echo $this->Html->link($staff['Position']['name'], array('controller' => 'positions', 'action' => 'view', $staff['Position']['id'])); ?>
			&nbsp;
		</p>
		<small class="text-uc text-xs text-muted"><?php echo __('Name'); ?></small>
		<p>
			<?php echo h($staff['Staff']['name']); ?>
			&nbsp;
		</p>
		<small class="text-uc text-xs text-muted"><?php echo __('Parent Code'); ?></small>
		<p>
			<?php echo h($staff['Staff']['parent_code']); ?>
			&nbsp;
		</p>
		<small class="text-uc text-xs text-muted"><?php echo __('Org Code'); ?></small>
		<p>
			<?php echo h($staff['Staff']['org_code']); ?>
			&nbsp;
		</p>
		<small class="text-uc text-xs text-muted"><?php echo __('NRIC'); ?></small>
		<p>
			<?php echo h($staff['Staff']['NRIC']); ?>
			&nbsp;
		</p>
		<small class="text-uc text-xs text-muted"><?php echo __('Details'); ?></small>
		<p>
			<?php echo h($staff['Staff']['details']); ?>
			&nbsp;
		</p>
		<small class="text-uc text-xs text-muted"><?php echo __('IsTrainer'); ?></small>
		<p>
			<?php echo h($staff['Staff']['isTrainer']); ?>
			&nbsp;
		</p>
		<small class="text-uc text-xs text-muted"><?php echo __('Active'); ?></small>
		<p>
			<?php echo h($staff['Staff']['active']); ?>
			&nbsp;
		</p>
		<small class="text-uc text-xs text-muted"><?php echo __('Lft'); ?></small>
		<p>
			<?php echo h($staff['Staff']['lft']); ?>
			&nbsp;
		</p>
		<small class="text-uc text-xs text-muted"><?php echo __('Rght'); ?></small>
		<p>
			<?php echo h($staff['Staff']['rght']); ?>
			&nbsp;
		</p>
                        </section>
                        <section class="panel panel-info portlet-item">
                          <header class="panel-heading">
                            Quick links
                          </header>
                          <div class="list-group bg-white">
                           <?php echo $this->Html->link(__('Edit Staff'), array('action' => 'edit', $staff['Staff']['id']), array('class'=>'list-group-item', 'data-toggle'=>'ajaxModal')); ?> <?php echo $this->Form->postLink(__('Delete Staff'), array('action' => 'delete', $staff['Staff']['id']), array('class'=>'list-group-item'), __('Are you sure you want to delete # %s?', $staff['Staff']['id'])); ?>  <?php echo $this->Html->link(__('List Staffs'), array('action' => 'index'), array('class'=>'list-group-item')); ?> <?php echo $this->Html->link(__('New Staff'), array('action' => 'add'), array('class'=>'list-group-item', 'data-toggle'=>'ajaxModal', 'escape' => false)); ?>                              </div>
                        </section>
                        <section class="panel panel-info portlet-item">
                          <header class="panel-heading">
                            Associated links
                          </header>
                          <div class="list-group bg-white">
                          <?php echo $this->Html->link(__('List Organizations'), array('controller' => 'organizations', 'action' => 'index'), array('class' => 'list-group-item')); ?> &nbsp;&nbsp; <?php echo $this->Html->link(__('New Organization'), array('controller' => 'organizations', 'action' => 'add'), array('class' => 'list-group-item')); ?> &nbsp;&nbsp; <?php echo $this->Html->link(__('List Staffs'), array('controller' => 'staffs', 'action' => 'index'), array('class' => 'list-group-item')); ?> &nbsp;&nbsp; <?php echo $this->Html->link(__('New Parent Staff'), array('controller' => 'staffs', 'action' => 'add'), array('class' => 'list-group-item')); ?> &nbsp;&nbsp; <?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index'), array('class' => 'list-group-item')); ?> &nbsp;&nbsp; <?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add'), array('class' => 'list-group-item')); ?> &nbsp;&nbsp; <?php echo $this->Html->link(__('List Positions'), array('controller' => 'positions', 'action' => 'index'), array('class' => 'list-group-item')); ?> &nbsp;&nbsp; <?php echo $this->Html->link(__('New Position'), array('controller' => 'positions', 'action' => 'add'), array('class' => 'list-group-item')); ?> &nbsp;&nbsp; <?php echo $this->Html->link(__('List Availability Forms'), array('controller' => 'availability_forms', 'action' => 'index'), array('class' => 'list-group-item')); ?> &nbsp;&nbsp; <?php echo $this->Html->link(__('New Availability Form'), array('controller' => 'availability_forms', 'action' => 'add'), array('class' => 'list-group-item')); ?> &nbsp;&nbsp; <?php echo $this->Html->link(__('List Evaluation Details'), array('controller' => 'evaluation_details', 'action' => 'index'), array('class' => 'list-group-item')); ?> &nbsp;&nbsp; <?php echo $this->Html->link(__('New Evaluation Detail'), array('controller' => 'evaluation_details', 'action' => 'add'), array('class' => 'list-group-item')); ?> &nbsp;&nbsp; <?php echo $this->Html->link(__('List Evaluations'), array('controller' => 'evaluations', 'action' => 'index'), array('class' => 'list-group-item')); ?> &nbsp;&nbsp; <?php echo $this->Html->link(__('New Evaluation'), array('controller' => 'evaluations', 'action' => 'add'), array('class' => 'list-group-item')); ?> &nbsp;&nbsp; <?php echo $this->Html->link(__('List Event Attendances'), array('controller' => 'event_attendances', 'action' => 'index'), array('class' => 'list-group-item')); ?> &nbsp;&nbsp; <?php echo $this->Html->link(__('New Event Attendance'), array('controller' => 'event_attendances', 'action' => 'add'), array('class' => 'list-group-item')); ?> &nbsp;&nbsp; <?php echo $this->Html->link(__('List Event Trainers'), array('controller' => 'event_trainers', 'action' => 'index'), array('class' => 'list-group-item')); ?> &nbsp;&nbsp; <?php echo $this->Html->link(__('New Event Trainer'), array('controller' => 'event_trainers', 'action' => 'add'), array('class' => 'list-group-item')); ?> &nbsp;&nbsp; <?php echo $this->Html->link(__('List Staff Assignments'), array('controller' => 'staff_assignments', 'action' => 'index'), array('class' => 'list-group-item')); ?> &nbsp;&nbsp; <?php echo $this->Html->link(__('New Staff Assignment'), array('controller' => 'staff_assignments', 'action' => 'add'), array('class' => 'list-group-item')); ?> &nbsp;&nbsp; <?php echo $this->Html->link(__('List Staff Qualifications'), array('controller' => 'staff_qualifications', 'action' => 'index'), array('class' => 'list-group-item')); ?> &nbsp;&nbsp; <?php echo $this->Html->link(__('New Staff Qualification'), array('controller' => 'staff_qualifications', 'action' => 'add'), array('class' => 'list-group-item')); ?> &nbsp;&nbsp; <?php echo $this->Html->link(__('List Staff Training Profiles'), array('controller' => 'staff_training_profiles', 'action' => 'index'), array('class' => 'list-group-item')); ?> &nbsp;&nbsp; <?php echo $this->Html->link(__('New Staff Training Profile'), array('controller' => 'staff_training_profiles', 'action' => 'add'), array('class' => 'list-group-item')); ?> &nbsp;&nbsp; <?php echo $this->Html->link(__('List Trainer Migrates'), array('controller' => 'trainer_migrates', 'action' => 'index'), array('class' => 'list-group-item')); ?> &nbsp;&nbsp; <?php echo $this->Html->link(__('New Trainer Migrate'), array('controller' => 'trainer_migrates', 'action' => 'add'), array('class' => 'list-group-item')); ?> &nbsp;&nbsp; <?php echo $this->Html->link(__('List Trainers'), array('controller' => 'trainers', 'action' => 'index'), array('class' => 'list-group-item')); ?> &nbsp;&nbsp; <?php echo $this->Html->link(__('New Trainer'), array('controller' => 'trainers', 'action' => 'add'), array('class' => 'list-group-item')); ?> &nbsp;&nbsp;                           </div>
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
                                                      <li><a href="#AvailabilityForms" data-toggle="tab">Availability Forms</a></li>
                                                      <li><a href="#EvaluationDetails" data-toggle="tab">Evaluation Details</a></li>
                                                      <li><a href="#Evaluations" data-toggle="tab">Evaluations</a></li>
                                                      <li><a href="#EventAttendances" data-toggle="tab">Event Attendances</a></li>
                                                      <li><a href="#EventTrainers" data-toggle="tab">Event Trainers</a></li>
                                                      <li><a href="#StaffAssignments" data-toggle="tab">Staff Assignments</a></li>
                                                      <li><a href="#StaffQualifications" data-toggle="tab">Staff Qualifications</a></li>
                                                      <li><a href="#StaffTrainingProfiles" data-toggle="tab">Staff Training Profiles</a></li>
                                                      <li><a href="#Staffs" data-toggle="tab">Staffs</a></li>
                                                      <li><a href="#TrainerMigrates" data-toggle="tab">Trainer Migrates</a></li>
                                                      <li><a href="#Trainers" data-toggle="tab">Trainers</a></li>
                            
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
                          <section class="scrollable wrapper">
                            <div class="row">
                              <div class="col-sm-6 portlet">
                                <!-- <div class="portlet"> -->
                                <section class="panel panel-info portlet-item">
                                  <header class="panel-heading">
                                    Training Completion
                                  </header>

                                  <div class="panel-body text-center">
                                    <h4>62.5<small> hrs</small></h4>
                                    <small class="text-muted block">Updated at 2 minutes ago</small>
                                    <div class="inline">
                                      <div class="easypiechart easyPieChart" data-percent="75" data-line-width="16" data-loop="false" data-size="188" style="width: 188px; height: 188px; line-height: 188px;">
                                        <span class="h2 step">75</span>%
                                        <div class="easypie-text">New</div>
                                      <canvas width="206" height="206" style="width: 188px; height: 188px;"></canvas></div>
                                    </div>                      
                                  </div>
                                  <div class="panel-footer"><small>% of avarage rate of the Conversion</small></div>
                                </section>
                              </div>
                              <div class="col-sm-6 portlet">
                                <section class="panel panel-info portlet-item">
                                  <header class="panel-heading bg-primary dker no-border"><strong>Calendar</strong></header>
                                  <div id="calendar" class="bg-primary m-l-n-xxs m-r-n-xxs"></div>
                                  <div class="list-group">
                                    <a href="#" class="list-group-item text-ellipsis">
                                      <span class="badge bg-danger">7:30</span> 
                                      Meet a friend
                                    </a>
                                    <a href="#" class="list-group-item text-ellipsis"> 
                                      <span class="badge bg-success">9:30</span> 
                                      Have a kick off meeting with .inc company
                                    </a>
                                    <a href="#" class="list-group-item text-ellipsis">
                                      <span class="badge bg-light">19:30</span>
                                      Milestone release
                                    </a>
                                  </div>
                                </section>
                              </div>
                              <div class="col-sm-6 portlet">
                                <section class="panel panel-info portlet-item">
                                  <header class="panel-heading">
                                    Scores & Performance Ratings
                                  </header>

                                  <div class="panel-body text-center">
                                    <h4>62.5<small> hrs</small></h4>
                                    <small class="text-muted block">Updated at 2 minutes ago</small>
                                    <div class="inline">
                                      <div class="easypiechart easyPieChart" data-percent="75" data-line-width="16" data-loop="false" data-size="188" style="width: 188px; height: 188px; line-height: 188px;">
                                        <span class="h2 step">75</span>%
                                        <div class="easypie-text">New</div>
                                      <canvas width="206" height="206" style="width: 188px; height: 188px;"></canvas></div>
                                    </div>                      
                                  </div>
                                  <div class="panel-footer"><small>% of avarage rate of the Conversion</small></div>
                                </section>
                              </div>
                              <div class="col-sm-6 portlet">
                                <section class="panel panel-default portlet-item">
                                  <header class="panel-heading">
                                    <ul class="nav nav-pills pull-right">
                                      <li>
                                        <a href="#" class="panel-toggle text-muted"><i class="fa fa-caret-down text-active"></i><i class="fa fa-caret-up text"></i></a>
                                      </li>
                                    </ul>
                                    News <span class="badge bg-info">32</span>                    
                                  </header>
                                  <section class="panel-body">
                                    <article class="media">
                                      <div class="pull-left">
                                        <span class="fa-stack fa-lg">
                                          <i class="fa fa-circle fa-stack-2x"></i>
                                          <i class="fa fa-bold fa-stack-1x text-white"></i>
                                        </span>
                                      </div>
                                      <div class="media-body">                        
                                        <a href="#" class="h4">Bootstrap 3: What you need to know</a>
                                        <small class="block m-t-xs">Sleek, intuitive, and powerful mobile-first front-end framework for faster and easier web development.</small>
                                        <em class="text-xs">Posted on <span class="text-danger">Feb 23, 2013</span></em>
                                      </div>
                                    </article>
                                    <div class="line pull-in"></div>
                                    <article class="media">
                                      <div class="pull-left">
                                        <span class="fa-stack fa-lg">
                                          <i class="fa fa-circle fa-stack-2x text-info"></i>
                                          <i class="fa fa-file-o fa-stack-1x text-white"></i>
                                        </span>
                                      </div>
                                      <div class="media-body">
                                        <a href="#" class="h4">Bootstrap documents</a>
                                        <small class="block m-t-xs">There are a few easy ways to quickly get started with Bootstrap, each one appealing to a different skill level and use case. Read through to see what suits your particular needs.</small>
                                        <em class="text-xs">Posted on <span class="text-danger">Feb 12, 2013</span></em>
                                      </div>
                                    </article>
                                    <div class="line pull-in"></div>
                                    <article class="media">
                                      <div class="pull-left">
                                        <span class="fa-stack fa-lg">
                                          <i class="fa fa-circle fa-stack-2x icon-muted"></i>
                                          <i class="fa fa-mobile fa-stack-1x text-white"></i>
                                        </span>
                                      </div>
                                      <div class="media-body">
                                        <a href="#" class="h4 text-success">Mobile first html/css framework</a>
                                        <small class="block m-t-xs">Bootstrap, Ratchet</small>
                                        <em class="text-xs">Posted on <span class="text-danger">Feb 05, 2013</span></em>
                                      </div>
                                    </article>
                                  </section>
                                </section>
                              </div>
                              <div class="col-sm-6 portlet">
                                <section class="panel panel-success portlet-item">
                                  <header class="panel-heading">
                                    Connection
                                  </header>
                                  <ul class="list-group alt">
                                    <li class="list-group-item">
                                      <div class="media">
                                        <span class="pull-left thumb-sm"><img src="images/avatar.jpg" alt="John said" class="img-circle"></span>
                                        <div class="pull-right text-success m-t-sm">
                                          <i class="fa fa-circle"></i>
                                        </div>
                                        <div class="media-body">
                                          <div><a href="#">Chris Fox</a></div>
                                          <small class="text-muted">about 2 minutes ago</small>
                                        </div>
                                      </div>
                                    </li>
                                    <li class="list-group-item">
                                      <div class="media">
                                        <span class="pull-left thumb-sm"><img src="images/avatar.jpg" alt="John said" class="img-circle"></span>
                                        <div class="pull-right text-muted m-t-sm">
                                          <i class="fa fa-circle"></i>
                                        </div>
                                        <div class="media-body">
                                          <div><a href="#">Amanda Conlan</a></div>
                                          <small class="text-muted">about 2 hours ago</small>
                                        </div>
                                      </div>
                                    </li>
                                    <li class="list-group-item">
                                      <div class="media">
                                        <span class="pull-left thumb-sm"><img src="images/avatar.jpg" alt="John said" class="img-circle"></span>
                                        <div class="pull-right text-warning m-t-sm">
                                          <i class="fa fa-circle"></i>
                                        </div>
                                        <div class="media-body">
                                          <div><a href="#">Dan Doorack</a></div>
                                          <small class="text-muted">3 days ago</small>
                                        </div>
                                      </div>
                                    </li>
                                    <li class="list-group-item">
                                      <div class="media">
                                        <span class="pull-left thumb-sm"><img src="images/avatar.jpg" alt="John said" class="img-circle"></span>
                                        <div class="pull-right text-danger m-t-sm">
                                          <i class="fa fa-circle"></i>
                                        </div>
                                        <div class="media-body">
                                          <div><a href="#">Lauren Taylor</a></div>
                                          <small class="text-muted">about 2 minutes ago</small>
                                        </div>
                                      </div>
                                    </li>
                                  </ul>
                                </section>
                              </div>
                            </div>
                          </section>
                        </div>
                        <!-- start hasOne -->
                                                  <!-- end hasOne -->
                          <!-- start hasMany -->
                                                  <div class="tab-pane padder" id="AvailabilityForms">
                            <h3><?php echo __('Related Availability Forms'); ?></h3>
                            

                            <?php if (!empty($staff['AvailabilityForm'])): ?>
                            <section class="panel panel-default padder">
                              <div class="row wrapper">
                                <div class="col-sm-5 m-b-xs">
                                    			<?php echo $this->Html->link(' Create', array('controller' => 'availability_forms', 'action' => 'add' ), array('class' => 'btn btn-default bg-success fa fa-plus', 'data-toggle'=>'ajaxModal', 'style'=>'color:#000;', 'escape' => false)); ?>
 
                                </div>
                              </div>
                              <div class="table-responsive">
                                <table class="table table-striped b-t b-light">
                                  <thead>
                                    <tr>
                                      <th class="actions"><?php echo __('Actions'); ?></th>
                                                                                                                                                                                                                                                                          <th>
                                        		<?php echo __('Availability Report Id'); ?>
                                      </th>
                                                                                                                                                      <th>
                                        		<?php echo __('Availability Detail Id'); ?>
                                      </th>
                                                                                                                                                      <th>
                                        		<?php echo __('Value'); ?>
                                      </th>
                                                                                                                                                      <th>
                                        		<?php echo __('Description'); ?>
                                      </th>
                                                                                                                                                      <th>
                                        		<?php echo __('Active'); ?>
                                      </th>
                                                                                                                                                                                                                                                                      </tr>
                                  </thead>
                                  <tfoot>
                                    <tr>
                                      <th class="actions"><?php echo __('Actions'); ?></th>
                                                                                                                                                                                                                                                                          <th>
                                        		<?php echo __('Availability Report Id'); ?>
                                      </th>
                                                                                                                                                      <th>
                                        		<?php echo __('Availability Detail Id'); ?>
                                      </th>
                                                                                                                                                      <th>
                                        		<?php echo __('Value'); ?>
                                      </th>
                                                                                                                                                      <th>
                                        		<?php echo __('Description'); ?>
                                      </th>
                                                                                                                                                      <th>
                                        		<?php echo __('Active'); ?>
                                      </th>
                                                                                                                                                                                                                                                                      </tr>
                                  </tfoot>
                                  
                                  <tbody>
                                  	<?php foreach ($staff['AvailabilityForm'] as $availabilityForm): ?>
		<tr>
			<td class="actions">
				<?php echo $this->Html->link('', array('controller' => 'availability_forms', 'action' => 'sneak', $availabilityForm['id']), array('class'=>'btn btn-xs btn-success fa fa-desktop', 'style'=>'color:#000;width:25px; height:25px; padding-top:5px','data-toggle'=>'tooltip', 'data-placement'=>'right', 'title'=>'View Details', 'data-toggle'=>'ajaxModal', 'escape' => false)); ?>
				<?php echo $this->Html->link('', array('controller' => 'availability_forms', 'action' => 'edit', $availabilityForm['id']), array('class'=>'btn btn-xs btn-warning fa fa-pencil', 'style'=>'color:#000;width:25px; height:25px; padding-top:5px','data-toggle'=>'tooltip', 'data-placement'=>'right', 'title'=>'Modify Details', 'data-toggle'=>'ajaxModal', 'escape' => false)); ?>
			</td>
			<td><?php echo $availabilityForm['staff_id']; ?></td>
			<td><?php echo $availabilityForm['availability_report_id']; ?></td>
			<td><?php echo $availabilityForm['availability_detail_id']; ?></td>
			<td><?php echo $availabilityForm['value']; ?></td>
			<td><?php echo $availabilityForm['description']; ?></td>
			<td><?php echo $availabilityForm['active']; ?></td>
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
                                  			<?php echo $this->Html->link(' Create', array('controller' => 'availability_forms', 'action' => 'add' ), array('class' => 'btn btn-default bg-success fa fa-plus', 'data-toggle'=>'ajaxModal', 'style'=>'color:#000;', 'escape' => false)); ?>
 
                              </div>
                            </div>
                          </div>
                                                    <div class="tab-pane padder" id="EvaluationDetails">
                            <h3><?php echo __('Related Evaluation Details'); ?></h3>
                            

                            <?php if (!empty($staff['EvaluationDetail'])): ?>
                            <section class="panel panel-default padder">
                              <div class="row wrapper">
                                <div class="col-sm-5 m-b-xs">
                                    			<?php echo $this->Html->link(' Create', array('controller' => 'evaluation_details', 'action' => 'add' ), array('class' => 'btn btn-default bg-success fa fa-plus', 'data-toggle'=>'ajaxModal', 'style'=>'color:#000;', 'escape' => false)); ?>
 
                                </div>
                              </div>
                              <div class="table-responsive">
                                <table class="table table-striped b-t b-light">
                                  <thead>
                                    <tr>
                                      <th class="actions"><?php echo __('Actions'); ?></th>
                                                                                                                                                                                                                                                                          <th>
                                        		<?php echo __('Evaluation Questionnaire Id'); ?>
                                      </th>
                                                                                                                                                      <th>
                                        		<?php echo __('Score'); ?>
                                      </th>
                                                                                                                                                      <th>
                                        		<?php echo __('Active'); ?>
                                      </th>
                                                                                                                                                                                                                                  <th>
                                        		<?php echo __('Updated'); ?>
                                      </th>
                                                                                                              </tr>
                                  </thead>
                                  <tfoot>
                                    <tr>
                                      <th class="actions"><?php echo __('Actions'); ?></th>
                                                                                                                                                                                                                                                                          <th>
                                        		<?php echo __('Evaluation Questionnaire Id'); ?>
                                      </th>
                                                                                                                                                      <th>
                                        		<?php echo __('Score'); ?>
                                      </th>
                                                                                                                                                      <th>
                                        		<?php echo __('Active'); ?>
                                      </th>
                                                                                                                                                                                                                                  <th>
                                        		<?php echo __('Updated'); ?>
                                      </th>
                                                                                                              </tr>
                                  </tfoot>
                                  
                                  <tbody>
                                  	<?php foreach ($staff['EvaluationDetail'] as $evaluationDetail): ?>
		<tr>
			<td class="actions">
				<?php echo $this->Html->link('', array('controller' => 'evaluation_details', 'action' => 'sneak', $evaluationDetail['id']), array('class'=>'btn btn-xs btn-success fa fa-desktop', 'style'=>'color:#000;width:25px; height:25px; padding-top:5px','data-toggle'=>'tooltip', 'data-placement'=>'right', 'title'=>'View Details', 'data-toggle'=>'ajaxModal', 'escape' => false)); ?>
				<?php echo $this->Html->link('', array('controller' => 'evaluation_details', 'action' => 'edit', $evaluationDetail['id']), array('class'=>'btn btn-xs btn-warning fa fa-pencil', 'style'=>'color:#000;width:25px; height:25px; padding-top:5px','data-toggle'=>'tooltip', 'data-placement'=>'right', 'title'=>'Modify Details', 'data-toggle'=>'ajaxModal', 'escape' => false)); ?>
			</td>
			<td><?php echo $evaluationDetail['staff_id']; ?></td>
			<td><?php echo $evaluationDetail['evaluation_questionnaire_id']; ?></td>
			<td><?php echo $evaluationDetail['score']; ?></td>
			<td><?php echo $evaluationDetail['active']; ?></td>
			<td><?php echo $evaluationDetail['updated']; ?></td>
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
                                  			<?php echo $this->Html->link(' Create', array('controller' => 'evaluation_details', 'action' => 'add' ), array('class' => 'btn btn-default bg-success fa fa-plus', 'data-toggle'=>'ajaxModal', 'style'=>'color:#000;', 'escape' => false)); ?>
 
                              </div>
                            </div>
                          </div>
                                                    <div class="tab-pane padder" id="Evaluations">
                            <h3><?php echo __('Related Evaluations'); ?></h3>
                            

                            <?php if (!empty($staff['Evaluation'])): ?>
                            <section class="panel panel-default padder">
                              <div class="row wrapper">
                                <div class="col-sm-5 m-b-xs">
                                    			<?php echo $this->Html->link(' Create', array('controller' => 'evaluations', 'action' => 'add' ), array('class' => 'btn btn-default bg-success fa fa-plus', 'data-toggle'=>'ajaxModal', 'style'=>'color:#000;', 'escape' => false)); ?>
 
                                </div>
                              </div>
                              <div class="table-responsive">
                                <table class="table table-striped b-t b-light">
                                  <thead>
                                    <tr>
                                      <th class="actions"><?php echo __('Actions'); ?></th>
                                                                                                                                                                                              <th>
                                        		<?php echo __('Evaluation Type Id'); ?>
                                      </th>
                                                                                                                                                                                                                                  <th>
                                        		<?php echo __('Course Id'); ?>
                                      </th>
                                                                                                                                                      <th>
                                        		<?php echo __('Event Id'); ?>
                                      </th>
                                                                                                                                                      <th>
                                        		<?php echo __('Total Score'); ?>
                                      </th>
                                                                                                                                                      <th>
                                        		<?php echo __('Grade Id'); ?>
                                      </th>
                                                                                                                                                      <th>
                                        		<?php echo __('Notes'); ?>
                                      </th>
                                                                                                                                                      <th>
                                        		<?php echo __('Evaluated By'); ?>
                                      </th>
                                                                                                                                                                                                                                  <th>
                                        		<?php echo __('Updated'); ?>
                                      </th>
                                                                                                              </tr>
                                  </thead>
                                  <tfoot>
                                    <tr>
                                      <th class="actions"><?php echo __('Actions'); ?></th>
                                                                                                                                                                                              <th>
                                        		<?php echo __('Evaluation Type Id'); ?>
                                      </th>
                                                                                                                                                                                                                                  <th>
                                        		<?php echo __('Course Id'); ?>
                                      </th>
                                                                                                                                                      <th>
                                        		<?php echo __('Event Id'); ?>
                                      </th>
                                                                                                                                                      <th>
                                        		<?php echo __('Total Score'); ?>
                                      </th>
                                                                                                                                                      <th>
                                        		<?php echo __('Grade Id'); ?>
                                      </th>
                                                                                                                                                      <th>
                                        		<?php echo __('Notes'); ?>
                                      </th>
                                                                                                                                                      <th>
                                        		<?php echo __('Evaluated By'); ?>
                                      </th>
                                                                                                                                                                                                                                  <th>
                                        		<?php echo __('Updated'); ?>
                                      </th>
                                                                                                              </tr>
                                  </tfoot>
                                  
                                  <tbody>
                                  	<?php foreach ($staff['Evaluation'] as $evaluation): ?>
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
                                  			<?php echo $this->Html->link(' Create', array('controller' => 'evaluations', 'action' => 'add' ), array('class' => 'btn btn-default bg-success fa fa-plus', 'data-toggle'=>'ajaxModal', 'style'=>'color:#000;', 'escape' => false)); ?>
 
                              </div>
                            </div>
                          </div>
                                                    <div class="tab-pane padder" id="EventAttendances">
                            <h3><?php echo __('Related Event Attendances'); ?></h3>
                            

                            <?php if (!empty($staff['EventAttendance'])): ?>
                            <section class="panel panel-default padder">
                              <div class="row wrapper">
                                <div class="col-sm-5 m-b-xs">
                                    			<?php echo $this->Html->link(' Create', array('controller' => 'event_attendances', 'action' => 'add' ), array('class' => 'btn btn-default bg-success fa fa-plus', 'data-toggle'=>'ajaxModal', 'style'=>'color:#000;', 'escape' => false)); ?>
 
                                </div>
                              </div>
                              <div class="table-responsive">
                                <table class="table table-striped b-t b-light">
                                  <thead>
                                    <tr>
                                      <th class="actions"><?php echo __('Actions'); ?></th>
                                                                                                                                                                                              <th>
                                        		<?php echo __('Event Id'); ?>
                                      </th>
                                                                                                                                                                                                                                  <th>
                                        		<?php echo __('Signed By'); ?>
                                      </th>
                                                                                                                                                      <th>
                                        		<?php echo __('IsEnrolled'); ?>
                                      </th>
                                                                                                                                                      <th>
                                        		<?php echo __('IsCompleted'); ?>
                                      </th>
                                                                                                                                                      <th>
                                        		<?php echo __('Notes'); ?>
                                      </th>
                                                                                                                                                      <th>
                                        		<?php echo __('Active'); ?>
                                      </th>
                                                                                                                                                                                                                                                                      </tr>
                                  </thead>
                                  <tfoot>
                                    <tr>
                                      <th class="actions"><?php echo __('Actions'); ?></th>
                                                                                                                                                                                              <th>
                                        		<?php echo __('Event Id'); ?>
                                      </th>
                                                                                                                                                                                                                                  <th>
                                        		<?php echo __('Signed By'); ?>
                                      </th>
                                                                                                                                                      <th>
                                        		<?php echo __('IsEnrolled'); ?>
                                      </th>
                                                                                                                                                      <th>
                                        		<?php echo __('IsCompleted'); ?>
                                      </th>
                                                                                                                                                      <th>
                                        		<?php echo __('Notes'); ?>
                                      </th>
                                                                                                                                                      <th>
                                        		<?php echo __('Active'); ?>
                                      </th>
                                                                                                                                                                                                                                                                      </tr>
                                  </tfoot>
                                  
                                  <tbody>
                                  	<?php foreach ($staff['EventAttendance'] as $eventAttendance): ?>
		<tr>
			<td class="actions">
				<?php echo $this->Html->link('', array('controller' => 'event_attendances', 'action' => 'sneak', $eventAttendance['id']), array('class'=>'btn btn-xs btn-success fa fa-desktop', 'style'=>'color:#000;width:25px; height:25px; padding-top:5px','data-toggle'=>'tooltip', 'data-placement'=>'right', 'title'=>'View Details', 'data-toggle'=>'ajaxModal', 'escape' => false)); ?>
				<?php echo $this->Html->link('', array('controller' => 'event_attendances', 'action' => 'edit', $eventAttendance['id']), array('class'=>'btn btn-xs btn-warning fa fa-pencil', 'style'=>'color:#000;width:25px; height:25px; padding-top:5px','data-toggle'=>'tooltip', 'data-placement'=>'right', 'title'=>'Modify Details', 'data-toggle'=>'ajaxModal', 'escape' => false)); ?>
			</td>
			<td><?php echo $eventAttendance['event_id']; ?></td>
			<td><?php echo $eventAttendance['staff_id']; ?></td>
			<td><?php echo $eventAttendance['signed_by']; ?></td>
			<td><?php echo $eventAttendance['isEnrolled']; ?></td>
			<td><?php echo $eventAttendance['isCompleted']; ?></td>
			<td><?php echo $eventAttendance['notes']; ?></td>
			<td><?php echo $eventAttendance['active']; ?></td>
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
                                  			<?php echo $this->Html->link(' Create', array('controller' => 'event_attendances', 'action' => 'add' ), array('class' => 'btn btn-default bg-success fa fa-plus', 'data-toggle'=>'ajaxModal', 'style'=>'color:#000;', 'escape' => false)); ?>
 
                              </div>
                            </div>
                          </div>
                                                    <div class="tab-pane padder" id="EventTrainers">
                            <h3><?php echo __('Related Event Trainers'); ?></h3>
                            

                            <?php if (!empty($staff['EventTrainer'])): ?>
                            <section class="panel panel-default padder">
                              <div class="row wrapper">
                                <div class="col-sm-5 m-b-xs">
                                    			<?php echo $this->Html->link(' Create', array('controller' => 'event_trainers', 'action' => 'add' ), array('class' => 'btn btn-default bg-success fa fa-plus', 'data-toggle'=>'ajaxModal', 'style'=>'color:#000;', 'escape' => false)); ?>
 
                                </div>
                              </div>
                              <div class="table-responsive">
                                <table class="table table-striped b-t b-light">
                                  <thead>
                                    <tr>
                                      <th class="actions"><?php echo __('Actions'); ?></th>
                                                                                                                                                                                              <th>
                                        		<?php echo __('Event Id'); ?>
                                      </th>
                                                                                                                                                      <th>
                                        		<?php echo __('Course Id'); ?>
                                      </th>
                                                                                                                                                                                                                                  <th>
                                        		<?php echo __('Active'); ?>
                                      </th>
                                                                                                                                                                                                                                                                      </tr>
                                  </thead>
                                  <tfoot>
                                    <tr>
                                      <th class="actions"><?php echo __('Actions'); ?></th>
                                                                                                                                                                                              <th>
                                        		<?php echo __('Event Id'); ?>
                                      </th>
                                                                                                                                                      <th>
                                        		<?php echo __('Course Id'); ?>
                                      </th>
                                                                                                                                                                                                                                  <th>
                                        		<?php echo __('Active'); ?>
                                      </th>
                                                                                                                                                                                                                                                                      </tr>
                                  </tfoot>
                                  
                                  <tbody>
                                  	<?php foreach ($staff['EventTrainer'] as $eventTrainer): ?>
		<tr>
			<td class="actions">
				<?php echo $this->Html->link('', array('controller' => 'event_trainers', 'action' => 'sneak', $eventTrainer['id']), array('class'=>'btn btn-xs btn-success fa fa-desktop', 'style'=>'color:#000;width:25px; height:25px; padding-top:5px','data-toggle'=>'tooltip', 'data-placement'=>'right', 'title'=>'View Details', 'data-toggle'=>'ajaxModal', 'escape' => false)); ?>
				<?php echo $this->Html->link('', array('controller' => 'event_trainers', 'action' => 'edit', $eventTrainer['id']), array('class'=>'btn btn-xs btn-warning fa fa-pencil', 'style'=>'color:#000;width:25px; height:25px; padding-top:5px','data-toggle'=>'tooltip', 'data-placement'=>'right', 'title'=>'Modify Details', 'data-toggle'=>'ajaxModal', 'escape' => false)); ?>
			</td>
			<td><?php echo $eventTrainer['event_id']; ?></td>
			<td><?php echo $eventTrainer['course_id']; ?></td>
			<td><?php echo $eventTrainer['staff_id']; ?></td>
			<td><?php echo $eventTrainer['active']; ?></td>
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
                                  			<?php echo $this->Html->link(' Create', array('controller' => 'event_trainers', 'action' => 'add' ), array('class' => 'btn btn-default bg-success fa fa-plus', 'data-toggle'=>'ajaxModal', 'style'=>'color:#000;', 'escape' => false)); ?>
 
                              </div>
                            </div>
                          </div>
                                                    <div class="tab-pane padder" id="StaffAssignments">
                            <h3><?php echo __('Related Staff Assignments'); ?></h3>
                            

                            <?php if (!empty($staff['StaffAssignment'])): ?>
                            <section class="panel panel-default padder">
                              <div class="row wrapper">
                                <div class="col-sm-5 m-b-xs">
                                    			<?php echo $this->Html->link(' Create', array('controller' => 'staff_assignments', 'action' => 'add' ), array('class' => 'btn btn-default bg-success fa fa-plus', 'data-toggle'=>'ajaxModal', 'style'=>'color:#000;', 'escape' => false)); ?>
 
                                </div>
                              </div>
                              <div class="table-responsive">
                                <table class="table table-striped b-t b-light">
                                  <thead>
                                    <tr>
                                      <th class="actions"><?php echo __('Actions'); ?></th>
                                                                                                                                                                                                                                                                          <th>
                                        		<?php echo __('Service Id'); ?>
                                      </th>
                                                                                                                                                      <th>
                                        		<?php echo __('Active'); ?>
                                      </th>
                                                                                                                                                                                                                                                                      </tr>
                                  </thead>
                                  <tfoot>
                                    <tr>
                                      <th class="actions"><?php echo __('Actions'); ?></th>
                                                                                                                                                                                                                                                                          <th>
                                        		<?php echo __('Service Id'); ?>
                                      </th>
                                                                                                                                                      <th>
                                        		<?php echo __('Active'); ?>
                                      </th>
                                                                                                                                                                                                                                                                      </tr>
                                  </tfoot>
                                  
                                  <tbody>
                                  	<?php foreach ($staff['StaffAssignment'] as $staffAssignment): ?>
		<tr>
			<td class="actions">
				<?php echo $this->Html->link('', array('controller' => 'staff_assignments', 'action' => 'sneak', $staffAssignment['id']), array('class'=>'btn btn-xs btn-success fa fa-desktop', 'style'=>'color:#000;width:25px; height:25px; padding-top:5px','data-toggle'=>'tooltip', 'data-placement'=>'right', 'title'=>'View Details', 'data-toggle'=>'ajaxModal', 'escape' => false)); ?>
				<?php echo $this->Html->link('', array('controller' => 'staff_assignments', 'action' => 'edit', $staffAssignment['id']), array('class'=>'btn btn-xs btn-warning fa fa-pencil', 'style'=>'color:#000;width:25px; height:25px; padding-top:5px','data-toggle'=>'tooltip', 'data-placement'=>'right', 'title'=>'Modify Details', 'data-toggle'=>'ajaxModal', 'escape' => false)); ?>
			</td>
			<td><?php echo $staffAssignment['staff_id']; ?></td>
			<td><?php echo $staffAssignment['service_id']; ?></td>
			<td><?php echo $staffAssignment['active']; ?></td>
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
                                  			<?php echo $this->Html->link(' Create', array('controller' => 'staff_assignments', 'action' => 'add' ), array('class' => 'btn btn-default bg-success fa fa-plus', 'data-toggle'=>'ajaxModal', 'style'=>'color:#000;', 'escape' => false)); ?>
 
                              </div>
                            </div>
                          </div>
                                                    <div class="tab-pane padder" id="StaffQualifications">
                            <h3><?php echo __('Related Staff Qualifications'); ?></h3>
                            

                            <?php if (!empty($staff['StaffQualification'])): ?>
                            <section class="panel panel-default padder">
                              <div class="row wrapper">
                                <div class="col-sm-5 m-b-xs">
                                    			<?php echo $this->Html->link(' Create', array('controller' => 'staff_qualifications', 'action' => 'add' ), array('class' => 'btn btn-default bg-success fa fa-plus', 'data-toggle'=>'ajaxModal', 'style'=>'color:#000;', 'escape' => false)); ?>
 
                                </div>
                              </div>
                              <div class="table-responsive">
                                <table class="table table-striped b-t b-light">
                                  <thead>
                                    <tr>
                                      <th class="actions"><?php echo __('Actions'); ?></th>
                                                                                                                                                                                                                                                                          <th>
                                        		<?php echo __('Certificate Name'); ?>
                                      </th>
                                                                                                                                                      <th>
                                        		<?php echo __('Completed On'); ?>
                                      </th>
                                                                                                                                                                                                                                  <th>
                                        		<?php echo __('Updated'); ?>
                                      </th>
                                                                                                                                                      <th>
                                        		<?php echo __('Status'); ?>
                                      </th>
                                                                                                              </tr>
                                  </thead>
                                  <tfoot>
                                    <tr>
                                      <th class="actions"><?php echo __('Actions'); ?></th>
                                                                                                                                                                                                                                                                          <th>
                                        		<?php echo __('Certificate Name'); ?>
                                      </th>
                                                                                                                                                      <th>
                                        		<?php echo __('Completed On'); ?>
                                      </th>
                                                                                                                                                                                                                                  <th>
                                        		<?php echo __('Updated'); ?>
                                      </th>
                                                                                                                                                      <th>
                                        		<?php echo __('Status'); ?>
                                      </th>
                                                                                                              </tr>
                                  </tfoot>
                                  
                                  <tbody>
                                  	<?php foreach ($staff['StaffQualification'] as $staffQualification): ?>
		<tr>
			<td class="actions">
				<?php echo $this->Html->link('', array('controller' => 'staff_qualifications', 'action' => 'sneak', $staffQualification['id']), array('class'=>'btn btn-xs btn-success fa fa-desktop', 'style'=>'color:#000;width:25px; height:25px; padding-top:5px','data-toggle'=>'tooltip', 'data-placement'=>'right', 'title'=>'View Details', 'data-toggle'=>'ajaxModal', 'escape' => false)); ?>
				<?php echo $this->Html->link('', array('controller' => 'staff_qualifications', 'action' => 'edit', $staffQualification['id']), array('class'=>'btn btn-xs btn-warning fa fa-pencil', 'style'=>'color:#000;width:25px; height:25px; padding-top:5px','data-toggle'=>'tooltip', 'data-placement'=>'right', 'title'=>'Modify Details', 'data-toggle'=>'ajaxModal', 'escape' => false)); ?>
			</td>
			<td><?php echo $staffQualification['staff_id']; ?></td>
			<td><?php echo $staffQualification['certificate_name']; ?></td>
			<td><?php echo $staffQualification['completed_on']; ?></td>
			<td><?php echo $staffQualification['updated']; ?></td>
			<td><?php echo $staffQualification['status']; ?></td>
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
                                  			<?php echo $this->Html->link(' Create', array('controller' => 'staff_qualifications', 'action' => 'add' ), array('class' => 'btn btn-default bg-success fa fa-plus', 'data-toggle'=>'ajaxModal', 'style'=>'color:#000;', 'escape' => false)); ?>
 
                              </div>
                            </div>
                          </div>
                                                    <div class="tab-pane padder" id="StaffTrainingProfiles">
                            <h3><?php echo __('Related Staff Training Profiles'); ?></h3>
                            

                            <?php if (!empty($staff['StaffTrainingProfile'])): ?>
                            <section class="panel panel-default padder">
                              <div class="row wrapper">
                                <div class="col-sm-5 m-b-xs">
                                    			<?php echo $this->Html->link(' Create', array('controller' => 'staff_training_profiles', 'action' => 'add' ), array('class' => 'btn btn-default bg-success fa fa-plus', 'data-toggle'=>'ajaxModal', 'style'=>'color:#000;', 'escape' => false)); ?>
 
                                </div>
                              </div>
                              <div class="table-responsive">
                                <table class="table table-striped b-t b-light">
                                  <thead>
                                    <tr>
                                      <th class="actions"><?php echo __('Actions'); ?></th>
                                                                                                                                                                                                                                                                          <th>
                                        		<?php echo __('Staff No'); ?>
                                      </th>
                                                                                                                                                      <th>
                                        		<?php echo __('Name'); ?>
                                      </th>
                                                                                                                                                      <th>
                                        		<?php echo __('Parent Code'); ?>
                                      </th>
                                                                                                                                                      <th>
                                        		<?php echo __('Org Code'); ?>
                                      </th>
                                                                                                                                                      <th>
                                        		<?php echo __('Course Id'); ?>
                                      </th>
                                                                                                                                                      <th>
                                        		<?php echo __('Code'); ?>
                                      </th>
                                                                                                                                                      <th>
                                        		<?php echo __('Course Name'); ?>
                                      </th>
                                                                                                                                                      <th>
                                        		<?php echo __('Start Date'); ?>
                                      </th>
                                                                                                                                                      <th>
                                        		<?php echo __('End Date'); ?>
                                      </th>
                                                                                                                                                      <th>
                                        		<?php echo __('Duration'); ?>
                                      </th>
                                                                                                                                                      <th>
                                        		<?php echo __('Remarks'); ?>
                                      </th>
                                                                                                                                                      <th>
                                        		<?php echo __('Status'); ?>
                                      </th>
                                                                                                                                                      <th>
                                        		<?php echo __('Theory'); ?>
                                      </th>
                                                                                                                                                      <th>
                                        		<?php echo __('Practical'); ?>
                                      </th>
                                                                                                                                                      <th>
                                        		<?php echo __('Doc'); ?>
                                      </th>
                                                                                                                                                      <th>
                                        		<?php echo __('Comment'); ?>
                                      </th>
                                                                                                                                                      <th>
                                        		<?php echo __('Pte'); ?>
                                      </th>
                                                                                                                                                      <th>
                                        		<?php echo __('Active'); ?>
                                      </th>
                                                                                                                                                                                                                                                                      </tr>
                                  </thead>
                                  <tfoot>
                                    <tr>
                                      <th class="actions"><?php echo __('Actions'); ?></th>
                                                                                                                                                                                                                                                                          <th>
                                        		<?php echo __('Staff No'); ?>
                                      </th>
                                                                                                                                                      <th>
                                        		<?php echo __('Name'); ?>
                                      </th>
                                                                                                                                                      <th>
                                        		<?php echo __('Parent Code'); ?>
                                      </th>
                                                                                                                                                      <th>
                                        		<?php echo __('Org Code'); ?>
                                      </th>
                                                                                                                                                      <th>
                                        		<?php echo __('Course Id'); ?>
                                      </th>
                                                                                                                                                      <th>
                                        		<?php echo __('Code'); ?>
                                      </th>
                                                                                                                                                      <th>
                                        		<?php echo __('Course Name'); ?>
                                      </th>
                                                                                                                                                      <th>
                                        		<?php echo __('Start Date'); ?>
                                      </th>
                                                                                                                                                      <th>
                                        		<?php echo __('End Date'); ?>
                                      </th>
                                                                                                                                                      <th>
                                        		<?php echo __('Duration'); ?>
                                      </th>
                                                                                                                                                      <th>
                                        		<?php echo __('Remarks'); ?>
                                      </th>
                                                                                                                                                      <th>
                                        		<?php echo __('Status'); ?>
                                      </th>
                                                                                                                                                      <th>
                                        		<?php echo __('Theory'); ?>
                                      </th>
                                                                                                                                                      <th>
                                        		<?php echo __('Practical'); ?>
                                      </th>
                                                                                                                                                      <th>
                                        		<?php echo __('Doc'); ?>
                                      </th>
                                                                                                                                                      <th>
                                        		<?php echo __('Comment'); ?>
                                      </th>
                                                                                                                                                      <th>
                                        		<?php echo __('Pte'); ?>
                                      </th>
                                                                                                                                                      <th>
                                        		<?php echo __('Active'); ?>
                                      </th>
                                                                                                                                                                                                                                                                      </tr>
                                  </tfoot>
                                  
                                  <tbody>
                                  	<?php foreach ($staff['StaffTrainingProfile'] as $staffTrainingProfile): ?>
		<tr>
			<td class="actions">
				<?php echo $this->Html->link('', array('controller' => 'staff_training_profiles', 'action' => 'sneak', $staffTrainingProfile['id']), array('class'=>'btn btn-xs btn-success fa fa-desktop', 'style'=>'color:#000;width:25px; height:25px; padding-top:5px','data-toggle'=>'tooltip', 'data-placement'=>'right', 'title'=>'View Details', 'data-toggle'=>'ajaxModal', 'escape' => false)); ?>
				<?php echo $this->Html->link('', array('controller' => 'staff_training_profiles', 'action' => 'edit', $staffTrainingProfile['id']), array('class'=>'btn btn-xs btn-warning fa fa-pencil', 'style'=>'color:#000;width:25px; height:25px; padding-top:5px','data-toggle'=>'tooltip', 'data-placement'=>'right', 'title'=>'Modify Details', 'data-toggle'=>'ajaxModal', 'escape' => false)); ?>
			</td>
			<td><?php echo $staffTrainingProfile['staff_id']; ?></td>
			<td><?php echo $staffTrainingProfile['staff_no']; ?></td>
			<td><?php echo $staffTrainingProfile['name']; ?></td>
			<td><?php echo $staffTrainingProfile['parent_code']; ?></td>
			<td><?php echo $staffTrainingProfile['org_code']; ?></td>
			<td><?php echo $staffTrainingProfile['course_id']; ?></td>
			<td><?php echo $staffTrainingProfile['code']; ?></td>
			<td><?php echo $staffTrainingProfile['course_name']; ?></td>
			<td><?php echo $staffTrainingProfile['start_date']; ?></td>
			<td><?php echo $staffTrainingProfile['end_date']; ?></td>
			<td><?php echo $staffTrainingProfile['duration']; ?></td>
			<td><?php echo $staffTrainingProfile['remarks']; ?></td>
			<td><?php echo $staffTrainingProfile['status']; ?></td>
			<td><?php echo $staffTrainingProfile['theory']; ?></td>
			<td><?php echo $staffTrainingProfile['practical']; ?></td>
			<td><?php echo $staffTrainingProfile['doc']; ?></td>
			<td><?php echo $staffTrainingProfile['comment']; ?></td>
			<td><?php echo $staffTrainingProfile['pte']; ?></td>
			<td><?php echo $staffTrainingProfile['active']; ?></td>
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
                                  			<?php echo $this->Html->link(' Create', array('controller' => 'staff_training_profiles', 'action' => 'add' ), array('class' => 'btn btn-default bg-success fa fa-plus', 'data-toggle'=>'ajaxModal', 'style'=>'color:#000;', 'escape' => false)); ?>
 
                              </div>
                            </div>
                          </div>
                                                    <div class="tab-pane padder" id="Staffs">
                            <h3><?php echo __('Related Staffs'); ?></h3>
                            

                            <?php if (!empty($staff['ChildStaff'])): ?>
                            <section class="panel panel-default padder">
                              <div class="row wrapper">
                                <div class="col-sm-5 m-b-xs">
                                    			<?php echo $this->Html->link(' Create', array('controller' => 'staffs', 'action' => 'add' ), array('class' => 'btn btn-default bg-success fa fa-plus', 'data-toggle'=>'ajaxModal', 'style'=>'color:#000;', 'escape' => false)); ?>
 
                                </div>
                              </div>
                              <div class="table-responsive">
                                <table class="table table-striped b-t b-light">
                                  <thead>
                                    <tr>
                                      <th class="actions"><?php echo __('Actions'); ?></th>
                                                                                                                                                                                              <th>
                                        		<?php echo __('Organization Id'); ?>
                                      </th>
                                                                                                                                                      <th>
                                        		<?php echo __('Parent Id'); ?>
                                      </th>
                                                                                                                                                      <th>
                                        		<?php echo __('User Id'); ?>
                                      </th>
                                                                                                                                                      <th>
                                        		<?php echo __('Staff No'); ?>
                                      </th>
                                                                                                                                                      <th>
                                        		<?php echo __('Position Id'); ?>
                                      </th>
                                                                                                                                                      <th>
                                        		<?php echo __('Name'); ?>
                                      </th>
                                                                                                                                                      <th>
                                        		<?php echo __('Parent Code'); ?>
                                      </th>
                                                                                                                                                      <th>
                                        		<?php echo __('Org Code'); ?>
                                      </th>
                                                                                                                                                      <th>
                                        		<?php echo __('NRIC'); ?>
                                      </th>
                                                                                                                                                      <th>
                                        		<?php echo __('Details'); ?>
                                      </th>
                                                                                                                                                      <th>
                                        		<?php echo __('IsTrainer'); ?>
                                      </th>
                                                                                                                                                      <th>
                                        		<?php echo __('Active'); ?>
                                      </th>
                                                                                                                                                      <th>
                                        		<?php echo __('Lft'); ?>
                                      </th>
                                                                                                                                                      <th>
                                        		<?php echo __('Rght'); ?>
                                      </th>
                                                                                                                                                                                                                                                                      </tr>
                                  </thead>
                                  <tfoot>
                                    <tr>
                                      <th class="actions"><?php echo __('Actions'); ?></th>
                                                                                                                                                                                              <th>
                                        		<?php echo __('Organization Id'); ?>
                                      </th>
                                                                                                                                                      <th>
                                        		<?php echo __('Parent Id'); ?>
                                      </th>
                                                                                                                                                      <th>
                                        		<?php echo __('User Id'); ?>
                                      </th>
                                                                                                                                                      <th>
                                        		<?php echo __('Staff No'); ?>
                                      </th>
                                                                                                                                                      <th>
                                        		<?php echo __('Position Id'); ?>
                                      </th>
                                                                                                                                                      <th>
                                        		<?php echo __('Name'); ?>
                                      </th>
                                                                                                                                                      <th>
                                        		<?php echo __('Parent Code'); ?>
                                      </th>
                                                                                                                                                      <th>
                                        		<?php echo __('Org Code'); ?>
                                      </th>
                                                                                                                                                      <th>
                                        		<?php echo __('NRIC'); ?>
                                      </th>
                                                                                                                                                      <th>
                                        		<?php echo __('Details'); ?>
                                      </th>
                                                                                                                                                      <th>
                                        		<?php echo __('IsTrainer'); ?>
                                      </th>
                                                                                                                                                      <th>
                                        		<?php echo __('Active'); ?>
                                      </th>
                                                                                                                                                      <th>
                                        		<?php echo __('Lft'); ?>
                                      </th>
                                                                                                                                                      <th>
                                        		<?php echo __('Rght'); ?>
                                      </th>
                                                                                                                                                                                                                                                                      </tr>
                                  </tfoot>
                                  
                                  <tbody>
                                  	<?php foreach ($staff['ChildStaff'] as $childStaff): ?>
		<tr>
			<td class="actions">
				<?php echo $this->Html->link('', array('controller' => 'staffs', 'action' => 'sneak', $childStaff['id']), array('class'=>'btn btn-xs btn-success fa fa-desktop', 'style'=>'color:#000;width:25px; height:25px; padding-top:5px','data-toggle'=>'tooltip', 'data-placement'=>'right', 'title'=>'View Details', 'data-toggle'=>'ajaxModal', 'escape' => false)); ?>
				<?php echo $this->Html->link('', array('controller' => 'staffs', 'action' => 'edit', $childStaff['id']), array('class'=>'btn btn-xs btn-warning fa fa-pencil', 'style'=>'color:#000;width:25px; height:25px; padding-top:5px','data-toggle'=>'tooltip', 'data-placement'=>'right', 'title'=>'Modify Details', 'data-toggle'=>'ajaxModal', 'escape' => false)); ?>
			</td>
			<td><?php echo $childStaff['organization_id']; ?></td>
			<td><?php echo $childStaff['parent_id']; ?></td>
			<td><?php echo $childStaff['user_id']; ?></td>
			<td><?php echo $childStaff['staff_no']; ?></td>
			<td><?php echo $childStaff['position_id']; ?></td>
			<td><?php echo $childStaff['name']; ?></td>
			<td><?php echo $childStaff['parent_code']; ?></td>
			<td><?php echo $childStaff['org_code']; ?></td>
			<td><?php echo $childStaff['NRIC']; ?></td>
			<td><?php echo $childStaff['details']; ?></td>
			<td><?php echo $childStaff['isTrainer']; ?></td>
			<td><?php echo $childStaff['active']; ?></td>
			<td><?php echo $childStaff['lft']; ?></td>
			<td><?php echo $childStaff['rght']; ?></td>
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
                                  			<?php echo $this->Html->link(' Create', array('controller' => 'staffs', 'action' => 'add' ), array('class' => 'btn btn-default bg-success fa fa-plus', 'data-toggle'=>'ajaxModal', 'style'=>'color:#000;', 'escape' => false)); ?>
 
                              </div>
                            </div>
                          </div>
                                                    <div class="tab-pane padder" id="TrainerMigrates">
                            <h3><?php echo __('Related Trainer Migrates'); ?></h3>
                            

                            <?php if (!empty($staff['TrainerMigrate'])): ?>
                            <section class="panel panel-default padder">
                              <div class="row wrapper">
                                <div class="col-sm-5 m-b-xs">
                                    			<?php echo $this->Html->link(' Create', array('controller' => 'trainer_migrates', 'action' => 'add' ), array('class' => 'btn btn-default bg-success fa fa-plus', 'data-toggle'=>'ajaxModal', 'style'=>'color:#000;', 'escape' => false)); ?>
 
                                </div>
                              </div>
                              <div class="table-responsive">
                                <table class="table table-striped b-t b-light">
                                  <thead>
                                    <tr>
                                      <th class="actions"><?php echo __('Actions'); ?></th>
                                                                                                                                                                                                                                                                          <th>
                                        		<?php echo __('Staff No'); ?>
                                      </th>
                                                                                                                                                      <th>
                                        		<?php echo __('Name'); ?>
                                      </th>
                                                                                                                                                      <th>
                                        		<?php echo __('Course Id'); ?>
                                      </th>
                                                                                                                                                      <th>
                                        		<?php echo __('Code'); ?>
                                      </th>
                                                                                                                                                      <th>
                                        		<?php echo __('Course Name'); ?>
                                      </th>
                                                                                                              </tr>
                                  </thead>
                                  <tfoot>
                                    <tr>
                                      <th class="actions"><?php echo __('Actions'); ?></th>
                                                                                                                                                                                                                                                                          <th>
                                        		<?php echo __('Staff No'); ?>
                                      </th>
                                                                                                                                                      <th>
                                        		<?php echo __('Name'); ?>
                                      </th>
                                                                                                                                                      <th>
                                        		<?php echo __('Course Id'); ?>
                                      </th>
                                                                                                                                                      <th>
                                        		<?php echo __('Code'); ?>
                                      </th>
                                                                                                                                                      <th>
                                        		<?php echo __('Course Name'); ?>
                                      </th>
                                                                                                              </tr>
                                  </tfoot>
                                  
                                  <tbody>
                                  	<?php foreach ($staff['TrainerMigrate'] as $trainerMigrate): ?>
		<tr>
			<td class="actions">
				<?php echo $this->Html->link('', array('controller' => 'trainer_migrates', 'action' => 'sneak', $trainerMigrate['id']), array('class'=>'btn btn-xs btn-success fa fa-desktop', 'style'=>'color:#000;width:25px; height:25px; padding-top:5px','data-toggle'=>'tooltip', 'data-placement'=>'right', 'title'=>'View Details', 'data-toggle'=>'ajaxModal', 'escape' => false)); ?>
				<?php echo $this->Html->link('', array('controller' => 'trainer_migrates', 'action' => 'edit', $trainerMigrate['id']), array('class'=>'btn btn-xs btn-warning fa fa-pencil', 'style'=>'color:#000;width:25px; height:25px; padding-top:5px','data-toggle'=>'tooltip', 'data-placement'=>'right', 'title'=>'Modify Details', 'data-toggle'=>'ajaxModal', 'escape' => false)); ?>
			</td>
			<td><?php echo $trainerMigrate['staff_id']; ?></td>
			<td><?php echo $trainerMigrate['staff_no']; ?></td>
			<td><?php echo $trainerMigrate['name']; ?></td>
			<td><?php echo $trainerMigrate['course_id']; ?></td>
			<td><?php echo $trainerMigrate['code']; ?></td>
			<td><?php echo $trainerMigrate['course_name']; ?></td>
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
                                  			<?php echo $this->Html->link(' Create', array('controller' => 'trainer_migrates', 'action' => 'add' ), array('class' => 'btn btn-default bg-success fa fa-plus', 'data-toggle'=>'ajaxModal', 'style'=>'color:#000;', 'escape' => false)); ?>
 
                              </div>
                            </div>
                          </div>
                                                    <div class="tab-pane padder" id="Trainers">
                            <h3><?php echo __('Related Trainers'); ?></h3>
                            

                            <?php if (!empty($staff['Trainer'])): ?>
                            <section class="panel panel-default padder">
                              <div class="row wrapper">
                                <div class="col-sm-5 m-b-xs">
                                    			<?php echo $this->Html->link(' Create', array('controller' => 'trainers', 'action' => 'add' ), array('class' => 'btn btn-default bg-success fa fa-plus', 'data-toggle'=>'ajaxModal', 'style'=>'color:#000;', 'escape' => false)); ?>
 
                                </div>
                              </div>
                              <div class="table-responsive">
                                <table class="table table-striped b-t b-light">
                                  <thead>
                                    <tr>
                                      <th class="actions"><?php echo __('Actions'); ?></th>
                                                                                                                                                                                                                                                                          <th>
                                        		<?php echo __('Course Id'); ?>
                                      </th>
                                                                                                                                                      <th>
                                        		<?php echo __('Active'); ?>
                                      </th>
                                                                                                                                                                                                                                                                      </tr>
                                  </thead>
                                  <tfoot>
                                    <tr>
                                      <th class="actions"><?php echo __('Actions'); ?></th>
                                                                                                                                                                                                                                                                          <th>
                                        		<?php echo __('Course Id'); ?>
                                      </th>
                                                                                                                                                      <th>
                                        		<?php echo __('Active'); ?>
                                      </th>
                                                                                                                                                                                                                                                                      </tr>
                                  </tfoot>
                                  
                                  <tbody>
                                  	<?php foreach ($staff['Trainer'] as $trainer): ?>
		<tr>
			<td class="actions">
				<?php echo $this->Html->link('', array('controller' => 'trainers', 'action' => 'sneak', $trainer['id']), array('class'=>'btn btn-xs btn-success fa fa-desktop', 'style'=>'color:#000;width:25px; height:25px; padding-top:5px','data-toggle'=>'tooltip', 'data-placement'=>'right', 'title'=>'View Details', 'data-toggle'=>'ajaxModal', 'escape' => false)); ?>
				<?php echo $this->Html->link('', array('controller' => 'trainers', 'action' => 'edit', $trainer['id']), array('class'=>'btn btn-xs btn-warning fa fa-pencil', 'style'=>'color:#000;width:25px; height:25px; padding-top:5px','data-toggle'=>'tooltip', 'data-placement'=>'right', 'title'=>'Modify Details', 'data-toggle'=>'ajaxModal', 'escape' => false)); ?>
			</td>
			<td><?php echo $trainer['staff_id']; ?></td>
			<td><?php echo $trainer['course_id']; ?></td>
			<td><?php echo $trainer['active']; ?></td>
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
                                  			<?php echo $this->Html->link(' Create', array('controller' => 'trainers', 'action' => 'add' ), array('class' => 'btn btn-default bg-success fa fa-plus', 'data-toggle'=>'ajaxModal', 'style'=>'color:#000;', 'escape' => false)); ?>
 
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

