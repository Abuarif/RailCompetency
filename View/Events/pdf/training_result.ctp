<style type="text/css">
    table { page-break-inside:auto }
    tr    { page-break-inside:avoid; page-break-after:auto }
    thead { display:table-header-group }
    tfoot { display:table-footer-group }
</style>

<table>
	 <tr>
		<td style="width: 50%;text-align: left;">
			<?php echo $this->Html->image('http://'.$_SERVER['SERVER_NAME'].Router::url('/')."theme/LamanPuteri/images/prasarana_ico.png", array('height'=> '24', 'width'=>'24')); ?>
			<?php echo $this->Html->image('http://'.$_SERVER['SERVER_NAME'].Router::url('/')."theme/LamanPuteri/images/prasarana_logo_icon.png", array('height'=> '24', 'width'=>'140')); ?>
		</td>
		<td style="width: 50%;text-align: right;">
			RR/RAD/FM-08
		</td>
	</tr>
</table>
<br/>
<table cellpadding="0" cellspacing="0">
	<tr style="height: 30px;">
		<td style=" width: 140px;vertical-align: text-top;">
			Date
		</td>
		<td style="width: 50px;vertical-align: text-top;">
			:
		</td>
		<td style="width: 1000px;vertical-align: text-top;">
			<?php 
				echo date('d F Y'); 
				// echo $this->Time->format($event['Event']['modified'], '%d %B %Y'); 
				?>
			
		</td>
	</tr>
	<tr style="height: 30px;">
		<td style=" width: 140px;vertical-align: text-top;">
			Subject
		</td>
		<td style="width: 50px;vertical-align: text-top;">
			:
		</td>
		<td style="width: 1000px;vertical-align: text-top;">
			Training Result
		</td>
	</tr>
	<tr style="height: 30px;">
		<td style=" width: 140px;vertical-align: text-top;">
			Course
		</td>
		<td style="width: 50px;vertical-align: text-top;">
			:
		</td>
		<td style="width: 1000px;vertical-align: text-top;">
			<?php 
				echo $event['Course']['name'] .'('. $event['Course']['code'] .')';
			?>
		</td>
	</tr>
	<tr style="height: 30px;">
		<td style=" width: 140px;vertical-align: text-top;">
			Training Date
		</td>
		<td style="width: 50px;vertical-align: text-top;">
			:
		</td>
        <td style="width: 1000px;vertical-align: text-top;">
        	<?php if ($event['Course']['duration'] == 1 ) { ?>
            	<?php echo $this->Time->format($event['Event']['start_date'], '%d %B %Y'); ?>
          	<?php } else { ?>
            	<?php echo $this->Time->format($event['Event']['start_date'], '%d').' - '.$this->Time->format($event['Event']['end_date'], '%d %B %Y'); ?>
          	<?php } ?>
        </td>
	</tr>
