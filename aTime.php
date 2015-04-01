<?php

session_start();

$dt=$_GET['dt'];
$v=$_GET['ven'];

$o=$_SESSION['o'];
$n=$_SESSION['n'];


include 'dcon.php';

$s="select * from app where dt='".date('Y-m-d', strtotime($dt))."' and org='$o' and dr='$n'";
//echo $s;
$q=mysql_query($s);

$c=mysql_num_rows($q);

if ($c>0)
{
	$r=mysql_fetch_array($q);
	$st=strtotime($r['stime']);
	$et=strtotime($r['etime']);
	$tm=$r['apptm'];
	
	$sl=(($et-$st)/$tm)/60;
	
	echo $s1;
	$i=0;
	
	
	echo "<div align='left' style='width:200px; float:left;'><b>Time Slots Available</b><br>";
	echo "Clear<input type='button' value='Select' onclick='document.getElementById(\"tm\").value=\"\"; document.getElementById(\"livesearch2\").style.visibility=\"hidden\";' ><br>";
	while ($i<$sl)
	{
		$time=$st+($tm*$i*60);

		$s2="select * from appoint where tm='".date('H:i',$time)."' and dt='".date('Y-m-d', strtotime($dt))."' and dr='$n' and org='$o'";
		$q2=mysql_query($s2);
		$c2=mysql_num_rows($q2);
		
		if ($c2==0)
		{
			echo date('H:i',$time)."<input type='button' value='Select' onclick='document.getElementById(\"tm\").value=\"".date('H:i',$time)."\"; document.getElementById(\"livesearch2\").style.visibility=\"hidden\";' ><br>";
		}
		$i=$i+1;
	}
	echo "</div>";
}
else
{
	echo "<div align='left'><b>No Clinic Booked On Date of Examination</b></div>";
}

?>