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

$i=$_POST['itf'];

$o=$_SESSION['o'];



if($_GET['treat']=='initial'){

$delo = "delete from treat where cid=$id and org='$o'";
//echo $delo;
mysql_query($delo);

   if($i!=''){

	$s="insert into treat set cid=$id, msg='$i', stat='i',org='$o'";
	echo $s;
	mysql_query($s);
   }


}else if($_GET['treat']=='later'){

$x=0;
for ($i=1; $i<=$_POST['tv'];$i++)
{
	if (strcmp($_POST['t'][$i],"Block")==0)
	{
		$x=1;
		$l=$_POST['l'][$i];
		$s2="insert into treat set cid=$id,msg='$l',stat='l',org='$o'";
		echo $s2;
		mysql_query($s2);
	}
}
if ($x==0)
{
	$s2="insert into treat set cid=$id,msg='Did not receive any later medical treatment.',stat='l',org='$o'";
echo $s2;
	mysql_query($s2);
}
else if ($_POST['tv']==0)
{
	$s2="insert into treat set cid=$id,msg='Did not receive any later medical treatment.',stat='l',org='$o'";
echo $s2;
	mysql_query($s2);
}

}else{


for ($i=1; $i<=$_POST['reffff'];$i++)
{
	if (strcmp($_POST['tr'][$i],"Block")==0)
	{
		$r=$_POST['ref'][$i];
		$s3="insert into treat set cid=$id,msg='$r',stat='r',org='$o'";
		echo "<br><br>$s3";
		mysql_query($s3);
	}
}


if (isset($_POST['ltro']))
{
	$w=$_POST['ltro'];
	$x=file_get_contents('../treat.php');

	$x=str_replace("staying active</OPTION>","staying active</OPTION><Option value='$w'>$w</Option>",$x);

$fh=fopen("../treat.php",'w');
fwrite ($fh,$x);

}

}

//exit();
  if($_GET['treat']=='initial'){
   rdrctr('Intial Treatment Details Added',"../treat2.php?cid=$id");
  }else{
   rdrctr('Treatment Details Added',"../life.php?cid=$id"); 
  }

}
?>