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

/*examination 1*/

$o=$_SESSION['o'];

$id=$_POST['id'];

$claimMsreType=$_POST['msredType'];

if($claimMsreType=='non-metric'){

$cHeight = $_POST['ft'].'.'.$_POST['inch'];
$cWeight = $_POST['stne'].'.'.$_POST['pnds'];

}else if($claimMsreType=='metric'){

$cHeight = $_POST['cms'];
$cWeight = $_POST['kgs'];

}



$g="select * from claimant where cid=$id and org='$o'";

mysql_query("delete from domh where id=$id and org='$o'");
mysql_query("insert into domh set id=$id, msg='".$_POST['dh']."',org='$o'");

mysql_query("delete from genap where id=$id and org='$o'");
mysql_query("insert into genap set id=$id, msg1='".$_POST['ga1']."', msg2='".$_POST['ga2']."',org='$o'");

mysql_query("delete from menh where id=$id and org='$o'");
mysql_query("insert into menh set id=$id, msg1='".$_POST['mh1']."', msg2='".$_POST['mh2']."',org='$o'");

$claimUp = "update claimant set msreType='$claimMsreType', weight='$cWeight' , height='$cHeight' where cid='$id' and org='$o'";

mysql_query("update claimant set msreType='$claimMsreType', weight='$cWeight' , height='$cHeight' where cid='$id' and org='$o'");


mysql_query("delete from iwse where id=$id and org='$o'");
if (strcmp($_POST['iws'],'o')!=0)
{
	mysql_query("insert into iwse set id=$id, msg='".$_POST['iws']."',org='$o'");
}
else
{
	mysql_query("insert into iwse set id=$id, msg='".$_POST['other']."',org='$o'");
}

mysql_query("delete from neck where id=$id and org='$o'");
if ($_POST['cn']>0)
{
	$i=1;
	foreach($_POST['n'] as $msg)
	{
		if (strcmp($_POST['nt'][$i],"Block")==0)
			mysql_query("insert into neck set id=$id, msg='".$msg."',org='$o'");
			
		$i=$i+1;
	}
}
else
	mysql_query("insert into neck set id=$id, msg='The examination was normal.',org='$o'");

mysql_query("delete from upper where id=$id and org='$o'");
if ($_POST['cu']>0)
{
	$i=1;
	foreach($_POST['u'] as $msg1)
	{
		if (strcmp($_POST['ut'][$i],"Block")==0)
			mysql_query("insert into upper set id=$id, msg='".$msg1."',org='$o'");
			
			$i=$i+1;
	}
}
else
	mysql_query("insert into upper set id=$id, msg='The examination was normal.',org='$o'");

mysql_query("delete from back where id=$id and org='$o'");
if ($_POST['cb']>0)
{
	$i=1;
	foreach($_POST['b'] as $msg2)
	{
//		echo $_POST['bt'];
		if (strcmp($_POST['bt'][$i],"Block")==0)
			mysql_query("insert into back set id=$id, msg='".$msg2."',org='$o'");
		$i=$i+1;
	}
}
else
	mysql_query("insert into back set id=$id, msg='The examination was normal.',org='$o'");
	
	
mysql_query("delete from thorax where id=$id and org='$o'");
if ($_POST['ct']>0)
{
	$i=1;
	foreach($_POST['t'] as $msg2)
	{
//		echo $_POST['bt'];
		if (strcmp($_POST['tt'][$i],"Block")==0)
			mysql_query("insert into thorax set id=$id, msg='".$msg2."',org='$o'");
		$i=$i+1;
	}
}
else
	mysql_query("insert into thorax set id=$id, msg='The examination was normal.',org='$o'");

mysql_query("delete from lower where id=$id and org='$o'");
if ($_POST['cl']>0)
{
	$i=1;
	foreach($_POST['l'] as $msg3)
	{
		if (strcmp($_POST['lt'][$i],"Block")==0)
			mysql_query("insert into lower set id=$id, msg='".$msg3."',org='$o'");
		$i=$i+1;
	}
}
else
	mysql_query("insert into lower set id=$id, msg='The examination was normal.',org='$o'");
}

rdrctr("Examination Details Added","../summary.php?cid=$id");
?>