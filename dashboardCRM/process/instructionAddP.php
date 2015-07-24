<?php 

session_start();

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Britannia Medicare Instruction</title>
</head>
<body style="overflow:hidden;background-image:url(../Images/background-test1b.png);background-size:cover;">
<div style="position:fixed;background-color:rgba(255,255,255,0.8);width:100%;height:1600px;top:-10px;left:0px;;">

<?php 

//include '../includes/Mail/Mail.php';
//include '../includes/Mail/Mail/mime.php';

include '../includes/dcon.php';
include '../includes/inc.php';

include 'emailing.php';
include 'databaseClass.php';
include 'modxml2.php';
///include 'mailClass.php';



$instructs = array();
$instructs['ttl']=$_POST['ttl'];
$instructs['fName']=trim($_POST['fName']);
$instructs['lName']=trim($_POST['lName']);
$instructs['tel']=$_POST['cTel'];
$instructs['cRef']=$_POST['orgRef'];
$instructs['org']=$_POST['orgNme'];
$instructs['eid']=$_POST['eid'];
$instructs['solic']=$_POST['sNme'];
$instructs['sRef']=$_POST['sRef'];
$instructs['pcode']=$_POST['cpc'];
$instructs['addy1']=$_POST['ca1'];
$instructs['addy2']=$_POST['cty'];
$instructs['cdoa']=$_POST['cdoa'];
$instructs['cdob']=$_POST['cdob'];
$instructs['medco']=$_POST['medcoRef'];
$instructs['vennme']=$_POST['venue'];
$instructs['venue']=$_POST['locid'];
$instructs['vendte']=$_POST['vendte'];
$instructs['ventme']=$_POST['ventm'];

if($_POST['xprt']!=''){

$instructs['xpert']=$_POST['xprt'];

}

//print_r($instructs);

$dbqueries = new DatabaseClass();


//$csvString = file_get_contents("./csv/buyerEmpire.csv");

// upload file instruction and send email

$headers ='';
$csvString = '';
$target ='../upload/instructions';




	$orgmailres = $db->query("SELECT org_email FROM organisation WHERE org_id = '".$_SESSION['org']."'"); 

	$orgmail = $orgmailres->fetchRow(DB_FETCHMODE_ASSOC);
	
	
	$venueaddress = $db->query("SELECT clinic_name, clinic_address1, clinic_city, clinic_pcode FROM clinic WHERE clinic_name = '".$instructs['vennme']."'");
	
	$venuedetsres = $venueaddress->fetchRow(DB_FETCHMODE_ASSOC);
	
	// agency appointment email

   $instructs['venaddy'] = $venuedetsres['clinic_address1']." , ".$venuedetsres['clinic_city']." , ".$venuedetsres['clinic_pcode'];

   emailConfirmation($orgmail['org_email'], $instructs, $smtpinfo);



// save case details

$insertfields=array('client_name'=>$instructs['fName'].' '.$instructs['lName'],'client_number'=>$instructs['tel'] ,'agency_name'=>$instructs['org'], 'medcoref'=>$instructs['medco'] ,'agency_ref'=>$instructs['cRef'],'solicitor_name'=>$instructs['solic'], 'solicitor_ref'=>$instructs['sRef'],'case_doa'=>$instructs['cdoa'], 'case_dob'=>$instructs['cdob'], );
//print_r($insertfields);
$dbtbl = 'case';

$casestatement = $dbqueries->insertQuery2($insertfields, $dbtbl);


$res = $db->query($casestatement);
//mysql_query($casestatement);

$caseid = mysql_insert_id() ;

//$caseid = $res->nextId('dbsequence')-1;

$target = $target."/".$caseid."/";

//upload file to case

if(is_uploaded_file($_FILES['file']['tmp_name'])){

  
 // echo $_FILES['file']['tmp_name'];


if (!mkdir($target, 0777, true)) {
	
    die('Failed to create folders...');
}

$target_path = $target.basename( $_FILES['file']['name']);

  if(move_uploaded_file($_FILES['file']['tmp_name'], $target_path)) {
    echo "The file ".  basename( $_FILES['file']['name']). 
    " has been uploaded";


  }



}







// save appointment 


$slottime= strtotime($instructs['vendte']." ".$instructs['ventme']);

$verifytmeslot = "SELECT `clinic-id`, `slot-time` FROM `clinic_tmslot` WHERE `slot-time` = '".$slottime."'";


$verifytmeres = mysql_query($verifytmeslot);
							  
if(mysql_num_rows($verifytmeres)<=2){
	
	
	$venuetmeinsert = "INSERT INTO `clinic_tmslot` SET `slot-time` = '".$slottime."' , `clinic-id` = '".$instructs['venue']."', `case-id`  ='".$caseid."' , `client-name` ='".$instructs['fName']." ".$instructs['lName']."' , usr_id ='".$_SESSION['usr_id']."'"; 

	// echo $venuetmeinsert;
	
	mysql_query($venuetmeinsert);
}

?>

<div style="width:99%;height:650px;border-radius:7px" align='center'>

<div align='center' style="position:relative;top:160px;width:550px;height:250px;border:1px solid #777;border-radius:6px;background-color:rgba(8,82,126,0.3);box-shadow:7px 5px 5px #888;">
<table width='98%' height='100%'>
<td>
  <p style="text-indent:5px;font-size:18px;text-align:center;">Thank you for your instruction regarding; 
  <br/><?php echo $instructs['ttl']." ".$instructs['lName']." ".$instructs['cRef']; ?>
  <br/><?php echo "An email will be sent to ".$orgmail['org_email']." Shortly "; ?> </p>
</td>
</tr>
<tr>
<td align="center" ><?php echo '<a href="../basicDiary.php?eid='.$instructs['eid'].'&clinics='.$instructs['vennme'].'" >' ; ?> Back</a></td>
</tr>
</table>
</div>

</div>

<?php

// send information to the experts account 

$exprt = "SELECT exp_email, exp_name FROM expert WHERE exp_id = '".$instructs['eid']."'";

$exprtRes= mysql_fetch_array(mysql_query($exprt));

	// email expert regarding appointment
	
	sleep(4);
	

		expertInstructConfirmation($exprtRes['exp_email'], $instructs,$smtpinfo,$target_path);

		//makexml($instructs, $caseid);
		
/*

	//import date and time statement
	$importState = $dbqueries->insertquery(array('import_dt','import_coID','import_no'),array(time(),$compId ,(count($rowfields)-1)),'import_dte');
     echo $importState;
		
	  mysql_query($importState);
*/		

   sleep(2);
   
   // run through the uploaded files
   
 foreach($_FILES['secfiles'] as $key=>$value){

		 
		for($count = 0 ; $count < count($value); $count++){
	
			if(is_uploaded_file($_FILES['secfiles']['tmp_name'][$count])){

  				// echo $_FILES['file']['tmp_name'];

      		$target_path = $target.basename( $_FILES['secfiles']['name'][$count]);

  			if(move_uploaded_file($_FILES['secfiles']['tmp_name'][$count], $target_path)) {
    				echo "The file ".  basename( $_FILES['secfiles']['name'][$count])." has been uploaded";


 			 }
	
		  }


		}



}
  
 //}
   

//pLocation("../basicDiary.php?eid=".$instructs['eid']."&clinics=".$instructs['vennme']);



?>
</div>
</body>
</html>