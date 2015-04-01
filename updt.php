<?php

session_start();

if (!isset($_SESSION['id']))
{
	echo "<SCRIPT type='text/javascript' language='JavaScript'>alert('Session Expired, Please Login Again'); window.location='index.html';</SCRIPT>";
}
else
{
include "dcon.php";

$doc=$_POST['d'];
$dt=date('Y-m-d', strtotime($_POST['dt']));
$tm=date('H:i', $_POST['tm']);
$id=$_POST['id'];
$stat=$_POST['st'];

echo $doc."<br>";
echo $dt."<br>";
echo $tm."<br>";
echo $id."<br>";


$s="delete from stat where dt='$dt' and tm='$tm' and org='".$_SESSION['o']."' and dr='$doc'";
echo $s;
$q=mysql_query($s);


$s="insert into stat set id='$id', dt='$dt', tm='$tm', dr='$doc', stat='$stat', org='".$_SESSION['o']."'";
echo $s;
$q=mysql_query($s);

echo "<SCRIPT type='text/javascript' language='JavaScript'>alert('Appointment Created!'); window.location='ab.php';</SCRIPT>";
}
