<?php

session_start();

if (isset($_SESSION['id']))
{
?>
<body bgcolor="#e5e5e5">

<div align="center">

<?php
include 'dcon.php';
$s="delete from agency where aid='".$_GET['sid']."'";
if (mysql_query($s))
{
	echo 'Agency Deleted';
}
else
{
	echo "Server Error Occured, Agency Not Deleted";
}

?>

</div>

</body>
<?php
}
?>