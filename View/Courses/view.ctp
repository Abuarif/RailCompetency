        <ul class="breadcrumb no-border no-radius b-b b-light pull-in">
          <li><a href="<?php echo $this->webroot; ?>"><i class="fa fa-home"></i> Home</a></li>
          <li><a href="<?php echo $this->webroot; ?>/rail_competency/courses"><i class="fa fa-book"></i> Course Outlines</a></li>
          <li class="active"><a href="" onClick="location.reload();"><?php echo __('Course'); ?>'s Details</a></li>
        </ul>
        <div class="m-b-md">
          <h3 class="m-b-none"><?php echo __('Course'); ?>'s Details</h3>
        </div>
        <!-- start content view page -->
        <?php 
          // capture tab param
        if (!empty($this->request->named))
          $myActive = $this->request->named['tab'];
        else
          $myActive='dashboard';

        ?>
        <section class="vbox">
            <section class="hbox stretch">

              <!-- start column 2 -->
              <aside class="bg-white">
                <section class="vbox">
                  <!-- tab content headers -->
                  <header class="panel-heading text-right bg-light dker bg-gradient" style="height:auto">
                    <ul class="nav nav-tabs pull-left">
                      <!-- start tab link -->

                      <li <?php echo ($myActive=='dashboard'?'class="active"':''); ?> ><a href="#dashboard" data-toggle="tab">Dashboard</a></li>
                      <!-- end of hasOne -->
                      <!-- start hasMany -->
                      <li <?php echo ($myActive=='CourseMaterials'?'class="active"':''); ?> ><a href="#CourseMaterials" data-toggle="tab">Course Materials</a></li>
                      <li <?php echo ($myActive=='Events'?'class="active"':''); ?> ><a href="#Events" data-toggle="tab">Events</a></li>
                      <li <?php echo ($myActive=='StaffTrainingProfiles'?'class="active"':''); ?> ><a href="#StaffTrainingProfiles" data-toggle="tab">Staff Profiles</a></li>
                      <li <?php echo ($myActive=='Trainers'?'class="active"':''); ?> ><a href="#Trainers" data-toggle="tab">Trainers</a></li>

                      <!-- end hasMany -->
                      <!-- end tab link -->
                    </ul>
                    <span class="hidden-sm">
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-cog text-default"></i> Options <b class="caret"></b></a>
                      <ul class="dropdown-menu pull-right">
                        <?php if (empty($course['Event'])) { ?>
                          <li>
                            <?php echo $this->Form->postLink('<i class="fa fa-trash-o pull-left"></i>Delete Course', array('action' => 'delete', $course['Course']['id']), array('escape' => false, 'confirm' => 'Are you sure you wish to delete the course?')); ?>
                          </li>

                          <?php } else { ?>
                          <li>
                            <?php echo $this->Html->link('<i class="fa fa-trash-o pull-left"></i>Delete Course', array('action' => 'index', $course['Course']['id']), array('escape' => false, 'confirm' => 'Sorry, you cannot delete this course. There are some events related to it!')); ?>
                          </li>
                          <?php } ?>
                        <li>
                          <?php echo $this->Html->link('<i class="fa fa-pencil pull-left"></i>Edit Course', array('action' => 'edit', $course['Course']['id']), array('escape' => false, 'confirm' => 'Are you sure you wish to edit an attachment?', 'data-toggle' => 'ajaxModal')); ?>
                        </li>
                        <li>
                          <?php echo $this->Html->link('<i class="fa fa-upload pull-left"></i>Upload File', array('action' => 'attachment', $course['Course']['id']), array('escape' => false, 'confirm' => 'Are you sure you wish to upload an attachment?', 'data-toggle' => 'ajaxModal')); ?>
                        </li>     
                      </ul>
                    </span>
                  </header>
                  <!-- end tab content headers -->
                  <!-- tab content article-->
                  <article class="scrollable">
                    <!-- tab content div -->
                    <div class="tab-content">
                      <!-- start tab content -->
                      <div class="tab-pane padder <?php echo ($myActive=='dashboard'?'active':''); ?>" id="dashboard">
                        <section class="scrollable wrapper">

                          <section class="panel panel-default pos-rlt clearfix">
                            <header class="panel-heading">
                              <ul class="nav nav-pills pull-right">
                                <li>
                                  <a href="#" class="panel-toggle text-muted active"><i class="fa fa-caret-down text-active"></i><i class="fa fa-caret-up text"></i></a>
                                </li>
                              </ul>
                              <?php 
                                $str = $course['Course']['name'];
                                $cont =  strtolower($str); 
                                echo ucwords($cont).' ('.$course['Course']['code'].')';
                              ?>
                            </header>
                            <div class="panel-body clearfix collapse">
                              <?php echo $course['Course']['details']; ?>
                            </div>
                          </section>

                          <div class="row">
                            <div class="col-sm-6 portlet">
                              <section class="panel panel-default portlet-item">
                                <header class="panel-heading">
                                  Duration
                                </header>
                                <div class="panel-body text-center">
                                  <h4><?php echo $course['Course']['duration'] ?><small> days</small></h4>
                                  <span style="font-size:60px;"><i class="fa fa-clock-o text-warning"></i></span>
                                </section>
                              </div>
                              <div class="col-sm-6 portlet">
                                <section class="panel panel-default portlet-item">
                                  <header class="panel-heading">
                                    Pax
                                  </header>
                                  <div class="panel-body text-center">
                                    <h4><?php echo $course['Course']['pax'] ?><small> pax</small></h4>
                                    <span style="font-size:60px;"><i class="fa fa-group text-info"></i></span>
                                  </section>
                                </div>
                              </div>
                              <div class="row">
                            <div class="col-sm-6 portlet">
                              <section class="panel panel-default portlet-item">
                                <header class="panel-heading">
                                  Cost Per Pax
                                </header>
                                <div class="panel-body text-center">
                                  <h4><?php echo $this->Number->currency($course['Course']['cost_pax'], 'RM '); ?></h4>
                                  <span style="font-size:60px;"><i class="fa fa-dollar text-warning"></i></span>
                                </section>
                              </div>
                              <div class="col-sm-6 portlet">
                                <section class="panel panel-default portlet-item">
                                  <header class="panel-heading">
                                    Total Cost
                                  </header>
                                  <div class="panel-body text-center">
                                    <h4><?php echo $this->Number->currency($course['Course']['total_cost'], 'RM '); ?></h4>
                                    <span style="font-size:60px;"><i class="fa fa-dollar text-success"></i></span>
                                  </section>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-sm-6 portlet">
                                  <section class="panel panel-default portlet-item">
                                    <header class="panel-heading">
                                      Attachment
                                    </header>
                                    <div class="panel-body text-center">
                                      <?php 
                                        if(!empty($course['Course']['files']))
                                        {
                                          $file = count($course['Course']['files']);
                                        }else{
                                          $file = '0';
                                        }
                                      ?>
                                      <h4><?php echo $file; ?><small> file</small></h4>

                                      <?php 
                                        if (!empty($course['Course']['files'])) {
                                          echo $this->Html->link('<span style="font-size:60px;"><i class="fa fa-folder-o text-dark"></i></span>', '/attachments/'.$course['Course']['files'],  array('target' => '_blank', 'escape' => false)); 
                                        }else{
                                          echo '<span style="font-size:60px;"><i class="fa fa-folder-o text-dark"></i></span>';
                                        }
                                      ?>
                                    </section>
                                  </div>

                                <div class="col-sm-6 portlet">
                                  <section class="panel panel-default portlet-item">
                                    <header class="panel-heading">
                                      Refreshment
                                    </header>
                                    <div class="panel-body text-center">
                                      <?php
                                        if($course['Course']['isRefresher'] == true)
                                        {
                                          $status = 'Available';
                                          $icon = '<span style="font-size:60px;"><i class="fa fa-check text-success"></i></span>';
                                        }else{
                                          $status = 'Not Available';
                                          $icon = '<span style="font-size:60px;"><i class="fa fa-times text-danger"></i></span>';
                                        }
                                      ?>
                                      <h4><?php echo $status; ?><small> &nbsp;</small></h4>
                                      <?php echo $icon; ?>
                                    </section>
                                  </div>
                                </div>
                            </section>
                          </div>
                          <!-- start hasOne -->
                          <!-- end hasOne -->
                          <!-- start hasMany -->
                          <div class="tab-pane padder <?php echo ($myActive=='CourseMaterials'?'active':''); ?>" id="CourseMaterials">
                            <h3><?php echo __('Related Course Materials'); ?></h3>
                            <section class="panel panel-default">
                              <div class="row wrapper">
                                <div class="col-sm-5 m-b-xs">
                                  <div class="btn-group">
                                    <button type="button" data-toggle="tooltip" data-placement="top" title="" data-original-title="Refresh" class="btn btn-sm btn-default" title="Refresh" onclick ='location.reload();'><i class="fa fa-refresh"></i>&nbsp;&nbsp;Refresh</button>
                                  </div>
                                  <?php echo $this->Html->link('<i class="fa fa-plus"></i>&nbsp;&nbsp;Create', array('controller' => 'course_materials', 'action' => 'add', $this->request->pass[0]), array('class' => 'btn btn-success btn-sm', 'data-toggle'=>'ajaxModal', 'style'=>'color:#000;', 'escape' => false)); ?>
                                </div>
                                <div class="col-sm-4 m-b-xs"></div>
                              </div>

                             <div class="table-responsive">
                              <table class="table table-striped b-t b-light">
                                <thead>
                                  <tr>
                                    <th class="text-center sorting" style="width:150px;"><?php echo __('Actions'); ?></th>
                                    <th>
                                      <?php echo __('Material Name'); ?>
                                    </th>
                                    <th>
                                      <?php echo __('Uploaded Files'); ?>
                                    </th>
                                    <th class="text-center sorting" style="width:100px;">
                                      <?php echo __('Active'); ?>
                                    </th>
                                  </tr>
                                </thead>
                                <tbody>
                                <?php if (!empty($course['CourseMaterial'])) { ?>
                                 <?php foreach ($course['CourseMaterial'] as $courseMaterial): ?>
                                   <tr>
                                     <td class="text-center sorting">
                                      <?php echo $this->Html->link('', array('controller' => 'course_materials', 'action' => 'sneak', $courseMaterial['id']), array('class'=>'btn btn-xs btn-success fa fa-desktop', 'style'=>'color:#000;width:25px; height:25px; padding-top:5px','data-toggle'=>'tooltip', 'data-placement'=>'right', 'title'=>'View Details', 'data-toggle'=>'ajaxModal', 'escape' => false)); ?>
                                      <?php echo $this->Html->link('', array('controller' => 'course_materials', 'action' => 'edit', $courseMaterial['id']), array('class'=>'btn btn-xs btn-warning fa fa-pencil', 'style'=>'color:#000;width:25px; height:25px; padding-top:5px','data-toggle'=>'tooltip', 'data-placement'=>'right', 'title'=>'Modify Details', 'data-toggle'=>'ajaxModal', 'escape' => false)); ?>
                                      <?php echo $this->Form->postLink(__(''), array('controller' => 'course_materials', 'action' => 'delete', $course['Course']['id'], $courseMaterial['id']), array('class'=>'btn btn-xs btn-danger fa fa-trash-o', 'style'=>'color:#000;width:25px; height:25px; padding-top:5px','data-toggle'=>'tooltip', 'data-placement'=>'right', 'title'=>'Delete','confirm' => __('Are you sure you want to delete # %s?', $courseMaterial['name']))); ?>
                                    </td>
                                    <td><?php echo $courseMaterial['name']; ?></td>
                                    <td>
                                      <?php 
                                      echo $this->Html->link(__('Download'), "/attachments/".$courseMaterial['files'], array('style' => 'color:green;', 'target' => '_blank', 'escape'=>false)); 
                                      ?>
                                    </td>
                                    <td class="text-center sorting">
                                      <?php
                                      if ($courseMaterial['active'] == 1)
                                      {
                                        echo '<div class="btn btn-xs btn-success" data-toggle="tooltip" data-placement="top" title="" data-original-title="Program Active"><i class="fa fa-check bg-success"></i></div>';
                                      }else{
                                        echo '<div class="btn btn-xs btn-danger" data-toggle="tooltip" data-placement="top" title="" data-original-title="Program Not Active"><i class="fa fa-times bg-danger"></i></div>';
                                      }
                                      ?>
                                    </td>
                                  </tr>
                                <?php endforeach; ?>
                                <?php }else{ ?>
                                  <tr>
                                    <td colspan="4" style="text-align:center;">No related course materials records found</td>
                                  </tr>
                                <?php } ?>
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
                        </section>
                      <?php //endif; ?>
                    </div>
                    <!-- <div class="tab-pane padder <?php //echo ($myActive=='dashboard'?'active':''); ?>" id="CourseRequisites">
                      <h3><?php //echo __('Related Course Requisites'); ?></h3>
                      <?php //if (!empty($course['CourseRequisite'])): ?>
                        <section class="panel panel-default padder">
                          <div class="row wrapper">
                            <div class="col-sm-5 m-b-xs">
                             <?php //echo $this->Html->link(' Create', array('controller' => 'course_requisites', 'action' => 'add', $this->request->pass[0]), array('class' => 'btn btn-default bg-success fa fa-plus', 'data-toggle'=>'ajaxModal', 'style'=>'color:#000;', 'escape' => false)); ?>

                           </div>
                         </div>
                         <div class="table-responsive">
                          <table class="table table-striped b-t b-light">
                            <thead>
                              <tr>
                                <th class="actions"><?php //cho __('Actions'); ?></th>
                                <th>
                                  <?php //echo __('Course Id'); ?>
                                </th>
                                <th>
                                  <?php //echo __('Prerequisite Id'); ?>
                                </th>
                                <th>
                                  <?php //echo __('Active'); ?>
                                </th>
                              </tr>
                            </thead>
                            <tfoot>
                              <tr>
                                <th class="actions"><?php //echo __('Actions'); ?></th>

                                <th><?php //echo __('Course Id'); ?></th>


                                <th><?php //echo __('Prerequisite Id'); ?></th>


                                <th><?php //echo __('Active'); ?></th>

                              </tr>
                            </tfoot>

                            <tbody>
                             <?php //foreach ($course['CourseRequisite'] as $courseRequisite): ?>
                               <tr>
                                 <td class="actions">
                                  <?php //echo $this->Html->link('', array('controller' => 'course_requisites', 'action' => 'sneak', $courseRequisite['id']), array('class'=>'btn btn-xs btn-success fa fa-desktop', 'style'=>'color:#000;width:25px; height:25px; padding-top:5px','data-toggle'=>'tooltip', 'data-placement'=>'right', 'title'=>'View Details', 'data-toggle'=>'ajaxModal', 'escape' => false)); ?>
                                  <?php //echo $this->Html->link('', array('controller' => 'course_requisites', 'action' => 'edit', $courseRequisite['id']), array('class'=>'btn btn-xs btn-warning fa fa-pencil', 'style'=>'color:#000;width:25px; height:25px; padding-top:5px','data-toggle'=>'tooltip', 'data-placement'=>'right', 'title'=>'Modify Details', 'data-toggle'=>'ajaxModal', 'escape' => false)); ?>
                                </td>
                                <td><?php //echo $courseRequisite['course_id']; ?></td>
                                <td><?php //echo $courseRequisite['prerequisite_id']; ?></td>
                                <td><?php //echo $courseRequisite['active']; ?></td>
                              </tr>
                            <?php //endforeach; ?>
                            <tr>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                    <?php //endif; ?>

                    <br/>
                    <div class="actions">
                      <div class="col-sm-5 m-b-xs">
                       <?php //echo $this->Html->link(' Create', array('controller' => 'course_requisites', 'action' => 'add' ), array('class' => 'btn btn-default bg-success fa fa-plus', 'data-toggle'=>'ajaxModal', 'style'=>'color:#000;', 'escape' => false)); ?>

                     </div>
                   </div>
                 </div> -->
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
                        <td><?php echo $eventTrainer['trainer_id']; ?></td>
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
         <div class="tab-pane padder <?php echo ($myActive=='Events'?'active':''); ?>" id="Events">
          <h3><?php echo __('Related Events'); ?></h3>

          <?php //if (!empty($course['Event'])): ?>
            <section class="panel panel-default">
              <div class="row wrapper">
                  <div class="col-sm-5 m-b-xs">
                  <div class="btn-group">
                    <button type="button" data-toggle="tooltip" data-placement="top" title="" data-original-title="Refresh" class="btn btn-sm btn-default" title="Refresh" onclick ='location.reload();'><i class="fa fa-refresh"></i>&nbsp;&nbsp;Refresh</button>
                  </div>
                </div>
                <div class="col-sm-4 m-b-xs"></div>
              </div>
             <div class="table-responsive">
              <table class="table table-striped b-t b-light">
                <thead>
                  <tr>
                    <th class="text-center sorting" style="width:100px;"><?php echo __('Actions'); ?></th>
                    <th class="text-center sorting"><?php echo __('Start Date'); ?></th>
                    <th class="text-center sorting"><?php echo __('End Date'); ?></th>
                    <th class="text-center sorting"><?php echo __('Time'); ?></th>
                    <th class="text-center sorting"><?php echo __('Active'); ?></th>
                  </tr>
                </thead>
                <tbody>
                <?php if (!empty($course['Event'])) { ?>
                 <?php foreach ($course['Event'] as $event): ?>
                  <tr>
                     <td class="text-center sorting">
                      <?php echo $this->Html->link('', array('controller' => 'events', 'action' => 'preview', $event['id']), array('class'=>'btn btn-xs btn-success fa fa-desktop', 'style'=>'color:#000;width:25px; height:25px; padding-top:5px','data-toggle'=>'tooltip', 'data-placement'=>'right', 'title'=>'View Details', 'data-toggle'=>'ajaxModal', 'escape' => false)); ?>
                      <?php echo $this->Html->link('', array('controller' => 'events', 'action' => 'manage', $event['id']), array('class'=>'btn btn-xs btn-success fa fa-gears', 'style'=>'color:#000;width:25px; height:25px; padding-top:5px','data-toggle'=>'tooltip', 'data-placement'=>'right', 'title'=>'Manage Event', 'escape' => false, 'confirm' => __('Are you sure you want to manage this event - %s?', $course['Course']['code'].' (Start Date: '. $this->Time->format("d-m-Y h:i A", $event['start_date']).')'))); ?>
                    </td>
                    <td class="text-center sorting"><?php echo $this->Time->format('d-m-Y', $event['start_date']); ?></td>
                    <td class="text-center sorting"><?php echo $this->Time->format('d-m-Y', $event['end_date']); ?></td>
                    <td class="text-center sorting">
                      <?php echo $this->Time->format('h:i A', $event['start_date']).' - '.$this->Time->format('h:i A', $event['end_date']); ?>
                    </td>
                    <?php if ($event['active'] == 1) { ?>
                    <td class="text-center sorting">
                      <?php echo $this->Html->link($this->Form->button("<i class='fa fa-check'></i>", array('class'=>'btn btn-xs btn-success', 'style'=>'color:#000; width:25px; height:25px;','data-toggle'=>'tooltip', 'data-placement'=>'left', 'title'=>'Revert Scheduled Event')), array('controller' => 'events', 'action' => 'revert_scheduled_event', $event['id']), array('escape' => false)); ?>
                    </td>
                    <?php } else { ?>
                    <td class="text-center sorting">
                    <!-- <i class='fa fa-times bg-danger' style='color:#fff; width:25px; height:25px;padding:5px'></i>  -->
                    <?php echo $this->Html->link($this->Form->button("<i class='fa fa-times'></i>", array('class'=>'btn btn-xs btn-danger', 'style'=>'color:#000; width:25px; height:25px;','data-toggle'=>'tooltip', 'data-placement'=>'left', 'title'=>'Confirmed Schedule')), array('controller' => 'events', 'action' => 'confirmed_event', $event['id']), array('escape' => false)); ?>
                    </td>
                    <?php } ?>
                  </tr>
                    <?php endforeach; ?>
                    <?php }else{ ?>
                  <tr>
                    <td colspan="4" style="text-align:center;">No related events records found</td>
                  </tr>
                    <?php } ?>
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
            <?php //endif; ?>
         </div>
         <div class="tab-pane padder" id="StaffTrainingProfiles">
          <h3><?php echo __('Staff Training Profiles'); ?></h3>


          <?php if (!empty($course['StaffTrainingProfile'])): ?>
            <section class="panel panel-default padder">
              <div class="row wrapper">
                <div class="col-sm-5 m-b-xs">
                 <?php //echo $this->Html->link(' Create', array('controller' => 'staff_training_profiles', 'action' => 'add' ), array('class' => 'btn btn-default bg-success fa fa-plus', 'data-toggle'=>'ajaxModal', 'style'=>'color:#000;', 'escape' => false)); ?>

               </div>
             </div>
             <div class="table-responsive">
              <table class="table table-striped b-t b-light">
                <thead>
                  <tr>
                    <th class="actions"><?php echo __('Actions'); ?></th>
                    <th><?php echo __('Staff No'); ?></th>
                    <th><?php echo __('Name'); ?></th>
                    <th><?php echo __('Org Code'); ?></th>
                    <th><?php echo __('Start Date'); ?></th>
                    <th><?php echo __('End Date'); ?></th>
                    <th><?php echo __('Remarks'); ?></th>
                    <th><?php echo __('Status'); ?></th>
                    <th><?php echo __('Comment'); ?></th>
                    <th><?php echo __('Pte'); ?></th>
                  </tr>
                </thead>
                <tfoot>
                  <tr>
                    <th class="actions"><?php echo __('Actions'); ?></th>
                    <th><?php echo __('Staff No'); ?></th>
                    <th><?php echo __('Name'); ?></th>
                    <th><?php echo __('Org Code'); ?></th>
                    <th><?php echo __('Start Date'); ?></th>
                    <th><?php echo __('End Date'); ?></th>
                    <th><?php echo __('Remarks'); ?></th>
                    <th><?php echo __('Status'); ?></th>
                    <th><?php echo __('Comment'); ?></th>
                    <th><?php echo __('Pte'); ?></th>
                  </tr>
                </tfoot>

                <tbody>
                 <?php foreach ($course['StaffTrainingProfile'] as $staffTrainingProfile): ?>
                   <tr>
                     <td class="actions">
                      <?php echo $this->Html->link('', array('controller' => 'staff_training_profiles', 'action' => 'print_record', $staffTrainingProfile['id']), array('class'=>'btn btn-xs btn-success fa fa-print', 'style'=>'color:#000;width:25px; height:25px; padding-top:5px','data-toggle'=>'tooltip', 'data-placement'=>'right', 'title'=>'Print Training Details', 'target'=>'_blank', 'escape' => false)); ?>
                      <?php echo $this->Html->link('', array('controller' => 'staff_training_profiles', 'action' => 'edit', $staffTrainingProfile['id']), array('class'=>'btn btn-xs btn-warning fa fa-pencil', 'style'=>'color:#000;width:25px; height:25px; padding-top:5px','data-toggle'=>'tooltip', 'data-placement'=>'right', 'title'=>'Modify Details', 'data-toggle'=>'ajaxModal', 'escape' => false)); ?>
                    </td>
                    <td><?php echo $staffTrainingProfile['staff_no']; ?></td>
                    <td><?php echo $this->Html->link($staffTrainingProfile['name'], array('controller' => 'staffs', 'action' => 'view', $staffTrainingProfile['staff_id'])); ?></td>
                    <td><?php echo $staffTrainingProfile['org_code']; ?></td>
                    <td><?php echo $this->Time->format('d-m-Y', $staffTrainingProfile['start_date']); ?></td>
                    <td><?php echo $this->Time->format('d-m-Y', $staffTrainingProfile['end_date']); ?></td>
                    <td><?php echo $staffTrainingProfile['remarks']; ?></td>
                    <td><?php echo $staffTrainingProfile['status']; ?></td>
                    <td><?php echo $staffTrainingProfile['comment']; ?></td>
                    <td><?php echo $staffTrainingProfile['pte']; ?></td>
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
           <?php //echo $this->Html->link(' Create', array('controller' => 'staff_training_profiles', 'action' => 'add' ), array('class' => 'btn btn-default bg-success fa fa-plus', 'data-toggle'=>'ajaxModal', 'style'=>'color:#000;', 'escape' => false)); ?>

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
 </div>                                                    <div class="tab-pane padder" id="OrganizationCourses">
 <h3><?php echo __('Related Organization Courses'); ?></h3>


 <?php if (!empty($course['OrganizationCourse'])): ?>
  <section class="panel panel-default padder">
    <div class="row wrapper">
      <div class="col-sm-5 m-b-xs">
        <?php echo $this->Html->link(' Create', array('controller' => 'organization_courses', 'action' => 'add' ), array('class' => 'btn btn-default bg-success fa fa-plus', 'data-toggle'=>'ajaxModal', 'style'=>'color:#000;', 'escape' => false)); ?>

      </div>
    </div>
    <div class="table-responsive">
      <table class="table table-striped b-t b-light">
        <thead>
          <tr>
            <th><?php echo __('Actions'); ?></th>
            <th> Department / Unit</th>
          </tr>
        </thead>
        <tfoot>
          <tr>
            <th><?php echo __('Actions'); ?></th>
            <th> Department / Unit</th>

          </tr>
        </tfoot>

        <tbody>
          <?php foreach ($course['OrganizationCourse'] as $organizationCourse): ?>
            <tr>
              <td class="actions">
                <?php echo $this->Html->link('', array('controller' => 'organization_courses', 'action' => 'sneak', $organizationCourse['id']), array('class'=>'btn btn-xs btn-success fa fa-desktop', 'style'=>'color:#000;width:25px; height:25px; padding-top:5px','data-toggle'=>'tooltip', 'data-placement'=>'right', 'title'=>'View Details', 'data-toggle'=>'ajaxModal', 'escape' => false)); ?>
                <?php echo $this->Html->link('', array('controller' => 'organization_courses', 'action' => 'edit', $organizationCourse['id']), array('class'=>'btn btn-xs btn-warning fa fa-pencil', 'style'=>'color:#000;width:25px; height:25px; padding-top:5px','data-toggle'=>'tooltip', 'data-placement'=>'right', 'title'=>'Modify Details', 'data-toggle'=>'ajaxModal', 'escape' => false)); ?>
              </td>
              <td><?php 
                $myOrg = $this->requestAction(array('controller' => 'organizations', 'action' => 'object', $organizationCourse['organization_id']));

                echo $myOrg['Organization']['parent_code'].' - '.$myOrg['Organization']['name']; 
                ?></td>
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
        <?php echo $this->Html->link(' Create', array('controller' => 'organization_courses', 'action' => 'add' ), array('class' => 'btn btn-default bg-success fa fa-plus', 'data-toggle'=>'ajaxModal', 'style'=>'color:#000;', 'escape' => false)); ?>

      </div>
    </div>
  </div>
  <div class="tab-pane padder <?php echo ($myActive=='Trainers'?'active':''); ?>" id="Trainers">
    <h3><?php echo __('Related Trainers'); ?></h3>
      <section class="panel panel-default">
        <div class="row wrapper">
          <div class="col-sm-5 m-b-xs">
            <div class="btn-group">
              <button type="button" data-toggle="tooltip" data-placement="top" title="" data-original-title="Refresh" class="btn btn-sm btn-default" title="Refresh" onclick ='location.reload();'><i class="fa fa-refresh"></i>&nbsp;&nbsp;Refresh</button>
            </div>
         </div>
       </div>
       <div class="table-responsive">
        <table class="table table-striped b-t b-light">
          <thead>
            <tr>
              <!-- <th class="panel-body text-center" style="width:100px;"><?php echo __('Actions'); ?></th> -->
              <th><?php echo __('No'); ?></th>
              <th><?php echo __('Trainer Name'); ?></th>
              <th><?php echo __('Expertise Level'); ?></th>
            </tr>
          </thead>
          <tbody>
            <?php if (!empty($course['Trainer'])) { ?>
            <?php $count = 1; ?>
            <?php foreach ($course['Trainer'] as $trainer): ?>
              <?php 
                $myTrainer = $this->requestAction(array('controller' => 'staffs', 'action' => 'object', $trainer['staff_id']));
              ?>
                <tr>
                <td><?php echo $count; ?> </td>
                <td><?php echo (isset($myTrainer['Staff']['name']) ? $this->Html->link($myTrainer['Staff']['staff_no'].' - '.$myTrainer['Staff']['name'], array('controller' => 'staffs', 'action' => 'view', $myTrainer['Staff']['id'])) : ' - '); ?></td>
                <td>
                  <?php $expert = $this->requestAction('/rail_competency/expertise_levels/object/'.$trainer['expertise_level_id']); ?>
                  <?php echo $this->Html->link(' '.$expert['ExpertiseLevel']['name'], array('controller' => 'trainers', 'action' => 'edit_course', $trainer['id'], $trainer['course_id'], $trainer['staff_id']), array('class' => 'fa fa-pencil', 'style' => 'color:green', 'data-toggle' => 'ajaxModal')); ?>
                </td>

              </tr>
              <?php $count++; ?>
            <?php endforeach; ?>
            <?php }else{ ?>
              <tr>
                <td colspan="2" style="text-align:center;">No related trainers records found</td>
              </tr>
            <?php } ?>
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

