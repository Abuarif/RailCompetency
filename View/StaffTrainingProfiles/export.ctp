<?php

$line= $staffTrainingProfiles[0]['StaffTrainingProfile'];
$this->CSV->addRow(array_keys($line));
 foreach ($staffTrainingProfiles as $staffTrainingProfile)
 {
   $line= $staffTrainingProfile['StaffTrainingProfile']; 
   $this->CSV->addRow($line);
 }
 $filename='staffTrainingProfiles';
 echo  $this->CSV->render($filename);
?>