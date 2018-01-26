<ul class="breadcrumb no-border no-radius b-b b-light pull-in">
	<li><a href="<?php echo $this->webroot; ?>"><i class="fa fa-home"></i> Home</a></li>
	<li class="active"><?php echo __('Event Performance Analysis Report'); ?></li>
</ul>
<div class="m-b-md">
	<h3 class="m-b-none"><?php echo __('Event Performance Analysis'); ?></h3>
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
    <section class="panel panel-default">
                    <!-- <header class="panel-heading font-bold">Multiple</header> -->
                    <div class="panel-body">
                      <div id="flot-chart"  style="height:240px"></div>
                    </div>                  
                  </section>
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