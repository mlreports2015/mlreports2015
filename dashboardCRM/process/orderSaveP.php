<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Company Save Process</title>
</head>
<body>
<?php

include "../includes/dcon.php";
include ('databaseClass.php');


//echo $_POST['dn1'];

$dbqueryx = new DatabaseClass();


// add to deal
if($_POST['dn1']){
$dealID='';
$dbfields=array("dealName", "deal_Id");
//print_r($dbfields);
$dbvalues=array($_POST['dn1'],$_POST['dlID']);
$dbtbl = "deal";

$statement =$dbqueryx->insertquery($dbfields, $dbvalues, $dbtbl);
echo $statement;
mysql_query($statement) or die(mysql_error());
$dealID=mysql_insert_id();
}


if($_POST['cont']){
$custNo='';
$dbfields ='';
$dbvalues='';

$dbfields =array("clientName","city","pCode");
$dbvalues=array($_POST['cont'],$_POST['cty'],$_POST['pcode']);

$dbtbl = "client";
$sqlClientState = $dbqueryx->insertquery($dbfields,$dbvalues,$dbtbl);
echo $sqlClientState;
$dbClientRes = mysql_query($sqlClientState);
$custNo = mysql_insert_id();

}


//echo $_POST['vouchcd'];

if($_POST['vouchcd']){

$dbfields = array("comp_id","vouch_Code","order_price","order_post","deal_id","client_id","dated","status");
//print_r($dbfields);
$dbvalues = array($_POST['compId'],$_POST['vouchcd'],$_POST['prce'],$_POST['pstge'],$dealID, $custNo, $_POST['ordDt'],"1");
//print_r($dbvalues);
$dbtbl = "order";
$sqlOrderState = $dbqueryx->insertquery($dbfields,$dbvalues,$dbtbl);
echo $sqlOrderState;
mysql_query($sqlOrderState);
	
}






?>
</body>
</html>