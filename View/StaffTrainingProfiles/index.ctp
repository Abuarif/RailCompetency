          <ul class="breadcrumb no-border no-radius b-b b-light pull-in">
            <li><a href="<?php echo $this->webroot; ?>"<i class="fa fa-home"></i> Home</a></li>
            <li class="active"><?php echo __('Staff Training Profile'); ?> List</li>
          </ul>
          <div class="m-b-md">
            <h3 class="m-b-none"><?php echo __('Staff Training Profile'); ?> List</h3>
          </div>

              <section class="panel panel-default">
                <div class="row wrapper">
                  <div class="col-lg-4 m-b-xs">
                      <div class="btn-group">
                        <button type="button" class="btn btn-sm btn-default" title="Refresh" onclick ='location.reload();'><i class="fa fa-refresh"></i></button>
                      </div>
                       			<?php echo $this->Html->link(' Download', array('controller' => 'staff_profile_views', 'action' => 'download'), array('class' => 'btn btn-success fa fa-download', 'data-toggle'=>'ajaxModal', 'escape' => false)); ?>
 
                  </div>
                  <div class="col-lg-4 m-b-xs">
                    &nbsp;
                  </div>
                  <!-- <div class="col-sm-3">
                      <?php echo $this->Form->create('StaffTrainingProfile', array('class' => 'bs-example form-horizontal', 'inputDefaults' => array('label' => false, 'div' => false))); ?>
                      <div class="input-group">
                      	<?php
		echo $this->Form->input('queryString', array('class' => 'input-sm form-control', 'placeholder' => 'Search')); ?>
