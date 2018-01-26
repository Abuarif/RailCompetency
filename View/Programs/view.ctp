<ul class="breadcrumb no-border no-radius b-b b-light pull-in">
  <li><a href="<?php echo $this->webroot; ?>"><i class="fa fa-home"></i> Home</a></li>
  <li><a href="<?php echo $this->webroot; ?>/rail_competency/programs"><i class="fa fa-book"></i> Program List</a></li>
  <li class="active"><a href="#" onClick="location.reload();"><?php echo __('Program'); ?>'s Details</a></li>
</ul>

<?php echo $this->Layout->sessionFlash(); ?>

<div class="m-b-md">
  <h3 class="m-b-none"><?php echo __('Program'); ?>'s Details</h3>
</div>
<!-- start content view page -->
<section class="vbox">
    <section class="hbox stretch">
      <!-- start column 2 -->
      <aside class="bg-white">
        <section class="vbox">
          <!-- tab content headers -->
          <header class="header bg-light bg-gradient" style="height:auto">
            <div>
              <ul class="nav nav-tabs nav-white">
                <!-- start tab link -->
                <!-- <li class="active"><a href="#dashboard" data-toggle="tab">Dashboard</a></li> -->
                <!-- end of hasOne -->
                <!-- start hasMany -->
                <li class="active"><a href="#ProgramCourses" data-toggle="tab">Program Courses</a></li>
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
              <!-- <div class="tab-pane padder active" id="dashboard">
                <section class="scrollable wrapper">
                  <div class="row">
                    <div class="col-sm-6 portlet">
                      <section class="panel panel-default portlet-item">
                        <header class="panel-heading font-bold">
                          Training Completion
                        </header>
                        <div class="panel-body text-center">
                          <h4>6<small> hrs</small></h4>
                          <small class="text-muted block">Updated at 2 minutes ago</small>
                          <div class="inline">
                            <div class="easypiechart easyPieChart" data-percent="25" data-line-width="16" data-loop="false" data-size="188" style="width: 188px; height: 188px; line-height: 188px;">
                              <span class="h2 step">25</span>%
                              <div class="easypie-text">New</div>
                              <canvas width="206" height="206" style="width: 188px; height: 188px;"></canvas></div>
                            </div>                      
                          </div>
                          <div class="panel-footer"><small>25% of avarage rate of the Conversion</small></div>
                        </section>
                      </div>
                      <div class="col-sm-6 portlet">
                        <section class="panel panel-default portlet-item">
                          <header class="panel-heading font-bold">
                            Scores & Performance Ratings
                          </header>
                          <div class="panel-body text-center">
                            <h4>24<small> hrs</small></h4>
                            <small class="text-muted block">Updated at 2 minutes ago</small>
                            <div class="inline">
                              <div class="easypiechart easyPieChart" data-percent="75" data-line-width="16" data-loop="false" data-size="188" style="width: 188px; height: 188px; line-height: 188px;">
                                <span class="h2 step">75</span>%
                                <div class="easypie-text">New</div>
                                <canvas width="206" height="206" style="width: 188px; height: 188px;"></canvas></div>
                              </div>                      
                            </div>
                            <div class="panel-footer"><small>75% of avarage rate of the Conversion</small></div>
                          </section>
                        </div>
                      </div>
                    </section>
                  </div> -->
                  <!-- start hasOne -->
                  <!-- end hasOne -->
                  <!-- start hasMany -->
                  <div class="tab-pane padder active" id="ProgramCourses">
                    <h3><?php echo __('Related Program Courses'); ?></h3>
                    <?php if (!empty($program['ProgramCourse'])): ?>
                      <section class="panel panel-default">
                        <div class="row wrapper">
                          <div class="col-sm-5 m-b-xs">
                          <div class="btn-group">
                            <button type="button" data-toggle="tooltip" data-placement="top" title="" data-original-title="Refresh" class="btn btn-sm btn-default" title="Refresh" onclick ='location.reload();'><i class="fa fa-refresh"></i>&nbsp;&nbsp;Refresh</button>
                          </div>
                           <?php echo $this->Html->link('<i class="fa fa-plus"></i>&nbsp;&nbsp;Create', array('controller' => 'program_courses', 'action' => 'add' ), array('class' => 'btn btn-success btn-sm', 'data-toggle'=>'ajaxModal', 'style'=>'color:#000;', 'escape' => false)); ?>
                         </div>
                       </div>
                       <div class="table-responsive">
                        <table class="table table-striped b-t b-light">
                          <thead>
                            <tr>
                              <th class="text-center sorting" style="width:70px;"><?php echo __('Actions'); ?></th>
                              <th>
                                <?php echo __('Course Name'); ?>
                              </th>
                            </tr>
                          </thead>
                          <tbody>
                           <?php foreach ($program['ProgramCourse'] as $programCourse): ?>
                           <?php
                            $myCourse = $this->requestAction(array('controller' => 'courses', 'action' => 'object', $programCourse['course_id']));
                           ?>
                            <tr>
                             <td class="text-center sorting">
                              <?php echo $this->Html->link('', array('controller' => 'program_courses', 'action' => 'delete', $programCourse['id']), array('class'=>'btn btn-xs btn-danger fa fa-trash-o', 'style'=>'color:#000;width:25px; height:25px; padding-top:5px','data-toggle'=>'tooltip', 'data-placement'=>'right', 'title'=>'Delete', 'escape' => false, 'confirm' => 'Are you sure you wish to delete the course?')); ?>
                              <?php //echo $this->Html->link('', array('controller' => 'program_courses', 'action' => 'edit', $programCourse['id']), array('class'=>'btn btn-xs btn-warning fa fa-pencil', 'style'=>'color:#000;width:25px; height:25px; padding-top:5px','data-toggle'=>'tooltip', 'data-placement'=>'right', 'title'=>'Modify Details', 'data-toggle'=>'ajaxModal', 'escape' => false)); ?>
                            </td>
                            <td><?php echo $myCourse['Course']['code'].' - '.$myCourse['Course']['name']; ?></td>
                          </tr>
                        <?php endforeach; ?>
                        <tr>
                        </tr>
                      </tbody>
                    </table>
                    <footer class="panel-footer">
                      <div class="row">
                        <div class="col-lg-6" style="text-align:right;">                
                          &nbsp;
                        </div>
                      </div>
                    </footer>
                  </div>
                <?php endif; ?>
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
<!-- end content view page -->

