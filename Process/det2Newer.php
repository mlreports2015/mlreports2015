<?
session_start();

include "../inc.php";
if (isset($_SESSION['id']))
{
	include "../dcon.php";

/*$s1="select * from case";
$id=mysql_numrows($s1);*/

	$id=$_POST['id'];

	$t=$_POST['tt'];
	$fn=$_POST['cf'];
	$ln=$_POST['cl'];
	$gen=$_POST['gen'];
	$dob=date('Y-m-d', strtotime($_POST['dob']));
	$doa=date('Y-m-d', strtotime($_POST['doa']));
	$doe=date('Y-m-d', strtotime($_POST['doe']));
	$tm=$_POST['tm'];
	
	$org=$_SESSION['o'];
	$nm=$_SESSION['n'];
	
	$cc1=$_POST['cc1'];
	$cc2=$_POST['cc2'];
	$ca1=$_POST['ca1'];
	$ca2=$_POST['cty'];
	$cp=$_POST['cp'];
	$ce=$_POST['ce'];
	
	$msreType=$_POST['msreEst'];
	
	if($msreType=='metric'){
		
		$weight = $_POST['kilos'];
		
//		echo $_POST['kilos'];
		
		$height = $_POST['cms'];
		
		
	}else if($msreType=='non-metric'){
		
		$height = $_POST['ft'].'.'.$_POST['inches'];
		$weight = $_POST['stne'].'.'.$_POST['pnds'];
		
	}
	
	
	$cAN=$_POST['aN2'];
	$car=$_POST['aRef'];
	$cSN=$_POST['sN2'];
	$csr=$_POST['sRef'];
	$attnd=$_POST['atten'];
	$ll=$_POST['lat'].','.$_POST['long'];
	
	$clid=$_POST['cN2'];
	
	$bookinst = $_POST['bi'];
	
	
//	$cr=$_POST['c'];


$sqlC="update claimant set ct = '$t', cfn = '$fn', cln = '$ln', cdb = '$dob', emp = '', cda = '$doa', cde = '$doe', ca1 = '$ca1', ca2 = '$ca2', cp = '$cp', cc1 = '$cc1', cc2 = '$cc2', ce = '$ce', msreType='$msreType', weight='$weight', height='$height',cage ='$cAN', cageref = '$car', csol ='$cSN', csolref = '$csr', gen = '$gen', clid ='$clid', stat = '',attend = '$attnd', ll='$ll' where org = '$org' and cid='$id'";
echo $sqlC;
mysql_query($sqlC);

$sqlbookverif = "select count(*) from specinst where cid='$id' and org='$org'";

$sqlbookverifRes =mysql_query($sqlbookverif);

$sqlbookverifResNo = mysql_fetch_row($sqlbookverifRes);

if($sqlbookverifResNo[0] >=1){
$sqlbook = "update specinst set cid='$id', org='".$_SESSION['o']."', expert='$nm' , note='$bookinst' where cid='$id' and org='org'";
echo $sqlbook;
	
	
}else{

$sqlbook = "insert into specinst set cid='$id', org='".$_SESSION['o']."', expert='$nm' , note='$bookinst'";
echo $sqlbook;
}


$sqlbooker =mysql_query($sqlbook);
//exit();

$cr2=$_POST['soi'];

		if ($cr2==0)
		{
			$s4="insert into soi set cid='$id', chk='None',org='$org'";
			mysql_query($s4);
		}
		else
		{
			$soiT=$_POST['soiT'];
			$s4="insert into soi set cid=$id, chk='$soiT',org='$org'";
			mysql_query($s4);
		}


$sss="delete from accomp where cid=$id and org='$org'";
mysql_query($sss);

$sss='';
if ($_POST['acm']==0)
{

	$sss="insert into accomp set cid=$id,org='$org', accomp='$t $ln came alone.'";
}
else
{
	$gg1='';
	if ($gen=='m')
	{
		$gg1="his";
	}
	else
	{
		$gg1="her";
	}
	
	if (strlen(trim($_POST['afnm']))==0 && strlen(trim($_POST['alnm']))==0)
		$sss="insert into accomp set cid=$id,org='$org', accomp='$t $ln came with $gg1 ".$_POST['stts'].".', aby='".$_POST['stts']."', afn='', aln=''";
	else if ((strlen(trim($_POST['afnm']))>0 && strlen(trim($_POST['alnm']))==0))
		$sss="insert into accomp set cid=$id,org='$org', accomp='$t $ln came with $gg1 ".$_POST['stts'].", ".$_POST['afnm'].".', aby='".$_POST['stts']."', afn='".$_POST['afnm']."', aln=''";
	else if ((strlen(trim($_POST['afnm']))==0 && strlen(trim($_POST['alnm']))>0))
		$sss="insert into accomp set cid=$id,org='$org', accomp='$t $ln came with $gg1 ".$_POST['stts'].", ".$_POST['afnm'].".', aby='".$_POST['stts']."', aln='".$_POST['alnm']."', afn=''";
	else if ((strlen(trim($_POST['afnm']))>0 && strlen(trim($_POST['alnm']))>0))
		$sss="insert into accomp set cid=$id,org='$org', accomp='$t $ln came with $gg1 ".$_POST['stts'].", ".$_POST['afnm']." ".$_POST['alnm'].".', aby='".$_POST['stts']."', afn='".$_POST['afnm']."', aln='".$_POST['alnm']."'";
}
//echo $sss;
mysql_query($sss);



$s41="delete from ident where cid=$id and org='$org'";
mysql_query($s41);

$cr3=$_POST['iid'];

if ($cr3==0)
{
	$s4="delete from ident where cid=$id and org='$org'";
//echo $s4;
	mysql_query($s4);
}
else
{
	if ($_POST['pasi']==1)
	{
		if($_POST['txtid']!="")
		{
		  $s4="insert into ident set cid=$id, chk='	• Photographic Passport was checked.',org='$org',identNo='".trim($_POST['txtid'])."'";
//echo $s4;
		mysql_query($s4);
		}
	}
	if ($_POST['lici']==1)
	{
		$s4="insert into ident set cid=$id, chk='	• Photographic Driving License was checked.',org='$org', identNo='".trim($_POST['txtid'])."'";
		mysql_query($s4);
	}
	if ($_POST['resPer']==1)
	{
		$s4="insert into ident set cid=$id, chk='	• Photographic Residence Permit was checked.',org='$org'";
		mysql_query($s4);
	}
	if ($_POST['utii']==1)
	{
		$s4="insert into ident set cid=$id, chk='	•Utility bill was checked.',org='$org'";
		mysql_query($s4);
	}
	if ($_POST['biri']==1)
	{
		$s4="insert into ident set cid=$id, chk='	• Birth certificate was checked.',org='$org'";
		mysql_query($s4);
	}
	if (strcmp($_POST['othri'],'none')!=false)
	{
		$s4="insert into ident set cid=$id, chk='	•".$_POST['othri']." was checked.',org='$org'";
		mysql_query($s4);
	}

}

mysql_query("delete from mreps where id=$id and org='$org'");
$s4='';
// echo $_POST['mnote'];
if (strcmp($_POST['mnote'],'1')==0)
{
	$s4="insert into mreps set id=$id, msg='The claimant\'s medical records were used in compiling this report.',org='$org'";
}
else
	$s4="insert into mreps set id=$id, msg='The claimant\'s medical records were not used in compiling this report.',org='$org'";
// echo $s4;
mysql_query($s4);


rdrctr("Details Updated","../pmh.php?cid=$id");
}

?>