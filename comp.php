<?
session_start();

include "inc.php";
echo "<body background=\"images/back.png\">";
if (isset($_SESSION['id']))
{
	include "dcon.php";

$id=$_POST['id'];

$scl="update claimant set stat='c' where cid='$id'";
echo "<center>Setting Complete</center>";
mysql_query($scl);

rdrctr("Added to Completed Cases!","repgen.php?cid=$id");
}
else
	rdrctr("Login Details Incorrect","index.html");
?>