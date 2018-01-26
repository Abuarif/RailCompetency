<?php
$result = array();

$line= $staffs[0]['Staff'];
$result = array_merge($result, array_keys($line));
$line= $staffs[0]['Position'];
$result = array_merge($result, array_keys($line));
$this->CSV->addRow(array_keys($result));

 foreach ($staffs as $staff)
 {
   $myline = array();

   $line= $staff['Staff']; 
   $myline = array_merge($myline, $line);
   $line= $staff['Position']; 
   $myline = array_merge($myline, $line);
   
   $this->CSV->addRow($myline);
 }
 $filename='staff-'.$staffs[1]['Staff']['parent_code'];
 echo  $this->CSV->render($filename);
?>