<span class='input-group-btn'>
<?php echo $this->Form->button('Go!', array('class' => 'btn btn-sm btn-default bg-success'));?>
</span>
		</div><?php echo $this->Form->end();?>
                    </div> -->
                    <div class="col-lg-4 m-b-xs text-right pull-right">
                      <button type="button" class="btn btn-dark btn-sm" data-toggle="modal" data-target="#myModal">
                        <i class="fa fa-search"></i>&nbsp;&nbsp;Advanced Search
                      </button>
                    </div>
                    <!-- Modal -->
                    <?php echo $this->Form->create('StaffTrainingProfile', array('class' => 'form-inline','inputDefaults' => array('label' => false, 'div' => false))); ?>
                    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header" style="text-align:center;">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="myModalLabel">Advanced Search</h4>
                          </div>
                          <div class="modal-body">
                            
                            <label>Service Line</label>
                            <?php echo $this->Form->input('parentCode', array('class' => 'form-control', 'style' => 'width:100%;', 'placeholder' => 'Service Line'));  ?>

                            <br><br>

                            <label>Department</label>
                            <?php echo $this->Form->input('orgCode', array('class' => 'form-control', 'style' => 'width:100%;', 'placeholder' => 'Department')); ?>
                            
                            <br><br>

                            <label>Staff No</label>
                            <?php echo $this->Form->input('staffNo', array('class' => 'form-control', 'style' => 'width:100%;', 'placeholder' => 'Staff No')); ?>
                            
                            <br><br>

                            <label>Start Date</label>
                            <?php
                            echo $this->Form->input('start', array('class' => 'datepicker-input form-control', 'data-date-format' => 'dd-mm-yyyy', 'type' => 'text', 'style' => 'width:100%;', 'label' => false, 'placeholder' => 'Start Date'));
                            ?>

                            <br><br>

                            <label>End Date</label>
                            <?php
                            echo $this->Form->input('end', array('class' => 'datepicker-input form-control', 'data-date-format' => 'dd-mm-yyyy', 'type' => 'text', 'style' => 'width:100%;', 'label' => false, 'placeholder' => 'End Date'));
                            ?>

                            <br><br>

                            <label>Course Code</label>
                            <?php echo $this->Form->input('courseCode', array('class' => 'form-control', 'style' => 'width:100%;', 'placeholder' => 'Course Code')); ?>

                            <br><br>

                            <label>Staff / Course Name</label>
                            <?php echo $this->Form->input('queryString', array('class' => 'form-control', 'style' => 'width:100%;', 'placeholder' => 'Staff / Course Name')); ?>

                            
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
                        
                        <th class="text-center sorting"><?php echo __('Actions'); ?></th>
                                                        					                                  						<th>
            							 <?php echo $this->Paginator->sort('staff_id'); ?>            						</th>
                                    					                                  						<th>
            							 <?php echo $this->Paginator->sort('staff_no'); ?>            						</th>
                                    					                                  						<th> Service Line            						</th>
                                    					                                  						<th> Department           						</th>
                                    					                                  						<th>
            							 <?php echo $this->Paginator->sort('course_id'); ?>            						</th>
                                    					                                  						<th>
            							 <?php echo $this->Paginator->sort('code'); ?>            						</th>
                                    					                                  						<th>
            							 <?php echo $this->Paginator->sort('start_date'); ?>            						</th>
                                    					                                  						<th>
            							 <?php echo $this->Paginator->sort('end_date'); ?>            						</th>
                      </tr>
                    </thead>
                    <tbody>
                      
                      <?php foreach ($staffTrainingProfiles as $staffTrainingProfile): ?>
	<tr>
		<td class="actions">
			<?php echo $this->Form->postLink($this->Form->button('<i class="fa fa-trash-o"></i>', array('class'=>'btn btn-xs btn-danger', 'style'=>'color:#000; width:25px; height:25px;','data-toggle'=>'tooltip', 'data-placement'=>'right', 'title'=>'Delete record')), array('controller' => 'staff_training_profiles', 'action' => 'delete', $staffTrainingProfile['StaffTrainingProfile']['id']), array('escape' => false, 'data-toggle' => 'ajaxModal', 'confirm' => 'Are you sure you want to delete this record?')); ?>
			<?php echo $this->Html->link($this->Form->button('<i class="fa fa-desktop"></i>', array('class'=>'btn btn-xs btn-success', 'style'=>'color:#000; width:25px; height:25px;','data-toggle'=>'tooltip', 'data-placement'=>'right', 'title'=>'View Details')), array('action' => 'view', $staffTrainingProfile['StaffTrainingProfile']['id']), array('escape' => false, 'data-toggle' => 'ajaxModal')); ?>
			<?php echo $this->Html->link($this->Form->button('<i class="fa fa-pencil"></i>', array('class'=>'btn btn-xs btn-warning', 'style'=>'color:#000; width:25px; height:25px;','data-toggle'=>'tooltip', 'data-placement'=>'right', 'title'=>'Modify Details')), array('action' => 'edit', $staffTrainingProfile['StaffTrainingProfile']['id']), array('data-toggle'=>'ajaxModal', 'escape' => false)); ?>
		</td>
		<td>
			<?php echo $this->Html->link($staffTrainingProfile['Staff']['name'], array('controller' => 'staffs', 'action' => 'view', $staffTrainingProfile['Staff']['id'])); ?>
		</td>
		<td><?php echo h($staffTrainingProfile['StaffTrainingProfile']['staff_no']); ?>&nbsp;</td>
		<td><?php echo h($staffTrainingProfile['StaffTrainingProfile']['parent_code']); ?>&nbsp;</td>
		<td><?php echo h($staffTrainingProfile['StaffTrainingProfile']['org_code']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($staffTrainingProfile['Course']['name'], array('controller' => 'courses', 'action' => 'view', $staffTrainingProfile['Course']['id'])); ?>
		</td>
		<td><?php echo h($staffTrainingProfile['Course']['code']); ?>&nbsp;</td>
		<td><?php echo h($staffTrainingProfile['StaffTrainingProfile']['start_date']); ?>&nbsp;</td>
		<td><?php echo h($staffTrainingProfile['StaffTrainingProfile']['end_date']); ?>&nbsp;</td>
	</tr>
<?php endforeach; ?>
						
                    </tbody>
                  </table>
                </div>
                <footer class="panel-footer">
                  <div class="row">
                    <div class="col-sm-4 text-left hidden-xs">
                      &nbsp; 

                    </div>
                    <div class="col-sm-4 text-center">
                      <small class="text-muted inline m-t-sm m-b-sm">
                     	<?php
									echo $this->Paginator->counter(array(
										'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
									));
									?>                      </small>
                    </div>
                    <div class="col-sm-4 text-right text-center-xs">                
                      <ul class="pagination pagination-sm m-t-none m-b-none">
                        
                        <?php
    echo '<li>'.$this->Paginator->first(__('first'), array(), null, array('class' => 'prev disabled')).'</li>';
		echo '<li>'.$this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled')).'</li>';
		echo '<li>'.$this->Paginator->numbers(array('separator' => '</li>
                        <li>')).'</li>';
    echo '<li>'.$this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled')).'</li>';
		echo '<li>'.$this->Paginator->last(__('last') , array(), null, array('class' => 'next disabled')).'</li>';
	?>
                      </ul>
                    </div>
                  </div>
                </footer>
              </section>
<script type="text/javascript">
  $('#StaffTrainingProfileStartDate').datepicker({
       dateFormat: 'dd-mm-yy',
       minDate: '+5d',
       changeMonth: true,
       changeYear: true
   });
  $('#StaffTrainingProfileEndDate').datepicker({
       dateFormat: 'dd-mm-yy',
       minDate: '+5d',
       changeMonth: true,
       changeYear: true
   });
</script>
