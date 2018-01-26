<link rel="stylesheet" type="text/css" href="/theme/LamanPuteri/js/datatables/datatables.css">

        <ul class="breadcrumb no-border no-radius b-b b-light pull-in">
        <li><a href="<?php echo $this->webroot; ?>"><i class="fa fa-home"></i> Home</a></li>
          <li class="active"><?php echo __('Staff'); ?> List</li>
        </ul>
        <div class="m-b-md">
          <h3 class="m-b-none"><?php echo __('Staff'); ?> List</h3>
        </div>

        <div class="row wrapper">
          <div class="col-sm-5 m-b-xs">
            <div class="btn-group">
              <button type="button" class="btn btn-sm btn-default" title="Refresh" onclick ='location.reload();'><i class="fa fa-refresh"></i>&nbsp;&nbsp;Refresh</button>
            </div>
            <?php echo $this->Html->link('<i class="fa fa-plus"></i>&nbsp;&nbsp;Create', array('action' => 'add'), array('class' => 'btn btn-sm btn-success', 'data-toggle'=>'ajaxModal', 'escape' => false)); ?>
            <?php //echo $this->Html->link(' Staff Data',array('action'=>'export', $queryString), array('target'=>'_blank', 'class' => 'btn btn-warning fa fa-download','escape' => false,'data-toggle'=>'tooltip', 'data-placement'=>'right', 'title'=>'Download Staff Data'));?>
          </div>
          <div class="col-sm-4 m-b-xs">
            &nbsp;
          </div>
          <div class="col-sm-3">
            &nbsp;

        </div>
        </div>
        <section class="panel panel-default">
            
        <div class="table-responsive">
          <table id="datatable" class="table table-striped b-t b-light">
            <thead>
              <tr>
                <th class="text-center sorting">
                  <?php echo __('Actions'); ?>
                </th>
                <th class="text-center sorting">
                  Staff Id ?>            						
                </th>
                <th>
                  Name                      
                </th>
                <th class="text-center sorting">
                  Position           						
                </th>
                <th>
                  Parent Code          						
                </th>
                <th>
                  org Code           						
                </th>
                <th class="text-center sorting">
                  NRIC          						
                </th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($staffs as $staff): ?>
                 <tr>
                  <td class="text-center sorting">
                    <?php 
                      $myRecord = $this->requestAction('/rail_competency/staff_training_profiles/check_record/'.$staff['Staff']['id']);
                      if (!$myRecord) {
                    ?>
                      <?php 
                        echo $this->Form->postLink($this->Form->button('<i class="fa fa-trash-o"></i>', array('class'=>'btn btn-xs btn-danger', 'style'=>'color:#000; width:25px; height:25px;','data-toggle'=>'tooltip', 'data-placement'=>'right', 'title'=>'Remove')), array('controller' => 'staffs', 'action' => 'delete', $staff['Staff']['id']), array('escape' => false, 'confirm' => __('Are you sure you want to delete it?'))); 
                      ?>
                    <?php } ?>

                   <?php 
                   //echo $this->Html->link($this->Form->button('<i class="fa fa-trash-o"></i>', array('class'=>'btn btn-xs btn-danger', 'style'=>'color:#000; width:25px; height:25px;','data-toggle'=>'tooltip', 'data-placement'=>'right', 'title'=>'Calendar')), array('action' => 'delete', $staff['Staff']['id']), array('escape' => false, 'confirm' => __('Are you sure you want to delete it?'))); ?>
                   <?php echo $this->Html->link($this->Form->button('<i class="fa fa-desktop"></i>', array('class'=>'btn btn-xs btn-success', 'style'=>'color:#000; width:25px; height:25px;','data-toggle'=>'tooltip', 'data-placement'=>'right', 'title'=>'View Details')), array('action' => 'view', $staff['Staff']['id']), array('escape' => false)); ?>
                   <?php echo $this->Html->link($this->Form->button('<i class="fa fa-pencil"></i>', array('class'=>'btn btn-xs btn-warning', 'style'=>'color:#000; width:25px; height:25px;','data-toggle'=>'tooltip', 'data-placement'=>'right', 'title'=>'Modify Details')), array('action' => 'edit', $staff['Staff']['id']), array('data-toggle'=>'ajaxModal', 'escape' => false)); ?>
                 </td>
                 <!-- <td>
                   <?php echo $this->Html->link($staff['Organization']['name'], array('controller' => 'organizations', 'action' => 'view', $staff['Organization']['id'])); ?>
                 </td> -->
                 <!-- <td>
                   <?php //echo $this->Html->link($staff['ParentStaff']['name'], array('controller' => 'staffs', 'action' => 'view', $staff['ParentStaff']['id'])); ?>
                 </td> -->
                 <!-- <td>
                   <?php //echo $this->Html->link($staff['User']['name'], array('controller' => 'users', 'action' => 'view', $staff['User']['id'])); ?>
                 </td> -->
                 <td class="text-center sorting"><?php echo h($staff['Staff']['staff_no']); ?>&nbsp;</td>
                 <td><?php echo h($staff['Staff']['name']); ?>&nbsp;</td>
                 <td class="text-center sorting">
                   <?php echo $this->Html->link($staff['Position']['name'], array('controller' => 'positions', 'action' => 'view', $staff['Position']['id'])); ?>
                 </td>
                 <td><?php echo h($staff['Staff']['parent_code']); ?>&nbsp;</td>
                 <td><?php echo h($staff['Staff']['org_code']); ?>&nbsp;</td> 
                 <td class="text-center sorting"><?php echo h($staff['Staff']['NRIC']); ?>&nbsp;</td>
                 <!-- <td><?php //echo h($staff['Staff']['details']); ?>&nbsp;</td> -->
                 <!-- <td><?php //echo h($staff['Staff']['isTrainer']); ?>&nbsp;</td> -->
                 <?php //if ($staff['Staff']['active'] == 1) { ?>
                 <!-- <td><i class='fa fa-check bg-success' style='color:#fff; width:25px; height:25px;padding:5px'></i> &nbsp;</td> -->
                 <?php //} else { ?>
                 <!-- <td><i class='fa fa-times bg-danger' style='color:#fff; width:25px; height:25px;padding:5px'></i> &nbsp;</td> -->
                 <?php //} ?>
                 <!-- <td><?php //echo h($staff['Staff']['lft']); ?>&nbsp;</td> -->
                 <!-- <td><?php //echo h($staff['Staff']['rght']); ?>&nbsp;</td> -->
               </tr>
             <?php endforeach; ?>
           </tbody>
         </table>
       </div>
    </section>

<script type="text/javascript" src="/theme/LamanPuteri/js/datatables/custom.js"></script>
<script type="text/javascript" src="/theme/LamanPuteri/js/datatables/dataTables.bootstrap.js"></script>
<script type="text/javascript" src="/theme/LamanPuteri/js/datatables/jquery.dataTables.min.js"></script>


