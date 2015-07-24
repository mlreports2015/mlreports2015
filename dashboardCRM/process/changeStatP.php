<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Change State Process</title>
</head>
<body>
<?php

include "../includes/dcon.php";
include ('databaseClass.php');


//echo $_POST['dn1'];

$dbqueryx = new DatabaseClass();

if($_POST['ords']){
	
	$orders = explode(",",$_POST['ords']);
 
 	print_r($options);
 
 if(($_POST['stat']!='') && ($_POST['stat']!='0')){
	//$orders = explode(",",$_POST['ords']);
    $state = $_POST['stat'];
	$tbl = "order";
	
	foreach($orders as $order){
		
		$fields=array('status'=>$state);
		$criteria=array('order_id'=>$order);
		
		$statement = $dbqueryx->updateQuery($fields,$criteria,$tbl);
		//echo $statement;
		mysql_query($statement) or die(mysql_error());
	
	  
	  if($_POST['options']){
		
			$optionals = explode(",",$_POST['options']);
			$fieldings = array("order_id","courier", "tracking_id","date_sent");
			$values = array($order,$optionals[0], $optionals[1],date('Y-m-d'));
			$tbl1 = "delivery";
			$statement2=$dbqueryx->insertquery($fieldings,$values,$tbl1);
			echo($statement2);
			mysql_query($statement2) or die(mysql_error());
		
	   }
	
	
	}
	
	 
	
  }else{
	
		$tbl='order';
		foreach($orders as $order){
		
		
		$criteria=array('order_id'=>$order);
		
		$statement = $dbqueryx->deleteQuery($criteria,$tbl);
		
		 mysql_query($statement) or die(mysql_error());
	
	    }
	
	  
  }
	
	
}else{
	
	echo "No Orders Received";

}







?>
</body>
</html>