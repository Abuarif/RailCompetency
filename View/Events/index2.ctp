          <ul class="breadcrumb no-border no-radius b-b b-light pull-in">
            <li><a href="<?php echo $this->webroot; ?>"<i class="fa fa-home"></i> Home</a></li>
            <li class="active"><?php echo __('Event'); ?> List</li>
          </ul>
          <div class="m-b-md">
            <h3 class="m-b-none"><?php echo __('Event'); ?> List</h3>
          </div>

              <section class="panel panel-default">
                <div class="row wrapper">
                  <div class="col-sm-5 m-b-xs">
                      <div class="btn-group">
                        <button type="button" class="btn btn-sm btn-default" title="Refresh" onclick ='location.reload();'><i class="fa fa-refresh"></i></button>
                      </div>
                       			<?php //echo $this->Html->link(' Create', array('action' => 'add'), array('class' => 'btn btn-success fa fa-plus', 'data-toggle'=>'ajaxModal', 'escape' => false)); ?>
                            &nbsp;
                            <?php echo $this->Html->link(' Register an Event', array('action' => 'register'), array('class' => 'btn btn-primary fa fa-plus', 'data-toggle'=>'ajaxModal', 'escape' => false)); ?>
 
                  </div>
                  <div class="col-sm-4 m-b-xs">
                    &nbsp;
                  </div>
                  <div class="col-sm-3">
                      <?php echo $this->Form->create('Event', array('class' => 'bs-example form-horizontal', 'inputDefaults' => array('label' => false, 'div' => false))); ?>
                      <div class="input-group">
                      	<?php
		echo $this->Form->input('queryString', array('class' => 'input-sm form-control', 'placeholder' => 'Search')); ?>
<span class='input-group-btn'>
<?php echo $this->Form->button('Go!', array('class' => 'btn btn-sm btn-default bg-success', 'style'=>'color:#fff;'));?>
</span>
		</div><?php echo $this->Form->end();?>
                    </div>
                  </div>
                </div>
                <div class="table-responsive">
                  <table class="table table-striped b-t b-light">
                    <thead>
                      <tr>
                        
                        <th>Actions</th>
                                                        					                                  						<th>
            							 <?php echo $this->Paginator->sort('course_id'); ?>            						</th>
                                    					                                  						<th>
            							 <?php echo $this->Paginator->sort('event_type_id'); ?>            						</th>
                                    					                                  						<th> Nominated </th>
                                    					                                  						<th>
            							 <?php echo $this->Paginator->sort('details'); ?>            						</th>
                                    					                                  						<th>
            							 <?php echo $this->Paginator->sort('start_date'); ?>            						</th>
                                    					                                  						<th>
            							 <?php echo $this->Paginator->sort('end_date'); ?>            						</th>
                                    					                                  						<th>
            							 <?php echo $this->Paginator->sort('last_enrollment'); ?>            						</th>
                                    					                                  						
                                    					                                  						<th>
            							 <?php echo $this->Paginator->sort('active'); ?>            						</th></tr>
                    </thead>
                    <tbody>
                      
                      <?php foreach ($events as $event): ?>
	<tr>
		<td class="actions">
			<?php echo $this->Html->link($this->Form->button('<i class="fa fa-desktop"></i>', array('class'=>'btn btn-xs btn-success', 'style'=>'color:#000; width:25px; height:25px;','data-toggle'=>'tooltip', 'data-placement'=>'right', 'title'=>'View Details')), array('action' => 'view', $event['Event']['id']), array('escape' => false)); ?>
      <?php echo $this->Html->link($this->Form->button('<i class="fa fa-files-o"></i>', array('class'=>'btn btn-xs btn-primary', 'style'=>'color:#000; width:25px; height:25px;','data-toggle'=>'tooltip', 'data-placement'=>'right', 'title'=>'Copy Entry')), array('action' => 'copy', $event['Event']['id']), array('data-toggle'=>'ajaxModal', 'escape' => false)); ?>
      <?php echo $this->Html->link($this->Form->button('<i class="fa fa-pencil"></i>', array('class'=>'btn btn-xs btn-warning', 'style'=>'color:#000; width:25px; height:25px;','data-toggle'=>'tooltip', 'data-placement'=>'right', 'title'=>'Modify Details')), array('action' => 'edit', $event['Event']['id']), array('data-toggle'=>'ajaxModal', 'escape' => false)); ?>
		</td>
		<td>
			<?php echo $this->Html->link($event['Course']['code']. ' - '. $event['Course']['name'], array('controller' => 'courses', 'action' => 'view', $event['Course']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($event['EventType']['name'], array('controller' => 'event_types', 'action' => 'view', $event['EventType']['id'])); ?>
		</td>
		<td><?php echo count($event['EventAttendance']); ?>&nbsp;</td>
		<td><?php echo h($event['Event']['details']); ?>&nbsp;</td>
		<td><?php echo $this->Time->nice($event['Event']['start_date']); ?>&nbsp;</td>
		<td><?php echo $this->Time->nice($event['Event']['end_date']); ?>&nbsp;</td>
		<td><?php echo $this->Time->nice($event['Event']['last_enrollment']); ?>&nbsp;</td>
		
					<?php if ($event['Event']['active'] == 1) { ?>
						<td>
              <!-- <i class='fa fa-check bg-success' style='color:#fff; width:25px; height:25px;padding:5px'></i>  -->
              <?php echo $this->Html->link($this->Form->button("<i class='fa fa-check bg-success' style='color:#fff; width:25px; height:25px;padding:5px'></i>", array('class'=>'btn btn-dark', 'style'=>'color:#000; width:25px; height:25px;','data-toggle'=>'tooltip', 'data-placement'=>'left', 'title'=>'Revert Scheduled Event')), array('controller' => 'events', 'action' => 'revert_scheduled_event', $event['Event']['id']), array('escape' => false)); ?>
              &nbsp;</td>
					<?php } else { ?>
						<td>
              <!-- <i class='fa fa-times bg-danger' style='color:#fff; width:25px; height:25px;padding:5px'></i>  -->
              <?php echo $this->Html->link($this->Form->button("<i class='fa fa-times bg-danger' style='color:#fff; width:25px; height:25px;padding:5px'></i>", array('class'=>'btn btn-dark', 'style'=>'color:#000; width:25px; height:25px;','data-toggle'=>'tooltip', 'data-placement'=>'left', 'title'=>'Confirmed Schedule')), array('controller' => 'events', 'action' => 'confirmed_event', $event['Event']['id']), array('escape' => false)); ?>
              &nbsp;</td>
					<?php } ?>
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

