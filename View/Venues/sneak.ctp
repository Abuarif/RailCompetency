          <ul class="breadcrumb no-border no-radius b-b b-light pull-in">
            <li><a href="<?php echo $this->webroot; ?>"<i class="fa fa-home"></i> Home</a></li>
            <li class="active"><a href="#" onClick="location.reload();">Sneak Preview: <?php echo __('Venue'); ?>'s Details </a></li>
          </ul>
          <div class="m-b-md">
            <h3 class="m-b-none">Sneak Preview: <?php echo __('Venue'); ?>'s Details </h3>
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
			<?php echo h($venue['Venue']['id']); ?>
			&nbsp;
		</p>
		<small class="text-uc text-xs text-muted"><?php echo __('Name'); ?></small>
		<p>
			<?php echo h($venue['Venue']['name']); ?>
			&nbsp;
		</p>
		<small class="text-uc text-xs text-muted"><?php echo __('Location'); ?></small>
		<p>
			<?php echo h($venue['Venue']['location']); ?>
			&nbsp;
		</p>
		<small class="text-uc text-xs text-muted"><?php echo __('Created'); ?></small>
		<p>
			<?php echo h($venue['Venue']['created']); ?>
			&nbsp;
		</p>
		<small class="text-uc text-xs text-muted"><?php echo __('Updated'); ?></small>
		<p>
			<?php echo h($venue['Venue']['updated']); ?>
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
                           <?php echo $this->Html->link(__('Edit Venue'), array('action' => 'edit', $venue['Venue']['id']), array('class'=>'list-group-item')); ?> <?php echo $this->Form->postLink(__('Delete Venue'), array('action' => 'delete', $venue['Venue']['id']), array('class'=>'list-group-item'), __('Are you sure you want to delete # %s?', $venue['Venue']['id'])); ?>  <?php echo $this->Html->link(__('List Venues'), array('action' => 'index'), array('class'=>'list-group-item')); ?> <?php echo $this->Html->link(__('New Venue'), array('action' => 'add'), array('class'=>'list-group-item')); ?>                          </div>
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
                          <?php echo $this->Html->link(__('List Events'), array('controller' => 'events', 'action' => 'index'), array('class' => 'list-group-item')); ?> &nbsp;&nbsp; <?php echo $this->Html->link(__('New Event'), array('controller' => 'events', 'action' => 'add'), array('class' => 'list-group-item')); ?> &nbsp;&nbsp;                           </div>
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