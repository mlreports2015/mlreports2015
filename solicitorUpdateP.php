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

$s="select * from solicitor where org='".$_SESSION['o']."' and lnm='".$_SESSION['n']."'";

if (strlen($cn1)>0)
{
	$s=$s." and sn like '%$cn1%'";
}

if (strlen($cpc)>0)
{
	$s=$s." and sp like '%$cpc%'";
}

if (strlen($cct)>0)
{
	$s=$s." and st like '%$cct%'";
}

if (strlen($cc)>0)
{
	$s=$s." and sc like '%$cc%'";
}

if (strlen($cf)>0)
{
	$s=$s." and sf like '%$cf%'";
}

if (strlen($eml)>0)
{
	$s=$s." and se like '%$eml%'";
}

//echo $s;

$q=mysql_query($s);

while ($r=mysql_fetch_array($q))
{
?>
<tr>
<td><?php echo $r['sn']; ?></td>
<td><?php echo $r['sa']; ?></td>
<td><?php echo $r['st']; ?></td>
<td><?php echo $r['sp']; ?></td>
<td><?php echo $r['sc']; ?></td>
<td><?php echo $r['sf']; ?></td>
<td><?php echo $r['se']; ?></td>
<td align="center">
	<input type="button" value="View" onClick="window.location='solicitorView.php?sid=<?php echo $r['sid']; ?>';">
	<br>
    <input type="button" value="Edit" onClick="window.location='solicitorEdit.php?sid=<?php echo $r['sid']; ?>';">
    <br>
    <input type="button" value="Delete" onClick="window.location='solicitorDelete.php?sid=<?php echo $r['sid']; ?>';">
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