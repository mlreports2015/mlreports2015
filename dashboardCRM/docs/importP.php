<?php 

session_start();

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Importing</title>
</head>
<body>

<?php 

include '../includes/Mail/Mail.php';
include '../includes/Mail/Mail/mime.php';

include '../includes/dcon.php';
include '../includes/inc.php';
//include 'databaseClass.php';
//include 'mailClass.php';

$smtpinfo["host"] = "mail.mldoctors.com";
$smtpinfo["port"] = "25";
$smtpinfo["auth"] = true;
$smtpinfo["username"] = "admin@mldoctors.com";
$smtpinfo["password"] = "bismillah";

if(isset($_SESSION['usr'])){



//$dbqueries = new DatabaseClass;
//$csvString = file_get_contents("./csv/buyerEmpire.csv");
$headers ='';
$csvString = '';
$target ='../upload/';

//$mailing = new MailClass;
//$mailing->setPlainTxt('new text');



if(is_uploaded_file($_FILES['file']['tmp_name'])){

   echo $_FILES['file']['tmp_name'];

//$csvString = file_get_contents($_FILES['fimport']['tmp_name']);

//$compId = $_POST['compID'];

$target_path = $target.basename( $_FILES['file']['name']);

if(move_uploaded_file($_FILES['file']['tmp_name'], $target_path)) {
    echo "The file ".  basename( $_FILES['file']['name']). 
    " has been uploaded";
	
	$to = array("Dan <danradd.2010@gmail.com>","instructions <services@mldoctors.com>");
	$headers['To'] = $to;
	$headers['Cc']="instructions@mldoctors.com";
	$headers['From'] = "no-reply <admin@mldoctors.com>";
	$headers['Subject']="New Instruction to ML Portal Regarding: ".$_POST['cRef'];
	$crlf="\n";
	
	$text = "Instruction Email From ".$_SESSION['usr']."\n";
	$text = $text." Instruction for : \n Name: ".$_POST['fullName']." \n Reference: ".$_POST['cRef']."\n DOB:".$_POST['cdob']." \n DOA:".$_POST['cdoa'];
	
	//$mailing->setPlainTxt('Test Instruction Email From '.$_SESSION['usr']);
	//$mailing->setSubject('New instruction from ML Portal');
	//$mailing->addAttachments($target_path);
	$params['sendmail_path'] = '/usr/lib/sendmail';
	
	$mime = new Mail_mime(array('eol' => $crlf));
	
	$mime->setTXTBody($text);
	$mime->addAttachment($target_path, 'application/msword');

	$body = $mime->get();
	$hdrs = $mime->headers($headers);
	
    $mail_object =& Mail::factory("sendmail", $params);
/* Ok send mail */


	

    $send = $mail_object->send($to, $hdrs, $body);

 
   if (PEAR::isError($send)) {
    
	   echo("<p>".$send->getMessage()."</p>");
     
	 } else {
     
	  echo("<p>Message/Messages successfully sent</p>");
    
	}

	
	
	
} else{
    echo "There was an error uploading the file, please try again!";
}



}




pLocation("../instructionAdd.php");

}else{

pLocation("../index.php");

}

?>

</body>
</html>