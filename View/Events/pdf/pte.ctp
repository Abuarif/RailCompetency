<style type="text/css">
    table { page-break-inside:auto }
    tr    { page-break-inside:avoid; page-break-after:auto }
    thead { display:table-header-group }
    tfoot { display:table-footer-group }
</style>

<?php

	// Change Memo title according to course code
	// GC - General Course Training 
	// K - KJ Line Operational and System Training
	// A - AG Line Operational and System Training
	// M - MR Line Operational and System Training
	// AFC - AFC System Maintenance Training

	// $signature = 0; 
	// if ($event['Course']['service_id']) == 7) {
	// 	$title = 'GENERAL COURSE TRAINING';
	// } else if ($event['Course']['service_id']) === 7) {
	// 	$title = 'AFC SYSTEM MAINTENANCE TRAINING';
	// } else if ($event['Course']['service_id']) === 7) {
	// 	$title = 'AG LINE OPERATIONAL AND SYSTEM TRAINING';
	// } else if ($event['Course']['service_id']) === 7) {
	// 	$title = 'KJ LINE OPERATIONAL AND SYSTEM TRAINING';
	// } else if ($event['Course']['service_id']) === 7) {
	// 	$title = 'MR LINE OPERATIONAL AND SYSTEM TRAINING';
	// } else if ($event['Course']['service_id']) === 7) {
	// 	$title = 'MRT LINE OPERATIONAL AND SYSTEM TRAINING';
	// 	$signature = 1;
	// }
