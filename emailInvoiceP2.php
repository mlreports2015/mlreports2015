<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
$to = $_POST['to'];
//$from = "ali.kazmi@mldoctors.com";
$subject = $_POST['sub'];
$message=$_POST['elm1'];
echo $message;
// a random hash will be necessary to send mixed content
$separator = md5(time());
// carriage return type (we use a PHP end of line constant)
$eol = PHP_EOL;
$separator = md5(time());
// carriage return type (we use a PHP end of line constant)
$eol = PHP_EOL;

//phpinfo();

// attachment name
// encode data (puts attachment in proper format)
//$pdfdoc = file_get_contents('../uploads/'.$_POST['cId'].'/'.$_POST['invoice'].'.pdf');

//$attachment = chunk_split(base64_encode($pdfdoc));

// main header (multipart mandatory)
//$headers = "From: ".$from.$eol;
//$headers .= "MIME-Version: 1.0".$eol;
//$headers .= "Content-Type: multipart/mixed; boundary=\"".$separator."\"".$eol.$eol;
//$headers .= "Content-Transfer-Encoding: 7bit".$eol;
//$headers .= "This is a MIME encoded message.".$eol.$eol;
//
//// message
//$headers .= "--".$separator.$eol;
//$headers .= "Content-Type: text/html; charset=\"iso-8859-1\"".$eol;
//$headers .= "Content-Transfer-Encoding: 8bit".$eol.$eol;
//$headers .= $message.$eol.$eol;
//
//// attachment
//$headers .= "--".$separator.$eol;
//$headers .= "Content-Type: application/pdf; name=\"".$filename."\"".$eol;
//$headers .= "Content-Transfer-Encoding: base64".$eol;
//$headers .= "Content-Disposition: attachment".$eol.$eol;
//$headers .= $attachment.$eol.$eol;
//$headers .= "--".$separator."--";

// send message
//mail($to, $subject, "", $headers);
include('/home1/mlreport/php/Mail.php');
//include("/home1/mlreport/php/Mail/mime.php");

$crlf = PHP_EOL;
//server details
$smtpinfo["host"] = "mail.mlreports.com";
$smtpinfo["port"] = "25";
$smtpinfo["auth"] = true;
$smtpinfo["username"] = "info@mlreports.com";
$smtpinfo["password"] = "bismillah";
//print_r($smtpinfo);

//message
//$message = new Mail_mime($crlf);
//$message->setHTMLBody($_POST['elm1']);

//print_r($message);
//body
$body = $message;
//$mail_object = new Mail();
//$body = $message->get();

//header
$headers['From']    = 'MLReports<info@mlreports.com>';
$headers['To']      = $to;
$headers['Subject'] = 'MLREPORTS NOTICE';
//$headers2 = $message->headers($headers);

$sendMail['sendmail_path']='/usr/sbin/sendmail';

/* Create the mail object using the Mail::factory method */
//$mail_object =Mail::factory("sendmail", $sendMail);
$mail_object =Mail::factory("smtp", $smtpinfo);
//print_r($mail_object);
if (PEAR::isError($mail_object)) {
   echo $mail_object->getMessage(); 
}
/* Ok send mail */
$send = $mail_object->send('danradd.2010@gmail.com', $headers, $body);

if (PEAR::isError($send)) {
   echo $send->getMessage(); 
}
/*
include "dcon.php";

$attach='Invoices/'.$_POST['invoice'].'.pdf';
if (is_file($attach))
{
	$sql="insert into emails set `rec`='".$to."', subj='".$_POST['sub']."', msg='".addslashes($_POST['elm1'])."', attachment='$attach'";
}
else
{
	$sql="insert into emails set `rec`='".$to."', subj='".$_POST['sub']."', msg='".addslashes($_POST['elm1'])."'";
}
mysql_query($sql);

*/

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>ML REPORTS messaging </title>
<link type="text/css" rel="stylesheet" rev="stylesheet" href="style/style.css" />
</head>

<body>
    

</body>

</html>