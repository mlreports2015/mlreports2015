<?php

session_start();

if (isset($_SESSION['id']))
{
?>
<body bgcolor="#e5e5e5">


<div style="overflow:auto; "
<table width="97%" align="center" border="1">

<tr>
<th align="left">
Name
</th>
<th align="left">
Address
</th>
<th align="left">
City
</th>
<th align="left">
Post Code
</th>
<th align="left">
Contact
</th>
<th align="left">
Fax
</th>
<th align="left">
Email
</th>
<th align="left">
</th>
</tr>

<?php

include 'dcon.php';

$cn1=$_POST['cnm'];
$cpc=$_POST['cpc'];
$cct=$_POST['ct'];
$cc=$_POST['ccont'];
$cf=$_POST['cfx'];
$eml=$_POST['ceml'];

$s="select * from agency where org='".$_SESSION['o']."' and lnm='".$_SESSION['n']."'";

if (strlen($cn1)>0)
{
	$s=$s." and an like '%$cn1%'";
}

if (strlen($cpc)>0)
{
	$s=$s." and ap like '%$cpc%'";
}

if (strlen($cct)>0)
{
	$s=$s." and at like '%$cct%'";
}

if (strlen($cc)>0)
{
	$s=$s." and ac like '%$cc%'";
}

if (strlen($cf)>0)
{
	$s=$s." and af like '%$cf%'";
}

if (strlen($eml)>0)
{
	$s=$s." and ae like '%$eml%'";
}

//echo $s;

$q=mysql_query($s);

while ($r=mysql_fetch_array($q))
{
?>
<tr>
<td><?php echo $r['an']; ?></td>
<td><?php echo $r['aa']; ?></td>
<td><?php echo $r['at']; ?></td>
<td><?php echo $r['ap']; ?></td>
<td><?php echo $r['ac']; ?></td>
<td><?php echo $r['af']; ?></td>
<td><?php echo $r['ae']; ?></td>
<td align="center">
	<input type="button" value="View" onClick="window.location='agencyView.php?sid=<?php echo $r['aid']; ?>';" />
	<br>
    <input type="button" value="Edit" onClick="window.location='agencyEdit.php?sid=<?php echo $r['aid']; ?>';" />
    <br>
    <input type="button" value="Delete" onClick="window.location='agencyDelete.php?sid=<?php echo $r['aid']; ?>';" />
</td>
</tr>

<?php
}
?>
</table>

</body>
<?php
}
?>