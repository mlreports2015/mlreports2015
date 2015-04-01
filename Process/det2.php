<?
session_start();

include "../inc.php";
if (isset($_SESSION['id']))
{
	include "../dcon.php";

/*$s1="select * from case";
$id=mysql_numrows($s1);*/



$t=$_POST['tt'];
$fn=trim($_POST['cf']);
$ln=trim($_POST['cl']);
$dob=date('Y-m-d', strtotime($_POST['dob']));
$doa=date('Y-m-d', strtotime($_POST['doa']));
$doe=date('Y-m-d', strtotime($_POST['doe']));
$g=$_POST['gen'];

//echo "$dob,$doa,$doe";
$cc1=$_POST['cc1'];
$cc2=$_POST['cc2'];
$ca1=$_POST['ca1'];
$ca2=$_POST['ca2'];
$cp=$_POST['cp'];
$ce=$_POST['ce'];
$car=$_POST['aref'];
$csr=$_POST['sref'];

$o=$_SESSION['o'];

$cr=$_POST['c'];

$gg1='';
if ($g=='m')
{
	$gg1="his";
}
else
	$gg1="her";

$clid='';

if ($cr==1)
{
	$clid=clid();
	$cn=$_POST['cn1'];
	$ca=$_POST['ca'];
	$cpx = $_POST['cpc'];
	$cc = $_POST['cc'];
	
	$s3="insert into cclist set cid='', cn='$cn', ca='$ca', cp='$cpx', cc='$cc'";
echo "Inserted New Clinic<br />";
//echo $s;
	$q3=mysql_query($s3);
}
else
{
	$clid=$_POST['cn2'];
}

$id=$_POST['cid'];

/*$cr2=$_POST['soi'];

$s41="delete from soi where cid=$id";
mysql_query($s41);

if ($cr2==0)
{
	$s4="insert into soi set cid=$id, chk='None',org='$o'";
	mysql_query($s4);
}
else
{
	if ($_POST['nm']==1)
	{
		$s4="insert into soi set cid=$id, chk='Check Name',org='$o'";
		mysql_query($s4);
	}
	if ($_POST['b']==1)
	{
		$s4="insert into soi set cid=$id, chk='Check DoB',org='$o'";
		mysql_query($s4);
	}
	if ($_POST['a']==1)
	{
		$s4="insert into soi set cid=$id, chk='Check Date of Accident',org='$o'";
		mysql_query($s4);
	}
	if ($_POST['wmr']==1)
	{
		$s4="insert into soi set cid=$id, chk='Wait for Medical Records',org='$o'";
		mysql_query($s4);
	}
	if ($_POST['sraa']==1)
	{
		$s4="insert into soi set cid=$id, chk='Submit Report w/o Medical Records and an Addendum afterwards',org='$o'";
		mysql_query($s4);
	}
	if ($_POST['srw']==1)
	{
		$s4="insert into soi set cid=$id, chk='Submit Report w/o Medical Records',org='$o'";
		mysql_query($s4);
	}
	if ($_POST['cot']==1)
	{
		$s4="insert into soi set cid=$id, chk='Comment on any Treatment',org='$o'";
		mysql_query($s4);
	}
	if ($_POST['com']==1)
	{
		$s4="insert into soi set cid=$id, chk='Comment on any Medication',org='$o'";
		mysql_query($s4);
	}
	if ($_POST['copa']==1)
	{
		$s4="insert into soi set cid=$id, chk='Comment on Effects of Past Accident(s)',org='$o'";
		mysql_query($s4);
	}
	if (isset($_POST['othr']))
	{
		$s4="insert into soi set cid=$id, chk='".$_POST['othr']."',org='$o'";
		mysql_query($s4);
	}

}*/

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
echo "New Solicitor Added <br />";
//echo $s;
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
	$aa=$_POST['aa'];
	$ap=$_POST['ap'];
	$ae=$_POST['ae'];
	$ac=$_POST['ac'];
	$af=$_POST['af'];
	$s="insert into agency set aid='',an='$an', aa='$aa', ap='$ap', ae='$ae', ac='$ac', af='$af'";
echo "New Agency Added <br />";
//echo $s;
	mysql_query($s);
}
else
{
	$ai=$_POST['sag'];
}


