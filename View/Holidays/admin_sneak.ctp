          <ul class="breadcrumb no-border no-radius b-b b-light pull-in">
            <li><a href="<?php echo $this->webroot; ?>"<i class="fa fa-home"></i> Home</a></li>
            <li class="active"><a href="#" onClick="location.reload();">Sneak Preview: <?php echo __('Holiday'); ?>'s Details </a></li>
          </ul>
          <div class="m-b-md">
            <h3 class="m-b-none">Sneak Preview: <?php echo __('Holiday'); ?>'s Details </h3>
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
                            		<small class="text-uc text-xs text-muted"><?php echo __('Id'); ?></small>
		<p>
			<?php echo h($holiday['Holiday']['id']); ?>
			&nbsp;
		</p>
		<small class="text-uc text-xs text-muted"><?php echo __('Name'); ?></small>
		<p>
			<?php echo h($holiday['Holiday']['name']); ?>
			&nbsp;
		</p>
		<small class="text-uc text-xs text-muted"><?php echo __('Start Date'); ?></small>
		<p>
			<?php echo h($holiday['Holiday']['start_date']); ?>
			&nbsp;
		</p>
		<small class="text-uc text-xs text-muted"><?php echo __('Active'); ?></small>
		<p>
			<?php echo h($holiday['Holiday']['active']); ?>
			&nbsp;
		</p>
		<small class="text-uc text-xs text-muted"><?php echo __('Created'); ?></small>
		<p>
			<?php echo h($holiday['Holiday']['created']); ?>
			&nbsp;
		</p>
		<small class="text-uc text-xs text-muted"><?php echo __('Modified'); ?></small>
		<p>
			<?php echo h($holiday['Holiday']['modified']); ?>
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
                           <?php echo $this->Html->link(__('Edit Holiday'), array('action' => 'edit', $holiday['Holiday']['id']), array('class'=>'list-group-item')); ?> <?php echo $this->Form->postLink(__('Delete Holiday'), array('action' => 'delete', $holiday['Holiday']['id']), array('class'=>'list-group-item'), __('Are you sure you want to delete # %s?', $holiday['Holiday']['id'])); ?>  <?php echo $this->Html->link(__('List Holidays'), array('action' => 'index'), array('class'=>'list-group-item')); ?> <?php echo $this->Html->link(__('New Holiday'), array('action' => 'add'), array('class'=>'list-group-item')); ?>                          </div>
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