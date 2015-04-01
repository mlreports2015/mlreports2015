<?php

session_start();

if (isset($_SESSION['id']))
{
?>
<body bgcolor="#e5e5e5">

<div style="float:left; width:90%; height:270px; overflow:auto;">

<form method="post" action="solicitorUpdateP.php">
<table width="100%" style="font-family:Arial, Helvetica, sans-serif;">
<tr>
<th align="left">Name</th>
<td><input type="text" name="cnm" /></td>
<th align="left">Email</th>
<td><input type="text" name="ceml" /></td>
</tr>
<tr>
<th align="left">City</th>
<td><input type="text" name="ct" /></td>
<th align="left">Post Code</th>
<td><input type="text" name="cpc" /></td>
</tr>
<tr>
<th align="left">Fax</th>
<td><input type="text" name="cfx" /></td>
<th align="left">Contact</th>
<td><input type="text" name="ccont" /></td>

</tr>

<tr>
<td colspan="4" align="center"><input type="submit" value="Search" /></td>
</tr>
</table>
</form>

<?php
/*
include 'dcon.php';

$s="select * from cclist where org='' or org='".$_GET['org']."'";
$q=mysql_query($s);

while ($r=mysql_fetch_array($q))
{
	echo "<tr>";
		echo "<td>".$r['cn']."</td>";
		echo "<td>".$r['ca']."</td>";
		echo "<td>".$r['ct']."</td>";
		echo "<td>".$r['cp']."</td>";
		echo "<td>".$r['cc']."</td>";
		echo "<td>".$r['cf']."</td>";
	echo "</tr>";
}
*/
?>

</div>

</body>
<?php
}
?>