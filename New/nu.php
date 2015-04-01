<?php

include "dcon.php";
include "templates/template.php";
include "inc.php";
include "emailer.php";

proc();

$o=$_POST['o'];
$n=$_POST['n'];
$p=$_POST['p'];
$a=$_POST['a'];
$e=$_POST['e'];
$f=$_POST['f'];
$l=$_POST['l'];
$t=$_POST['t'];
$sig=basename($_FILES['s']['name']);

// echo $sig;

$s="select * from login where org='$o' and name='$n'";
// echo $s;
$q=mysql_query($s);

$rn=mysql_numrows($q);

if ($rn>0)
{
	rdrctr("Login Name Already Exists!","nu.html");
}
else
{
	$ext=split("[/\\.]", $_FILES['s']['name']);
	$n2 = count($ext)-1;
	$ext = $ext[$n2];

	$fn="$n.$ext";

	$oo=str_replace(' ','',$o);

// echo $oo;

	$t="uSig/$o/$fn";

	if(move_uploaded_file($_FILES['s']['tmp_name'], $t))
	{
		$s="insert into login set name='$n', org='$o', pwd='$p', stat='b'";
		mysql_query($s);
		
		$s="insert into about set org='$o', name='$n', about='$a', title='$t', fname='$f', lname='$l'";
echo $s;
		mysql_query($s);

		$s="insert into sig set org='$o', name='$n', sig='$fn'";
		mysql_query($s);

			$rand1=rand(1,10000);
			$rand2=rand(1,1000)*$rand1;

			$rand1=dechex($rand2);
// 			echo "<br>".dechex(octdec($rand2));

			$to1 = $t.' '.$f.' '.$l;
			$subject1 = "Membership Confirmation";
			$body1 = "Hi $t $l,<br>Your confirmation code is:<br><center>$rand1.</center><br><br>Please follow the link to enter the confirmation code:<br><center><a href='conf1.php?o=$o&n=$n'>Enter Code</a><br><br><b>Once the Code has been successfully entered, a join request would be sent to the Organization Creator who would then have to approve your join request.</b>";
			if (sendmail("ML Reports Confirmation", "no-reply@mlreports.com", $to1, $e, $subject1, "", $body1, ""))
			{
				rdrctr('Confirmation Email Sent To You. Please Follow the Link In the Email!', "conf.php?o=$o&n=$n");
			}
			else
			{
				rdrctr('Confirmation Email Could Not be Sent, Try Again!', "nu.html");
			}
	}
}
// ?>