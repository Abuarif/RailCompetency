          <ul class="breadcrumb no-border no-radius b-b b-light pull-in">
            <li><a href="<?php echo $this->webroot; ?>"<i class="fa fa-home"></i> Home</a></li>
            <li class="active"><?php echo __('Unit Attendance Summary'); ?> List</li>
          </ul>
          <div class="m-b-md">
            <h3 class="m-b-none"><?php echo __('Department Resource Summary'); ?></h3>
          </div>

              <section class="panel panel-default">
                <div class="row wrapper">
                  <div class="col-sm-5 m-b-xs">
                      <div class="btn-group">
                        <button type="button" class="btn btn-sm btn-default" title="Refresh" onclick ='location.reload();'><i class="fa fa-refresh"></i></button>
                      </div>
                       			<?php //echo $this->Html->link(' Create', array('action' => 'add'), array('class' => 'btn btn-success fa fa-plus', 'data-toggle'=>'ajaxModal', 'escape' => false)); ?>
 
                  </div>
                  <div class="col-sm-4 m-b-xs">
                    &nbsp;
                  </div>
                  <div class="col-sm-3">
                      &nbsp;
                    </div>
                  </div>
                </div>
                <div class="table-responsive">
                  <table class="table table-striped b-t b-light">
                    <thead>
                      <tr>
                        <th> # </th>
                        
    
                      
                                                        						<th> Service Line</th>
                                                                                            <th> Department </th>
                                                                                            <th> ManPower </th>
                                                                                            <th>
                           <?php echo $this->Paginator->sort('internal'); ?>                        </th>
                                                                                            <th>
            							 <?php echo $this->Paginator->sort('external'); ?>            						</th>
                                    					                                  						<th>
            							 <?php echo $this->Paginator->sort('internal_manday'); ?>            						</th>
                                    					                                  						<th>
            							 <?php echo $this->Paginator->sort('external_manday'); ?>            						</th>
                                    					                                  						<th>
            							 <?php echo $this->Paginator->sort('internal_manhour'); ?>            						</th>
                                    					                                  						<th>
            							 <?php echo $this->Paginator->sort('external_manhour'); ?>            						</th>
                                    					                        <th width="30"></th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php 
                        $count = 1; 
                        $s_manpower = 0;
                        $internal = 0;
                        $external = 0;
                        $internal_manday = 0;
                        $external_manday = 0;
                        $internal_manhour = 0;
                        $external_manhour = 0;
                      ?>
                      <?php foreach ($unitAttendanceSummaries as $unitAttendanceSummary): ?>
	<tr>
    <td><?php echo h($count); ?></td>
    <td><?php echo h($unitAttendanceSummary['UnitAttendanceSummary']['department']); ?>&nbsp;</td>
		<td><?php echo h($unitAttendanceSummary['UnitAttendanceSummary']['unit']); ?>&nbsp;</td>
    <td><?php $manpower = $this->requestAction('/rail_competency/staffs/count_staff/'.$unitAttendanceSummary['UnitAttendanceSummary']['department'].'/'.$unitAttendanceSummary['UnitAttendanceSummary']['unit']); echo $manpower; $s_manpower += $manpower; ?>&nbsp;</td>
		<td><?php echo h($unitAttendanceSummary['UnitAttendanceSummary']['internal']); $internal += $unitAttendanceSummary['UnitAttendanceSummary']['internal']; ?>&nbsp;</td>
		<td><?php echo h($unitAttendanceSummary['UnitAttendanceSummary']['external']); $external += $unitAttendanceSummary['UnitAttendanceSummary']['external']; ?>&nbsp;</td>
		<td><?php echo h($unitAttendanceSummary['UnitAttendanceSummary']['internal_manday']); $internal_manday += $unitAttendanceSummary['UnitAttendanceSummary']['internal_manday']; ?>&nbsp;</td>
		<td><?php echo h($unitAttendanceSummary['UnitAttendanceSummary']['external_manday']); $external_manday += $unitAttendanceSummary['UnitAttendanceSummary']['external_manday']; ?>&nbsp;</td>
		<td><?php echo h($unitAttendanceSummary['UnitAttendanceSummary']['internal_manhour']); $internal_manhour += $unitAttendanceSummary['UnitAttendanceSummary']['internal_manhour']; ?>&nbsp;</td>
		<td><?php echo h($unitAttendanceSummary['UnitAttendanceSummary']['external_manhour']); $external_manhour += $unitAttendanceSummary['UnitAttendanceSummary']['external_manhour']; ?>&nbsp;</td>
	</tr>
  <?php $count ++; ?>
<?php endforeach; ?>
						<tr>
              <td>&nbsp;</td>
              <td colspan="2">Total&nbsp;</td>
              <td><?php echo $s_manpower; ?>&nbsp;</td>
              <td><?php echo $internal; ?>&nbsp;</td>
              <td><?php echo $external; ?>&nbsp;</td>
              <td><?php echo $internal_manday; ?>&nbsp;</td>
              <td><?php echo $external_manday; ?>&nbsp;</td>
              <td><?php echo $internal_manhour; ?>&nbsp;</td>
              <td><?php echo $external_manhour; ?>&nbsp;</td>
            </tr>
            
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
		echo '<li>'.$this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled')).'</li>';
		echo '<li>'.$this->Paginator->numbers(array('separator' => '</li>
                        <li>')).'</li>';
		echo '<li>'.$this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled')).'</li>';
	?>
                      </ul>
                    </div>
                  </div>
                </footer>
              </section>