$sss="delete from accomp where cid=$id";
mysql_query($sss);

$sss='';
if ($_POST['acm']==0)
{

	$sss="insert into accomp set cid=$id,org='$o', accomp='$t $ln came alone.'";
}
else
{
	if (strlen(trim($_POST['afnm']))==0 && strlen(trim($_POST['alnm']))==0)
		$sss="insert into accomp set cid=$id,org='$o', accomp='$t $ln came with $gg1 ".$_POST['stts'].".', aby='".$_POST['stts']."', afn='', aln=''";
	else if ((strlen(trim($_POST['afnm']))>0 && strlen(trim($_POST['alnm']))==0))
		$sss="insert into accomp set cid=$id,org='$o', accomp='$t $ln came with $gg1 ".$_POST['stts'].", ".$_POST['afnm'].".', aby='".$_POST['stts']."', afn='".$_POST['afnm']."', aln=''";
	else if ((strlen(trim($_POST['afnm']))==0 && strlen(trim($_POST['alnm']))>0))
		$sss="insert into accomp set cid=$id,org='$o', accomp='$t $ln came with $gg1 ".$_POST['stts'].", ".$_POST['afnm'].".', aby='".$_POST['stts']."', aln='".$_POST['alnm']."', afn=''";
	else if ((strlen(trim($_POST['afnm']))>0 && strlen(trim($_POST['alnm']))>0))
		$sss="insert into accomp set cid=$id,org='$o', accomp='$t $ln came with $gg1 ".$_POST['stts'].", ".$_POST['afnm']." ".$_POST['alnm'].".', aby='".$_POST['stts']."', afn='".$_POST['afnm']."', aln='".$_POST['alnm']."'";
}
//echo $sss;
mysql_query($sss);



$s41="delete from ident where cid=$id and org='$o'";
mysql_query($s41);

$cr3=$_POST['iid'];

if ($cr3==0)
{
	$s4="delete from ident where cid=$id and org='$o'";
//echo $s4;
	mysql_query($s4);
}
else
{
	if ($_POST['pasi']==1)
	{
		$s4="insert into ident set cid=$id, chk='	• Passport was checked.',org='$o'";
//echo $s4;
		mysql_query($s4);
	}
	if ($_POST['lici']==1)
	{
		$s4="insert into ident set cid=$id, chk='	• License was checked.',org='$o'";
		mysql_query($s4);
	}
	if ($_POST['bani']==1)
	{
		$s4="insert into ident set cid=$id, chk='	•Bank card was checked.',org='$o'";
		mysql_query($s4);
	}
	if ($_POST['utii']==1)
	{
		$s4="insert into ident set cid=$id, chk='	•Utility bill was checked.',org='$o'";
		mysql_query($s4);
	}
	if ($_POST['biri']==1)
	{
		$s4="insert into ident set cid=$id, chk='	• Birth certificate was checked.',org='$o'";
		mysql_query($s4);
	}
	if (strcmp($_POST['othri'],'none')!=false)
	{
		$s4="insert into ident set cid=$id, chk='	•".$_POST['othri']." was checked.',org='$o'";
		mysql_query($s4);
	}

}

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
echo "New Solicitor Added <br />";
//echo $s;
	mysql_query($s);
}
else
{
	$si=$_POST['sso'];
}

mysql_query("delete from mreps where id=$id and org='$o'");
$s4='';
// echo $_POST['mnote'];
if (strcmp($_POST['mnote'],'1')==0)
{
	$s4="insert into mreps set id=$id, msg='The claimant\'s medical records were used in compiling this report.',org='$o'";
}
else
	$s4="insert into mreps set id=$id, msg='The claimant\'s medical records were not used in compiling this report.',org='$o'";
// echo $s4;
mysql_query($s4);

$scl="update claimant set ct='$t',cfn='".trim($fn)."',cln='".trim($ln)."',cdb='$dob',cda='$doa',cde='$doe', cc1='$cc1',cc2='$cc2',ca1='$ca1',ca2='$ca2',cp='$cp',ce='$ce',cage='$ai',csol='$si',cageref='$car',csolref='$csr',clid='$clid', gen='$g' where cid=$id and org='$o'";
//echo $scl;
mysql_query($scl);

rdrctr("Details Updated","../pmh.php?cid=$id");
}

?>