          <ul class="breadcrumb no-border no-radius b-b b-light pull-in">
            <li><a href="<?php echo $this->webroot; ?>"<i class="fa fa-home"></i> Home</a></li>
            <li class="active"><?php echo __('Staff External Training'); ?> List</li>
          </ul>
          <div class="m-b-md">
            <h3 class="m-b-none"><?php echo __('Staff External Training'); ?> List</h3>
          </div>

              <section class="panel panel-default">
                <div class="row wrapper">
                  <div class="col-sm-5 m-b-xs">
                      <div class="btn-group">
                        <button type="button" class="btn btn-sm btn-default" title="Refresh" onclick ='location.reload();'><i class="fa fa-refresh"></i></button>
                      </div>
                       			<?php echo $this->Html->link(' Create', array('action' => 'add'), array('class' => 'btn btn-success fa fa-plus', 'data-toggle'=>'ajaxModal', 'escape' => false)); ?>
 
                  </div>
                  <div class="col-sm-4 m-b-xs">
                    &nbsp;
                  </div>
                  <div class="col-sm-3">
                      <?php echo $this->Form->create('StaffExternalTraining', array('class' => 'bs-example form-horizontal', 'inputDefaults' => array('label' => false, 'div' => false))); ?>
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
                        
                        <th class="col-md-2 text-center sorting"><?php echo __('Actions'); ?></th>
                                                        					                                  						<th>
            							 <?php echo $this->Paginator->sort('staff_id'); ?>            						</th>
                                    					                                  						<th>
            							 <?php echo $this->Paginator->sort('staff_no'); ?>            						</th>
                                    					                                  						<th>
            							 <?php echo $this->Paginator->sort('name'); ?>            						</th>
                                    					                                  						<th>
            							 <?php echo $this->Paginator->sort('nric'); ?>            						</th>
                                    					                                  						<th>
            							 <?php echo $this->Paginator->sort('course_name'); ?>            						</th>
                                    					                                  						<th>
            							 <?php echo $this->Paginator->sort('training_provider'); ?>            						</th>
                                    					                                  						<th>
            							 <?php echo $this->Paginator->sort('start_date'); ?>            						</th>
                                    					                                  						<th>
            							 <?php echo $this->Paginator->sort('end_date'); ?>            						</th>
                                    					                                  						<th>
            							 <?php echo $this->Paginator->sort('duration'); ?>            						</th>
                                    					                                  						<th>
            							 <?php echo $this->Paginator->sort('month'); ?>            						</th>
                                    					                                  					                                  					                        <th width="30"></th>
                      </tr>
                    </thead>
                    <tbody>
                      
                      <?php foreach ($staffExternalTrainings as $staffExternalTraining): ?>
	<tr>
		<td class="actions">
			<?php echo $this->Html->link($this->Form->button('<i class="fa fa-desktop"></i>', array('class'=>'btn btn-xs btn-success', 'style'=>'color:#000; width:25px; height:25px;','data-toggle'=>'tooltip', 'data-placement'=>'right', 'title'=>'View Details')), array('action' => 'view', $staffExternalTraining['StaffExternalTraining']['id']), array('escape' => false)); ?>
			<?php echo $this->Html->link($this->Form->button('<i class="fa fa-pencil"></i>', array('class'=>'btn btn-xs btn-warning', 'style'=>'color:#000; width:25px; height:25px;','data-toggle'=>'tooltip', 'data-placement'=>'right', 'title'=>'Modify Details')), array('action' => 'edit', $staffExternalTraining['StaffExternalTraining']['id']), array('data-toggle'=>'ajaxModal', 'escape' => false)); ?>
		</td>
		<td>
			<?php echo $this->Html->link($staffExternalTraining['Staff']['name'], array('controller' => 'staffs', 'action' => 'view', $staffExternalTraining['Staff']['id'])); ?>
		</td>
		<td><?php echo h($staffExternalTraining['StaffExternalTraining']['staff_no']); ?>&nbsp;</td>
		<td><?php echo h($staffExternalTraining['StaffExternalTraining']['name']); ?>&nbsp;</td>
		<td><?php echo h($staffExternalTraining['StaffExternalTraining']['nric']); ?>&nbsp;</td>
		<td><?php echo h($staffExternalTraining['StaffExternalTraining']['course_name']); ?>&nbsp;</td>
		<td><?php echo h($staffExternalTraining['StaffExternalTraining']['training_provider']); ?>&nbsp;</td>
		<td><?php echo h($staffExternalTraining['StaffExternalTraining']['start_date']); ?>&nbsp;</td>
		<td><?php echo h($staffExternalTraining['StaffExternalTraining']['end_date']); ?>&nbsp;</td>
		<td><?php echo h($staffExternalTraining['StaffExternalTraining']['duration']); ?>&nbsp;</td>
		<td><?php echo h($staffExternalTraining['StaffExternalTraining']['month']); ?>&nbsp;</td>
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

