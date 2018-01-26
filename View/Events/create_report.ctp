<ul class="breadcrumb no-border no-radius b-b b-light pull-in">
	<li><a href="<?php echo $this->webroot; ?>"><i class="fa fa-home"></i> Home</a></li>
	<li class="active"><?php echo __('Attendance Report'); ?></li>
</ul>
<div class="m-b-md">
	<h3 class="m-b-none"><?php echo __('Attendance Report'); ?></h3>
</div>

<section class="panel panel-default ">
    <?php echo $this->Form->create('Event', array('class' => 'form-inline')); ?>
	<div class="panel-body">
	        <div class="form-group">
	          <?php
	          echo $this->Form->input('start_date', array('class' => 'datepicker-input form-control', 'data-date-format' => 'dd-mm-yyyy', 'type' => 'text', 'style' => 'z-index: 100000!important;', 'label' => false, 'placeholder' => 'Start Date'));
	        ?>
	        </div>
	        <div class="form-group">
	          <?php
	          echo $this->Form->input('end_date', array('class' => 'datepicker-input form-control', 'data-date-format' => 'dd-mm-yyyy', 'type' => 'text', 'style' => 'z-index: 100000!important;', 'label' => false, 'placeholder' => 'End Date'));
	        ?>
	        </div>
	        <?php echo $this->Form->button('Submit', array('class' => 'btn btn-primary', 'label' => ' '));?>
	    </div>
	<?php echo $this->Form->end();?>
    <div class="table-responsive">
      <table class="table table-striped b-t b-light" style="overflow-x:auto;overflow-y: hidden">
        <thead>
          <tr>
            <th width="20"><input type="checkbox"></th>
            <th class="th-sortable" data-toggle="class">Project
              <span class="th-sort">
                <i class="fa fa-sort-down text"></i>
                <i class="fa fa-sort-up text-active"></i>
                <i class="fa fa-sort"></i>
              </span>
            </th>
            <th>Task</th>
            <th>Date</th>
            <th width="30"></th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td><input type="checkbox" name="post[]" value="2"></td>
            <td>Idrawfast</td>
            <td>4c</td>
            <td>
              <a href="#" class="active" data-toggle="class"><i class="fa fa-check text-success text-active"></i><i class="fa fa-times text-danger text"></i></a>
            </td>
          </tr>
          
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
          <small class="text-muted inline m-t-sm m-b-sm">showing 20-30 of 50 items</small>
        </div>
        <div class="col-sm-4 text-right text-center-xs">                
          <ul class="pagination pagination-sm m-t-none m-b-none">
            <li><a href="#"><i class="fa fa-chevron-left"></i></a></li>
            <li><a href="#">1</a></li>
            <li><a href="#">2</a></li>
            <li><a href="#">3</a></li>
            <li><a href="#">4</a></li>
            <li><a href="#">5</a></li>
            <li><a href="#"><i class="fa fa-chevron-right"></i></a></li>
          </ul>
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
<section class="panel panel-default">
                    <header class="panel-heading font-bold">Multiple</header>
                    <div class="panel-body">
                      <div id="flot-chart"  style="height:240px"></div>
                    </div>                  
                  </section>
