  <div class="modal-dialog">
  <div class="modal-content">
  	<?php echo $this->Form->create('Event', array('class' => 'form-horizontal')); ?>
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal">&times;</button>
      <h4 class="modal-title"><?php echo __('Copy Participants'); ?></h4>
    </div>
    <div class="modal-body">
			<section class="panel panel-default">
        <div class="row wrapper">
          <!-- <div class="col-lg-4 m-b-xs text-right pull-right">
            <button type="button" class="btn btn-dark btn-sm" data-toggle="modal" data-target="#myModal">
              <i class="fa fa-search"></i>&nbsp;&nbsp;Advanced Search
            </button>
          </div> -->
          <!-- Modal -->
          <?php //echo $this->Form->create('Event', array('class' => 'form-inline','inputDefaults' => array('label' => false, 'div' => false))); ?>
          <!-- <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header" style="text-align:center;">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title" id="myModalLabel">Advanced Search</h4>
                </div>
                <div class="modal-body">
                  
                  <label>Service Line</label>
                  <?php echo $this->Form->input('Event.service_id', array('options' => $services, 'class' => 'form-control input-s-sm inline v-middle', 'empty' => '(choose one)')); ?>

                  <br><br>

                  <label>Start Date</label>
                  <?php
                  echo $this->Form->input('start_date', array('class' => 'datepicker-input form-control', 'data-date-format' => 'dd-mm-yyyy', 'type' => 'text', 'style' => 'width:100%;', 'label' => false, 'placeholder' => 'Start Date'));
                  ?>

                  <br><br>

                  <label>End Date</label>
                  <?php
                  echo $this->Form->input('end_date', array('class' => 'datepicker-input form-control', 'data-date-format' => 'dd-mm-yyyy', 'type' => 'text', 'style' => 'width:100%;', 'label' => false, 'placeholder' => 'End Date'));
                  ?>

                  <br><br>

                  <label>Course Code</label>
                  <?php echo $this->Form->input('queryString', array('class' => 'form-control', 'style' => 'width:100%;', 'placeholder' => 'Course Code')); ?>

                  <br><br>

                  <?php echo $this->Form->checkbox('active', array('data-toggle'=>'tooltip', 'data-placement'=>'bottom', 'title'=>'Click here to view confirmed events.')); ?>&nbsp;Active Event

                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                  <?php echo $this->Form->button('Search', array('class' => 'btn btn-dark'));?>
                </div>
              </div>
            </div>
          </div> -->
          <?php //echo $this->Form->end();?>
          <!-- End Modal -->                
        </div>
        <div class="table-responsive">
          <table class="table table-striped m-b-none" data-ride="datatables">
            <!-- <table class="table table-striped b-t b-light"> -->
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
                  <td><?php echo $this->Form->checkbox('Event.' . $event['Event']['id'] . '.id', array('class' => 'row-select')); ?></td>
                  <td>
                    <?php echo $this->Html->link($event['Course']['code']. ' - '. $event['Course']['name'], array('controller' => 'event_attendances', 'action' => 'nominate', $event['Event']['id'])); ?>
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
            <!-- <div class="col-sm-4 text-left hidden-xs">
              &nbsp; 
            </div> -->
            <div class="col-sm-6 text-center">
              <small class="text-muted inline m-t-sm m-b-sm">
                <?php
                echo $this->Paginator->counter(array(
                  'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
                ));
                ?>                      
              </small>
            </div>
            <div class="col-sm-6 text-right text-center-xs">                
              <ul class="pagination pagination-sm m-t-none m-b-none">
                
                <?php
                  echo '<li>'.$this->Paginator->first(__('First'), array(), null, array('class' => 'prev disabled')).'</li>';
                  echo '<li>'.$this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled')).'</li>';
                  echo '<li>'.$this->Paginator->numbers(array('separator' => '</li>
                                      <li>')).'</li>';
                  echo '<li>'.$this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled')).'</li>';
                  echo '<li>'.$this->Paginator->last(__('Last'), array(), null, array('class' => 'next disabled')).'</li>';
                ?>
              </ul>
            </div>
          </div>
        </footer>
      </section>
    </div>
    <div class="modal-footer">
    	<?php echo $this->Layout->sessionFlash(); ?>
    	<a href="#" class="btn btn-default" data-dismiss="modal">Close</a>
    	<?php echo $this->Form->button('Submit', array('class' => 'btn btn-primary'));?>
    </div>
    	<?php echo $this->Form->end();?>
  </div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->

