          <ul class="breadcrumb no-border no-radius b-b b-light pull-in">
            <li><a href="<?php echo $this->webroot; ?>"<i class="fa fa-home"></i> Home</a></li>
            <li class="active"><a href="#" onClick="location.reload();"><?php echo __('Staff Certification'); ?>'s Details</a></li>
          </ul>
          <div class="m-b-md">
            <h3 class="m-b-none"><?php echo __('Staff Certification'); ?>'s Details</h3>
          </div>
          <!-- start content view page -->
          <section class="vbox">
            <section class="scrollable">
              <section class="hbox stretch">
                <!-- start column 1 -->
                <aside class="aside-lg bg-light lter b-r">
                  <section class="vbox">
                    <section class="scrollable wrapper">
                      <!-- portlet -->
                      <div class="portlet">
                        <section class="panel panel-info portlet-item">
                            <header class="panel-heading">
                            Information
                            </header>
                            		<small class="text-uc text-xs text-muted"><?php echo __('Id'); ?></small>
		<p>
			<?php echo h($staffCertification['StaffCertification']['id']); ?>
			&nbsp;
		</p>
		<small class="text-uc text-xs text-muted"><?php echo __('Staff'); ?></small>
		<p>
			<?php echo $this->Html->link($staffCertification['Staff']['name'], array('controller' => 'staffs', 'action' => 'view', $staffCertification['Staff']['id'])); ?>
			&nbsp;
		</p>
		<small class="text-uc text-xs text-muted"><?php echo __('Certificate Name'); ?></small>
		<p>
			<?php echo h($staffCertification['StaffCertification']['certificate_name']); ?>
			&nbsp;
		</p>
		<small class="text-uc text-xs text-muted"><?php echo __('Start Date'); ?></small>
		<p>
			<?php echo h($staffCertification['StaffCertification']['start_date']); ?>
			&nbsp;
		</p>
		<small class="text-uc text-xs text-muted"><?php echo __('End Date'); ?></small>
		<p>
			<?php echo h($staffCertification['StaffCertification']['end_date']); ?>
			&nbsp;
		</p>
		<small class="text-uc text-xs text-muted"><?php echo __('Updated'); ?></small>
		<p>
			<?php echo h($staffCertification['StaffCertification']['updated']); ?>
			&nbsp;
		</p>
		<small class="text-uc text-xs text-muted"><?php echo __('Status'); ?></small>
		<p>
			<?php echo h($staffCertification['StaffCertification']['status']); ?>
			&nbsp;
		</p>
                        </section>
                        <section class="panel panel-info portlet-item">
                          <header class="panel-heading">
                            Quick links
                          </header>
                          <div class="list-group bg-white">
                           <?php echo $this->Html->link(__('Edit Staff Certification'), array('action' => 'edit', $staffCertification['StaffCertification']['id']), array('class'=>'list-group-item', 'data-toggle'=>'ajaxModal')); ?> <?php echo $this->Form->postLink(__('Delete Staff Certification'), array('action' => 'delete', $staffCertification['StaffCertification']['id']), array('class'=>'list-group-item'), __('Are you sure you want to delete # %s?', $staffCertification['StaffCertification']['id'])); ?>  <?php echo $this->Html->link(__('List Staff Certifications'), array('action' => 'index'), array('class'=>'list-group-item')); ?> <?php echo $this->Html->link(__('New Staff Certification'), array('action' => 'add'), array('class'=>'list-group-item', 'data-toggle'=>'ajaxModal', 'escape' => false)); ?>                              </div>
                        </section>
                        <section class="panel panel-info portlet-item">
                          <header class="panel-heading">
                            Associated links
                          </header>
                          <div class="list-group bg-white">
                          <?php echo $this->Html->link(__('List Staffs'), array('controller' => 'staffs', 'action' => 'index'), array('class' => 'list-group-item')); ?> &nbsp;&nbsp; <?php echo $this->Html->link(__('New Staff'), array('controller' => 'staffs', 'action' => 'add'), array('class' => 'list-group-item')); ?> &nbsp;&nbsp;                           </div>
                        </section>
                      </div>
                      <!-- end portlet -->
                    </section>
                  </section>
                </aside>
                <!-- end column 1 -->
                <!-- start column 2 -->
                                <!-- end column 2 -->
              </section>
            </section>
          </section>
          <!-- end content view page -->

