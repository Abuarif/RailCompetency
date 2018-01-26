<?php

	// Change Memo title according to course code
	// GC - General Course Training 
	// K - KJ Line Operational and System Training
	// A - AG Line Operational and System Training
	// M - MR Line Operational and System Training
	// AFC - AFC System Maintenance Training

	$signature = 0; 
	if (substr( strtolower($event['Course']['code']), 0, 2 ) === "gc") {
		$title = 'GENERAL COURSE TRAINING';
	} else if (substr( strtolower($event['Course']['code']), 0, 3 ) === "afc") {
		$title = 'AFC SYSTEM MAINTENANCE TRAINING';
	} else if (substr( strtolower($event['Course']['code']), 0, 1 ) === "a") {
		$title = 'AG LINE OPERATIONAL AND SYSTEM TRAINING';
	} else if (substr( strtolower($event['Course']['code']), 0, 1 ) === "k") {
		$title = 'KJ LINE OPERATIONAL AND SYSTEM TRAINING';
	} else if (substr( strtolower($event['Course']['code']), 0, 1 ) === "m") {
		$title = 'MR LINE OPERATIONAL AND SYSTEM TRAINING';
	} else if (substr( strtolower($event['Course']['code']), 0, 3 ) === "ope") {
		$title = 'MRT LINE OPERATIONAL AND SYSTEM TRAINING';
		$signature = 1;
	}
?>
		<table style="border:none;text-align:left;width:100%;" cellpadding="0" cellspacing="0">
		    <tr>
		    	<td style="font-family: Arial, 'Helvetica Neue', Helvetica, sans-serif;font-style:italic;font-size:33px;width:50%;">
		    		Memorandum
		    	</td>
		    	<td style="width:50%;" colspan="3" rowspan="1">
		    		<!-- <img src="<?php echo $this->webroot; ?>theme/LamanPuteri/images/rapidrailheader.jpeg" height="120px" width="319px"> -->
		    		<?php	
							echo $this->Html->image('http://'.$_SERVER['SERVER_NAME'].Router::url('/')."theme/LamanPuteri/images/rapidrailheader.jpeg", array('height'=> '120px', 'width'=>'319px'));
						?>
		    	</td>
		    </tr>
		</table>
		<table style="border:none;text-align:left;width:100%;" cellpadding="0" cellspacing="0">
		    <tr>
		    	<td style="height:30px;" colspan="4">
		    		Our Ref. : RAD/PTE/<?php echo $event['EventPte'][0]['ref_number']; ?>-<?php echo $this->Time->format($event['EventPte'][0]['modified'], '%Y'); ?>-<?php echo $event['Course']['code']; ?>
		    	</td>
		    </tr>
		    <tr>
		    	<td style="height:50px;" colspan="4">
		    		<?php echo $this->Time->format($event['EventPte'][0]['modified'], '%d %B %Y'); ?>
		    	</td>
		    </tr>
		    <tr>
		    	<td style="height:50px;font-weight:bold;" colspan="4">
		    		Participant name list as attached (Appendix 1)
		    	</td>
		    </tr>
	   	</table>
	   	<table style="none;text-align:left;width:100%;padding-top:30px;" cellpadding="0" cellspacing="0">
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
		</table>
		<br>
		<hr>
		<table style="none;text-align:left;width:100%;padding-top:15px;" cellpadding="0" cellspacing="0">
			<tr>
				<td style="height:25px;">
					<div style="text-align:justify;">
						We are pleased to inform that you have been scheduled to attend the course as follows:
					</div>
				</td>
			</tr>
		</table>
		<table style="none;text-align:left;width:100%;padding-top:20px;" cellpadding="0" cellspacing="0">
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
					<?php //echo $event['Venue']['location']; ?>
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
		<table style="none;text-align:left;width:100%;padding-top:15px;" cellpadding="0" cellspacing="0">
			<tr>
				<td style="height:40px;">
					<div style="text-align:justify;line-height:25px;">
						With reference to the Appendix 1, all participants are expected to be ready in class 10 minutes before course commencement. As such, your punctuality is highly appreciated.
					</div>
				</td>
			</tr>
		<?php if (!empty($event['EventPte'][0]['memo'])) { ?>
			<tr>
				<td style="height:70px;">
					<div style="text-align:justify;">
						<?php echo $event['EventPte'][0]['memo']; ?>
					</div>
				</td>
			</tr>
		<?php } ?>
			<tr>
				<td style="height:70px;">
					<div style="text-align:justify;line-height:25px;">
						Kindly be reminded that you are also required to adhere to all safety aspects and precaution during the course.
					</div>
				</td>
			</tr>
			<tr>
				<td style="height:40px;">
					<div style="text-align:justify;">
						Thank you.
					</div>
				</td>
			</tr>
			<tr>
				<td style="height:40px;">
					<div style="text-align:justify;">
						Regards,
					</div>
				</td>
			</tr>
		</table>
		<table style="none;text-align:left;width:100%;padding-top:40px;" cellpadding="0" cellspacing="0">
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
					Head of Rail Academy
					<?php } else { ?>
					System Competency Training
					<?php } ?>
				</td>
			</tr>
			<tr>
				<td style="height:20px;">
					Rail Academy 
				</td>
			</tr>
			<tr>
				<td style="height:40px;">
					<!-- c.c.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Immediate Superior – LZ/ SFM/ MJ/AEM/MZM/EMM/SJ -->
				</td>
			</tr>
		</table>
		<table style="none;text-align:left;width:100%;padding-top:148px;" cellpadding="0" cellspacing="0">
		  <tr>
		    <td style="text-align:center;">
		      <?php 
        		echo $this->Html->image('http://'.$_SERVER['SERVER_NAME'].Router::url('/')."theme/LamanPuteri/images/logo_collections.png", array('height'=> '52px', 'width'=>'614px'));
		      ?>
		    </td>
		  </tr>
		</table>

<!-- <div style="page-break-before:always;"> -->

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
    <table>
   		<thead>
   			<tr>
	   			<th style="height:25px;width:25px;text-align:right;solid; border-color: #000000; "> #</th>
   			<th style="height:25px;width:250px;text-align:left;"> Staff Name </th>
   			<th style="height:25px;width:400px;text-align:left;"> Department </th>
   		</tr>
   		</thead>
   		</tbody>
   		<?php $count = 1 ; ?>
   		<?php foreach ($attendees as $attendance) { ?>
   		<?php 
   			$participant = $this->requestAction(
                      array('plugin' => 'rail_competency',  'controller' => 'staffs', 
                          'action' => 'object', $attendance['EventAttendance']['staff_id']));
   		?>
   		<tr>
	    	<td style="height:25px;width:25px;text-align:left;solid; border-color: #000000; ">
	    		<?php echo $count; ?>.
	    	</td>
	    	<td style="height:25px;width:250px;text-align:left;">
	    		<?php echo ucwords(strtolower($participant['Staff']['name'])); ?>
	    	</td>
	    	<td style="height:25px;width:400px;text-align:left;">
	    		( <?php echo $participant['Staff']['parent_code'].'-'.$participant['Staff']['org_code']; ?> )
	    	</td>
	    </tr>
   		<?php $count++; } ?>
   		<tbody>

	</table>
<!-- </div> -->


		