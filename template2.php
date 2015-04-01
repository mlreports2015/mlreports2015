<?php

function bTop($par, $org, $id)
{


?><CENTER>
<div style='border:solid 1px #99000;width:99%;background-color:#FFF;font-family:sans-serif;padding-bottom:5px;margin-top:-30px;' align="center">
<CENTER><H1><? if($id ==''){ echo "MLReports"; }else{echo "ML".$id; } ?></H1></CENTER>

<?php

include "dcon.php";

$qsa="select cda, cde, cln, ct FROM `claimant` where cid='$id' and org='".$org."'";

$qsares = mysql_query($qsa);
$qsaprin = mysql_fetch_array($qsares);
//print_r($qsaprin);
$date1 = new DateTime($qsaprin['cda']);
$date2 = new DateTime($qsaprin['cde']);
$interval = $date1->diff($date2);

$datediff1=mktime(22,0,0,date('m',strtotime($qsaprin['cde'])),date('d',strtotime($qsaprin['cde'])),date('Y',strtotime($qsaprin['cde'])));
$datediff2=mktime(22,0,0,date('m',strtotime($qsaprin['cda'])),date('d',strtotime($qsaprin['cda'])),date('Y',strtotime($qsaprin['cda'])));

$dd=floor(($datediff1-$datediff2)/2628000);
$mnths = $dd%12;
$years = floor($dd/12);



echo '<center><h1>'.$qsaprin['ct'].' '.$qsaprin['cln'].'</h1></center>';

echo "</div>";

echo "<CENTER style='padding:0px;margin:0px;'> <DIV align=\"center\" style='border:solid 1px #FFF;width:100%;height:98px;background-color:#77a9c9;padding:3px;'>";

$s="select * from repGen where cid='$id' and org='".$org."'";
$q=mysql_query($s);
$n=mysql_num_rows($q);
echo "<DIV align=\"left\" style=\"color:#FFF;font-family:sans-serif;\" >";
if ($n>0)
{
	$r=mysql_fetch_array($q);
	echo 'This Report Has Been Generated <b style="font-size:large; color:#666666;">'.$r['num'].'</b> Times.';
	echo 'Report initially generated on <b style="font-size:large; color:#666666;">'.date('d-m-Y', strtotime($r['dt'])).'</b>.';
}
else
{
	echo 'This Report Has Been Generated <b style="font-size:large; color:#666666;">0</b> Times.';
}

echo "<br/>";
//echo "<center> Time Past Since Accident: <b style=\"font-size:large; color:#A61515;\">" . $interval->y . " years, " . $interval->m." months, </b></center>"; 
//echo "<br/>";
echo " Time Past Since Accident: <b style=\"font-size:large; color:#666666;\">".$years." years, ".$mnths." months</b><br/>";
echo "<br/></DIV>";
?>



<ul class="navbar navbar-default" style="width:100%;background-color:#77a9c9;border:none;" >

<div>

<ul class="nav navbar-nav" style="width:110%">

<li><A class="l" href="detNewer.php?cid=<? echo $id; ?>&id=<? echo rand(0,1000); ?>" >Details<img src="images/bgTriang.png" style="position:absolute;margin-top:-10px;margin-left:-25px"/></A></li>


<li><A class="l" href="pmh.php?cid=<? echo $id; ?>&id=<? echo rand(0,1000); ?>" <?php if($par=='PMH'){echo "style='color:#fff;text-decoration:'";} ?> >PMH<img src="images/bgTriang.png" <?php if($par=='PMH'){echo "style='visibility:visible'";} ?>/></A></li>

<li><A class="l" href="accid.php?cid=<? echo $id; ?>&id=<? echo rand(0,1000); ?>" <?php if($par=='Accident'){echo "style='color:#fff;'";} ?>>Accident<img src="images/bgTriang.png" <?php if($par=='Accident'){echo "style='visibility:visible'";} ?>/></A></li> 

<li><A class="l" href="effect.php?cid=<? echo $id; ?>&id=<? echo rand(0,1000); ?>" <?php if($par=='Symptoms'){ echo "style='color:#fff;'"; }?> >Symptoms <img src="images/bgTriang.png" <?php if($par=='Symptoms'){ echo "style='visibility:visible'"; } ?>/></A></li> 

<li><A class="l" href="treat.php?cid=<? echo $id; ?>&id=<? echo rand(0,1000); ?>" <?php if($par=='Treatment'){ echo "style='color:#fff;'"; }?> >Treatment <img src="images/bgTriang.png" <?php if($par=='Treatment'){ echo "style='visibility:visible'"; } ?>/></A></li>

<li><A class="l" href="life3.php?cid=<? echo $id; ?>&id=<? echo rand(0,1000); ?>" <?php if($par=='Life'){ echo "style='color:#fff;'"; }?> >Life<img src="images/bgTriang.png" <?php if($par=='Life'){ echo "style='visibility:visible'"; } ?>/></A></li> 

<li><A class="l" href="exam.php?cid=<? echo $id; ?>&id=<? echo rand(0,1000); ?>">Examination<img src="images/bgTriang.png" <?php if($par=='Accident Exam'){ echo "style='visibility:visible'"; } ?>/></A></li>

<li><A class="l" href="summary.php?cid=<? echo $id; ?>&id=<? echo rand(0,1000); ?>" <?php if($par=='Summary'){ echo "style='color:#fff;'";; }?> >Summary<img src="images/bgTriang.png" <?php if($par=='Summary'){ echo "style='visibility:visible'"; } ?>/></A> </li>

<li><A class="l" href="prog.php?cid=<? echo $id; ?>&id=<? echo rand(0,1000); ?>">Prognosis </A> </li>



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

<!--<A class="l" href="repgen0.php?cid=<? //echo $id; ?>&id=<? //echo rand(0,1000); ?>">Report</A>-->
<li><A class="l" href="preview.php?cid=<? echo $id; ?>&id=<? echo rand(0,1000); ?>">Report</A></li>

</ul>
</div>
</ul>

</CENTER>
<!--</A>-->
<br/>

<CENTER><H1><?php echo $par; ?></H1></CENTER>

<?php if($par == 'Treatment')
		{
?>		
<CENTER>
<TABLE cellpadding='6px' >

	<TR><TD width='100px'><h2><a href="treat.php?cid=<?php echo $_GET['cid'];?>&id=<?php echo $_GET['id']; ?>" class="l1" style="">Initial</a></h2></TD><TD width='100px'><H2><a href="treat2.php?cid=<?php echo $_GET['cid'];?>&id=<?php echo $_GET['id']; ?>" class="l1" style="">Later</a></H2></TD><TD width='100px'><H2><a href='treat3.php?cid=<?php echo $_GET['cid'];?>&id=<?php echo $_GET['id']; ?>' class="l1">Referral</a></H2></TD></TR>

</TABLE>
</CENTER>
<?php


}

if($par=='Life')
{
	
?>	
	
<TABLE cellpadding='7px' align="center">
	
<TR>
<TD><H2><a class="l1" href="life3.php?cid=<?php echo $_GET['cid'];?>&id=<?php echo $_GET['id']; ?>" style="">Occupation</H2></TD>
<TD><H2><a class="l1" href="life1.php?cid=<?php echo $_GET['cid'];?>&id=<?php echo $_GET['id']; ?>" style="">Domestic</a></H2></TD>
<TD><H2><a class="l1" href="life2.php?cid=<?php echo $_GET['cid'];?>&id=<?php echo $_GET['id']; ?>" style="">Travelling</a></H2></TD>

</TR>
	
</TABLE>
	
<?php 	
}

    
?>


<?php
}
?>
