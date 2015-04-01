<?php

include "dcon.php";
include "templates/template.php";
include "inc.php";
include "emailer.php";

proc();

$o=$_POST['o'];
$n=$_POST['n'];
$a1=$_POST['a1'];
$a2=$_POST['a2'];
$a3=$_POST['a3'];
$ct=$_POST['ct'];
$pc=$_POST['pc'];
$t1=$_POST['t1'];
$t2=$_POST['t2'];
$f=$_POST['f'];
$i=$_POST['i'];
$s=$_POST['s'];

mkdir("uSig/$o");

$s="insert into org set org='$o', creator='$n', a1='$a1', a2='$a2', a3='$a3', ct='$ct', pc='$pc', tel1='$t1', tel2='$t2', fax='$f', stat='p', ini='$i', snum='$s'";
echo $s;
mysql_query($s);

$subject1 = "Organization Creation Confirmation";
$body1 = "A new organization has been created!<table><tr><Td>Organization Name</td><td>$o</td></tr><tr><td>Creator</td><td>$n</td></tr><tr><td>Tel 1</td><td>$t1</td></tr><tr><td>Tel 2</td><td>$t2</td></tr></table>";
if (sendmail("ML Reports Confirmation", "no-reply@mlreports.com", "", "alikazmi.2040@gmail.com", $subject1, "", $body1, ""))
{
	alert('The Organization Details Have Been Entered Into the System, You will Be Contacted Shortly!', "index.html");

	echo "<SCRIPT type='text/javascript' language='JavaScript'>javascript:parent.myfunction('$o', '$n');</SCRIPT>";
}
else
{
	rdrctr('Confirmation Email Could Not be Sent, Try Again!', "nu.html");
}
?>