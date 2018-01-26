
<style type="text/css">
    table { page-break-inside:auto }
    tr    { page-break-inside:avoid; page-break-after:auto }
    thead { display:table-header-group }
    tfoot { display:table-footer-group }
</style>


<script>
  // window.print(); 
  setTimeout(function () { window.print(); }, 500);
  window.onfocus = function () { setTimeout(function () { window.close(); }, 500); }
</script>

<div class="tab-pane padder" id="StaffTrainingProfiles">
  <h3><?php echo __('External Training Profiles'); ?></h3>

  <?php if (!empty($staff['StaffTrainingProfile'])): ?>
  <section class="panel panel-default">
    <div class="row wrapper">
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
              Staff Number
            </td>
            <td style="height:25px;">
              :
            </td>
            <td>
              <?php echo h($staff['Staff']['staff_no']); ?>
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
        </table>
      </div>
    </div>
    <!-- <div class="table-responsive"> -->
      <table class="table table-striped b-t b-light">
        <thead>
          <tr>
            <!-- <th class="actions" style="text-align: center;"><?php echo __('Actions'); ?></th> -->
            <th style="text-align: center;">
              #
            </th>
           <!--  <th>
              <?php echo __('Name'); ?>
            </th> -->
           <!--  <th>
              <?php //echo __('Parent Code'); ?>
            </th>
            <th>
              <?php //echo __('Org Code'); ?>
            </th> -->
            <!-- <th>
              <?php //echo __('Course Id'); ?>
            </th> -->
            <!-- <th style="text-align: center;">
              <?php echo __('Course Code'); ?>
            </th> -->
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
            <!-- <th>
              <?php ///echo __('Duration'); ?>
            </th> -->
            <!-- <th>
              <?php //echo __('Remarks'); ?>
            </th> -->
            <!-- <th>
              <?php echo __('Status'); ?>
            </th> -->
           <!--  <th>
              <?php //echo __('Theory'); ?>
            </th>
            <th>
              <?php //echo __('Practical'); ?>
            </th> -->
            <!-- <th>
              <?php //echo __('Doc'); ?>
            </th>
            <th>
              <?php echo __('Comment'); ?>
            </th>-->
           <!--  <th>
              <?php echo __('Pte'); ?>
            </th> -->
            <!-- <th>
              <?php //echo __('Active'); ?>
            </th> -->
          </tr>
        </thead>

        <tbody>
          <?php 
            $count = 1;
          ?>
         <?php foreach ($staff['StaffExternalTraining'] as $staffTrainingProfile): ?>
          <tr>
           <!-- <td class="actions" style="text-align: center;">
            <?php echo $this->Html->link('', array('controller' => 'staff_training_profiles', 'action' => 'sneak', $staffTrainingProfile['id']), array('class'=>'btn btn-xs btn-success fa fa-desktop', 'style'=>'color:#000;width:25px; height:25px; padding-top:5px','data-toggle'=>'tooltip', 'data-placement'=>'right', 'title'=>'View Details', 'data-toggle'=>'ajaxModal', 'escape' => false)); ?>
            <?php echo $this->Html->link('', array('controller' => 'staff_training_profiles', 'action' => 'edit', $staffTrainingProfile['id']), array('class'=>'btn btn-xs btn-warning fa fa-pencil', 'style'=>'color:#000;width:25px; height:25px; padding-top:5px','data-toggle'=>'tooltip', 'data-placement'=>'right', 'title'=>'Modify Details', 'data-toggle'=>'ajaxModal', 'escape' => false)); ?>
          </td> -->
          <td style="text-align: center;"><?php echo $count; ?></td> 
          <!-- <td><?php echo $staffTrainingProfile['name']; ?></td> -->
          <!-- <td><?php //echo $staffTrainingProfile['parent_code']; ?></td> -->
          <!-- <td><?php //echo $staffTrainingProfile['org_code']; ?></td> -->
          <!-- <td><?php //echo $staffTrainingProfile['course_id']; ?></td> -->
          <!-- <td style="text-align: center;"><?php echo $staffTrainingProfile['code']; ?></td> -->
          <td>
            <?php 
                  $comment = '';
                  if ( !($staffTrainingProfile['comment'] == 'NIL'|| $staffTrainingProfile['comment'] == 'NO RECOMMENDATION') ) {
                    $comment = ' - '.$staffTrainingProfile['comment'] ;
                  }
                  echo $staffTrainingProfile['course_name'].$comment; 
                ?>
          </td>
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
    <!-- </div> -->
  </section>
  <?php endif; ?>
</div>