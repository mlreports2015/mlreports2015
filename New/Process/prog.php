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

$o=$_SESSION['o'];

$id=$_POST['id'];

mysql_query("delete from prog where id=$id and org='$o'");

if ($_POST['tv']>0)
{
$i=1;
	foreach($_POST['t'] as $x)
	{
		$y=$_POST['h'][$i];
		if (strcmp($y,'Block')==0)
			mysql_query("insert into prog set id=$id,prog='$x',org='$o'");
		$i++;
	}
}

	rdrctr("Added","../repgen.php?cid=$id");
}
?>