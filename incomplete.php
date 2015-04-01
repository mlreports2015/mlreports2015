<?php

include 'template.php';

head('Incomplete','','','','','');


?>


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
$s="select * from claimant where org='".$_SESSION['o']."' and stat='' ORDER BY cid DESC";
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

if ($i%2==0)
{
	$s="class='lr'";
}
else
{
	$s="class='lb'";
}
?>
<TD><A <?php echo $s; ?> href='det.php?cid=<?echo $r['cid'];?>'><?echo $r['cid'];?></A></TD>
<TD><A <?php echo $s; ?> href='det.php?cid=<?echo $r['cid'];?>'><?echo $r['cfn'];?></A></TD>
<TD><A <?php echo $s; ?> href='det.php?cid=<?echo $r['cid'];?>'><?echo $r['cln'];?></A></TD>
<TD><A <?php echo $s; ?> href='det.php?cid=<?echo $r['cid'];?>'><?echo date('d-m-Y',strtotime($r['cdb']));?></A></TD>
<TD><A <?php echo $s; ?> href='det.php?cid=<?echo $r['cid'];?>'><?echo date('d-m-Y',strtotime($r['cda']));?></A></TD>
<TD><A <?php echo $s; ?> href='det.php?cid=<?echo $r['cid'];?>'><?echo date('d-m-Y',strtotime($r['cde']));?></A></TD>
<TD><A <?php echo $s; ?> href='det.php?cid=<?echo $r['cid'];?>'><?echo $r['ca1']."<br>".$r['ca2'];?></A></TD>
<TD><A <?php echo $s; ?> href='det.php?cid=<?echo $r['cid'];?>'><?echo $r['cp'];?></A></TD>
<TD><A <?php echo $s; ?> href='det.php?cid=<?echo $r['cid'];?>'><?echo $r['cc1']."<br>".$r['cc2'];?></A></TD>
<TD><A <?php echo $s; ?> href='det.php?cid=<?echo $r['cid'];?>'><?echo $r['csolref'];?></A></TD>
<TD><A <?php echo $s; ?> href='det.php?cid=<?echo $r['cid'];?>'><?echo $r['cageref'];?></A></TD>
<TD><A <?php echo $s; ?> href='det.php?cid=<?echo $r['cid'];?>'><?echo $r2['an'];?></A></TD>
<TD><A <?php echo $s; ?> href='det.php?cid=<?echo $r['cid'];?>'><?echo $r1['sn'];?></A></TD>
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
