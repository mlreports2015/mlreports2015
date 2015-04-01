<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Processing Registration Step 1</title>
</head>

<?php

include "inc.php";
include "dcon.php";
include "mail.php";

$c=true;

$fn='';
$ln='';
$s='';
$un='';
$p1='';
$p2='';

if (isset($_POST['fn']) && isset($_POST['ln']) && isset($_POST['s']) && isset($_POST['un']) && isset($_POST['p1']) && isset($_POST['p2']))
{
	$fn=$_POST['fn'];
	$ln=$_POST['ln'];
	$s=$_POST['s'];
	$un=$_POST['un'];
	$p1=$_POST['p1'];
	$p2=$_POST['p2'];
}
else
{
	$c=false;
	rdrctr('One of the Mandatory Fields is Not Filled In.', 'reg_i.html');
}

if (strcmp($p1, $p2)!==0)
{
	$c=false;
	rdrctr("Passwords Don't Match", 'reg_i.html');
}


$peml='';
$weml='';

if (!isset($_POST['peml']) && !isset($_POST['weml']))
{
	$c=false;
	rdrctr("Please Enter Atleast One Email Address.", 'reg_i.html');
}
else
{
	$peml=$_POST['peml'];
	$weml=$_POST['weml'];
}


$ltel='';
$mtel='';

if (!isset($_POST['ltel']) && !isset($_POST['mtel']))
{
	$c=false;
	rdrctr("Please Enter Atleast One Contact Number.", 'reg_i.html');
}
else
{
	$ltel=$_POST['ltel'];
	$mtel=$_POST['mtel'];
}


if ($c)
{
	$sql="insert into user set fName='$fn', lName='$ln', stat='$s', uName='$un', tel='$ltel', mob='$mtel', peml='$peml', weml='$weml'";
	$q=mysql_query($sql);
	
	$sql="insert into login set org='$un', name='$ln', pwd='$p1'";
	$q=mysql_query($sql);
}


if (strcmp(trim($s),'Expert')==0)
{

	if (strlen($peml)>0)
	{
		expMail("$un", $peml);
	}
	if (strlen($weml)>0)
	{
		expMail("$un", $weml);
	}
	
}
else if (strcmp($s, "Expert's Secretarial Staff")==0)
{
	if (strlen($peml)>0)
	{
		exp_s_Mail();
	}
	if (strlen($weml)>0)
	{
		exp_s_Mail();
	}
	
}
else if (strcmp($s, "Solicitor")==0)
{
	if (strlen($peml)>0)
	{
		solMail();
	}
		if (strlen($weml)>0)
	{
		solMail();
	}
}
else if (strcmp($s, "Solicitor's Secretarial Staff")==0)
{
	if (strlen($peml)>0)
	{
		sol_s_Mail();
	}
	if (strlen($weml)>0)
	{
		sol_s_Mail();
	}	
}
else if (strcmp($s, "Agent")==0)
{
	if (strlen($peml)>0)
	{
		ageMail();
	}
	if (strlen($weml)>0)
	{
		ageMail();
	}
}
else if (strcmp($s, "Agent's Secretarial Staff")==0)
{
	if (strlen($peml)>0)
	{
		age_s_Mail();
	}
	if (strlen($weml)>0)
	{
		age_s_Mail();
	}
}


?>

<body>

<div style="vertical-align:middle; height:100%; width:100%; margin-top:10%;" align="center">
<img src="image/ajax-loader.gif" width="30" height="20" />

<br /><br />

<p align="center" style="margin-top:40px;">
Processing Information. Please Wait...
</p>

<br /><br /><br /><br />

<H2 style="color:#A61515;">Checklist For Next Step.</H2>

<center>
<div align="justify" style="width:1024px;">
<ul>
<li>Please make sure that you have a scanned copy of your signature on your computer.</li>
<li>Please make sure that the signature is in <i style="color:#A61515;">'jpg'</i>, <i style="color:#A61515;">'png'</i> or <i style="color:#A61515;">'bmp'</i> format.</li>
<li>If the signature is in any format other than the ones specified or you are unsure as to which format the signaure is in, contact our friendly support team.</li>
</ul>
</div>
</center>

</div>



<script type="text/javascript" language="javascript">

setTimeout("alert('Please Follow the link in the email. The Registration Process is Almost Complete'); window.location='index.html';", 6000);

</script>



</body>
</html>
