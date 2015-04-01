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

$x="insert into accid set accid='".addslashes($_POST['accident2'])."',id=$id, org='$o'";
echo $x;
mysql_query($x);

echo mysql_error();

$sb="delete from sBelt where cid='$id' and org='$o'";
mysql_query($sb);

$sBelt=$_POST['sbb'];
$sBE=$_POST['exemp'];

if($_POST['exempF']!='oth'){

$sBEF=$_POST['exempF'];

}else{

if($_POST['exempOth']!=''){
	$sBEF=$_POST['exempOth'];
}else{
    $sBEF=$_POST['exempF'];
}

}



$sb2="insert into sBelt set org='".$_SESSION['o']."', id='".$_SESSION['n']."', cid='$id', sBelt='$sBelt', sBexemp='$sBE', frmExemp='$sBEF'";
mysql_query($sb2);

rdrctr("Added Accident Details", "../effect.php?cid=$id");

}
?>