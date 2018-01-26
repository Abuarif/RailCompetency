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
		<small class="text-uc text-xs text-muted"><?php echo __('Event Type'); ?></small>
		<p>
			<?php echo $this->Html->link($event['EventType']['name'], array('controller' => 'event_types', 'action' => 'view', $event['EventType']['id'])); ?>
			&nbsp;
		</p>
		<small class="text-uc text-xs text-muted"><?php echo __('Pax'); ?></small>
		<p>
			<?php echo h($event['Event']['pax']); ?>
			&nbsp;
		</p>
		<small class="text-uc text-xs text-muted"><?php echo __('Details'); ?></small>
		<p>
			<?php echo h($event['Event']['details']); ?>
			&nbsp;
		</p>
		<small class="text-uc text-xs text-muted"><?php echo __('Start Date'); ?></small>
		<p>
			<?php echo h($event['Event']['start_date']); ?>
			&nbsp;
		</p>
		<small class="text-uc text-xs text-muted"><?php echo __('End Date'); ?></small>
		<p>
			<?php echo h($event['Event']['end_date']); ?>
			&nbsp;
		</p>
		<small class="text-uc text-xs text-muted"><?php echo __('Last Enrollment'); ?></small>
		<p>
			<?php echo h($event['Event']['last_enrollment']); ?>
			&nbsp;
		</p>
		<small class="text-uc text-xs text-muted"><?php echo __('All Day'); ?></small>
		<p>
			<?php echo h($event['Event']['all_day']); ?>
			&nbsp;
		</p>
		<small class="text-uc text-xs text-muted"><?php echo __('Status'); ?></small>
		<p>
			<?php echo h($event['Event']['status']); ?>
			&nbsp;
		</p>
		<small class="text-uc text-xs text-muted"><?php echo __('Active'); ?></small>
		<p>
			<?php echo h($event['Event']['active']); ?>
			&nbsp;
		</p>
                        </section>
                        <section class="panel panel-info portlet-item">
                          <header class="panel-heading">
                            Quick links
                          </header>
                          <div class="list-group bg-white">
                           <?php echo $this->Html->link(__('Edit Event'), array('action' => 'edit', $event['Event']['id']), array('class'=>'list-group-item', 'data-toggle'=>'ajaxModal')); ?> <?php echo $this->Form->postLink(__('Delete Event'), array('action' => 'delete', $event['Event']['id']), array('class'=>'list-group-item'), __('Are you sure you want to delete # %s?', $event['Event']['id'])); ?>  <?php echo $this->Html->link(__('List Events'), array('action' => 'index'), array('class'=>'list-group-item')); ?> <?php echo $this->Html->link(__('New Event'), array('action' => 'add'), array('class'=>'list-group-item', 'data-toggle'=>'ajaxModal', 'escape' => false)); ?>                              </div>
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
                                                  <div class="tab-pane padder" id="Evaluations">
                            <h3><?php echo __('Related Evaluations'); ?></h3>
                            

                            <?php if (!empty($event['Evaluation'])): ?>
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
                                  			<?php echo $this->Html->link(' Create', array('controller' => 'evaluations', 'action' => 'add' ), array('class' => 'btn btn-default bg-success fa fa-plus', 'data-toggle'=>'ajaxModal', 'style'=>'color:#000;', 'escape' => false)); ?>
 
                              </div>
                            </div>
                          </div>
                                                    <div class="tab-pane padder" id="EventAttendances">
                            <h3><?php echo __('Related Event Attendances'); ?></h3>
                            

                            <?php if (!empty($event['EventAttendance'])): ?>
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
                                  	<?php foreach ($event['EventAttendance'] as $eventAttendance): ?>
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
                                                    <div class="tab-pane padder" id="EventMemos">
                            <h3><?php echo __('Related Event Memos'); ?></h3>
                            

                            <?php if (!empty($event['EventMemo'])): ?>
                            <section class="panel panel-default padder">
                              <div class="row wrapper">
                                <div class="col-sm-5 m-b-xs">
                                    			<?php echo $this->Html->link(' Create', array('controller' => 'event_memos', 'action' => 'add' ), array('class' => 'btn btn-default bg-success fa fa-plus', 'data-toggle'=>'ajaxModal', 'style'=>'color:#000;', 'escape' => false)); ?>
 
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
                                        		<?php echo __('Memo'); ?>
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
                                        		<?php echo __('Memo'); ?>
                                      </th>
                                                                                                                                                      <th>
                                        		<?php echo __('Active'); ?>
                                      </th>
                                                                                                                                                                                                                                                                      </tr>
                                  </tfoot>
                                  
                                  <tbody>
                                  	<?php foreach ($event['EventMemo'] as $eventMemo): ?>
		<tr>
			<td class="actions">
				<?php echo $this->Html->link('', array('controller' => 'event_memos', 'action' => 'sneak', $eventMemo['id']), array('class'=>'btn btn-xs btn-success fa fa-desktop', 'style'=>'color:#000;width:25px; height:25px; padding-top:5px','data-toggle'=>'tooltip', 'data-placement'=>'right', 'title'=>'View Details', 'data-toggle'=>'ajaxModal', 'escape' => false)); ?>
				<?php echo $this->Html->link('', array('controller' => 'event_memos', 'action' => 'edit', $eventMemo['id']), array('class'=>'btn btn-xs btn-warning fa fa-pencil', 'style'=>'color:#000;width:25px; height:25px; padding-top:5px','data-toggle'=>'tooltip', 'data-placement'=>'right', 'title'=>'Modify Details', 'data-toggle'=>'ajaxModal', 'escape' => false)); ?>
			</td>
			<td><?php echo $eventMemo['event_id']; ?></td>
			<td><?php echo $eventMemo['signed_by']; ?></td>
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
                                  			<?php echo $this->Html->link(' Create', array('controller' => 'event_memos', 'action' => 'add' ), array('class' => 'btn btn-default bg-success fa fa-plus', 'data-toggle'=>'ajaxModal', 'style'=>'color:#000;', 'escape' => false)); ?>
 
                              </div>
                            </div>
                          </div>
                                                    <div class="tab-pane padder" id="EventTrainers">
                            <h3><?php echo __('Related Event Trainers'); ?></h3>
                            

                            <?php if (!empty($event['EventTrainer'])): ?>
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
                                  	<?php foreach ($event['EventTrainer'] as $eventTrainer): ?>
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

