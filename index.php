<?php

include "inc.php";
include "dcon.php";

$o=$_POST['org'];
$n=$_POST['lid'];
$p=$_POST['pwd'];

$s="select * from login where org='$o' and name='$n' and pwd='$p'";
// echo $s;
$q=mysql_query($s);

$rn=mysql_numrows($q);

if ($rn>0)
{
	session_start();
	$_SESSION['id']=session_id();
	$_SESSION['n']=$n;
	$_SESSION['o']=$o;
        $_SESSION['p']=$p;

	$id=rand(1,100);
	$id2=rand(10000,10000000);

	echo "<body background='images/back.png'></body>";

	rdrctr("Welcome $n!","home.php?cid=$id&bid=$id2&l=1120");
}
else
{
	rdrctr("Login Details Incorrect","index.html");
}
?>