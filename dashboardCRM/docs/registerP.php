<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="refresh" content="6;url='http://www.mldoctors.com'" />
<title>ML Portal Register</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>

</head>

<body style="overflow:hidden;background-image:url(../Images/background-texture.jpg);background-size:cover;">
<div style="background-color:rgba(255,255,255,0.8);width:100%;height:1600px;">

<?php

include "../includes/dcon.php";
include "../includes/Mail/Mail.php";
//include "../includes/Mail/Net/SMTP.php";
//include 'databaseClass.php';


$smtpinfo["host"] = "mail.mldoctors.com";
$smtpinfo["port"] = "25";
$smtpinfo["auth"] = true;
$smtpinfo["username"] = "admin@mldoctors.com";
$smtpinfo["password"] = "bismillah";


if($_POST['orgnm']!="" || $_POST['orgcont']!="") {
    /*
    $dbquery = new DatabaseClass();

    $dbfields=array("org_name", "org_contact", "org_address1", "org_pCode","org_email","created_at");
    $dbvalues=array($_POST['orgnm'],$_POST['orgcont'],$_POST['addy1'] ,$_POST['orgpcode'],$_POST['orgmail'],time());
    */

    if ($_POST['orgtyp'] == 'exprt') {

        $dbtbl = "expert";

        $dbinsert = "INSERT INTO " . $dbtbl . " SET exp_name='" . $_POST['orgcont'] . "',exp_address1='" . $_POST['addy1'] . "', exp_pcode='" . $_POST['orgpcode'] . "', exp_number = '".$_POST['orgtele']."' ,exp_email='" . $_POST['orgmail'] . "',created_on=" . time();


    } else {

        $dbtbl = "organisation";

        $dbinsert = "INSERT INTO " . $dbtbl . " SET org_name ='" . $_POST['orgnm'] . "', org_typ ='".$_POST['orgtyp']."' , org_contact='" . $_POST['orgcont'] . "', org_telephone='".$_POST['orgtele']."',org_address1='" . $_POST['addy1'] . "', org_pCode='" . $_POST['orgpcode'] . "',org_email='" . $_POST['orgmail'] . "',created_at=" . time();

    }
//$statement =$dbquery->insertquery($dbfields, $dbvalues, $dbtbl);

$res = mysql_query($dbinsert )or  die("error: ".mysql_error());;

//$res = $db->query($statement) or  die($db->errorno());

$resID = mysql_insert_id();



if($resID!=""){


$to = "Dan <danradd.2010@gmail.com>";
$headers['To'] = $to;
$headers['Bcc']="Dan <danradd.2010@gmail.com>";
$headers['From'] = "admin <admin@mldoctors.com>";
$headers['Subject']="New Registration to ML Portal";

$params['sendmail_path'] = '/usr/lib/sendmail';


$body = "Registration email, The ".$_POST['orgnm']." has joined see their details below:\n";
$body = $body."\n ".$_POST['orgnm']." \n ".$_POST['orgcont']." \n ". $_POST['addy1']." \n ".$_POST['orgpcode']." \n ".$_POST['orgmail']."\n ".$_POST['orgtele'];


//echo $body;

//need smtp/socket/mail etc 

$mail_object =& Mail::factory("sendmail", $params);
/* Ok send mail */

$send = $mail_object->send(array("danradd.2010@gmail.com"), $headers, $body);

 
   if (PEAR::isError($send)) {
    
	   echo("<p>".$send->getMessage()."</p>");
     
	 } else {
     
	 // echo("<p>Message/Messages successfully sent</p>");
    
	}


    $to = $_POST['orgmail'];
    $headers['To'] = $to;
    $headers['Bcc']="Dan <danradd.2010@gmail.com>";
    $headers['From'] = "admin <admin@mldoctors.com>";
    $headers['Subject']="ML Doctors Portal Registration is being Processed";

    $params['sendmail_path'] = '/usr/lib/sendmail';


    $body = "Dear User \n Thank you very much for registering with ML Doctors Portal. We will endeavour to process your request shortly. \n\n Kind Regards \n \n ML Doctors";


    $mail_object =& Mail::factory("sendmail", $params);
    /* Ok send mail */

    $send = $mail_object->send(array($_POST['orgmail']), $headers, $body);


    if (PEAR::isError($send)) {

        echo("<p>".$send->getMessage()."</p>");

    } else {

        //echo("<p>Message/Messages successfully sent</p>");

    }






  }// make sure insert is successfully.



}

?>

<div style="width:97%;height:650px;border-radius:7px" align='center'>

<div align='center' style="position:relative;top:160px;width:450px;height:250px;border:1px solid #777;border-radius:6px;background-color:rgba(215,215,215,0.4);box-shadow:7px 5px 5px #888;">
<table width='98%' height='100%'>
<td>
  <p style="text-indent:5px;font-size:18px;text-align:center;">Thank you for registering. Your information will be processed shortly.
  <br/></p>
</td>
</tr>
<tr>
<td align="center" ><a href="http://www.mldoctors.com" >Return to Home</a></td>
</tr>
</table>
</div>

</div>

</div>
</div>
</body>
</html>