
<style>
@media print {
    .footer{

    }
}

</style>

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
		    		Our Ref. : RAD/KJL/ITM/(099)2013-KGC03
		    	</td>
		    </tr>
		    <tr>
		    	<td style="height:50px;" colspan="4">
		    		<?php echo $this->Time->format($event['EventMemo'][0]['modified'], '%d %B %Y'); ?>
		    	</td>
		    </tr>
	   	</table>
	   	<table style="none;text-align:left;width:100%;padding-top:30px;" cellpadding="0" cellspacing="0">
			<tr>
				<td style="height:25px;width:100px;">
					Subject
				</td>
				<td style="height:25px;width:50px;text-align:center;">
					:
				</td>
				<td style="height:25px;width:400px;padding-left:30px;font-weight:bold;">
					KJ LINE OPERATIONAL AND SYSTEM TRAINING
				</td>
			</tr>
			<tr>
				<td style="height:25px;width:100px;">
					&nbsp;
				</td>
				<td style="height:25px;width:50px;">
					&nbsp;
				</td>
				<td style="height:25px;width:400px;padding-left:30px;">
					&nbsp;<?php echo $event['Course']['name']; ?> 
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
					<?php echo $this->Time->format($event['Event']['start_date'], '%d').' - '.$this->Time->format($event['Event']['end_date'], '%d %B %Y'); ?>
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
					<?php echo $event['Venue']['location']; ?>
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
						$trainers = $this->requestAction(
							array('controller' => 'trainers', 
								'action' => 'object', $event['EventTrainer'][0]['trainer_id']));
						echo $trainers['Staff']['name'];
					?>
				</td>
			</tr>
		</table>
		<table style="none;text-align:left;width:100%;padding-top:15px;" cellpadding="0" cellspacing="0">
			<tr>
				<td style="height:40px;">
					<div style="text-align:justify;line-height:25px;">
						All participants are expected to be ready in class 10 minutes before course commencement. As such, your punctuality is highly appreciated.
					</div>
				</td>
			</tr>
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
					NORHASLITA RAMLI
				</td>
			</tr>
			<tr>
				<td style="height:20px;">
					System Competency Trainin
				</td>
			</tr>
			<tr>
				<td style="height:20px;">
					Rail Academy 
				</td>
			</tr>
			<tr>
				<td style="height:40px;">
					c.c.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Immediate Superior – LZ/ SFM/ MJ/AEM/MZM/EMM/SJ
				</td>
			</tr>
		</table>
		<footer>
			<table style="none;text-align:left;width:100%;padding-top:150px;" cellpadding="0" cellspacing="0">
			  <tr>
			    <td style="text-align:center;">
			      <?php 
	        		echo $this->Html->image('http://'.$_SERVER['SERVER_NAME'].Router::url('/')."theme/LamanPuteri/images/logo_collections.png", array('height'=> '52px', 'width'=>'614px'));
			      ?>
			    </td>
			  </tr>
			</table>
		</footer>

<!-- <div style="page-break-before:always;"> -->

<h1> Appendix 1 </h1>
<h2> List of Attendance </h2>
<br>
   <table>
   		<thead>
   			<tr>
   			<th style="height:25px;width:500px;text-align:left;"> Staff Name </th>
   			<th style="height:25px;width:80px;text-align:center;"> Department </th>
   		</tr>
   		</thead>
   		</tbody>
   		<?php foreach ($event['EventAttendance'] as $attendance) { ?>
   		<?php 
   			$participant = $this->requestAction(
                      array('plugin' => 'rail_competency',  'controller' => 'staffs', 
                          'action' => 'object', $attendance['staff_id']));
   		?>
   		<tr>
	    	<td>
	    		<?php echo ucwords(strtolower($participant['Staff']['name'])); ?>
	    	</td>
	    	<td>
	    		( <?php echo $participant['Staff']['org_code']; ?> )
	    	</td>
	    </tr>
   		<?php } ?>
   		<tbody>

	</table>
<!-- </div> -->


		