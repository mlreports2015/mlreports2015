<?php

session_start();

include '../includes/dcon.php';
//include 'emailing.php';
//include 'includes/inc.php';
include 'databaseClass.php';

$dbquery = new DatabaseClass();


if($_GET['appt_id']) {
	

	include 'emailing.php';

    $smtpinfo = array();
	
	$smtpinfo["host"] = "host266.hostmonster.com";
	$smtpinfo["port"] = "26";
	$smtpinfo["auth"] = true;
	$smtpinfo["username"] = "admin@mldoc.com";
	$smtpinfo["password"] = "BismiLlah786";


    $statement = "SELECT org_email FROM organisation WHERE org_id = '".$_SESSION['org']."'";
	
	$stateres = $db->query($statement);
	
	$orgemail = $stateres->fetchRow(DB_FETCHMODE_ASSOC);
	
	//print_r($orgemail);
	
	$criteria = array("`slot-id`" => $_GET['appt_id']);
    $fields = array("deleted_at" => date("Y-m-d H:i:s"));
	$tble = "clinic_tmslot";

    $rmveResult = $dbquery->updateQuery($fields,$criteria, $tble);
		
	//print_r($rmveResult);

    if($db->query($rmveResult)){
		
		echo "appointment deleted";
	
	}
	
	
	deletionConfirmation($orgemail['org_email'] ,$smtpinfo);
	
}



?>
