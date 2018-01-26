<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
		<style type="text/css">
			html{font-family:Arial, 'Helvetica Neue', Helvetica, sans-serif; font-size:14px;}
			h1,h2,h3,h4,h5{font-size:15px;padding:0;margin:0;}
			.notes{font-size:10px;}
			body{margin:0}

			.container { width: 100%; }
			.col-md-12 {width: 100%;}
			.col-md-11 {
				width: 91.66666666666666%;
			}
			.col-md-10 {
				width: 83.33333333333334%;
			}
			.col-md-9 {
				width: 75%;
			}
			.col-md-8 {
				width: 66.66666666666666%;
			}
			.col-md-7 {
				width: 58.333333333333336%;
			}
			.col-md-6 {
				width: 50%;
			}
			.col-md-5 {
				width: 41.66666666666667%;
			}
			.col-md-4 {
				width: 33.33333333333333%;
			}
			.col-md-3 {
				width: 25%;
			}
			.col-md-2 {
				width: 16.666666666666664%;
			}
			.col-md-1 {
				width: 8.333333333333332%;
			}


			.header{border-bottom:none !important;padding:5px;padding-left: 15px;font-weight:bold;}
			.inline{
				display: inline;
			}
			.text-left {
				text-align: left;
			}
			.text-center {
				text-align: center;
			}
			.clearfix{
				clear:both;
			}
			.border-2{
				border:2px solid #000;
			}
			.border-1{
				border:1px solid #000;
			}
			.padder{padding:15px;}
			.top-padder{
				margin-top: 20px;
			}
			.row{
				padding-top: 5px;
			}
			.left-padder{
				padding-left: 10px;
			}
			.nline{
				
			}
			.bline{
				border-bottom:1px solid #000;
			}
			.test{
				border:1px dotted red;
			}

			.absolute{
				position: absolute;
			}
			.relative{
				position: relative;
			}
			.col-4{
				width: 33.33333333333333%;
			}
			.col-8{
				width: 33.33333333333333%;
			}
			.h-30{
				height: 0px;
			}
			.valign-center{
				vertical-align: center;
			}
			table,tr,td,tbody{
				width:100%;
				border: 0;
				padding: 0;
				margin: 0;
			}
			.separator{border-bottom: 1px solid #000;height:0;padding:0;margin:0;width:100%;}
			.underline{text-decoration:underline;}
			.italic{font-style:italic;}
			.nowrap{white-space: nowrap;}
			.box{border: 1px solid #000;width:20px;height:20px;text-align:center;}
			.border-btm-none{border-bottom:none !important;}
			.border-top-none{border-top:none !important;}
			.text-center{text-align:center}

			/*@page {
				size: A4 portrait; /* can use also 'landscape' for orientation */
				/*margin-top: 10.0mm;
				margin-right: 25.0mm;
				margin-left: 25.0mm;
				margin-bottom: 10.0mm;
				
				@bottom-center {
					content: element(footer);
				}
				
				@top-center {
					content: element(header);
				}
			}
*/
			hr { 
			    display: block;
			    margin-top: 0.5em;
			    margin-bottom: 0.5em;
			    margin-left: auto;
			    margin-right: auto;
			    border-style: inset;
			    border-width: 1px;
			} 
		</style> 
	</head>
	<body>
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
		    		14 June 2015
		    	</td>
		    </tr>
		    <tr>
		    	<td style="height:25px;width:200px;">
		    		Azlan Hamzah
		    	</td>
		    	<td style="height:25px;width:80px;text-align:center;">
		    		(OPL)
		    	</td>
		    	<td style="height:25px;width:200px;padding-left:40px;">
		    		Ahmad Shahril Mohd Narawi
		    	</td>
		    	<td style="height:25px;width:80px;text-align:center;">
		    		(RSD)
		    	</td>
		    </tr>
		    <tr>
		    	<td style="height:25px;width:200px;">
		    		Mohd Amirul Iqmal 
		    	</td>
		    	<td style="height:25px;width:80px;text-align:center;">
		    		(RSD)
		    	</td>
		    	<td style="height:25px;width:200px;padding-left:40px;">
		    		Mohd Shukri Md Salam
		    	</td>
		    	<td style="height:25px;width:80px;text-align:center;">
		    		(RSD)
		    	</td>
		    </tr>
		    <tr>
		    	<td style="height:25px;width:200px;">
		    		Mohd Natasha Mohd Lazim 
		    	</td>
		    	<td style="height:25px;width:80px;text-align:center;">
		    		(RSD)
		    	</td>
		    	<td style="height:25px;width:200px;padding-left:40px;">
		    		Khairul Anuar Ibrahim
		    	</td>
		    	<td style="height:25px;width:80px;text-align:center;">
		    		(RSD)
		    	</td>
		    </tr>
		    <tr>
		    	<td style="height:25px;width:200px;">
		    		Muhammad Izzat Syamin 
		    	</td>
		    	<td style="height:25px;width:80px;text-align:center;">
		    		(RSD)
		    	</td>
		    	<td style="height:25px;width:200px;padding-left:40px;">
		    		Muhammad Shafiq Hamzah
		    	</td>
		    	<td style="height:25px;width:80px;text-align:center;">
		    		(OPL)
		    	</td>
		    </tr>
		    <tr>
		    	<td style="height:25px;width:200px;">
		    		Muhamed Izzuddin  
		    	</td>
		    	<td style="height:25px;width:80px;text-align:center;">
		    		(OPL)
		    	</td>
		    	<td style="height:25px;width:200px;padding-left:40px;">
		    		Pad Khairul Anuar Ramli
		    	</td>
		    	<td style="height:25px;width:80px;text-align:center;">
		    		(EQATS)
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
					Emergency Response Procedure
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
					17 – 19 June 2015
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
					08.30 am – 05.30 pm
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
					Training Room 1 Ground Floor, RAPIDKL, Subang HQ
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
					En Mazlan Abdul Wahid
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
		<table style="none;text-align:left;width:100%;" cellpadding="0" cellspacing="0">
			<tr>
				<td style="text-align:center;">
					<img src="http://localhost/lms/theme/LamanPuteri/images/logo_collections.png" height="52px" width="614px;">
				</td>
			</tr>
		</table>
	</body>
</html>