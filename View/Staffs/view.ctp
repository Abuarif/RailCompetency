<?php 
  if (!empty($this->request->named))
    $myActive = $this->request->named['tab'];
  else
    $myActive='dashboard';
?>

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
                <ul class="nav nav-tabs nav-white pull-left">
                  <li <?php echo ($myActive=='dashboard'?'class="active"':''); ?>><a href="#dashboard" data-toggle="tab">Dashboard</a></li>
                  <li <?php echo ($myActive=='event_attendances'?'class="active"':''); ?>><a href="#EventAttendances" data-toggle="tab">Event Attendances</a></li>
                  <li <?php echo ($myActive=='StaffQualifications'?'class="active"':''); ?>><a href="#StaffQualifications" data-toggle="tab"> Qualifications</a></li>
                  <li <?php echo ($myActive=='StaffCertifications'?'class="active"':''); ?>><a href="#StaffCertifications" data-toggle="tab"> Certifications</a></li>
                  <li <?php echo ($myActive=='StaffTrainingProfiles'?'class="active"':''); ?>><a href="#StaffTrainingProfiles" data-toggle="tab">Training Profiles</a></li>
                  <li <?php echo ($myActive=='StaffExternalTrainings'?'class="active"':''); ?>><a href="#StaffExternalTrainings" data-toggle="tab">External Training Profiles</a></li>
                  <li <?php echo ($myActive=='Trainers'?'class="active"':''); ?>><a href="#Trainers" data-toggle="tab">Course Trainer</a></li>
                </ul>

                <span class="hidden-sm">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-cog text-default"></i> Options <b class="caret"></b></a>
                  <ul class="dropdown-menu pull-right">
                    <li>
                      <?php echo $this->Html->link('<i class="fa fa-upload pull-left"></i>Upload Profile', array('action' => 'upload_profile', $staff['Staff']['id']), array('data-toggle' => 'ajaxModal', 'escape' => false)); ?>
                    </li>
                           
                  </ul>
                </span>
              </div>
            </header>
            <article class="scrollable">
              <div class="tab-content">
                <div class="tab-pane padder  <?php echo ($myActive=='dashboard'?'active':''); ?>" id="dashboard">
                  <section class="scrollable wrapper">
                    <section class="panel panel-default pos-rlt clearfix">
                      <header class="panel-heading">
                        <ul class="nav nav-pills pull-right">
                          <li>
                            <a href="#" class="panel-toggle text-muted"><i class="fa fa-caret-down text-active"></i><i class="fa fa-caret-up text"></i></a>
                          </li>
                        </ul>
                        Report Hierarchy
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
                              <?php echo h($staff['Staff']['parent_code']) . ' - ' . h($staff['Staff']['org_code']); ?>
                            </td>
                          </tr>
                          <tr>
                            <td style="height:25px;">
                              Staff
                            </td>
                            <td style="height:25px;">
                              :
                            </td>
                            <td>
                              <?php echo h($staff['Staff']['name']); ?>
                            </td>
                          </tr>
                          <?php if (!empty($staff['Staff']['files'])) { ?>
                           <tr>
                            <td style="height:25px;">
                              Staff Profile
                            </td>
                            <td style="height:25px;">
                              :
                            </td>
                            <td>
                              <?php if (!empty($staff['Staff']['files'])) { ?>
                              <?php echo $this->Html->link('<button class="btn btn-success fa fa-user pull-left"></button>', '/attachments/'.$staff['Staff']['files'], array('confirm' => 'Are you sure you wish to print the staff profile?', 'escape' => false, 'target' => '_blank', 'title' => 'Staff Profile')); ?>
                              <?php } ?>
                            </td>
                          </tr>
                          <?php } ?>
                        </table>
                      </div>
                    </section>

                    <section class="panel panel-default pos-rlt clearfix">
                      <header class="panel-heading">
                        <!-- <ul class="nav nav-pills pull-right">
                          <li>
                            <a href="#" class="panel-toggle text-muted"><i class="fa fa-caret-down text-active"></i><i class="fa fa-caret-up text"></i></a>
                          </li>
                        </ul> -->
                        <!-- <span class="hidden-sm pull-right">
                          <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-cog text-default"></i> Options <b class="caret"></b></a>
                          <ul class="dropdown-menu pull-right">
                            <li>
                              <?php //echo $this->Html->link('<i class="fa fa-share-square-o" style="padding-right:110px;"></i>Event Report', array('controller' => 'events', 'action' => 'view_report', $eventInfo[0]['Event']['id']), array('data-toggle'=>'ajaxModal','escape' => false)); ?>
                            </li>       
                          </ul>
                        </span> -->
                        Training History
                      </header>
                      <div class="panel-body clearfix">
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
                          <?php if(!empty($staff['StaffTrainingProfile'])) { ?>
                          <?php $count = 0; ?>
                          <?php foreach ($staff['StaffTrainingProfile'] as $profile): ?>
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
                  </section>
                </div>

                <div class="tab-pane padder" id="EventAttendances">
                  <h3><?php echo __('Related Event Attendances'); ?></h3>
                  <?php if (!empty($staff['EventAttendance'])): ?>
                    <section class="panel panel-default">
                      <div class="row wrapper">
                        <div class="col-sm-5 m-b-xs">
                          <div class="btn-group">
                            <button type="button" data-toggle="tooltip" data-placement="top" title="" data-original-title="Refresh" class="btn btn-sm btn-default" title="Refresh" onclick ='location.reload();'><i class="fa fa-refresh"></i>&nbsp;&nbsp;Refresh</button>
                          </div>
                          <?php echo $this->Html->link('<i class="fa fa-plus"></i>&nbsp;&nbsp;Create', array('controller' => 'event_attendances', 'action' => 'add' ), array('class' => 'btn btn-success btn-sm', 'data-toggle'=>'ajaxModal', 'style'=>'color:#000;', 'escape' => false)); ?>
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

                        <tbody>
                         <?php foreach ($staff['EventAttendance'] as $eventAttendance): ?>
                          <tr>
                           <td class="actions">
                            <?php echo $this->Html->link('', array('controller' => 'event_attendances', 'action' => 'sneak', $eventAttendance['id']), array('class'=>'btn btn-xs btn-success fa fa-desktop', 'style'=>'color:#000;width:25px; height:25px; padding-top:5px','data-toggle'=>'tooltip', 'data-placement'=>'right', 'title'=>'View Details', 'data-toggle'=>'ajaxModal', 'escape' => false)); ?>
                            <?php echo $this->Html->link('', array('controller' => 'event_attendances', 'action' => 'edit', $eventAttendance['id']), array('class'=>'btn btn-xs btn-warning fa fa-pencil', 'style'=>'color:#000;width:25px; height:25px; padding-top:5px','data-toggle'=>'tooltip', 'data-placement'=>'right', 'title'=>'Modify Details', 'data-toggle'=>'ajaxModal', 'escape' => false)); ?>
                          </td>
                          <td><?php echo $eventAttendance['event_id']; ?></td>
                          <!-- <td><?php //echo $eventAttendance['staff_id']; ?></td> -->
                          <td><?php echo $eventAttendance['signed_by']; ?></td>
                          <td><?php echo $eventAttendance['is_enrolled']; ?></td>
                          <td><?php echo $eventAttendance['is_completed']; ?></td>
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

      <div class="tab-pane padder <?php echo ($myActive=='StaffQualifications'?'active':''); ?>" id="StaffQualifications">
        <h3><?php echo __('Related Staff Qualifications'); ?></h3>
        <section class="panel panel-default">
          <div class="row wrapper">
            <div class="col-sm-5 m-b-xs">
              <div class="btn-group">
                <button type="button" data-toggle="tooltip" data-placement="top" title="" data-original-title="Refresh" class="btn btn-sm btn-default" title="Refresh" onclick ='location.reload();'><i class="fa fa-refresh"></i>&nbsp;&nbsp;Refresh</button>
              </div>
              <?php echo $this->Html->link('<i class="fa fa-plus"></i>&nbsp;&nbsp;Create', array('controller' => 'staff_qualifications', 'action' => 'add_qualification', $staff['Staff']['id']), array('class' => 'btn btn-success btn-sm', 'data-toggle'=>'ajaxModal', 'style'=>'color:#000;', 'escape' => false)); ?>
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
                </tr>
              </thead>
              <tbody>
                <?php if (!empty($staff['StaffQualification'])){ ?>
               <?php foreach ($staff['StaffQualification'] as $staffQualification): ?>
                <tr>
                  <td class="actions">
                  <?php echo $this->Form->postLink('', array('controller' => 'staff_qualifications', 'action' => 'delete', $staffQualification['id']), array('class'=>'btn btn-xs btn-danger fa fa-trash-o', 'style'=>'color:#000;width:25px; height:25px; padding-top:5px','data-toggle'=>'tooltip', 'data-placement'=>'right', 'title'=>'Delete Details', 'data-toggle'=>'ajaxModal', 'escape' => false, 'confirm' => 'Are you sure you want to delete this record?')); ?>
                  <?php echo $this->Html->link('', array('controller' => 'staff_qualifications', 'action' => 'sneak', $staffQualification['id']), array('class'=>'btn btn-xs btn-success fa fa-desktop', 'style'=>'color:#000;width:25px; height:25px; padding-top:5px','data-toggle'=>'tooltip', 'data-placement'=>'right', 'title'=>'View Details', 'data-toggle'=>'ajaxModal', 'escape' => false)); ?>
                  <?php echo $this->Html->link('', array('controller' => 'staff_qualifications', 'action' => 'edit', $staffQualification['id'], $staff['Staff']['id']), array('class'=>'btn btn-xs btn-warning fa fa-pencil', 'style'=>'color:#000;width:25px; height:25px; padding-top:5px','data-toggle'=>'tooltip', 'data-placement'=>'right', 'title'=>'Modify Details', 'data-toggle'=>'ajaxModal', 'escape' => false)); ?>
                  </td>
                  <td><?php echo $staffQualification['certificate_name']; ?></td>
                  <td><?php echo $this->Time->format('d-m-Y', $staffQualification['completed_on']); ?></td>
                  <td><?php echo $this->Time->format('d-m-Y', $staffQualification['updated']); ?></td>
                </tr>
              <?php endforeach; ?>
              <?php }else{ ?>
                <tr>
                  <td colspan="6" style="text-align: center;">No related staff qualification found.</td>
                </tr>
              <?php } ?>
              </tbody>
            </table>
          </div>
        </section>
      </div>

      <div class="tab-pane padder <?php echo ($myActive=='StaffCertifications'?'active':''); ?>" id="StaffCertifications">
        <h3><?php echo __('Related Staff Certifications'); ?></h3>
        <section class="panel panel-default">
          <div class="row wrapper">
            <div class="col-sm-5 m-b-xs">
              <div class="btn-group">
                <button type="button" data-toggle="tooltip" data-placement="top" title="" data-original-title="Refresh" class="btn btn-sm btn-default" title="Refresh" onclick ='location.reload();'><i class="fa fa-refresh"></i>&nbsp;&nbsp;Refresh</button>
              </div>
              <?php echo $this->Html->link('<i class="fa fa-plus"></i>&nbsp;&nbsp;Create', array('controller' => 'staff_certifications', 'action' => 'add_certificate', $staff['Staff']['id']  ), array('class' => 'btn btn-success btn-sm', 'data-toggle'=>'ajaxModal', 'style'=>'color:#000;', 'escape' => false)); ?>
            </div>
          </div>
          <div class="table-responsive">
            <table class="table table-striped b-t b-light">
              <thead>
                <tr>
                  <th>
                    <?php echo __('Name'); ?>
                  </th>
                  <th>
                    <?php echo __('Year'); ?>
                  </th>
                  <th>
                    <?php echo __('Status'); ?>
                  </th>
                  <th>
                    <?php echo __('Code'); ?>
                  </th>
                  <th>
                    <?php echo __('NOSS'); ?>
                  </th>
                  <th>
                    <?php echo __('Level'); ?>
                  </th>
                </tr>
              </thead>
              <tbody>
                <?php if (!empty($staff['StaffCertification'])){ ?>
               <?php foreach ($staff['StaffCertification'] as $staffCertification): ?>
                <tr>
                  <td><?php echo $staffCertification['name']; ?></td>
                  <td><?php echo $staffCertification['year']; ?></td>
                  <td><?php echo $staffCertification['status']; ?></td>
                  <td><?php echo $staffCertification['code']; ?></td>
                  <td><?php echo $staffCertification['noss']; ?></td>
                  <td><?php echo $staffCertification['level']; ?></td>
                </tr>
              <?php endforeach; ?>
              <?php }else{ ?>
                <tr>
                  <td colspan="6" style="text-align: center;">No related staff certification found.</td>
                </tr>
              <?php } ?>
              </tbody>
            </table>
          </div>
        </section>
      </div>

    <div class="tab-pane padder" id="StaffTrainingProfiles">
      <h3><?php echo __('Training Profiles'); ?></h3>

      <?php if (!empty($staff['StaffTrainingProfile'])): ?>
      <section class="panel panel-default">
        <div class="row wrapper">
          <div class="col-sm-5 m-b-xs">
          <!-- <div class="btn-group">
            <button type="button" data-toggle="tooltip" data-placement="top" title="" data-original-title="Refresh" class="btn btn-sm btn-default" title="Refresh" onclick ='location.reload();'><i class="fa fa-refresh"></i>&nbsp;&nbsp;Refresh</button>
          </div> -->
          <?php echo $this->Html->link('<i class="fa fa-print"></i>&nbsp;&nbsp;Print', array('controller' => 'staffs', 'action' => 'printout',$staff['Staff']['id']), array('class' => 'btn btn-success btn-sm', 'target'=>'_blank', 'escape' => false)); ?>

         </div>
         &nbsp;
        </div>
        <div class="table-responsive">
          <table class="table table-striped b-t b-light">
            <thead>
              <tr>
                <th> No </th>
                <th class="actions" style="text-align: center;"><?php echo __('Actions'); ?></th>
                <th style="text-align: center;">
                  <?php echo __('Course Code'); ?>
                </th>
                <th>
                  <?php echo __('Course Name'); ?>
                </th>
                <th style="text-align: center;">
                  <?php echo __('Start Date'); ?>
                </th>
                <th style="text-align: center;">
                  <?php echo __('End Date'); ?>
                </th>
                <th>
                  <?php echo __('Status'); ?>
                </th>
               <th>
                  <?php echo __('Pte'); ?>
                </th>
              </tr>
            </thead>

            <tbody>
              <?php $count = 1; ?>
             <?php foreach ($staff['StaffTrainingProfile'] as $staffTrainingProfile): ?>
             <?php 
              $myCourse = $this->requestAction('/rail_competency/courses/object/'.$staffTrainingProfile['course_id']);
             ?>
              <tr>
                <td> <?php echo $count; ?> </td>
               <td class="actions" style="text-align: center;">
                <?php //echo $this->Html->link('', array('controller' => 'staff_training_profiles', 'action' => 'sneak', $staffTrainingProfile['id']), array('class'=>'btn btn-xs btn-success fa fa-desktop', 'style'=>'color:#000;width:25px; height:25px; padding-top:5px','data-toggle'=>'tooltip', 'data-placement'=>'right', 'title'=>'View Details', 'data-toggle'=>'ajaxModal', 'escape' => false)); ?>
                <?php echo $this->Html->link('', array('controller' => 'staff_training_profiles', 'action' => 'edit', $staffTrainingProfile['id']), array('class'=>'btn btn-xs btn-warning fa fa-pencil', 'style'=>'color:#000;width:25px; height:25px; padding-top:5px','data-toggle'=>'tooltip', 'data-placement'=>'right', 'title'=>'Modify Details', 'data-toggle'=>'ajaxModal', 'escape' => false)); ?>
                <?php echo $this->Html->link('', array('controller' => 'staff_training_profiles', 'action' => 'print_record', $staffTrainingProfile['id']), array('class'=>'btn btn-xs btn-success fa fa-print', 'style'=>'color:#000;width:25px; height:25px; padding-top:5px','data-toggle'=>'tooltip', 'data-placement'=>'right', 'title'=>'Print Student Profile', 'target'=>'_blank', 'escape' => false)); ?>
              </td>
              <td style="text-align: center;"><?php echo $myCourse['Course']['code']; ?></td>
              <td>
                <?php 
                  $comment = '';
                  if ( !($staffTrainingProfile['comment'] == 'NIL'|| $staffTrainingProfile['comment'] == 'NO RECOMMENDATION') ) {
                    $comment = ' - '.$staffTrainingProfile['comment'] ;
                  }
                  echo $staffTrainingProfile['course_name'].$comment; 
                ?>
              </td>
              <td style="text-align: center;"><?php echo $this->Time->format($staffTrainingProfile['start_date'], '%d-%m-%Y'); ?></td>
              <td style="text-align: center;"><?php echo $this->Time->format($staffTrainingProfile['end_date'], '%d-%m-%Y'); ?></td>
              <td><?php echo $staffTrainingProfile['status']; ?></td>
              <td><?php echo $staffTrainingProfile['pte']; ?></td>
            </tr>
            <?php $count ++; ?>
            <?php endforeach; ?>
              <tr>
              </tr>
            </tbody>
          </table>
        </div>
      </section>
      <?php endif; ?>
    </div>


    <div class="tab-pane padder" id="StaffExternalTrainings">
      <h3><?php echo __('External Training Profiles'); ?></h3>

      <?php if (!empty($staff['StaffExternalTraining'])): ?>
      <section class="panel panel-default">
        <div class="row wrapper">
          <div class="col-sm-5 m-b-xs">
          <!-- <div class="btn-group">
            <button type="button" data-toggle="tooltip" data-placement="top" title="" data-original-title="Refresh" class="btn btn-sm btn-default" title="Refresh" onclick ='location.reload();'><i class="fa fa-refresh"></i>&nbsp;&nbsp;Refresh</button>
          </div> -->
          <?php echo $this->Html->link('<i class="fa fa-print"></i>&nbsp;&nbsp;Print', array('controller' => 'staffs', 'action' => 'external_printout',$staff['Staff']['id']), array('class' => 'btn btn-success btn-sm', 'target'=>'_blank', 'escape' => false)); ?>

         </div>
         &nbsp;
        </div>
        <div class="table-responsive">
          <table class="table table-striped b-t b-light">
            <thead>
              <tr>
                <th> No</th>
                <th>
                  <?php echo __('Course Name'); ?>
                </th>
                <th>
                  <?php echo __('Training Provider'); ?>
                </th>
                <th style="text-align: center;">
                  <?php echo __('Start Date'); ?>
                </th>
                <th style="text-align: center;">
                  <?php echo __('End Date'); ?>
                </th>
              </tr>
            </thead>

            <tbody>
              <?php $count = 1; ?>
             <?php foreach ($staff['StaffExternalTraining'] as $staffTrainingProfile): ?>
             <tr>
              <td><?php echo $count; ?></td>
              <!-- <tr>
               <td class="actions" style="text-align: center;">
                <?php echo $this->Html->link('', array('controller' => 'staff_training_profiles', 'action' => 'sneak', $staffTrainingProfile['id']), array('class'=>'btn btn-xs btn-success fa fa-desktop', 'style'=>'color:#000;width:25px; height:25px; padding-top:5px','data-toggle'=>'tooltip', 'data-placement'=>'right', 'title'=>'View Details', 'data-toggle'=>'ajaxModal', 'escape' => false)); ?>
                <?php echo $this->Html->link('', array('controller' => 'staff_training_profiles', 'action' => 'edit', $staffTrainingProfile['id']), array('class'=>'btn btn-xs btn-warning fa fa-pencil', 'style'=>'color:#000;width:25px; height:25px; padding-top:5px','data-toggle'=>'tooltip', 'data-placement'=>'right', 'title'=>'Modify Details', 'data-toggle'=>'ajaxModal', 'escape' => false)); ?>
              </td> -->
              <!-- <td style="text-align: center;"><?php echo $staffTrainingProfile['staff_no']; ?></td> -->
              <!-- <td><?php echo $staffTrainingProfile['name']; ?></td> -->
              <!-- <td><?php //echo $staffTrainingProfile['parent_code']; ?></td> -->
              <!-- <td><?php //echo $staffTrainingProfile['org_code']; ?></td> -->
              <!-- <td><?php //echo $staffTrainingProfile['course_id']; ?></td> -->
              <!-- <td style="text-align: center;"><?php echo $staffTrainingProfile['code']; ?></td> -->
              <td><?php echo $staffTrainingProfile['course_name']; ?></td>
              <td><?php echo $staffTrainingProfile['training_provider']; ?></td>
              <td style="text-align: center;"><?php echo $this->Time->format($staffTrainingProfile['start_date'], '%d-%m-%Y'); ?></td>
              <td style="text-align: center;"><?php echo $this->Time->format($staffTrainingProfile['end_date'], '%d-%m-%Y'); ?></td>
              <!-- <td><?php //echo $staffTrainingProfile['duration']; ?></td> -->
              <!-- <td><?php //echo $staffTrainingProfile['remarks']; ?></td> -->
              <!-- <td><?php echo $staffTrainingProfile['status']; ?></td> -->
              <!-- <td><?php //echo $staffTrainingProfile['theory']; ?></td> -->
              <!-- <td><?php //echo $staffTrainingProfile['practical']; ?></td> -->
              <!-- <td><?php //echo $staffTrainingProfile['doc']; ?></td> -->
              <!-- <td><?php echo $staffTrainingProfile['comment']; ?></td> -->
              <!-- <td><?php echo $staffTrainingProfile['pte']; ?></td> -->
              <!-- <td><?php //echo $staffTrainingProfile['active']; ?></td> -->
            </tr>
            <?php $count ++; ?>
            <?php endforeach; ?>
              <tr>
              </tr>
            </tbody>
          </table>
        </div>
      </section>
      <?php endif; ?>
    </div>

<div class="tab-pane padder <?php echo ($myActive=='Trainers'?'active':''); ?>" id="Trainers">
      <h3><?php echo __('Related Course Trainers'); ?></h3>

        <section class="panel panel-default">
          <div class="row wrapper">
            <div class="col-sm-5 m-b-xs">
            <div class="btn-group">
              <button type="button" data-toggle="tooltip" data-placement="top" title="" data-original-title="Refresh" class="btn btn-sm btn-default" title="Refresh" onclick ='location.reload();'><i class="fa fa-refresh"></i>&nbsp;&nbsp;Refresh</button>
            </div>
            <?php echo $this->Html->link('<i class="fa fa-plus"></i>&nbsp;&nbsp;Create', array('controller' => 'trainers', 'action' => 'add_trainer', $staff['Staff']['id'] ), array('class' => 'btn btn-success btn-sm', 'data-toggle'=>'ajaxModal', 'style'=>'color:#000;', 'escape' => false)); ?>

           </div>
         </div>
      <?php if (!empty($staff['Trainer'])): ?>
         
         <div class="table-responsive">
          <table class="table table-striped b-t b-light">
            <thead>
              <tr>
                <th class="actions" style="text-align: center;"><?php echo __('Actions'); ?></th>
                
                <th style="text-align: center;">
                  <?php echo __('Course Code'); ?>
                </th>
                <th>
                  <?php echo __('Course Name'); ?>
                </th>
                <th>
                  <?php echo __('Expertise Level'); ?>
                </th>
                
              </tr>
            </thead>

            <tbody>
             <?php foreach ($staff['Trainer'] as $training): ?>
             <?php
              // get course Details
              $course = $this->requestAction('/rail_competency/courses/object/'.$training['course_id']);
             ?>
              <tr>
               <td class="actions" style="text-align: center;">
                <?php //echo $this->Html->link('', array('controller' => 'staff_training_profiles', 'action' => 'sneak', $training['id']), array('class'=>'btn btn-xs btn-success fa fa-desktop', 'style'=>'color:#000;width:25px; height:25px; padding-top:5px','data-toggle'=>'tooltip', 'data-placement'=>'right', 'title'=>'View Details', 'data-toggle'=>'ajaxModal', 'escape' => false)); ?>
                <?php echo $this->Form->postLink('', array('controller' => 'trainers', 'action' => 'remove', $training['id'], $staff['Staff']['id']), array('class'=>'btn btn-xs btn-warning fa fa-trash-o', 'style'=>'color:#000;width:25px; height:25px; padding-top:5px','data-toggle'=>'tooltip', 'data-placement'=>'right', 'title'=>'Remove', 'escape' => false, 'confirm' => 'Are you sure you wish to remove this entry?')); ?>
              </td>
              <td style="text-align: center;"><?php echo $course['Course']['code']; ?></td>
              <td><?php echo  $this->Html->link($course['Course']['name'], array('controller' => 'courses', 'action' => 'view', $course['Course']['id'])); ?></td>
              <td>
                <?php $expert = $this->requestAction('/rail_competency/expertise_levels/object/'.$training['expertise_level_id']); ?>
                <?php echo $this->Html->link(' '.$expert['ExpertiseLevel']['name'], array('controller' => 'trainers', 'action' => 'edit_staff', $training['id'], $training['course_id'], $training['staff_id']), array('class' => 'fa fa-pencil', 'style' => 'color:green', 'data-toggle' => 'ajaxModal')); ?>
              </td>
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

