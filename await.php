<?php

include 'template.php';

head('Incomplete','','','','', '');
?>

<DIV style="width:100%;float:right;">

<?php

include "dcon.php";

$s="select * from claimant where org='".$_SESSION['o']."' and cde='1200-01-01'";
$q=mysql_query($s);
$n=mysql_num_rows($q);

$num=$n/50;

$c=$_GET['l']*50;

echo "<div align='center' style='font-family:Arial, Helvetica, sans-serif;'>";

for ($i=0; $i<=$num; $i++)
{
	echo "<a class='lr' href='homeC.php?l=$i' title='Last ".($i*50). ' to '.(($i*50)+50)."'>".($i+1)." </a>";
}

if ($c!=0)
	echo "<div align='center'>On this Page, Displaying Last ".$c." to ".($c+50)." Incomplete Cases</div>";
else
	echo '<br>On this Page, Displaying Last 50 Incomplete Cases<br>';
echo '</div>';
?>

<TABLE width="96%" align="center" border="1" rules="all" cellpadding="5px" style="font-family:Arial, Helvetica, sans-serif;">

<TR>
<TD style="border-style:solid; border-width:1px; border-color:#000;">ID</font></Th>
<Th style="border-style:solid; border-width:1px; border-color:#000;">First Name</font></Th>
<Th style="border-style:solid; border-width:1px; border-color:#000;">Last Name</font></Th>
<Th style="border-style:solid; border-width:1px; border-color:#000;">DOA</font></Th>
<Th style="border-style:solid; border-width:1px; border-color:#000;">DOE</font></Th>
<Th style="border-style:solid; border-width:1px; border-color:#000;">Address</font></Th>
<Th style="border-style:solid; border-width:1px; border-color:#000;">Post Code</font></Th>
<Th style="border-style:solid; border-width:1px; border-color:#000;">Contact</font></Th>
<Th style="border-style:solid; border-width:1px; border-color:#000;">Solicitor Reference</font></Th>
<Th style="border-style:solid; border-width:1px; border-color:#000;">Agency Reference</font></Th>

</TR>
<?
$i=0;

$s="select * from claimant where org='".$_SESSION['o']."' and cde='1200-01-01' ORDER BY cid DESC limit $c, 50";
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
<TD style="border-style:solid; border-width:1px; border-color:#A61515;"><A <?php echo $s; ?> href='det.php?cid=<?echo $r['cid'];?>'><?echo $r['cid'];?></A></TD>
<TD style="border-style:solid; border-width:1px; border-color:#A61515;"><A <?php echo $s; ?> href='det.php?cid=<?echo $r['cid'];?>'><?php chkr($r['cfn']); echo " "; chkr($r['cln'])?></A></TD>
<TD style="border-style:solid; border-width:1px; border-color:#A61515;"><A <?php echo $s; ?> href='det.php?cid=<?echo $r['cid'];?>'><?php chkr($r['cln']);?></A></TD>
<TD style="border-style:solid; border-width:1px; border-color:#A61515;"><A <?php echo $s; ?> href='det.php?cid=<?echo $r['cid'];?>'><? if (strcmp(date('d-m-Y',strtotime($r['cda'])),'01-01-1200')!=0) {  echo date('d-m-Y',strtotime($r['cda']));} else { echo '&nbsp;'; } ?></A></TD>
<TD style="border-style:solid; border-width:1px; border-color:#A61515;"><A <?php echo $s; ?> href='det.php?cid=<?echo $r['cid'];?>'><? if (strcmp(date('d-m-Y',strtotime(trim($r['cde']))),'01-01-1200')!=0) {  echo date('d-m-Y',strtotime($r['cde']));} else { echo '&nbsp;'; } ?></A></TD>
<TD style="border-style:solid; border-width:1px; border-color:#A61515;"><A <?php echo $s; ?> href='det.php?cid=<?echo $r['cid'];?>'><?echo $r['ca1']."<br>".$r['ca2'];?></A></TD>
<TD style="border-style:solid; border-width:1px; border-color:#A61515;"><A <?php echo $s; ?> href='det.php?cid=<?echo $r['cid'];?>'><?php chkr($r['cp']);?></A></TD>
<TD style="border-style:solid; border-width:1px; border-color:#A61515;"><A <?php echo $s; ?> href='det.php?cid=<?echo $r['cid'];?>'><?echo $r['cc1']."<br>".$r['cc2'];?></A></TD>
<TD style="border-style:solid; border-width:1px; border-color:#A61515;"><A <?php echo $s; ?> href='det.php?cid=<?echo $r['cid'];?>'><?php chkr($r1['sn']);?><br/><?php chkr($r['csolref']);?></A></TD>
<TD style="border-style:solid; border-width:1px; border-color:#A61515;"><A <?php echo $s; ?> href='det.php?cid=<?echo $r['cid'];?>'><?php chkr($r2['an']);?><br/><?php chkr($r['cageref']);?></A></TD>

</TD>
</TR>

<?
$i=$i+1;
}
?>

</TABLE>
</DIV>

<br />
<br />

<?php
echo "<div align='center'>";

for ($i=0; $i<=$num; $i++)
{
	echo "<a class='lr' href='homeC.php?l=$i' title='Last ".($i*50). ' to '.(($i*50)+50)."'>".($i+1)." </a>";
}

echo '</div>';
?>

</Body>
</HTML>

<?

function chkr($p)
{
	if (strlen(trim($p))>0)
	{
		echo $p;
	}
	else
	{
		echo '&nbsp;';
	}
}

?>