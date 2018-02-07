<?php
  /**
   * Export all member records in .xls format
   * with the help of the xlsHelper
   */
 
  //declare the xls helper
  $xls= new xlsHelper();
 
  //input the export file name
  $xls->setHeader('HRDF-Trainee-'.$course_code);
 
  $xls->addXmlHeader();
  $xls->setWorkSheetName('FirstSheet');
   
  //1st row for columns name
  // $xls->openRow();
  // $xls->writeString('NumberField1');
  // $xls->writeString('StringField2');
  // $xls->writeString('StringField3');
  // $xls->writeString('NumberField4');
  // $xls->closeRow();
   
  //rows for data
  foreach ($data as $trainee):
    $xls->openRow();
    $xls->writeNumber($trainee['HRDF']['NRIC']);
    $xls->writeNumber($trainee['HRDF']['name']);
    $xls->writeNumber($trainee['HRDF']['gender']);
    $xls->writeNumber($trainee['HRDF']['race']);
    $xls->writeNumber($trainee['HRDF']['qualification']);
    $xls->writeNumber($trainee['HRDF']['position']);
    $xls->writeNumber($trainee['HRDF']['branch']);
    $xls->writeNumber($trainee['HRDF']['distance']);
    $xls->writeNumber($trainee['HRDF']['other']);
    $xls->closeRow();
  endforeach;
  
  $xls->addXmlFooter();
  exit();
?> 