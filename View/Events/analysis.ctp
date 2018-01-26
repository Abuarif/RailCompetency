<ul class="breadcrumb no-border no-radius b-b b-light pull-in">
	<li><a href="<?php echo $this->webroot; ?>"><i class="fa fa-home"></i> Home</a></li>
	<li class="active"><?php echo __('Event Analysis Report'); ?></li>
</ul>
<div class="m-b-md">
	<h3 class="m-b-none"><?php echo __('Event Analysis Report'); ?></h3>
</div>

<section class="panel panel-default ">
  <div class="row wrapper">
    <div class="col-lg-4 m-b-xs pull-left">
      &nbsp;      
    </div>
    <div class="col-lg-4 m-b-xs text-right pull-right">
      <button type="button" class="btn btn-dark btn-sm" data-toggle="modal" data-target="#myModal">
        <i class="fa fa-search"></i>&nbsp;&nbsp;Advanced Search
      </button>
    </div>
    <!-- Modal -->
    <?php echo $this->Form->create('Event', array('class' => 'form-inline','inputDefaults' => array('label' => false, 'div' => false))); ?>
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header" style="text-align:center;">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Advanced Search</h4>
          </div>
          <div class="modal-body">
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
    </div>
    <?php echo $this->Form->end();?>
    <!-- End Modal -->
  </div>    
    <div class="table-responsive">
      <table class="table table-striped b-t b-light" style="overflow-x:auto;overflow-y: hidden">
        <thead>
          <tr>
            <th>Date</th>
            <th>Course Code - No of Participant(s) & Trainer(s)</th>
            <th>Total Attendance(s)</th>
          </tr>
        </thead>
        <tbody>
          <!-- iterate over variables -->
          <?php   if (!empty($daily_reports)) { ?>
          <?php foreach ($daily_reports as $date => $events) { ?>
          <?php   if (!empty($events)) { ?>
          <?php $total_participants = 0; ?>
          <tr>
            <td><?php echo $this->Time->format('d-m-Y',$date); ?></td>
            <td>
                <?php     
                  foreach ($events as $event) { 
                    $participants = count($event['EventAttendance']);
                    $trainers = count($event['EventTrainer']);
                    echo $event['Venue']['name'].', '.$event['Venue']['location'].':'.$event['Course']['code'].' - '.$participants.' participant(s) & '.$trainers.' trainer(s) <br/>';
                    $total_participants += $participants;
                    $total_participants += $trainers;
                  }
                ?>
            </td>
            <td>
                <?php echo $total_participants; ?>
            </td>
          </tr>
          <?php   } else { ?>
          <tr>
            <td><?php echo $this->Time->format('d-m-Y',$date); ?></td>
            <td colspan="2">No available event found!</td>
          </tr>
          <?php   } ?>
        <?php } ?>
        <?php } else { ?>
          <tr>
            <td colspan="3">No available event found!</td>
          </tr>
        <?php   } ?>
          <!-- end iterate over variables -->
        </tbody>
      </table>
    </div>
    <footer class="panel-footer">
      <div class="row">
        <div class="col-sm-4 hidden-xs">
          <select class="input-sm form-control input-s-sm inline v-middle">
            <option value="0">Bulk action</option>
            <option value="1">Delete selected</option>
            <option value="2">Bulk edit</option>
            <option value="3">Export</option>
          </select>
          <button class="btn btn-sm btn-default">Apply</button>                  
        </div>
        <div class="col-sm-4 text-center">
          &nbsp;
        </div>
        <div class="col-sm-4 text-right text-center-xs">                
          &nbsp;
        </div>
      </div>
    </footer>
  </section>
</section>


            <?php
	if (!empty($events))
		// echo $date;
	foreach ($events as $event):
		// echo "<br/>";
		// echo $event['Event']['start_date'].' - '.$event['Event']['end_date'].' : '.$event['Course']['code'].' - '.count($event['EventAttendance']);
	endforeach;
?>