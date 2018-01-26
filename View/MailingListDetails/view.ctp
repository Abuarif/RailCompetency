          <ul class="breadcrumb no-border no-radius b-b b-light pull-in">
            <li><a href="<?php echo $this->webroot; ?>"<i class="fa fa-home"></i> Home</a></li>
            <li class="active"><a href="#" onClick="location.reload();"><?php echo __('Mailing List Detail'); ?>'s Details</a></li>
          </ul>
          <div class="m-b-md">
            <h3 class="m-b-none"><?php echo __('Mailing List Detail'); ?>'s Details</h3>
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
			<?php echo h($mailingListDetail['MailingListDetail']['id']); ?>
			&nbsp;
		</p>
		<small class="text-uc text-xs text-muted"><?php echo __('Mailing List'); ?></small>
		<p>
			<?php echo $this->Html->link($mailingListDetail['MailingList']['name'], array('controller' => 'mailing_lists', 'action' => 'view', $mailingListDetail['MailingList']['id'])); ?>
			&nbsp;
		</p>
		<small class="text-uc text-xs text-muted"><?php echo __('Staff'); ?></small>
		<p>
			<?php echo $this->Html->link($mailingListDetail['Staff']['name'], array('controller' => 'staffs', 'action' => 'view', $mailingListDetail['Staff']['id'])); ?>
			&nbsp;
		</p>
		<small class="text-uc text-xs text-muted"><?php echo __('Active'); ?></small>
		<p>
			<?php echo h($mailingListDetail['MailingListDetail']['active']); ?>
			&nbsp;
		</p>
                        </section>
                        <section class="panel panel-info portlet-item">
                          <header class="panel-heading">
                            Quick links
                          </header>
                          <div class="list-group bg-white">
                           <?php echo $this->Html->link(__('Edit Mailing List Detail'), array('action' => 'edit', $mailingListDetail['MailingListDetail']['id']), array('class'=>'list-group-item', 'data-toggle'=>'ajaxModal')); ?> <?php echo $this->Form->postLink(__('Delete Mailing List Detail'), array('action' => 'delete', $mailingListDetail['MailingListDetail']['id']), array('class'=>'list-group-item'), __('Are you sure you want to delete # %s?', $mailingListDetail['MailingListDetail']['id'])); ?>  <?php echo $this->Html->link(__('List Mailing List Details'), array('action' => 'index'), array('class'=>'list-group-item')); ?> <?php echo $this->Html->link(__('New Mailing List Detail'), array('action' => 'add'), array('class'=>'list-group-item', 'data-toggle'=>'ajaxModal', 'escape' => false)); ?>                              </div>
                        </section>
                        <section class="panel panel-info portlet-item">
                          <header class="panel-heading">
                            Associated links
                          </header>
                          <div class="list-group bg-white">
                          <?php echo $this->Html->link(__('List Mailing Lists'), array('controller' => 'mailing_lists', 'action' => 'index'), array('class' => 'list-group-item')); ?> &nbsp;&nbsp; <?php echo $this->Html->link(__('New Mailing List'), array('controller' => 'mailing_lists', 'action' => 'add'), array('class' => 'list-group-item')); ?> &nbsp;&nbsp; <?php echo $this->Html->link(__('List Staffs'), array('controller' => 'staffs', 'action' => 'index'), array('class' => 'list-group-item')); ?> &nbsp;&nbsp; <?php echo $this->Html->link(__('New Staff'), array('controller' => 'staffs', 'action' => 'add'), array('class' => 'list-group-item')); ?> &nbsp;&nbsp;                           </div>
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

