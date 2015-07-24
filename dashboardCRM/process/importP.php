<?php 

session_start();

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Test Doc</title>
</head>
<body>

<?php 

include '../includes/Mail/Mail.php';
include '../includes/Mail/Mail/mime.php';

include '../includes/dcon.php';
include '../includes/inc.php';
//include 'databaseClass.php';
include 'mailClass.php';

$smtpinfo["host"] = "mail.mldoctors.com";
$smtpinfo["port"] = "25";
$smtpinfo["auth"] = true;
$smtpinfo["username"] = "admin@mldoctors.com";
$smtpinfo["password"] = "bismillah";


$instructs = array();
$instructs['name']=$_POST['fullName'];
$instructs['cRef']=$_POST['cRef'];
$instructs['pcode']=$_POST['cpc'];
$instructs['cdoa']=$_POST['cdoa'];

if($_POST['xprt']!=''){

$instructs['xpert']=$_POST['xprt'];

}


//$dbqueries = new DatabaseClass;
//$csvString = file_get_contents("./csv/buyerEmpire.csv");
$headers ='';
$csvString = '';
$target ='../upload/instructions/';

$mailing = new MailClass;
//$mailing->setPlainTxt('new text');



if(is_uploaded_file($_FILES['file']['tmp_name'])){

   echo $_FILES['file']['tmp_name'];

//$csvString = file_get_contents($_FILES['fimport']['tmp_name']);

//$compId = $_POST['compID'];

$target_path = $target.basename( $_FILES['file']['name']);

if(move_uploaded_file($_FILES['file']['tmp_name'], $target_path)) {
    echo "The file ".  basename( $_FILES['file']['name']). 
    " has been uploaded";

    $results = $db->query("SELECT org_name FROM organisation where org_id ='".$_SESSION['org']."'");
   // $results = mysql_query("SELECT org_name FROM organisation where org_id ='".$_SESSION['org']."'");
    $resultingrow = $results->fetchRow();
   // $resultingrow = mysql_fetch_row($results);


	//$to = "Dan <danradd.2010@gmail.com>";
	$to = array("specialist@mldoctors.com", "danradd.2010@gmail.com");
    $headers['To'] = $to;
	//$headers['Cc']="instructions <instructions@mldoctors.com>";
	$headers['From'] = "NO-REPLY <admin@mldoctors.com>";
	$headers['Subject']="New instruction from ML Portal Regarding ".$_POST['cRef'];
	$crlf="\n";
	
	///$text = "Instruction Email From ".$_SESSION['usr'];
    $text = "Please Find Attached the instructions from  ".$resultingrow[0]."\n";
    $text = $text." Instruction for : \n Name: ".$_POST['fullName']." \n Reference: ".$_POST['medcoRef']."\n Reference: ".$_POST['cRef']."\n DOB:".$_POST['cdob']." \n DOA:".$_POST['cdoa'];

    $mailing->setPlainTxt($text);
	$mailing->setSubject('New instruction from ML Portal Regarding '.$_POST['cRef']);
	$mailing->addAttachments($target_path);
	//$params['sendmail_path'] = '/usr/lib/sendmail';
	
	//$mime = new Mail_mime(array('eol' => $crlf));
	
	//$mime->setTXTBody($text);
	//$mime->addAttachment($target_path, 'application/msword');

	//$body = $mime->get();
	//$hdrs = $mime->headers($headers);
	
    $mail_object =& Mail::factory("smtp", $smtpinfo);
/* Ok send mail */


	

    $send = $mail_object->send($to, $mailing->getHeaders(), $mailing->getBody());

 
   if (PEAR::isError($send)) {
    
	   echo("<p>".$send->getMessage()."</p>");
     
	 } else {
     
	  echo("<p>Message/Messages successfully sent</p>");
    
	}

	
	
	
} else{
    echo "There was an error uploading the file, please try again!";
}



}

//echo $csvString;

/*

$data = explode("\n",$csvString);

	foreach($data as $row){
		
		   
		//$rowfields[] = str_getcsv($row,',','"','\\');
		  $rowfields[] = explode(',',$row);
    }

	//print_r($rowfields);
	
	for($n = 1; $n < count($rowfields)-1; $n++){
		
		$fieldCount = 0;
		foreach($rowfields[$n] as $field){
		 
		 
		 
		  if($rowfields[0][$fieldCount]=='DealID')
		  {
				 $deal['deal_Id'] = $field; 
				 $order['deal_id']= $field;
				 
		  }else if($rowfields[0][$fieldCount]=='Leadlogid'){
			     $order['order_id'] = $field;
		  		 $deliver['order_id']= $field;
				  
		  }else if($rowfields[0][$fieldCount]=='PurchaseDate'){
			     $order['dated']=$field;
		  }else if($rowfields[0][$fieldCount]=='DealName'){
			      $deal['dealName']=$field;
		  }else if($rowfields[0][$fieldCount]=='VoucherCode'){
			       $order['vouch_Code']=$field;
		  }else if($rowfields[0][$fieldCount]=='FirstName'){
				   $person['clientName']=$field;
		  }else if($rowfields[0][$fieldCount]=='Surname'){
			  	   $person['clientName']=$person['clientName']." ".$field;
		  }else if($rowfields[0][$fieldCount]=='Address1'){
				    $person['address1']=$field;
		  }else if($rowfields[0][$fieldCount]=='Address2'){
			  		$person['address2']=$field;
		  }else if($rowfields[0][$fieldCount]=='Town'){
			  	    $person['city']=$field;
		  }else if($rowfields[0][$fieldCount]=='Postcode'){
			  		$person['pCode']=$field;
		  }else if($rowfields[0][$fieldCount]=='Price'){
		  		  $order['order_price']=$field;	
		  }else if($rowfields[0][$fieldCount]=='Postage'){
				   $order['order_post']=$field;
		  }else if($rowfields[0][$fieldCount]=='Tracking'){
			       $deliver['tracking_id']=$field;
		  }else if($rowfields[0][$fieldCount]=='Courier'){
			        $deliver['courier']=$field;
		  }else if(trim($rowfields[0][$fieldCount])=='Dispatch Date'){
					$deliver['date_sent']=$field;  
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
		
		echo $statementPers;
		
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
		
	    echo $statement;
		
		mysql_query($statement);
		
		if($deliver['courier']!=""){
	
		$deliveStatement = $dbqueries->insertquery(array_keys($deliver), array_values($deliver),'delivery');
		
    	//echo $deliveStatement;
		
		mysql_query($deliveStatement);

		}
	
}

	//import date and time statement
	$importState = $dbqueries->insertquery(array('import_dt','import_coID','import_no'),array(time(),$compId ,(count($rowfields)-1)),'import_dte');
     echo $importState;
		
	  mysql_query($importState);
*/		

pLocation("../instructionAdd.php");



?>

</body>
</html>