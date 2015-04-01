<?php

session_start();

if (isset($_SESSION['id']))
{
?>
<body bgcolor="#e5e5e5">

<div align="center">

<?php
include 'dcon.php';
$s="select * from agency where aid='".$_GET['sid']."'";
$q=mysql_query($s);

$r=mysql_fetch_array($q);

?>

<table width="85%" align="center">

<tr>
<th align="center" colspan="4"><?php echo $r['an'];?></th>
</tr>

<tr>
<td><img src="images/details/home.png" height="80" /></td><td><?php echo $r['aa']; ?><br><?php echo $r['ct']; ?>
<br><?php echo $r['cp']; ?></td>
<td><img src="images/details/phone.png" height="80" /></td><td><?php echo $r['ac']; ?></td>
</tr>

<tr>
<td><img src="images/details/fax.png" height="80" /></td><td><?php echo $r['af']; ?></td>
<td><img src="images/details/eml.png" height="80" /></td><td><?php echo $r['ae'];?></td>
</tr>

</table>

Added By : <?php echo $r['lnm'].' for '.$r['org'];?>

</div>

</body>
<?php
}
?>