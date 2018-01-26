<?php

$line= $attendanceLists[0]['ViewAttendanceList'];
$this->CSV->addRow(array_keys($line));
 foreach ($attendanceLists as $attendanceList)
 {
   $line= $attendanceList['ViewAttendanceList']; 
   $this->CSV->addRow($line);
 }
 $filename='attendanceList';
 echo  $this->CSV->render($filename);
?>