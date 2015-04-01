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

$if=$_POST['tv'];
echo $if;

$lf=$_POST['tv2'];
echo "<br>$lf";

$o=$_SESSION['o'];

mysql_query("delete from eff where id=$id and org='$o'");

for($i=1;$i<=$if;$i++)
{
// echo 'l='.$_POST['pphhi'][$i];
	$st=$_POST['ih'][$i];
	$prob=$_POST['ip'][$i];
	$msg=$_POST['i'][$i];

if (strcmp($_POST['pphhi'][$i],'Block')==0)
{
	$s="insert into eff set id=$id, stat='$st',prob='$prob', tp='l',msg='$msg',org='$o'";
	echo "<br>$s";
	mysql_query($s);
}
else
	echo "<br>$i qwerty".$_POST['pphhi'][1];
}
if ($if==0)
{
	$s="insert into eff set id=$id, stat='$st',prob='-', tp='l',msg='Does not report any initial symptoms.',org='$o'";
	mysql_query($s);
}

for($i=1;$i<=$lf;$i++)
{
	$st=$_POST['lh'][$i];
	$msg=$_POST['l'][$i];
	$prob=$_POST['lp'][$i];
// echo 'i='.$_POST['pphhi'][$i];
if (strcmp($_POST['pphhl'][$i],'Block')==0)
{
	$s="insert into eff set id=$id, stat='$st',prob='$prob', tp='i',msg='$msg',org='$o'";
	echo "<br>$s";
	mysql_query($s);
}
else
	echo "<br>asdf $i ".$_POST['pphhl'][$i];
}
if ($lf==0)
{
	$s="insert into eff set id=$id, stat='$st',prob='-', tp='i',msg='Does not report any later symptoms.',org='$o'";
	mysql_query($s);
}

rdrctr("Symptoms Updated","../treat.php?cid=$id");
}

?>