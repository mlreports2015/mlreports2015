<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
 <!-- <meta http-equiv="refresh" content="8;url='http://localhost/dashboardCRM/'" />-->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>ML Portal Register</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>

</head>

<body style="overflow:hidden;background-image:url(../Images/background-test1b.png);background-size:cover;">
<div style="background-color:rgba(255,255,255,0.8);width:100%;height:1600px;">

<?php

include "../includes/dcon.php";
//include "../includes/Mail/Mail.php";
//include "../includes/Mail/Mail/mime.php";
//include "../includes/Mail/Net/SMTP.php";
include 'databaseClass.php';
include 'emailing.php';

/*
$smtpinfo = array();
$smtpinfo["host"] = "host266.hostmonster.com";
$smtpinfo["port"] = "26";
$smtpinfo["auth"] = true;
$smtpinfo["username"] = "admin@mldoc.com";
$smtpinfo["password"] = "BismiLlah786";
*/



$smtpinfo = array();
$smtpinfo["host"] = "server.webnesters.co.uk";
$smtpinfo["port"] = "465";
$smtpinfo["auth"] = true;
$smtpinfo["username"] = "mladmin@mldoctors.com";
$smtpinfo["password"] = "BismiLlah786";


if($_POST['orgcont']!="" && $_POST['orgtyp']!="") {


// db statement design
    $dbquery = new DatabaseClass();
    $confirmationcode = base64_encode($_POST['orgmail']);

//    echo $confirmationcode;

    if ($_POST['orgtyp'] == 'exprt') {

        $dbfields = array("exp_name", "exp_typ", "exp_number", "exp_email", "exp_address1", "exp_address2", "exp_pcode" ,"created_at");
        $dbvalues = array($_POST['orgcont'], $_POST['xprtype'] , $_POST['orgtele'] ,$_POST['orgmail'], $_POST['addy1'], $_POST['addy2'] ,$_POST['orgpcode'], time());
        $dbtbl = "expert";


    } else {
		
		$dbtbl = "organisation";
		$params = array('org_name'=>$_POST['orgnm'],'org_pCode'=>$_POST['orgpcode']);
		
		$validState = $dbquery->selectALL($dbtbl, $params);
		
		$validSteRes = $db->query($validState);
		
		if($validSteRes->numRows()==0){
		

        $dbfields = array("org_name", "org_contact", "org_address1", "org_address2" ,"org_pCode", "org_email", "org_confirmation", "created_at");
        $dbvalues = array($_POST['orgnm'], $_POST['orgcont'], $_POST['addy1'], $_POST['addy2'], $_POST['orgpcode'], $_POST['orgmail'], $confirmationcode, time());
        //$dbtbl = "organisation";
		
		}else{
			
		
		
			echo "<script> document.location ='http://localhost/dashboardCRM/register.php' </script>";
			
		    exit();     
		   
		
		}
		
		
		
    }
//$dbinsert = "INSERT INTO ".$dbtbl." SET org_name ='".$_POST['orgnm']."', org_contact='".$_POST['orgcont']."',org_address1='".$_POST['addy1']."', org_pCode='".$_POST['orgpcode']."',org_email='".$_POST['orgmail']."',created_at=".time();

$statement = $dbquery->insertquery($dbfields, $dbvalues, $dbtbl);

//$res = mysql_query($dbinsert )or  die("error: ".mysql_error());;

//execute db statement

$res = $db->query($statement) or  die($db->errorno());

$resID = mysql_insert_id();


if($resID!=""){


    $dbfields = array("usr_typ","usr_nme","usr_pass","usr_hash", "usr_orgid");
    $dbvalues = array($_POST['orgtyp'],$_POST['orgmail'],$_POST['pass1'], addslashes(crypt($_POST['pass1'])),$resID);
    $dbtbl = "login";

    $usrstatement =$dbquery->insertquery($dbfields, $dbvalues, $dbtbl);

     $db->query($usrstatement) or die($db->errorno());

// header array

	registrationemail('','',$smtpinfo);





}// make sure insert is successfully.



}

?>

<div style="width:97%;height:650px;border-radius:7px" align='center'>

<div align='center' style="position:relative;top:160px;width:450px;height:250px;border:1px solid #777;border-radius:6px;background-color:rgba(8,82,126,0.3);box-shadow:7px 5px 5px #888;">
<table width='98%' height='100%'>
<td>
  <p style="text-indent:5px;font-size:18px;text-align:center;">Thank you for registering. Your information will be processed shortly.
  <br/></p>
</td>
</tr>
<tr>
<td align="center" ><a href="" >Return to Home</a></td>
</tr>
</table>
</div>

</div>

</div>
</div>

</body>
</html>