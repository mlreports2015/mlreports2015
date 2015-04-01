<?php

function bTop($par, $org, $id)
{


?>

<CENTER><H1><? echo "ML".$id;?></H1></CENTER>

<?php

include "dcon.php";

$s="select * from repGen where cid='$id' and org='".$org."'";
$q=mysql_query($s);
$n=mysql_num_rows($q);

if ($n>0)
{
	$r=mysql_fetch_array($q);
	echo '<center>This Report Has Been Generated <b style="font-size:large; color:#A61515;">'.$r['num'].'</b> Times.</center>';
	echo '<center>First Generated On <b style="font-size:large; color:#A61515;">'.date('d-m-Y', strtotime($r['dt'])).'</b>.</center>';
}
else
{
	echo '<center>This Report Has Been Generated <b style="font-size:large; color:#A61515;">0</b> Times.</center>';
}

?>

<br />
<br />

<CENTER>
<DIV align="center">

<A class="l" href="detNewer.php?cid=<? echo $id; ?>&id=<? echo rand(0,1000); ?>">Details</A> 

<A class="l" href="pmh.php?cid=<? echo $id; ?>&id=<? echo rand(0,1000); ?>">PMH</A> 

<A class="l" href="accid.php?cid=<? echo $id; ?>&id=<? echo rand(0,1000); ?>">Accident</A> 

<A class="l" href="effect.php?cid=<? echo $id; ?>&id=<? echo rand(0,1000); ?>">Symptoms</A> 

<A class="l" href="treat.php?cid=<? echo $id; ?>&id=<? echo rand(0,1000); ?>">Treatment</A> 

<A class="l" href="life.php?cid=<? echo $id; ?>&id=<? echo rand(0,1000); ?>">Life</A> 

<A class="l" href="exam.php?cid=<? echo $id; ?>&id=<? echo rand(0,1000); ?>"> Examination </A> 

<A class="l" href="summary.php?cid=<? echo $id; ?>&id=<? echo rand(0,1000); ?>">Summary</A> 

<A class="l" href="prog.php?cid=<? echo $id; ?>&id=<? echo rand(0,1000); ?>">Prognosis </A> 

<?php

include 'dcon.php';

$s="select * from mreps where id='$id' and org='$org'";
$qmed=mysql_query($s);
$rmed=mysql_fetch_array($qmed);

//echo $rmed['msg'];

if (strcmp($rmed['msg'],"The claimant's medical records were used in compiling this report.")==0)
{
?>

<A class="l" href="mnote.php?cid=<? echo $id; ?>&id=<? echo rand(0,1000); ?>">Medical Records </A> 

<?php
}

?>

<A class="l" href="repgen.php?cid=<? echo $id; ?>&id=<? echo rand(0,1000); ?>">Report</A>

<Div style="width:100%"></DIV>
</A>
</CENTER>

<br>


<CENTER><H1><?php echo $par; ?></H1></CENTER>

<?php
}
?>