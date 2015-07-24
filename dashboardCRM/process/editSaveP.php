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

$dbfields='';
$dbfields2='';
$delfields='';

// add to deal
if(!$_POST['dlID']){
	
	$dbfields["deal_id"]=$_POST['dlID'];
}
if($_POST['vouchcd']!=''){

	$dbfields["vouch_Code"]=$_POST['vouchcd'];

}
if($_POST['prodNme']!=''){
	
	$dbfields["prod_name"]=$_POST['prodNme'];
	
}
if($_POST['cont']!=''){
	
	$dbfields2['clientFirst']=$_POST['cont'];
}
if($_POST['cty']!=''){

	$dbfields2['city']=$_POST['cty'];

}
if($_POST['pcode']!=''){
	
	$dbfields2['pCode']=$_POST['pcode'];
}

if($_POST['prce']!=''){
	
	$dbfields["order_price"]=$_POST['prce'];
	
}

if($_POST['cour']!=''){

	$delfields['courier']=$_POST['cour'];

}

if($_POST['trackID']!=''){

	$delfields['tracking_id']=$_POST['trackID'];

}


//echo $_POST['vouchcd'];
$sqlinterID='';

print_r($delfields);


if(count($delfields)>1){
	
	if($_POST['ordId']!=''){
	  $delfields['order_id']=$_POST['ordId'];	
	}
	$sqlinsertDelivery=$dbqueryx->insertquery(array_keys($delfields),array_values($delfields),'delivery');
	//echo $sqlinsertDelivery;
	mysql_query($sqlinsertDelivery);
	//$sqlinterID = mysql_insert_id();
    }


if(count($dbfields)>1){

$criteria = array("order_id"=>$_POST['ordId']);
$dbtbl = "order";
$sqlOrderState = $dbqueryx->updateQuery($dbfields,$criteria,$dbtbl);
//echo $sqlOrderState;
mysql_query($sqlOrderState);
	
}






?>
</body>
</html>