          <ul class="breadcrumb no-border no-radius b-b b-light pull-in">
            <li><a href="<?php echo $this->webroot; ?>"<i class="fa fa-home"></i> Home</a></li>
            <li class="active"><a href="#" onClick="location.reload();"><?php echo __('Organization'); ?>'s Details</a></li>
          </ul>
          <div class="m-b-md">
            <h3 class="m-b-none"><?php echo __('Organization'); ?>'s Details</h3>
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
			<?php echo h($organization['Organization']['id']); ?>
			&nbsp;
		</p>
		<small class="text-uc text-xs text-muted"><?php echo __('Parent Organization'); ?></small>
		<p>
			<?php echo $this->Html->link($organization['ParentOrganization']['name'], array('controller' => 'organizations', 'action' => 'view', $organization['ParentOrganization']['id'])); ?>
			&nbsp;
		</p>
		<small class="text-uc text-xs text-muted"><?php echo __('Parent Code'); ?></small>
		<p>
			<?php echo h($organization['Organization']['parent_code']); ?>
			&nbsp;
		</p>
		<small class="text-uc text-xs text-muted"><?php echo __('Org Code'); ?></small>
		<p>
			<?php echo h($organization['Organization']['org_code']); ?>
			&nbsp;
		</p>
		<small class="text-uc text-xs text-muted"><?php echo __('Name'); ?></small>
		<p>
			<?php echo h($organization['Organization']['name']); ?>
			&nbsp;
		</p>
		<small class="text-uc text-xs text-muted"><?php echo __('Details'); ?></small>
		<p>
			<?php echo h($organization['Organization']['details']); ?>
			&nbsp;
		</p>
		<small class="text-uc text-xs text-muted"><?php echo __('Lft'); ?></small>
		<p>
			<?php echo h($organization['Organization']['lft']); ?>
			&nbsp;
		</p>
		<small class="text-uc text-xs text-muted"><?php echo __('Rght'); ?></small>
		<p>
			<?php echo h($organization['Organization']['rght']); ?>
			&nbsp;
		</p>
		<small class="text-uc text-xs text-muted"><?php echo __('Active'); ?></small>
		<p>
			<?php echo h($organization['Organization']['active']); ?>
			&nbsp;
		</p>
                        </section>
                        <section class="panel panel-info portlet-item">
                          <header class="panel-heading">
                            Quick links
                          </header>
                          <div class="list-group bg-white">
                           <?php echo $this->Html->link(__('Edit Organization'), array('action' => 'edit', $organization['Organization']['id']), array('class'=>'list-group-item', 'data-toggle'=>'ajaxModal')); ?> <?php echo $this->Form->postLink(__('Delete Organization'), array('action' => 'delete', $organization['Organization']['id']), array('class'=>'list-group-item'), __('Are you sure you want to delete # %s?', $organization['Organization']['id'])); ?>  <?php echo $this->Html->link(__('List Organizations'), array('action' => 'index'), array('class'=>'list-group-item')); ?> <?php echo $this->Html->link(__('New Organization'), array('action' => 'add'), array('class'=>'list-group-item', 'data-toggle'=>'ajaxModal', 'escape' => false)); ?>                              </div>
                        </section>
                        <section class="panel panel-info portlet-item">
                          <header class="panel-heading">
                            Associated links
                          </header>
                          <div class="list-group bg-white">
                          <?php echo $this->Html->link(__('List Organizations'), array('controller' => 'organizations', 'action' => 'index'), array('class' => 'list-group-item')); ?> &nbsp;&nbsp; <?php echo $this->Html->link(__('New Parent Organization'), array('controller' => 'organizations', 'action' => 'add'), array('class' => 'list-group-item')); ?> &nbsp;&nbsp; <?php echo $this->Html->link(__('List Organization Courses'), array('controller' => 'organization_courses', 'action' => 'index'), array('class' => 'list-group-item')); ?> &nbsp;&nbsp; <?php echo $this->Html->link(__('New Organization Course'), array('controller' => 'organization_courses', 'action' => 'add'), array('class' => 'list-group-item')); ?> &nbsp;&nbsp; <?php echo $this->Html->link(__('List Staffs'), array('controller' => 'staffs', 'action' => 'index'), array('class' => 'list-group-item')); ?> &nbsp;&nbsp; <?php echo $this->Html->link(__('New Staff'), array('controller' => 'staffs', 'action' => 'add'), array('class' => 'list-group-item')); ?> &nbsp;&nbsp; <?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index'), array('class' => 'list-group-item')); ?> &nbsp;&nbsp; <?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add'), array('class' => 'list-group-item')); ?> &nbsp;&nbsp;                           </div>
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
                                                      <li><a href="#OrganizationCourses" data-toggle="tab">Organization Courses</a></li>
                                                      <li><a href="#Organizations" data-toggle="tab">Organizations</a></li>
                                                      <li><a href="#Staffs" data-toggle="tab">Staffs</a></li>
                                                      <li><a href="#Users" data-toggle="tab">Users</a></li>
                            
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
                                                  <div class="tab-pane padder" id="OrganizationCourses">
                            <h3><?php echo __('Related Organization Courses'); ?></h3>
                            

                            <?php if (!empty($organization['OrganizationCourse'])): ?>
                            <section class="panel panel-default padder">
                              <div class="row wrapper">
                                <div class="col-sm-5 m-b-xs">
                                    			<?php echo $this->Html->link(' Create', array('controller' => 'organization_courses', 'action' => 'add', '?' => array('returnURL' => $this->Html->url( null, true ))), array('class' => 'btn btn-default bg-success fa fa-plus', 'data-toggle'=>'ajaxModal', 'style'=>'color:#000;', 'escape' => false)); ?>
 
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
                                                                                                                                                                                              
                                        		<th><?php echo __('Organization Id'); ?></th>
                                      
                                                                                                                                                      
                                        		<th><?php echo __('Course Id'); ?></th>
                                      
                                                                                                                                                      
                                        		<th><?php echo __('Active'); ?></th>
                                      
                                                                                                                                                                                                                                                                      </tr>
                                  </tfoot>
                                  
                                  <tbody>
                                  	<?php foreach ($organization['OrganizationCourse'] as $organizationCourse): ?>
		<tr>
			<td class="actions">
				<?php echo $this->Html->link('', array('controller' => 'organization_courses', 'action' => 'sneak', $organizationCourse['id']), array('class'=>'btn btn-xs btn-success fa fa-desktop', 'style'=>'color:#000;width:25px; height:25px; padding-top:5px','data-toggle'=>'tooltip', 'data-placement'=>'right', 'title'=>'View Details', 'data-toggle'=>'ajaxModal', 'escape' => false)); ?>
				<?php echo $this->Html->link('', array('controller' => 'organization_courses', 'action' => 'edit', $organizationCourse['id']), array('class'=>'btn btn-xs btn-warning fa fa-pencil', 'style'=>'color:#000;width:25px; height:25px; padding-top:5px','data-toggle'=>'tooltip', 'data-placement'=>'right', 'title'=>'Modify Details', 'data-toggle'=>'ajaxModal', 'escape' => false)); ?>
			</td>
			<td><?php echo $organizationCourse['organization_id']; ?></td>
			<td><?php echo $organizationCourse['course_id']; ?></td>
			<td><?php echo $organizationCourse['active']; ?></td>
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
                                  			<?php echo $this->Html->link(' Create', array('controller' => 'organization_courses', 'action' => 'add', '?' => array('returnURL' => $this->Html->url( null, true ))), array('class' => 'btn btn-default bg-success fa fa-plus', 'data-toggle'=>'ajaxModal', 'style'=>'color:#000;', 'escape' => false)); ?>
 
                              </div>
                            </div>
                          </div>
                                                    <div class="tab-pane padder" id="Organizations">
                            <h3><?php echo __('Related Organizations'); ?></h3>
                            

                            <?php if (!empty($organization['ChildOrganization'])): ?>
                            <section class="panel panel-default padder">
                              <div class="row wrapper">
                                <div class="col-sm-5 m-b-xs">
                                    			<?php echo $this->Html->link(' Create', array('controller' => 'organizations', 'action' => 'add', '?' => array('returnURL' => $this->Html->url( null, true ))), array('class' => 'btn btn-default bg-success fa fa-plus', 'data-toggle'=>'ajaxModal', 'style'=>'color:#000;', 'escape' => false)); ?>
 
                                </div>
                              </div>
                              <div class="table-responsive">
                                <table class="table table-striped b-t b-light">
                                  <thead>
                                    <tr>
                                      <th class="actions"><?php echo __('Actions'); ?></th>
                                                                                                                                                                                              <th>
                                        		<?php echo __('Parent Id'); ?>
                                      </th>
                                                                                                                                                      <th>
                                        		<?php echo __('Parent Code'); ?>
                                      </th>
                                                                                                                                                      <th>
                                        		<?php echo __('Org Code'); ?>
                                      </th>
                                                                                                                                                      <th>
                                        		<?php echo __('Name'); ?>
                                      </th>
                                                                                                                                                      <th>
                                        		<?php echo __('Details'); ?>
                                      </th>
                                                                                                                                                      <th>
                                        		<?php echo __('Lft'); ?>
                                      </th>
                                                                                                                                                      <th>
                                        		<?php echo __('Rght'); ?>
                                      </th>
                                                                                                                                                      <th>
                                        		<?php echo __('Active'); ?>
                                      </th>
                                                                                                                                                                                                                                                                      </tr>
                                  </thead>
                                  <tfoot>
                                    <tr>
                                      <th class="actions"><?php echo __('Actions'); ?></th>
                                                                                                                                                                                              
                                        		<th><?php echo __('Parent Id'); ?></th>
                                      
                                                                                                                                                      
                                        		<th><?php echo __('Parent Code'); ?></th>
                                      
                                                                                                                                                      
                                        		<th><?php echo __('Org Code'); ?></th>
                                      
                                                                                                                                                      
                                        		<th><?php echo __('Name'); ?></th>
                                      
                                                                                                                                                      
                                        		<th><?php echo __('Details'); ?></th>
                                      
                                                                                                                                                      
                                        		<th><?php echo __('Lft'); ?></th>
                                      
                                                                                                                                                      
                                        		<th><?php echo __('Rght'); ?></th>
                                      
                                                                                                                                                      
                                        		<th><?php echo __('Active'); ?></th>
                                      
                                                                                                                                                                                                                                                                      </tr>
                                  </tfoot>
                                  
                                  <tbody>
                                  	<?php foreach ($organization['ChildOrganization'] as $childOrganization): ?>
		<tr>
			<td class="actions">
				<?php echo $this->Html->link('', array('controller' => 'organizations', 'action' => 'sneak', $childOrganization['id']), array('class'=>'btn btn-xs btn-success fa fa-desktop', 'style'=>'color:#000;width:25px; height:25px; padding-top:5px','data-toggle'=>'tooltip', 'data-placement'=>'right', 'title'=>'View Details', 'data-toggle'=>'ajaxModal', 'escape' => false)); ?>
				<?php echo $this->Html->link('', array('controller' => 'organizations', 'action' => 'edit', $childOrganization['id']), array('class'=>'btn btn-xs btn-warning fa fa-pencil', 'style'=>'color:#000;width:25px; height:25px; padding-top:5px','data-toggle'=>'tooltip', 'data-placement'=>'right', 'title'=>'Modify Details', 'data-toggle'=>'ajaxModal', 'escape' => false)); ?>
			</td>
			<td><?php echo $childOrganization['parent_id']; ?></td>
			<td><?php echo $childOrganization['parent_code']; ?></td>
			<td><?php echo $childOrganization['org_code']; ?></td>
			<td><?php echo $childOrganization['name']; ?></td>
			<td><?php echo $childOrganization['details']; ?></td>
			<td><?php echo $childOrganization['lft']; ?></td>
			<td><?php echo $childOrganization['rght']; ?></td>
			<td><?php echo $childOrganization['active']; ?></td>
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
                                  			<?php echo $this->Html->link(' Create', array('controller' => 'organizations', 'action' => 'add', '?' => array('returnURL' => $this->Html->url( null, true ))), array('class' => 'btn btn-default bg-success fa fa-plus', 'data-toggle'=>'ajaxModal', 'style'=>'color:#000;', 'escape' => false)); ?>
 
                              </div>
                            </div>
                          </div>
                                                    <div class="tab-pane padder" id="Staffs">
                            <h3><?php echo __('Related Staffs'); ?></h3>
                            

                            <?php if (!empty($organization['Staff'])): ?>
                            <section class="panel panel-default padder">
                              <div class="row wrapper">
                                <div class="col-sm-5 m-b-xs">
                                    			<?php echo $this->Html->link(' Create', array('controller' => 'staffs', 'action' => 'add', '?' => array('returnURL' => $this->Html->url( null, true ))), array('class' => 'btn btn-default bg-success fa fa-plus', 'data-toggle'=>'ajaxModal', 'style'=>'color:#000;', 'escape' => false)); ?>
 
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
                                        		<?php echo __('Email'); ?>
                                      </th>
                                                                                                                                                      <th>
                                        		<?php echo __('Position Id'); ?>
                                      </th>
                                                                                                                                                      <th>
                                        		<?php echo __('Name'); ?>
                                      </th>
                                                                                                                                                      <th>
                                        		<?php echo __('Division'); ?>
                                      </th>
                                                                                                                                                      <th>
                                        		<?php echo __('Department'); ?>
                                      </th>
                                                                                                                                                      <th>
                                        		<?php echo __('Section'); ?>
                                      </th>
                                                                                                                                                      <th>
                                        		<?php echo __('Unit'); ?>
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
                                                                                                                                                                                              
                                        		<th><?php echo __('Organization Id'); ?></th>
                                      
                                                                                                                                                      
                                        		<th><?php echo __('Parent Id'); ?></th>
                                      
                                                                                                                                                      
                                        		<th><?php echo __('User Id'); ?></th>
                                      
                                                                                                                                                      
                                        		<th><?php echo __('Staff No'); ?></th>
                                      
                                                                                                                                                      
                                        		<th><?php echo __('Email'); ?></th>
                                      
                                                                                                                                                      
                                        		<th><?php echo __('Position Id'); ?></th>
                                      
                                                                                                                                                      
                                        		<th><?php echo __('Name'); ?></th>
                                      
                                                                                                                                                      
                                        		<th><?php echo __('Division'); ?></th>
                                      
                                                                                                                                                      
                                        		<th><?php echo __('Department'); ?></th>
                                      
                                                                                                                                                      
                                        		<th><?php echo __('Section'); ?></th>
                                      
                                                                                                                                                      
                                        		<th><?php echo __('Unit'); ?></th>
                                      
                                                                                                                                                      
                                        		<th><?php echo __('Parent Code'); ?></th>
                                      
                                                                                                                                                      
                                        		<th><?php echo __('Org Code'); ?></th>
                                      
                                                                                                                                                      
                                        		<th><?php echo __('NRIC'); ?></th>
                                      
                                                                                                                                                      
                                        		<th><?php echo __('Details'); ?></th>
                                      
                                                                                                                                                      
                                        		<th><?php echo __('IsTrainer'); ?></th>
                                      
                                                                                                                                                      
                                        		<th><?php echo __('Active'); ?></th>
                                      
                                                                                                                                                      
                                        		<th><?php echo __('Lft'); ?></th>
                                      
                                                                                                                                                      
                                        		<th><?php echo __('Rght'); ?></th>
                                      
                                                                                                                                                                                                                                                                      </tr>
                                  </tfoot>
                                  
                                  <tbody>
                                  	<?php foreach ($organization['Staff'] as $staff): ?>
		<tr>
			<td class="actions">
				<?php echo $this->Html->link('', array('controller' => 'staffs', 'action' => 'sneak', $staff['id']), array('class'=>'btn btn-xs btn-success fa fa-desktop', 'style'=>'color:#000;width:25px; height:25px; padding-top:5px','data-toggle'=>'tooltip', 'data-placement'=>'right', 'title'=>'View Details', 'data-toggle'=>'ajaxModal', 'escape' => false)); ?>
				<?php echo $this->Html->link('', array('controller' => 'staffs', 'action' => 'edit', $staff['id']), array('class'=>'btn btn-xs btn-warning fa fa-pencil', 'style'=>'color:#000;width:25px; height:25px; padding-top:5px','data-toggle'=>'tooltip', 'data-placement'=>'right', 'title'=>'Modify Details', 'data-toggle'=>'ajaxModal', 'escape' => false)); ?>
			</td>
			<td><?php echo $staff['organization_id']; ?></td>
			<td><?php echo $staff['parent_id']; ?></td>
			<td><?php echo $staff['user_id']; ?></td>
			<td><?php echo $staff['staff_no']; ?></td>
			<td><?php echo $staff['email']; ?></td>
			<td><?php echo $staff['position_id']; ?></td>
			<td><?php echo $staff['name']; ?></td>
			<td><?php echo $staff['division']; ?></td>
			<td><?php echo $staff['department']; ?></td>
			<td><?php echo $staff['section']; ?></td>
			<td><?php echo $staff['unit']; ?></td>
			<td><?php echo $staff['parent_code']; ?></td>
			<td><?php echo $staff['org_code']; ?></td>
			<td><?php echo $staff['NRIC']; ?></td>
			<td><?php echo $staff['details']; ?></td>
			<td><?php echo $staff['isTrainer']; ?></td>
			<td><?php echo $staff['active']; ?></td>
			<td><?php echo $staff['lft']; ?></td>
			<td><?php echo $staff['rght']; ?></td>
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
                                  			<?php echo $this->Html->link(' Create', array('controller' => 'staffs', 'action' => 'add', '?' => array('returnURL' => $this->Html->url( null, true ))), array('class' => 'btn btn-default bg-success fa fa-plus', 'data-toggle'=>'ajaxModal', 'style'=>'color:#000;', 'escape' => false)); ?>
 
                              </div>
                            </div>
                          </div>
                                                    <div class="tab-pane padder" id="Users">
                            <h3><?php echo __('Related Users'); ?></h3>
                            

                            <?php if (!empty($organization['User'])): ?>
                            <section class="panel panel-default padder">
                              <div class="row wrapper">
                                <div class="col-sm-5 m-b-xs">
                                    			<?php echo $this->Html->link(' Create', array('controller' => 'users', 'action' => 'add', '?' => array('returnURL' => $this->Html->url( null, true ))), array('class' => 'btn btn-default bg-success fa fa-plus', 'data-toggle'=>'ajaxModal', 'style'=>'color:#000;', 'escape' => false)); ?>
 
                                </div>
                              </div>
                              <div class="table-responsive">
                                <table class="table table-striped b-t b-light">
                                  <thead>
                                    <tr>
                                      <th class="actions"><?php echo __('Actions'); ?></th>
                                                                                                                                                                                              <th>
                                        		<?php echo __('Role Id'); ?>
                                      </th>
                                                                                                                                                      <th>
                                        		<?php echo __('Organization Id'); ?>
                                      </th>
                                                                                                                                                      <th>
                                        		<?php echo __('Username'); ?>
                                      </th>
                                                                                                                                                      <th>
                                        		<?php echo __('Password'); ?>
                                      </th>
                                                                                                                                                      <th>
                                        		<?php echo __('Name'); ?>
                                      </th>
                                                                                                                                                                                                                                  <th>
                                        		<?php echo __('Staff No'); ?>
                                      </th>
                                                                                                                                                      <th>
                                        		<?php echo __('Title'); ?>
                                      </th>
                                                                                                                                                      <th>
                                        		<?php echo __('Department'); ?>
                                      </th>
                                                                                                                                                      <th>
                                        		<?php echo __('Company'); ?>
                                      </th>
                                                                                                                                                      <th>
                                        		<?php echo __('Lastname'); ?>
                                      </th>
                                                                                                                                                      <th>
                                        		<?php echo __('Email'); ?>
                                      </th>
                                                                                                                                                      <th>
                                        		<?php echo __('Only LDAP'); ?>
                                      </th>
                                                                                                                                                      <th>
                                        		<?php echo __('Website'); ?>
                                      </th>
                                                                                                                                                      <th>
                                        		<?php echo __('Activation Key'); ?>
                                      </th>
                                                                                                                                                      <th>
                                        		<?php echo __('Image'); ?>
                                      </th>
                                                                                                                                                      <th>
                                        		<?php echo __('Bio'); ?>
                                      </th>
                                                                                                                                                      <th>
                                        		<?php echo __('Status'); ?>
                                      </th>
                                                                                                                                                      <th>
                                        		<?php echo __('Updated'); ?>
                                      </th>
                                                                                                                                                      <th>
                                        		<?php echo __('Updated By'); ?>
                                      </th>
                                                                                                                                                                                                                                  <th>
                                        		<?php echo __('Timezone'); ?>
                                      </th>
                                                                                                                                                      <th>
                                        		<?php echo __('Created By'); ?>
                                      </th>
                                                                                                                                                      <th>
                                        		<?php echo __('Twitter'); ?>
                                      </th>
                                                                                                                                                      <th>
                                        		<?php echo __('Facebook'); ?>
                                      </th>
                                                                                                                                                      <th>
                                        		<?php echo __('Google Plus'); ?>
                                      </th>
                                                                                                                                                      <th>
                                        		<?php echo __('Linkedin'); ?>
                                      </th>
                                                                                                                                                      <th>
                                        		<?php echo __('Skills'); ?>
                                      </th>
                                                                                                                                                      <th>
                                        		<?php echo __('Generally About'); ?>
                                      </th>
                                                                                                                                                      <th>
                                        		<?php echo __('My Favourite Tags'); ?>
                                      </th>
                                                                                                                                                      <th>
                                        		<?php echo __('Kms Writing'); ?>
                                      </th>
                                                                                                                                                      <th>
                                        		<?php echo __('Kms Reading'); ?>
                                      </th>
                                                                                                                                                      <th>
                                        		<?php echo __('Kms Editing'); ?>
                                      </th>
                                                                                                                                                      <th>
                                        		<?php echo __('Kms Traveling'); ?>
                                      </th>
                                                                                                                                                      <th>
                                        		<?php echo __('Kms Others'); ?>
                                      </th>
                                                                                                                                                      <th>
                                        		<?php echo __('Allow Contact'); ?>
                                      </th>
                                                                                                              </tr>
                                  </thead>
                                  <tfoot>
                                    <tr>
                                      <th class="actions"><?php echo __('Actions'); ?></th>
                                                                                                                                                                                              
                                        		<th><?php echo __('Role Id'); ?></th>
                                      
                                                                                                                                                      
                                        		<th><?php echo __('Organization Id'); ?></th>
                                      
                                                                                                                                                      
                                        		<th><?php echo __('Username'); ?></th>
                                      
                                                                                                                                                      
                                        		<th><?php echo __('Password'); ?></th>
                                      
                                                                                                                                                      
                                        		<th><?php echo __('Name'); ?></th>
                                      
                                                                                                                                                      
                                        		<th><?php echo __('Staff Id'); ?></th>
                                      
                                                                                                                                                      
                                        		<th><?php echo __('Staff No'); ?></th>
                                      
                                                                                                                                                      
                                        		<th><?php echo __('Title'); ?></th>
                                      
                                                                                                                                                      
                                        		<th><?php echo __('Department'); ?></th>
                                      
                                                                                                                                                      
                                        		<th><?php echo __('Company'); ?></th>
                                      
                                                                                                                                                      
                                        		<th><?php echo __('Lastname'); ?></th>
                                      
                                                                                                                                                      
                                        		<th><?php echo __('Email'); ?></th>
                                      
                                                                                                                                                      
                                        		<th><?php echo __('Only LDAP'); ?></th>
                                      
                                                                                                                                                      
                                        		<th><?php echo __('Website'); ?></th>
                                      
                                                                                                                                                      
                                        		<th><?php echo __('Activation Key'); ?></th>
                                      
                                                                                                                                                      
                                        		<th><?php echo __('Image'); ?></th>
                                      
                                                                                                                                                      
                                        		<th><?php echo __('Bio'); ?></th>
                                      
                                                                                                                                                      
                                        		<th><?php echo __('Status'); ?></th>
                                      
                                                                                                                                                      
                                        		<th><?php echo __('Updated'); ?></th>
                                      
                                                                                                                                                      
                                        		<th><?php echo __('Updated By'); ?></th>
                                      
                                                                                                                                                                                                                                  
                                        		<th><?php echo __('Timezone'); ?></th>
                                      
                                                                                                                                                      
                                        		<th><?php echo __('Created By'); ?></th>
                                      
                                                                                                                                                      
                                        		<th><?php echo __('Twitter'); ?></th>
                                      
                                                                                                                                                      
                                        		<th><?php echo __('Facebook'); ?></th>
                                      
                                                                                                                                                      
                                        		<th><?php echo __('Google Plus'); ?></th>
                                      
                                                                                                                                                      
                                        		<th><?php echo __('Linkedin'); ?></th>
                                      
                                                                                                                                                      
                                        		<th><?php echo __('Skills'); ?></th>
                                      
                                                                                                                                                      
                                        		<th><?php echo __('Generally About'); ?></th>
                                      
                                                                                                                                                      
                                        		<th><?php echo __('My Favourite Tags'); ?></th>
                                      
                                                                                                                                                      
                                        		<th><?php echo __('Kms Writing'); ?></th>
                                      
                                                                                                                                                      
                                        		<th><?php echo __('Kms Reading'); ?></th>
                                      
                                                                                                                                                      
                                        		<th><?php echo __('Kms Editing'); ?></th>
                                      
                                                                                                                                                      
                                        		<th><?php echo __('Kms Traveling'); ?></th>
                                      
                                                                                                                                                      
                                        		<th><?php echo __('Kms Others'); ?></th>
                                      
                                                                                                                                                      
                                        		<th><?php echo __('Allow Contact'); ?></th>
                                      
                                                                                                              </tr>
                                  </tfoot>
                                  
                                  <tbody>
                                  	<?php foreach ($organization['User'] as $user): ?>
		<tr>
			<td class="actions">
				<?php echo $this->Html->link('', array('controller' => 'users', 'action' => 'sneak', $user['id']), array('class'=>'btn btn-xs btn-success fa fa-desktop', 'style'=>'color:#000;width:25px; height:25px; padding-top:5px','data-toggle'=>'tooltip', 'data-placement'=>'right', 'title'=>'View Details', 'data-toggle'=>'ajaxModal', 'escape' => false)); ?>
				<?php echo $this->Html->link('', array('controller' => 'users', 'action' => 'edit', $user['id']), array('class'=>'btn btn-xs btn-warning fa fa-pencil', 'style'=>'color:#000;width:25px; height:25px; padding-top:5px','data-toggle'=>'tooltip', 'data-placement'=>'right', 'title'=>'Modify Details', 'data-toggle'=>'ajaxModal', 'escape' => false)); ?>
			</td>
			<td><?php echo $user['role_id']; ?></td>
			<td><?php echo $user['organization_id']; ?></td>
			<td><?php echo $user['username']; ?></td>
			<td><?php echo $user['password']; ?></td>
			<td><?php echo $user['name']; ?></td>
			<td><?php echo $user['staff_id']; ?></td>
			<td><?php echo $user['staff_no']; ?></td>
			<td><?php echo $user['title']; ?></td>
			<td><?php echo $user['department']; ?></td>
			<td><?php echo $user['company']; ?></td>
			<td><?php echo $user['lastname']; ?></td>
			<td><?php echo $user['email']; ?></td>
			<td><?php echo $user['only_LDAP']; ?></td>
			<td><?php echo $user['website']; ?></td>
			<td><?php echo $user['activation_key']; ?></td>
			<td><?php echo $user['image']; ?></td>
			<td><?php echo $user['bio']; ?></td>
			<td><?php echo $user['status']; ?></td>
			<td><?php echo $user['updated']; ?></td>
			<td><?php echo $user['updated_by']; ?></td>
			<td><?php echo $user['timezone']; ?></td>
			<td><?php echo $user['created_by']; ?></td>
			<td><?php echo $user['twitter']; ?></td>
			<td><?php echo $user['facebook']; ?></td>
			<td><?php echo $user['google_plus']; ?></td>
			<td><?php echo $user['linkedin']; ?></td>
			<td><?php echo $user['skills']; ?></td>
			<td><?php echo $user['generally_about']; ?></td>
			<td><?php echo $user['my_favourite_tags']; ?></td>
			<td><?php echo $user['kms_writing']; ?></td>
			<td><?php echo $user['kms_reading']; ?></td>
			<td><?php echo $user['kms_editing']; ?></td>
			<td><?php echo $user['kms_traveling']; ?></td>
			<td><?php echo $user['kms_others']; ?></td>
			<td><?php echo $user['allow_contact']; ?></td>
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
                                  			<?php echo $this->Html->link(' Create', array('controller' => 'users', 'action' => 'add', '?' => array('returnURL' => $this->Html->url( null, true ))), array('class' => 'btn btn-default bg-success fa fa-plus', 'data-toggle'=>'ajaxModal', 'style'=>'color:#000;', 'escape' => false)); ?>
 
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

