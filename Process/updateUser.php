<?php


	session_start();
	
	
	echo $_GET['sid'];
	
	$fullname = $_POST['expnme'];
	
	$fullnames = explode(' ',$fullname);	
	
	$qualifs = $_POST['expqual'];
	
	$sid = "update about set qualif ='".$qualifs."' , fname='".$fullnames[0]."' , lname='".$fullnames[1]."' where name='".$_GET['sid']."'";
	
	echo $sid;
	


?>