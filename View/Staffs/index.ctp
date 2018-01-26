          <ul class="breadcrumb no-border no-radius b-b b-light pull-in">
          <li><a href="<?php echo $this->webroot; ?>"><i class="fa fa-home"></i> Home</a></li>
            <li class="active"><?php echo __('Staff'); ?> List</li>
          </ul>
          <div class="m-b-md">
            <h3 class="m-b-none"><?php echo __('Staff'); ?> List</h3>
          </div>

          <section class="panel panel-default">
            <div class="row wrapper">
              <div class="col-sm-9 m-b-xs">
                <div class="btn-group">
                  <button type="button" class="btn btn-sm btn-default" title="Refresh" onclick ='location.reload();'><i class="fa fa-refresh"></i>&nbsp;&nbsp;Refresh</button>
                </div>
                <?php echo $this->Html->link('<i class="fa fa-plus"></i>&nbsp;&nbsp;Create', array('action' => 'add'), array('class' => 'btn btn-sm btn-success', 'data-toggle'=>'ajaxModal', 'escape' => false)); ?>
                <?php echo $this->Html->link(' Staff Data',array('action'=>'export', $queryString), array('target'=>'_blank', 'class' => 'btn btn-warning fa fa-download','escape' => false,'data-toggle'=>'tooltip', 'data-placement'=>'right', 'title'=>'Download Staff Data'));?>
                <?php echo $this->Html->link(' Staff Batch Upload',array('action'=>'import'), array('data-toggle'=>'ajaxModal', 'class' => 'btn btn-warning fa fa-upload','escape' => false, 'data-placement'=>'right', 'title'=>'Upload Staff Data'));?>
              </div>
              
              <div class="col-sm-3">
                <?php echo $this->Form->create('Staff', array('class' => 'bs-example form-horizontal', 'inputDefaults' => array('label' => false, 'div' => false))); ?>
                <div class="input-group">
                 <?php
                 echo $this->Form->input('queryString', array('class' => 'input-sm form-control', 'placeholder' => 'Search')); ?>
                 <span class='input-group-btn'>
                  <?php echo $this->Form->button('<i class="fa fa-search"></i>', array('class' => 'btn btn-sm btn-success'));?>
                </span>
              </div><?php echo $this->Form->end();?>
            </div>
          </div>
        </div>
        <div class="table-responsive">
          <table class="table table-striped b-t b-light">
            <thead>
              <tr>
                <th class="text-center sorting">
                  <?php echo __('Actions'); ?>
                </th>
                <!-- <th>
                  <?php echo $this->Paginator->sort('organization_id'); ?>
                </th> -->
                <!-- <th>
                  <?php //echo $this->Paginator->sort('parent_id'); ?>            						
                </th> -->
                <!-- <th>
                  <?php //echo $this->Paginator->sort('user_id'); ?>            						
                </th> -->
                <th class="text-center sorting">
                  <?php echo $this->Paginator->sort('staff_no'); ?>            						
                </th>
                <th>
                  <?php echo $this->Paginator->sort('name'); ?>                       
                </th>
                <th class="text-center sorting">
                  <?php echo $this->Paginator->sort('position_id'); ?>            						
                </th>
                <th>
                  <?php echo $this->Paginator->sort('parent_code'); ?>            						
                </th>
                <th>
                  <?php echo $this->Paginator->sort('org_code'); ?>            						
                </th>
                <th class="text-center sorting">
                  <?php echo $this->Paginator->sort('NRIC'); ?>            						
                </th>
                <!-- <th>
                  <?php //echo $this->Paginator->sort('details'); ?>            						
                </th> -->
                <!-- <th>
                  <?php //echo $this->Paginator->sort('isTrainer'); ?>            						
                </th> -->
               <!--  <th>
                  <?php //echo $this->Paginator->sort('active'); ?>            						
                </th> -->
               <!--  <th>
                  <?php //echo $this->Paginator->sort('lft'); ?>            						
                </th> -->
                <!-- <th>
                  <?php //echo $this->Paginator->sort('rght'); ?>            						
                </th> -->
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
                    <?php } else { ?>
                      <?php 
                        echo $this->Form->postLink($this->Form->button('<i class="fa fa-trash-o"></i>', array('class'=>'btn btn-xs btn-default', 'style'=>'color:#000; width:25px; height:25px;'  )), array('controller' => 'staffs', 'action' => 'index'), array('escape' => false)); 
                      ?>
                    <?php } ?>

                   <?php echo $this->Html->link($this->Form->button('<i class="fa fa-desktop"></i>', array('class'=>'btn btn-xs btn-success', 'style'=>'color:#000; width:25px; height:25px;','data-toggle'=>'tooltip', 'data-placement'=>'right', 'title'=>'View Details')), array('action' => 'view', $staff['Staff']['id']), array('escape' => false)); ?>
                   <?php echo $this->Html->link($this->Form->button('<i class="fa fa-pencil"></i>', array('class'=>'btn btn-xs btn-warning', 'style'=>'color:#000; width:25px; height:25px;','data-toggle'=>'tooltip', 'data-placement'=>'right', 'title'=>'Modify Details')), array('action' => 'edit', $staff['Staff']['id']), array('data-toggle'=>'ajaxModal', 'escape' => false)); ?>
                 </td>
                 <td class="text-center sorting"><?php echo h($staff['Staff']['staff_no']); ?>&nbsp;</td>
                 <td><?php echo h($staff['Staff']['name']); ?>&nbsp;</td>
                 <td class="text-center sorting">
                   <?php echo $this->Html->link($staff['Position']['name'], array('controller' => 'positions', 'action' => 'view', $staff['Position']['id'])); ?>
                 </td>
                 <td><?php echo h($staff['Staff']['parent_code']); ?>&nbsp;</td>
                 <td><?php echo h($staff['Staff']['org_code']); ?>&nbsp;</td> 
                 <td class="text-center sorting"><?php echo h($staff['Staff']['NRIC']); ?>&nbsp;</td>
                </tr>
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

