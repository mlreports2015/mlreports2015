<?php
session_start();

//echo $_SESSION['id'];
if (isset($_SESSION['id']))
{

include 'dcon.php';

// Getting Expert Name
$sExp="select * from about where org='".$_SESSION['o']."' and name='".$_SESSION['n']."'";
$qExp=mysql_query($sExp);
$rExp=mysql_fetch_array($qExp);

$dr=$rExp['title'].' '.$rExp['fname'].' '.$rExp['lname'];


// Getting Date
$dt=$_GET['dt'];


// Getting Time
$tm=$_GET['tm'];


// Getting Venue Name, Address & Telephone
$sVen="select * from cclist where cid='".$_GET['cid']."'";
$qVen=mysql_query($sVen);
$rVen=mysql_fetch_array($qVen);

$ven=$rVen['cn'];

$venAd=$rVen['ca'].' '.$rVen['ct'].' '.$rVen['cp'];

$vTel=$rVen['cc'];

// Authorisation details
//$uname = "ali.kazmi@mldoctors.com";
//$pword = "bismillah";

// Configuration variables
$info = "1";
$test = "1";
$nums=$_GET['nums'];

// Data for text message
//$from = substr($_GET['aName'], 0, 11);
$selectednums = "$nums";


$msg="We would like to inform you that a medical appointment has been arranged with $dr on $dt @ $tm at $ven $venAd Tel: $vTel";

$msg=str_replace('<br>', ' ', $msg);

$message = $msg;


?>
<form method='POST' action='Process/textinP.php' style='height:96%;width:88%' >
Mobile No.<br/>
<input type='text' id='txtno' name='txtno' value='<?php echo $selectednums; ?>' style='width:200px;' />
<br/>
SMS Message<br/>
<textarea id='smsComm' name='smsComm' cols='35' rows='5' ><?php echo $msg; ?></textarea>
<br/>
<input type='submit' id='subText' name='subText' value='Send now' />
</form>

<?php

//$message = urlencode($message);

// Prepare data for POST request

/*
$data = "uname=".$uname."&pword=".$pword."&message=".$message."&from=". $from."&selectednums=".$selectednums."&info=".$info."&test=".$test; // Send the POST request with cURL
$ch = curl_init('http://www.txtlocal.com/sendsmspost.php');
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$result = curl_exec($ch); //This is the result from Txtlocal
//echo $result;

$myFile = "texterOut.xml";
$fh = fopen($myFile, 'w') or die("can't open file");
$stringData = $result;
fwrite($fh, $stringData);
fclose($fh);

$rArray=explode('<br>', $result);

$i=0;
*/

/*foreach($rArray as $Result)
{
	echo "$i. $Result<br>";
	$i=$i+1;
}*/

$op='';
$req=explode('=',$rArray[7]);
$rem=explode('=',$rArray[4]);
if ((integer)$req[1] <= (integer)$rem[1])
{
	$sen=explode('=',$rArray[3]);
	$mes=explode('=',$rArray[1]);
	$op="<b>Message Sent By : ".$sen[1]."</b><br>(if agency name is less than 3 characters long, default name, MLReports, is used)<br><br>";
	$op=$op."<b>Message Text</b>";
	$op=$op."<p align='left' style='width:75%'>".$mes[1]."</p>";
}
else
{
	$op="Could Not Connect to SMS Gateway.<br>Please Retry Sending the Message Later.<br>Sorry For the Inconvenience.";
}

//echo $op;
/*
0. TestMode=0
1. MessageReceived=We would like to inform you that a medical appointment has been arranged with Dr H Rehman on 
2. MessageCount=2
3. From=ML Reports
4. CreditsAvailable=8
5. MessageLength=2
6. NumberContacts=1
7. CreditsRequired=2
8. CreditsRemaining=6
*/

curl_close($ch);
}
else
{
	echo 'Session Not Started';
}
?>