?>
		<table style="border:none;text-align:left;width:100%;" cellpadding="0" cellspacing="0">
		    <tr>
		    	<td style="font-family: Arial, 'Helvetica Neue', Helvetica, sans-serif;font-style:italic;font-size:33px;width:50%;">
		    		Memorandum
		    	</td>
		    	<td style="width:50%;" colspan="3" rowspan="1">
		    		<!-- <img src="<?php echo $this->webroot; ?>theme/LamanPuteri/images/rapidrailheader.jpeg" height="120px" width="319px"> -->
		    		<?php	
							// echo $this->Html->image($this->webroot."theme/LamanPuteri/images/rapidrailheader.jpeg", array('height'=> '120px', 'width'=>'319px'));
							echo $this->Html->image('http://'.$_SERVER['SERVER_NAME'].Router::url('/')."theme/LamanPuteri/images/rapidrailheader.jpeg", array('height'=> '120px', 'width'=>'319px'));
						?>
		    	</td>
		    </tr>
		</table>
		<table style="none;text-align:left;width:100%;padding-top:15px;" cellpadding="0" cellspacing="0">
			<tr>
				<td style="height:25px;width:100px;">
					Our Ref.
				</td>
				<td style="height:25px;width:50px;text-align:center;">
					:
				</td>
				<td style="height:25px;width:400px;padding-left:30px;font-weight;">
					RAD/PTE/<?php echo $event['EventPte'][0]['ref_number']; ?> - <?php echo $this->Time->format($event['EventPte'][0]['modified'], '%Y'); ?>-<?php echo $event['Course']['code']; ?>
				</td>
			</tr>
			<tr>
				<td style="height:25px;width:100px;">
					Date
				</td>
				<td style="height:25px;width:50px;text-align:center;">
					:
				</td>
				<td style="height:25px;width:400px;padding-left:30px;font-weight;">
					<?php echo $this->Time->format($event['EventPte'][0]['modified'], '%d %B %Y'); ?>
				</td>
			</tr>
			<tr>
				<td style="height:25px;width:100px;">
					To
				</td>
				<td style="height:25px;width:50px;text-align:center;">
					:
				</td>
				<td style="height:25px;width:400px;padding-left:30px;font-weight;">
					<?php $myService = $this->requestAction('/rail_competency/services/object/'.$event['Course']['service_id']); echo $myService['Service']['memo_header']; ?>
				</td>
			</tr>
			<tr>
				<td style="height:25px;width:100px;">
					From
				</td>
				<td style="height:25px;width:50px;text-align:center;">
					:
				</td>
				<td style="height:25px;width:400px;padding-left:30px;font-weight;">
					<?php if ($event['Course']['cost_pax'] > 0.00 || $event['Course']['total_cost'] > 0.00) { ?>
						Zaki Mohamad
					<?php } else { ?>
						<?php if ($event['Course']['service_id']== 6) { ?>
						Abdul Hadi bin Ibrahim
							<?php } else { ?>
						Norhaslita Ramli
						<?php } ?>
					<?php } ?>
				</td>
			</tr>
			<tr>
				<td style="height:25px;width:100px;">
					Subject
				</td>
				<td style="height:25px;width:50px;text-align:center;">
					:
				</td>
				<td style="height:25px;width:400px;padding-left:30px;font-weight:bold;">
					<?php $myService = $this->requestAction('/rail_competency/services/object/'.$event['Course']['service_id']); echo $myService['Service']['memo_header']; ?> POST TRAINING EVALUATION:
				</td>
			</tr>
			<tr>
				<td style="height:0px;width:100px;">
					&nbsp;
				</td>
				<td style="height:0px;width:50px;">
					&nbsp;
				</td>
				<td style="height:0px;width:400px;padding-left:30px;font-weight:bold;">
					<?php echo $event['Course']['name'].' '.$event['Event']['details']; ?> 
				</td>
			</tr>
		</table>
		<br>
		<hr>
		<table style="none;text-align:left;width:100%;padding-top:15px;" cellpadding="0" cellspacing="0">
		<?php if (!empty($event['EventPte'][0]['note1'])) { ?>
			<tr>
				<td style="height:70px;">
					<div style="text-align:justify;">
						<?php echo $event['EventPte'][0]['note1']; ?>
					</div>
				</td>
			</tr>
		<?php } ?>
		<!-- 	<tr>
				<td style="height:25px;">
					<div style="text-align:justify;">
						With regard to the department assessment, we are pleased to confirm that the following staff are now qualified to operate
					</div>
				</td>
			</tr> -->
		</table>
		<table style="none;text-align:left;width:100%;padding-top:15px;" cellpadding="0" cellspacing="0">
			<tr>
				<td style="height:40px;">
					<div style="text-align:justify;line-height:25px;">
						Kindly ensure their skill and knowledge are being enchanced periodically to maintain their competency.
					</div>
				</td>
			</tr>
		<?php if (!empty($event['EventPte'][0]['note2'])) { ?>
			<tr>
				<td style="height:70px;">
					<div style="text-align:justify;">
						<?php echo $event['EventPte'][0]['note2']; ?>
					</div>
				</td>
			</tr>
		<?php } ?>
			tr>
				<td style="height:30px;">
					<div style="text-align:justify;">
						Thank you.
					</div>
				</td>
			</tr>
			<tr>
				<td style="height:30px;">
					<div style="text-align:justify;">
						Regards,
					</div>
				</td>
			</tr>
		</table>
		<table style="none;text-align:left;width:100%;padding-top:30px;" cellpadding="0" cellspacing="0">
			<tr>
				<td style="height:20px;">
					<?php if (($event['Course']['cost_pax'] > 0.00) || ($event['Course']['total_cost'] > 0.00)) { ?>
						<?php	
								echo $this->Html->image('http://'.$_SERVER['SERVER_NAME'].Router::url('/')."theme/LamanPuteri/images/ZAKI.png", array('height'=> '72px', 'width'=>'191px'));
						?>
					<?php } else { ?>
						<?php if ($event['Course']['service_id'] == 6) { ?>
						<?php	
								echo $this->Html->image('http://'.$_SERVER['SERVER_NAME'].Router::url('/')."theme/LamanPuteri/images/CikguHadi.png", array('height'=> '72px', 'width'=>'191px'));
							?>
						<?php } else { ?>
						<?php	
								echo $this->Html->image('http://'.$_SERVER['SERVER_NAME'].Router::url('/')."theme/LamanPuteri/images/NR2.png", array('height'=> '72px', 'width'=>'191px'));
							?>
						<?php } ?>
					<?php } ?>
				</td>
			</tr>
			<tr>
				<td style="height:20px;font-weight:bold;">
					<?php if ($event['Course']['cost_pax'] > 0.00 || $event['Course']['total_cost'] > 0.00) { ?>
						ZAKI MOHAMAD
					<?php } else { ?>
						<?php if ($event['Course']['service_id']== 6) { ?>
						ABDUL HADI BIN IBRAHIM
							<?php } else { ?>
						NORHASLITA RAMLI
						<?php } ?>
					<?php } ?>
				</td>
			</tr>
			<tr>
				<td style="height:20px;">
					<?php if ($event['Course']['cost_pax'] > 0.00 || $event['Course']['total_cost'] > 0.00) { ?>
					Head, Rail Academy
					<?php } else { ?>
					System Competency Training <br/>
					Rail Academy 
					<?php } ?>
				</td>
			</tr>
		</table>
		<!-- <table style="none;text-align:left;width:100%;padding-top:80px;" cellpadding="0" cellspacing="0">
		  <tr>
		    <td style="text-align:center;">
		      <?php 
        		//echo $this->Html->image('http://'.$_SERVER['SERVER_NAME'].Router::url('/')."theme/LamanPuteri/images/logo_collections.png", array('height'=> '52px', 'width'=>'614px'));
		      ?>
		    </td>
		  </tr>
		</table> -->

