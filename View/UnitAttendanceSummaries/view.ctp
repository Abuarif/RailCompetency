          <ul class="breadcrumb no-border no-radius b-b b-light pull-in">
            <li><a href="<?php echo $this->webroot; ?>"<i class="fa fa-home"></i> Home</a></li>
            <li class="active"><a href="#" onClick="location.reload();"><?php echo __('Unit Attendance Summary'); ?>'s Details</a></li>
          </ul>
          <div class="m-b-md">
            <h3 class="m-b-none"><?php echo __('Unit Attendance Summary'); ?>'s Details</h3>
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
                            		<small class="text-uc text-xs text-muted"><?php echo __('Unit'); ?></small>
		<p>
			<?php echo h($unitAttendanceSummary['UnitAttendanceSummary']['unit']); ?>
			&nbsp;
		</p>
		<small class="text-uc text-xs text-muted"><?php echo __('Internal'); ?></small>
		<p>
			<?php echo h($unitAttendanceSummary['UnitAttendanceSummary']['internal']); ?>
			&nbsp;
		</p>
		<small class="text-uc text-xs text-muted"><?php echo __('External'); ?></small>
		<p>
			<?php echo h($unitAttendanceSummary['UnitAttendanceSummary']['external']); ?>
			&nbsp;
		</p>
		<small class="text-uc text-xs text-muted"><?php echo __('Internal Manday'); ?></small>
		<p>
			<?php echo h($unitAttendanceSummary['UnitAttendanceSummary']['internal_manday']); ?>
			&nbsp;
		</p>
		<small class="text-uc text-xs text-muted"><?php echo __('External Manday'); ?></small>
		<p>
			<?php echo h($unitAttendanceSummary['UnitAttendanceSummary']['external_manday']); ?>
			&nbsp;
		</p>
		<small class="text-uc text-xs text-muted"><?php echo __('Internal Manhour'); ?></small>
		<p>
			<?php echo h($unitAttendanceSummary['UnitAttendanceSummary']['internal_manhour']); ?>
			&nbsp;
		</p>
		<small class="text-uc text-xs text-muted"><?php echo __('External Manhour'); ?></small>
		<p>
			<?php echo h($unitAttendanceSummary['UnitAttendanceSummary']['external_manhour']); ?>
			&nbsp;
		</p>
                        </section>
                        <section class="panel panel-info portlet-item">
                          <header class="panel-heading">
                            Quick links
                          </header>
                          <div class="list-group bg-white">
                           <?php echo $this->Html->link(__('Edit Unit Attendance Summary'), array('action' => 'edit', $unitAttendanceSummary['UnitAttendanceSummary']['id']), array('class'=>'list-group-item', 'data-toggle'=>'ajaxModal')); ?> <?php echo $this->Form->postLink(__('Delete Unit Attendance Summary'), array('action' => 'delete', $unitAttendanceSummary['UnitAttendanceSummary']['id']), array('class'=>'list-group-item'), __('Are you sure you want to delete # %s?', $unitAttendanceSummary['UnitAttendanceSummary']['id'])); ?>  <?php echo $this->Html->link(__('List Unit Attendance Summaries'), array('action' => 'index'), array('class'=>'list-group-item')); ?> <?php echo $this->Html->link(__('New Unit Attendance Summary'), array('action' => 'add'), array('class'=>'list-group-item', 'data-toggle'=>'ajaxModal', 'escape' => false)); ?>                              </div>
                        </section>
                        <section class="panel panel-info portlet-item">
                          <header class="panel-heading">
                            Associated links
                          </header>
                          <div class="list-group bg-white">
                                                    </div>
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

