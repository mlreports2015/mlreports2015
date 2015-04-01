<?php

include "dcon.php";

$id=$_GET['cid'];

$s="select * from claimant where cid='$id' and stat='c'";
// echo $s;
$q=mysql_query($s);
$r=mysql_num_rows($q);

if ($r>0)
{
?>

<form action="icomp.php" method="POST">
	<input type="hidden" name="id" value="<?php echo $id;?>" />
	<input type="submit" value="Mark Incomplete" />
</form>

<?php
}
else
{
?>
<form action="comp.php" method="POST">
	<input type="hidden" name="id" value="<?php echo $id;?>" />
	<input type="submit" value="Mark Complete" />
</form>
<?php
}
?>