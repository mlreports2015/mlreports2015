<?php

include 'template.php';

head('Complete','','','','','');


?>


<DIV style="width:100%;float:right;">
<TABLE width="96%" align="center" cellpadding="5px" rules="all" border="1" style="font-family:sans-serif;">

<TR>
<TH style="border-style:solid; border-width:1px; border-color:#000;">ID</TH>
<TH style="border-style:solid; border-width:1px; border-color:#000;" >Name</TH>
<TH style="border-style:solid; border-width:1px; border-color:#000;" >DOA</TH>
<TH style="border-style:solid; border-width:1px; border-color:#000;" >DOE</TH>
<TH style="border-style:solid; border-width:1px; border-color:#000;" >Address</TH>
<TH style="border-style:solid; border-width:1px; border-color:#000;" >Post Code</TH>
<TH style="border-style:solid; border-width:1px; border-color:#000;" >Agency</TH>
<TH style="border-style:solid; border-width:1px; border-color:#000;" >Solicitor</TH>

</TR>
<?
include "dcon.php";
$i=0;
$s="select * from claimant where org='".$_SESSION['o']."' and stat='c'";
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
<TD style="border-style:solid; border-width:1px; border-color:#A61515;"><A <?php echo $s; ?> href='det.php?cid=<?echo $r['cid'];?>'><?echo $r['cid'];?></A></TD>
<TD style="border-style:solid; border-width:1px; border-color:#A61515;"><A <?php echo $s; ?> href='det.php?cid=<?echo $r['cid'];?>'><?echo $r['cfn']." ".$r['cln']; ?></A></TD>
<TD style="border-style:solid; border-width:1px; border-color:#A61515;"><A <?php echo $s; ?> href='det.php?cid=<?echo $r['cid'];?>'><?echo date('d-m-Y',strtotime($r['cda']));?></A></TD>
<TD style="border-style:solid; border-width:1px; border-color:#A61515;"><A <?php echo $s; ?> href='det.php?cid=<?echo $r['cid'];?>'><?echo date('d-m-Y',strtotime($r['cde']));?></A></TD>
<TD style="border-style:solid; border-width:1px; border-color:#A61515;"><A <?php echo $s; ?> href='det.php?cid=<?echo $r['cid'];?>'><?echo $r['ca1']."<br>".$r['ca2'];?></A></TD>
<TD style="border-style:solid; border-width:1px; border-color:#A61515;"><A <?php echo $s; ?> href='det.php?cid=<?echo $r['cid'];?>'><?echo $r['cp'];?></A></TD>
<TD style="border-style:solid; border-width:1px; border-color:#A61515;"><A <?php echo $s; ?> href='det.php?cid=<?echo $r['cid'];?>'><? echo $r1['sn']."<br/>".$r['csolref'];?></A></TD>
<TD style="border-style:solid; border-width:1px; border-color:#A61515;"><A <?php echo $s; ?> href='det.php?cid=<?echo $r['cid'];?>'><? echo $r2['an']."<br/>".$r['cageref'];?></A></TD>

</TR>

<?
$i=$i+1;
}
?>

</TABLE>
</DIV>

</Body>
</HTML>
