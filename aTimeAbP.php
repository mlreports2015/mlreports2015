<?php

session_start();

if (!isset($_SESSION['id']))
{
	echo "<SCRIPT type='text/javascript' language='JavaScript'>alert('Session Expired, Please Login Again'); window.location='index.html';</SCRIPT>";
}
else
{
	include "dcon.php";
	
	$doc=$_POST['doc'];
	$dt=date('Y-m-d', strtotime($_POST['dt1']));
	$tm=$_POST['tm'];
	$stm=$_POST['stm'];
	$etm=$_POST['etm'];
	
	// echo strlen(trim($dt))."<br>";
	// echo strlen(trim($tm))."<br>";
	// echo strlen(trim($stm))."<br>";
	// echo strlen(trim($etm))."<br>";
	
	if (strlen(trim($dt))==0 || strlen(trim($tm))==0 || strlen(trim($stm))==0 || strlen(trim($etm))==0)
	{
		echo "<SCRIPT type='text/javascript' language='JavaScript'>alert('One or More Fields Were Blank'); window.location='ab.php';</SCRIPT>";
	}
	else
	{
	
		$sel="select * from app where dr='$doc' and dt='$dt' and org='".$_SESSION['o']."'";
		$que=mysql_query($sel);
	
	$chk='';
		while ($row=mysql_fetch_array($que))
		{
			$stme=strtotime($row['stime']);
			$etme=strtotime($row['etime']);
	
			$st=strtotime($stm);
			$et=strtotime($etm);
	
			if ($st>$stme && $st<$etme || $et> $stme && $st<$stme)
			{
				$chk='c';
				echo "<SCRIPT type='text/javascript' language='JavaScript'>alert('Appointment Times Clash With Previously Entered Times!'); window.location='ab.php';</SCRIPT>";
			}
		}
	
		if ($chk=='')
		{
			$s="insert into app set dr='$doc', stime='$stm', etime='$etm', apptm='$tm', dt='$dt', org='".$_SESSION['o']."'";
	//		echo $s;
			$q=mysql_query($s);
		}
		
		echo 'Appointment Book Entries Created!';
	}

}

?>