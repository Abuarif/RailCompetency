<?php

 foreach ($data as $item)
 {
   $line= $item['HRDF']; 
   $this->CSV->addRow($line);
 }
 $filename='HRDF-trainees-nomination-'.$course_code;
 echo  $this->CSV->render($filename);
?>