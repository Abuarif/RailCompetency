          <ul class="breadcrumb no-border no-radius b-b b-light pull-in">
            <li><a href="<?php echo $this->webroot; ?>"<i class="fa fa-home"></i> Home</a></li>
            <li class="active"><a href="#" onClick="location.reload();"><?php echo __('Course'); ?>'s Details</a></li>
          </ul>
          <div class="m-b-md">
            <h3 class="m-b-none"><?php echo __('Course'); ?>'s Details</h3>
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
			<?php echo h($course['Course']['id']); ?>
			&nbsp;
		</p>
		<small class="text-uc text-xs text-muted"><?php echo __('Training Provider'); ?></small>
		<p>
			<?php echo $this->Html->link($course['TrainingProvider']['name'], array('controller' => 'training_providers', 'action' => 'view', $course['TrainingProvider']['id'])); ?>
			&nbsp;
		</p>
		<small class="text-uc text-xs text-muted"><?php echo __('Module'); ?></small>
		<p>
			<?php echo $this->Html->link($course['Module']['name'], array('controller' => 'modules', 'action' => 'view', $course['Module']['id'])); ?>
			&nbsp;
		</p>
		<small class="text-uc text-xs text-muted"><?php echo __('Service'); ?></small>
		<p>
			<?php echo $this->Html->link($course['Service']['name'], array('controller' => 'services', 'action' => 'view', $course['Service']['id'])); ?>
			&nbsp;
		</p>
		<small class="text-uc text-xs text-muted"><?php echo __('Code'); ?></small>
		<p>
			<?php echo h($course['Course']['code']); ?>
			&nbsp;
		</p>
		<small class="text-uc text-xs text-muted"><?php echo __('Name'); ?></small>
		<p>
			<?php echo h($course['Course']['name']); ?>
			&nbsp;
		</p>
		<small class="text-uc text-xs text-muted"><?php echo __('Files'); ?></small>
		<p>
			<?php echo h($course['Course']['files']); ?>
			&nbsp;
		</p>
		<small class="text-uc text-xs text-muted"><?php echo __('Details'); ?></small>
		<p>
			<?php echo h($course['Course']['details']); ?>
			&nbsp;
		</p>
		<small class="text-uc text-xs text-muted"><?php echo __('Duration'); ?></small>
		<p>
			<?php echo h($course['Course']['duration']); ?>
			&nbsp;
		</p>
		<small class="text-uc text-xs text-muted"><?php echo __('IsRefresher'); ?></small>
		<p>
			<?php echo h($course['Course']['isRefresher']); ?>
			&nbsp;
		</p>
		<small class="text-uc text-xs text-muted"><?php echo __('CycleTime'); ?></small>
		<p>
			<?php echo h($course['Course']['cycleTime']); ?>
			&nbsp;
		</p>
		<small class="text-uc text-xs text-muted"><?php echo __('Active'); ?></small>
		<p>
			<?php echo h($course['Course']['active']); ?>
			&nbsp;
		</p>
                        </section>
                        <section class="panel panel-info portlet-item">
                          <header class="panel-heading">
                            Quick links
                          </header>
                          <div class="list-group bg-white">
                           <?php echo $this->Html->link(__('Edit Course'), array('action' => 'edit', $course['Course']['id']), array('class'=>'list-group-item', 'data-toggle'=>'ajaxModal')); ?> <?php echo $this->Form->postLink(__('Delete Course'), array('action' => 'delete', $course['Course']['id']), array('class'=>'list-group-item'), __('Are you sure you want to delete # %s?', $course['Course']['id'])); ?>  <?php echo $this->Html->link(__('List Courses'), array('action' => 'index'), array('class'=>'list-group-item')); ?> <?php echo $this->Html->link(__('New Course'), array('action' => 'add'), array('class'=>'list-group-item', 'data-toggle'=>'ajaxModal', 'escape' => false)); ?>                              </div>
                        </section>
                        <section class="panel panel-info portlet-item">
                          <header class="panel-heading">
                            Associated links
                          </header>
                          <div class="list-group bg-white">
                          <?php echo $this->Html->link(__('List Training Providers'), array('controller' => 'training_providers', 'action' => 'index'), array('class' => 'list-group-item')); ?> &nbsp;&nbsp; <?php echo $this->Html->link(__('New Training Provider'), array('controller' => 'training_providers', 'action' => 'add'), array('class' => 'list-group-item')); ?> &nbsp;&nbsp; <?php echo $this->Html->link(__('List Modules'), array('controller' => 'modules', 'action' => 'index'), array('class' => 'list-group-item')); ?> &nbsp;&nbsp; <?php echo $this->Html->link(__('New Module'), array('controller' => 'modules', 'action' => 'add'), array('class' => 'list-group-item')); ?> &nbsp;&nbsp; <?php echo $this->Html->link(__('List Services'), array('controller' => 'services', 'action' => 'index'), array('class' => 'list-group-item')); ?> &nbsp;&nbsp; <?php echo $this->Html->link(__('New Service'), array('controller' => 'services', 'action' => 'add'), array('class' => 'list-group-item')); ?> &nbsp;&nbsp; <?php echo $this->Html->link(__('List Course Materials'), array('controller' => 'course_materials', 'action' => 'index'), array('class' => 'list-group-item')); ?> &nbsp;&nbsp; <?php echo $this->Html->link(__('New Course Material'), array('controller' => 'course_materials', 'action' => 'add'), array('class' => 'list-group-item')); ?> &nbsp;&nbsp; <?php echo $this->Html->link(__('List Course Requisites'), array('controller' => 'course_requisites', 'action' => 'index'), array('class' => 'list-group-item')); ?> &nbsp;&nbsp; <?php echo $this->Html->link(__('New Course Requisite'), array('controller' => 'course_requisites', 'action' => 'add'), array('class' => 'list-group-item')); ?> &nbsp;&nbsp; <?php echo $this->Html->link(__('List Evaluations'), array('controller' => 'evaluations', 'action' => 'index'), array('class' => 'list-group-item')); ?> &nbsp;&nbsp; <?php echo $this->Html->link(__('New Evaluation'), array('controller' => 'evaluations', 'action' => 'add'), array('class' => 'list-group-item')); ?> &nbsp;&nbsp; <?php echo $this->Html->link(__('List Event Trainers'), array('controller' => 'event_trainers', 'action' => 'index'), array('class' => 'list-group-item')); ?> &nbsp;&nbsp; <?php echo $this->Html->link(__('New Event Trainer'), array('controller' => 'event_trainers', 'action' => 'add'), array('class' => 'list-group-item')); ?> &nbsp;&nbsp; <?php echo $this->Html->link(__('List Events'), array('controller' => 'events', 'action' => 'index'), array('class' => 'list-group-item')); ?> &nbsp;&nbsp; <?php echo $this->Html->link(__('New Event'), array('controller' => 'events', 'action' => 'add'), array('class' => 'list-group-item')); ?> &nbsp;&nbsp; <?php echo $this->Html->link(__('List Staff Training Profiles'), array('controller' => 'staff_training_profiles', 'action' => 'index'), array('class' => 'list-group-item')); ?> &nbsp;&nbsp; <?php echo $this->Html->link(__('New Staff Training Profile'), array('controller' => 'staff_training_profiles', 'action' => 'add'), array('class' => 'list-group-item')); ?> &nbsp;&nbsp; <?php echo $this->Html->link(__('List Trainer Migrates'), array('controller' => 'trainer_migrates', 'action' => 'index'), array('class' => 'list-group-item')); ?> &nbsp;&nbsp; <?php echo $this->Html->link(__('New Trainer Migrate'), array('controller' => 'trainer_migrates', 'action' => 'add'), array('class' => 'list-group-item')); ?> &nbsp;&nbsp; <?php echo $this->Html->link(__('List Trainers'), array('controller' => 'trainers', 'action' => 'index'), array('class' => 'list-group-item')); ?> &nbsp;&nbsp; <?php echo $this->Html->link(__('New Trainer'), array('controller' => 'trainers', 'action' => 'add'), array('class' => 'list-group-item')); ?> &nbsp;&nbsp;                           </div>
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
                                                      <li><a href="#CourseMaterials" data-toggle="tab">Course Materials</a></li>
                                                      <li><a href="#CourseRequisites" data-toggle="tab">Course Requisites</a></li>
                                                      <li><a href="#Evaluations" data-toggle="tab">Evaluations</a></li>
                                                      <li><a href="#EventTrainers" data-toggle="tab">Event Trainers</a></li>
                                                      <li><a href="#Events" data-toggle="tab">Events</a></li>
                                                      <li><a href="#StaffTrainingProfiles" data-toggle="tab">Staff Training Profiles</a></li>
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
                                                  <div class="tab-pane padder" id="CourseMaterials">
                            <h3><?php echo __('Related Course Materials'); ?></h3>
                            

                            <?php if (!empty($course['CourseMaterial'])): ?>
                            <section class="panel panel-default padder">
                              <div class="row wrapper">
                                <div class="col-sm-5 m-b-xs">
                                    			<?php echo $this->Html->link(' Create', array('controller' => 'course_materials', 'action' => 'add' ), array('class' => 'btn btn-default bg-success fa fa-plus', 'data-toggle'=>'ajaxModal', 'style'=>'color:#000;', 'escape' => false)); ?>
 
                                </div>
                              </div>
                              <div class="table-responsive">
                                <table class="table table-striped b-t b-light">
                                  <thead>
                                    <tr>
                                      <th class="actions"><?php echo __('Actions'); ?></th>
                                                                                                                                                                                              <th>
                                        		<?php echo __('User Id'); ?>
                                      </th>
                                                                                                                                                      <th>
                                        		<?php echo __('Course Id'); ?>
                                      </th>
                                                                                                                                                      <th>
                                        		<?php echo __('Course Material Type Id'); ?>
                                      </th>
                                                                                                                                                      <th>
                                        		<?php echo __('Course Material Permission Id'); ?>
                                      </th>
                                                                                                                                                      <th>
                                        		<?php echo __('Name'); ?>
                                      </th>
                                                                                                                                                      <th>
                                        		<?php echo __('Description'); ?>
                                      </th>
                                                                                                                                                      <th>
                                        		<?php echo __('Files'); ?>
                                      </th>
                                                                                                                                                      <th>
                                        		<?php echo __('Active'); ?>
                                      </th>
                                                                                                                                                                                                                                                                      </tr>
                                  </thead>
                                  <tfoot>
                                    <tr>
                                      <th class="actions"><?php echo __('Actions'); ?></th>
                                                                                                                                                                                              
                                        		<th><?php echo __('User Id'); ?></th>
                                      
                                                                                                                                                      
                                        		<th><?php echo __('Course Id'); ?></th>
                                      
                                                                                                                                                      
                                        		<th><?php echo __('Course Material Type Id'); ?></th>
                                      
                                                                                                                                                      
                                        		<th><?php echo __('Course Material Permission Id'); ?></th>
                                      
                                                                                                                                                      
                                        		<th><?php echo __('Name'); ?></th>
                                      
                                                                                                                                                      
                                        		<th><?php echo __('Description'); ?></th>
                                      
                                                                                                                                                      
                                        		<th><?php echo __('Files'); ?></th>
                                      
                                                                                                                                                      
                                        		<th><?php echo __('Active'); ?></th>
                                      
                                                                                                                                                                                                                                                                      </tr>
                                  </tfoot>
                                  
                                  <tbody>
                                  	<?php foreach ($course['CourseMaterial'] as $courseMaterial): ?>
		<tr>
			<td class="actions">
				<?php echo $this->Html->link('', array('controller' => 'course_materials', 'action' => 'sneak', $courseMaterial['id']), array('class'=>'btn btn-xs btn-success fa fa-desktop', 'style'=>'color:#000;width:25px; height:25px; padding-top:5px','data-toggle'=>'tooltip', 'data-placement'=>'right', 'title'=>'View Details', 'data-toggle'=>'ajaxModal', 'escape' => false)); ?>
				<?php echo $this->Html->link('', array('controller' => 'course_materials', 'action' => 'edit', $courseMaterial['id']), array('class'=>'btn btn-xs btn-warning fa fa-pencil', 'style'=>'color:#000;width:25px; height:25px; padding-top:5px','data-toggle'=>'tooltip', 'data-placement'=>'right', 'title'=>'Modify Details', 'data-toggle'=>'ajaxModal', 'escape' => false)); ?>
			</td>
			<td><?php echo $courseMaterial['user_id']; ?></td>
			<td><?php echo $courseMaterial['course_id']; ?></td>
			<td><?php echo $courseMaterial['course_material_type_id']; ?></td>
			<td><?php echo $courseMaterial['course_material_permission_id']; ?></td>
			<td><?php echo $courseMaterial['name']; ?></td>
			<td><?php echo $courseMaterial['description']; ?></td>
			<td><?php echo $courseMaterial['files']; ?></td>
			<td><?php echo $courseMaterial['active']; ?></td>
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
                                  			<?php echo $this->Html->link(' Create', array('controller' => 'course_materials', 'action' => 'add' ), array('class' => 'btn btn-default bg-success fa fa-plus', 'data-toggle'=>'ajaxModal', 'style'=>'color:#000;', 'escape' => false)); ?>
 
                              </div>
                            </div>
                          </div>
                                                    <div class="tab-pane padder" id="CourseRequisites">
                            <h3><?php echo __('Related Course Requisites'); ?></h3>
                            

                            <?php if (!empty($course['CourseRequisite'])): ?>
                            <section class="panel panel-default padder">
                              <div class="row wrapper">
                                <div class="col-sm-5 m-b-xs">
                                    			<?php echo $this->Html->link(' Create', array('controller' => 'course_requisites', 'action' => 'add' ), array('class' => 'btn btn-default bg-success fa fa-plus', 'data-toggle'=>'ajaxModal', 'style'=>'color:#000;', 'escape' => false)); ?>
 
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
                                        		<?php echo __('Prerequisite Id'); ?>
                                      </th>
                                                                                                                                                      <th>
                                        		<?php echo __('Active'); ?>
                                      </th>
                                                                                                                                                                                                                                                                      </tr>
                                  </thead>
                                  <tfoot>
                                    <tr>
                                      <th class="actions"><?php echo __('Actions'); ?></th>
                                                                                                                                                                                              
                                        		<th><?php echo __('Course Id'); ?></th>
                                      
                                                                                                                                                      
                                        		<th><?php echo __('Prerequisite Id'); ?></th>
                                      
                                                                                                                                                      
                                        		<th><?php echo __('Active'); ?></th>
                                      
                                                                                                                                                                                                                                                                      </tr>
                                  </tfoot>
                                  
                                  <tbody>
                                  	<?php foreach ($course['CourseRequisite'] as $courseRequisite): ?>
		<tr>
			<td class="actions">
				<?php echo $this->Html->link('', array('controller' => 'course_requisites', 'action' => 'sneak', $courseRequisite['id']), array('class'=>'btn btn-xs btn-success fa fa-desktop', 'style'=>'color:#000;width:25px; height:25px; padding-top:5px','data-toggle'=>'tooltip', 'data-placement'=>'right', 'title'=>'View Details', 'data-toggle'=>'ajaxModal', 'escape' => false)); ?>
				<?php echo $this->Html->link('', array('controller' => 'course_requisites', 'action' => 'edit', $courseRequisite['id']), array('class'=>'btn btn-xs btn-warning fa fa-pencil', 'style'=>'color:#000;width:25px; height:25px; padding-top:5px','data-toggle'=>'tooltip', 'data-placement'=>'right', 'title'=>'Modify Details', 'data-toggle'=>'ajaxModal', 'escape' => false)); ?>
			</td>
			<td><?php echo $courseRequisite['course_id']; ?></td>
			<td><?php echo $courseRequisite['prerequisite_id']; ?></td>
			<td><?php echo $courseRequisite['active']; ?></td>
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
                                  			<?php echo $this->Html->link(' Create', array('controller' => 'course_requisites', 'action' => 'add' ), array('class' => 'btn btn-default bg-success fa fa-plus', 'data-toggle'=>'ajaxModal', 'style'=>'color:#000;', 'escape' => false)); ?>
 
                              </div>
                            </div>
                          </div>
                                                    <div class="tab-pane padder" id="Evaluations">
                            <h3><?php echo __('Related Evaluations'); ?></h3>
                            

                            <?php if (!empty($course['Evaluation'])): ?>
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
                                                                                                                                                                                              
                                        		<th><?php echo __('Evaluation Type Id'); ?></th>
                                      
                                                                                                                                                      
                                        		<th><?php echo __('Staff Id'); ?></th>
                                      
                                                                                                                                                      
                                        		<th><?php echo __('Course Id'); ?></th>
                                      
                                                                                                                                                      
                                        		<th><?php echo __('Event Id'); ?></th>
                                      
                                                                                                                                                      
                                        		<th><?php echo __('Total Score'); ?></th>
                                      
                                                                                                                                                      
                                        		<th><?php echo __('Grade Id'); ?></th>
                                      
                                                                                                                                                      
                                        		<th><?php echo __('Notes'); ?></th>
                                      
                                                                                                                                                      
                                        		<th><?php echo __('Evaluated By'); ?></th>
                                      
                                                                                                                                                                                                                                  
                                        		<th><?php echo __('Updated'); ?></th>
                                      
                                                                                                              </tr>
                                  </tfoot>
                                  
                                  <tbody>
                                  	<?php foreach ($course['Evaluation'] as $evaluation): ?>
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
                                                    <div class="tab-pane padder" id="EventTrainers">
                            <h3><?php echo __('Related Event Trainers'); ?></h3>
                            

                            <?php if (!empty($course['EventTrainer'])): ?>
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
                                                                                                                                                                                              
                                        		<th><?php echo __('Event Id'); ?></th>
                                      
                                                                                                                                                      
                                        		<th><?php echo __('Course Id'); ?></th>
                                      
                                                                                                                                                      
                                        		<th><?php echo __('Staff Id'); ?></th>
                                      
                                                                                                                                                      
                                        		<th><?php echo __('Active'); ?></th>
                                      
                                                                                                                                                                                                                                                                      </tr>
                                  </tfoot>
                                  
                                  <tbody>
                                  	<?php foreach ($course['EventTrainer'] as $eventTrainer): ?>
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
                                                    <div class="tab-pane padder" id="Events">
                            <h3><?php echo __('Related Events'); ?></h3>
                            

                            <?php if (!empty($course['Event'])): ?>
                            <section class="panel panel-default padder">
                              <div class="row wrapper">
                                <div class="col-sm-5 m-b-xs">
                                    			<?php echo $this->Html->link(' Create', array('controller' => 'events', 'action' => 'add' ), array('class' => 'btn btn-default bg-success fa fa-plus', 'data-toggle'=>'ajaxModal', 'style'=>'color:#000;', 'escape' => false)); ?>
 
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
                                        		<?php echo __('Event Type Id'); ?>
                                      </th>
                                                                                                                                                      <th>
                                        		<?php echo __('Pax'); ?>
                                      </th>
                                                                                                                                                      <th>
                                        		<?php echo __('Details'); ?>
                                      </th>
                                                                                                                                                      <th>
                                        		<?php echo __('Start Date'); ?>
                                      </th>
                                                                                                                                                      <th>
                                        		<?php echo __('End Date'); ?>
                                      </th>
                                                                                                                                                      <th>
                                        		<?php echo __('Last Enrollment'); ?>
                                      </th>
                                                                                                                                                      <th>
                                        		<?php echo __('All Day'); ?>
                                      </th>
                                                                                                                                                      <th>
                                        		<?php echo __('Status'); ?>
                                      </th>
                                                                                                                                                      <th>
                                        		<?php echo __('Active'); ?>
                                      </th>
                                                                                                                                                                                                                                                                      </tr>
                                  </thead>
                                  <tfoot>
                                    <tr>
                                      <th class="actions"><?php echo __('Actions'); ?></th>
                                                                                                                                                                                              
                                        		<th><?php echo __('Course Id'); ?></th>
                                      
                                                                                                                                                      
                                        		<th><?php echo __('Event Type Id'); ?></th>
                                      
                                                                                                                                                      
                                        		<th><?php echo __('Pax'); ?></th>
                                      
                                                                                                                                                      
                                        		<th><?php echo __('Details'); ?></th>
                                      
                                                                                                                                                      
                                        		<th><?php echo __('Start Date'); ?></th>
                                      
                                                                                                                                                      
                                        		<th><?php echo __('End Date'); ?></th>
                                      
                                                                                                                                                      
                                        		<th><?php echo __('Last Enrollment'); ?></th>
                                      
                                                                                                                                                      
                                        		<th><?php echo __('All Day'); ?></th>
                                      
                                                                                                                                                      
                                        		<th><?php echo __('Status'); ?></th>
                                      
                                                                                                                                                      
                                        		<th><?php echo __('Active'); ?></th>
                                      
                                                                                                                                                                                                                                                                      </tr>
                                  </tfoot>
                                  
                                  <tbody>
                                  	<?php foreach ($course['Event'] as $event): ?>
		<tr>
			<td class="actions">
				<?php echo $this->Html->link('', array('controller' => 'events', 'action' => 'sneak', $event['id']), array('class'=>'btn btn-xs btn-success fa fa-desktop', 'style'=>'color:#000;width:25px; height:25px; padding-top:5px','data-toggle'=>'tooltip', 'data-placement'=>'right', 'title'=>'View Details', 'data-toggle'=>'ajaxModal', 'escape' => false)); ?>
				<?php echo $this->Html->link('', array('controller' => 'events', 'action' => 'edit', $event['id']), array('class'=>'btn btn-xs btn-warning fa fa-pencil', 'style'=>'color:#000;width:25px; height:25px; padding-top:5px','data-toggle'=>'tooltip', 'data-placement'=>'right', 'title'=>'Modify Details', 'data-toggle'=>'ajaxModal', 'escape' => false)); ?>
			</td>
			<td><?php echo $event['course_id']; ?></td>
			<td><?php echo $event['event_type_id']; ?></td>
			<td><?php echo $event['pax']; ?></td>
			<td><?php echo $event['details']; ?></td>
			<td><?php echo $event['start_date']; ?></td>
			<td><?php echo $event['end_date']; ?></td>
			<td><?php echo $event['last_enrollment']; ?></td>
			<td><?php echo $event['all_day']; ?></td>
			<td><?php echo $event['status']; ?></td>
			<td><?php echo $event['active']; ?></td>
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
                                  			<?php echo $this->Html->link(' Create', array('controller' => 'events', 'action' => 'add' ), array('class' => 'btn btn-default bg-success fa fa-plus', 'data-toggle'=>'ajaxModal', 'style'=>'color:#000;', 'escape' => false)); ?>
 
                              </div>
                            </div>
                          </div>
                                                    <div class="tab-pane padder" id="StaffTrainingProfiles">
                            <h3><?php echo __('Related Staff Training Profiles'); ?></h3>
                            

                            <?php if (!empty($course['StaffTrainingProfile'])): ?>
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
                                                                                                                                                                                              
                                        		<th><?php echo __('Staff Id'); ?></th>
                                      
                                                                                                                                                      
                                        		<th><?php echo __('Staff No'); ?></th>
                                      
                                                                                                                                                      
                                        		<th><?php echo __('Name'); ?></th>
                                      
                                                                                                                                                      
                                        		<th><?php echo __('Parent Code'); ?></th>
                                      
                                                                                                                                                      
                                        		<th><?php echo __('Org Code'); ?></th>
                                      
                                                                                                                                                      
                                        		<th><?php echo __('Course Id'); ?></th>
                                      
                                                                                                                                                      
                                        		<th><?php echo __('Code'); ?></th>
                                      
                                                                                                                                                      
                                        		<th><?php echo __('Course Name'); ?></th>
                                      
                                                                                                                                                      
                                        		<th><?php echo __('Start Date'); ?></th>
                                      
                                                                                                                                                      
                                        		<th><?php echo __('End Date'); ?></th>
                                      
                                                                                                                                                      
                                        		<th><?php echo __('Duration'); ?></th>
                                      
                                                                                                                                                      
                                        		<th><?php echo __('Remarks'); ?></th>
                                      
                                                                                                                                                      
                                        		<th><?php echo __('Status'); ?></th>
                                      
                                                                                                                                                      
                                        		<th><?php echo __('Theory'); ?></th>
                                      
                                                                                                                                                      
                                        		<th><?php echo __('Practical'); ?></th>
                                      
                                                                                                                                                      
                                        		<th><?php echo __('Doc'); ?></th>
                                      
                                                                                                                                                      
                                        		<th><?php echo __('Comment'); ?></th>
                                      
                                                                                                                                                      
                                        		<th><?php echo __('Pte'); ?></th>
                                      
                                                                                                                                                      
                                        		<th><?php echo __('Active'); ?></th>
                                      
                                                                                                                                                                                                                                                                      </tr>
                                  </tfoot>
                                  
                                  <tbody>
                                  	<?php foreach ($course['StaffTrainingProfile'] as $staffTrainingProfile): ?>
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
                                                    <div class="tab-pane padder" id="TrainerMigrates">
                            <h3><?php echo __('Related Trainer Migrates'); ?></h3>
                            

                            <?php if (!empty($course['TrainerMigrate'])): ?>
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
                                                                                                                                                                                              
                                        		<th><?php echo __('Staff Id'); ?></th>
                                      
                                                                                                                                                      
                                        		<th><?php echo __('Staff No'); ?></th>
                                      
                                                                                                                                                      
                                        		<th><?php echo __('Name'); ?></th>
                                      
                                                                                                                                                      
                                        		<th><?php echo __('Course Id'); ?></th>
                                      
                                                                                                                                                      
                                        		<th><?php echo __('Code'); ?></th>
                                      
                                                                                                                                                      
                                        		<th><?php echo __('Course Name'); ?></th>
                                      
                                                                                                              </tr>
                                  </tfoot>
                                  
                                  <tbody>
                                  	<?php foreach ($course['TrainerMigrate'] as $trainerMigrate): ?>
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
                            

                            <?php if (!empty($course['Trainer'])): ?>
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
                                        		<?php echo __('Is Preferred'); ?>
                                      </th>
                                                                                                                                                      <th>
                                        		<?php echo __('Active'); ?>
                                      </th>
                                                                                                                                                                                                                                                                      </tr>
                                  </thead>
                                  <tfoot>
                                    <tr>
                                      <th class="actions"><?php echo __('Actions'); ?></th>
                                                                                                                                                                                              
                                        		<th><?php echo __('Staff Id'); ?></th>
                                      
                                                                                                                                                      
                                        		<th><?php echo __('Course Id'); ?></th>
                                      
                                                                                                                                                      
                                        		<th><?php echo __('Is Preferred'); ?></th>
                                      
                                                                                                                                                      
                                        		<th><?php echo __('Active'); ?></th>
                                      
                                                                                                                                                                                                                                                                      </tr>
                                  </tfoot>
                                  
                                  <tbody>
                                  	<?php foreach ($course['Trainer'] as $trainer): ?>
		<tr>
			<td class="actions">
				<?php echo $this->Html->link('', array('controller' => 'trainers', 'action' => 'sneak', $trainer['id']), array('class'=>'btn btn-xs btn-success fa fa-desktop', 'style'=>'color:#000;width:25px; height:25px; padding-top:5px','data-toggle'=>'tooltip', 'data-placement'=>'right', 'title'=>'View Details', 'data-toggle'=>'ajaxModal', 'escape' => false)); ?>
				<?php echo $this->Html->link('', array('controller' => 'trainers', 'action' => 'edit', $trainer['id']), array('class'=>'btn btn-xs btn-warning fa fa-pencil', 'style'=>'color:#000;width:25px; height:25px; padding-top:5px','data-toggle'=>'tooltip', 'data-placement'=>'right', 'title'=>'Modify Details', 'data-toggle'=>'ajaxModal', 'escape' => false)); ?>
			</td>
			<td><?php echo $trainer['staff_id']; ?></td>
			<td><?php echo $trainer['course_id']; ?></td>
			<td><?php echo $trainer['is_preferred']; ?></td>
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

