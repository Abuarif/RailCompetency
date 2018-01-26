<div class="modal-dialog">
  <div class="modal-content">
  	<?php echo $this->Form->create('StaffTrainingProfile', array('type' => 'file', 'class' => 'bs-example form-horizontal')); 
  		echo $this->Form->hidden('staff_id', array('value' => $staff['Staff']['id']));
  		echo $this->Form->hidden('event_id', array('value' => $event_id));
		echo $this->Form->hidden('staff_no', array('value' => $staff['Staff']['staff_no']));
		echo $this->Form->hidden('name', array('value' => $staff['Staff']['name']));

		echo $this->Form->hidden('parent_code', array('value' => $staff['Staff']['parent_code']));
		echo $this->Form->hidden('org_code', array('value' => $staff['Staff']['org_code']));

		echo $this->Form->hidden('course_id', array('value' => $course['Course']['id']));
		echo $this->Form->hidden('code', array('value' => $course['Course']['code']));
		echo $this->Form->hidden('course_name', array('value' => $course['Course']['name']));

		echo $this->Form->hidden('start_date', array('value' => $this->Time->format($events[0]['Event']['start_date'], '%Y-%m-%d')));
		echo $this->Form->hidden('end_date', array('value' => $this->Time->format($events[0]['Event']['end_date'], '%Y-%m-%d')));

		echo $this->Form->hidden('duration', array('value' => $course['Course']['duration']));
		echo $this->Form->hidden('active', array('value' => 1));
		echo $this->Form->hidden('status', array('value' => 'ATTENDED'));
		echo $this->Form->hidden('comment', array('value' => 'External Training'));
		?>
    <div class="modal-header" style="text-align: center;">
      <button type="button" class="close" data-dismiss="modal">&times;</button>
      <h4 class="modal-title"><?php echo __('Course Completion Confirmation'); ?></h4>
    </div>
    <div class="modal-body">
		<section class="panel panel-default">
			<table class="table table-striped m-b-none">
				<tr>
					<td>
						&nbsp;
					</td>
					<td>
						Name
					</td>
					<td class="text-center">
						Staff Number
					</td>
					<td>
						&nbsp;
					</td>
					<td class="text-center">
						&nbsp;
					</td>
				</tr>
				<tr>
					<td>
						&nbsp;
					</td>
					<td>
						<?php echo $staff['Staff']['name']; ?>
					</td>
					<td class="text-center">
						<?php echo $staff['Staff']['staff_no']; ?>
					</td>
					<td>
						&nbsp;
					</td>
					<td >
						&nbsp;
					</td>
				</tr>
			</table>
		</section>
		
	</div> 
    <div class="modal-footer">
    	<?php echo $this->Layout->sessionFlash(); ?>
    	<a href="#" class="btn btn-default" data-dismiss="modal">Close</a>
    	<?php echo $this->Form->button('Confirm', array('class' => 'btn btn-primary'));?>
    </div>
    	<?php echo $this->Form->end();?>
  </div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
