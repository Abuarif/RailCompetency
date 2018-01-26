<style>

/* style sheet for "A4" printing */
 /*@media print and (width: 21cm) and (height: 29.7cm) {
    @page .print-landscape-a4 {
       margin: 3cm;
       size: A4 landscape;
    }
 }*/
@page {
    size: A4 portrait; /* can use also 'landscape' 'portrait' for orientation */
    margin-top: 5.0mm;
    margin-right: 10.0mm;
    margin-left: 10.0mm;
    margin-bottom: 5.0mm;

   /* @bottom-center {
            content: element(footer);
    }

    @top-center {
            content: element(header);
    }*/
  }

#parent{
    height: 100%;
    width: 100%;
    overflow: hidden;
    position: relative;
}

#child{
    position: absolute;
    top: 0;
    bottom: 0;
    left: 0;
    right: -17px; /* Increase/Decrease this value for cross-browser compatibility */
    overflow-y: scroll;
}

</style>

<style type="text/css">
   table { page-break-inside:auto }
   tr    { page-break-inside:avoid; page-break-after:auto }

</style>


<script>
  // window.print(); 
  setTimeout(function () { window.print(); }, 500);
  window.onfocus = function () { setTimeout(function () { window.close(); }, 500); }
</script>


<table style="width:100%;" cellpadding="0" cellspacing="0">
  <tr style="text-align:center;">
  <tr>
    <td style="width: 50%;text-align: left;">
      <?php echo $this->Html->image('http://'.$_SERVER['SERVER_NAME'].Router::url('/')."theme/LamanPuteri/images/prasarana_ico.png", array('height'=> '24', 'width'=>'24')); ?>
      <?php echo $this->Html->image('http://'.$_SERVER['SERVER_NAME'].Router::url('/')."theme/LamanPuteri/images/prasarana_logo_icon.png", array('height'=> '24', 'width'=>'140')); ?>
    </td>
    <td style="width: 50%;text-align: right;">
      < Doc ref >
    </td>
  </tr>
</table>

<table style="width:100%;" cellpadding="0" cellspacing="0">
  <tr style="text-align:center;">
    <td style="font-family: Arial, 'Helvetica Neue', Helvetica, sans-serif;font-size:24px;width:50%;">
      RAIL ACADEMY
    </td>
  </tr>
  <tr style="text-align:center;">
    <td style="font-family: Arial, 'Helvetica Neue', Helvetica, sans-serif;font-size:23px;width:50%;">
      STUDENT EVALUATION
    </td>
  </tr>
</table>
<br>

<section class="panel panel-default">
	<table class="table table-striped m-b-none">
		<tr>
			<td class="text-center" width="30%">
				Staff Number
			</td>
			<td class="text-center">
				Name
			</td>
			<td>
				&nbsp;
			</td>
			<td>
				&nbsp;
			</td>
		</tr>
		<tr>
			<td class="text-center" width="15%">
				<?php echo $staff['Staff']['staff_no']; ?>
			</td>
			<td class="text-center" width="40%">
				<?php echo $staff['Staff']['name']; ?>
			</td>
			<td>
				&nbsp;
			</td>
			<td >
				&nbsp;
			</td>
		</tr>
	</table><br/>
	<table class="table table-striped m-b-none">
		<tr>
			<td class="text-center" width="15%">
				Course Code
			</td>
			<td class="text-center" width="40%">
				Course Name
			</td>
			<td class="text-center" width="15%">
				Start Date
			</td>
			<td class="text-center" width="15%">
				End Date
			</td>
		</tr>
		<tr>
			<td class="text-center">
				<?php echo $course['Course']['code']; ?>
			</td>
			<td class="text-center">
				<?php echo $course['Course']['name']; ?>
			</td>
			<td class="text-center">
				<?php echo $this->Time->format('d-m-Y', $myRecord['StaffTrainingProfile']['start_date']); ?>
			</td>
			<td class="text-center">
				<?php echo $this->Time->format('d-m-Y', $myRecord['StaffTrainingProfile']['end_date']); ?>
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

<?php echo $this->Form->input('remarks', array('class' => 'form-control', 'rows' => '5' ,'style' => 'resize:none;', 'label' => 'COMMENTS :', 'value' => $myRecord['StaffTrainingProfile']['remarks'])); ?>
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
				if ($course['Course']['isRefresher'] == 0) {
                	$options = array(
	                	'PASSED' => '&nbsp;&nbsp;&nbsp;&nbsp;PASS&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;',
	                	'FAILED' => '&nbsp;&nbsp;&nbsp;&nbsp;FAIL&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;',
	                	'ATTENDED' => '&nbsp;&nbsp;&nbsp;&nbsp;ATTENDED&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;',
                	);
                } else {
                	$options = array(
	                	'EXCELLENT' => '&nbsp;&nbsp;&nbsp;&nbsp;EXCELLENT&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;',
	                	'GOOD' => '&nbsp;&nbsp;&nbsp;&nbsp;GOOD&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;',
	                	'AVERAGE' => '&nbsp;&nbsp;&nbsp;&nbsp;AVERAGE&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;',
	                	'POOR' => '&nbsp;&nbsp;&nbsp;&nbsp;POOR&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;',
                	);
            	}
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

<?php if (!empty($assignedTrainers)) { ?>
<section class="panel panel-default">
	<table class="table table-striped m-b-none">
		<tr>
			<td>
				&nbsp;
			</td>
			<td class="text-center" width="30%">
				Prepared By
			</td>
			<td class="text-center">
				<?php 
				foreach ($assignedTrainers as $assignedTrainer) {
					echo $assignedTrainer['Staff']['name'].'<br/>';
				}
				?>
			</td>
			<td>
				&nbsp;
			</td>
			<td>
				&nbsp;
			</td>
		</tr>
	</table>
</section>
<?php } ?>
		

	