<?
session_start();

include "../inc.php";


if (!isset($_SESSION['id']))
{
	rdrctr("Login Details Incorrect","../index.html");
}
else
{
$id=$_POST['id'];


include "../dcon.php";

$o=$_SESSION['o'];

mysql_query("delete from inves where id=$id and org='$o'");
mysql_query("insert into inves set id=$id, msg='".$_POST['inves']."',org='$o'");

mysql_query("delete from emp where id=$id and org='$o'");
if (isset($_POST['work0']))
{
	$e1=$_POST['work0'];
	$e2=$_POST['work1'];
	$e3=$_POST['work2'];

	mysql_query("insert into emp set id=$id, msg1='$e1',org='$o'");
	mysql_query("insert into emp set id=$id, msg1='$e2',org='$o'");
	mysql_query("insert into emp set id=$id, msg1='$e3',org='$o'");

	$jb="";

	if(strcmp($_POST['wjob'],".")==0)
	{
		$jb=$_POST['wjob1'];
	}
	else
	{
		$jb=$_POST['wjob'];
	}

	$sx="update claimant set emp='$jb' where cid='$id' and org='$o'";
	echo $sx;
	mysql_query($sx);
}

mysql_query("delete from hcirc where id=$id and org='$o'");
mysql_query("insert into hcirc set id=$id, msg='".$_POST['daily']."',org='$o'");

mysql_query("delete from travel where id=$id and org='$o'");
mysql_query("insert into travel set id=$id, msg='".$_POST['tdrv']."',org='$o'");
mysql_query("insert into travel set id=$id, msg='".$_POST['tpass']."',org='$o'");

mysql_query("delete from dlive where id=$id and org='$o'");
if ($_POST['tv']>0)
{
$i=1;
	foreach ($_POST['t'] as $dlv)
	{
		if (strcmp($_POST['te'][$i],"Block")==0)
			mysql_query("insert into dlive set id=$id, msg='$dlv',org='$o'");
		$i++;
	}
}
else
	mysql_query("insert into dlive set id=$id, msg='He did not report any problems in his daily life.',org='$o'");
rdrctr("Details Added","../exam.php?cid=$id");
}
?>