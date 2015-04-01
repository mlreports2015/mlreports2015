<?php

session_start();

include "inc.php";


if (!isset($_SESSION['id']))
{
	rdrctr("Login Details Incorrect","index.html");
}
else
{
	include 'dcon.php';
?>
<HEAD>
<TITLE>MLR Case</TITLE>

<SCRIPT language='JavaScript' type='text/javascript' src='Scripts/index.js'></SCRIPT>

<link href="CSS/calender.css" rel="stylesheet" type="text/css">
<script language="javaScript" type="text/javascript" src="Scripts/calender_date_picker.js"></script>

<?
echo "<link href=\"CSS/det.css\" rel=\"stylesheet\" type=\"text/css\">
	<script language=\"javaScript\" type=\"text/javascript\" src=\"Scripts/det.js\"></script>
	<link href=\"CSS/calender.css\" rel=\"stylesheet\" type=\"text/css\">
	<script language=\"javaScript\" type=\"text/javascript\" src=\"Scripts/calender_date_picker.js\"></script>";
?>

</HEAD>

<BODY background="images/back.png" onLoad="init('d','de');">

<DIV style="background-image : url('images/fe.png'); background-repeat : no-repeat; width:1024px; float:right;">
<IMG align="middle" src="images/title3.png" />
<IMG align="middle" src="images/ncase.png" style="margin-left : 700px;" />
</DIV>

<DIV style="float:right;right:20px;width:100%;">
<A href=home.php>Home</A> |
<A href=admin.php>Add Case</A> |
<A href=search.php>General Search</A> |
<A href=incomplete.php>Incomplete Cases</A> |
<A href=complete.php>Complete Cases</A> |
 &nbsp; &nbsp; &nbsp;  &nbsp; &nbsp; &nbsp;  &nbsp; &nbsp; &nbsp; 
<A href=logout.php>Log Out</A> |
</DIV>


<br />
<br />
<br />
<br />
<br />
<br />



<?
$org=$_SESSION['o'];
$s="select * from claimant where cid=".$_GET['cid']." and org='$org'";
$q=mysql_query($s);
$r=mysql_fetch_array($q);
?>

<CENTER><H1><? echo "ML".$r['cid'];?></H1></CENTER>

<CENTER>
<DIV align="center">

<A href="det.php?cid=<? echo $id; ?>&id=<? echo rand(0,1000); ?>">Details</A> | 

<A href="pmh.php?cid=<? echo $id; ?>&id=<? echo rand(0,1000); ?>">PMH</A> | 

<A href="accid.php?cid=<? echo $id; ?>&id=<? echo rand(0,1000); ?>">Accident</A> | 

<A href="effect.php?cid=<? echo $id; ?>&id=<? echo rand(0,1000); ?>">Symptoms</A> | 

<A href="treat.php?cid=<? echo $id; ?>&id=<? echo rand(0,1000); ?>">Treatment</A> | 

<A href="life.php?cid=<? echo $id; ?>&id=<? echo rand(0,1000); ?>">Life</A> | 

<A href="exam.php?cid=<? echo $id; ?>&id=<? echo rand(0,1000); ?>"> Examination </A> | 

<A href="summary.php?cid=<? echo $id; ?>&id=<? echo rand(0,1000); ?>">Summary</A> | 

<A href="prog.php?cid=<? echo $id; ?>&id=<? echo rand(0,1000); ?>">Prognosis </A> | 

<A href="report.php">Report</A> | 

<Div style="width:100%"></DIV>
</A>
</CENTER>

<br>

<DIV class="ifr" id='de'>
<IFRAME id="ded" src="det.php?cid=<? echo $_GET['cid']; ?>"></IFRAME>
</A>
<DIV class="ifr" id='pm' style="position:absolute; top:200px; width:100%;">
<IFRAME id="pmd" src="pmh.php?cid=<? echo $_GET['cid']; ?>"></IFRAME>
</A>
<DIV class="ifr" id='ac' style="position:absolute; top:200px; width:100%;">
<IFRAME id="acd" src="accid.php?cid=<? echo $_GET['cid']; ?>"></IFRAME>
</A>
<DIV class="ifr" id='ef' style="position:absolute; top:200px; width:100%;">
<IFRAME id="efd" src="effect.php?cid=<? echo $_GET['cid']; ?>"></IFRAME>
</A>
<DIV class="ifr" id='tr' style="position:absolute; top:200px; width:100%;">
<IFRAME id="trd" src="treat.php?cid=<? echo $_GET['cid']; ?>"></IFRAME>
</A>
<DIV class="ifr" id='li' style="position:absolute; top:200px; width:100%;">
<IFRAME id="lid" src="life.php?cid=<? echo $_GET['cid']; ?>"></IFRAME>
</A>
<DIV class="ifr" id='exa' style="position:absolute; top:200px; width:100%;">
<IFRAME id="exad" src="exam.php?cid=<? echo $_GET['cid']; ?>"></IFRAME>
</A>
<DIV class="ifr" id='su' style="position:absolute; top:200px; width:100%;">
<IFRAME id="sud" src="summary.php?cid=<? echo $_GET['cid']; ?>"></IFRAME>
</DIV>
<DIV class="ifr" id='pro' style="position:absolute; top:200px; width:100%;">
<IFRAME id="prod" src="prog.php?cid=<? echo $_GET['cid']; ?>"></IFRAME>
</DIV>
<DIV class="ifr" id='re' style="position:absolute; top:200px; width:100%;">
<IFRAME id="red" src="repgen.php?cid=<? echo $_GET['cid']; ?>"></IFRAME>
</DIV>

</BODY>
</HTML>

<?
}
?>