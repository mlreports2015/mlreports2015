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

<?
echo "<link href=\"CSS/pmh.css\" rel=\"stylesheet\" type=\"text/css\">
	<script language=\"javaScript\" type=\"text/javascript\" src=\"Scripts/summary.js\"></script>
	<link href=\"CSS/calender.css\" rel=\"stylesheet\" type=\"text/css\">
	<script language=\"javaScript\" type=\"text/javascript\" src=\"Scripts/calender_date_picker.js\"></script>";
?>

</HEAD>

<BODY background="images/back.png">

<? $id= $_GET['cid']; ?>

<DIV style="background-image : url('images/fe.png'); background-repeat : no-repeat; width:1024px; float:right;">
<IMG align="middle" src="images/title3.png" />
<IMG align="middle" src="images/rep.png" style="margin-left : 700px;" />
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

<CENTER><H1><? echo "ML".$id;?></H1></CENTER>

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

<A href="repgen.php?cid=<? echo $id; ?>&id=<? echo rand(0,1000); ?>">Report</A> | 

<Div style="width:100%"></DIV>
</DIV>
</CENTER>

<center>
<iframe src="ieshit1.php?cid=<? $id= $_GET['cid']; echo $id;?>" height="100" scrolling="no" width="400"></iframe>
</center>

<center>
<iframe src="ieshit2.php?cid=<? $id= $_GET['cid']; echo $id;?>" height="100" scrolling="no" width="400"></iframe>
</center>

<center>
<iframe align="middle" src="ieshit3.php?cid=<? $id= $_GET['cid']; echo $id;?>" height="100" scrolling="no" width="400"></iframe>
</center>

</BODY>

</HTML>
<?
}?>