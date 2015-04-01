<?php
session_start();

echo ($_SESSION['id']);

if($_SESSION['id']){

$cellno = trim($_POST['txtno']);
$smsmsg = $_POST['smsComm'];

include  'fast_sms_api.php';

$Parameters['Action']="Send";
$Parameters['DestinationAddress']=$cellno;
$Parameters['SourceAddress']="ML Reports";
$Parameters['Body']=$smsmsg;
$Parameters['ValidityPeriod']="86400";


//print_r($Parameters);

$resultcode=api_connect("nsp09685", "36a4316", $Parameters);

//print_r($resultcode);

	if ($resultcode>0)
	{
   echo "Message sent with ID: ".$resultcode;
	}
else
	{
   echo "An error occurred. ID: ".$resultcode;
	}





}

?>
