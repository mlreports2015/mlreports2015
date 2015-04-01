<?php

include 'template.php';

head('Home','','','','', '');
?>

<DIV style="width:100%;float:right;">
<TABLE width="100%" align="center" border="1">

<TR>
<TD>ID</font></Th>
<Th>Firt Name</font></Th>
<Th>Last Name</font></Th>
<Th>DOB</font></Th>
<Th>DOA</font></Th>
<Th>DOE</font></Th>
<Th>Address</font></Th>
<Th>Post Code</font></Th>
<Th>Contact</font></Th>
<Th>Solicitor Reference</font></Th>
<Th>Agency Reference</font></Th>
<Th>Agency</font></Th>
<Th>Solicitor</font></Th>

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
<TR>
<TD><A <?php echo $s; ?> href='det.php?cid=<?echo $r['cid'];?>'><?echo $r['cid'];?></A></TD>
<TD><A <?php echo $s; ?> href='det.php?cid=<?echo $r['cid'];?>'><?echo $r['cfn'];?></A></TD>
<TD><A <?php echo $s; ?> href='det.php?cid=<?echo $r['cid'];?>'><?echo $r['cln'];?></A></TD>
<TD><A <?php echo $s; ?> href='det.php?cid=<?echo $r['cid'];?>'><? if (strcmp(date('d-m-Y',strtotime($r['cdb'])),'01-01-1200')!=0) {  echo date('d-m-Y',strtotime($r['cdb']));}?></A></TD>
<TD><A <?php echo $s; ?> href='det.php?cid=<?echo $r['cid'];?>'><? if (strcmp(date('d-m-Y',strtotime($r['cda'])),'01-01-1200')!=0) {  echo date('d-m-Y',strtotime($r['cda']));}?></A></TD>
<TD><A <?php echo $s; ?> href='det.php?cid=<?echo $r['cid'];?>'><? if (strcmp(date('d-m-Y',strtotime($r['cde'])),'01-01-1200')!=0) {  echo date('d-m-Y',strtotime($r['cde']));}?></A></TD>
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

<?

?>