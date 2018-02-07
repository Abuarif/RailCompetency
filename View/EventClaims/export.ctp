<?php

 foreach ($data as $item)
 {
   $line= $item['HRDF']; 
   $this->CSV->addRow($line);
 }
 $filename='HRDF-trainees-'.$course_code;
 echo  $this->CSV->render($filename);
?>