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

mysql_query("delete from eff where cid=$id and org='$o'");

for($i=1;$i<=$if;$i++)
{
// echo 'l='.$_POST['pphhi'][$i];
	$st=$_POST['ih'][$i];
	$prob=$_POST['ip'][$i];
	$msg=addslashes($_POST['i'][$i]);
	$lvl=$_POST['iplv'][$i];

if (strcmp($_POST['pphhi'][$i],'Block')==0)
{
	
	$local = 0;
	$nwbdy = str_replace("pain","",$prob);
	$nwbdy = str_replace("fracture","",$prob);
	
	$sqlbdy = "SELECT description, loc_id FROM anatomy_pain WHERE description LIKE '%".trim(strtolower($nwbdy))."%'";
	//echo $sqlbdy;
	$sqlbdyRes = mysql_query($sqlbdy);
	
	
	if(mysql_num_rows($sqlbdyRes)>=1){
		
		$sqlbdyPrint = mysql_fetch_array($sqlbdyRes);
		$local = $sqlbdyPrint['loc_id'];
		
	}
	
	if($local!=0 || $local!=''){
	 $s="insert into eff set cid=$id, stat='$st',prob='$prob', bdy_ord = '$local', tp='l',msg='$msg', lvl='$lvl',org='$o'";	
	}else{
	$s="insert into eff set cid=$id, stat='$st',prob='$prob', tp='l',msg='$msg', lvl='$lvl',org='$o'";
	}
	echo "<br>".$s." ".$local;
	mysql_query($s);
}
else
	echo "<br>$i qwerty".$_POST['pphhi'][1];
}
if ($if==0)
{
//	$s="insert into eff set id=$id, stat='$st',prob='-', tp='l',msg='Does not report any initial symptoms.',org='$o'";
//	mysql_query($s);
	echo "does not report any initial symptoms";
}

for($i=1;$i<=$lf;$i++)
{
	$st=$_POST['lh'][$i];
	$msg=$_POST['l'][$i];
	$prob=$_POST['lp'][$i];
	$lvl=$_POST['plv'];
// echo 'i='.$_POST['pphhi'][$i];
if (strcmp($_POST['pphhl'][$i],'Block')==0)
{
	$s="insert into eff set cid=$id, stat='$st',prob='$prob', tp='i',msg='$msg',lvl='$lvl',org='$o'";
	echo "<br>$s";
	mysql_query($s);
}
else
	echo "<br>asdf $i ".$_POST['pphhl'][$i];
}
if ($lf==0)
{
// 	$s="insert into eff set id=$id, stat='$st',prob='-', tp='i',msg='Does not report any later symptoms.',org='$o'";
// 	mysql_query($s);
echo "no later symptoms";
}

rdrctr("Symptoms Updated","../treat.php?cid=$id");
}

?>