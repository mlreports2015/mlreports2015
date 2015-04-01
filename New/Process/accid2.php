<?
session_start();

include "../inc.php";


if (!isset($_SESSION['id']))
{
	rdrctr("Login Details Incorrect","index.html");
}
else
{
include "../dcon.php";

$id=$_POST['id'];

$o=$_SESSION['o'];

$s2="delete from accid where id=$id and org='$o'";
$q2=mysql_query($s2);

$x="insert into accid set accid='".$_POST['accident']."',id=$id, org='$o'";
// echo $x;
mysql_query($x);

rdrctr("Added Accident Details", "../effect.php?cid=$id");

}
?>