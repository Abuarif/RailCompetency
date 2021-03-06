          <ul class="breadcrumb no-border no-radius b-b b-light pull-in">
            <li><a href="<?php echo $this->webroot; ?>"<i class="fa fa-home"></i> Home</a></li>
            <li class="active"><a href="#" onClick="location.reload();">Sneak Preview: <?php echo __('Line Attendance Summary'); ?>'s Details </a></li>
          </ul>
          <div class="m-b-md">
            <h3 class="m-b-none">Sneak Preview: <?php echo __('Line Attendance Summary'); ?>'s Details </h3>
          </div>
          <!-- start content view page -->
          <section class="vbox">
            <section class="scrollable">
              <section class="hbox stretch">
                <!-- start column 1 -->
                <aside class="aside-lg bg-light lter b-r">
                  <section class="vbox">
                    <section class="scrollable">
                      <div class="wrapper">
                        
                        <div class="portlet">
                          <section class="panel panel-info portlet-item">
                            <header class="panel-heading">
                            Information
                          </header>
                            		<small class="text-uc text-xs text-muted"><?php echo __('Department'); ?></small>
		<p>
			<?php echo h($lineAttendanceSummary['LineAttendanceSummary']['department']); ?>
			&nbsp;
		</p>
		<small class="text-uc text-xs text-muted"><?php echo __('Internal'); ?></small>
		<p>
			<?php echo h($lineAttendanceSummary['LineAttendanceSummary']['internal']); ?>
			&nbsp;
		</p>
		<small class="text-uc text-xs text-muted"><?php echo __('External'); ?></small>
		<p>
			<?php echo h($lineAttendanceSummary['LineAttendanceSummary']['external']); ?>
			&nbsp;
		</p>
		<small class="text-uc text-xs text-muted"><?php echo __('Internal Manday'); ?></small>
		<p>
			<?php echo h($lineAttendanceSummary['LineAttendanceSummary']['internal_manday']); ?>
			&nbsp;
		</p>
		<small class="text-uc text-xs text-muted"><?php echo __('External Manday'); ?></small>
		<p>
			<?php echo h($lineAttendanceSummary['LineAttendanceSummary']['external_manday']); ?>
			&nbsp;
		</p>
		<small class="text-uc text-xs text-muted"><?php echo __('Internal Manhour'); ?></small>
		<p>
			<?php echo h($lineAttendanceSummary['LineAttendanceSummary']['internal_manhour']); ?>
			&nbsp;
		</p>
		<small class="text-uc text-xs text-muted"><?php echo __('External Manhour'); ?></small>
		<p>
			<?php echo h($lineAttendanceSummary['LineAttendanceSummary']['external_manhour']); ?>
			&nbsp;
		</p>
                          <div class="line"></div>
                        </section>
                        <section class="panel panel-info portlet-item">
                          <header class="panel-heading">
                            <ul class="nav nav-pills pull-right">
                                      <li>
                                        <a href="#" class="panel-toggle text-muted"><i class="fa fa-caret-down text-active"></i><i class="fa fa-caret-up text"></i></a>
                                      </li>
                                    </ul>
                            Quick links
                          </header>
                          <div class="list-group bg-white">
                           <?php echo $this->Html->link(__('Edit Line Attendance Summary'), array('action' => 'edit', $lineAttendanceSummary['LineAttendanceSummary']['id']), array('class'=>'list-group-item')); ?> <?php echo $this->Form->postLink(__('Delete Line Attendance Summary'), array('action' => 'delete', $lineAttendanceSummary['LineAttendanceSummary']['id']), array('class'=>'list-group-item'), __('Are you sure you want to delete # %s?', $lineAttendanceSummary['LineAttendanceSummary']['id'])); ?>  <?php echo $this->Html->link(__('List Line Attendance Summaries'), array('action' => 'index'), array('class'=>'list-group-item')); ?> <?php echo $this->Html->link(__('New Line Attendance Summary'), array('action' => 'add'), array('class'=>'list-group-item')); ?>                          </div>
                        </section>
                        <section class="panel panel-info portlet-item">
                          <header class="panel-heading">
                            <ul class="nav nav-pills pull-right">
                                      <li>
                                        <a href="#" class="panel-toggle text-muted"><i class="fa fa-caret-down text-active"></i><i class="fa fa-caret-up text"></i></a>
                                      </li>
                                    </ul>
                            Associated links
                          </header>
                          <div class="list-group bg-white">
                                                    </div>
                        </section>
                        </div>
                      </div>
                    </section>
                  </section>
                </aside>
                <!-- end column 1 -->
                
              </section>
            </section>
          </section>
          <!-- end content view page -->