<!-- <div style="page-break-before:always;"> &nbsp; </div> -->
<div style="page-break-before:always;">

<h1> Appendix 1 </h1>
<br>
    	<table style="none;text-align:left;width:100%;padding-top:20px;" cellpadding="0" cellspacing="0">
			<tr>
				<td style="height:0px;width:100px;">
					Subject
				</td>
				<td style="height:0px;width:50px;text-align:center;">
					:
				</td>
				<td style="height:0px;width:400px;padding-left:30px;font-weight:bold;">
					<?php $myService = $this->requestAction('/rail_competency/services/object/'.$event['Course']['service_id']); echo $myService['Service']['memo_header']; ?>
				</td>
			</tr>
			<tr>
				<td style="height:0px;width:100px;">
					&nbsp;
				</td>
				<td style="height:0px;width:50px;">
					&nbsp;
				</td>
				<td style="height:0px;width:400px;padding-left:30px;">
					<?php echo $event['Course']['name'].' '.$event['Event']['details']; ?> 
				</td>
			</tr>
			<tr>
				<td style="height:25px;width:100px;">
					Date
				</td>
				<td style="height:25px;width:50px;text-align:center;">
					:
				</td>
				<td style="height:25px;width:400px;padding-left:30px;font-weight:bold;">
					<?php 
						$datediff = floor((strtotime($this->Time->format($event['Event']['start_date'], '%Y-%m-%d')) -  strtotime($this->Time->format($event['Event']['end_date'], '%Y-%m-%d')) )/(60*60*24));
					?>
					<?php if ($datediff == 0 ) { ?>
						<?php echo $this->Time->format($event['Event']['start_date'], '%d %B %Y'); ?>
					<?php } else { ?>
						<?php echo $this->Time->format($event['Event']['start_date'], '%d').' - '.$this->Time->format($event['Event']['end_date'], '%d %B %Y'); ?>
					<?php } ?>
				</td>
			</tr>
			<tr>
				<td style="height:25px;width:100px;">
					Time
				</td>
				<td style="height:25px;width:50px;text-align:center;">
					:
				</td>
				<td style="height:25px;width:400px;padding-left:30px;font-weight:bold;">
					<?php echo $this->Time->format($event['Event']['start_date'], '%H:%M %p').' - '.$this->Time->format($event['Event']['end_date'], '%H:%M %p'); ?>
				</td>
			</tr>
			<tr>
				<td style="height:25px;width:100px;">
					Venue
				</td>
				<td style="height:25px;width:50px;text-align:center;">
					:
				</td>
				<td style="height:25px;width:400px;padding-left:30px;font-weight:bold;">
					<?php echo $event['Venue']['name'].', '.$event['Venue']['location'];; ?>
				</td>
			</tr>
			<tr>
				<td style="height:25px;width:100px;">
					Course Leader
				</td>
				<td style="height:25px;width:50px;text-align:center;">
					:
				</td>
				<td style="height:25px;width:400px;padding-left:30px;font-weight:bold;">
					<?php 
						// print all course trainers
						$assist_trainer = false;
						foreach ($event['EventTrainer'] as $eventTrainer) {
							if ($eventTrainer['is_assist'] != 1) {
								$trainers = $this->requestAction(
									array('controller' => 'trainers', 
										'action' => 'object', $eventTrainer['trainer_id']));
								echo ucwords(strtolower($trainers['Staff']['name'])).'<br/>';	
							} else {
								$assist_trainer = true;
							}
						}
						
						// echo $trainers['Staff']['name'];
					?>
				</td>
			</tr>
			<?php if ($assist_trainer) { ?>
			<tr>
				<td style="height:25px;width:100px;">
					Assisted By
				</td>
				<td style="height:25px;width:50px;text-align:center;">
					:
				</td>
				<td style="height:25px;width:400px;padding-left:30px;font-weight:bold;">
					<?php 
						// print all course trainers
						$assist_trainer = false;
						foreach ($event['EventTrainer'] as $eventTrainer) {
							if ($eventTrainer['is_assist'] == 1) {
								$trainers = $this->requestAction(
									array('controller' => 'trainers', 
										'action' => 'object', $eventTrainer['trainer_id']));
								echo ucwords(strtolower($trainers['Staff']['name'])).'<br/>';	
							}
						}
						
						// echo $trainers['Staff']['name'];
					?>
				</td>
			</tr>
			<?php } ?>
		</table>
		<br/>
		<br/>
