<?php

session_start();

if (!isset($_SESSION['id']))
{
	echo "<SCRIPT type='text/javascript' language='JavaScript'>alert('Session Expired, Please Login Again'); window.location='index.html';</SCRIPT>";
}
else
{
include "dcon.php";
include "templates/template.php";

proc();

$doc=$_POST['d'];
$dt=date('Y-m-d', strtotime($_POST['dt']));
$tm=$_POST['tm'];
$id=$_POST['id'];

echo $doc."<br>";
echo $dt."<br>";
echo $tm."<br>";
echo $id."<br>";

$s="delete from appoint where dt='$dt' and tm='$tm' and org='".$_SESSION['o']."'";
echo $s;
$q=mysql_query($s);

$s="delete from stat where dt='$dt' and tm='$tm' and org='".$_SESSION['o']."'";
echo $s;
$q=mysql_query($s);

$s="insert into appoint set id='$id', dt='$dt', tm='$tm', dr='$doc', org='".$_SESSION['o']."'";
echo $s;
$q=mysql_query($s);

$s="insert into stat set id='$id', dt='$dt', tm='$tm', dr='$doc', stat='0', org='".$_SESSION['o']."'";
echo $s;
$q=mysql_query($s);

echo "<SCRIPT type='text/javascript' language='JavaScript'>alert('Appointment Created!'); window.location='ab.php';</SCRIPT>";
}
