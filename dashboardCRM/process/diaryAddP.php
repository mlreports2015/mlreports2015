<?php

include "../includes/dcon.php";
include 'databaseClass.php';


$dbqueryx = new DatabaseClass();


// add to deal
if($_POST['date1']!='' && $_POST['date2']!=''){
$dealID='';
$dbfields=array("expert_id", "clinic_id", "clinic_date", "clinic_date2","created_on");
//print_r($dbfields);
$dbvalues=array($_POST['eid'],$_POST['venue'],strtotime($_POST['date1']),strtotime($_POST['date2']),time());
$dbtbl = "clinic_date";

$statement =$dbqueryx->insertquery($dbfields, $dbvalues, $dbtbl);

mysql_query($statement) or die(mysql_error());


  //  $dealID=mysql_insert_id();
}


//echo $statement;



?>