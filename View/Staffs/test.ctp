          <ul class="breadcrumb no-border no-radius b-b b-light pull-in">
            <li><a href="<?php echo $this->webroot; ?>"><i class="fa fa-home"></i> Home</a></li>
            <li><a href="<?php echo $this->webroot; ?>/rail_competency/staffs"><i class="fa fa-book"></i> Staff List</a></li>
            <li class="active">Staff's Details</li>
          </ul>
          <div class="m-b-md">
            <h3 class="m-b-none"><?php echo __('Staff'); ?>'s Details</h3>
          </div>
          <section class="panel panel-default">
            <header class="panel-heading text-right bg-light dker bg-gradient" style="height:auto">
              <div>
                <ul class="nav nav-tabs nav-white">
                  <li class="active"><a href="#dashboard" data-toggle="tab">Dashboard</a></li>
                  <li><a href="#EventAttendances" data-toggle="tab">Event Attendances</a></li>
                  <li><a href="#StaffQualifications" data-toggle="tab">Staff Qualifications</a></li>
                  <li><a href="#StaffTrainingProfiles" data-toggle="tab">Staff Training Profiles</a></li>
                </ul>
              </div>
            </header>
            <article class="scrollable">
              <div class="tab-content">
                <div class="tab-pane padder active" id="dashboard">
                  <section class="scrollable wrapper">
                    <section class="panel panel-default pos-rlt clearfix">
                      <header class="panel-heading">
                        <ul class="nav nav-pills pull-right">
                          <li>
                            <a href="#" class="panel-toggle text-muted"><i class="fa fa-caret-down text-active"></i><i class="fa fa-caret-up text"></i></a>
                          </li>
                        </ul>
                        Report Hierarchy Info ( <?php echo $staff['Staff']['name']?> )
                      </header>
                      <div class="panel-body clearfix">
                        <table width="100%">
                          <tr>
                            <td style="width:8%;height:25px;">
                              Organization
                            </td>
                            <td style="width:2%;height:25px;">
                              :
                            </td>
                            <td>
                              <?php echo h($staff['Organization']['parent_code']) . ' - ' . h($staff['Organization']['org_code']); ?>
                            </td>
                          </tr>
                          <tr>
                            <td style="height:25px;">
                              Supervisor
                            </td>
                            <td style="height:25px;">
                              :
                            </td>
                            <td>
                              <?php echo h($staff['ParentStaff']['name']); ?>
                            </td>
                          </tr>
                        </table>
                      </div>
                    </section>

                    <div class="timeline">
                      <article class="timeline-item active">
                          <div class="timeline-caption">
                            <div class="panel bg-primary lter no-borders">
                              <div class="panel-body" style="text-align: center;">
                                <span class="timeline-icon"><i class="fa fa-list time-icon bg-primary"></i></span> 
                                <h5>
                                  Training History
                                </h5>
                              </div>
                            </div>
                          </div>
                      </article>
                      <?php 
                        if(!empty($staff['StaffTrainingProfile'])) { 
                          // get training profile order by year 
                          $years = $this->requestAction('/rail_competency/staff_training_profiles/list_year/'.$staff['Staff']['id']);
                          // pr($years);
                          foreach ($years as $year) {
                            echo $year[0]['year'];
                            $profiles = $this->requestAction('/rail_competency/staff_training_profiles/profiles/'.$staff['Staff']['id'].'/'. $year[0]['year']);
                            pr($profiles);
                          }
                          // echo 'staff_id: '.$staff['Staff']['id'];
                        ?>
                      <?php $count = 0; ?>
                      <?php foreach ($staff['StaffTrainingProfile'] as $profile): ?>
                      <?php //foreach ($profiles as $profile): ?>
                      <?php 

                        if($count%2 == 0)
                        {
                          $class = 'arrow left';
                          $item = '';
                          $bg = 'bg-dark';
                        }else{
                          $class = 'arrow right';
                          $item = 'alt';
                          $bg = 'bg-info';
                        }
                      ?>
                      
                      <article class="timeline-item <?php echo $item; ?>">
                        <div class="timeline-caption">
                          <div class="panel panel-default">
                            <div class="panel-body">
                              <span class="<?php echo $class; ?>"></span>
                              <span class="timeline-icon"><i class="fa fa-file-text time-icon <?php echo $bg; ?>"></i></span>
                              <span class="timeline-date"><?php echo $this->Time->format('d-m-Y', $profile['start_date']); ?></span>
                              <h5>
                                <span><?php echo $profile['code'] ?></span>
                                <?php echo $profile['course_name'] ?>
                              </h5>
                            </div>       
                          </div>
                        </div>
                      </article>
                      <?php $count++; ?>
                      <?php endforeach; ?>
                      
                      <?php }else{ ?>
                      
                      <article class="timeline-item">
                          <div class="timeline-caption">
                            <div class="panel panel-default">
                              <div class="panel-body">
                                <span class="arrow left"></span>
                                <span class="timeline-icon"><i class="fa fa-bullhorn time-icon bg-info"></i></span>
                                <span class="timeline-date"><?php echo date('d-m-Y'); ?></span>
                                <h5>
                                  To be announced.
                                </h5>
                              </div>
                            </div>
                          </div>
                      </article>
                      <?php } ?>
                      <div class="timeline-footer"><a href="#"><i class="fa fa-plus time-icon inline-block bg-dark"></i></a></div>
                    </div>
                  </section>
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
   </div>
</div>
</div><!-- end tab content div -->
</article> <!-- end tab content article-->
</section>

