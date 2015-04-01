<?
session_start();

include "inc.php";


if (!isset($_SESSION['id']))
{
	rdrctr("Login Details Incorrect","index.html");
}
else
{
?>

<HTML>
<HEAD>
<TITLE></TITLE>
</HEAD>

<BODY>

<A href='search.php'>General Search</A> |
<A href='incomplete.php'>Incomplete Cases</A> |
<A href='complete.php'>Completed Cases</A>

<CENTER><H1>All Cases</H1></CENTER>

<TABLE align="center" border="1">

<TR>
<TD>ID</TD>
<TD>Solicitor Reference</TD>
<TD>Agency Reference</TD>
<TD>Firt Name</TD>
<TD>Last Name</TD>
<TD>DOB</TD>
<TD>DOA</TD>
<TD>DOE</TD>
<TD>Address</TD>
<TD>Post Code</TD>
<TD>Contact</TD>
<TD>Agency</TD>
<TD>Solicitor</TD>


</TR>
<?
include "dcon.php";
$i=0;
$s="select * from claimant";
// echo $s;
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
<TR style="background-color:<?if ($i%2==0)echo '#559ACC;'; else echo '#AACCFF;';?>">
<TD><A href='case.php?cid=<?echo $r['cid'];?>'><?echo $r['cid'];?></A></TD>
<TD><A href='case.php?cid=<?echo $r['cid'];?>'><?echo $r['csolref'];?></A></TD>
<TD><A href='case.php?cid=<?echo $r['cid'];?>'><?echo $r['cageref'];?></A></TD>
<TD><A href='case.php?cid=<?echo $r['cid'];?>'><?echo $r['cfn'];?></A></TD>
<TD><A href='case.php?cid=<?echo $r['cid'];?>'><?echo $r['cln'];?></A></TD>
<TD><A href='case.php?cid=<?echo $r['cid'];?>'><?echo date('d-m-Y',strtotime($r['cdb']));?></A></TD>
<TD><A href='case.php?cid=<?echo $r['cid'];?>'><?echo date('d-m-Y',strtotime($r['cda']));?></A></TD>
<TD><A href='case.php?cid=<?echo $r['cid'];?>'><?echo date('d-m-Y',strtotime($r['cde']));?></A></TD>
<TD><A href='case.php?cid=<?echo $r['cid'];?>'><?echo $r['ca1']."<br>".$r['ca2'];?></A></TD>
<TD><A href='case.php?cid=<?echo $r['cid'];?>'><?echo $r['cp'];?></A></TD>
<TD><A href='case.php?cid=<?echo $r['cid'];?>'><?echo $r['cc1']."<br>".$r['cc2'];?></A></TD>
<TD><A href='case.php?cid=<?echo $r['cid'];?>'><?echo $r2['an'];?></A></TD>
<TD><A href='case.php?cid=<?echo $r['cid'];?>'><?echo $r1['sn'];?></A></TD>
</TD>

<?
$i=$i+1;
}
?>

</TABLE>

</BODY>


</HTML>
<?
}
?>