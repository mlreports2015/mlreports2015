<?php

$org=$_GET['org'];
$nm=$_GET['lid'];
$pwd=$_GET['pwd'];


//loader
	include "dcon.php";
	include "inc.php";
	
$s="select count(*) from login where org='$org' and name= '$nm' and pwd = '$pwd'"	
$sres = mysql_query($s)
$sresprint = mysql_fetch_row($sres)

if($sresprint[0] > 0){

	   	$sn = urlencode($_GET['val']);
		$sn = stripslashes($sn);
		
		$cuss = mysql_query($sn);
		
		if($cuss!=''){
			
			echo "success fully added ";
		
		}


}else{

		echo "not logged in";

}

	
	
	
?>