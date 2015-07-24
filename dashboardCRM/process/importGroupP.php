<?php 

//session_start();

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Test Doc</title>
</head>
<body>

<?php 


include '../includes/dcon.php';
include '../includes/inc.php';
include 'databaseClass.php';

$dbqueries = new DatabaseClass;
//$csvString = file_get_contents("./csv/buyerEmpire.csv");
$headers ='';
$csvString = '';

if(is_uploaded_file($_FILES['fimport']['tmp_name'])){

$csvString = file_get_contents($_FILES['fimport']['tmp_name']);

$compId = $_POST['compID'];

}

//echo $csvString;


$data = explode("\n",$csvString);

	foreach($data as $row){
		
		   
		//$rowfields[] = str_getcsv($row,',','"','\\');
		  $rowfields[] = explode(',',$row);
    }

	//print_r($rowfields);
	
	for($n = 1; $n < count($rowfields)-1; $n++){
		
		$fieldCount = 0;
		foreach($rowfields[$n] as $field){
		 
		 
		 
		  if($rowfields[0][$fieldCount]=='deal_opportunity_id')
		  {
				 $deal['deal_Id'] = $field; 
				 $order['deal_id']= $field;
				 
		  }else if($rowfields[0][$fieldCount]=='groupon_number'){
			  
			     $order['order_id'] = $field;
		  		 $deliver['order_id']= $field;
				  
		  }else if($rowfields[0][$fieldCount]=='order_date'){
			      $order['dated']=$field;
		  }else if($rowfields[0][$fieldCount]=='item_name'){
			      $deal['dealName']=$field;
		  }else if($rowfields[0][$fieldCount]=='VoucherCode'){
			       $order['vouch_Code']=$field;
		  }else if($rowfields[0][$fieldCount]=='shipment_address_name'){
				   $person['clientName']=$field;
		  }else if($rowfields[0][$fieldCount]=='Surname'){
			  	   $person['clientName']=$field;
		  }else if($rowfields[0][$fieldCount]=='shipment_address_street'){
				    $person['address1']=$field;
		  }else if($rowfields[0][$fieldCount]=='shipment_address_street_2'){
			  		$person['address2']=$field;
		  }else if($rowfields[0][$fieldCount]=='shipment_address_city'){
			  	    $person['city']=$field;
		  }else if($rowfields[0][$fieldCount]=='shipment_address_postal_code'){
			  		$person['pCode']=$field;
		  }else if($rowfields[0][$fieldCount]=='sell_price'){
		  		  $order['order_price']=$field;	
		 
		  }
		  
		  
		    
		  $fieldCount ++ ;
		}
		
		//print_r($deliver);
		
		
		$validate = $dbqueries->selectAll('deal',array('deal_Id'=>$deal['deal_Id']));
		
		//echo $validate;
		
		if(mysql_query($validate)!=''){
		
		$statement = $dbqueries->insertquery(array_keys($deal), array_values($deal),'deal');
		
		//echo $statement;
		
		mysql_query($statement);
		
		}
		
		$statementPers = $dbqueries->insertquery(array_keys($person), array_values($person),'client');
		
		//echo $statementPers;
		
		$personRes = mysql_query($statementPers);
		
		if($personRes){
		
			$order['client_id']=mysql_insert_id();
		}
		
		if(trim($deliver['date_sent'])!=""){
		$order['status']='3';
		}else{
		$order['status']='1';	
		}
		
		$order['comp_id']=$compId;
		
		$statement = $dbqueries->insertquery(array_keys($order), array_values($order),'order');
		
	    //echo $statement;
		
		mysql_query($statement);
		
		if($deliver['courier']!=""){
	
		$deliveStatement = $dbqueries->insertquery(array_keys($deliver), array_values($deliver),'delivery');
		
    	//echo $deliveStatement;
		
		mysql_query($deliveStatement);

		}
	
}

	//import date and time statement
	$importState = $dbqueries->insertquery(array('import_dt', 'import_coID','import_no'),array(time(),$compId ,(count($rowfields)-1)),'import_dte');
     //echo $importState;
		
	  mysql_query($importState);
		

pLocation("../index2.php?coID=".$compId);



?>

</body>
</html>