<?

session_start();

include "inc.php";


if (!isset($_SESSION['id']))
{
	rdrctr("Login Details Incorrect","index.html");
}
else
{
	include "dcon.php";
?>

<HTML>

<ITLE>

<TITLE><? echo $_SESSION['n']; ?>'s mLr Home</TITLE>
<SCRIPT language='JavaScript' type='text/javascript' src='Scripts/index.js'></SCRIPT>

<link href="templates/b1.css" type="text/css" rel="StyleSheet" rev="StyleSheet" />
<link href="CSS/calender.css" rel="stylesheet" type="text/css">
<script language="javaScript" type="text/javascript" src="Scripts/calender_date_picker.js"></script>

</HEAD>

<body style="background-color:#c7fd9c;" marginheight="0" marginwidth="0" topmargin="0" leftmargin="0">

<?php

include "templates/template.php";

head();
menu1();
menu3();

?>

<DIV align="center" style="font-size:larger; font-weight:bolder;">Search Results</DIV>

<TABLE align="center" width="100%" border="1">
<TH width="100">First Name</TH>
<TH width="100">Last Name</TH>
<TH width="70">DoB</TH>
<TH width="150">Address</TH>
<TH width="100">Telephone</TH>
<TH width="100">Solicitor</TH>
<TH width="100">Agency</TH>
<Th width="70"></Th>
</TR>
<?php
// include "inc.php";
// include "dcon.php";

$fn=$_POST['fn'];
$ln=$_POST['ln'];

$ad=$_POST['add'];

$dob=$_POST['dob'];

$sref=$_POST['sref'];
$aref=$_POST['aref'];
$sol=$_POST['sol'];
$age=$_POST['age'];

$sql="select * from claimant ";

$cond='';

if (strlen($fn)>0)
{
	$cond="fn='$fn'";
}

if (strlen($ln)>0)
{
	if (strlen($cond)>0)
	{
		$cond=$cond." and ln='$ln'";
	}
	else
	{
		$cond="ln='$ln'";
	}
}

if (strlen($dob)>0)
{
	if (strlen($cond)>0)
	{
		$cond=$cond." and db='$dob'";
	}
	else
	{
		$cond="db='$dob'";
	}
}

if (strlen($ad)>0)
{
	if (strlen($cond)>0)
	{
		$cond=$cond." and add='$ad'";
	}
	else
	{
		$cond="add='$ad'";
	}
}

if (strlen($sref)>0)
{
	if (strlen($cond)>0)
	{
		$cond=$cond." and csolref='$sref'";
	}
	else
	{
		$cond="csolref='$sref'";
	}
}

if (strlen($sref)>0)
{
	if (strlen($cond)>0)
	{
		$cond=$cond." and cageref='$sref'";
	}
	else
	{
		$cond="cageref='$sref'";
	}
}

if (strlen($age)>0)
{
	if (strlen($cond)>0)
	{
		$cond=$cond." and cage='$age'";
	}
	else
	{
		$cond="cage='$age'";
	}
}

if (strlen($sol)>0)
{
	if (strlen($cond)>0)
	{
		$cond=$cond." and csol='$sol'";
	}
	else
	{
		$cond="csol='$sol'";
	}
}


if (strlen($cond)>0)
	$sql=$sql." where ".$cond;

$i=0;
// echo $sql;
$q=mysql_query($sql);
while($r=mysql_fetch_array($q))
{
?>

<form action="ab6.php" method="POST">

<input type="hidden" value="<?php echo $r['cid'];?>" name="id">
<input type="text" readonly="true" value="<?php echo $_POST['dt'];?>" name="dt">
<input type="text" readonly="true" value="<?php echo $_POST['tm'];?>" name="tm">
<input type="hidden" value="<?php echo $_POST['r'];?>" name="r">
<input type="text" readonly="true" value="<?php echo $_POST['d'];?>" name="d">

<TR style="background-color:<?php if ($i=0){$i=1;echo '#AAA';} else {$i=1; echo '#FFF';}?>;">
<TD><?php echo $r['cfn']; ?></TD>
<TD><?php echo $r['cln']; ?></TD>
<TD><?php echo date('d-m-Y', strtotime($r['cdb'])); ?></TD>
<TD><?php echo $r['ca1']."<br />".$r['ca2']; ?></TD>
<TD><?php echo $r['cc1']."<br />".$r['cc2']; ?></TD>
<td><?php $sol="select * from solicitor where sid='".$r['csol']."'";$qsol=mysql_query($sol); $rsol=mysql_fetch_array($qsol); echo $rsol['sn'];?></td>
<td><?php $age="select * from agency where aid='".$r['cage']."'";$qage=mysql_query($age); $rage=mysql_fetch_array($qage); echo $rage['an'];?></td>
<TD><input type="submit" value="Book"></TD>
<?php
}
}
?>

