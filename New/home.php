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

<link href="templates/b1.css" type="text/css" rel="StyleSheet" rev="StyleSheet" />

</HEAD>

<body style="background-color:#c7fd9c;" marginheight="0" marginwidth="0" topmargin="0" leftmargin="0">

<?php

include "templates/template.php";

head();
menu1();
menu3();

?>

<div align="right">
<?php

$s="select * from claimant where org='".$_SESSION['o']."'";
$q=mysql_query($s);
$n=mysql_numrows($q);

$p=$n/15;

if ($p>round($p,0))
	$p=$p+1;

for ($i=1;$i<=$p;$i++)
	echo $i;
?>
</div>

<DIV style="width:100%;float:right;">
<TABLE width="100%" align="center" border="1">

<TR>
<TD>ID</TD>
<TD>Firt Name</TD>
<TD>Last Name</TD>
<TD>DOB</TD>
<TD>DOA</TD>
<TD>DOE</TD>
<TD>Address</TD>
<TD>Post Code</TD>
<TD>Contact</TD>
<TD>Solicitor Reference</TD>
<TD>Agency Reference</TD>
<TD>Agency</TD>
<TD>Solicitor</TD>

</TR>
<?
include "dcon.php";
$i=0;
$s="select * from claimant where org='".$_SESSION['o']."'";
// echo "s=".$_SESSION['o'];
$q=mysql_query($s);
while ($r=mysql_fetch_array($q))
{
// 	echo $r['cid'];
$s1="select * from solicitor where sid='".$r['csol']."'";
$s2="select * from agency where aid='".$r['cage']."'";

$q1=mysql_query($s1);
$q2=mysql_query($s2);

$r1=mysql_fetch_array($q1);
$r2=mysql_fetch_array($q2);
?>
<TR style="background-color:<?if ($i%2==0)echo '#77DD77;'; else echo '#66FF66;';?>">
<TD><A href='det.php?cid=<?echo $r['cid'];?>'><?echo $r['cid'];?></A></TD>
<TD><A href='det.php?cid=<?echo $r['cid'];?>'><?echo $r['cfn'];?></A></TD>
<TD><A href='det.php?cid=<?echo $r['cid'];?>'><?echo $r['cln'];?></A></TD>
<TD><A href='det.php?cid=<?echo $r['cid'];?>'><?echo date('d-m-Y',strtotime($r['cdb']));?></A></TD>
<TD><A href='det.php?cid=<?echo $r['cid'];?>'><?echo date('d-m-Y',strtotime($r['cda']));?></A></TD>
<TD><A href='det.php?cid=<?echo $r['cid'];?>'><?echo date('d-m-Y',strtotime($r['cde']));?></A></TD>
<TD><A href='det.php?cid=<?echo $r['cid'];?>'><?echo $r['ca1']."<br>".$r['ca2'];?></A></TD>
<TD><A href='det.php?cid=<?echo $r['cid'];?>'><?echo $r['cp'];?></A></TD>
<TD><A href='det.php?cid=<?echo $r['cid'];?>'><?echo $r['cc1']."<br>".$r['cc2'];?></A></TD>
<TD><A href='det.php?cid=<?echo $r['cid'];?>'><?echo $r['csolref'];?></A></TD>
<TD><A href='det.php?cid=<?echo $r['cid'];?>'><?echo $r['cageref'];?></A></TD>
<TD><A href='det.php?cid=<?echo $r['cid'];?>'><?echo $r2['an'];?></A></TD>
<TD><A href='det.php?cid=<?echo $r['cid'];?>'><?echo $r1['sn'];?></A></TD>
</TD>
</TR>

<?
$i=$i+1;
}
?>

</TABLE>
</DIV>

</Body>
</HTML>

<?
}
?>