</table>
<hr/>
<br/>
<span style="text-align: justify;">We are pleased to notify that the following staffs have attended the course on scheduled date. They have fulfilled the course requirement and are now ready for departmental assessment.</span>
<br><br>
<?php if (!empty($passed)) { ?>
<span style="text-align: justify;">Their results as indicated below: </span>
<br><br>
	<table cellpadding="0" cellspacing="0">
		<thead>
			<tr style="height:25px;">
				<td style="width: 80px; border: 1px; border-style: solid; border-color: #000000; text-align: center; background-color: #BDBDBD; border-bottom-color: #BDBDBD;">
					No
				</td>
				<td style="width: 500px; border: 1px; border-style: solid; background-color: #BDBDBD; border-bottom-color: #BDBDBD;">
					<span style="padding-left:5px;">Name</span>
				</td>
				<td style="width: 300px; border: 1px; border-style: solid;text-align: center; background-color: #BDBDBD; border-bottom-color: #BDBDBD;">
					Staff ID
				</td>
				<td style="width: 400px; border: 1px; border-style: solid;text-align: center; background-color: #BDBDBD; border-bottom-color: #BDBDBD;">
					Department
				</td>
				<td style="width: 400px; border: 1px; border-style: solid;text-align: center; background-color: #BDBDBD; border-bottom-color: #BDBDBD;">
					Result
				</td>
			</tr>
		</thead>
		<?php if(!empty($passed)) {?>
		<?php $count = 1; ?>
		<?php foreach ($passed as $attendance) { ?>
		<?php 
			$participant = $this->requestAction(
				array('plugin' => 'rail_competency',  'controller' => 'staffs', 'action' => 'object', $attendance['EventAttendance']['staff_id'])
			);

			$result = $this->requestAction(
				array('plugin' => 'rail_competency', 'controller' => 'staff_training_profiles', 'action' => 'get_result', $attendance['EventAttendance']['staff_id'], $attendance['EventAttendance']['event_id'])
			);

			// if (!empty($result['StaffTrainingProfile']) ) {
			if (!empty($result['StaffTrainingProfile']) && $result['StaffTrainingProfile']['status'] == 'PASSED') {

		?>
		<tr style="height:25px;">
			<td style="width: 80px; border: 1px; border-style: solid; border-color: #000000; text-align: center;">
				<?php echo $count; ?>
			</td>
			<td style="width: 700px; border: 1px; border-style: solid;">
				<span style="padding-left:5px;"><?php echo ucwords(strtolower($participant['Staff']['name'])); ?></span>
			</td>
			<td style="width: 200px; border: 1px; border-style: solid;text-align: center;">
				<?php echo ucwords(strtolower($participant['Staff']['staff_no'])); ?>
			</td>
			<td style="width: 300px; border: 1px; border-style: solid;text-align: center;">
				<?php echo $participant['Staff']['parent_code'].'-'.$participant['Staff']['org_code']; ?>
			</td>
			<td style="width: 300px; border: 1px; border-style: solid;text-align: center;">
				<?php echo (!empty($result['StaffTrainingProfile']) ? $result['StaffTrainingProfile']['status']: 'N/A'); ?>
			</td>
		</tr>
			<?php $count++; ?>
			<?php } ?>
		<?php } ?>
		<?php } else { ?>
		<tr style="height:25px;">
			<td style="width: 80px; border: 1px; border-style: solid; border-color: #000000; text-align: center;">
				&nbsp;
			</td>
			<td style="width: 700px; border: 1px; border-style: solid;">
				&nbsp;
			</td>
			<td style="width: 200px; border: 1px; border-style: solid;text-align: center;">
				&nbsp;
			</td>
			<td style="width: 300px; border: 1px; border-style: solid;text-align: center;">
				&nbsp;
			</td>
			<td style="width: 300px; border: 1px; border-style: solid;text-align: center;">
				&nbsp;
			</td>
		</tr>
		<tr style="height:25px;">
			<td style="width: 80px; border: 1px; border-style: solid; border-color: #000000; text-align: center;">
				&nbsp;
			</td>
			<td style="width: 700px; border: 1px; border-style: solid;">
				&nbsp;
			</td>
			<td style="width: 200px; border: 1px; border-style: solid;text-align: center;">
				&nbsp;
			</td>
			<td style="width: 300px; border: 1px; border-style: solid;text-align: center;">
				&nbsp;
			</td>
			<td style="width: 300px; border: 1px; border-style: solid;text-align: center;">
				&nbsp;
			</td>
		</tr>
		<tr style="height:25px;">
			<td style="width: 80px; border: 1px; border-style: solid; border-color: #000000; text-align: center;">
				&nbsp;
			</td>
			<td style="width: 700px; border: 1px; border-style: solid;">
				&nbsp;
			</td>
			<td style="width: 200px; border: 1px; border-style: solid;text-align: center;">
				&nbsp;
			</td>
			<td style="width: 300px; border: 1px; border-style: solid;text-align: center;">
				&nbsp;
			</td>
			<td style="width: 300px; border: 1px; border-style: solid;text-align: center;">
				&nbsp;
			</td>
		</tr>
		<tr style="height:25px;">
			<td style="width: 80px; border: 1px; border-style: solid; border-color: #000000; text-align: center;">
				&nbsp;
			</td>
			<td style="width: 700px; border: 1px; border-style: solid;">
				&nbsp;
			</td>
			<td style="width: 200px; border: 1px; border-style: solid;text-align: center;">
				&nbsp;
			</td>
			<td style="width: 300px; border: 1px; border-style: solid;text-align: center;">
				&nbsp;
			</td>
			<td style="width: 300px; border: 1px; border-style: solid;text-align: center;">
				&nbsp;
			</td>
		</tr>
		<tr style="height:25px;">
			<td style="width: 80px; border: 1px; border-style: solid; border-color: #000000; text-align: center;">
				&nbsp;
			</td>
			<td style="width: 700px; border: 1px; border-style: solid;">
				&nbsp;
			</td>
			<td style="width: 200px; border: 1px; border-style: solid;text-align: center;">
				&nbsp;
			</td>
			<td style="width: 300px; border: 1px; border-style: solid;text-align: center;">
				&nbsp;
			</td>
			<td style="width: 300px; border: 1px; border-style: solid;text-align: center;">
				&nbsp;
			</td>
		</tr>
		<tr style="height:25px;">
			<td style="width: 80px; border: 1px; border-style: solid; border-color: #000000; text-align: center;">
				&nbsp;
			</td>
			<td style="width: 700px; border: 1px; border-style: solid;">
				&nbsp;
			</td>
			<td style="width: 200px; border: 1px; border-style: solid;text-align: center;">
				&nbsp;
			</td>
			<td style="width: 300px; border: 1px; border-style: solid;text-align: center;">
				&nbsp;
			</td>
			<td style="width: 300px; border: 1px; border-style: solid;text-align: center;">
				&nbsp;
			</td>
		</tr>
		<tr style="height:25px;">
			<td style="width: 80px; border: 1px; border-style: solid; border-color: #000000; text-align: center;">
				&nbsp;
			</td>
			<td style="width: 700px; border: 1px; border-style: solid;">
				&nbsp;
			</td>
			<td style="width: 200px; border: 1px; border-style: solid;text-align: center;">
				&nbsp;
			</td>
			<td style="width: 300px; border: 1px; border-style: solid;text-align: center;">
				&nbsp;
			</td>
			<td style="width: 300px; border: 1px; border-style: solid;text-align: center;">
				&nbsp;
			</td>
		</tr>
		<?php } ?>
	</table>
<br><br>
<?php } ?>
<?php if (!empty($failed)) { ?>
<span style="text-align: justify;">The following staff have failed to achieve the minimum course requirement. Their results as indicated below: </span>
<br><br>
	<table cellpadding="0" cellspacing="0">
		<thead>
			<tr style="height:25px;">
				<td style="width: 80px; border: 1px; border-style: solid; border-color: #000000; text-align: center; background-color: #BDBDBD; border-bottom-color: #BDBDBD;">
					No
				</td>
				<td style="width: 500px; border: 1px; border-style: solid; background-color: #BDBDBD; border-bottom-color: #BDBDBD;">
					<span style="padding-left:5px;">Name</span>
				</td>
				<td style="width: 300px; border: 1px; border-style: solid;text-align: center; background-color: #BDBDBD; border-bottom-color: #BDBDBD;">
					Staff ID
				</td>
				<td style="width: 400px; border: 1px; border-style: solid;text-align: center; background-color: #BDBDBD; border-bottom-color: #BDBDBD;">
					Department
				</td>
				<td style="width: 400px; border: 1px; border-style: solid;text-align: center; background-color: #BDBDBD; border-bottom-color: #BDBDBD;">
					Result
				</td>
				<td style="width: 400px; border: 1px; border-style: solid;text-align: center; background-color: #BDBDBD; border-bottom-color: #BDBDBD;">
					Recommendation
				</td>
			</tr>
		</thead>
		<?php if(!empty($failed)) {?>
		<?php $count = 1; ?>
		<?php foreach ($failed as $attendance) { ?>
		<?php 
			$participant = $this->requestAction(
				array('plugin' => 'rail_competency',  'controller' => 'staffs', 
					'action' => 'object', $attendance['EventAttendance']['staff_id'])
			);

			$result = $this->requestAction(
				array('plugin' => 'rail_competency', 'controller' => 'staff_training_profiles', 'action' => 'get_result', $attendance['EventAttendance']['staff_id'], $attendance['EventAttendance']['event_id'])
			);

			if (!empty($result['StaffTrainingProfile']) && $result['StaffTrainingProfile']['status'] == 'FAILED') {
		?>
		<tr style="height:25px;">
			<td style="width: 80px; border: 1px; border-style: solid; border-color: #000000; text-align: center;">
				<?php echo $count; ?>
			</td>
			<td style="width: 700px; border: 1px; border-style: solid;">
				<span style="padding-left:5px;"><?php echo ucwords(strtolower($participant['Staff']['name'])); ?></span>
			</td>
			<td style="width: 200px; border: 1px; border-style: solid;text-align: center;">
				<?php echo ucwords(strtolower($participant['Staff']['staff_no'])); ?>
			</td>
			<td style="width: 300px; border: 1px; border-style: solid;text-align: center;">
				<?php echo $participant['Staff']['parent_code'].'-'.$participant['Staff']['org_code']; ?>
			</td>
			<td style="width: 200px; border: 1px; border-style: solid;text-align: center;">
				<?php echo (!empty($result['StaffTrainingProfile']) ? $result['StaffTrainingProfile']['status']: 'N/A'); ?>
			</td>
			<td style="width: 200px; border: 1px; border-style: solid;text-align: center;">
				<?php echo (!empty($result['StaffTrainingProfile']) ? $result['StaffTrainingProfile']['comment']: 'N/A'); ?>
			</td>
		</tr>
			<?php $count++; ?>
			<?php } ?>
		<?php } ?>
		<?php }else{ ?>
		<tr style="height:25px;">
			<td style="width: 80px; border: 1px; border-style: solid; border-color: #000000; text-align: center;">
				&nbsp;
			</td>
			<td style="width: 700px; border: 1px; border-style: solid;">
				&nbsp;
			</td>
			<td style="width: 200px; border: 1px; border-style: solid;text-align: center;">
				&nbsp;
			</td>
			<td style="width: 300px; border: 1px; border-style: solid;text-align: center;">
				&nbsp;
			</td>
			<td style="width: 300px; border: 1px; border-style: solid;text-align: center;">
				&nbsp;
			</td>
			<td style="width: 300px; border: 1px; border-style: solid;text-align: center;">
				&nbsp;
			</td>
		</tr>
		<tr style="height:25px;">
			<td style="width: 80px; border: 1px; border-style: solid; border-color: #000000; text-align: center;">
				&nbsp;
			</td>
			<td style="width: 700px; border: 1px; border-style: solid;">
				&nbsp;
			</td>
			<td style="width: 200px; border: 1px; border-style: solid;text-align: center;">
				&nbsp;
			</td>
			<td style="width: 300px; border: 1px; border-style: solid;text-align: center;">
				&nbsp;
			</td>
			<td style="width: 300px; border: 1px; border-style: solid;text-align: center;">
				&nbsp;
			</td>
			<td style="width: 300px; border: 1px; border-style: solid;text-align: center;">
				&nbsp;
			</td>
		</tr>
		<tr style="height:25px;">
			<td style="width: 80px; border: 1px; border-style: solid; border-color: #000000; text-align: center;">
				&nbsp;
			</td>
			<td style="width: 700px; border: 1px; border-style: solid;">
				&nbsp;
			</td>
			<td style="width: 200px; border: 1px; border-style: solid;text-align: center;">
				&nbsp;
			</td>
			<td style="width: 300px; border: 1px; border-style: solid;text-align: center;">
				&nbsp;
			</td>
			<td style="width: 300px; border: 1px; border-style: solid;text-align: center;">
				&nbsp;
			</td>
			<td style="width: 300px; border: 1px; border-style: solid;text-align: center;">
				&nbsp;
			</td>
		</tr>
		<tr style="height:25px;">
			<td style="width: 80px; border: 1px; border-style: solid; border-color: #000000; text-align: center;">
				&nbsp;
			</td>
			<td style="width: 700px; border: 1px; border-style: solid;">
				&nbsp;
			</td>
			<td style="width: 200px; border: 1px; border-style: solid;text-align: center;">
				&nbsp;
			</td>
			<td style="width: 300px; border: 1px; border-style: solid;text-align: center;">
				&nbsp;
			</td>
			<td style="width: 300px; border: 1px; border-style: solid;text-align: center;">
				&nbsp;
			</td>
			<td style="width: 300px; border: 1px; border-style: solid;text-align: center;">
				&nbsp;
			</td>
		</tr>
		<?php } ?>
	</table>
<br><br>
<?php } ?>
<?php if($event['Course']['hasPTE']) { ?>
<span style="text-align: justify;">Attached is the Post Training Evaluation (PTE) form for your assessment. Completed form should be returned to Rail Academy (1) one month from the date of this notice.</span>
<br><br>
<span style="text-align: justify;">Rail Academy will inform the result to department whether the staff is qualified/ not qualified to perform the job function assigned.</span>
<br><br>
<?php } ?>
<span style="text-align: justify;">We appreciate your cooperation to ensure the acquired knowledge and skill of the staff is being put into practice accordingly.</span>
<br><br>

<br><br>
<span style="text-align: justify;">Regards,</span>
<br>
<span style="text-align: justify;">(
	<?php 
		// print all course trainers
		$assist_trainer = false;
		$count = 1;
		foreach ($event['EventTrainer'] as $eventTrainer) {
			$trainers = $this->requestAction(
				array('controller' => 'trainers', 
					'action' => 'object', $eventTrainer['trainer_id']));
			// pr($trainers);
			$staff = $this->requestAction(
				array('controller' => 'staffs', 
					'action' => 'object', $trainers['Trainer']['staff_id']));
			// pr($staff);
			if ($count > 1) echo ' / ';
			echo ucwords(strtolower($staff['Staff']['name']));	
			$count++;
		}
		
		// echo $trainers['Staff']['name'];
	?> )
</span>
<br>
<span style="text-align: justify;">Rail Academy</span>