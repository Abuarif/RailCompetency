<style type="text/css">
	.datepicker{z-index:9999 !important}";
</style>

<div class="modal-dialog">
  <div class="modal-content">
  	<?php echo $this->Form->create('StaffTrainingProfile', array('type' => 'file', 'class' => 'bs-example form-horizontal')); 
  		echo $this->Form->input('staff_id');
		echo $this->Form->input('staff_no');
		echo $this->Form->input('name');
		echo $this->Form->input('parent_code');
		echo $this->Form->input('org_code');
		echo $this->Form->input('course_id');
		echo $this->Form->input('code');
		echo $this->Form->input('course_name');
		echo $this->Form->input('start_date');
		echo $this->Form->input('end_date');
		echo $this->Form->input('duration');

		?>
    <div class="modal-header" style="text-align: center;">
      <button type="button" class="close" data-dismiss="modal">&times;</button>
      <h4 class="modal-title"><?php echo __('Add Student Evaluation Form'); ?></h4>
    </div>
    <div class="modal-body">
		For each of the statement below, indicate the number that best describe the participant's behavior during the course.
		<br><br>
		<section class="panel panel-default">
			<table class="table table-striped m-b-none">
				<tr>
					<td>
						&nbsp;
					</td>
					<td>
						&nbsp;
					</td>
					<td class="text-center">
						Poor
					</td>
					<td>
						&nbsp;
					</td>
					<td class="text-center">
						Excellent
					</td>
				</tr>
				<tr>
					<td class="text-center">
						1.
					</td>
					<td>
						Readiness
					</td>
					<td colspan="3" style="text-align:center;">	
					<?php
                        // $options = array('-99' => '&nbsp;View All&nbsp;', '-1' => '&nbsp;Last Month&nbsp;', '0' => '&nbsp;This Month&nbsp;', '1' => '&nbsp;Next Month&nbsp;');
                        $options = array(
                        	'0' => '&nbsp;&nbsp;&nbsp;&nbsp;1&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;',
                        	'1' => '&nbsp;&nbsp;&nbsp;&nbsp;2&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;',
                        	'2' => '&nbsp;&nbsp;&nbsp;&nbsp;3&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;',
                        	'3' => '&nbsp;&nbsp;&nbsp;&nbsp;4&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;');
                        $attributes = array('legend' => false, 'data-toggle'=>'tooltip', 'data-placement'=>'top', 'title'=>'Check to view the events' );
                        echo $this->Form->radio('readiness', $options, $attributes);
                      ?>
                     </td>
				</tr>
				<tr>
					<td class="text-center">
						2.
					</td>
					<td>
						Interest
					</td>
					<td colspan="3" style="text-align:center;">	
					<?php
                        // $options = array('-99' => '&nbsp;View All&nbsp;', '-1' => '&nbsp;Last Month&nbsp;', '0' => '&nbsp;This Month&nbsp;', '1' => '&nbsp;Next Month&nbsp;');
                        $options = array(
                        	'0' => '&nbsp;&nbsp;&nbsp;&nbsp;1&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;',
                        	'1' => '&nbsp;&nbsp;&nbsp;&nbsp;2&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;',
                        	'2' => '&nbsp;&nbsp;&nbsp;&nbsp;3&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;',
                        	'3' => '&nbsp;&nbsp;&nbsp;&nbsp;4&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;');
                        $attributes = array('legend' => false, 'data-toggle'=>'tooltip', 'data-placement'=>'top', 'title'=>'Check to view the events' );
                        echo $this->Form->radio('interest', $options, $attributes);
                      ?>
                     </td>
				</tr>
				<tr>
					<td class="text-center">
						3.
					</td>
					<td>
						Cooperation
					</td>
					<td colspan="3" style="text-align:center;">	
					<?php
                        // $options = array('-99' => '&nbsp;View All&nbsp;', '-1' => '&nbsp;Last Month&nbsp;', '0' => '&nbsp;This Month&nbsp;', '1' => '&nbsp;Next Month&nbsp;');
                        $options = array(
                        	'0' => '&nbsp;&nbsp;&nbsp;&nbsp;1&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;',
                        	'1' => '&nbsp;&nbsp;&nbsp;&nbsp;2&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;',
                        	'2' => '&nbsp;&nbsp;&nbsp;&nbsp;3&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;',
                        	'3' => '&nbsp;&nbsp;&nbsp;&nbsp;4&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;');
                        $attributes = array('legend' => false, 'data-toggle'=>'tooltip', 'data-placement'=>'top', 'title'=>'Check to view the events' );
                        echo $this->Form->radio('cooperation', $options, $attributes);
                      ?>
                     </td>
				</tr>
				<tr>
					<td class="text-center">
						4.
					</td>
					<td>
						Participation
					</td>
					<td colspan="3" style="text-align:center;">	
					<?php
                        // $options = array('-99' => '&nbsp;View All&nbsp;', '-1' => '&nbsp;Last Month&nbsp;', '0' => '&nbsp;This Month&nbsp;', '1' => '&nbsp;Next Month&nbsp;');
                        $options = array(
                        	'0' => '&nbsp;&nbsp;&nbsp;&nbsp;1&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;',
                        	'1' => '&nbsp;&nbsp;&nbsp;&nbsp;2&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;',
                        	'2' => '&nbsp;&nbsp;&nbsp;&nbsp;3&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;',
                        	'3' => '&nbsp;&nbsp;&nbsp;&nbsp;4&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;');
                        $attributes = array('legend' => false, 'data-toggle'=>'tooltip', 'data-placement'=>'top', 'title'=>'Check to view the events' );
                        echo $this->Form->radio('participation', $options, $attributes);
                      ?>
                     </td>
				</tr>
				<tr>
					<td class="text-center">
						5.
					</td>
					<td>
						Ability to apply knowledge
					</td>
					<td colspan="3" style="text-align:center;">	
					<?php
                        // $options = array('-99' => '&nbsp;View All&nbsp;', '-1' => '&nbsp;Last Month&nbsp;', '0' => '&nbsp;This Month&nbsp;', '1' => '&nbsp;Next Month&nbsp;');
                        $options = array(
                        	'0' => '&nbsp;&nbsp;&nbsp;&nbsp;1&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;',
                        	'1' => '&nbsp;&nbsp;&nbsp;&nbsp;2&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;',
                        	'2' => '&nbsp;&nbsp;&nbsp;&nbsp;3&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;',
                        	'3' => '&nbsp;&nbsp;&nbsp;&nbsp;4&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;');
                        $attributes = array('legend' => false, 'data-toggle'=>'tooltip', 'data-placement'=>'top', 'title'=>'Check to view the events' );
                        echo $this->Form->radio('ability', $options, $attributes);
                      ?>
                     </td>
				</tr>
				<tr>
					<td class="text-center">
						6.
					</td>
					<td>
						Attitude
					</td>
					<td colspan="3" style="text-align:center;">	
					<?php
                        // $options = array('-99' => '&nbsp;View All&nbsp;', '-1' => '&nbsp;Last Month&nbsp;', '0' => '&nbsp;This Month&nbsp;', '1' => '&nbsp;Next Month&nbsp;');
                        $options = array(
                        	'0' => '&nbsp;&nbsp;&nbsp;&nbsp;1&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;',
                        	'1' => '&nbsp;&nbsp;&nbsp;&nbsp;2&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;',
                        	'2' => '&nbsp;&nbsp;&nbsp;&nbsp;3&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;',
                        	'3' => '&nbsp;&nbsp;&nbsp;&nbsp;4&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;');
                        $attributes = array('legend' => false, 'data-toggle'=>'tooltip', 'data-placement'=>'top', 'title'=>'Check to view the events' );
                        echo $this->Form->radio('attitude', $options, $attributes);
                      ?>
                     </td>
				</tr>
			</table>
		</section>
		
		<?php echo $this->Form->input('remarks', array('class' => 'form-control', 'style' => 'resize:none;', 'label' => 'COMMENTS :')); ?>
		<br>
		RESULTS : <span style="font-style: italic;"><span style="color: red;">*</span> Note : Please indicate whichever applicable</span>
		<section class="panel panel-default" style="margin-top: 5px;">
			<table class="table table-striped m-b-none">
				<tr>
					<td style="vertical-align: middle;">
						Theory
					</td>	
					<td class="text-center" style="vertical-align: middle;">
						:
					</td>	
					<td style="vertical-align: middle;">
						<div class="input-group">
                          <?php echo $this->Form->input('theory', array('class' => 'form-control', 'style' => 'resize:none;', 'label' => false, 'maxlength' => 3, 'length' => 3)); ?>
                        </div>
					</td>
					<td style="vertical-align: middle;">
						<div class="radio">
                          <label>
                            <input type="radio" name="optionsRadios" id="optionsRadios5" value="pass">
                            PASS
                          </label>
                        </div>
					</td>
					<td style="vertical-align: middle;">
						/
					</td>
					<td style="vertical-align: middle;">
						<div class="radio">
                          <label>
                            <input type="radio" name="optionsRadios" id="optionsRadios6" value="fail">
                            FAIL
                          </label>
                        </div>
					</td>
				</tr>
				<tr>
					<td style="vertical-align: middle;">
						Practical
					</td>	
					<td class="text-center" style="vertical-align: middle;">
						:
					</td>	
					<td style="vertical-align: middle;">
						<div class="input-group">
                          <?php echo $this->Form->input('practical', array('class' => 'form-control', 'style' => 'resize:none;', 'label' => false, 'maxlength' => 3)); ?>
                        </div>
					</td>
					<td style="vertical-align: middle;">
						<div class="radio">
                          <label>
                            <input type="radio" name="optionsRadios" id="optionsRadios5" value="pass">
                            PASS
                          </label>
                        </div>
					</td>
					<td style="vertical-align: middle;">
						/
					</td>
					<td style="vertical-align: middle;">
						<div class="radio">
                          <label>
                            <input type="radio" name="optionsRadios" id="optionsRadios6" value="fail">
                            FAIL
                          </label>
                        </div>
					</td>
				</tr>
				<tr>
					<td style="vertical-align: middle;">
						Recommendation
					</td>	
					<td class="text-center" style="vertical-align: middle;">
						:
					</td>	
					<td style="vertical-align: middle;" colspan="3">
                        <?php $doAction = array('0' => 'NO RECOMMENDATION', '1' => 'REPEAT', '2' => 'RESIT HISTORY', '3' => 'RESIT HISTORICAL'); ?>
                  		<?php echo $this->Form->input('comment', array('options' => $doAction, 'class' => 'input-sm form-control input-s-sm inline v-middle', 'label' => false, 'style' => 'width:200px')); ?>
					</td>
				</tr>
			</table>
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

<script type="text/javascript">
	$('#StaffTrainingProfileStartDate').datepicker({
	     dateFormat: 'dd-mm-yy',
	     minDate: '+5d',
	     changeMonth: true,
	     changeYear: true
	 });
	$('#StaffTrainingProfileEndDate').datepicker({
	     dateFormat: 'dd-mm-yy',
	     minDate: '+5d',
	     changeMonth: true,
	     changeYear: true
	 });
</script>
