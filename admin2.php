<?
session_start();

include "inc.php";
echo "<body background=\"images/back.png\">";
if (isset($_SESSION['id']))
{
	include "dcon.php";

/*$s1="select * from case";
$id=mysql_numrows($s1);*/

$id=id($_SESSION['o']);

$t=$_POST['tt'];
$fn=$_POST['cf'];
$ln=$_POST['cl'];
$gen=$_POST['gend'];
$dob=date('Y-m-d', strtotime($_POST['dob']));
$doa=date('Y-m-d', strtotime($_POST['doa']));
$doe=date('Y-m-d', strtotime($_POST['doe']));
$org=$_SESSION['o'];

echo "$dob,$doa,$doe";
$cc1=$_POST['cc1'];
$cc2=$_POST['cc2'];
$ca1=$_POST['ca1'];
$ca2=$_POST['ca2'];
$cp=$_POST['cp'];
$ce=$_POST['ce'];
$car=$_POST['aref'];
$csr=$_POST['sref'];

$cr=$_POST['c'];

$clid='';

if ($cr==1)
{
	$clid=clid();
	$cn=$_POST['cn1'];
	$ca=$_POST['ca'];
	$cpx = $_POST['cpc'];
	$cc = $_POST['cc'];
	
	$s3="insert into cclist set cid='', cn='$cn', ca='$ca', cp='$cpx', cc='$cc'";
echo "Inserted New Clinic";
echo $s;
	$q3=mysql_query($s3);
}
else
{
	$clid=$_POST['cn2'];
}

$id=xid($_SESSION['o'])+1;

$cr2=$_POST['soi'];

if ($cr2==0)
{
	$s4="insert into soi set cid=$id, chk='None',org='$org'";
	mysql_query($s4);
}
else
{
	if ($_POST['nm']==1)
	{
		$s4="insert into soi set cid=$id, chk='Check Name',org='$org'";
		mysql_query($s4);
	}
	if ($_POST['b']==1)
	{
		$s4="insert into soi set cid=$id, chk='Check DoB','org='$org'";
		mysql_query($s4);
	}
	if ($_POST['a']==1)
	{
		$s4="insert into soi set cid=$id, chk='Check Date of Accident',org='$org";
		mysql_query($s4);
	}
	if ($_POST['wmr']==1)
	{
		$s4="insert into soi set cid=$id, chk='Wait for Medical Records',org='$org'";
		mysql_query($s4);
	}
	if ($_POST['sraa']==1)
	{
		$s4="insert into soi set cid=$id, chk='Submit Report w/o Medical Records and an Addendum afterwards',org='$org'";
		mysql_query($s4);
	}
	if ($_POST['srw']==1)
	{
		$s4="insert into soi set cid=$id, chk='Submit Report w/o Medical Records',org='$org'";
		mysql_query($s4);
	}
	if ($_POST['cot']==1)
	{
		$s4="insert into soi set cid=$id, chk='Comment on any Treatment',org='$org'";
		mysql_query($s4);
	}
	if ($_POST['com']==1)
	{
		$s4="insert into soi set cid=$id, chk='Comment on any Medication',org='$org'";
		mysql_query($s4);
	}
	if ($_POST['copa']==1)
	{
		$s4="insert into soi set cid=$id, chk='Comment on Effects of Past Accident(s)',org='$org'";
		mysql_query($s4);
	}

}


$s3="insert into booki set cid='$id', bi='".$_POST['bi']."',org='$org'";
mysql_query($s3);

$si="";
if ($_POST['sol']==1)
{
	$si=sid()+1;
	$sn=$_POST['sn'];
	$sa=$_POST['sa'];
	$sp=$_POST['sp'];
	$se=$_POST['se'];
	$sc=$_POST['sc'];
	$sf=$_POST['sf'];
	$s="insert into solicitor set sid='',sn='$sn', sa='$sa', sp='$sp', se='$se', sc='$sc', sf='$sf'";
echo "New Solicitor Added";
echo $s;
	mysql_query($s);
}
else
{
	$si=$_POST['sso'];
}


$ai="";
if ($_POST['age']==1)
{
	$ai=aid()+1;
	$an=$_POST['an'];
	$aa=nl2br($_POST['aa']);
	$ap=$_POST['ap'];
	$ae=$_POST['ae'];
	$ac=$_POST['ac'];
	$af=$_POST['af'];
	$s="insert into agency set aid='',an='$an', aa='$aa', ap='$ap', ae='$ae', ac='$ac', af='$af'";
echo "New Agency Added";
echo $s;
	mysql_query($s);
}
else
{
	$ai=$_POST['sag'];
}

$scl="insert into claimant set cid='$id',org='".$_SESSION['o']."',ct='$t',cfn='$fn',cln='$ln',cdb='$dob',cda='$doa',cde='$doe', cc1='$cc1',cc2='$cc2',ca1='$ca1',ca2='$ca2',cp='$cp',ce='$ce',cage='$ai',csol='$si',cageref='$car',csolref='$csr',clid='$clid',gen='$gen'";
echo $scl;
mysql_query($scl);

rdrctr("Case Added","home.php");
}
else
	rdrctr("Login Details Incorrect","index.html");
?>