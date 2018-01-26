<div class="modal-dialog">
  <div class="modal-content">
  	<?php echo $this->Form->create('StaffTrainingProfile', array('type' => 'file', 'class' => 'bs-example form-horizontal'));
  	// pr($myRecord);
  		echo $this->Form->hidden('id', array('value' => $myRecord['StaffTrainingProfile']['id']));

		?>
    <div class="modal-header" style="text-align: center;">
      <button type="button" class="close" data-dismiss="modal">&times;</button>
      <h4 class="modal-title"><?php echo __('Add Student Evaluation Form'); ?></h4>
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
						<?php echo $myRecord['Staff']['name']; ?>
					</td>
					<td class="text-center">
						<?php echo $myRecord['Staff']['staff_no']; ?>
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
                        $attributes = array('legend' => false, 'data-toggle'=>'tooltip', 'data-placement'=>'top', 'title'=>'Readiness', 'value' => $myRecord['StaffTrainingProfile']['readiness'] );
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
                        $attributes = array('legend' => false, 'data-toggle'=>'tooltip', 'data-placement'=>'top', 'title'=>'Interest' , 'value' => $myRecord['StaffTrainingProfile']['interest']);
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
                        $attributes = array('legend' => false, 'data-toggle'=>'tooltip', 'data-placement'=>'top', 'title'=>'Cooperation', 'value' => $myRecord['StaffTrainingProfile']['cooperation'] );
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
                        $attributes = array('legend' => false, 'data-toggle'=>'tooltip', 'data-placement'=>'top', 'title'=>'Participation', 'value' => $myRecord['StaffTrainingProfile']['participation'] );
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
                        $attributes = array('legend' => false, 'data-toggle'=>'tooltip', 'data-placement'=>'top', 'title'=>'Ability to apply knowledge', 'value' => $myRecord['StaffTrainingProfile']['ability'] );
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
                        $attributes = array('legend' => false, 'data-toggle'=>'tooltip', 'data-placement'=>'top', 'title'=>'Attitude', 'value' => $myRecord['StaffTrainingProfile']['attitude'] );
                        echo $this->Form->radio('attitude', $options, $attributes);
                      ?>
                     </td>
				</tr>
			</table>
		</section>
		
		<?php echo $this->Form->input('remarks', array('class' => 'form-control', 'style' => 'resize:none;', 'label' => 'COMMENTS :', 'value' => $myRecord['StaffTrainingProfile']['remarks'])); ?>
		<br>
		RESULTS : <span style="font-style: italic;"><span style="color: red;">*</span> Note : Please indicate whichever applicable</span>
		<section class="panel panel-default" style="margin-top: 5px;">
			<table class="table table-striped m-b-none">
				<tr>
					<td style="vertical-align: middle;">
						Theory (%)
					</td>	
					<td class="text-center" style="vertical-align: middle;">
						:
					</td>	
					<td style="vertical-align: middle;">
						<div class="input-group">
                          <?php echo $this->Form->input('theory', array('class' => 'form-control', 'style' => 'resize:none;', 'label' => false, 'maxlength' => 3, 'length' => 3, 'value' => $myRecord['StaffTrainingProfile']['theory'])); ?>
                        </div>
					</td>
					<td style="vertical-align: middle;">
						<!-- <div class="radio">
                          <label>
                            <input type="radio" name="optionsRadios" id="optionsRadios5" value="pass">
                            PASS
                          </label>
                        </div> -->
					</td>
					<td style="vertical-align: middle;">
						<!-- / -->
					</td>
					<td style="vertical-align: middle;">
						<!-- <div class="radio">
                          <label>
                            <input type="radio" name="optionsRadios" id="optionsRadios6" value="fail">
                            FAIL
                          </label>
                        </div> -->
					</td>
				</tr>
				<tr>
					<td style="vertical-align: middle;">
						Practical (%)
					</td>	
					<td class="text-center" style="vertical-align: middle;">
						:
					</td>	
					<td style="vertical-align: middle;">
						<div class="input-group">
                          <?php echo $this->Form->input('practical', array('class' => 'form-control', 'style' => 'resize:none;', 'label' => false, 'maxlength' => 3, 'value' => $myRecord['StaffTrainingProfile']['practical'])); ?>
                        </div>
					</td>
					<td style="vertical-align: middle;">
						<!-- <div class="radio">
                          <label>
                            <input type="radio" name="optionsRadios" id="optionsRadios5" value="pass">
                            PASS
                          </label>
                        </div> -->
					</td>
					<td style="vertical-align: middle;">
						<!-- / -->
					</td>
					<td style="vertical-align: middle;">
						<!-- <div class="radio">
                          <label>
                            <input type="radio" name="optionsRadios" id="optionsRadios6" value="fail">
                            FAIL
                          </label>
                        </div> -->
					</td>
				</tr>
				<tr>
					<td style="vertical-align: middle;">
						Overall Result
					</td>	
					<td class="text-center" style="vertical-align: middle;">
						:
					</td>	
					<td colspan="4" style="text-align:left;">	
					<?php
                        // $options = array('-99' => '&nbsp;View All&nbsp;', '-1' => '&nbsp;Last Month&nbsp;', '0' => '&nbsp;This Month&nbsp;', '1' => '&nbsp;Next Month&nbsp;');
                        $options = array(
                        	'PASSED' => '&nbsp;&nbsp;&nbsp;&nbsp;PASS&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;',
                        	'FAILED' => '&nbsp;&nbsp;&nbsp;&nbsp;FAIL&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;',
                        	);
                        $attributes = array('legend' => false, 'data-toggle'=>'tooltip', 'data-placement'=>'top', 'title'=>'Check to view the events', 'value' => $myRecord['StaffTrainingProfile']['status'] );
                        echo $this->Form->radio('status', $options, $attributes);
                      ?>
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
                        <?php $options = array(
                        'NO RECOMMENDATION' => 'NO RECOMMENDATION', 
                        'REPEAT' => 'REPEAT', 
                        'RESIT THEORY' => 'RESIT THEORY', 
                        'RESIT PRACTICAL' => 'RESIT PRACTICAL'
                        ); ?>
                  		<?php echo $this->Form->input('comment', array('options' => $options, 'class' => 'input-sm form-control input-s-sm inline v-middle', 'label' => false, 'style' => 'width:200px', 'value' => $myRecord['StaffTrainingProfile']['comment'])); ?>
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
