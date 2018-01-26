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
			RR/RAD/FM-05
		</td>
	</tr>
</table>

<table style="padding-top: 30px;" cellpadding="0" cellspacing="0">
	<tr style="text-align:center;">
		<td style="font-family: Arial, 'Helvetica Neue', Helvetica, sans-serif;font-size:24px;width:50%;">
			RAIL ACADEMY
		</td>
	</tr>
	<tr style="text-align:center;">
		<td style="background-color:black; color:white;font-family: Arial, 'Helvetica Neue', Helvetica, sans-serif;font-size:23px;width:50%;">
			TRAINING COMPLETION NOTICE
		</td>
	</tr>
</table>
<br>
<table cellpadding="0" cellspacing="0">
	<tr style="height: 40px;">
		<td style=" width: 100px;vertical-align: text-top;">
			Course
		</td>
		<td style="width: 50px;vertical-align: text-top;">
			:
		</td>
		<td style="width: 1000px;vertical-align: text-top;">
			<?php 
				echo $event['Course']['name'] .'('. $event['Course']['code'] .')';
				
				// $trainers = $this->requestAction(
				// 	array('controller' => 'trainers', 
				// 		'action' => 'object', $event['EventTrainer'][0]['trainer_id'])
				// );
			?>
		</td>
	</tr>
	<tr style="height: 40px;">
		<td style=" width: 100px;vertical-align: text-top;">
			Date
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

<span style="text-align: justify;">This is to advise that the staffs below have attended the training on the said dates:</span>
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
		</tr>
	</thead>
	<?php if(!empty($attendees)) {?>
	<?php $count = 1; ?>
	<?php foreach ($attendees as $attendance) { ?>
	<?php 
		$participant = $this->requestAction(
			array('plugin' => 'rail_competency',  'controller' => 'staffs', 
				'action' => 'object', $attendance['EventAttendance']['staff_id'])
		);
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
	</tr>
	<?php $count++; ?>
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
	</tr>
	<?php } ?>
</table>
<br><br>
<span style="text-align: justify;">They are to report back to their own respective department on <?php echo $available_date; ?>.</span>
<br><br>
<?php if(!empty($absentees)) { ?>
<span style="text-align: justify;">However, we wish to inform that the following staffs did not attend the training as scheduled:</span>
<br><br>
<table cellpadding="0" cellspacing="0">
	<?php $count = 1; ?>
	<?php foreach ($absentees as $attendance) { ?>
	<?php 
		$participant = $this->requestAction(
			array('plugin' => 'rail_competency',  'controller' => 'staffs', 
				'action' => 'object', $attendance['EventAttendance']['staff_id'])
		);
	?>

	<tr style="height:25px;">
		<td style="width: 80px; text-align: right;">
			<?php echo $count; ?>.
		</td>
		<td style="width: 1000px; padding-left: 10px;">
			<?php echo ucwords(strtolower($participant['Staff']['name'])); ?>
		</td>
	</tr>
	<?php $count++;
		} 
	} ?>
</table>
<!-- <br><br> -->
<!-- <span style="text-align: justify;">- this blue text will reflect in the memo if the trainees absent during the training.</span> -->
<br><br><br><br><br><br>
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
	?>)
</span>
<br>
<span style="text-align: justify;">Rail Academy</span>