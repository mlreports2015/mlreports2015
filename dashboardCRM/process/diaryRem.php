<?php

include "../includes/dcon.php";
include ('databaseClass.php');


$dbqueryx = new DatabaseClass();


// add to deal
if($_POST['date1']!='' && $_POST['title']!=''){

//$criteria = array('expert_id'=>$_POST['eid'],'clinic_date'=>$_POST['date1'],'clinic_id'=>$_POST['title']);
$dbtbl = 'clinic_date';
$statement = "DELETE FROM ".$dbtbl." WHERE expert_id ='".$_POST['eid']."' AND FROM_UNIXTIME(clinic_date) LIKE '".date('Y-m-d', ($_POST['date1']/1000))."%' AND clinic_id ='".$_POST['title']."'"; 

//$statement =$dbqueryx->deleteQuery($criteria, $dbtbl);

//$statement;
mysql_query($statement) or die(mysql_error());

  //  $dealID=mysql_insert_id();
}





?>