          <ul class="breadcrumb no-border no-radius b-b b-light pull-in">
            <li><a href="<?php echo $this->webroot; ?>"<i class="fa fa-home"></i> Home</a></li>
            <li class="active"><?php echo __('Staff'); ?> List</li>
          </ul>
          <div class="m-b-md">
            <h3 class="m-b-none"><?php echo __('Staff'); ?> List</h3>
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
                      <?php echo $this->Form->create('Staff', array('class' => 'bs-example form-horizontal', 'inputDefaults' => array('label' => false, 'div' => false))); ?>
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
            							 <?php echo $this->Paginator->sort('organization_id'); ?>            						</th>
                                    					                                  						<th>
            							 <?php echo $this->Paginator->sort('parent_id'); ?>            						</th>
                                    					                                  						<th>
            							 <?php echo $this->Paginator->sort('user_id'); ?>            						</th>
                                    					                                  						<th>
            							 <?php echo $this->Paginator->sort('staff_no'); ?>            						</th>
                                    					                                  						<th>
            							 <?php echo $this->Paginator->sort('position_id'); ?>            						</th>
                                    					                                  						<th>
            							 <?php echo $this->Paginator->sort('name'); ?>            						</th>
                                    					                                  						<th>
            							 <?php echo $this->Paginator->sort('parent_code'); ?>            						</th>
                                    					                                  						<th>
            							 <?php echo $this->Paginator->sort('org_code'); ?>            						</th>
                                    					                                  						<th>
            							 <?php echo $this->Paginator->sort('NRIC'); ?>            						</th>
                                    					                                  						<th>
            							 <?php echo $this->Paginator->sort('details'); ?>            						</th>
                                    					                                  						<th>
            							 <?php echo $this->Paginator->sort('isTrainer'); ?>            						</th>
                                    					                                  						<th>
            							 <?php echo $this->Paginator->sort('active'); ?>            						</th>
                                    					                                  						<th>
            							 <?php echo $this->Paginator->sort('lft'); ?>            						</th>
                                    					                                  						<th>
            							 <?php echo $this->Paginator->sort('rght'); ?>            						</th>
                                    					                                  					                                  					                        <th width="30"></th>
                      </tr>
                    </thead>
                    <tbody>
                      
                      <?php foreach ($staffs as $staff): ?>
	<tr>
		<td class="actions">
			<?php echo $this->Html->link($this->Form->button('<i class="fa fa-calendar"></i>', array('class'=>'btn btn-xs btn-danger', 'style'=>'color:#000; width:25px; height:25px;','data-toggle'=>'tooltip', 'data-placement'=>'right', 'title'=>'Calendar')), array('action' => 'calendar', $staff['Staff']['id']), array('escape' => false)); ?>
			<?php echo $this->Html->link($this->Form->button('<i class="fa fa-desktop"></i>', array('class'=>'btn btn-xs btn-success', 'style'=>'color:#000; width:25px; height:25px;','data-toggle'=>'tooltip', 'data-placement'=>'right', 'title'=>'View Details')), array('action' => 'view', $staff['Staff']['id']), array('escape' => false)); ?>
			<?php echo $this->Html->link($this->Form->button('<i class="fa fa-pencil"></i>', array('class'=>'btn btn-xs btn-warning', 'style'=>'color:#000; width:25px; height:25px;','data-toggle'=>'tooltip', 'data-placement'=>'right', 'title'=>'Modify Details')), array('action' => 'edit', $staff['Staff']['id']), array('data-toggle'=>'ajaxModal', 'escape' => false)); ?>
		</td>
		<td>
			<?php echo $this->Html->link($staff['Organization']['name'], array('controller' => 'organizations', 'action' => 'view', $staff['Organization']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($staff['ParentStaff']['name'], array('controller' => 'staffs', 'action' => 'view', $staff['ParentStaff']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($staff['User']['name'], array('controller' => 'users', 'action' => 'view', $staff['User']['id'])); ?>
		</td>
		<td><?php echo h($staff['Staff']['staff_no']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($staff['Position']['name'], array('controller' => 'positions', 'action' => 'view', $staff['Position']['id'])); ?>
		</td>
		<td><?php echo h($staff['Staff']['name']); ?>&nbsp;</td>
		<td><?php echo h($staff['Staff']['parent_code']); ?>&nbsp;</td>
		<td><?php echo h($staff['Staff']['org_code']); ?>&nbsp;</td>
		<td><?php echo h($staff['Staff']['NRIC']); ?>&nbsp;</td>
		<td><?php echo h($staff['Staff']['details']); ?>&nbsp;</td>
		<td><?php echo h($staff['Staff']['isTrainer']); ?>&nbsp;</td>
					<?php if ($staff['Staff']['active'] == 1) { ?>
						<td><i class='fa fa-check bg-success' style='color:#fff; width:25px; height:25px;padding:5px'></i> &nbsp;</td>
					<?php } else { ?>
						<td><i class='fa fa-times bg-danger' style='color:#fff; width:25px; height:25px;padding:5px'></i> &nbsp;</td>
					<?php } ?>
		<td><?php echo h($staff['Staff']['lft']); ?>&nbsp;</td>
		<td><?php echo h($staff['Staff']['rght']); ?>&nbsp;</td>
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

