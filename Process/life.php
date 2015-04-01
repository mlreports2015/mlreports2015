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

$g=$_POST['gend'];

echo $_POST['gend'];
echo $g;

include "../dcon.php";

$o=$_SESSION['o'];

if($_GET['typo']=='emp'){

if($_POST['inves']!==''){
 mysql_query("delete from inves where id=$id and org='$o'");
 mysql_query("insert into inves set id=$id, msg='".$_POST['inves']."',org='$o'");
}


if($_POST['vEmp']!=''){
	
mysql_query("delete from emp where id=$id and org='$o'");

$i=0;
//exit();
for ($i=1;$i<=$_POST['vEmp']; $i++)
{
	
	
	$e1=$_POST['tEmp0'][$i];
	$e2=$_POST['tEmp1'][$i];
	$e3=$_POST['tEmp2'][$i];
	$e4=$_POST['tEmp3'][$i];

   
	mysql_query("update claimant set emp='".trim($_POST['work'])."' where cid='$id'");

    if($e1!=''){
	mysql_query("insert into emp set id=$id, msg1='".$e1."',org='$o',num='".$i."1',ind='$i'");
	mysql_query("insert into emp set id=$id, msg1='".$e2."',org='$o',num='".$i."2',ind='$i'");
	mysql_query("insert into emp set id=$id, msg1='".$e3."',org='$o',num='".$i."3',ind='$i'");
	mysql_query("insert into emp set id=$id, msg1='".$e4."',org='$o',num='".$i."4',ind='$i'");
	}
	
	$jb="";

}
// $i=$i+1;

	if(strcmp($_POST['wjob'],".")==0)
	{
		$jb=$_POST['wjob1'];
	}
	else
	{
		$jb=$_POST['wjob'];
		
	}
	
	$sqlwjob = "SELECT occupation FROM occupations WHERE occupation ='".$_POST['work']."'";
	$sqlwjobRes = mysql_fetch_array(mysql_query($sqlwjob));
	if(mysql_num_rows(mysql_query($sqlwjob))==''){
		
		$sqlnewjob="INSERT INTO occupations SET occupation ='".$_POST['work']."', org='thornton'";
		mysql_query($sqlnewjob);
		
	}
	
// 	$sx="update claimant set emp='$jb' where cid='$id' and org='$o'";
// 	echo $sx;
// 	mysql_query($sx);
// }
}

}



if($_POST['daily']!==''){
mysql_query("delete from hcirc where id=$id and org='$o'");
mysql_query("insert into hcirc set id=$id, msg='".$_POST['daily']."',org='$o'");
}


if($_GET['typo']=='travel'){
	
mysql_query("delete from travel where id=$id and org='$o'");

if ($_POST['vDrv']>0)
{
	$i=1;
	$j=0;
echo $_POST['hDrv'.$i];
	foreach ($_POST['tDrv'] as $tDrv)
	{
// $sx="insert into travel set id=$id, msg='".$tDrv."',org='$o'";
// echo $sx;
		if (strcmp($_POST['hDrv'.$i],'Block')==0)
		{
			$ss="insert into travel set id=$id, msg='".$tDrv."',org='$o'";
			mysql_query($ss);
			echo $ss;
			$j=1;
		}
		$i++;
	}

	if ($j==0)
	{
		$ss="insert into travel set id=$id, msg='".$g." did not face any problems while driving.',org='$o'";
		mysql_query($ss);
	}
}


if ($_POST['vPas']>0)
{
	$i=1;
	$j=0;
// echo $_POST['hPas'.$i];
	foreach ($_POST['tPas'] as $tPas)
	{
// $sx="insert into travel set id=$id, msg='".$tDrv."',org='$o'";
// echo $sx;
		if (strcmp($_POST['hPas'.$i],'Block')==0)
		{
			$ss="insert into travel set id=$id, msg='".$tPas."',org='$o'";
			mysql_query($ss);
			echo $ss;
			$j=1;
		}
		$i++;
	}
	if ($j==0)
	{
		$ss="insert into travel set id=$id, msg='".$g." did not have any problems while travelling as a passenger.',org='$o'";
		mysql_query($ss);
	}
}
// mysql_query("insert into travel set id=$id, msg='".$_POST['tpass']."',org='$o'");

}



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