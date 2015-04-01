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

mysql_query("delete from shist where id=$id and org='$o'");
mysql_query("delete from job where id=$id and org='$o'");

mysql_query( "insert into shist set id=$id,h='".$_POST['hist']."',inj=\"".$_POST['inj']."\",treat='".$_POST['treat']."',hlyf='".$_POST['hlyf']."',org='$o'");

// if (strcmp($_POST['jrest'],'fit to'))
// {
// // 	echo '0';
// // 	$_POST['jabs']='';
// // 	$_POST['mpas']='';
// // 	$_POST['mmpast']='';
// // // 	$_POST['ltef']="In the long term, his employment prospects are likely to be unaffected.";
// }
if (strcmp($_POST['jabs'],'.')!=0)
	mysql_query("insert into job set id=$id, jrest='Currently ".strtolower($_POST['jrest'])."',jabs='".$_POST['jabs']."', mpas='".$_POST['mpas']."', mmpast='".$_POST['mmpast']."',ltef='".$_POST['ltef']."', org='$o'");
else
	mysql_query("insert into job set id=$id, jrest='Currently ".strtolower($_POST['jrest'])."',jabs='.', mpas='".$_POST['mpas']."', mmpast='".$_POST['mmpast']."',ltef='".$_POST['ltef']."', org='$o'");

// echo "insert into job set id=$id, jrest='Currently ".strtolower($_POST['jrest'])."',jabs='".$_POST['jabs']."', mpas='".$_POST['mpas']."', mmpast='".$_POST['mmpast']."',ltef='".$_POST['ltef']."', org='$o'";

rdrctr("Summary Added","../prog.php?cid=$id");
}
?>