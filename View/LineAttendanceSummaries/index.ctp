



          <ul class="breadcrumb no-border no-radius b-b b-light pull-in">
            <li><a href="<?php echo $this->webroot; ?>"<i class="fa fa-home"></i> Home</a></li>
            <li class="active"><?php echo __('Line Attendance Summary'); ?> List</li>
          </ul>
          <div class="m-b-md">
            <h3 class="m-b-none"><?php echo __('Line Attendance Summary'); ?></h3>
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
                    <div class="col-lg-4 m-b-xs text-right pull-right">
                    <!-- <div class="col-sm-3"> -->
                      <button type="button" class="btn btn-dark btn-sm" data-toggle="modal" data-target="#myModal">
                        <i class="fa fa-search"></i>&nbsp;&nbsp;Advanced Search
                      </button>
                    </div>
                  </div>
                  <?php echo $this->Form->create('LineAttendanceSummary', array('class' => 'form-inline','inputDefaults' => array('label' => false, 'div' => false))); ?>
                    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header" style="text-align:center;">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="myModalLabel">Advanced Search</h4>
                          </div>
                          <div class="modal-body">
                            <label>Month</label>
                            <?php
                            echo $this->Form->input('month', array('class' => 'datepicker-input form-control', 'data-date-format' => 'mm-yyyy', 'type' => 'text', 'style' => 'width:100%', 'label' => false, 'placeholder' => 'Choose month - year'));
                            ?>
                            <br><br>
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
                <div class="table-responsive">
                  <table class="table table-striped b-t b-light">
                    <thead>
                      <tr>
                        
                        <th> # </th>
                                                        						<th> Service Line </th>
                                                                                            <th> ManPower </th>
                                    					                                  						<th> 
                           <?php echo $this->Paginator->sort('month'); ?>                        </th>
                                                                                             </th>
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
                      <?php foreach ($lineAttendanceSummaries as $lineAttendanceSummary): ?>
	<tr>
    <td><?php echo h($count); ?></td>
    <td><?php echo h($lineAttendanceSummary['LineAttendanceSummary']['department']); ?>&nbsp;</td>
    <td><?php $manpower = $this->requestAction('/rail_competency/staffs/count_line_staff/'.$lineAttendanceSummary['LineAttendanceSummary']['department']); echo $manpower; ?>&nbsp;</td>
    <td><?php echo h($lineAttendanceSummary['LineAttendanceSummary']['month']); ?>&nbsp;</td>
		<td><?php echo h($lineAttendanceSummary['LineAttendanceSummary']['confirmed_internal'].'/'.$lineAttendanceSummary['LineAttendanceSummary']['internal']); ?>&nbsp;</td>
		<td><?php echo h($lineAttendanceSummary['LineAttendanceSummary']['confirmed_external'].'/'.$lineAttendanceSummary['LineAttendanceSummary']['external']); ?>&nbsp;</td>
		<td><?php echo h($lineAttendanceSummary['LineAttendanceSummary']['confirmed_internal_manday'].'/'.$lineAttendanceSummary['LineAttendanceSummary']['internal_manday']); ?>&nbsp;</td>
		<td><?php echo h($lineAttendanceSummary['LineAttendanceSummary']['confirmed_external_manday'].'/'.$lineAttendanceSummary['LineAttendanceSummary']['external_manday']); ?>&nbsp;</td>
		<td><?php echo h($lineAttendanceSummary['LineAttendanceSummary']['confirmed_internal_manhour'].'/'.$lineAttendanceSummary['LineAttendanceSummary']['internal_manhour']); ?>&nbsp;</td>
		<td><?php echo h($lineAttendanceSummary['LineAttendanceSummary']['confirmed_external_manhour'].'/'.$lineAttendanceSummary['LineAttendanceSummary']['external_manhour']); ?>&nbsp;</td>
	</tr>
  <?php $count ++; ?>
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


<script type="text/javascript">
  $(".LineAttendanceSummaryMonth").datepicker({
    startView: 1
  });


  $('#LineAttendanceSummaryMonth input').datepicker({
      startView: 1
  });
</script>
