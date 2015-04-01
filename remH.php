<body bgcolor="#FFFFFF">

<?php

session_start();

if (isset($_SESSION['o'])==1)
{
include 'dcon.php';

$sql="select * from doer where rId='".$_GET['rId']."'";
//echo $sql;
$q=mysql_query($sql);
$rRem=mysql_fetch_array($q);

$sql="select * from claimant where cid='".$rRem['cid']."'";
$q=mysql_query($sql);
$rC=mysql_fetch_array($q);

$sql="select * from solicitor where sid='".$rC['csol']."'";
$q=mysql_query($sql);
$rS=mysql_fetch_array($q);

$sql="select * from agency where aid='".$rC['cage']."'";
$q=mysql_query($sql);
$rA=mysql_fetch_array($q);


$rUbc='';

if ($rRem['rU']=='0')
{
	$rUbc='#39F';
}
else if ($rRem['rU']=='1')
{
	$rUbc='inherit';
}
else if ($rRem['rU']=='2')
{
	$rUbc='#f00';
}

?>

<table width="360" height="300" style="border-width:2px; border-color:<?php echo $rUbc;?>; border-style:solid;">
<tr>
<th colspan="4" height="25">
MLR<?php echo $rRem['cid']; ?>
</th>
</tr>
<tr>
</tr>
<tr>
<td height="20">
Name
</td>
<td height="20">
<a href="detNewer.php?cid=<?php echo $rC['cid']; ?>" target="_parent"><?php echo $rC['cfn'].' '.$rC['cln'];?></a>
</td>
<td height="20">
Date Added
</td>
<td height="20">
<?php echo date('d-m-Y', strtotime($rRem['rA'])); ?>
</td>
</tr>
<tr>
<td height="20">
Solicitor
</td>
<td height="20">
<?php echo $rS['sn'];?>
</td>
<td height="20">
Agency
</td>
<td height="20">
<?php echo $rA['an'];?>
</td>
</tr>
<tr>
<td colspan="4" style="vertical-align:top;">
<?php echo $rRem['rT']; ?>
</td>
</tr>
<tr>
<td colspan="4" align="center">
<input type="button" value="Remove" onClick="rRemove('<?php echo $rRem['rId'];?>');" />
</td>
</tr>
</table>


<script type="text/javascript" language="javascript" src="reminderRem.js"></script>

<?php
}
?>
</body>