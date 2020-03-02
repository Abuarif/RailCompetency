<ul class="breadcrumb no-border no-radius b-b b-light pull-in">
    <li><a href="<?php echo $this->webroot; ?>"><i class="fa fa-home"></i>&nbsp;Home</a></li>
    <li class="active"><?php echo __('Event Attendance'); ?> List</li>
</ul>

<?php echo $this->Layout->sessionFlash(); ?>

<div class="m-b-md">
    <h3 class="m-b-none"><?php echo __('Event Attendance'); ?> List</h3>
</div>
<section class="panel panel-default">
    <div class="row wrapper">
        <div class="col-sm-4 m-b-xs">
            <div class="btn-group">
                <button type="button" data-toggle="tooltip" data-placement="top" title=""
                    data-original-title="Refresh" class="btn btn-sm btn-default" title="Refresh"
                    onclick='location.reload();'><i class="fa fa-refresh"></i></button>
            </div>
            <?php echo $this->Html->link('<i class="fa fa-plus"></i>  Create', array('action' => 'add'), array('class' => 'btn btn-success btn-sm', 'data-toggle'=>'ajaxModal', 'escape' => false)); ?>
        </div>
        <div class="col-sm-4 m-b-xs">
            &nbsp;
        </div>
        <div class="col-lg-4 m-b-xs text-right pull-right">
            <button type="button" class="btn btn-dark btn-sm" data-toggle="modal" data-target="#myModal">
                <i class="fa fa-search"></i>&nbsp;&nbsp;Advanced Search
            </button>
        </div>
        <!-- Modal -->
        <?php echo $this->Form->create('EventAttendance', array('class' => 'form-inline','inputDefaults' => array('label' => false, 'div' => false))); ?>
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header" style="text-align:center;">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Advanced Search</h4>
                    </div>
                    <div class="modal-body">

                        <label>Service Line</label>
                        <?php echo $this->Form->input('EventAttendance.service_id', array('options' => $services, 'class' => 'form-control input-s-sm inline v-middle', 'empty' => '(choose one)')); ?>

                        <br><br>

                        <label>Start Date</label>
                        <?php
                          echo $this->Form->input('start_date', array('class' => 'datepicker-input form-control', 'data-date-format' => 'dd-mm-yyyy', 'type' => 'text', 'style' => 'width:100%;', 'label' => false, 'placeholder' => 'Start Date'));
                        ?>

                        <br><br>

                        <label>End Date</label>
                        <?php
                          echo $this->Form->input('end_date', array('class' => 'datepicker-input form-control', 'data-date-format' => 'dd-mm-yyyy', 'type' => 'text', 'style' => 'width:100%;', 'label' => false, 'placeholder' => 'End Date'));
                        ?>

                        <br><br>

                        <label>Course Code</label>
                        <?php echo $this->Form->input('queryString', array('class' => 'form-control', 'style' => 'width:100%;', 'placeholder' => 'Course Code')); ?>

                        <br><br>

                        <?php echo $this->Form->checkbox('active', array('data-toggle'=>'tooltip', 'data-placement'=>'bottom', 'title'=>'Click here to view confirmed events.')); ?>&nbsp;Active
                        Event

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <?php echo $this->Form->button('Search', array('class' => 'btn btn-dark'));?>
                    </div>
                </div>
            </div>
        </div>
        <?php echo $this->Form->end();?>
        <!-- End Modal -->
    </div>
    </div>
    <div class="table-responsive">
        <table class="table table-striped b-t b-light">
            <thead>
                <tr>
                    <th class="col-md-2 text-center sorting"><?php echo __('Actions'); ?></th>
                    <th><?php echo $this->Paginator->sort('event_id'); ?></th>
                    <th><?php echo $this->Paginator->sort('staff_id'); ?></th>
                    <th><?php echo $this->Paginator->sort('signed_by'); ?></th>
                    <th><?php echo $this->Paginator->sort('isEnrolled'); ?></th>
                    <th><?php echo $this->Paginator->sort('isCompleted'); ?></th>
                    <!-- <th><?php echo $this->Paginator->sort('notes'); ?></th> -->
                    <!-- <th><?php echo $this->Paginator->sort('active'); ?></th> -->
                </tr>
            </thead>
            <tbody>
                <?php foreach ($eventAttendances as $eventAttendance): ?>
                <?php if (!empty($eventAttendance['Staff']['name'])) { ?>
                <tr>
                    <td class="actions">
                        <?php echo $this->Html->link($this->Form->button('<i class="fa fa-trash-o"></i>', array('class'=>'btn btn-xs btn-danger', 'style'=>'color:#000; width:25px; height:25px;','data-toggle'=>'tooltip', 'data-placement'=>'right', 'title'=>'Trash')), array('action' => 'delete', $eventAttendance['EventAttendance']['id']), array('escape' => false)); ?>
                        <?php echo $this->Html->link($this->Form->button('<i class="fa fa-desktop"></i>', array('class'=>'btn btn-xs btn-success', 'style'=>'color:#000; width:25px; height:25px;','data-toggle'=>'tooltip', 'data-placement'=>'right', 'title'=>'View Details')), array('action' => 'view', $eventAttendance['EventAttendance']['id']), array('escape' => false)); ?>
                        <?php echo $this->Html->link($this->Form->button('<i class="fa fa-gears"></i>', array('class'=>'btn btn-xs btn-success', 'style'=>'color:#000; width:25px; height:25px;','data-toggle'=>'tooltip', 'data-placement'=>'right', 'title'=>'Manage Event')), array('controller' => 'events', 'action' => 'manage', $eventAttendance['Event']['id']), array('escape' => false)); ?>
                        <?php echo $this->Html->link($this->Form->button('<i class="fa fa-pencil"></i>', array('class'=>'btn btn-xs btn-warning', 'style'=>'color:#000; width:25px; height:25px;','data-toggle'=>'tooltip', 'data-placement'=>'right', 'title'=>'Modify Details')), array('action' => 'edit', $eventAttendance['EventAttendance']['id']), array('data-toggle'=>'ajaxModal', 'escape' => false)); ?>
                    </td>
                    <td>
                        <?php 
                          $myEvent = $this->requestAction('/rail_competency/events/object/'.$eventAttendance['Event']['id']);
                          $myCourse = $this->requestAction('/rail_competency/courses/object/'.$myEvent['Event']['course_id']);
                        ?>
                        <?php echo $this->Html->link($myCourse['Course']['name'].' '.$myEvent['Event']['details'], array('controller' => 'events', 'action' => 'attendance', $eventAttendance['Event']['id'])); ?>
                    </td>
                    <td>
                        <?php echo $this->Html->link($eventAttendance['Staff']['name'], array('controller' => 'staffs', 'action' => 'view', $eventAttendance['Staff']['id'])); ?>
                    </td>
                    <td>
                    <?php
                      $myStaff = $this->requestAction('/rail_competency/staffs/object/'.$eventAttendance['EventAttendance']['signed_by']);
                      if (empty($myStaff)) $myStaff = array('Staff' => array('name' => 'Admin'));
                    ?>
                    <?php echo h($myStaff['Staff']['name']); ?>&nbsp;
                    </td>
                    <!-- <td><?php echo h($eventAttendance['EventAttendance']['is_enrolled']); ?>&nbsp;</td> -->
                    <?php if ($eventAttendance['EventAttendance']['is_enrolled'] == 1) { ?>
                    <td><i class='fa fa-check bg-success' style='color:#fff; width:25px; height:25px;padding:5px'></i>
                        &nbsp;</td>
                    <?php } else { ?>
                    <td><i class='fa fa-times bg-danger' style='color:#fff; width:25px; height:25px;padding:5px'></i>
                        &nbsp;</td>
                    <?php } ?>
                    <!-- <td><?php echo h($eventAttendance['EventAttendance']['is_completed']); ?>&nbsp;</td> -->
                    <?php if ($eventAttendance['EventAttendance']['is_completed'] == 1) { ?>
                    <td><i class='fa fa-check bg-success' style='color:#fff; width:25px; height:25px;padding:5px'></i>
                        &nbsp;</td>
                    <?php } else { ?>
                    <td><i class='fa fa-times bg-danger' style='color:#fff; width:25px; height:25px;padding:5px'></i>
                        &nbsp;</td>
                    <?php } ?>
                    <!-- <td><?php echo h($eventAttendance['EventAttendance']['notes']); ?>&nbsp;</td> -->
                    <?php // if ($eventAttendance['EventAttendance']['active'] == 1) { ?>
                    <!-- <td><i class='fa fa-check bg-success' style='color:#fff; width:25px; height:25px;padding:5px'></i> &nbsp;</td> -->
                    <?php //} else { ?>
                    <!-- <td><i class='fa fa-times bg-danger' style='color:#fff; width:25px; height:25px;padding:5px'></i> &nbsp;</td> -->
                    <?php //} ?>
                </tr>
                <?php } ?>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <footer class="panel-footer">
        <div class="row">
            <div class="col-lg-6">
                <?php
                  echo $this->Paginator->counter(array(
                    'format' => __('Showing {:start} to {:end} of {:count} entries')
                    ));
                ?>
            </div>
            <div class="col-lg-6" style="text-align:right;">
                <ul class="pagination pagination-sm m-t-none m-b-none">
                    <?php
                      echo '<li>'.$this->Paginator->first('First', array(), null, array('class' => 'prev disabled')).'</li>';
                      echo '<li>'.$this->Paginator->prev('Previous', array(), null, array('class' => 'prev disabled')).'</li>';
                      echo '<li>'.$this->Paginator->numbers(array('separator' => '</li>
                        <li>')).'</li>';
                      echo '<li>'.$this->Paginator->next('Next', array(), null, array('class' => 'next disabled')).'</li>';
                      echo '<li>'.$this->Paginator->last('Last', array(), null, array('class' => 'next disabled')).'</li>';
                    ?>
                </ul>
            </div>
        </div>
    </footer>
</section>