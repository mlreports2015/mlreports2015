<?php

include 'template.php';

head('Admin','','','','','');


if (!isset($_SESSION['id']))
{
	rdrctr("Login Details Incorrect","index.html");
}
else
{
//////////////////////// - claimant add - ///////////////////////////
	include "dcon.php";
	
	$id=id($_SESSION['o']);
	$id=$id+1;
	
//	echo $id;

	$t=$_POST['tt'];
	$fn=$_POST['cf'];
	$ln=$_POST['cl'];
	$gen=$_POST['gend'];
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
	$cAN=$_POST['aN2'];
	$car=$_POST['aRef'];
	$cSN=$_POST['sN2'];
	$csr=$_POST['sRef'];
	$ll=$_POST['lat'].','.$_POST['long'];
	
	$clid=$_POST['cN2'];
//	$cr=$_POST['c'];


	if ($_SESSION['chkrer']==1)
	{
		$sqlC="insert into claimant set org = '$org', cid='$id', ct = '$t', cfn = '$fn', cln = '$ln', cdb = '$dob', emp = '', cda = '$doa', cde = '$doe', ca1 = '$ca1', ca2 = '$ca2', cp = '$cp', cc1 = '$cc1', cc2 = '$cc2', ce = '$ce', cage ='$cAN', cageref = '$car', csol ='$cSN', csolref = '$csr', gen = '$gen', clid ='$clid', stat = '', doc = '$nm', ll='$ll'";
		mysql_query($sqlC);
	
//	$id=mysql_insert_id();
	
	
//////////////////////// - special instructions - ///////////////////////////
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
	
	
//////////////////////// - booking instructions - ///////////////////////////	

		$s3="insert into booki set cid='$id', bi='".$_POST['bi']."',org='$org'";
		mysql_query($s3);
	}
	
	
	if (strtotime($_POST['doe'])==strtotime('01-01-1200'))
	{	

	}
	else
	{
		$s="select * from app where dt='".date('Y-m-d', strtotime($doe))."' and org='$org' and dr='$nm'";
		$q=mysql_query($s);
		$c=mysql_num_rows($q);
		
		if ($c==0)
		{


		}
		else
		{
			if ($_SESSION['chkrer']==1)
			{
				$s="delete from appoint where dt='$doe' and tm='$tm' and org='".$_SESSION['o']."' and dr='".$_SESSION['n']."'";
				echo $s;
				$q=mysql_query($s);
				
				$s="delete from stat where dt='$doe' and tm='$tm' and org='".$_SESSION['n']."' and dr='".$_SESSION['o']."'";
				echo $s;
				$q=mysql_query($s);
				
				$s="insert into appoint set id='$id', dt='$doe', tm='$tm', dr='".$_SESSION['n']."', org='".$_SESSION['o']."'";
				echo $s;
				$q=mysql_query($s);
				
				$s="insert into stat set id='$id', dt='$doe', tm='$tm', dr='".$_SESSION['n']."', stat='0', org='".$_SESSION['o']."'";
				echo $s;
				$q=mysql_query($s);
				
				red('home.php');
			}
		}
	}

$_SESSION['chkrer']=0;
red('home.php');

}
?>