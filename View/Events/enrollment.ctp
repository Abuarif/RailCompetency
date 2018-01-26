          <ul class="breadcrumb no-border no-radius b-b b-light pull-in">
            <li><a href="<?php echo $this->webroot; ?>"<i class="fa fa-home"></i> Home</a></li>
            <li class="active">My Enrollment List</li>
          </ul>
          <div class="m-b-md">
            <h3 class="m-b-none">My Enrollment List</h3>
          </div>

              <section class="panel panel-default">
                <div class="row wrapper">
                  <div class="col-sm-5 m-b-xs">
                      <div class="btn-group">
                        <button type="button" class="btn btn-sm btn-default" title="Refresh" onclick ='location.reload();'><i class="fa fa-refresh"></i></button>
                      </div>
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
                          <?php echo $this->Form->button('Go!', array('class' => 'btn btn-sm btn-default bg-success'));?>
                        </span>
                    </div>
                    <?php echo $this->Form->end();?>
                  </div>
                </div>
                

              <section class="scrollable wrapper">
                <div class="row">
                      <div class="col-sm-6 portlet">
                        <!-- portlet item -->
                    <?php $iterate = 0; ?>
                    <?php foreach ($events as $event): ?>
                        <?php if ($iterate%2==false) : ?> 
                          <section class="panel panel-default portlet-item">
                            <header class="panel-heading">
                              <ul class="nav nav-pills pull-right">
                                <li>
                                  <a href="#" class="panel-toggle text-muted"><i class="fa fa-caret-down text-active"></i><i class="fa fa-caret-up text"></i></a>
                                </li>
                              </ul>
                              <?php echo $event['Course']['name']; ?><span class="badge bg-info"><?php echo $event['Event']['id'].' - '.$event['Course']['code']; ?></span>                    
                            </header>
                            <section class="panel-body">
                              <article class="media">
                              <div class="media-body">
                                <div class="inline">
                                  <div class="h4 m-t m-b-xs">
                                    <b><?php echo $event['Course']['code'].' - '.$event['Course']['name']; ?></b>&nbsp;
                                </div>                      
                              </div>
                              </article>
                            </section>
                            <footer class="panel-footer bg-info text-center">
                              <div class="row pull-out">
                                <div class="col-xs-4">
                                  <div class="padder-v">
                                    <span class="m-b-xs h3 block text-white">
                                      <?php echo $this->Time->niceShort($event['Event']['start_date']); ?>
                                    </span>
                                    <small class="text-muted">Start Date</small>
                                  </div>
                                </div>
                                <div class="col-xs-4 dk">
                                  <div class="padder-v">
                                    <span class="m-b-xs h3 block text-white">
                                      <?php echo $this->Time->niceShort($event['Event']['end_date']); ?>
                                    </span>
                                    <small class="text-muted">End Date</small>
                                  </div>
                                </div>
                                <div class="col-xs-4">
                                  <div class="padder-v">
                                    <span class="m-b-xs h3 block text-white"><?php echo count($event['EventAttendance']); ?></span>
                                    <small class="text-muted">Participants</small>
                                  </div>
                                </div>
                              </div>
                            </footer>
                          </section>
                        <?php endif; ?>
                      <?php $iterate++; ?>
                    <?php endforeach; ?>
                        <!-- portlet item -->
                      </div>
                      <div class="col-sm-6 portlet">
                        <!-- portlet item -->
                    <?php $iterate2 = 0; ?>
                    <?php foreach ($events as $event): ?>
                        <?php if ($iterate2%2==true) : ?> 
                          <section class="panel panel-default portlet-item">
                            <header class="panel-heading">
                              <ul class="nav nav-pills pull-right">
                                <li>
                                  <a href="#" class="panel-toggle text-muted"><i class="fa fa-caret-down text-active"></i><i class="fa fa-caret-up text"></i></a>
                                </li>
                              </ul>
                              <?php echo $event['Course']['name']; ?><span class="badge bg-info"><?php echo $event['Event']['id'].' - '.$event['Course']['code']; ?></span>                    
                            </header>
                            <section class="panel-body">
                              <article class="media">
                              <div class="media-body">
                                <div class="inline">
                                  <div class="h4 m-t m-b-xs">
                                    <b><?php echo $event['Course']['code'].' - '.$event['Course']['name']; ?></b>&nbsp;
                                </div>                      
                              </div>
                              </article>
                            </section>
                            <footer class="panel-footer bg-info text-center">
                              <div class="row pull-out">
                                <div class="col-xs-4">
                                  <div class="padder-v">
                                    <span class="m-b-xs h3 block text-white">
                                      <?php echo $this->Time->niceShort($event['Event']['start_date']); ?>
                                    </span>
                                    <small class="text-muted">Start Date</small>
                                  </div>
                                </div>
                                <div class="col-xs-4 dk">
                                  <div class="padder-v">
                                    <span class="m-b-xs h3 block text-white">
                                      <?php echo $this->Time->niceShort($event['Event']['end_date']); ?>
                                    </span>
                                    <small class="text-muted">End Date</small>
                                  </div>
                                </div>
                                <div class="col-xs-4">
                                  <div class="padder-v">
                                    <span class="m-b-xs h3 block text-white"><?php echo count($event['EventAttendance']); ?></span>
                                    <small class="text-muted">Participants</small>
                                  </div>
                                </div>
                              </div>
                            </footer>
                          </section>
                        <?php endif; ?>
                      <?php $iterate2++; ?>
                    <?php endforeach; ?>
                        <!-- portlet item -->
                      </div>
                </div>
              </section>
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
									?>                      
                      </small>
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


<?php
  echo $this->Html->script(array(
      // '../theme/LamanPuteri/js/fullcalendar/event_enrollment.js',
  ));
?>
