          <ul class="breadcrumb no-border no-radius b-b b-light pull-in">
            <li><a href="<?php echo $this->webroot; ?>"<i class="fa fa-home"></i> Home</a></li>
            <li class="active">My Class Events</li>
          </ul>
          <div class="m-b-md">
            <h3 class="m-b-none">My Class Events</h3>
          </div>

              <section class="panel panel-default">
                <div class="row wrapper">
                  <div class="col-sm-12 pull-in">
                  <?php echo $this->Form->create('Event', array('class' => 'form-inline','inputDefaults' => array('label' => false, 'div' => false))); ?>
                    <!-- <div class="checkbox"> -->
                    <div class="form-group">
                      <div class="form-group">
                        <?php
                        echo $this->Form->input('start_date', array('class' => 'datepicker-input form-control', 'data-date-format' => 'dd-mm-yyyy', 'type' => 'text', 'style' => 'z-index: 100000!important;', 'label' => false, 'placeholder' => 'Start Date'));
                      ?>
                      </div>
                      <div class="form-group">
                        <?php
                        echo $this->Form->input('end_date', array('class' => 'datepicker-input form-control', 'data-date-format' => 'dd-mm-yyyy', 'type' => 'text', 'style' => 'z-index: 100000!important;', 'label' => false, 'placeholder' => 'End Date'));
                      ?>
                      </div>
                      <label>
                        <?php echo $this->Form->checkbox('active', array('data-toggle'=>'tooltip', 'data-placement'=>'bottom', 'title'=>'Click here to view confirmed events.')); ?>&nbsp;Active Event Only!
                      </label>
                      <?php echo $this->Form->input('queryString', array('class' => 'form-control', 'placeholder' => 'Course Code')); ?>
                    
                      <span class='form-group-btn'>
                      <?php echo $this->Form->button('Search!', array('class' => 'btn btn-default bg-success', 'style' => 'color:#fff!important'));?>
                      </span>
                    </div>
                  <?php echo $this->Form->end();?>
                </div>                 
              </div>
                </div>
                <div class="table-responsive">
                  <table class="table table-striped b-t b-light">
                    <thead>
                      <tr>
                        
                        <!-- <th width="20"><input type="checkbox"></th> -->
                        <th width="120">Actions</th>
                        <th> <?php echo $this->Paginator->sort('course_id'); ?>  </th>
                        <th> <?php echo $this->Paginator->sort('start_date'); ?>  </th>
                        <th> <?php echo $this->Paginator->sort('end_date'); ?>  </th>
                      </tr>
                    </thead>
                    <tbody>
                      
                      <?php foreach ($events as $event): ?>
	<tr>
                        <!-- <td><input type="checkbox" name="post[]" value="2"></td> -->
                        <!-- <td><?php //echo $this->Form->checkbox('Event.' . $event['Event']['id'] . '.id', array('class' => 'row-select')); ?></td> -->
		<td class="actions">
			<?php //echo $this->Html->link($this->Form->button('<i class="fa fa-desktop"></i>', array('class'=>'btn btn-xs btn-success', 'style'=>'color:#000; width:25px; height:25px;','data-toggle'=>'tooltip', 'data-placement'=>'right', 'title'=>'View Details')), array('action' => 'view', $event['Event']['id']), array('escape' => false)); ?>
      <?php //echo $this->Html->link($this->Form->button('<i class="fa fa-files-o"></i>', array('class'=>'btn btn-xs btn-primary', 'style'=>'color:#000; width:25px; height:25px;','data-toggle'=>'tooltip', 'data-placement'=>'right', 'title'=>'Copy Entry')), array('action' => 'copy', $event['Event']['id']), array('data-toggle'=>'ajaxModal', 'escape' => false)); ?>
      <?php //echo $this->Html->link($this->Form->button('<i class="fa fa-pencil"></i>', array('class'=>'btn btn-xs btn-warning', 'style'=>'color:#000; width:25px; height:25px;','data-toggle'=>'tooltip', 'data-placement'=>'right', 'title'=>'Modify Details')), array('action' => 'edit', $event['Event']['id']), array('data-toggle'=>'ajaxModal', 'escape' => false)); ?>
      <?php echo $this->Html->link($this->Form->button('<i class="fa fa-gears"></i>', array('class'=>'btn btn-xs btn-danger', 'style'=>'color:#000; width:25px; height:25px;','data-toggle'=>'tooltip', 'data-placement'=>'right', 'title'=>'Manage Event')), array('action' => 'participant_attendance', $event['Event']['id']), array('escape' => false)); ?>
		  <?php if ($event['Event']['active'] == 1) { ?>
        <i class='fa fa-check bg-success' style='color:#fff; width:25px; height:25px;padding:5px'></i> 
        <?php //echo $this->Form->postLink('', array('controller' => 'events', 'action' => 'revert_scheduled_event', $event['Event']['id']), array('class' =>'fa fa-check bg-success', 'style' =>'color:#fff; width:25px; height:24px;padding:5px', 'data-toggle'=>'tooltip', 'data-placement'=>'right', 'title'=>'Revert Scheduled Event', 'escape' => false, 'confirm' => 'Are you sure you wish to revert the scheduled event?')); ?>
      <?php } else { ?>
        <i class='fa fa-times bg-danger' style='color:#fff; width:25px; height:25px;padding:5px'></i> 
        <?php //echo $this->Form->postLink('', array('controller' => 'events', 'action' => 'confirmed_event', $event['Event']['id']), array('class'=>'btn btn-danger fa fa-times', 'style' =>'color:#fff; width:25px; height:24px;padding:5px','data-toggle'=>'tooltip', 'data-placement'=>'right', 'title'=>'Confirmed Schedule', 'escape' => false, 'confirm' => 'Are you sure you wish to confirm the event?')); ?>
      <?php } ?>
		<td>
			<?php echo $this->Html->link($event['Course']['code']. ' - '. $event['Course']['name'], array('controller' => 'courses', 'action' => 'view', $event['Course']['id'])); ?>
		</td>
		<td><?php echo $this->Time->nice($event['Event']['start_date']); ?>&nbsp;</td>
		<td><?php echo $this->Time->nice($event['Event']['end_date']); ?>&nbsp;</td>
		
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

