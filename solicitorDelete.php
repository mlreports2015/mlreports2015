<?php

session_start();

if (isset($_SESSION['id']))
{
?>
<body bgcolor="#e5e5e5">

<div align="center">

<?php
include 'dcon.php';
$s="delete from solicitor where sid='".$_GET['sid']."'";
if (mysql_query($s))
{
	echo 'Solicitor Deleted';
}
else
{
	echo "Server Error Occured, Solicitor Not Deleted";
}

?>

</div>

</body>
<?php
}
?>