          <ul class="breadcrumb no-border no-radius b-b b-light pull-in">
            <li><a href="<?php echo $this->webroot; ?>"<i class="fa fa-home"></i> Home</a></li>
            <li class="active"><?php echo __('Staff Qualification'); ?> List</li>
          </ul>
          <div class="m-b-md">
            <h3 class="m-b-none"><?php echo __('Staff Qualification'); ?> List</h3>
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
                      <?php echo $this->Form->create('StaffQualification', array('class' => 'bs-example form-horizontal', 'inputDefaults' => array('label' => false, 'div' => false))); ?>
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
            							 <?php echo $this->Paginator->sort('certificate_name'); ?>            						</th>
                                    					                                  						<th>
            							 <?php echo $this->Paginator->sort('completed_on'); ?>            						</th>
                                    					                                  					                                  						<th>
            							 <?php echo $this->Paginator->sort('updated'); ?>            						</th>
                                    					                                  						<th>
            							 <?php echo $this->Paginator->sort('status'); ?>            						</th>
                                    					                        <th width="30"></th>
                      </tr>
                    </thead>
                    <tbody>
                      
                      <?php foreach ($staffQualifications as $staffQualification): ?>
	<tr>
		<td class="actions">
			<?php echo $this->Html->link($this->Form->button('<i class="fa fa-calendar"></i>', array('class'=>'btn btn-xs btn-danger', 'style'=>'color:#000; width:25px; height:25px;','data-toggle'=>'tooltip', 'data-placement'=>'right', 'title'=>'Calendar')), array('action' => 'calendar', $staffQualification['StaffQualification']['id']), array('escape' => false)); ?>
			<?php echo $this->Html->link($this->Form->button('<i class="fa fa-desktop"></i>', array('class'=>'btn btn-xs btn-success', 'style'=>'color:#000; width:25px; height:25px;','data-toggle'=>'tooltip', 'data-placement'=>'right', 'title'=>'View Details')), array('action' => 'view', $staffQualification['StaffQualification']['id']), array('escape' => false)); ?>
			<?php echo $this->Html->link($this->Form->button('<i class="fa fa-pencil"></i>', array('class'=>'btn btn-xs btn-warning', 'style'=>'color:#000; width:25px; height:25px;','data-toggle'=>'tooltip', 'data-placement'=>'right', 'title'=>'Modify Details')), array('action' => 'edit', $staffQualification['StaffQualification']['id']), array('data-toggle'=>'ajaxModal', 'escape' => false)); ?>
		</td>
		<td>
			<?php echo $this->Html->link($staffQualification['Staff']['name'], array('controller' => 'staffs', 'action' => 'view', $staffQualification['Staff']['id'])); ?>
		</td>
		<td><?php echo h($staffQualification['StaffQualification']['certificate_name']); ?>&nbsp;</td>
		<td><?php echo h($staffQualification['StaffQualification']['completed_on']); ?>&nbsp;</td>
		<td><?php echo h($staffQualification['StaffQualification']['updated']); ?>&nbsp;</td>
		<td><?php echo h($staffQualification['StaffQualification']['status']); ?>&nbsp;</td>
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