<h2> List of Attendance </h2>

		<table style="none;text-align:left;width:100%;border:1px;solid; border-color: #000000; " cellpadding="1" cellspacing="0">
   		<thead>
   			<tr>
	   			<th style="height:25px;width:25px;text-align:right;solid; border-color: #000000; "> #</th>
	   			<th style="height:25px;width:400px;text-align:left;solid; border-color: #000000; "> Staff Name </th>
	   			<th style="height:25px;width:200px;text-align:left;solid; border-color: #000000; "> Department </th>
	   		</tr>
   		</thead>
   		<tbody>
   		<?php $count = 1 ; ?>
   		<?php foreach ($attendees as $attendance) { ?>
   		<?php 
   			$participant = $this->requestAction(
                      array('plugin' => 'rail_competency',  'controller' => 'staffs', 
                          'action' => 'object', $attendance['EventAttendance']['staff_id']));
   		?>
   		<tr>
	    	<td style="height:20px;width:25px;text-align:left;solid; border-color: #000000; ">
	    		<?php echo $count; ?>.
	    	</td>
	    	<td style="height:20px;width:400px;text-align:left;solid; border-color: #000000; ">
	    		<?php echo ucwords(strtolower($participant['Staff']['name'])); ?>
	    	</td>
	    	<td style="height:20px;width:200px;text-align:left;solid; border-color: #000000; ">
	    		( <?php echo $participant['Staff']['parent_code'].'-'.$participant['Staff']['org_code']; ?> )
	    	</td>
	    </tr>
   		<?php $count++; } ?>
   		</tbody>

	</table>
<!-- </div> -->


		