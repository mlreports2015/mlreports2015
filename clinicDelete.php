<?php

session_start();

if (isset($_SESSION['id']))
{
?>
<body bgcolor="#e5e5e5">

<div align="center">

<?php
include 'dcon.php';
$s="delete from cclist where cid='".$_GET['sid']."'";
//echo $s;

if (mysql_query($s))
{
	echo 'Clinic Deleted';
}
else
{
	echo "Server Error Occured, Clinic Not Deleted";
}

?>

</div>

</body>
<?php
}
?>