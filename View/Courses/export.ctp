<?php
$line = $courses[0]['Course'];
$this->CSV->addRow(array_keys($line));


foreach ($courses as $item) {
  $line = $item['Course'];
  $this->CSV->addRow($line);
}
$filename = 'RCMS-Course-Codes-' . date('Y-m-d-H:i:s');
echo $this->CSV->render($filename);
?>