<?php

session_start();

if (isset($_SESSION['n'])==1)
{
	include 'dcon.php';
	include 'inc.php';
	
	$rId=$_GET['rId'];

	$sql="update doer set rS='1' where rId='".$_GET['rId']."'";
	mysql_query($sql);
	
	red("home.php");
}
?>