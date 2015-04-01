<?php

session_start();

if (isset($_SESSION['id']))
{
?>
<body bgcolor="#e5e5e5">

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

$s="select * from cclist where org='".$_SESSION['o']."' and lnm='".$_SESSION['n']."'";

if (strlen($cn1)>0)
{
	$s=$s." and cn like '%$cn1%'";
}

if (strlen($cpc)>0)
{
	$s=$s." and cp like '%$cpc%'";
}

if (strlen($cct)>0)
{
	$s=$s." and ct like '%$cct%'";
}

if (strlen($cc)>0)
{
	$s=$s." and cc like '%$cc%'";
}

if (strlen($cf)>0)
{
	$s=$s." and fax like '%$cf%'";
}

if (strlen($eml)>0)
{
	$s=$s." and ce like '%$eml%'";
}

//echo $s;

$q=mysql_query($s);

while ($r=mysql_fetch_array($q))
{
?>
<tr>
<td><?php echo $r['cn']; ?></td>
<td><?php echo $r['ca']; ?></td>
<td><?php echo $r['ct']; ?></td>
<td><?php echo $r['cp']; ?></td>
<td><?php echo $r['cc']; ?></td>
<td><?php echo $r['fax']; ?></td>
<td><?php echo $r['ce']; ?></td>
<td align="center">
	<input type="button" value="View" onClick="window.location='clinicView.php?sid=<?php echo $r['cid']; ?>';" />
	<br>
    <input type="button" value="Edit" onClick="window.location='clinicEdit.php?sid=<?php echo $r['cid']; ?>';" />
    <br>
    <input type="button" value="Delete" onClick="window.location='clinicDelete.php?sid=<?php echo $r['cid']; ?>';" />
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