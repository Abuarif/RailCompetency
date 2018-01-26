          <ul class="breadcrumb no-border no-radius b-b b-light pull-in">
            <li><a href="<?php echo $this->webroot; ?>"<i class="fa fa-home"></i> Home</a></li>
            <li class="active"><?php echo __('View Attendance List'); ?></li>
          </ul>
          <div class="m-b-md">
            <h3 class="m-b-none"><?php echo __('View Attendance List'); ?></h3>
          </div>

              <section class="panel panel-default">
                <div class="row wrapper">
                  <div class="col-sm-5 m-b-xs">
                      <div class="btn-group">
                        <button type="button" class="btn btn-sm btn-default" title="Refresh" onclick ='location.reload();'><i class="fa fa-refresh"></i></button>
                      </div>
                      <?php echo $this->Html->link(' Download', array('controller' => 'view_attendance_lists', 'action' => 'download'), array('class' => 'btn btn-success fa fa-download', 'data-toggle'=>'ajaxModal', 'escape' => false)); ?>
 
                  </div>
                  <div class="col-sm-4 m-b-xs">
                    &nbsp;
                  </div>
                  <div class="col-sm-3">
                      <?php echo $this->Form->create('ViewAttendanceList', array('class' => 'bs-example form-horizontal', 'inputDefaults' => array('label' => false, 'div' => false))); ?>
                      <div class="input-group">
                      	<?php
		echo $this->Form->input('queryString', array('class' => 'input-sm form-control', 'placeholder' => 'Search')); ?>
<span class='input-group-btn'>
<?php echo $this->Form->button('Go!', array('class' => 'btn btn-sm btn-default bg-success'));?>
</span>
		</div><?php echo $this->Form->end();?>
                    </div>
                  </div>
                </div>
                <div class="table-responsive">
                  <table class="table table-striped b-t b-light">
                    <thead>
                      <tr>
                        
                        
                                                        						<th>
            							 <?php echo $this->Paginator->sort('staff_no'); ?>            						</th>
                                    					                                  						<th>
            							 <?php echo $this->Paginator->sort('staff_name'); ?>            						</th>
                                    					                                  						<th>
            							 <?php echo $this->Paginator->sort('parent_code'); ?>            						</th>
                                    					                                  						<th>
            							 <?php echo $this->Paginator->sort('org_code'); ?>            						</th>
                                    					                                  						<th>
            							 <?php echo $this->Paginator->sort('code'); ?>            						</th>
                                    					                                  						<th>
            							 <?php echo $this->Paginator->sort('course_name'); ?>            						</th>
                                    					                                  						<th>
            							 <?php echo $this->Paginator->sort('start_date'); ?>            						</th>
                                    					                                  						<th>
            							 <?php echo $this->Paginator->sort('end_date'); ?>            						</th>
                                    					                                  						<th>
            							 <?php echo $this->Paginator->sort('duration'); ?>            						</th>
                                    					                                  						<th>
            							 <?php echo $this->Paginator->sort('month'); ?>            						</th>
                                    					                                  						<th>
            							 <?php echo $this->Paginator->sort('year'); ?>            						</th>
                                    					                                  						<th>
            							 <?php echo $this->Paginator->sort('is_completed'); ?>            						</th>
                                    					                                  						<th>
            							 <?php echo $this->Paginator->sort('is_tcn'); ?>            						</th>
                                    					                        <th width="30"></th>
                      </tr>
                    </thead>
                    <tbody>
                      
                      <?php foreach ($viewAttendanceLists as $viewAttendanceList): ?>
	<tr>
		
		<td><?php echo h($viewAttendanceList['ViewAttendanceList']['staff_no']); ?>&nbsp;</td>
		<td><?php echo h($viewAttendanceList['ViewAttendanceList']['staff_name']); ?>&nbsp;</td>
		<td><?php echo h($viewAttendanceList['ViewAttendanceList']['parent_code']); ?>&nbsp;</td>
		<td><?php echo h($viewAttendanceList['ViewAttendanceList']['org_code']); ?>&nbsp;</td>
		<td><?php echo h($viewAttendanceList['ViewAttendanceList']['code']); ?>&nbsp;</td>
		<td><?php echo h($viewAttendanceList['ViewAttendanceList']['course_name']); ?>&nbsp;</td>
		<td><?php echo h($viewAttendanceList['ViewAttendanceList']['start_date']); ?>&nbsp;</td>
		<td><?php echo h($viewAttendanceList['ViewAttendanceList']['end_date']); ?>&nbsp;</td>
		<td><?php echo h($viewAttendanceList['ViewAttendanceList']['duration']); ?>&nbsp;</td>
		<td><?php echo h($viewAttendanceList['ViewAttendanceList']['month']); ?>&nbsp;</td>
		<td><?php echo h($viewAttendanceList['ViewAttendanceList']['year']); ?>&nbsp;</td>
		<td><?php echo h($viewAttendanceList['ViewAttendanceList']['is_completed']); ?>&nbsp;</td>
		<td><?php echo h($viewAttendanceList['ViewAttendanceList']['is_tcn']); ?>&nbsp;</td>
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
		echo '<li>'.$this->Paginator->last(__('last'), array(), null, array('class' => 'next disabled')).'</li>';
	?>
                      </ul>
                    </div>
                  </div>
                </footer>
              </section>

