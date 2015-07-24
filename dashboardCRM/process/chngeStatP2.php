<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Change State Process</title>
</head>
<body>
<?php

include "../includes/dcon.php";
include "databaseClass.php";


$dbqueryx = new DatabaseClass();

if($_POST['deliveId']!=''){
	
$fields=array(array('delivery'=>'courier'),array('delivery'=>'order_id'),array('delivery'=>'tracking_id'));
$tbl=array('delivery');
$criteria = array('delive_id' => $_POST['deliveId']);

$statement = $dbqueryx->selectQuery($fields,$criteria,$tbl);
//echo $statement;
$verifDeliveryRes = mysql_query($statement);

 if($verifDeliveryRes){
	
	$fields = array('courier'=>$_POST['courier'],'tracking_id'=>$_POST['tracking']);
	//print_r($fields);
	$tbl='delivery';
	$criteria = array('delive_id' => $_POST['deliveId']);
	$updtstatement = $dbqueryx->updateQuery($fields,$criteria,$tbl);
	//echo $updtstatement;
 }


}else{

  if(($_GET['ordsId']!='') && ($_GET['stat']!='')){
	  
	  $fields = array('`status`'=>$_GET['stat']);
	  $tbl = 'order';
	  $criteria = array(order_id => $_GET['ordsId']);
	  $updtfields = $dbqueryx->updateQuery($fields,$criteria,$tbl);
	  echo $updtfields;
	 // mysql_query($updtfields);
  }


 if($_POST['courier']!=''){
		    $order = $_GET['ordsId'];
			$optionals = explode(",",$_POST['options']);
			$fieldings = array("order_id","courier", "tracking_id","date_sent");
			$values = array($order,$_POST['courier'], $_POST['tracking'],date('Y-m-d'));
			$tbl1 = "delivery";
			$statement2=$dbqueryx->insertquery($fieldings,$values,$tbl1);
			//echo($statement2);
			mysql_query($statement2) or die(mysql_error());
		
 }
}
/*
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

*/
?>
<script type="text/javascript">
  // document.location="../invoiceDets.php?coId=2&ordid=<?php echo $_GET['ordsId']; ?>";
</script>
</body>
</html>