<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Customer Save Process</title>
</head>
<body>
<?php
include "../includes/dcon.php";
include 'databaseClass.php';

echo $_GET['coId'];
//echo $_POST['dn1'];

$dbqueryx = new DatabaseClass();

$dbfields='';
$dbfields2='';
$delfields='';

// add to deal
echo $_POST['custNm'];

if($_POST['custNm']!=''){
	
	$dbfields['clientName']=$_POST['custNm'];
}
if($_POST['cty']!=''){

	$dbfields['city']=$_POST['cty'];

}
if($_POST['pcode']!=''){
	
	$dbfields['pCode']=$_POST['pcode'];
}

if($_POST['addy1']!=''){
	
	$dbfields["address1"]=$_POST['addy1'];
	
}

if($_POST['addy2']!=''){

	$dbfields['address2']=$_POST['addy2'];

}


//print_r($dbfields);
//echo $_POST['vouchcd'];
$sqlinterID='';


if(count($dbfields)>1){

$criteria = array("client_id"=>$_POST['clientID']);
//print_r($criteria);
$dbtbl = "client";
$sqlOrderState = $dbqueryx->updateQuery($dbfields,$criteria,$dbtbl);
//echo $sqlOrderState;
mysql_query($sqlOrderState);


//exit();	
}

?>
<script type="text/javascript">
document.location = "../invoiceDets.php?coId=&ordid=";
</script>
</body>
</html>