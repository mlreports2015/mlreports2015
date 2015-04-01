<?
session_start();

echo "<body bgcolor='#ffffff'>";

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


if (strcmp($_POST['type'],"Radiology Review")==0)
{
	$s0="insert into mrecs set org='$o', id='$id', title='<b><i>".$_POST['stype']." of ".$_POST['part']." Carried Out On ".$_POST['eon']."</b ></i>'";
}
else
{
	$s0="insert into mrecs set org='$o', id='$id', title='<b><i>".$_POST['type']." From ".$_POST['afr']." To ".$_POST['ati']."</b ></i>', rel='".$_POST['rel']."'";
}

//echo $s0;
$q0=mysql_query($s0);


$s1="select * from mrecs where org='$o' and id='$id' order by mid desc limit 1";
$q1=mysql_query($s1);
$r1=mysql_fetch_array($q1);

echo $s1.'<br>';

$mid=$r1['mid'];

if (strcmp($_POST['type'],"Radiology Review")==0)
{
	$i=0;
	foreach ((array)$_POST['I'] as $xyz)
  	{
		$s2="insert into mreco2 set id='$id', org='$o', mid='$mid', txt='$xyz', ord='$i'";
		echo $s2.'<br>';
		mysql_query($s2);
		$i++;
  	}
}
else
{
	$i=0;
	foreach ((array)$_POST['R'] as $xyz)
  	{
		$x=split(':', $xyz);
		
		$x[0]="<i>".$x[0]."</i>";
		$xyz=$x[0].' : '.$x[1];
		
		$s2="insert into mreco2 set id='$id', org='$o', mid='$mid', txt='$xyz', ord='$i'";
		echo $s2.'<br>';
		mysql_query($s2);
		$i++;
  	}
}


echo "<br><br /><br /><br /><br />";

echo "<center>";

echo "<input type='button' value='Finished' onclick=\" ;\"><br /><br />";

echo "<input type='button' value='Add More' onclick=\"".rdrctr("Added","../reco.php?cid=$id").";\">";

}
echo "</body>";

?>