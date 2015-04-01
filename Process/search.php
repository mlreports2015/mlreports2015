<?

session_start();

include "../inc.php";


if (!isset($_SESSION['id']))
{
	rdrctr("Login Details Incorrect","index.html");
}
else
{
	include "../dcon.php";
?>

<HTML>

<ITLE>

<TITLE><? echo $_SESSION['n']; ?>'s mLr Home</TITLE>

</HEAD>

<BODY background="../images/back.png"></BODY>

<DIV style="background-image : url('../images/fe.png'); background-repeat : no-repeat; width:1024px; float:right;">
<IMG align="middle" src="../images/title3.png" />
<IMG align="middle" src="../images/home.png" style="margin-left : 700px;" />
</DIV>

<DIV style="float:right;right:20px;width:100%;">
<A href=../admin.php>Add Case</A> |
<A href=../all.php>All Cases</A> |
<A href=../search.php>General Search</A> |
<A href=../incomplete.php>Incomplete Cases</A> |
<A href=../complete.php>Complete Cases</A> |
</DIV>

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
include "../dcon.php";
$i=0;
$s="select * from claimant where org='".$_SESSION['o']."'";
// echo "s=".$_SESSION['o'];

$fn=$_POST['fn'];
$ln=$_POST['ln'];
$sr=$_POST['sr'];
$ar=$_POST['ar'];

$cond="";

// echo $fn;

if (strlen($fn)>0)
	$cond="cfn like '$fn%'";

if (strlen($ln)>0 && strlen($cond)>0)
	$cond=$cond." and cln like '$ln%'";
else if (strlen ($ln)>0 && strlen($cond)==0)
	$cond="cln='$ln'";

if (strlen($ar)>0 && strlen($cond)>0)
	$cond=$cond." and cageref='$ar'";
else if (strlen ($ar)>0 && strlen($cond)==0)
	$cond="cageref='$ar'";

if (strlen($ar)>0 && strlen($cond)>0)
	$cond=$cond." and csolref='$sr'";
else if (strlen ($ar)>0 && strlen($cond)==0)
	$cond="csolref='$sr'";

// echo $cond;

if (strlen($cond)>0)
	$s=$s." and ".$cond;

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
<TR style="background-color:<?if ($i%2==0)echo '#99AAFF;'; else echo '#AACCFF;';?>">
<TD><A href='../det.php?cid=<?echo $r['cid'];?>'><?echo $r['cid'];?></A></TD>
<TD><A href='../det.php?cid=<?echo $r['cid'];?>'><?echo $r['cfn'];?></A></TD>
<TD><A href='../det.php?cid=<?echo $r['cid'];?>'><?echo $r['cln'];?></A></TD>
<TD><A href='../det.php?cid=<?echo $r['cid'];?>'><?echo date('d-m-Y',strtotime($r['cdb']));?></A></TD>
<TD><A href='../det.php?cid=<?echo $r['cid'];?>'><?echo date('d-m-Y',strtotime($r['cda']));?></A></TD>
<TD><A href='../det.php?cid=<?echo $r['cid'];?>'><?echo date('d-m-Y',strtotime($r['cde']));?></A></TD>
<TD><A href='../det.php?cid=<?echo $r['cid'];?>'><?echo $r['ca1']."<br>".$r['ca2'];?></A></TD>
<TD><A href='../det.php?cid=<?echo $r['cid'];?>'><?echo $r['cp'];?></A></TD>
<TD><A href='../det.php?cid=<?echo $r['cid'];?>'><?echo $r['cc1']."<br>".$r['cc2'];?></A></TD>
<TD><A href='../det.php?cid=<?echo $r['cid'];?>'><?echo $r['csolref'];?></A></TD>
<TD><A href='../det.php?cid=<?echo $r['cid'];?>'><?echo $r['cageref'];?></A></TD>
<TD><A href='../det.php?cid=<?echo $r['cid'];?>'><?echo $r2['an'];?></A></TD>
<TD><A href='../det.php?cid=<?echo $r['cid'];?>'><?echo $r1['sn'];?></A></TD>
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