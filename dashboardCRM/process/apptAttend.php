<?php

session_start();

include '../includes/dcon.php';
include '../includes/inc.php';
include 'emailing.php';

include 'databaseClass.php';

$dbquery = new DatabaseClass();
/*
$smtpinfo = array();
$smtpinfo["host"] = "host266.hostmonster.com";
$smtpinfo["port"] = "26";
$smtpinfo["auth"] = true;
$smtpinfo["username"] = "admin@mldoc.com";
$smtpinfo["password"] = "BismiLlah786";
*/


//print_r(file_get_contents("PHP://INPUT"));

	$x=0;

	foreach($_POST['apptchck'] as $value){
		
		
		$data=array("attended_at"=>time());
		$criteria=array("`slot-id`"=>$_POST['apptid'][$x]);
		$tble = "clinic_tmslot";
		
		$updateappt = $dbquery->updateQuery($data, $criteria, $tble);
		
		$db->query($updateappt);
		
		$x++;
		
	
		$dbraw = "SELECT `login`.usr_id, usr_orgid, `case-id` , client_name, solicitor_ref FROM `clinic_tmslot` JOIN `case` ON case_id = `case-id` JOIN `login` ON `login`.usr_id = `clinic_tmslot`.usr_id WHERE `slot-id` ='".$_POST['apptid'][$x]."'";

		$dbrawquery = $db->query($dbraw);
		
		 $client_details = $dbrawquery->fetchRow(DB_FETCHMODE_ASSOC);
		
		  
		
		 $orgres = $db->query("SELECT org_email FROM organisation WHERE org_id = '".$client_details['usr_orgid']."'");
		
		 $org_print =$orgres->fetchRow(DB_FETCHMODE_ASSOC);
		 
		 attendedConfirmation($org_print['org_email'],$client_details,$smtpinfo);
		 
		 sleep(7);
		 
		
	}
	
	
red('../exprtIndex.php');	


?>
