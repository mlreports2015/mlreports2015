<?php

include "dcon.php";
include "templates/template.php";
include "inc.php";

proc();

$o=$_POST['o'];
$n=$_POST['n'];
$p=$_POST['p'];

$s1="select * from login where org='$o' and name='$n' and pwd='$p' and stat='a'";
// echo $s;
$q1=mysql_query($s1);
$rn1=mysql_numrows($q1);


$s2="select * from login where org='$o' and name='$n' and pwd='$p' and stat='d'";
// echo $s;
$q2=mysql_query($s2);
$rn2=mysql_numrows($q2);

if ($rn1>0 || $rn2>0)
{
	session_start();
	$_SESSION['id']=session_id();
	$_SESSION['n']=$n;
	$_SESSION['o']=$o;

	$id=rand(1,100);
	$id2=rand(10000,10000000);

// 	echo "<body background='images/back.png'></body>";

	session_start();

	rdrctr("Welcome $n!","home.php");
}
else
{
	rdrctr("Login Details Incorrect","index.html");
}

?>