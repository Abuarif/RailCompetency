<?php

$line= $staffProfileViews[0]['StaffProfileView'];
$this->CSV->addRow(array_keys($line));
 foreach ($staffProfileViews as $staffProfileView)
 {
   $line= $staffProfileView['StaffProfileView']; 
   $this->CSV->addRow($line);
 }
 $filename='staffProfileViews';
 echo  $this->CSV->render($filename);
?>